@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            
            <dashboard role={{$role}}/>
        </div>
    </div>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script type="application/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" setup></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <div class="container">
        <div class="row justify-content-center">
          

            <form id="regForm" data-action="{{ url('saveinformation') }}"  method="post">

                <h1>Information:</h1>
                
                <!-- One "tab" for each step in the form: -->
                <div class="tab">Personal Information:
                  <p><input placeholder="First name..." oninput="this.className = ''" name="someName"></p>
                  <p><input placeholder="Age..." oninput="this.className = ''" name="age"></p>
                </div>
                
                <div class="tab">Contact Info:
                  <p><input placeholder="E-mail..." oninput="this.className = ''"></p>
                  <p><input placeholder="Phone..." oninput="this.className = ''"></p>
                </div>
                
                <div class="tab">Birthday:
                  <p><input placeholder="dd" oninput="this.className = ''"></p>
                  <p><input placeholder="mm" oninput="this.className = ''"></p>
                  <p><input placeholder="yyyy" oninput="this.className = ''"></p>
                </div>
                
                <div class="tab">Login Info:
                  <p><input placeholder="Username..." oninput="this.className = ''"></p>
                  <p><input placeholder="Password..." oninput="this.className = ''"></p>
                </div>
                
                <div style="overflow:auto;">
                  <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
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
$(form).on('submit', function(event){
    event.preventDefault();
    var url = $(this).attr('data-action');
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
            alert(response.message)
        },
        error: function(response) {
        }
    });
});
});
            var currentTab = 0; // Current tab is set to be the first tab (0)
            showTab(currentTab); // Display the current tab
            
            function showTab(n) {
              // This function will display the specified tab of the form...
              var x = document.getElementsByClassName("tab");
              x[n].style.display = "block";
              //... and fix the Previous/Next buttons:
              if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
              } else {
                document.getElementById("prevBtn").style.display = "inline";
              }
              if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
                $('#nextBtn').removeAttr("type").attr("type", "submit");
              } else {
                document.getElementById("nextBtn").innerHTML = "Next";
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