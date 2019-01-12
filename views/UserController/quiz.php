<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__) . '/head.html'); ?>
<script src="../../public/js/gameScripts.js"></script>

<body>

<h1>QUIZ</h1>

<p>
    <?= $quizId ?>
</p>



<div>
    <?php include(dirname(__DIR__) . '/../game/get_questions.php');?>
</div>

<div id="quizField">
    <?php include(dirname(__DIR__) . '/../game/questions.php'); ?>
</div>

<input id='quizButton' type="submit" value="Sign in" class="btn btn-primary btn-lg float-right submitButton" />
<?php if($_SESSION['loadQuestions'] != 1 ) { ?>
    <script type='text/javascript'>
        $("#quizButton").hide();
    </script>
<?php
}?>
</body>
</html>

