<?php

require_once "AppController.php";


class GameController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $_SESSION['number'] = 0;
        $_SESSION['score'] = 0;
        $_SESSION['questions'] = ['pytanie0'=>['pytanie0', 'a0', 'b0', 'c0', 'd0', 'a0'],
            'pytanie1'=>['pytanie1', 'a1', 'b1', 'c1', 'd1', 'correct1']];

    }

    public function showGame()
    {
        $text = $_POST['chooseQuizButton'];
            $this->render('game', ['text' => $text]);
    }


}
