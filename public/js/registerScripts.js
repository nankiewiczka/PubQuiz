function validateRegisterForm() {
    let valid = true;

    if($("#loginMessage").length)
        $('#loginMessage').remove();
    if($("#passwordMessage").length)
        $('#passwordMessage').remove();

    if ($("#inputPassword").val() !== $("#inputRepeatedPassword").val()) {
        let p2 = "<p id=\"passwordMessage\">Entered passwords are not the same.</p>";

        if(!$("#passwordMessage").length) {
            $("#messages").append(p2);
        }

        $("#inputPassword").val('');
        $("#inputRepeatedPassword").val('');

        valid = false;
    }
    let login = $('#inputLogin').val();
    $.ajax({
        type: "POST",
        url: "?page=check_login_available",
        async: false,
        data: {login : login},
        success: function(data) {
            if(data != '0') {
                let p1 = "<p id=\"loginMessage\">Login is already taken.</p>";
                if(!$("#loginMessage").length) {
                    $("#messages").append(p1);
                }
                $("#inputLogin").val('');
                valid = false;
            }}
    });
    return valid;
}

