<?php
require_once __DIR__.'/../model/MembershipMapper.php';
session_start();
$teamName = $_SESSION["team_name"];
$teamRole = $_SESSION["team_role"];
if($teamName == "") {
    echo "<div>Nie jesteś przypisany do żadnej drużyny</div>
    <div><button id=\"createTeamButton\" type=\"button\" class=\"btn btn-info\">CREATE TEAM</button></div>";
}
else {
    if ($teamRole == "leader") {
        //TODO sprawdzenie czy należy do drużyny
        echo "<p>$teamName</p>";
        echo "<p>Jesteś kapitanem drużyny. Możesz dodawać i usuwać jej członków</p>";
        echo "<input type=\"hidden\" id=\"teamName\" value=\"$teamName\">";
        echo "<input id=\"inputMember\"class=\"search-filter\" type=\"text\"/>
                <div id=\"list\" class=\"multiselect\">";

        $membershipMapper = new MembershipMapper();
        $array = $membershipMapper->getAllUsersWithoutTeam();
        foreach ($array as  $value) {
            $name = $value->getLogin();
            echo "<div>
                <input id=\"memberId\" name=\"memberToAdd\" value =$name class=\"memberRadio\" type=\"radio\" />
                <label for=\"memberId\" class=\"memberLabel\">$name</label></div>
                ";
        }

        echo "</div>";
        echo "<div><button type=\"button\" id=\"addMemberButton\" class=\"btn btn-info\">ADD MEMBER</button></div>";

        $array = $membershipMapper->getAllMembersByTeamName($teamName);
        foreach ($array as  $value) {
            $login = $value->getLogin();
            $name = $value->getName();
            $surname = $value->getSurname();
            echo
            " <div>
            <label>$login</label>
            <label>$name</label>
            <label>$surname</label>
            <button type=\"button\" id=\"deleteMemberButton\" value=$login class=\"btn btn-info\">DELETE MEMBER</button>
            </div>";
        }
    }
    else {
        echo
        "<div>Twoja druzyna: $teamRole</div>";
    }
}
