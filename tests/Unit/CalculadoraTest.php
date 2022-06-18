<?php

namespace Tests\Unit;
use App\Service\CalculadoraService;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;

class CalculadoraTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_calculadora()
    {
        Log::info("Inicio de la prueba ");
        $service=new CalculadoraService();
        //el segundo argumento es true solo para pruebas
        $resultado=$service->calcularPlan(1);
        Log::info($resultado);

        $this->assertTrue($resultado!=null);
        Log::info("Fin de la prueba ");
    }

}
