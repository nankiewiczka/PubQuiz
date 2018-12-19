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
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
        <div class="col-sm-10">
            <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
        </div>
    </div>
    <div class="form-group row">
        <label for="colFormLabel" class="col-sm-2 col-form-label">Surname</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="colFormLabel" placeholder="col-form-label">
        </div>
    </div>
    <div class="form-group row">
        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Login</label>
        <div class="col-sm-10">
            <input type="email" class="form-control form-control-lg" id="colFormLabelLg" placeholder="col-form-label-lg">
        </div>
    </div>
    <div class="form-group row">
        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Password</label>
        <div class="col-sm-10">
            <input type="email" class="form-control form-control-lg" id="colFormLabelLg" placeholder="col-form-label-lg">
        </div>
    </div>
    <div class="form-group row">
        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Repeat password</label>
        <div class="col-sm-10">
            <input type="email" class="form-control form-control-lg" id="colFormLabelLg" placeholder="col-form-label-lg">
        </div>
    </div>
    <div class="form-group">
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
    <input type="submit" value="Create account" class="btn btn-primary btn-lg float-right submitButton" />

</form>

</div>
</body>
</html>