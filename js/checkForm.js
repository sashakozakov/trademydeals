// JavaScript Document
function checkForm()
{
	var form = document.listForm;
	var re = /\S+@\S+\.\S+/;
	var email = form.current_postalcode.value;
	
	if(form.title.value == '')
	{
		alert('Please Enter Deal Title Name');
		form.title.select();
		form.title.focus();
		return false;
	}
	
	if(form.description.value == '')
	{
	    alert('Please Enter Deal Description');
		form.description.select();
		form.description.focus();
		return false; 	
	}
	
	if(form.country.value == -1)
	{
		alert('Please Select Country from dropdown');
		form.country.select();
		form.country.focus();
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
	
	if(form.current_city.value == '')
	{
		alert('Please Enter Phone number');
		form.current_city.select();
		form.current_city.focus();
		return false;
	}	
	
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
	
	if(form.regular[0].checked == false && form.regular[1].checked == false && form.regular[2].checked == false)
	{
		alert('Please Select Deal Publishing Plan');
		return false;
	}	
	
	return true;
}	
