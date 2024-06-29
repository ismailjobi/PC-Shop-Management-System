function clearErrors() {

    errors = document.getElementsByClassName('errorMsg');
    for (let item of errors) {
        item.innerHTML = "";
    }
}
function isvalidateForm(uForm) {
    var valid = true;
    clearErrors();
    if (uForm.userName.value == "") {
        document.getElementById("userName_msg").innerHTML = "*Please enter the username.";
        valid = false;

    }

    if (uForm.password.value == "") {
        document.getElementById("password_msg").innerHTML = "*Please enter the password.";
        valid = false;

    }
    

    return valid;
}

