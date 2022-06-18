<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Service\CalculadoraService;
use Illuminate\Http\Request;
use App\Mail\NotifyMail;
use \Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function saveinformation(Request $request)
   {

         $datarequest=$request->all();
         $user = auth()->user();
       $cliente=  Cliente::create([
            
                "gustoPorCarne" => 3,
                "gustoPorCerdo" => 3,
                "gustoPorPescado" => 3,
                "horasParaCocinar" => $datarequest['horasParaCocinar'],
                "desayuna" => true,
                "horasParaEjercicio" => $datarequest['horasParaEjercicio'],
                "nivelActividadFisica" => 2,
                "edad" => $datarequest['edad'],
                "estatura" => $datarequest['estatura'],
                "pesoActual" => $datarequest['pesoActual'],
                "pesoDeseado" => $datarequest['pesoDeseado'],
                "nombre" => $datarequest['nombre'],
                "sexo" => $datarequest['sexo'],
                "apellidos" => $datarequest['apellido'],
                "telefono" => $datarequest['telefono'],
                "id_usuario" => $user->id,
            
        ]); 
        $service=new CalculadoraService();
        $resultado=$service->calcularPlan($cliente->id);


        $data=[];
        $data["email"]=$user->email;
        $data["client_name"]=$cliente->nombre;
        $data["subject"]="TU PLAN PERSONAL DE ENTRENAMIENTO";
        $datos = json_decode($resultado);
       
        //$resultData = json_decode($datos);
        $pdf = PDF::loadView('test', 
        [
            'fechaInicio'=>$datos->plan->fecha_diseno,
            'fechaFin'=>$datos->plan->fecha_finalizacion,
            'cliente'=>$datos->plan->id_cliente,
            'mesDuracion'=>$datos->plan->meses_duracion,
            'planesDiarios'=>$datos->planNutricional->planesDiarios,
            'planesEjercicios'=>$datos->planEjercicios->planesDiarios
        ],
        $data);
        Mail::to($user->email)->send(new NotifyMail($pdf));
      

      return response()->json(['message' => 'success','request'=>$datarequest ,'resultado'=>$datos]);
   }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}