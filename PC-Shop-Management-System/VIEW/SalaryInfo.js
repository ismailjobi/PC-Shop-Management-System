function clearErrors() {

    errors = document.getElementsByClassName('errorMsg');
    for (let item of errors) {
        item.innerHTML = "";
    }
}
function isvalidateSalaryForm(sForm) {
    var valid = true;
    clearErrors();
    
    if (sForm.employeeId.value == "") {
        document.getElementById("emoloyeeId_msg").innerHTML = "*Please enter Employee ID.";
        valid = false;

    }
    if (sForm.salary.value == "") {
        document.getElementById("salary_msg").innerHTML = "*Please enter Employee Salary.";
        valid = false;

    }
    if(valid)
    {
        valid=postData(sForm);
    }
    
    return valid;
}

function postData(pForm) {
	const employeeId = pForm.employeeId.value;
	const salary = pForm.salary.value;

	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		console.log(this.reponseText);
	}
	xhttp.open("POST", "../CONTROLER/Salary_info_Oparetion.php");
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("employeeId="+ employeeId +"&salary=" + salary);
    alert("Information Added.");
    validP = false;
    return validP;
}
