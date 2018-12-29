<?php
session_start();
$question_index = $_SESSION["question_index"];

if($question_index >1) {
    echo "<p>KONIEC GRY</p>";
    //TODO przesłanie danych do bazy
    ?>
<script type='text/javascript'>
    $("#quizButton").hide();
</script>
<?php
}
else {
    $questions = $_SESSION['questions'];

    $score = $_SESSION['score'];
    $question = $questions['question'.$question_index][0];
    $answerA = $questions['question'.$question_index][1];
    $answerB = $questions['question'.$question_index][2];
    $answerC = $questions['question'.$question_index][3];
    $answerD = $questions['question'.$question_index][4];
    $_SESSION["question_index"] = $question_index+1;

    echo "
<p>$question_index</p>
<p>Wynik: $score</p>
<div class ='col-md-8 col-sm-8 offset-sm-2 gameDiv'>
<div class='question'><p>$question</p></div>
<input type=\"hidden\" id=\"questionId\" name=\"questionId\" value=$question_index>
<br>
  <div class ='row'>
    <div class ='col-md-6 col-sm-6'>
        <label class=\"btn btn-secondary active btn-lg bnt-block\">
        <input type=\"radio\" name=\"answer\" checked value=1 autocomplete=\"off\"> $answerA
        </label>
    </div>
    
    <div class ='col-md-6 col-sm-6'>
        <label class=\"btn btn-secondary active btn-lg bnt-block\">
        <input type=\"radio\" name=\"answer\" value=2 autocomplete=\"off\"> $answerB
        </label>
    </div>
    
     <div class ='col-md-6 col-sm-6'>
        <label class=\"btn btn-secondary active btn-lg bnt-block\">
        <input type=\"radio\" name=\"answer\" value=3 autocomplete=\"off\"> $answerC
        </label>
    </div>
    
    <div class ='col-md-6 col-sm-6'>
        <label class=\"btn btn-secondary active btn-lg bnt-block\">
        <input type=\"radio\" name=\"answer\" value=4 autocomplete=\"off\"> $answerD
        </label>
    </div>
    
  </div>
  <br>
</div>
";
}




