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
//TODO dodanie do bazy, walidacja jest ok
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $login = $_POST['login'];
            $password = $_POST['password'];

            $user = new User($name, $surname, $email, $login, $password);
            $bla = $mapper->addUser($user);

//            $this->render('index', ['text' =>
/*                '<p>Account created successfully</p><a href=<?php echo \'?page=login\'; ?>Sign in now</a>.</p>']);*/
            $this->render('index', ['text' => $bla]);
        }
        else
        return $this->render('register');
    }

}

