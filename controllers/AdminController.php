<?php

require_once "AppController.php";

class AdminController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function maintain()
    {
        return $this->render('panel');


    }

}

