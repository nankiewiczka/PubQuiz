<?php
require_once __DIR__.'/../model/QuestionMapper.php';
$mapper = new QuestionMapper();
$array = $mapper->getQuestionsByCategory('INFORMATYKA');

if(empty($array)) {
    echo "<p>Nie udało się pobrać pytań. Odśwież stronę i spróbuj ponownie.</p>";

    ?>
    <script type='text/javascript'>
        $("#quizField").hide();
    </script>

    <?php
}
else {
    $_SESSION["questions"] = $array;
    $_SESSION["loadQuestions"] = 1;
    $_SESSION['question_index'] = 0;
    $_SESSION['score'] = 0;
}









