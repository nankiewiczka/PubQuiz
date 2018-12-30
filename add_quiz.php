<?php
require_once __DIR__.'/model/QuizMapper.php';

$mapper = new QuizMapper();
$mapper->addQuiz(new Quiz(null, $_POST['name'], "created", $_POST['date'], $_POST['date']));