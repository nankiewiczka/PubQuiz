<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>
<script src="../../public/js/accountScripts.js"></script>


<body>
<?php include(dirname(__DIR__) . '/usernav.html'); ?>
<header class="masthead text-center text-white">
    <h1>QUIZES HISTORY</h1>
    <?php
    require_once __DIR__.'/../../model/ScoreMapper.php';
    require_once __DIR__.'/../../model/UserMapper.php';

    $mapper = new ScoreMapper();
    $userMapper = new UserMapper();
    $array = $mapper->getScoresForUser($userMapper->getUser($_SESSION["id"]));
    echo "<div class=\"container\">
    <div class=\"row\">

        <h4 class=\"mt-4\">Your quizes:</h4>
        <table class=\"table table-hover\">
        <thead>
        <tr>
            <th>Quiz name</th>
            <th>Your points</th>
        </tr>
        </thead>
        <tbody>";

    $id = 0 ;
    foreach ($array as  $value) {
        $name = $value['name'];
        $points = $value['points'];
        echo "
        <tr>
            <td>$name</td>
            <td>$points</td>

        ";
        $id = $id +1;
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