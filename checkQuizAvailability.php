<?php
require_once __DIR__.'/model/QuizMapper.php';

if(!isset($_POST['name']))
{
    echo true;

}

$name = trim($_POST['name']);
$mapper = new QuizMapper();
echo $mapper->isQuizNameAvailable($name);
exit();