<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>

<body>

<h1>HOMEPAGE</h1>
<p>
    <?= $text ?>
</p>


<?php
if(isset($_SESSION) && !empty($_SESSION)) {
    print_r($_SESSION);
}
?>

</body>
</html>