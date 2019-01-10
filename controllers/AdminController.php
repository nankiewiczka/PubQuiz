<?php

require_once "AppController.php";
require_once __DIR__.'/../model/QuizMapper.php';


class AdminController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function maintain()
    {
//        if($_SESSION["role"] == "admin")
            return $this->render('panel');
//        else
//            $url = "http://$_SERVER[HTTP_HOST]/";
//            header("Location: {$url}?page=login");
//            exit();
        //TODO odkomentować potem
    }

    public function isQuizAvailable() {
        $name = trim($_POST['name']);
        $mapper = new QuizMapper();
        echo $mapper->isQuizNameAvailable($name);
        exit();
    }

    public function addQuiz() {
        $mapper = new QuizMapper();
        $mapper->addQuiz(new Quiz(null, $_POST['name'], "created", $_POST['date'], $_POST['date']));
    }
}

