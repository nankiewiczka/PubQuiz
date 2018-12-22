<?php

require_once "AppController.php";

require_once __DIR__.'/../model/User.php';
require_once __DIR__.'/../model/UserMapper.php';


class RegisterController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function register()
    {
        $mapper = new UserMapper();

        $user = null;

        if ($this->isPost()) {
//TODO dodanie do bazy, walidacja jest ok
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $repeatedPassword = $_POST['repeatedPassword'];

           // $user = $mapper->getUser($login);
            $this->render('index', ['text' => $password]);
        }
        else
        return $this->render('register');
    }

}

