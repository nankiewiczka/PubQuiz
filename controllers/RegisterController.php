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
        if ($this->isPost()) {
//            TODO odczytywanie,walidacji i zapis do bazy, po poprawnym przekierowanie na stronę z liniem do logowania

            return $this->render('login');
        }

        return $this->render('register');
    }

}