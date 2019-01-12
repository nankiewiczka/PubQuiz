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
            ],
            'check_login_available' =>[
                'controller' => 'RegisterController',
                'action' => 'isLoginAvailable'
            ],
            'check_quiz_available' =>[
                'controller' => 'AdminController',
                'action' => 'isQuizAvailable'
            ],
            'add_quiz' =>[
                'controller' => 'AdminController',
                'action' => 'addQuiz'
            ],
            'check_team_available' =>[
                'controller' => 'UserController',
                'action' => 'isTeamAvailable'
            ],
            'add_team' =>[
                'controller' => 'UserController',
                'action' => 'addTeam'
            ],
            'adminpanel' =>[
                'controller' => 'AdminController',
                'action' => 'maintain'
            ],
            'adminquizpanel' =>[
                'controller' => 'AdminController',
                'action' => 'showQuizes'
            ],
            'admin_users' =>[
                'controller' => 'AdminController',
                'action' => 'users'
            ],
            'admin_delete_user' =>[
                'controller' => 'AdminController',
                'action' => 'userDelete'
            ],
            'start_quiz' =>[
                'controller' => 'AdminController',
                'action' => 'startQuiz'
            ],
            'end_quiz' =>[
                'controller' => 'AdminController',
                'action' => 'endQuiz'
            ],
            'quizes' =>[
                'controller' => 'UserController',
                'action' => 'showQuizes'
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