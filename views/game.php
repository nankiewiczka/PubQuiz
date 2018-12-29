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
        <button type=\"button\" class=\" answerButton btn btn-secondary btn-lg btn-block\">$answerA</button>
        <button type=\"button\" class=\"answerButton btn btn-secondary btn-lg btn-block\">$answerC</button>
    </div>
    <div class ='col-md-6 col-sm-6'>
         <button type=\"button\" class=\" answerButton btn btn-secondary btn-lg btn-block\">$answerB</button>
        <button type=\"button\" class=\"answerButton btn btn-secondary btn-lg btn-block\">$answerD</button>
     </div>
  </div>
  <br>
</div>
"

;


