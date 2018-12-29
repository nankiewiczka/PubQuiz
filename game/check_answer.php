<?php
require_once __DIR__.'/../model/Question.php';

session_start();
$question_id = trim($_POST['question']);
$answer = ($_POST['answer']);

$questions = $_SESSION['questions'];
$question = $questions[$question_id];
$correct = $question->getCorrectAnswer();
if( $correct == $answer) {
    $_SESSION['score'] = $_SESSION['score'] +1 ;
}
echo "$correct, $answer";

