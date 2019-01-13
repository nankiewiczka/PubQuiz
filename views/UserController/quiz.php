<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__) . '/head.html'); ?>
<script src="../../public/js/gameScripts.js"></script>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">PubQuiz</a>
        <a class="navbar-brand" href="#">Quiz name:  <?= $quizId ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<header class="masthead text-center text-white">

    <div>
        <?php include(dirname(__DIR__) . '/../game/get_questions.php');?>
    </div>

    <div id="quizField">
        <?php include(dirname(__DIR__) . '/../game/questions.php'); ?>
    </div>
    <br>
    <input id='quizButton' type="submit" value="Choose" class="btn btn-primary btn-lg float-center submitButton" />
    <?php if($_SESSION['loadQuestions'] != 1 ) { ?>
        <script type='text/javascript'>
            $("#quizButton").hide();
        </script>
        <?php
    }?>
</header>

<?php include(dirname(__DIR__) . '/foot.html'); ?>

</body>
</html>

