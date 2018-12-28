<?php

require_once "AppController.php";

require_once __DIR__.'/../model/User.php';
require_once __DIR__.'/../model/UserMapper.php';


class DefaultController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $text = 'Hello there 👋';

        $this->render('index', ['text' => $text]);
    }

    public function login()
    {
        $mapper = new UserMapper();

        $user = null;

        if ($this->isPost()) {

                $url = "http://$_SERVER[HTTP_HOST]/"; // TODO do testów
                header("Location: {$url}?page=account");
                exit();

//            $user = $mapper->getUser($_POST['login']);
//
//            if(!$user) {
//                return $this->render('login', ['message' => ['Login not recognized']]);
//            }
//
//            if ($user->getPassword() !== $_POST['password']) {
//                return $this->render('login', ['message' => ['Wrong password']]);
//            }
//            else {
//                $_SESSION["id"] = $user->getLogin();
//                $_SESSION["role"] = $user->getRole();
//
//                $url = "http://$_SERVER[HTTP_HOST]/";
//                header("Location: {$url}?page=panel");
//                exit();
//            }
        }

        return $this->render('login');
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        $this->render('index', ['text' => 'You have been successfully logged out!']);
    }

}