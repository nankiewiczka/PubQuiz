<?php
require_once __DIR__.'/../model/QuizMapper.php';


$mapper = new QuizMapper();
$array = $mapper->getAllQuizes();
foreach ($array as  $value) {
    $name = $value->getName();
    $date = $value->getStartDateTime();
    $buttonName = $name.'Button';
    echo
    " <div>
            <label>$name</label>
            <label>$date</label>
            <button id=$buttonName type=\"button\" class=\"btn btn-info\">START</button>
      </div>";
}
