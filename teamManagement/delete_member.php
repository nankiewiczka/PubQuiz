<?php
require_once __DIR__.'/../model/MembershipMapper.php';
require_once __DIR__.'/../model/UserMapper.php';
require_once __DIR__.'/../model/TeamMapper.php';

$mapper = new MembershipMapper();
$user_mapper = new UserMapper();
$team_mapper = new TeamMapper();
$mapper->deleteMember($user_mapper->getUser($_POST['name']), $team_mapper->getTeamByName($_POST['team']));
