<?php

require_once "AppController.php";


class QuizController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $_SESSION['question_index'] = 0;
        $_SESSION['score'] = 0;
        $_SESSION['questions'] = ['question0'=>['pytanie0', 'a0', 'b0', 'c0', 'd0', 'a0'],
            'question1'=>['question1', 'a1', 'b1', 'c1', 'd1', 'correct1']];

    }

    public function showGame()
    {
//        $text = $_POST['chooseQuizButton'];
            $this->render('quiz');
    }


}
