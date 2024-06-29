function clearErrors() {

    errors = document.getElementsByClassName('errorMsg');
    for (let item of errors) {
        item.innerHTML = "";
    }
}
function isvalidateattendanceForm(aForm) {
    var valid = true;
    clearErrors();

    if (aForm.employeeId.value == "") {
        document.getElementById("emoloyeeId_msg").innerHTML = "*Please enter Employee ID.";
        valid = false;

    }
    if (aForm.attendance.value == "") {
        document.getElementById("attendance_msg").innerHTML = "*Please enter attendance information.";
        valid = false;

    }
    if(valid)
    {
        valid=postData(aForm);
    }


    return valid;
}

function postData(pForm) {
	const employeeId = pForm.employeeId.value;
	const attendance = pForm.attendance.value;

	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		console.log(this.reponseText);
	}
	xhttp.open("POST", "../CONTROLER/AttendanceOparetion.php");
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("employeeId="+ employeeId +"&attendance=" + attendance);
    alert("Information Added.");
    validP = false;
    return validP;
}
