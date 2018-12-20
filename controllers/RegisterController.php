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

            $name = $_POST['name'];
            $surname = $_POST['name'];
            $login = $_POST['name'];
            $password = $_POST['name'];
            $repeatedPassword = $_POST['name'];


            return $this->render('index', ['text' => $name]);

        }

        return $this->render('register');
    }

}

//if ($this->isPost()) {
//
//    $user = $mapper->getUser($_POST['email']);
//
//    if(!$user) {
//        return $this->render('login', ['message' => ['Email not recognized']]);
//    }
//
//    if ($user->getPassword() !== $_POST['password']) {
//        return $this->render('login', ['message' => ['Wrong password']]);
//    } else {
//        $_SESSION["id"] = $user->getEmail();
//        $_SESSION["role"] = $user->getRole();
//
//        $url = "http://$_SERVER[HTTP_HOST]/";
//        header("Location: {$url}?page=login");
//        exit();
//    }
//}