
function formValidation()
{
	var uname = document.driverform.username;
	var unidnumber = document.driverform.nidnumber;
	var uregistrationnum = document.driverform.registrationnum;
	var ucontactnum = document.driverform.contactnum;
	var passid = document.driverform.psw;
	var cpassid = document.driverform.confirmpsw;
	var uadddiv = document.driverform.presentdivision;
    var uadddis = document.driverform.presentdistrict;
	
	if(allLetter(uname))
	{
		if(usernid_validation(unidnumber))
		{
			if(userregistrationnum_validation(uregistrationnum))
			{
				if(number_validation(ucontactnum))
				{
					if(passid_validation(passid))
					{
						if(cpassid_validation(passid,cpassid))
						{
							if(alphanumeric(uadddiv))
							{	
								if(alphanumeric(uadddis))
								{
									
								}	
							}
						}
					}
				} 
			}
		}
	}
	
}


function allLetter(uname)
{ 
	var letters = /^[A-Za-z ]+$/;
	if(uname.value.match(letters))
	{
		return true;
	}
	else
	{
		alert('Username must have alphabet characters only');
		event.preventDefault();
		uname.focus();	
	}
}

function usernid_validation(unidnumber)
{
	var unid_len = unidnumber.value.length;
	if (unid_len <=10|| unid_len >=15)
	{
		alert('invalid NID number');
		event.preventDefault();
		unidnumber.focus();
		return false;
	}
	else{return true;}
	
}



function userregistrationnum_validation(uregistrationnum)
{
	var uregistrationnum_len = uregistrationnum.value.length;
	if (   uregistrationnum_len <= 10  ||   uregistrationnum_len >= 15)
	{
		alert( 'invalid registration number');
		event.preventDefault();
		uregistrationnum.focus();
		return false;
	}
	else{return true;}
}


function number_validation(ucontactnum)
{
	var ucontactnum_len = ucontactnum.value.length;
	if (ucontactnum_len <11 || ucontactnum_len >11)
	{
		alert('invalid contact number');
		event.preventDefault();
		ucontactnum.focus();
		return false;
	}
	else{return true;}
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







function alphanumeric(uadddiv)
{ 
	var letters = /^[0-9a-zA-Z]+$/;
	if(uadd.value.match(letters))
	{
		return true;
	}
	else
	{
		alert('User address must have alphanumeric characters only');
		event.preventDefault();
		uadd.focus();
		
	}
}
function alphanumeric(uadddis)
{ 
	var letters = /^[0-9a-zA-Z]+$/;
	if(uadd.value.match(letters))
	{
		return true;
	}
	else
	{
		alert('User address must have alphanumeric characters only');
		event.preventDefault();
		uadd.focus();
		
	}
}

