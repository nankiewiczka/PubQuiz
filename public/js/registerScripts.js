function validateRegisterForm() {
    let loginElement = document.getElementById("inputLogin");
    let passwordElement = document.getElementById("inputPassword");
    let passwordRepeatedElement = document.getElementById("inputRepeatedPassword");
    let valid = true;
    let errorColor = "#121141";
    let isLoginTaken = false; // TODO php sprawdzenie z bazą

    if (isLoginTaken) {
        loginElement.style.backgroundColor = errorColor;
        let p1 = "<p id=\"loginMessage\">Login is already taken.</p>";
        if(!document.getElementById("loginMessage"))
            document.getElementById("messages").insertAdjacentHTML('beforeend', p1)
        valid = false;
    }

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

    return valid;
}
