<?php

require_once('controllers/DefaultController.php');
require_once('controllers/RegisterController.php');
require_once('controllers/AdminController.php');
require_once('controllers/UserController.php');
require_once('controllers/QuizController.php');

class Routing
{
    public $routes = [];

    public function __construct()
    {
        $this->routes = [
            'index' => [
                'controller' => 'DefaultController',
                'action' => 'index'
            ],
            'login' => [
                'controller' => 'DefaultController',
                'action' => 'login'
            ],
            'logout' => [
                'controller' => 'DefaultController',
                'action' => 'logout'
            ],
            'register' =>[
                'controller' => 'RegisterController',
                'action' => 'register'
            ],
            'panel' =>[
                'controller' => 'AdminController',
                'action' => 'maintain'
            ],
            'account' =>[
                'controller' => 'UserController',
                'action' => 'start'
            ],
            'history' =>[
                'controller' => 'UserController',
                'action' => 'showHistory'
            ],
            'quiz' =>[
                'controller' => 'QuizController',
                'action' => 'showGame'
            ],
            'add_member' =>[
            'controller' => 'UserController',
            'action' => 'addMember'
            ],
            'delete_member' =>[
                'controller' => 'UserController',
                'action' => 'deleteMember'
            ]
        ];
    }

    public function run()
    {
        $page = isset($_GET['page'])
        && isset($this->routes[$_GET['page']]) ? $_GET['page'] : 'login';

        if ($this->routes[$page]) {
            $class = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $class;
            $object->$action();
        }
    }

}