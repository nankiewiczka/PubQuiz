<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>
<script src="../../public/js/accountScripts.js"></script>


<body>

<h1>STRONA UŻYTKOWNIKA</h1>

<?php
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
        echo "<button type=\"button\" class=\"btn btn-info\">ADD MEMBER</button>";

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
        $array = [1,2,3,4,5];
        foreach ($array as  $value) {
            $name = "quiz".$value;
            echo
            "<div>
            <label>$name</label>
            <button type=\"button\" class=\"btn btn-info\">PLAY</button>
            </div>";
        }

    }
    else {
        echo
        "<div>Twoja druzyna: $team_name</div>";
    }
}


?>
<form action="?page=account" class="form" onsubmit="return validateCreateTeamForm()" method="post">
    <div id="addTeamDiv">
        <div class="form-group row">
            <label for="inputName" class="col-sm-1 col-form-label">Team name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="inputTeamName" name="teamName" placeholder=" " required/>
            </div>
        </div>
        <input type="submit" value="Create" class="btn btn-primary btn-lg float-left submitButton" />
    </div>
</form>

</body>
</html>