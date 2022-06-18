<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  border-color: #50D07B;
  font-family: 'Consolas';
}

.header {
  background-color: #50D07B;
}
th {
  padding:5px;
  border:2px #50D07B;  
}
td {
   padding:5px;
}
table td {
 vertical-align:top;
}
    </style>

<h4>Cliente:{{$cliente}}</h4>
<table style="margin-bottom:10px">
  <tr>
    <td>Fecha Inicio:</td>
     <td>{{$fechaInicio}}</td>
     <td>Fecha Finalizacion:</td>
     <td>{{$fechaFin}}</td>
     <td>Meses de Duracion:</td>
     <td>{{$mesDuracion*30}}</td>
  </tr>  
</table>

<h4>PLAN NUTRICIONAL</h4>

@foreach ($planesDiarios as $planDiario)
    
    <table style="margin-top: 10px; width:100%"">
      
        @if($planDiario->id_dia===1)
          <tr align="center">
              <td colspan="3">LUNES</td>
          </tr>
        @endif
        @if($planDiario->id_dia===2)
          <tr align="center">
              <td colspan="3">MARTES</td>
          </tr>
        @endif
        @if($planDiario->id_dia===3)
          <tr align="center">
              <td colspan="3">MIERCOLES</td>
          </tr>
        @endif
        @if($planDiario->id_dia===4)
          <tr align="center">
              <td colspan="3">JUEVES</td>
          </tr>
        @endif
        @if($planDiario->id_dia===5)
          <tr align="center">
              <td colspan="3">VIERNES</td>
          </tr>
        @endif
        @if($planDiario->id_dia===6)
          <tr align="center">
              <td colspan="3">SABADO</td>
          </tr>
        @endif
        @if($planDiario->id_dia===7)
        <tr align="center">
            <td colspan="3">DOMINGO</td>
        </tr>
      @endif

        <tr class="header">
          <th>Desayuno</th>
          <th>Almuerzo</th>
          <th>Cena</th>
        </tr>
        <tr>
          <td>
            <strong><u>Bebida</u></strong>
            <ul>
            <li><strong>Nombre: </strong>{{$planDiario->desayuno->bebida->nombre}}</li>
            <li><strong>Porcion: </strong>{{$planDiario->desayuno->bebida->porcion}}</li>
            <li><strong>Tipo: </strong>{{$planDiario->desayuno->bebida->comidaDelDia}}</li>
            <li><strong>Calorias: </strong>{{$planDiario->desayuno->bebida->calorias}}</li>
            </ul>
            <strong><u>Alimentos</u></strong>
            @foreach($planDiario->desayuno->alimentos as $alimento)
            <ul>
              <li><strong>Nombre: </strong>{{$alimento->nombre}}</li>
              <li><strong>Porcion: </strong>{{$alimento->porcion}}</li>
              <li><strong>Calorias: </strong>{{$alimento->calorias}}</li>
            </ul>
            @endforeach
          </td>
          <td>
            <strong><u>Bebida</u></strong>
            <ul>
              <li><strong>Nombre: </strong>{{$planDiario->almuerzo->bebida->nombre}}</li>
              <li><strong>Porcion: </strong>{{$planDiario->almuerzo->bebida->porcion}}</li>
              <li><strong>Tipo: </strong>{{$planDiario->almuerzo->bebida->comidaDelDia}}</li>
              <li><strong>Calorias: </strong>{{$planDiario->almuerzo->bebida->calorias}}</li>
            </ul>
            <strong><u>Alimentos</u></strong>
            @foreach($planDiario->almuerzo->alimentos as $alimento)
            <ul>
              <li><strong>Nombre: </strong>{{$alimento->nombre}}</li>
              <li><strong>Porcion: </strong>{{$alimento->porcion}}</li>
              <li><strong>Calorias: </strong>{{$alimento->calorias}}</li>
            </ul>
            @endforeach
          </td>
          <td>
            <strong><u>Bebida</u></strong>
            <ul>
              <li><strong>Nombre: </strong>{{$planDiario->cena->bebida->nombre}}</li>
              <li><strong>Porcion: </strong>{{$planDiario->cena->bebida->porcion}}</li>
              <li><strong>Tipo: </strong>{{$planDiario->cena->bebida->comidaDelDia}}</li>
              <li><strong>Calorias: </strong>{{$planDiario->cena->bebida->calorias}}</li>
            </ul>
            <strong><u>Alimentos</u></strong>
            @foreach($planDiario->cena->alimentos as $alimento)
            <ul>
              <li><strong>Nombre: </strong>{{$alimento->nombre}}</li>
              <li><strong>Porcion: </strong>{{$alimento->porcion}}</li>
              <li><strong>Calorias: </strong>{{$alimento->calorias}}</li>
            </ul>
            @endforeach
          </td>
          </td>
        </tr>
      </table>
@endforeach


<h4>PLAN DE EJERCICIOS</h4>

@foreach ($planesEjercicios as $planDiario)
    <table style="margin-top: 10px; width:100%">
        @if($planDiario->id_dia===1)
          <tr align="center">
              <td colspan="1">LUNES</td>
          </tr>
        @endif
        @if($planDiario->id_dia===2)
          <tr align="center">
              <td colspan="1">MARTES</td>
          </tr>
        @endif
        @if($planDiario->id_dia===3)
          <tr align="center">
              <td colspan="1">MIERCOLES</td>
          </tr>
        @endif
        @if($planDiario->id_dia===4)
          <tr align="center">
              <td colspan="1">JUEVES</td>
          </tr>
        @endif
        @if($planDiario->id_dia===5)
          <tr align="center">
              <td colspan="1">VIERNES</td>
          </tr>
        @endif
        @if($planDiario->id_dia===6)
          <tr align="center">
              <td colspan="1">SABADO</td>
          </tr>
        @endif
        @if($planDiario->id_dia===7)
        <tr align="center">
            <td colspan="1">DOMINGO</td>
        </tr>
      @endif

        <tr class="header">
          <th>Ejercicios</th>
        </tr>
        <tr>
          <td>
            @foreach($planDiario->ejercicios as $ejercicio)
                <ul>
                  <li><strong>Nombre: </strong>{{$ejercicio->nombre}}</li>
                  <li><strong>Descripcion: </strong>{{$ejercicio->nombre}}</li>
                  <li><strong>Tiempo : </strong>{{$ejercicio->nombre}} Minutos</li>
                </ul>
            @endforeach
          </td>
        </tr>
      </table>
@endforeach
    </body>
</html>