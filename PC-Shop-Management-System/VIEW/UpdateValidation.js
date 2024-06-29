function clearErrors() {

    errors = document.getElementsByClassName('errorMsg');
    for (let item of errors) {
        item.innerHTML = "";
    }
}
function isvalidateUpdateForm(uForm) {
    var valid = true;
    clearErrors();

    if (uForm.fname.value == "") {
        document.getElementById("fname_msg").innerHTML = "*Please enter the firstname.";
        valid = false;

    }
    if (uForm.lname.value == "") {
        document.getElementById("lname_msg").innerHTML = "*Please enter the lastname.";
        valid = false;

    }
    if (uForm.faname.value == "") {
        document.getElementById("faname_msg").innerHTML = "*Please enter the father name.";
        valid = false;

    }
    if (uForm.mname.value == "") {
        document.getElementById("mname_msg").innerHTML = "*Please enter the mother name.";
        valid = false;

    }
    if (uForm.gender.value == "") {
        document.getElementById("gender_msg").innerHTML = "*Please enter the gender.";
        valid = false;

    }
    if (uForm.Nid.value == "") {
        document.getElementById("nid_msg").innerHTML = "*Please enter the nid number.";
        valid = false;

    }
    if (uForm.dob.value == "") {
        document.getElementById("dob_msg").innerHTML = "*Please enter the date of birth.";
        valid = false;

    }
    if (uForm.email.value == "") {
        document.getElementById("email_msg").innerHTML = "*Please enter the email.";
        valid = false;
    }
    else {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!(uForm.email.value.match(mailformat))) {
            document.getElementById("email_msg").innerHTML = "*You have entered an invalid email address.";
            valid = false;
        }
    }
    var phone = uForm.phone.value;
    if (phone == "") {
        document.getElementById("phone_msg").innerHTML = "*Please enter the phone number.";
        valid = false;
    }
    else {
        if (phone.length != 11) {
            document.getElementById("phone_msg").innerHTML = "*Phone number should be of 11 digits!";
            valid = false;
        }
    }
    if (uForm.add.value == " ") {
        document.getElementById("address_msg").innerHTML = "*Please enter the address.";
        valid = false;
    }

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
