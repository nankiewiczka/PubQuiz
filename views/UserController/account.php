<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>

<body>

<h1>STRONA UŻYTKOWNIKA</h1>

<?php
if ($_SESSION["role"] == "captainx") {
    //TODO sprawdzenie czy należydo drużyny
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
    echo "<div>Nie jesteś przypisany do żadnej drużyny</div>
    <div><button id=\"createTeamButton\" type=\"button\" class=\"btn btn-info\">CREATE TEAM</button></div>";
}

?>



</body>
</html>