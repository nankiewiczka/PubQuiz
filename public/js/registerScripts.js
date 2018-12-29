function validateRegisterForm() {
    let valid = true;
    let errorColor = "#178533";

    if($("#loginMessage").length)
        $('#loginMessage').remove();
    if($("#passwordMessage").length)
        $('#passwordMessage').remove();

    if ($("#inputPassword").val() !== $("#inputRepeatedPassword").val()) {
        $("#inputPassword").css('background-color', errorColor);
        $("#inputRepeatedPassword").css('background-color', errorColor);
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
        url: "check.php",
        async: false,
        data: {login : login},
        success: function(data) {
            if(data != '0') {
                $("#inputLogin").css('background-color', errorColor);
                let p1 = "<p id=\"loginMessage\">Login is already taken.</p>";
                if(!$("#loginMessage").length) {
                    $("#messages").append(p1);
                }
                $("#inputLogin").val('');
                valid = false;
            }}
    });
    return false;
}

