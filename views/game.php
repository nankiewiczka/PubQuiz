<?php
session_start();
$answerA = "odpA";
$answerB = "odpB";
$answerC = "odpC";
$answerD = "odpD";
$number = $_SESSION["number"];
$_SESSION["number"] = $number+1;

echo "
<p>$number</p>
<div class ='col-md-8 col-sm-8 offset-sm-2 gameDiv'>
<div id='question' class='question'>pytanie</div>
<br>
  <div class ='row'>
    <div class ='col-md-6 col-sm-6'>
        <label class=\"btn btn-secondary active btn-lg bnt-block\">
        <input type=\"radio\" name=\"options\" id=\"option1\" autocomplete=\"off\" checked> Active
        </label>
    </div>
    
    <div class ='col-md-6 col-sm-6'>
        <label class=\"btn btn-secondary active btn-lg bnt-block\">
        <input type=\"radio\" name=\"options\" id=\"option1\" autocomplete=\"off\" checked> Active
        </label>
    </div>
    
     <div class ='col-md-6 col-sm-6'>
        <label class=\"btn btn-secondary active btn-lg bnt-block\">
        <input type=\"radio\" name=\"options\" id=\"option1\" autocomplete=\"off\" checked> Active
        </label>
    </div>
    
    <div class ='col-md-6 col-sm-6'>
        <label class=\"btn btn-secondary active btn-lg bnt-block\">
        <input type=\"radio\" name=\"options\" id=\"option1\" autocomplete=\"off\" checked> Active
        </label>
    </div>
    
    
    
    
    

  </div>
  <br>
</div>
"

;


