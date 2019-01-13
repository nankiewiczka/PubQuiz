<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>
<script src="../../public/js/accountScripts.js"></script>


<body>
<?php include(dirname(__DIR__) . '/usernav.html'); ?>

<header class="masthead text-center text-white">
    <h1>AVAILABLE QUIZES</h1>
    <?php
    require_once __DIR__.'/../../model/QuizMapper.php';
    require_once __DIR__.'/../../model/UserMapper.php';

    $mapper = new QuizMapper();
    $userMapper = new UserMapper();
    $array = $mapper->getQuizesAvailableForUser($userMapper->getUser($_SESSION["id"]));
    echo "<div class=\"container\">
    <div class=\"row\">

        <h4 class=\"mt-4\">Your quizes:</h4>
        <table class=\"table table-hover\">
        <thead>
        <tr>
            <th>Name</th>
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
</header>




<?php include(dirname(__DIR__) . '/foot.html'); ?>

</body>
</html>