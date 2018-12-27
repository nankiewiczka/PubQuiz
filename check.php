<?php
require_once __DIR__.'/model/UserMapper.php';

if(!isset($_POST['login']))
{
 echo true;

}

$login = trim($_POST['login']);
$mapper = new UserMapper();
echo $mapper->isUserLoginAvailable($login);
exit();
