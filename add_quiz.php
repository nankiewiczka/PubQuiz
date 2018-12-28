<?php
require_once __DIR__.'/model/QuizMapper.php';

$mapper = new QuizMapper();
$mapper->addQuiz(new Quiz($_POST['name'], $_POST['date'], "created"));