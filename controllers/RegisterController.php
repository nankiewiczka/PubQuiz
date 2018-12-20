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
            if(!$user)
            {
                if($password === $repeatedPassword) {
                    return $this->render('index', ['text' => 'Account was successfully created.']);
                }
                else
                {
                    return $this->render('register', ['text' => 'Entered passwords are not the same.']);
                }
                // dodajemy do bazy
            }
            else
            {
                return $this->render('register', ['text' => 'There is already user with this login.']);

            }


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