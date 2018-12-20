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
//            TODO odczytywanie,walidacji i zapis do bazy, po poprawnym przekierowanie na stronę z liniem do logowania
// jak zachować formularz???
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $repeatedPassword = $_POST['repeatedPassword'];

            $user = $mapper->getUser($login);
            return $this->render('index');
        }
        else
        return $this->render('register');
    }

}

