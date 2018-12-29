<?php
require_once __DIR__.'/../model/Question.php';
session_start();
$question_index = $_SESSION["question_index"];

//TODO ograniczenie na liczbe pytań
if($question_index >4) {
    $score = $_SESSION["score"];
    echo "<p>KONIEC GRY</p>";
    echo "<p>$score</p>"

    ;
    //TODO przesłanie danych do bazy
    ?>
<script type='text/javascript'>
    $("#quizButton").hide();
</script>
<?php
}
else {
    if ($_SESSION["loadQuestions"] == 1) {
        $questions = $_SESSION["questions"];
        $question = $questions[$question_index];
        $score = $_SESSION['score'];
        $question_content = $question->getQuestion();
        $answerA = $question->getAnswerA();
        $answerB = $question->getAnswerB();
        $answerC = $question->getAnswerC();
        $answerD = $question->getAnswerD();
        $_SESSION["question_index"] = $question_index + 1;

        echo "
<p>Indeks pytania $question_index</p>
<p>Wynik: $score</p>
<div class ='col-md-8 col-sm-8 offset-sm-2 gameDiv'>
<div class='question'><p>$question_content</p></div>
<input type=\"hidden\" id=\"questionId\" name=\"questionId\" value=$question_index>
<br>
  <div class ='row'>
    <div class ='col-md-6 col-sm-6'>
        <label class=\"btn btn-secondary active btn-lg bnt-block\">
        <input type=\"radio\" name=\"answer\" checked value=\"$answerA\" autocomplete=\"off\"> $answerA
        </label>
    </div>
    
    <div class ='col-md-6 col-sm-6'>
        <label class=\"btn btn-secondary active btn-lg bnt-block\">
        <input type=\"radio\" name=\"answer\" value=\"$answerB\" autocomplete=\"off\"> $answerB
        </label>
    </div>
    
     <div class ='col-md-6 col-sm-6'>
        <label class=\"btn btn-secondary active btn-lg bnt-block\">
        <input type=\"radio\" name=\"answer\" value=\"$answerC\" autocomplete=\"off\"> $answerC
        </label>
    </div>
    
    <div class ='col-md-6 col-sm-6'>
        <label class=\"btn btn-secondary active btn-lg bnt-block\">
        <input type=\"radio\" name=\"answer\" value=\"$answerD\" autocomplete=\"off\"> $answerD
        </label>
    </div>
    
  </div>
  <br>
</div>
";
    }
}




