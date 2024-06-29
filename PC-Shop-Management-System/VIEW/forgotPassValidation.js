function clearErrors() {

    errors = document.getElementsByClassName('errorMsg');
    for (let item of errors) {
        item.innerHTML = "";
    }
}
function isvalidateForgotPassForm(fForm) {
    var valid = true;
    clearErrors();

    if (fForm.email.value == "") {
        document.getElementById("email_msg").innerHTML = "*Please enter the email.";
        valid = false;
    }
    else {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!(fForm.email.value.match(mailformat))) {
            document.getElementById("email_msg").innerHTML = "*You have entered an invalid email address.";
            valid = false;
        }
    }



    return valid;
}
