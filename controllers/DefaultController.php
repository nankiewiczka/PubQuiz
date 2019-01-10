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
        $_SESSION["role"] = "admin";
        $_SESSION["team_role"] = "member";
        $_SESSION["team_name"] = "team1";
        $_SESSION["id"] = "kaka";

        if ($this->isPost()) {


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
//                if($_SESSION["role"] =="admin") {
//                    $url = "http://$_SERVER[HTTP_HOST]/";
//                    header("Location: {$url}?page=panel");
//                    exit();
//                }
//                else {
//                    $url = "http://$_SERVER[HTTP_HOST]/";
//                    header("Location: {$url}?page=account");
//                    exit();
//                }
//            }
            $url = "http://$_SERVER[HTTP_HOST]/"; // TODO do testów
            header("Location: {$url}?page=account");
            exit();

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