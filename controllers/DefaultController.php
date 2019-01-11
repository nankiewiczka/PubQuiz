<?php

require_once "AppController.php";

require_once __DIR__.'/../model/User.php';
require_once __DIR__.'/../model/UserMapper.php';
require_once __DIR__.'/../model/MembershipMapper.php';


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
        $membershipMapper = new MembershipMapper();
        $team = null;

        if ($this->isPost()) {


            $user = $mapper->getUser($_POST['login']);


            if(!$user) {
                return $this->render('login', ['message' => ['Login not recognized']]);
            }

            $password = $_POST['password'];

            if(!password_verify($password, $user->getPassword())) {
                return $this->render('login', ['message' => ['Wrong password']]);
            }
            else {
                $team = $membershipMapper->getActualTeamByUserName($user->getLogin());
                $_SESSION["id"] = $user->getLogin();
                $_SESSION["role"] = $user->getRole();
                $_SESSION["team_name"] = $team;
                $_SESSION["team_role"] = "leader";


                if($_SESSION["role"] =="admin") {
                    $url = "http://$_SERVER[HTTP_HOST]/";
                    header("Location: {$url}?page=adminpanel");
                    exit();
                }
                else {
                    $url = "http://$_SERVER[HTTP_HOST]/";
                    header("Location: {$url}?page=account");
                    exit();
                }
            }

//            $url = "http://$_SERVER[HTTP_HOST]/"; // TODO do testów
//            header("Location: {$url}?page=account");
//            exit();

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