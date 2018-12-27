<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>

<body>

<h1>ADMIN PAGE</h1>
<p>

</p>

<div>
    <button type="button" onclick="window.location.href='?page=logout'" class="btn btn-info">Log out</button>
</div>

<div>
    <button type="button" class="btn btn-info">Add quiz</button>

</div>

<div>
    <p>Quizes</p>
        <?php
        require_once(dirname(__DIR__).'/../model/'.'/QuizMapper.php');
        require_once(dirname(__DIR__).'/../model/'.'/Quiz.php');
        $mapper = new QuizMapper();
        $array = $mapper->getAllQuizes();
        foreach ($array as  $value) {
            $name = $value->getName();
            $date = $value->getDate();
            $enable = $value->getEnable();
            echo
            " <div>
            <label>$name</label>
            <label>$date</label>
            <button type=\"button\" class=\"btn btn-info\">START</button>
            </div>";
        }
        ?>
</div>

</body>
</html>