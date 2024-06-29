function clearErrors() {

    errors = document.getElementsByClassName('errorMsg');
    for (let item of errors) {
        item.innerHTML = "";
    }
}
function isvalidateRegistrationForm(rForm) {
    var valid = true;
    clearErrors();
    
    if (rForm.fname.value == "") {
        document.getElementById("fname_msg").innerHTML = "*Please enter the firstname.";
        valid = false;

    }
    if (rForm.lname.value == "") {
        document.getElementById("lname_msg").innerHTML = "*Please enter the lastname.";
        valid = false;

    }
    if (rForm.faname.value == "") {
        document.getElementById("faname_msg").innerHTML = "*Please enter the father name.";
        valid = false;

    }
    if (rForm.mname.value == "") {
        document.getElementById("mname_msg").innerHTML = "*Please enter the mother name.";
        valid = false;

    }
    if (rForm.gender.value == "") {
        document.getElementById("gender_msg").innerHTML = "*Please enter the gender.";
        valid = false;

    }
    if (rForm.Nid.value == "") {
        document.getElementById("nid_msg").innerHTML = "*Please enter the nid number.";
        valid = false;

    }
    else {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            const resp = JSON.parse(this.responseText);
            console.log(resp);
            for (let i = 0; i < resp.length; i++) {
                
                if (!(resp[i].nid_number == rForm.Nid.value)) {
                    document.getElementById("password_msg").innerHTML = "*This nid number already used.";
                    valid = false;
                }

            }
        }
        xhttp.open("GET", "../CONTROLER/Data.php");
        xhttp.send();
        //valid = false;
    }

    if (rForm.dob.value == "") {

        document.getElementById("dob_msg").innerHTML = "*Please enter the date of birth.";
        valid = false;

    }
    if (rForm.email.value == "") {
        document.getElementById("email_msg").innerHTML = "*Please enter the email.";
        valid = false;
    }
    else {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!(rForm.email.value.match(mailformat))) {
            document.getElementById("email_msg").innerHTML = "*You have entered an invalid email address.";
            valid = false;
        }
        else {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function () {
                const resp = JSON.parse(this.responseText);
                console.log(resp);
                for (let i = 0; i < resp.length; i++) {
                    
                    if (!(resp[i].email == rForm.email.value)) {
                        document.getElementById("password_msg").innerHTML = "*This email address already used1.";
                        valid = false;
                    }

                }
            }
            xhttp.open("GET", "../CONTROLER/Data.php");
            xhttp.send();
            //valid = false;
        }
    }
    var phone = rForm.phone.value;
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
    if (rForm.add.value == " ") {
        document.getElementById("address_msg").innerHTML = "*Please enter the address.";
        valid = false;
    }

    if (rForm.userName.value == "") {
        document.getElementById("userName_msg").innerHTML = "*Please enter the username.";
        valid = false;
    }
    else {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            const resp = JSON.parse(this.responseText);
            console.log(resp);
            for (let i = 0; i < resp.length; i++) {
                
                if (!(resp[i].username == rForm.userName.value)) {
                    document.getElementById("password_msg").innerHTML = "*This username already used.";
                    valid = false;
                }

            }
        }
        xhttp.open("GET", "../CONTROLER/Data.php");
        xhttp.send();
        //valid = false;
    }

    if (rForm.password.value == "") {
        document.getElementById("password_msg").innerHTML = "*Please enter the password.";
        valid = false;
    }
    


    return valid;
}


