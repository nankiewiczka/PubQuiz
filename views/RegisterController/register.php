<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__) . '/head.html'); ?>

<body>
<div class="col-sm-6 offset-sm-3">

<h1>Create account</h1>
<p>
    <?= $text ?>
</p>
    <form>
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputSurname" class="col-sm-2 col-form-label">Surname</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputSurname" placeholder="Surname">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputLogin" class="col-sm-2 col-form-label">Login</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputLogin" placeholder="Login">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputRepeatedPassword" class="col-sm-2 col-form-label">Repeat password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputRepeatedPassword" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary submitButton">Sign in</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>