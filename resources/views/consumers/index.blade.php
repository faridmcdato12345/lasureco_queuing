<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>QUEUING</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{asset('js/app.js')}}"></script>	
    </head>
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  font-family: Helvetica;
  padding: 40px;
  width: 70%;
  min-width: 200px;
  margin: 0;
  top: 50%;
  left: 50%;
  position: absolute;
  top: 40%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  min-height: 100px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Helvetica;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Helvetica;
  cursor: pointer;
  width: 100%;
  margin-bottom: 10px;
  margin-top: 10px;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

.tab input[type=radio]{
  border: 0px;
  width: 10%;
  height: 1.5em;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}

@media screen and (max-width: 720px) {
  #regForm{
    margin-top: 35px;
    margin-bottom: 0%;
    
  } 
  #regForm h1 {
    font-size: 100%;
  }
  .tab {
    font-size: 10px;
  }
  .tab input {
    font-size: 10px;
  }
  #regForm button {
    font-size: 10px;
    margin-bottom: 0px;
  }
}

@media screen and (max-height: 435px) {
  #regForm {
    margin-top: -20px;
  }
  #regForm h1{
    margin-top: -25px;
    font-size: 100%;
  }
  .tab {
    font-size: 10px;
  }
  .tab input {
    font-size: 10px;
  }
  #regForm button {
    font-size: 10px;
    margin-bottom: 0px;
  }
  #regForm #buttons{
    margin-bottom: -20px;
  }
}
#regForm #gender label {
  margin-top: -1000px;
}
</style>
<body>
<form id="regForm" method="POST" action="{{route('consumer.store')}}">
    @csrf
    <h1>Register:</h1>
    <!-- One "tab" for each step in the form: -->
    <div class="tab">Name:
        <p><input placeholder="First name..." oninput="this.className = ''" name="firstname"></p>
        <p><input placeholder="Last name..." oninput="this.className = ''" name="lastname"></p>
    </div>
    <div class="tab">Contact Info:
        <p><input placeholder="E-mail..." oninput="this.className = ''" name="email" id="email1"></p>
        <p><input type="number" placeholder="Phone..." oninput="this.className = ''" name="phone" ></p>
    </div>
    <div class="tab" id="gender"> Gender:
        <br><br>
        <input type="radio" id="Male" name="gender" value="male">
        <label for="male"> Male </label>
        <input type="radio" id="Female" name="gender" value="female">
        <label for="female"> Female </label>
    </div>
    <div class="tab">Address:
        <p><input placeholder="Address..." oninput="this.className = ''" name="address"></p>
    </div>
    <div class="tab">Birthdate:
        <p><input type="date" placeholder="dd" oninput="this.className = ''" name="dob"></p>
    </div>
  <div style="overflow:auto;" id="buttons">
    <div style="text-align: center;">
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    </div>
  </div>
  <div style="text-align:center;margin-top:40px;" hidden>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>
<script>
var currentTab = 0;
showTab(currentTab);
function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
    } else {
    document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
    document.getElementById("nextBtn").innerHTML = "Next";
    }
    fixStepIndicator(n)
}
function nextPrev(n) {
    var x = document.getElementsByClassName("tab");
    if (n == 1 && !validateForm()) return false;
    x[currentTab].style.display = "none";
    currentTab = currentTab + n;
    if (currentTab >= x.length) {
        document.getElementById("regForm").submit();
        //return false;
        console.log(x.length);
    }
    showTab(currentTab);
}
function validateForm() {
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  for (i = 0; i < y.length; i++) {
    if (y[i].value == "" && y[i].id != "email1") {
        y[i].className += " invalid";
        valid = false;
    } 
  }
//   if (valid) {
//     document.getElementsByClassName("step")[currentTab].className += " finish";
//   }
  return valid;
}
function fixStepIndicator(n) {
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  x[n].className += " active";
}
</script>
</body>
</html>
