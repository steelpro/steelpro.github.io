function checkData() {
	
	var firstName = document.getElementById("firstName").value;
	var lastName = document.getElementById("lastName").value;
	var sex = document.getElementById("sex").value;
	var age = document.getElementById("age").value;
	var email = document.getElementById("email").value;
	var phone = document.getElementById("phone").value;
	var experience = document.getElementById("experience").value;
	
	var phoneFormat = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	var emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	if (firstName == "") {
		var firstNameInput = document.getElementById("firstName");
		firstNameInput.style.background = "red";
		firstNameInput.style.color = "white";
		alert("Form content is either missing or incorrect. Please review.")
		return false;
	}
	else if (lastName == "") {
		var lastNameInput = document.getElementById("lastName");
		lastNameInput.style.background = "red";
		lastNameInput.style.color="white";
		alert("Form content is either missing or incorrect. Please review.")
		return false;
	}
	else if (email == "" || !email.match(emailFormat)) {
		var emailInput = document.getElementById("email");
		emailInput.style.background = "red";
		emailInput.style.color = "white";
		alert("Form content is either missing or incorrect. Please review.")
		return false;
	}
	else if (phone == "" || !phone.match(phoneFormat)) {
		var phoneInput = document.getElementById("phone");
		phoneInput.style.background = "red";
		phoneInput.style.color="white";
		alert("Form content is either missing or incorrect. Please review.")
		return false;		
	}
	else {
		var fullName = lastName + ", " + firstName;
		
		if (confirm('Are you sure you want to submit this information to apply for job?')) {
			alert('Information Sent');
		}
		else {
			alert('Action Canceled');
		}
		return true;
	}	
}

function checkContact() {
	var email = document.getElementById("emailPost").value;
	var subject = document.getElementById("subject").value;
	
	var emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	if (subject == "") {
		var subjectInput = document.getElementById("subject");
		subjectInput.style.background = "red";
		subjectInput.style.color = "white";
		alert("Subject field is empty. Please review.")
		return false;
	}
	else if (email == "" || !email.match(emailFormat)) {
		var emailInput = document.getElementById("emailPost");
		emailInput.style.background = "red";
		emailInput.style.color = "white";
		alert("Email field is either empty or incorrect. Please review");
		return false;
	}

	else {
		if (confirm('Are you sure you want to send this message?')) {
			alert('Mail Will Now Open');
			var message = document.getElementById("contactMessage").value;
			writeFile(subject, message);
		}
		else {
			alert('Action Canceled');
		}
		return true;
	}
}

function writeFile(subject, message) {
	window.open('mailto:starbuckskiosk@safeway.com?subject='+subject+'&body='+message);
}