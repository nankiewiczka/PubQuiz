<?php

require_once "AppController.php";


class GameController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function showGame()
    {

        return $this->render('game');

    }

}
