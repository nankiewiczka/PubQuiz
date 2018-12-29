<?php
require_once __DIR__.'/../model/QuestionMapper.php';

$mapper = new QuestionMapper();
$array = $mapper->getQuestionsByCategory('HISTORIA');
echo $array;
foreach ($array as  $value) {
    $question = $value->getQuestion();
    $category = $value->getCategory();

    echo
    " <div>
      <p>$question</p>
      <p>$category</p>
      </div>"
    ;
}



