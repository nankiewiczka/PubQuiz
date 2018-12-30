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


}
