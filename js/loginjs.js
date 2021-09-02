function formValidation() {
	var uname = document.loginform.uname;
	var passid = document.loginform.psw;
	var cpassid = document.loginform.confirmpsw;
	
	if (allLetter(uname)) {
		if (passid_validation(passid)) {
			if (cpassid_validation(passid, cpassid)) {
			}
		}
	}
	
	
	
}
function allLetter(uname) {
	var letters = /^[A-Za-z ]+$/;
	if (uname.value.match(letters)) {
		return true;
		} else {
		alert('Username must have alphabet characters only');
		event.preventDefault();
		uname.focus();
		
	}
}

function passid_validation(passid) {
	var passid_len = passid.value.length;
	if ( passid_len <= 7 || passid_len >= 12) {
		alert(
			'Password should not be empty / length be between 7 to 12'
		);
		event.preventDefault();
		passid.focus();
		
	}
	else{return true;}
	
}

function cpassid_validation(passid, cpassid) {
	if (passid.value !== cpassid.value) {
		alert("Password didn't match");
		event.preventDefault();
		cpassid.focus();
		
	}
	else{return true;}
}
