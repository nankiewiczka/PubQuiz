<?php
require_once __DIR__.'/../model/MembershipMapper.php';
session_start();
$team_name = $_SESSION["team_name"];

if($team_name == "") {
    echo "<div>Nie jesteś przypisany do żadnej drużyny</div>
    <div><button id=\"createTeamButton\" type=\"button\" class=\"btn btn-info\">CREATE TEAM</button></div>";
}
else {
    if ($_SESSION["team_role"] == "captain") {
        //TODO sprawdzenie czy należydo drużyny
        echo "<p>$team_name</p>";
        echo "<p>Jesteś kapitanem drużyny. Możesz dodawać i usuwać jej członków</p>";
        echo "<input class=\"search-filter\" type=\"text\"/>
                <div id=\"list\" class=\"multiselect\">";

        $membershipMapper = new MembershipMapper();
        $array = $membershipMapper->getAllUserWithoutTeam();
        foreach ($array as  $value) {
            $name = $value->getLogin();
            echo "
                <input id=\"memberId\" name=\"memberToAdd\" value =$name class=\"memberRadio\" type=\"radio\" />
                <label for=\"memberId\" class=\"memberLabel\">$name</label>
                ";
        }

        echo "</div>";
        echo "<div><button type=\"button\" id=\"addMemberButton\" class=\"btn btn-info\">ADD MEMBER</button></div>";
//TODO get member atribute to delete
//        require_once(dirname(__DIR__).'/../model/'.'/QuizMapper.php');
//        require_once(dirname(__DIR__).'/../model/'.'/Quiz.php');
//        $mapper = new QuizMapper();
//        $array = $mapper->getAllQuizes();
        $array = [1,2,3,4,5];
        foreach ($array as  $value) {
            $name = "MEMBER" . $value;
            $date = "data";
//            $name = $value->getName();
//            $date = $value->getDate();
//            $enable = $value->getEnable();
            echo
            " <div>
            <label>$name</label>
            <label>$date</label>
            <button type=\"button\" class=\"btn btn-info\">DELETE MEMBER</button>
            </div>";
        }
    }
    else {
        echo
        "<div>Twoja druzyna: $team_name</div>";
    }

    echo
    "<div>Dostepne quizy:</div>";
    $array = [1,2,3,4,5];
    foreach ($array as  $value) {
        $name = "quiz".$value;
        echo
        "
<form action=\"?page=quiz\" method=\"POST\">
        <div>
            <label>$name</label>
            <button name=\"chooseQuizButton\" value=$name class=\"btn btn-primary btn-lg float-right submitButton\">CHOOSE QUIZ</button>
            </div>
            </form>";
    }
}

//TODO
//dodawanie i usuwanie członków, zablokować gdy jakiś quiz się rozpoczął