<?php
session_start();
$number = $_SESSION["number"];



if($number >1) {
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

    $wynik = $_SESSION['score'];
    $question = $questions['pytanie'.$number][0];
    $answerA = $questions['pytanie'.$number][1];
    $answerB = $questions['pytanie'.$number][2];
    $answerC = $questions['pytanie'.$number][3];
    $answerD = $questions['pytanie'.$number][4];
    $_SESSION["number"] = $number+1;

    echo "
<p>$number</p>
<p>Wynik: $wynik</p>
<div class ='col-md-8 col-sm-8 offset-sm-2 gameDiv'>
<div class='question'><p>$question</p></div>
<input type=\"hidden\" id=\"questionId\" name=\"questionId\" value=$number>
<br>
  <div class ='row'>
    <div class ='col-md-6 col-sm-6'>
        <label class=\"btn btn-secondary active btn-lg bnt-block\">
        <input type=\"radio\" name=\"answerA\" autocomplete=\"off\"> $answerA
        </label>
    </div>
    
    <div class ='col-md-6 col-sm-6'>
        <label class=\"btn btn-secondary active btn-lg bnt-block\">
        <input type=\"radio\" name=\"answerB\" autocomplete=\"off\"> $answerB
        </label>
    </div>
    
     <div class ='col-md-6 col-sm-6'>
        <label class=\"btn btn-secondary active btn-lg bnt-block\">
        <input type=\"radio\" name=\"answerC\" autocomplete=\"off\"> $answerC
        </label>
    </div>
    
    <div class ='col-md-6 col-sm-6'>
        <label class=\"btn btn-secondary active btn-lg bnt-block\">
        <input type=\"radio\" name=\"answerD\" autocomplete=\"off\"> $answerD
        </label>
    </div>
    
  </div>
  <br>
</div>
";
}




