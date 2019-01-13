<?php
require_once __DIR__.'/../model/MembershipMapper.php';
session_start();
$teamName = $_SESSION["team_name"];
$teamRole = $_SESSION["team_role"];
if($teamName == "") {
    echo "<div><h1>You are not assigned to any team.</h1></div>
    <div><button id=\"createTeamButton\" type=\"button\" class=\"btn btn-info submitButton\">CREATE TEAM</button><br></div>";
}
else {
    if ($teamRole == "leader") {
        echo "<h1>Your team: $teamName</h1>";
        echo "<h4>Rule your team</h4>";
        echo "<input type=\"hidden\" id=\"teamName\" value=\"$teamName\">";
        echo "<input id=\"inputMember\"class=\"search-filter\" type=\"text\"/>
                <div id=\"list\" class=\"multiselect\">";

        $membershipMapper = new MembershipMapper();
        $array = $membershipMapper->getAllUsersWithoutTeam();
        foreach ($array as  $value) {
            $name = $value->getLogin();
            echo "
        <div class=\"col-sm-5 offset-sm-4\">
        <div class=\"form-group row\">
        <div class='col-sm-6'>
                <input id=\"memberId\" name=\"memberToAdd\" value =$name class=\"memberRadio\" type=\"radio\" />
                <label for=\"memberId\" class=\"memberLabel\">$name</label>
                </div>
                </div>
                </div>
                ";
        }

        echo "</div>";
        echo "<div><button type=\"button\" id=\"addMemberButton\" class=\"btn btn-info submitButton\"><i class=\"material-icons\">add</i></button></div>";

        $array = $membershipMapper->getAllMembersByTeamName($teamName);
        echo "<div class=\"container\">
        <div class=\"row\">

        <h4 class=\"mt-4\">Your team members:</h4>
        <table class=\"table table-hover\">
        <thead>
        <tr>
            <th>Name</th>
            <th>Login</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>";

        foreach ($array as  $value) {
            $login = $value->getLogin();
            $name = $value->getName();
            $surname = $value->getSurname();
            echo "
                <tr>
                    <td>$name</td>
                    <td>$login</td>
                    <td><button type=\"button\" id=\"deleteMemberButton\" value=$login class=\"btn btn - info\"><i class=\"material-icons\">delete_forever</i></button></td>
        
                ";
        }
        echo "
                    </tbody>
                    <tbody class=\"users - list\">
                    </tbody>
                </table>
        
            </div>
        </div>";

    }
    else {

        echo
        "<h1>Your team: $teamName</h1>
        <br><h1>Start the game!</h1>";
    }
}
