<?php

$answerA = "odpA";
$answerB = "odpB";
$answerC = "odpC";
$answerD = "odpD";

echo "
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

