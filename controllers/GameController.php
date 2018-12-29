<?php

require_once "AppController.php";


class GameController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $_SESSION['number'] = 1;

    }

    public function showGame()
    {
        $text = $_POST['chooseQuizButton'];
            $this->render('game', ['text' => $text]);
    }


}
