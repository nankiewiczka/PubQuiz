<?php
session_start();
$question = trim($_POST['question']);
$answer = trim($_POST['answer']);

$questions = $_SESSION['questions'];
$correct = $questions['question'.$question][5];
$user_answer = $questions['question'.$question][$answer];
if( $correct == $user_answer) {
    $_SESSION['score'] = $_SESSION['score'] +1 ;
}
echo "$correct, $user_answer";

