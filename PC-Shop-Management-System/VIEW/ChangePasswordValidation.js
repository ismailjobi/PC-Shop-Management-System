function clearErrors() {

    errors = document.getElementsByClassName('errorMsg');
    for (let item of errors) {
        item.innerHTML = "";
    }
}
function isvalidateChangepassForm(cForm) {
    var valid = true;
    var datafill = true;
    clearErrors();


    if (cForm.currantPass.value == "") {
        document.getElementById("currantPass_msg").innerHTML = "*Please enter the currant password.";
        valid = false;

    }
    if (cForm.newPass.value == "") {
        document.getElementById("newPass_msg").innerHTML = "*Please enter the new password.";
        valid = false;
        datafill = false;

    }
    if (cForm.confirmPass.value == "") {
        document.getElementById("confirmPass_msg").innerHTML = "*Please re-enter the new password.";
        valid = false;
        datafill = false;
    }
    var newPass = cForm.newPass.value;
    var confirmPass = cForm.confirmPass.value;
    if (datafill == true) {
        if (!(newPass == confirmPass)) {
            document.getElementById("confirmPass_msg").innerHTML = "*New password does not match.";
            valid = false;
        }
    }



    return valid;
}
