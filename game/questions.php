<?php
require_once __DIR__.'/../model/Question.php';
require_once __DIR__.'/../model/ScoreMapper.php';
require_once __DIR__.'/../model/QuizMapper.php';
require_once __DIR__.'/../model/UserMapper.php';
session_start();
$question_index = $_SESSION["question_index"];
//for testing, quiz has only 5 questions
if($question_index >4) {
    require_once __DIR__.'/../model/UserMapper.php';
    require_once __DIR__.'/../model/QuizMapper.php';

    $score = $_SESSION["score"];
    $mapper = new ScoreMapper();
    $userMapper = new UserMapper();
    $quizMapper = new QuizMapper();
    $quizName = $_SESSION["quizName"];
    $p = $mapper->addScore($userMapper->getUser($_SESSION["id"]), $quizMapper->getQuizByName($quizName), $score);


    echo "<h1>QUIZ ENDED</h1>";
    echo "<h1>Your score: $score</h1>";
    echo "<a href='?page=account'>Back to account </a>";
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
        $category = $question->getCategory();
        $_SESSION["question_index"] = $question_index + 1;
        $num = $question_index+1;
        echo "
<p>Category: $category ----------- Question number: $num</p>
<p>Your score: $score</p>

<div class ='col-md-8 col-sm-8 offset-sm-2 gameDiv'>
<div class='question'><p>$question_content</p></div>
<input type=\"hidden\" id=\"questionId\" name=\"questionId\"  value=$question_index>
<br>
  <div class ='row '>
    <div class ='col-md-6 col-sm-6 radio-item'>
        <label class=\"btn active btn-lg bnt-block \">
        <input type=\"radio\" name=\"answer\" checked value=\"$answerA\" autocomplete=\"off\"> $answerA
        </label>
    </div>
    
    <div class ='col-md-6 col-sm-6'>
        <label class=\"btn  active btn-lg bnt-block\">
        <input type=\"radio\" name=\"answer\" value=\"$answerB\" autocomplete=\"off\"> $answerB
        </label>
    </div>
    
     <div class ='col-md-6 col-sm-6'>
        <label class=\"btn  active btn-lg bnt-block\">
        <input type=\"radio\" name=\"answer\" value=\"$answerC\" autocomplete=\"off\"> $answerC
        </label>
    </div>
    
    <div class ='col-md-6 col-sm-6'>
        <label class=\"btn  active btn-lg bnt-block\">
        <input type=\"radio\" name=\"answer\" value=\"$answerD\" autocomplete=\"off\"> $answerD
        </label>
    </div>
    
  </div>
  <br>
</div>
";
    }
}




