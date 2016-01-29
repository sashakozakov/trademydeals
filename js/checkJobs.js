// JavaScript Document
function checkJobs()
{
	var form = document.listForm;
	var re = /\S+@\S+\.\S+/;
	var email = form.current_postalcode.value;
	
	if(form.title.value == '')
	{
		alert('Please Enter Job Title Name');
		form.title.select();
		form.title.focus();
		return false;
	}
	
	if(form.description.value == '')
	{
	    alert('Please Enter Job Description');
		form.description.select();
		form.description.focus();
		return false; 	
	}
	
	if(form.country.value == -1)
	{
		alert('Please Select Country from dropdown');
		form.description.select();
		form.description.focus();
		return false; 	
	}
	
	if(form.state.value == '' || form.state.value == -1)
	{
		alert('Please Select State from dropdown');
		form.state.select();
		form.state.focus();
		return false;
	}
	
	if(form.city.value == '' && form.postalcode.value == '')
	{
		alert('At least one of Postal code and City text fields should not be empty.');
		if(form.city.value == '')
		{
			form.city.select();
			form.city.focus();
		}else{
			form.postalcode.select();
			form.postalcode.focus();
		}
		return false;
	}
/*
	if(form.current_city.value == '')
	{
		alert('Please Enter Phone number');
		form.current_city.select();
		form.current_city.focus();
		return false;
	}	
*/
	if(form.current_postalcode.value == '')
	{
		alert('Please Enter Email Address');
		form.current_postalcode.select();
		form.current_postalcode.focus();
		return false;
	}
	
	if(!re.test(email))
	{
		alert('Please Enter Valide Email Address');
		form.current_postalcode.select();
		form.current_postalcode.focus();
		return false;
	}
	
	
	return true;
}	