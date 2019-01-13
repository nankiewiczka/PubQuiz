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
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $user = new User(null, $name, $surname, $email, $login, $hash, null);
            $mapper->addUser($user);

            $this->render('index', ['text' =>
                '<h1>Account created successfully</h1><br><br><br><h2><a class="nav-link" href=<?php echo \'?page=index\'; ?>Sign in now</a></h2>']);
        }
        else
        return $this->render('register');
    }

    public function isLoginAvailable() {
        $login = trim($_POST['login']);
        $mapper = new UserMapper();
        echo $mapper->isUserLoginAvailable($login);
        exit();
    }

}

