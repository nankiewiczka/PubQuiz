<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>
<script src="../../public/js/accountScripts.js"></script>


<body>
<?php include(dirname(__DIR__) . '/bar.html'); ?>

<h1>Quizy</h1>
<?php
require_once __DIR__.'/../../model/QuizMapper.php';

$mapper = new QuizMapper();
$array = $mapper->getQuizesForAdmin();
echo "<div class=\"container\">
    <div class=\"row\">

        <h4 class=\"mt-4\">Your quizes:</h4>
        <table class=\"table table-hover\">
        <thead>
        <tr>
            <th>Nazwa</th>
            <th>Start date & time</th>
            <th>Play</th>
        </tr>
        </thead>
        <tbody>";


        foreach ($array as  $value) {
        $name = $value->getName();
        $startDate = $value->getStartDateTime();
        echo "
        <tr>
            <td>$name</td>
            <td>$startDate</td>
            <td>
            <form action=\"?page=quiz\" method=\"POST\">
            <button name=\"chooseQuizButton\" value=$name class=\"btn btn-dark\">
            <i class=\"material-icons\">play_arrow</i>
                </button>
            </form></td>
        ";
        }
        ?>
<?php
echo "
            </tbody>
            <tbody class=\"users - list\">
            </tbody>
        </table>

    </div>
</div>";
?>

</body>
</html>