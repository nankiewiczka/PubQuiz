<?php

require_once "AppController.php";
require_once __DIR__.'/../model/QuizMapper.php';


class AdminController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function showQuizes()
    {
//        if($_SESSION["role"] == "admin")
            return $this->render('quizpanel');
//        else
//            $url = "http://$_SERVER[HTTP_HOST]/";
//            header("Location: {$url}?page=login");
//            exit();
        //TODO odkomentować potem
    }

    public function maintain() {
            $user = new UserMapper();
            $this->render('adminpanel', ['user' => $user->getUser($_SESSION['id'])]);
    }

    public function users(): void
    {
        $user = new UserMapper();

        header('Content-type: application/json');
        http_response_code(200);

        echo $user->getUsers() ? json_encode($user->getUsers()) : '';
    }

    public function userDelete(): void
    {
        if (!isset($_POST['id'])) {
            http_response_code(404);
            return;
        }

        $user = new UserMapper();
        $user->delete((int)$_POST['id']);

        http_response_code(200);
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

