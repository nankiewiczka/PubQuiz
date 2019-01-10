<?php

require_once "AppController.php";


class QuizController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $_SESSION['question_index'] = 0;
        $_SESSION['score'] = 0;
    }

    public function showGame()
    {
        $quizId = $_POST['chooseQuizButton'];
        $_SESSION["quizName"] = $quizId;
        $this->render('quiz', ['quizId'=>$quizId]);
    }

    public function checkAnswer() {
        $question_id = trim($_POST['question']);
        $answer = ($_POST['answer']);

        $questions = $_SESSION['questions'];
        $question = $questions[$question_id];
        $correct = $question->getCorrectAnswer();
        if( $correct == $answer) {
            $_SESSION['score'] = $_SESSION['score'] +1 ;
        }
        echo "$correct, $answer";
    }


}
