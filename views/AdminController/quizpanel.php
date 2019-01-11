<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>
<script src="../../public/js/panelScripts.js"></script>

<body>
<?php include(dirname(__DIR__) . '/adminbar.html'); ?>

<h1>ADMIN PAGE</h1>
<p>

</p>

<div>
    <button type="button" class="btn btn-info" id="addQuizButton">Add quiz</button>

</div>


<div id="addQuizDiv">
<div class="form-group row">
    <label for="inputName" class="col-sm-1 col-form-label">Quiz name</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="inputQuizName" name="quizName" placeholder="" required/>
    </div>
</div>
<input type="submit" onclick="createQuiz()" value="Add quiz" class="btn btn-primary btn-lg float-left submitButton" />
</div>

<div></div>
<br>
<br>
<div id="quizListForAdmin">
    <p>Quizes</p>
    <div>
        <?php include(dirname(__DIR__).'/load_quizes_for_admin.php'); ?>
    </div>
</div>

</body>
</html>