<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EjercicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("ejercicios")->insert([
            [
                "nombre" => "El puente",
                "descripcion" => "Con este ejercicio desarrollarás los músculos abdominales inferiores y también la estabilidad general del cuerpo.  Aguanta en esta postura durante 30 segundos y descansa otros 15 segundos entre serie y serie.",
                "id_area_enfoque" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "La bisagra",
                "descripcion" => "Son abdominales que se realizan desde la rodilla hasta el codo. Con este ejercicio vas a trabajar los músculos bajos de la espalda, además de todos los abdominales.  Realiza tres series de 20 repeticiones cada una descansando 30 segundos.",
                "id_area_enfoque" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "La plancha abdominal",
                "descripcion" => "Coloca el cuerpo en posición horizontal respecto al suelo y apoya el peso en los antebrazos y en la punta de los pies. Este ejercicio te ayuda a mejorar la resistencia física, el equilibrio, la fuerza y la concentración.",
                "id_area_enfoque" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Las flexiones de piernas",
                "descripcion" => "Los ejercicios de flexiones de piernas requieren de mucha resistencia, pero son ideales para tonificar el abdomen y también para trabajar los músculos, porque la tensión recae en esa parte del cuerpo.",
                "id_area_enfoque" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Los abdominales cruzados",
                "descripcion" => "Los abdominales cruzados te permiten tonificar el abdomen y reducir la grasa que se encuentra almacenada en la cintura. Es esencial hacer este ejercicio en cada sesión para moldear la figura y tonificar los músculos, pero debes tener cuidado para evitar lesiones.",
                "id_area_enfoque" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Flexión de codos de pie con mancuernas",
                "descripcion" => "Con estos ejercicios para bíceps puedes trabajar ambos brazos al mismo tiempo. También se utilizan mancuernas.",
                "id_area_enfoque" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Flexiones de brazos",
                "descripcion" => "Las flexiones están en el grupo de ejercicios de brazos más completos que puedes realizar, debido a que trabajan conjuntamente bíceps, pecho, hombros y algunas zonas del tronco.",
                "id_area_enfoque" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Bíceps con estocada posterior",
                "descripcion" => "Combina los ejercicios para bíceps con estocadas, pues es una buena opción para trabajar otros músculos. Separa los pies al ancho de las caderas. Luego, toma una mancuerna con cada mano y deja los brazos estirados. Cruza la pierna derecha por detrás de la izquierda y luego dobla la rodilla hasta que el muslo izquierdo quede paralelo al suelo. Al mismo tiempo, flexiona los codos para llevar las mancuernas a la altura de los hombros.",
                "id_area_enfoque" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Plancha",
                "descripcion" => "Las planchas son consideradas como otro ejercicio efectivo, ideal  incluso para las personas que no tienen un gran ritmo de entrenamiento",
                "id_area_enfoque" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Dominadas supinas",
                "descripcion" => "Con este tipo de ejercicios para bíceps se necesita una barra. Además, lo puedes realizar al aire libre, en casa o en el gimnasio. Con ambas manos y las palmas dirigidas hacia tu cuerpo, cuélgate de la barra sin estirar completamente los brazos. Flexiona el brazo para subir el mentón por encima de la barra. Baja de manera controlada el cuerpo hasta la posición inicial.",
                "id_area_enfoque" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Sentadillas",
                "descripcion" => "Es un ejercicio para piernas muy común. Consiste en colocarse de pie, con los brazos a los lados, las piernas extendidas en línea con los hombros y los dedos de los pies ligeramente hacia afuera.",
                "id_area_enfoque" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Zancadas",
                "descripcion" => "Dentro del entrenamiento de piernas que practiques en casa no deben faltar las zancadas, ya que este ejercicio particularmente te ayudará mucho a tonificar tus muslos y glúteos.",
                "id_area_enfoque" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Step Ups",
                "descripcion" => "Anímate a poner la mejor música en casa para practicar este entretenido ejercicio que te ayudará a fortalecer las piernas. El Step se trabaja por medio de ejercicios sobre un escalón o plataforma, en el deberás subir y bajar continuamente, lo puedes combinar con ejercicios aeróbicos para lograr mejores resultados.",
                "id_area_enfoque" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Zancada lateral",
                "descripcion" => "Parecida a la zancada simple que comentamos inicialmente, esta debe ser realizada a un lado. Es un ejercicio para piernas para hacer en casa siendo además, muy efectivo, ya que te ayudará a tonificar los cuádriceps, muslos y glúteos.",
                "id_area_enfoque" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Peso muerto a una pierna",
                "descripcion" => "Este es un excelente ejercicio de piernas para hacer en casa, donde pondrás a prueba tu equilibrio mientras ejercitas gran cantidad de grupos musculares. Coloca las piernas ligeramente flexionadas, y lleva una pierna hacia atrás mientras inclinas el cuerpo hacia el suelo, soportando el peso con una sola pierna.",
                "id_area_enfoque" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Quitar la papada besando el techo",
                "descripcion" => "Uno de los ejercicios más efectivos y sencillos para la flacidez del cuello se conoce como el beso o besar el techo, ya que consiste en elevar la cabeza y lanzar un beso al aire mirando hacia el techo.",
                "id_area_enfoque" => 4,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Quitar la papada con la boca abierta",
                "descripcion" => "El siguiente ejercicio para quitar la papada consiste en abrir la boca todo lo que puedas, ya que con este gesto puede conseguir que, poco a poco, se tonifique la piel flácida de la zona del cuello.",
                "id_area_enfoque" => 4,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Eliminar la papada con rotación de cabeza",
                "descripcion" => "El siguiente ejercicio para reducir la grasa y la flacidez acumulada debajo de la barbilla consistirá en realizar movimientos rotacionales con nuestra cabeza.",
                "id_area_enfoque" => 4,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Elimina la papada con la cara de bulldog",
                "descripcion" => "Un ejercicio para eliminar la papada sin cirugía divertido y muy, muy eficaz. Si se llama así, es porque este ejercicio consiste en hacer un gesto parecido a la expresión facial de un perro bulldog.",
                "id_area_enfoque" => 4,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Quita la papada sacando la lengua",
                "descripcion" => "Otro ejercicio muy efectivo para reducir la grasa acumulada en la papada poco a poco es realizar algunos movimientos con la lengua.",
                "id_area_enfoque" => 4,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Puente de glúteos",
                "descripcion" => "El movimiento básico consiste en tumbarnos boca arriba con las rodillas flexionadas y las plantas de los píes apoyadas en el suelo. Desde esta posición, deberemos realizar una elevación de cadera contrayendo los glúteos en la parte final del movimiento.",
                "id_area_enfoque" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Patada de glúteo",
                "descripcion" => " realizaremos el típico movimiento de dar una patada hacia atrás (también hay quien dice que es como si diéramos una coz)",
                "id_area_enfoque" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Zancada o sentadilla búlgara",
                "descripcion" => "La forma más básica de realizar el ejercicio es partiendo de una posición de pie con las manos a los costados y realizando una zancada hacia delante de tal forma que la rodilla de la pierna que se adelanta queda flexionada a 90 grados aproximadamente.",
                "id_area_enfoque" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Hip Thrust",
                "descripcion" => "La secuencia a realizar para este ejercicio es la siguiente: partimos de una posición sentados en el suelo con nuestra espalda pegada al borde del banco y las rodillas flexionadas. Al tiempo que vamos realizando una elevación de cadera, nuestros hombros deben ir situándose sobre el banco",
                "id_area_enfoque" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "El perrito",
                "descripcion" => "Esta postura conocida como el perrito, tiene un mecanismo bastante sencillo de realizar: partiendo de la posición de cuadrupedia, elevaremos una de nuestras piernas con la rodilla flexionada aproximadamente a 90 grados",
                "id_area_enfoque" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Dominadas deslizantes",
                "descripcion" => "Colócate en el suelo bocabajo con las palmas de las manos hacia abajo también. Utiliza las manos como ventosas y desliza lentamente el cuerpo hacia delante y hacia atrás haciendo fuerza con la espalda.",
                "id_area_enfoque" => 6,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Remo invertido",
                "descripcion" => "Colócate debajo de la silla o de la mesa y sujeta con las dos manos la superficie. Levanta el peso con la ayuda de los brazos y los músculos de la espalda.",
                "id_area_enfoque" => 6,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Plancha abdominal",
                "descripcion" => "Colócate boca arriba con los pies apoyados en el suelo y la cadera levantada. La idea es colocar los brazos en el suelo con el antebrazo en lo alto y, con la ayuda de los brazos y la espalda, ejerce una fuerza que consiga elevar ligeramente el torso del suelo. Mantente en esta posición unos segundos y repite la serie.",
                "id_area_enfoque" => 6,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Remo con banda elástica",
                "descripcion" => "Solo deberás sentarte en el suelo con las piernas estiradas. Coloca la banda en tus pies y, con la espalda recta, tirar de la banda para atrás simulando el movimiento del remo. Repite la serie 10 veces y haz un descanso cuando termines.",
                "id_area_enfoque" => 6,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Rodillas al pecho",
                "descripcion" => "Túmbate boca arriba, dobla las rodillas y abrázalas ligeramente contra el pecho. Realiza giros hacia los laterales para relajar la espalda.",
                "id_area_enfoque" => 6,
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
