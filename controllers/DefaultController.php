<?php

require_once "AppController.php";

require_once __DIR__.'/../model/User.php';
require_once __DIR__.'/../model/UserMapper.php';
require_once __DIR__.'/../model/MembershipMapper.php';
require_once __DIR__.'/../model/TeamMapper.php';


class DefaultController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->render('index');
    }

    public function login()
    {
        $mapper = new UserMapper();
        $user = null;
        $membershipMapper = new MembershipMapper();
        $team = null;
        $teamMapper = new TeamMapper();
        $teamRole = null;

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
                $teamRole = $teamMapper->getTeamRole($user);
                $_SESSION["id"] = $user->getLogin();
                $_SESSION["role"] = $user->getRole();
                $_SESSION["team_name"] = $team;
                $_SESSION["team_role"] = $teamRole;


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