@extends('layouts.app')

@section('content')
    
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script type="application/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" setup></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <div class="container">
        <div class="row justify-content-center" style="background-image: url(https://wallpaperaccess.com/full/4722377.jpg);
        background-size: cover;">
          

            <form id="regForm" data-action="{{ url('saveinformation') }}"  method="post">

                
                
                <!-- One "tab" for each step in the form: -->
                <div class="tab"><h1>Informacion Personal:</h1>
                    <p><input placeholder="Nombre..." oninput="this.className = ''" name="nombre"></p>
                    <p><input placeholder="Apellido..." oninput="this.className = ''" name="apellido"></p>
                    <p><input placeholder="Telefono..." oninput="this.className = ''" name="telefono"></p>
                    
                  <p><input placeholder="Estatura..." oninput="this.className = ''" name="estatura" type="number"></p>
                  <p><input placeholder="Edad..." oninput="this.className = ''" name="edad"  type="number"></p>
                  <p><input placeholder="Peso Actual Lb..." oninput="this.className = ''" name="pesoActual"  type="number"></p>
                  <p><input placeholder="Peso Deseado Lb..." oninput="this.className = ''" name="pesoDeseado"  type="number"></p>
                  <p><label>SEXO:</label></p>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="masculino" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      MASCULINO
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2" value="femenino">
                    <label class="form-check-label" for="exampleRadios2">
                     FEMENINO
                    </label>
                  </div>
                </div>
                
                <div class="tab"><h1>Plan alimenticio:</h1><br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                          SOLO CARNES
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                         VEGETARIANO
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                        <label class="form-check-label" for="exampleRadios3">
                          TODOS
                        </label>
                      </div>
                      <br>
                      <br>
                  <p><input placeholder="Comidas Alergicas" oninput="this.className = ''" name="comidaalergica"></p>
                  <p><input placeholder="Comidas No Gratas" oninput="this.className = ''" name="comidanograta"></p>
                </div>
                
                <div class="tab">
                    <h1>PARTES ENFOCADAS:</h1>
                    @foreach ($data as $area)
                    <div class="form-check">
                       
                        <input class="form-check-input" type="checkbox" value="{{ $area->id }}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $area->nombre }}
                        </label>
                      </div>
                      
                      @endforeach
                      
  
                </div>
               
                
                <div class="tab">Rutina:
                 
                  <p><input placeholder="Impedimentos..." oninput="this.className = ''" name="Impedimentos"></p>
                  <p><input placeholder="Cuantas Horas Sueles tener al dia para cocinar..." oninput="this.className = ''" name="horasParaCocinar" type="number"></p>
                  <p><input placeholder="Cuantas Horas Sueles tener al dia para hacer ejercicio..." oninput="this.className = ''" name="horasParaEjercicio" type="number"></p>
                  <p><input placeholder="Cuantas veces a la semana entrenas..." oninput="this.className = ''" name="alasemana"></p>
               
                </div>
                
                <div style="overflow:auto;">
                  <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-secondary">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-primary">Siguiente</button>
                  </div>
                </div>
                
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                  <span class="step"></span>
                  <span class="step"></span>
                  <span class="step"></span>
                  <span class="step"></span>
                </div>
                
                </form>
        </div>
        <script type="application/javascript">
            $(document).ready(function(){
var form = '#regForm';
var isloading=false;
if(!isloading){
$(form).on('submit', function(event){
    event.preventDefault();
    
    var url = $(this).attr('data-action');
    isloading=true;
    event.preventDefault();
    $.ajax({
        url: url,
        method: 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success:function(response)
        {
            $(form).trigger("reset");
            alert("recibira un documento a su correo");
            location.reload();
        },
        error: function(response) {
        }
    });
});
}
});
            var currentTab = 0; // Current tab is set to be the first tab (0)
            showTab(currentTab); // Display the current tab
            
            function showTab(n) {
              // This function will display the specified tab of the form...
              var x = document.getElementsByClassName("tab");
              x[n].style.display = "block";
              //... and fix the Previous/Siguiente buttons:
              if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
              } else {
                document.getElementById("prevBtn").style.display = "inline";
              }
              if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
               
              
              } else {
                document.getElementById("nextBtn").innerHTML = "Siguiente";
            
              }
              //... and run a function that will display the correct step indicator:
              fixStepIndicator(n)
            }
            
            function nextPrev(n) {
              // This function will figure out which tab to display
              var x = document.getElementsByClassName("tab");
              // Exit the function if any field in the current tab is invalid:
              if (n == 1 && !validateForm()) return false;
              // Hide the current tab:
              x[currentTab].style.display = "none";
              // Increase or decrease the current tab by 1:
              currentTab = currentTab + n;
              // if you have reached the end of the form...
              if (currentTab >= x.length) {
                // ... the form gets submitted:
                $('#nextBtn').removeAttr("type").attr("type", "submit");
                $('#nextBtn').click();
                return false;
              }
              // Otherwise, display the correct tab:
              showTab(currentTab);
            }
            
            function validateForm() {
              // This function deals with validation of the form fields
              var x, y, i, valid = true;
              x = document.getElementsByClassName("tab");
              y = x[currentTab].getElementsByTagName("input");
              // A loop that checks every input field in the current tab:
              for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                  // add an "invalid" class to the field:
                  y[i].className += " invalid";
                  // and set the current valid status to false
                  valid = false;
                }
              }
              // If the valid status is true, mark the step as finished and valid:
              if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
              }
              return valid; // return the valid status
            }
            
            function fixStepIndicator(n) {
              // This function removes the "active" class of all steps...
              var i, x = document.getElementsByClassName("step");
              for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
              }
              //... and adds the "active" class on the current step:
              x[n].className += " active";
            }
            </script>
        </div>
    </div>
@endsection