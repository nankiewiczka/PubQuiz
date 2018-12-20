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

<div id="turquise" class="static">Static</div>
<div id="blue" class="static">Static</div>
<div id="violet" class="relative">Relative</div>
<div id="orange" class="absolute">Absolute</div>
<div id="red" class="fixed">Fixed</div>
<div id="yellow">Default</div>

</body>
</html>