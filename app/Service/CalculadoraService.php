<?php

namespace App\Service;

use App\Models\AreasEnfoque;
use App\Models\AreaEnfocada;
use App\Models\Plan;
use App\Models\PlanNutricional;
use App\Models\PlanDiario;
use App\Models\PlanEjercicios;
use App\Models\Ejercicio;
use App\Models\AlimentoNoConsumido;
//testing
use Illuminate\Support\Facades\DB;

class CalculadoraService
{
    public function calcularPlan($clienteId,$testing=false){
        $service=new DataService();
        $cliente=$service->readCliente($clienteId);
        $resultados=array();

        $plan=$this->getPlan($cliente, $resultados);
        $planNutricional=$this->getPlanNutricional($plan, $resultados);
        $planEjercicios=$this->getPlanEjercicios($cliente,$plan, $resultados);
        $this->getPlanesNutricionalesDiarios($cliente,$planNutricional,$resultados);
        $this->getPlanesEjerciciosDiarios($cliente,$plan,$planEjercicios,$resultados,$testing);

        $resultados=json_encode($resultados, JSON_UNESCAPED_UNICODE);
        return $resultados;
    }
    //ecuación de Harris-Benedict
    private function getCaloriasTmb($cliente)
    {
        $calorias = 0;
        if ($cliente->sexo == 'masculino') {
            $calorias = 66 + (13.7 * ($cliente->pesoActual/2.2)) + (5 * $cliente->estatura) - (6.75 * $cliente->edad);
        } else {
            $calorias = 655 + (9.6 * ($cliente->pesoActual/2.2)) + (1.8 * $cliente->estatura) - (4.7 * $cliente->edad);
        }
        return $calorias;
    }

    //ecuación de Mifflin-St. Jeor
    private function getCalorias($cliente)
    {
        $calorias = 0;
        $tmb = $this->getCaloriasTmb($cliente);
        $actividad = $cliente->horasParaEjercicio;
        if ($actividad <= 1) {
            $calorias = $tmb * 1.2;
        } else if ($actividad <= 2) {
            $calorias = $tmb * 1.375;
        } else if ($actividad > 2) {
            $calorias = $tmb * 1.55;
        }
        return $calorias;
    }

    private function getPlan($cliente, &$resultados)
    {
        $plan = array();
        $meses = $this->getDuracion($cliente);
        $plan['id_cliente']=$cliente->id;
        $plan['fecha_diseno']=now();

        if ($meses == 0) {
            $plan['fecha_finalizacion']=date_add(now(), date_interval_create_from_date_string("3 months"));
            $plan['meses_duracion']=3;
        } else {
            $plan['fecha_finalizacion']=date_add(now(), date_interval_create_from_date_string(round($meses * 30) . " days"));
            $plan['meses_duracion']=$meses;
        }
        $plan['created_at']=now();
        $plan['updated_at']=now();

        $plan = Plan::create($plan);
        $resultados['plan']=$plan->toArray();
        return $plan;
    }

    private function getPlanEjercicios($cliente, $plan, &$resultados)
    {
        $planEjercicios = array();

        $planEjercicios['id_plan']=$plan->id;
        $planEjercicios['created_at']=now();
        $planEjercicios['updated_at']=now();
        $planEjercicios = PlanEjercicios::create($planEjercicios);
        $resultados['planEjercicios']=$planEjercicios->toArray();
        return $planEjercicios;
    }

    private function getPlanNutricional($plan, &$resultados)
    {
        $planNutricional = array();

        $planNutricional['id_plan']=$plan->id;
        $planNutricional['created_at']=now();
        $planNutricional['updated_at']=now();
        $planNutricional = PlanNutricional::create($planNutricional);
        $resultados['planNutricional']=$planNutricional->toArray();
        return $planNutricional;
    }

    private function getDuracion($cliente)
    {
        $diffPeso = ($cliente->pesoActual - $cliente->pesoDeseado) / 2.2;
        $diffPeso = abs($diffPeso);

        $meses = 0;
        if ($diffPeso > 0.5) {
            $meses = $diffPeso / 2;
        }

        return $meses;
    }

    private function getPlanesNutricionalesDiarios($cliente, $planNutricional, &$resultados)
    {
        $desviacionCaloriasDiarias = 0;
        $service=new DataService();
        if ($this->getDuracion($cliente) > 0) {
            $diffPeso = $cliente->pesoActual - $cliente->pesoDeseado;
            //para perder peso se recomienda dejar de consumir 500 cal al dia
            $desviacionCaloriasDiarias = -500;
            //si se quiere ganar peso, las calorias se suman
            if ($diffPeso < 0) {
                $desviacionCaloriasDiarias = 500;
            }
        }

        $calorias = $this->getCalorias($cliente)+$desviacionCaloriasDiarias;
        $noConsumidos = AlimentoNoConsumido::where('id_cliente', $cliente->id)->get();
        $alimentosBetados = array();
        foreach ($noConsumidos as $c) {
            array_push($alimentosBetados, $c->id_alimentos);
        }
        $planes = array();
        for ($i = 1; $i <= 7; $i++) {
            $planDiario = array();
            $planDiario['id_plan_nutricional']=$planNutricional->id;
            $planDiario['id_dia']=$i;
            $planDiario['created_at']=now();
            $planDiario['updated_at']=now();
            $planDiario = PlanDiario::create($planDiario);
            $planResultado=$planDiario->toArray();
            $planResultado['calorias']=$calorias;
            $resultados['planNutricional']['planesDiarios'][($i-1)]=$planResultado;
            
            //agregar desayuno
            $this->addComida('desayuno',$planDiario,$alimentosBetados,$calorias,$resultados,$service,$i);
            //agregar almuerzo
            $this->addComida('almuerzo',$planDiario,$alimentosBetados,$calorias,$resultados,$service,$i);
            //agregar cena
            $this->addComida('cena',$planDiario,$alimentosBetados,$calorias,$resultados,$service,$i);

            array_push($planes, $planDiario);
        }

        return $planes;
    }

