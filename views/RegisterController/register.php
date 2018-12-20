<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__) . '/head.html'); ?>

<body>
<div class="col-sm-6 offset-sm-3">

<h1>Create account</h1>
<p>
    <?= $text ?>
</p>
    <form action="?page=register" class="form" onsubmit="return validateContactForm()" method="post">
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name="name" placeholder="Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputSurname" class="col-sm-2 col-form-label">Surname</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputSurname" name="surname" placeholder="Surname">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputLogin" class="col-sm-2 col-form-label">Login</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputLogin" name="login" placeholder="Login">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="" >
            </div>
        </div>
        <div class="form-group row">
            <label for="inputRepeatedPassword" class="col-sm-2 col-form-label">Repeat password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputRepeatedPassword" name="repeatedPassword" placeholder="" >
            </div>
        </div>
        <div class="form-group row">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" >
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
                <button type="submit" onClick="sendContact();" class="btn btn-primary submitButton">Sign in</button>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"
        type="text/javascript"></script>
<script>
    function sendContact() {
        let valid;
        valid = validateContactForm();
        if(valid) {
            jQuery.ajax({
                url: "../../controllers/RegisterController.php",
                data:'name='+$("#inputName").val()+'&surname='+
                    $("#inputSurname").val()+'&login='+
                    $("#inputLogin").val()+'&password='+
                    $("#inputPassword").val() + '&repeatedPassword='+
                        $("#inputRepeatedPassword"),
                type: "POST",
                success:function(data){
                    $("#mail-status").html(data);
                },
                error:function (){}
            });
        }
    }
// TODO  w php dodaje do bazy i zmieniam html + link do logowania
    function validateContactForm() {
        let valid = true;
        // $(".demoInputBox").css('background-color', '');
        // $(".info").html('');
        if (!$("#inputName").val()) {
            // $("#userName-info").html("(required)");
            $("#inputName").css('background-color', '#235647');
            valid = false;
        }
        // if (!$("#userEmail").val()) {
        //     $("#userEmail-info").html("(required)");
        //     $("#userEmail").css('background-color', '#FFFFDF');
        //     valid = false;
        // }
        // if (!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
        //     $("#userEmail-info").html("(invalid)");
        //     $("#userEmail").css('background-color', '#FFFFDF');
        //     valid = false;
        // }
        // if (!$("#subject").val()) {
        //     $("#subject-info").html("(required)");
        //     $("#subject").css('background-color', '#FFFFDF');
        //     valid = false;
        // }
        // if (!$("#content").val()) {
        //     $("#content-info").html("(required)");
        //     $("#content").css('background-color', '#FFFFDF');
        //     valid = false;
        // }
        return valid;
    }
</script>
</body>
</html>