<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>
<script src="../../public/js/panelScripts.js"></script>

<body>
<?php include(dirname(__DIR__) . '/adminnav.html'); ?>

<header class="masthead text-center text-white">
    <h1>ADMIN PAGE</h1>

    <div id="addQuizDiv">
        <div class="col-sm-5 offset-sm-3">
        <div class="form-group row">
            <label for="inputName" class="col-sm-4 col-form-label">New quiz name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="inputQuizName" name="quizName" placeholder="" required/>
            </div>
            <input type="submit" onclick="createQuiz()" value="Add quiz" class="btn btn-primary btn-lg float-left submitButton" />

        </div>
    </div>

    <br>
    <br>
    <div id="quizListForAdmin">
        <div>
            <?php include(dirname(__DIR__).'/load_quizes_for_admin.php'); ?>
        </div>
    </div>
</header>


<?php include(dirname(__DIR__) . '/foot.html'); ?>


</body>
</html>