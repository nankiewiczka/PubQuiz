<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html') ?>

<body>

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
                <h1>LOGIN</h1>
                <form action="?page=login" method="POST">
                    <div class="form-group row">
                        <label for="inputLogin" class="col-sm-2 col-form-label">
                            <i class="material-icons">account_box</i>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputLogin" name="login" placeholder="Login" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">
                            <i class="material-icons">vpn_key</i>
                        </label>
                        <div class="col-sm-8">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required/>
                        </div>
                    </div>
                    <input type="submit" value="Sign in" class="btn btn-primary btn-lg float-center submitButton" />
                </form>
            </div>
        </div>
    </div>
</header>

<?php include(dirname(__DIR__).'/foot.html') ?>

</body>
</html>