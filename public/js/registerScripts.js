function validateRegisterForm() {
    let loginElement = document.getElementById("inputLogin");
    let passwordElement = document.getElementById("inputPassword");
    let passwordRepeatedElement = document.getElementById("inputRepeatedPassword");
    let valid = true;
    let errorColor = "#121141";

    if(document.getElementById("passwordMessage"))
        document.getElementById("messages").removeChild(document.getElementById("passwordMessage"));
    if(document.getElementById("loginMessage"))
        document.getElementById("messages").removeChild(document.getElementById("loginMessage"));


    if (passwordElement.value !== passwordRepeatedElement.value) {
        passwordElement.style.backgroundColor = errorColor;
        passwordRepeatedElement.style.backgroundColor = errorColor;
        let p2 = "<p id=\"passwordMessage\">Entered passwords are not the same.</p>";
        if(!document.getElementById("passwordMessage")) {
            document.getElementById("messages").insertAdjacentHTML('beforeend', p2);
        }
        document.getElementById("inputPassword").value = "";
        document.getElementById("inputRepeatedPassword").value = "";

        valid = false;
    }

    $.ajax({
        type: "POST",
        url: "check.php",
        async: false,
        data: {login : loginElement.value},
        success: function(data) {
            if(data != '0') {
                loginElement.style.backgroundColor = errorColor;
                let p1 = "<p id=\"loginMessage\">Login is already taken.</p>";
                if(!document.getElementById("loginMessage")) document.getElementById("messages").insertAdjacentHTML('beforeend', p1);
                document.getElementById("inputLogin").value = "";
                valid = false;
            }}
    });
    return valid;
}


// TODO poprawić na jquery