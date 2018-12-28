<?php

require_once "AppController.php";

require_once __DIR__.'/../model/User.php';
require_once __DIR__.'/../model/UserMapper.php';


class UserController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function start()
    {
        if($this->isPost()) {
            $_SESSION["role"] = "captain";
        }
        return $this->render('account');

    }



}
