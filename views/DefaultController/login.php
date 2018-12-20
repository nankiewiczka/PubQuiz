<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html') ?>

<body>

<div class="loginContainer">
    <div clas="row">
        <div class="col-sm-6 offset-sm-3">
            <h1>LOGIN</h1>
            <hr>
            <?php if(isset($message)): ?>
                <?php foreach($message as $item): ?>
                    <div><?= $item ?></div>
                <?php endforeach; ?>
            <?php endif; ?>

            <form action="?page=login" method="POST">
                <div class="form-group row">
                    <label for="inputLogin" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">email</i>
                    </label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="inputLogin" name="login" placeholder="Login" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">person</i>
                    </label>
                    <div class="col-sm-11">
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="password" required/>
                    </div>
                </div>
                <input type="submit" value="Sign in" class="btn btn-primary btn-lg float-right submitButton" />
                <p>Don't have an account? <a href=<?php echo '?page=register'; ?>>Sign up now</a>.</p>
            </form>
        </div>
    </div>
</div>

</body>
</html>