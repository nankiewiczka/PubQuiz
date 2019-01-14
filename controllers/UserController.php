<?php

require_once "AppController.php";

require_once __DIR__.'/../model/User.php';
require_once __DIR__.'/../model/UserMapper.php';
require_once __DIR__.'/../model/TeamMapper.php';
require_once __DIR__.'/../model/MembershipMapper.php';


class UserController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function start()
    {
        if($_SESSION["role"] == "user")
            return $this->render('account');
        else {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=index");
            exit();
        }
    }

    public function showHistory()
    {
        return $this->render('history');
    }

    public function showQuizes()
    {
        return $this->render('userQuizes');
    }

    public function showGame()
    {
        $quizId = $_POST['chooseQuizButton'];
        $_SESSION["quizName"] = $quizId;
        $this->render('quiz', ['quizId'=>$quizId]);
    }

    public function addMember() {
        $mapper = new MembershipMapper();
        $user_mapper = new UserMapper();
        $team_mapper = new TeamMapper();
        $mapper->addMember($user_mapper->getUser($_POST['name']), $team_mapper->getTeamByName($_POST['team']));
    }

    public function deleteMember() {
        $mapper = new MembershipMapper();
        $user_mapper = new UserMapper();
        $team_mapper = new TeamMapper();
        $mapper->deleteMember($user_mapper->getUser($_POST['name']), $team_mapper->getTeamByName($_POST['team']));
    }

    public function isTeamAvailable() {
        $name = trim($_POST['name']);
        $mapper = new TeamMapper();
        echo $mapper->isTeamNameAvailable($name);
        exit();
    }

    public function addTeam() {
        $mapper = new TeamMapper();
        $userMapper = new UserMapper();
        $mapper->addTeam($_POST['name'],$userMapper->getUser($_SESSION["id"]));
    }


}
