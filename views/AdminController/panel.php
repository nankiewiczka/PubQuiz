<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>
<script src="../../public/js/panelScripts.js"></script>

<body>

<h1>ADMIN PAGE</h1>
<p>

</p>

<div>
    <button type="button" onclick="window.location.href='?page=logout'" class="btn btn-info">Log out</button>
</div>

<div>
    <button type="button" class="btn btn-info" id="addQuizButton">Add quiz</button>

</div>

<div id="addQuizDiv">
<div class="form-group row">
    <label for="inputName" class="col-sm-1 col-form-label">Quiz name</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="inputQuizName" name="quizName" placeholder=" " required/>
    </div>
</div>
<div class="form-group row">
    <label for="inputDate" class="col-sm-1 col-form-label">Date</label>
    <div class="col-sm-6">
        <input type="text" name="quizDate" class="form-control" id="inputQuizDate" placeholder=" " required/>
    </div>
</div>
<input type="submit" value="Sign in" class="btn btn-primary btn-lg float-left submitButton" />
</div>

<div></div>
<br>
<br>
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