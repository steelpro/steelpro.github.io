$(document).ready(function () {
	var contentOffset = getOffset();

	function getOffset() {
		var topOffSet = $("h2").offset();
		return topOffSet.top;
	}

	$(window).resize(function() {
		contentOffset = getOffset();
	});

	$(window).scroll(function() {
		var windowTop = $(window).scrollTop();

		if (windowTop > contentOffset) {
			$("#toTop").css("opacity", "100");
		} 
		else {
			$("#toTop").css("opacity", "0");
		}
	});
	$('#toTop').click(function () {
		$('body,html').animate( {scrollTop: 0}, 800);
		return false;
	});
});

function searchMenu() {
	var input = document.getElementById("searchBar").value;
	input = input.toUpperCase();
	var searchBar = document.getElementById("searchBar");

	
	if (input == "") {
		searchBar.style.background = "#FC2312";
		searchBar.style.color = "white";
		alert("Please specify the drink, pastry, or coffee roast you wish to find.")
	}
	else {
		searchBar.style.background = "#026342";
		searchBar.style.color = "white";

		var coffeeList = document.getElementById("coffee");
		var coffeeItem = coffeeList.getElementsByTagName("li");

		var latteList = document.getElementById("latte");
		var latteItem = latteList.getElementsByTagName("li");

		var icedList = document.getElementById("iced");
		var icedItem = icedList.getElementsByTagName("li");

		var frappList = document.getElementById("frapp");
		var frappItem = frappList.getElementsByTagName("li");

		var pastryList = document.getElementById("pastry");
		var pastryItem = pastryList.getElementsByTagName("li");

		if (findInMenu(input, coffeeItem))
			alert("We have that coffee roast available!");
		else if (findInMenu(input, latteItem)) 
			alert("We have that latte available!");
		else if (findInMenu(input, icedItem)) 
			alert("We have that iced drink available!");
		else if (findInMenu(input, frappItem)) 
			alert("We have that frappuccino available!");
		else if (findInMenu(input, pastryItem)) 
			alert("We have that pastry available!");
		else 
			alert("Sorry, we do not have what you are looking for. Please confirm it is spelled correctly.")	
	}	
}

function findInMenu(input, list) {
	var found = 0;

	for (var i = 0; i < list.length; i++) {
		if (input == list[i].innerText) {
			found = 1;
			break;
		}
		else
			found = 0;
	}

	if (found == 1) 
		return true;
	else 
		return false;
}

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
		firstNameInput.style.background = "#FC2312";
		firstNameInput.style.color = "white";
		alert("Form content is either missing or incorrect. Please review.");
		return false;
	}
	else if (lastName == "") {
		var lastNameInput = document.getElementById("lastName");
		lastNameInput.style.background = "#FC2312";
		lastNameInput.style.color="white";
		alert("Form content is either missing or incorrect. Please review.");
		return false;
	}
	else if (email == "" || !email.match(emailFormat)) {
		var emailInput = document.getElementById("email");
		emailInput.style.background = "#FC2312";
		emailInput.style.color = "white";
		alert("Form content is either missing or incorrect. Please review.");
		return false;
	}
	else if (phone == "" || !phone.match(phoneFormat)) {
		var phoneInput = document.getElementById("phone");
		phoneInput.style.background = "#FC2312";
		phoneInput.style.color="white";
		alert("Form content is either missing or incorrect. Please review.");
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
	var text = document.getElementById("contactMessage").value;
	var emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	if (subject == "") {
		var subjectInput = document.getElementById("subject");
		subjectInput.style.background = "#FC2312";
		subjectInput.style.color = "white";
		alert("Subject field is empty. Please review.")
		return false;
	}
	else if (email == "" || !email.match(emailFormat)) {
		var emailInput = document.getElementById("emailPost");
		emailInput.style.background = "#FC2312";
		emailInput.style.color = "white";
		alert("Email field is either empty or incorrect. Please review.");
		return false;
	}
	else if (text == "") {
		var textArea = document.getElementById("contactMessage");
		textArea.style.background = "#FC2312";
		textArea.style.color = "white";
		alert("Message field is blank. Please review.");
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