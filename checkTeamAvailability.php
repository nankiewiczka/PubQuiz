<?php
require_once __DIR__.'/model/TeamMapper.php';

if(!isset($_POST['name']))
{
    echo true;

}

$name = trim($_POST['name']);
$mapper = new TeamMapper();
echo $mapper->isTeamNameAvailable($name);
exit();