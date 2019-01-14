<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__) . '/head.html'); ?>
<script src="../../public/js/registerScripts.js"></script>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="?page=index">PubQuiz</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<header class="masthead text-center text-white">
    <div class="loginContainer">
        <div clas="row">
            <div class="col-sm-6 offset-sm-3">
            <h1>REGISTER</h1>
            <div id="messages">
            </div>

    <form action="?page=register" class="form" onsubmit="return validateRegisterForm()" method="post">
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputSurname" class="col-sm-2 col-form-label">Surname</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="inputSurname" name="surname" placeholder="Surname" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputLogin" class="col-sm-2 col-form-label">Login</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="inputLogin" name="login" placeholder="Login" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputRepeatedPassword" class="col-sm-2 col-form-label">Repeat password</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="inputRepeatedPassword" name="repeatedPassword" placeholder="" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-7">
                <button type="submit" class="btn btn-primary btn-lg float-right submitButton">Sign up</button>
            </div>
        </div>
    </form>
            </div>
        </div>
</div>
</header>
<?php include(dirname(__DIR__) . '/foot.html'); ?>

</body>
</html>
