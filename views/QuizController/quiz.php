<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>
<script src="../../public/js/gameScripts.js"></script>

<body>

<h1>QUIZ</h1>

<p>
    <?= $text ?>
</p>
<div id="quizField">
    <?php include(dirname(__DIR__) . '/../game/questions.php'); ?>

</div>
<input id='quizButton' type="submit" value="Sign in" class="btn btn-primary btn-lg float-right submitButton" />

</body>
</html>