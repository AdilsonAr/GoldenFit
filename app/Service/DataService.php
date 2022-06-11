<?php

namespace App\Service;

use App\Models\AgregacionEjercicio;
use App\Models\AgregacionAlimento;
use App\Models\AgregacionBebida;
use App\Models\AgregacionComida;
use App\Models\Cliente;
use App\Models\Bebida;
use App\Models\TipoAlimento;
use App\Models\Alimento;
use App\Models\Ejercicio;

class DataService
{
    public function readCliente($clienteId)
    {
        $cliente = Cliente::where('id', $clienteId)->first();
        return $cliente;
    }

    private static $tipoAlimentoCursor=1;
    private static $tipos=5;

    public function getAlimento($alimentosBetados){
        do{
            $alimento=Alimento::where('id_tipo',self::$tipoAlimentoCursor)->inRandomOrder()->first();
        }while(in_array($alimento->id,$alimentosBetados));

        if(self::$tipoAlimentoCursor==self::$tipos){
            self::$tipoAlimentoCursor=1;
        }else{
            self::$tipoAlimentoCursor++;
        }
        return $alimento;
    }

    public function saveAgregacionBebida($comida, $idComida, $resultados)
    {
        $bebida = Bebida::where('comidaDelDia', $comida)->inRandomOrder()->first();
        $agregacionBebida = array();
        $agregacionBebida['id_agregacion_comidas']=$idComida;
        $agregacionBebida['id_bebida']=$bebida->id;
        $agregacionBebida['created_at']=now();
        $agregacionBebida['updated_at']=now();
        $agregacionBebida = AgregacionBebida::create($agregacionBebida);
        return $bebida;
    }

    public function saveAgregacionEjercicio($minutos, $idPlanDiario, $idEjercicio, $resultados)
    {
        $agregacionEjercicio = array();
        $agregacionEjercicio['minutos_duracion']=$minutos;
        $agregacionEjercicio['id_plan_diario']=$idPlanDiario;
        $agregacionEjercicio['id_ejercicio']=$idEjercicio;
        $agregacionEjercicio['created_at']=now();
        $agregacionEjercicio['updated_at']=now();

        AgregacionEjercicio::create($agregacionEjercicio);
        $ejercicio=Ejercicio::find($idEjercicio);
        return $ejercicio;
    }

    public function saveAgregacionAlimento($cantidad, $agregacionComidasId, $idAlimento, $resultados)
    {
        $agregarAlimento = array();

        $agregarAlimento['cantidad']=$cantidad;
        $agregarAlimento['id_alimento']=$idAlimento;
        $agregarAlimento['id_agregacion_comidas']=$agregacionComidasId;
        $agregarAlimento['created_at']=now();
        $agregarAlimento['updated_at']=now();

        $agregarAlimento = AgregacionAlimento::create($agregarAlimento);
        return $agregarAlimento;
    }

    public function saveAgregacionComida($comida, $idPlanDiario, $resultados)
    {
        $agregarComida = array();
        $agregarComida['id_plan_diario']=$idPlanDiario;
        $agregarComida['comida']=$comida;
        $agregarComida['created_at']=now();
        $agregarComida['updated_at']=now();
        $agregarComida = AgregacionComida::create($agregarComida);
        return $agregarComida;
    }
}
