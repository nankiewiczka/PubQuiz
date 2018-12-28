<?php
session_start();

require_once __DIR__.'/model/TeamMapper.php';
require_once __DIR__.'/model/UserMapper.php';

$mapper = new TeamMapper();
$userMapper = new UserMapper();
$mapper->addTeam($_POST['name'],$userMapper->getUser($_SESSION["id"]));