    private function addComida($nombreComida,$planDiario,$alimentosBetados,$calorias,&$resultados,$service,$i){
        //agregar commida
        $comida=$service->saveAgregacionComida($nombreComida,$planDiario->id, $resultados);
        $resultados['planNutricional']['planesDiarios'][($i-1)][$nombreComida]['comida']=$comida->toArray();
        //agregar bebida
        $momentoDelDia="manana-tarde";
        if($nombreComida=='almuerzo'){
            $momentoDelDia="mediodia";
        }
        $bebida=$service->saveAgregacionBebida($momentoDelDia,$comida->id, $resultados);
        $resultados['planNutricional']['planesDiarios'][($i-1)][$nombreComida]['bebida']=$bebida->toArray();
        //agregar alimentos
        $caloriasPorComida=$calorias/3;
        $caloriasActuales=$bebida->calorias;
        $j=0;
        while($caloriasActuales<$caloriasPorComida){
            $alimento=$service->getAlimento($alimentosBetados);
            $agregacion=$service->saveAgregacionAlimento(1,$comida->id,$alimento->id, $resultados);
            $resultados['planNutricional']['planesDiarios'][($i-1)][$nombreComida]['alimentos'][$j]=$alimento->toArray();
            $caloriasActuales+=$alimento->calorias;
            $j++;
        }
    }

    private function getPlanesEjerciciosDiarios($cliente, $plan, $planEjercicios, &$resultados,$testing)
    {
        if($testing){
            DB::table("area_enfocadas")->insert([
                [
                    "id_plan" => 1,
                    "id_areas_de_enfoque" => 1,
                ],
                [
                    "id_plan" => 1,
                    "id_areas_de_enfoque" => 4,
                ],
            ]);
        }
        $tiempo = $cliente->horasParaEjercicio;
        $areasEnfocadas = AreaEnfocada::where('id_plan', $plan->id)->get();

        $ejercicios = array();
        foreach ($areasEnfocadas as $c) {
            $area = AreasEnfoque::where('id', $c->id_areas_de_enfoque)->first();
            $ejerciciosArea = Ejercicio::where('id_area_enfoque', $area->id)->get();

            foreach ($ejerciciosArea as $e) {
                array_push($ejercicios, $e->id);
            }
        }

        $planes = array();
        for ($i = 1; $i < 7; $i++) {
            $planDiario = array();
            $planDiario['id_plan_ejercicio']=$planEjercicios->id;
            $planDiario['id_dia']=$i;
            $planDiario['created_at']=now();
            $planDiario['updated_at']=now();

            $planDiario = PlanDiario::create($planDiario);
            $resultados['planEjercicios']['planesDiarios'][($i-1)]=$planDiario->toArray();
            array_push($planes, $planDiario);
            $this->addEjercicios($planDiario, $tiempo, $ejercicios, $resultados,$i);
        }

        return $planes;
    }

    private function addEjercicios($planDiario, $horasDiarias, $ejercicios, &$resultados,$i)
    {
        $service = new DataService();

        $duracion = 0;
        if ($horasDiarias <= 1) {
            $duracion = ($horasDiarias / 3) * 60;
        } else {
            $residuo = ($horasDiarias * 60) % 15;
            if ($residuo == 0) {
                $duracion = 15;
            } else {
                $division = ($horasDiarias * 60) / 15;
                $numeroEjercicios = floor($division);
                $diff = $division - $numeroEjercicios;
                $duracion = ($horasDiarias * 60) / (15 + $diff / $numeroEjercicios);
            }
        }

        $numeroEjercicios = round(($horasDiarias * 60) / $duracion);
        $ejerciciosAgregar = array_rand($ejercicios, $numeroEjercicios);
        for ($j = 0; $j < $numeroEjercicios; $j++) {
            $ejercicio=$service->saveAgregacionEjercicio($duracion, $planDiario->id, $ejercicios[$ejerciciosAgregar[$j]], $resultados);
            $ejercicio=$ejercicio->toArray();
            $ejercicio['minutos_duracion']=$duracion;
            $resultados['planEjercicios']['planesDiarios'][($i-1)]['ejercicios'][$j]=$ejercicio;
        }
    }
}
