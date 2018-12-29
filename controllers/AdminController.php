<?php

require_once "AppController.php";

class AdminController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function maintain()
    {
        if($_SESSION["role"] == "admin")
            return $this->render('panel');
        else
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=login");
            exit();
    }
}

