<?php
require_once __DIR__.'/../model/QuizMapper.php';


$mapper = new QuizMapper();
$array = $mapper->getAllQuizes();
echo "<div class=\"container\">
    <div class=\"row\">

        <h4 class=\"mt-4\">Your data:</h4>
        <table class=\"table table-hover\">
            <thead>
            <tr>
                <th>Nazwa</th>
                <th>Status</th>
                <th>Start date & time</th>
                <th>End date & time</th>
                <th>Start</th>
                <th>End</th>
            </tr>
            </thead>
            <tbody>";


foreach ($array as  $value) {
    $name = $value->getName();
    $startDate = $value->getStartDateTime();
    $endDate = $value->getEndDateTime();
    $status = $value->getStatus();
    $quizId = $value->getId();
    $buttonStartStatus = $status == "created" ? "" : "disabled";
    $buttonEndStatus = $status == "started" ? "" : "disabled";

    echo "
<tr>
<td>$name</td>
<td>$status</td>
<td>$startDate</td>
<td>$endDate</td>
<td>
                    <button class=\"btn btn-dark\" $buttonStartStatus type=\"button\" onclick=\"startQuiz($quizId)\">
                        <i class=\"material-icons\">play_arrow</i>
                    </button></td>
<td>                    <button class=\"btn btn-dark\"  $buttonEndStatus type=\"button\" onclick=\"endQuiz($quizId)\">
                        <i class=\"material-icons\">stop</i>
                    </button></td></td>
</tr>
";

}

echo "
            </tbody>
            <tbody class=\"users - list\">
            </tbody>
        </table>

    </div>
</div>";
