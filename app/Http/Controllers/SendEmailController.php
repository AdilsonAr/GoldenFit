<?php

namespace App\Http\Controllers;

use App\Mail\NotifyMail;
use \Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Service\CalculadoraService;
use Illuminate\Support\Facades\View;

class SendEmailController extends Controller
{
    public function index()
    {
        //$service=new CalculadoraService();
        //$resultado=$service->calcularPlan(1,true);

        $data["email"]="josedavid95guzman@gmail.com";
        $data["client_name"]="Jose";
        $data["subject"]="Recibo";
        $datos = json_decode('{
            "plan": {
              "id_cliente": 1,
              "fecha_diseno": "2022-06-17T03:30:13.610943Z",
              "fecha_finalizacion": "2022-08-24T03:30:13.610968Z",
              "meses_duracion": 2.2727272727272725,
              "created_at": "2022-06-17T03:30:13.000000Z",
              "updated_at": "2022-06-17T03:30:13.000000Z",
              "id": 1
            },
            "planNutricional": {
              "id_plan": 1,
              "created_at": "2022-06-17T03:30:14.000000Z",
              "updated_at": "2022-06-17T03:30:14.000000Z",
              "id": 1,
              "planesDiarios": [
                {
                  "id_plan_nutricional": 1,
                  "id_dia": 1,
                  "created_at": "2022-06-17T03:30:14.000000Z",
                  "updated_at": "2022-06-17T03:30:14.000000Z",
                  "id": 1,
                  "calorias": 1683.2636363636361,
                  "desayuno": {
                    "comida": {
                      "id_plan_diario": 1,
                      "comida": "desayuno",
                      "created_at": "2022-06-17T03:30:14.000000Z",
                      "updated_at": "2022-06-17T03:30:14.000000Z",
                      "id": 1
                    },
                    "bebida": {
                      "id": 1,
                      "nombre": "Cafe",
                      "porcion": "300 ml",
                      "comidaDelDia": "manana-tarde",
                      "calorias": 3,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 6,
                        "nombre": "Frijoles cocidos",
                        "porcion": "100 gramos",
                        "calorias": 151,
                        "id_tipo": 1,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 12,
                        "nombre": "Pepino",
                        "porcion": "100 gramos",
                        "calorias": 15,
                        "id_tipo": 2,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 21,
                        "nombre": "Ciruela",
                        "porcion": "100 gramos",
                        "calorias": 47,
                        "id_tipo": 3,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 25,
                        "nombre": "Queso mozzarella ",
                        "porcion": "100 gramos",
                        "calorias": 330,
                        "id_tipo": 4,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 36,
                        "nombre": "Tofu",
                        "porcion": "200 gramos",
                        "calorias": 152,
                        "id_tipo": 5,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  },
                  "almuerzo": {
                    "comida": {
                      "id_plan_diario": 1,
                      "comida": "almuerzo",
                      "created_at": "2022-06-17T03:30:15.000000Z",
                      "updated_at": "2022-06-17T03:30:15.000000Z",
                      "id": 2
                    },
                    "bebida": {
                      "id": 5,
                      "nombre": "Limonada",
                      "porcion": "300 ml",
                      "comidaDelDia": "mediodia",
                      "calorias": 126,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 4,
                        "nombre": "Avena",
                        "porcion": "10 gramos",
                        "calorias": 389,
                        "id_tipo": 1,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 8,
                        "nombre": "Zanahorias",
                        "porcion": "235 gramos",
                        "calorias": 100,
                        "id_tipo": 2,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  },
                  "cena": {
                    "comida": {
                      "id_plan_diario": 1,
                      "comida": "cena",
                      "created_at": "2022-06-17T03:30:16.000000Z",
                      "updated_at": "2022-06-17T03:30:16.000000Z",
                      "id": 3
                    },
                    "bebida": {
                      "id": 2,
                      "nombre": "Chocolate",
                      "porcion": "300 ml",
                      "comidaDelDia": "manana-tarde",
                      "calorias": 267,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 20,
                        "nombre": "Mango",
                        "porcion": "100 gramos",
                        "calorias": 62,
                        "id_tipo": 3,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 28,
                        "nombre": "Nata",
                        "porcion": "100 gramos",
                        "calorias": 204,
                        "id_tipo": 4,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 35,
                        "nombre": "Carne de conejo",
                        "porcion": "200 gramos",
                        "calorias": 234,
                        "id_tipo": 5,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  }
                },
                {
                  "id_plan_nutricional": 1,
                  "id_dia": 2,
                  "created_at": "2022-06-17T03:30:17.000000Z",
                  "updated_at": "2022-06-17T03:30:17.000000Z",
                  "id": 2,
                  "calorias": 1683.2636363636361,
                  "desayuno": {
                    "comida": {
                      "id_plan_diario": 2,
                      "comida": "desayuno",
                      "created_at": "2022-06-17T03:30:18.000000Z",
                      "updated_at": "2022-06-17T03:30:18.000000Z",
                      "id": 4
                    },
                    "bebida": {
                      "id": 2,
                      "nombre": "Chocolate",
                      "porcion": "300 ml",
                      "comidaDelDia": "manana-tarde",
                      "calorias": 267,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 3,
                        "nombre": "Arroz frito",
                        "porcion": "10 gramos",
                        "calorias": 163,
                        "id_tipo": 1,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 13,
                        "nombre": "Remolacha",
                        "porcion": "100 gramos",
                        "calorias": 43,
                        "id_tipo": 2,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 16,
                        "nombre": "Pera",
                        "porcion": "100 gramos",
                        "calorias": 55,
                        "id_tipo": 3,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 25,
                        "nombre": "Queso mozzarella ",
                        "porcion": "100 gramos",
                        "calorias": 330,
                        "id_tipo": 4,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  },
                  "almuerzo": {
                    "comida": {
                      "id_plan_diario": 2,
                      "comida": "almuerzo",
                      "created_at": "2022-06-17T03:30:20.000000Z",
                      "updated_at": "2022-06-17T03:30:20.000000Z",
                      "id": 5
                    },
                    "bebida": {
                      "id": 6,
                      "nombre": "Jugo de naranja natural",
                      "porcion": "300 ml",
                      "comidaDelDia": "mediodia",
                      "calorias": 146,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 31,
                        "nombre": "Atún",
                        "porcion": "200 gramos",
                        "calorias": 388,
                        "id_tipo": 5,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 6,
                        "nombre": "Frijoles cocidos",
                        "porcion": "100 gramos",
                        "calorias": 151,
                        "id_tipo": 1,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  },
                  "cena": {
                    "comida": {
                      "id_plan_diario": 2,
                      "comida": "cena",
                      "created_at": "2022-06-17T03:30:21.000000Z",
                      "updated_at": "2022-06-17T03:30:21.000000Z",
                      "id": 6
                    },
                    "bebida": {
                      "id": 3,
                      "nombre": "Leche chocolatada",
                      "porcion": "300 ml",
                      "comidaDelDia": "manana-tarde",
                      "calorias": 267,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 13,
                        "nombre": "Remolacha",
                        "porcion": "100 gramos",
                        "calorias": 43,
                        "id_tipo": 2,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 18,
                        "nombre": "Melón",
                        "porcion": "100 gramos",
                        "calorias": 54,
                        "id_tipo": 3,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 24,
                        "nombre": "Queso ricotta",
                        "porcion": "100 gramos",
                        "calorias": 140,
                        "id_tipo": 4,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 34,
                        "nombre": "Carne de puerco",
                        "porcion": "200 gramos",
                        "calorias": 262,
                        "id_tipo": 5,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  }
                },
                {
                  "id_plan_nutricional": 1,
                  "id_dia": 3,
                  "created_at": "2022-06-17T03:30:21.000000Z",
                  "updated_at": "2022-06-17T03:30:21.000000Z",
                  "id": 3,
                  "calorias": 1683.2636363636361,
                  "desayuno": {
                    "comida": {
                      "id_plan_diario": 3,
                      "comida": "desayuno",
                      "created_at": "2022-06-17T03:30:22.000000Z",
                      "updated_at": "2022-06-17T03:30:22.000000Z",
                      "id": 7
                    },
                    "bebida": {
                      "id": 2,
                      "nombre": "Chocolate",
                      "porcion": "300 ml",
                      "comidaDelDia": "manana-tarde",
                      "calorias": 267,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 6,
                        "nombre": "Frijoles cocidos",
                        "porcion": "100 gramos",
                        "calorias": 151,
                        "id_tipo": 1,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 9,
                        "nombre": "Aguacate",
                        "porcion": "125 gramos",
                        "calorias": 200,
                        "id_tipo": 2,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  },
                  "almuerzo": {
                    "comida": {
                      "id_plan_diario": 3,
                      "comida": "almuerzo",
                      "created_at": "2022-06-17T03:30:22.000000Z",
                      "updated_at": "2022-06-17T03:30:22.000000Z",
                      "id": 8
                    },
                    "bebida": {
                      "id": 5,
                      "nombre": "Limonada",
                      "porcion": "300 ml",
                      "comidaDelDia": "mediodia",
                      "calorias": 126,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 20,
                        "nombre": "Mango",
                        "porcion": "100 gramos",
                        "calorias": 62,
                        "id_tipo": 3,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 26,
                        "nombre": "Yogur natural",
                        "porcion": "200 gramos",
                        "calorias": 102,
                        "id_tipo": 4,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 37,
                        "nombre": "Semillas de ajonjolí",
                        "porcion": "100 gramos",
                        "calorias": 584,
                        "id_tipo": 5,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  },
                  "cena": {
                    "comida": {
                      "id_plan_diario": 3,
                      "comida": "cena",
                      "created_at": "2022-06-17T03:30:23.000000Z",
                      "updated_at": "2022-06-17T03:30:23.000000Z",
                      "id": 9
                    },
                    "bebida": {
                      "id": 3,
                      "nombre": "Leche chocolatada",
                      "porcion": "300 ml",
                      "comidaDelDia": "manana-tarde",
                      "calorias": 267,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 6,
                        "nombre": "Frijoles cocidos",
                        "porcion": "100 gramos",
                        "calorias": 151,
                        "id_tipo": 1,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 9,
                        "nombre": "Aguacate",
                        "porcion": "125 gramos",
                        "calorias": 200,
                        "id_tipo": 2,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  }
                },
                {
                  "id_plan_nutricional": 1,
                  "id_dia": 4,
                  "created_at": "2022-06-17T03:30:23.000000Z",
                  "updated_at": "2022-06-17T03:30:23.000000Z",
                  "id": 4,
                  "calorias": 1683.2636363636361,
                  "desayuno": {
                    "comida": {
                      "id_plan_diario": 4,
                      "comida": "desayuno",
                      "created_at": "2022-06-17T03:30:23.000000Z",
                      "updated_at": "2022-06-17T03:30:23.000000Z",
                      "id": 10
                    },
                    "bebida": {
                      "id": 3,
                      "nombre": "Leche chocolatada",
                      "porcion": "300 ml",
                      "comidaDelDia": "manana-tarde",
                      "calorias": 267,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 23,
                        "nombre": "Uvas",
                        "porcion": "200 gramos",
                        "calorias": 140,
                        "id_tipo": 3,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 24,
                        "nombre": "Queso ricotta",
                        "porcion": "100 gramos",
                        "calorias": 140,
                        "id_tipo": 4,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 31,
                        "nombre": "Atún",
                        "porcion": "200 gramos",
                        "calorias": 388,
                        "id_tipo": 5,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  },
                  "almuerzo": {
                    "comida": {
                      "id_plan_diario": 4,
                      "comida": "almuerzo",
                      "created_at": "2022-06-17T03:30:23.000000Z",
                      "updated_at": "2022-06-17T03:30:23.000000Z",
                      "id": 11
                    },
                    "bebida": {
                      "id": 7,
                      "nombre": "Jugo de manzana natural",
                      "porcion": "300 ml",
                      "comidaDelDia": "mediodia",
                      "calorias": 152,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 7,
                        "nombre": "Lentejas cocidas",
                        "porcion": "100 gramos",
                        "calorias": 165,
                        "id_tipo": 1,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 13,
                        "nombre": "Remolacha",
                        "porcion": "100 gramos",
                        "calorias": 43,
                        "id_tipo": 2,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 15,
                        "nombre": "Piña",
                        "porcion": "100 gramos",
                        "calorias": 55,
                        "id_tipo": 3,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 26,
                        "nombre": "Yogur natural",
                        "porcion": "200 gramos",
                        "calorias": 102,
                        "id_tipo": 4,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 39,
                        "nombre": "Cacahuate o maní",
                        "porcion": "100 gramos",
                        "calorias": 589,
                        "id_tipo": 5,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  },
                  "cena": {
                    "comida": {
                      "id_plan_diario": 4,
                      "comida": "cena",
                      "created_at": "2022-06-17T03:30:24.000000Z",
                      "updated_at": "2022-06-17T03:30:24.000000Z",
                      "id": 12
                    },
                    "bebida": {
                      "id": 2,
                      "nombre": "Chocolate",
                      "porcion": "300 ml",
                      "comidaDelDia": "manana-tarde",
                      "calorias": 267,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 7,
                        "nombre": "Lentejas cocidas",
                        "porcion": "100 gramos",
                        "calorias": 165,
                        "id_tipo": 1,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 8,
                        "nombre": "Zanahorias",
                        "porcion": "235 gramos",
                        "calorias": 100,
                        "id_tipo": 2,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 15,
                        "nombre": "Piña",
                        "porcion": "100 gramos",
                        "calorias": 55,
                        "id_tipo": 3,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  }
                },
                {
                  "id_plan_nutricional": 1,
                  "id_dia": 5,
                  "created_at": "2022-06-17T03:30:24.000000Z",
                  "updated_at": "2022-06-17T03:30:24.000000Z",
                  "id": 5,
                  "calorias": 1683.2636363636361,
                  "desayuno": {
                    "comida": {
                      "id_plan_diario": 5,
                      "comida": "desayuno",
                      "created_at": "2022-06-17T03:30:24.000000Z",
                      "updated_at": "2022-06-17T03:30:24.000000Z",
                      "id": 13
                    },
                    "bebida": {
                      "id": 2,
                      "nombre": "Chocolate",
                      "porcion": "300 ml",
                      "comidaDelDia": "manana-tarde",
                      "calorias": 267,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 28,
                        "nombre": "Nata",
                        "porcion": "100 gramos",
                        "calorias": 204,
                        "id_tipo": 4,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 32,
                        "nombre": "Salmón",
                        "porcion": "200 gramos",
                        "calorias": 274,
                        "id_tipo": 5,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  },
                  "almuerzo": {
                    "comida": {
                      "id_plan_diario": 5,
                      "comida": "almuerzo",
                      "created_at": "2022-06-17T03:30:25.000000Z",
                      "updated_at": "2022-06-17T03:30:25.000000Z",
                      "id": 14
                    },
                    "bebida": {
                      "id": 5,
                      "nombre": "Limonada",
                      "porcion": "300 ml",
                      "comidaDelDia": "mediodia",
                      "calorias": 126,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 5,
                        "nombre": "Pan dulce",
                        "porcion": "60 gramos",
                        "calorias": 220,
                        "id_tipo": 1,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 8,
                        "nombre": "Zanahorias",
                        "porcion": "235 gramos",
                        "calorias": 100,
                        "id_tipo": 2,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 14,
                        "nombre": "Manzana",
                        "porcion": "100 gramos",
                        "calorias": 52,
                        "id_tipo": 3,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 25,
                        "nombre": "Queso mozzarella ",
                        "porcion": "100 gramos",
                        "calorias": 330,
                        "id_tipo": 4,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  },
                  "cena": {
                    "comida": {
                      "id_plan_diario": 5,
                      "comida": "cena",
                      "created_at": "2022-06-17T03:30:25.000000Z",
                      "updated_at": "2022-06-17T03:30:25.000000Z",
                      "id": 15
                    },
                    "bebida": {
                      "id": 3,
                      "nombre": "Leche chocolatada",
                      "porcion": "300 ml",
                      "comidaDelDia": "manana-tarde",
                      "calorias": 267,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 40,
                        "nombre": "Frijoles blancos cocidos",
                        "porcion": "200 gramos",
                        "calorias": 278,
                        "id_tipo": 5,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 5,
                        "nombre": "Pan dulce",
                        "porcion": "60 gramos",
                        "calorias": 220,
                        "id_tipo": 1,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  }
                },
                {
                  "id_plan_nutricional": 1,
                  "id_dia": 6,
                  "created_at": "2022-06-17T03:30:25.000000Z",
                  "updated_at": "2022-06-17T03:30:25.000000Z",
                  "id": 6,
                  "calorias": 1683.2636363636361,
                  "desayuno": {
                    "comida": {
                      "id_plan_diario": 6,
                      "comida": "desayuno",
                      "created_at": "2022-06-17T03:30:26.000000Z",
                      "updated_at": "2022-06-17T03:30:26.000000Z",
                      "id": 16
                    },
                    "bebida": {
                      "id": 4,
                      "nombre": "Leche",
                      "porcion": "300 ml",
                      "comidaDelDia": "manana-tarde",
                      "calorias": 183,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 12,
                        "nombre": "Pepino",
                        "porcion": "100 gramos",
                        "calorias": 15,
                        "id_tipo": 2,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 17,
                        "nombre": "Plátano",
                        "porcion": "100 gramos",
                        "calorias": 88,
                        "id_tipo": 3,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 27,
                        "nombre": "Queso cheddar",
                        "porcion": "100 gramos",
                        "calorias": 403,
                        "id_tipo": 4,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  },
                  "almuerzo": {
                    "comida": {
                      "id_plan_diario": 6,
                      "comida": "almuerzo",
                      "created_at": "2022-06-17T03:30:26.000000Z",
                      "updated_at": "2022-06-17T03:30:26.000000Z",
                      "id": 17
                    },
                    "bebida": {
                      "id": 5,
                      "nombre": "Limonada",
                      "porcion": "300 ml",
                      "comidaDelDia": "mediodia",
                      "calorias": 126,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 31,
                        "nombre": "Atún",
                        "porcion": "200 gramos",
                        "calorias": 388,
                        "id_tipo": 5,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 5,
                        "nombre": "Pan dulce",
                        "porcion": "60 gramos",
                        "calorias": 220,
                        "id_tipo": 1,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  },
                  "cena": {
                    "comida": {
                      "id_plan_diario": 6,
                      "comida": "cena",
                      "created_at": "2022-06-17T03:30:26.000000Z",
                      "updated_at": "2022-06-17T03:30:26.000000Z",
                      "id": 18
                    },
                    "bebida": {
                      "id": 1,
                      "nombre": "Cafe",
                      "porcion": "300 ml",
                      "comidaDelDia": "manana-tarde",
                      "calorias": 3,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 12,
                        "nombre": "Pepino",
                        "porcion": "100 gramos",
                        "calorias": 15,
                        "id_tipo": 2,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 23,
                        "nombre": "Uvas",
                        "porcion": "200 gramos",
                        "calorias": 140,
                        "id_tipo": 3,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 28,
                        "nombre": "Nata",
                        "porcion": "100 gramos",
                        "calorias": 204,
                        "id_tipo": 4,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 38,
                        "nombre": "Semillas de mijo",
                        "porcion": "100 gramos",
                        "calorias": 360,
                        "id_tipo": 5,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  }
                },
                {
                  "id_plan_nutricional": 1,
                  "id_dia": 7,
                  "created_at": "2022-06-17T03:30:27.000000Z",
                  "updated_at": "2022-06-17T03:30:27.000000Z",
                  "id": 7,
                  "calorias": 1683.2636363636361,
                  "desayuno": {
                    "comida": {
                      "id_plan_diario": 7,
                      "comida": "desayuno",
                      "created_at": "2022-06-17T03:30:27.000000Z",
                      "updated_at": "2022-06-17T03:30:27.000000Z",
                      "id": 19
                    },
                    "bebida": {
                      "id": 1,
                      "nombre": "Cafe",
                      "porcion": "300 ml",
                      "comidaDelDia": "manana-tarde",
                      "calorias": 3,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 3,
                        "nombre": "Arroz frito",
                        "porcion": "10 gramos",
                        "calorias": 163,
                        "id_tipo": 1,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 12,
                        "nombre": "Pepino",
                        "porcion": "100 gramos",
                        "calorias": 15,
                        "id_tipo": 2,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 21,
                        "nombre": "Ciruela",
                        "porcion": "100 gramos",
                        "calorias": 47,
                        "id_tipo": 3,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 27,
                        "nombre": "Queso cheddar",
                        "porcion": "100 gramos",
                        "calorias": 403,
                        "id_tipo": 4,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  },
                  "almuerzo": {
                    "comida": {
                      "id_plan_diario": 7,
                      "comida": "almuerzo",
                      "created_at": "2022-06-17T03:30:28.000000Z",
                      "updated_at": "2022-06-17T03:30:28.000000Z",
                      "id": 20
                    },
                    "bebida": {
                      "id": 6,
                      "nombre": "Jugo de naranja natural",
                      "porcion": "300 ml",
                      "comidaDelDia": "mediodia",
                      "calorias": 146,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 36,
                        "nombre": "Tofu",
                        "porcion": "200 gramos",
                        "calorias": 152,
                        "id_tipo": 5,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 5,
                        "nombre": "Pan dulce",
                        "porcion": "60 gramos",
                        "calorias": 220,
                        "id_tipo": 1,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 8,
                        "nombre": "Zanahorias",
                        "porcion": "235 gramos",
                        "calorias": 100,
                        "id_tipo": 2,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  },
                  "cena": {
                    "comida": {
                      "id_plan_diario": 7,
                      "comida": "cena",
                      "created_at": "2022-06-17T03:30:28.000000Z",
                      "updated_at": "2022-06-17T03:30:28.000000Z",
                      "id": 21
                    },
                    "bebida": {
                      "id": 2,
                      "nombre": "Chocolate",
                      "porcion": "300 ml",
                      "comidaDelDia": "manana-tarde",
                      "calorias": 267,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z"
                    },
                    "alimentos": [
                      {
                        "id": 15,
                        "nombre": "Piña",
                        "porcion": "100 gramos",
                        "calorias": 55,
                        "id_tipo": 3,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 28,
                        "nombre": "Nata",
                        "porcion": "100 gramos",
                        "calorias": 204,
                        "id_tipo": 4,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      },
                      {
                        "id": 32,
                        "nombre": "Salmón",
                        "porcion": "200 gramos",
                        "calorias": 274,
                        "id_tipo": 5,
                        "created_at": "2022-06-17T03:17:01.000000Z",
                        "updated_at": "2022-06-17T03:17:01.000000Z"
                      }
                    ]
                  }
                }
              ]
            },
            "planEjercicios": {
              "id_plan": 1,
              "created_at": "2022-06-17T03:30:14.000000Z",
              "updated_at": "2022-06-17T03:30:14.000000Z",
              "id": 1,
              "planesDiarios": [
                {
                  "id_plan_ejercicio": 1,
                  "id_dia": 1,
                  "created_at": "2022-06-17T03:30:30.000000Z",
                  "updated_at": "2022-06-17T03:30:30.000000Z",
                  "id": 8,
                  "ejercicios": [
                    {
                      "id": 5,
                      "nombre": "Los abdominales cruzados",
                      "descripcion": "Los abdominales cruzados te permiten tonificar el abdomen y reducir la grasa que se encuentra almacenada en la cintura. Es esencial hacer este ejercicio en cada sesión para moldear la figura y tonificar los músculos, pero debes tener cuidado para evitar lesiones.",
                      "id_area_enfoque": 1,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z",
                      "minutos_duracion": 20
                    },
                    {
                      "id": 18,
                      "nombre": "Eliminar la papada con rotación de cabeza",
                      "descripcion": "El siguiente ejercicio para reducir la grasa y la flacidez acumulada debajo de la barbilla consistirá en realizar movimientos rotacionales con nuestra cabeza.",
                      "id_area_enfoque": 4,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z",
                      "minutos_duracion": 20
                    },
                    {
                      "id": 19,
                      "nombre": "Elimina la papada con la cara de bulldog",
                      "descripcion": "Un ejercicio para eliminar la papada sin cirugía divertido y muy, muy eficaz. Si se llama así, es porque este ejercicio consiste en hacer un gesto parecido a la expresión facial de un perro bulldog.",
                      "id_area_enfoque": 4,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z",
                      "minutos_duracion": 20
                    }
                  ]
                },
                {
                  "id_plan_ejercicio": 1,
                  "id_dia": 2,
                  "created_at": "2022-06-17T03:30:31.000000Z",
                  "updated_at": "2022-06-17T03:30:31.000000Z",
                  "id": 9,
                  "ejercicios": [
                    {
                      "id": 1,
                      "nombre": "El puente",
                      "descripcion": "Con este ejercicio desarrollarás los músculos abdominales inferiores y también la estabilidad general del cuerpo.  Aguanta en esta postura durante 30 segundos y descansa otros 15 segundos entre serie y serie.",
                      "id_area_enfoque": 1,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z",
                      "minutos_duracion": 20
                    },
                    {
                      "id": 18,
                      "nombre": "Eliminar la papada con rotación de cabeza",
                      "descripcion": "El siguiente ejercicio para reducir la grasa y la flacidez acumulada debajo de la barbilla consistirá en realizar movimientos rotacionales con nuestra cabeza.",
                      "id_area_enfoque": 4,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z",
                      "minutos_duracion": 20
                    },
                    {
                      "id": 19,
                      "nombre": "Elimina la papada con la cara de bulldog",
                      "descripcion": "Un ejercicio para eliminar la papada sin cirugía divertido y muy, muy eficaz. Si se llama así, es porque este ejercicio consiste en hacer un gesto parecido a la expresión facial de un perro bulldog.",
                      "id_area_enfoque": 4,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z",
                      "minutos_duracion": 20
                    }
                  ]
                },
                {
                  "id_plan_ejercicio": 1,
                  "id_dia": 3,
                  "created_at": "2022-06-17T03:30:31.000000Z",
                  "updated_at": "2022-06-17T03:30:31.000000Z",
                  "id": 10,
                  "ejercicios": [
                    {
                      "id": 2,
                      "nombre": "La bisagra",
                      "descripcion": "Son abdominales que se realizan desde la rodilla hasta el codo. Con este ejercicio vas a trabajar los músculos bajos de la espalda, además de todos los abdominales.  Realiza tres series de 20 repeticiones cada una descansando 30 segundos.",
                      "id_area_enfoque": 1,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z",
                      "minutos_duracion": 20
                    },
                    {
                      "id": 19,
                      "nombre": "Elimina la papada con la cara de bulldog",
                      "descripcion": "Un ejercicio para eliminar la papada sin cirugía divertido y muy, muy eficaz. Si se llama así, es porque este ejercicio consiste en hacer un gesto parecido a la expresión facial de un perro bulldog.",
                      "id_area_enfoque": 4,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z",
                      "minutos_duracion": 20
                    },
                    {
                      "id": 20,
                      "nombre": "Quita la papada sacando la lengua",
                      "descripcion": "Otro ejercicio muy efectivo para reducir la grasa acumulada en la papada poco a poco es realizar algunos movimientos con la lengua.",
                      "id_area_enfoque": 4,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z",
                      "minutos_duracion": 20
                    }
                  ]
                },
                {
                  "id_plan_ejercicio": 1,
                  "id_dia": 4,
                  "created_at": "2022-06-17T03:30:32.000000Z",
                  "updated_at": "2022-06-17T03:30:32.000000Z",
                  "id": 11,
                  "ejercicios": [
                    {
                      "id": 1,
                      "nombre": "El puente",
                      "descripcion": "Con este ejercicio desarrollarás los músculos abdominales inferiores y también la estabilidad general del cuerpo.  Aguanta en esta postura durante 30 segundos y descansa otros 15 segundos entre serie y serie.",
                      "id_area_enfoque": 1,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z",
                      "minutos_duracion": 20
                    },
                    {
                      "id": 3,
                      "nombre": "La plancha abdominal",
                      "descripcion": "Coloca el cuerpo en posición horizontal respecto al suelo y apoya el peso en los antebrazos y en la punta de los pies. Este ejercicio te ayuda a mejorar la resistencia física, el equilibrio, la fuerza y la concentración.",
                      "id_area_enfoque": 1,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z",
                      "minutos_duracion": 20
                    },
                    {
                      "id": 18,
                      "nombre": "Eliminar la papada con rotación de cabeza",
                      "descripcion": "El siguiente ejercicio para reducir la grasa y la flacidez acumulada debajo de la barbilla consistirá en realizar movimientos rotacionales con nuestra cabeza.",
                      "id_area_enfoque": 4,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z",
                      "minutos_duracion": 20
                    }
                  ]
                },
                {
                  "id_plan_ejercicio": 1,
                  "id_dia": 5,
                  "created_at": "2022-06-17T03:30:32.000000Z",
                  "updated_at": "2022-06-17T03:30:32.000000Z",
                  "id": 12,
                  "ejercicios": [
                    {
                      "id": 5,
                      "nombre": "Los abdominales cruzados",
                      "descripcion": "Los abdominales cruzados te permiten tonificar el abdomen y reducir la grasa que se encuentra almacenada en la cintura. Es esencial hacer este ejercicio en cada sesión para moldear la figura y tonificar los músculos, pero debes tener cuidado para evitar lesiones.",
                      "id_area_enfoque": 1,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z",
                      "minutos_duracion": 20
                    },
                    {
                      "id": 16,
                      "nombre": "Quitar la papada besando el techo",
                      "descripcion": "Uno de los ejercicios más efectivos y sencillos para la flacidez del cuello se conoce como el beso o besar el techo, ya que consiste en elevar la cabeza y lanzar un beso al aire mirando hacia el techo.",
                      "id_area_enfoque": 4,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z",
                      "minutos_duracion": 20
                    },
                    {
                      "id": 20,
                      "nombre": "Quita la papada sacando la lengua",
                      "descripcion": "Otro ejercicio muy efectivo para reducir la grasa acumulada en la papada poco a poco es realizar algunos movimientos con la lengua.",
                      "id_area_enfoque": 4,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z",
                      "minutos_duracion": 20
                    }
                  ]
                },
                {
                  "id_plan_ejercicio": 1,
                  "id_dia": 6,
                  "created_at": "2022-06-17T03:30:33.000000Z",
                  "updated_at": "2022-06-17T03:30:33.000000Z",
                  "id": 13,
                  "ejercicios": [
                    {
                      "id": 2,
                      "nombre": "La bisagra",
                      "descripcion": "Son abdominales que se realizan desde la rodilla hasta el codo. Con este ejercicio vas a trabajar los músculos bajos de la espalda, además de todos los abdominales.  Realiza tres series de 20 repeticiones cada una descansando 30 segundos.",
                      "id_area_enfoque": 1,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z",
                      "minutos_duracion": 20
                    },
                    {
                      "id": 5,
                      "nombre": "Los abdominales cruzados",
                      "descripcion": "Los abdominales cruzados te permiten tonificar el abdomen y reducir la grasa que se encuentra almacenada en la cintura. Es esencial hacer este ejercicio en cada sesión para moldear la figura y tonificar los músculos, pero debes tener cuidado para evitar lesiones.",
                      "id_area_enfoque": 1,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z",
                      "minutos_duracion": 20
                    },
                    {
                      "id": 19,
                      "nombre": "Elimina la papada con la cara de bulldog",
                      "descripcion": "Un ejercicio para eliminar la papada sin cirugía divertido y muy, muy eficaz. Si se llama así, es porque este ejercicio consiste en hacer un gesto parecido a la expresión facial de un perro bulldog.",
                      "id_area_enfoque": 4,
                      "created_at": "2022-06-17T03:17:01.000000Z",
                      "updated_at": "2022-06-17T03:17:01.000000Z",
                      "minutos_duracion": 20
                    }
                  ]
                }
              ]
            }
          }');

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

        Mail::to("josedavid95guzman@gmail.com")->send(new NotifyMail($pdf));

        return view('home');
    } 
}
