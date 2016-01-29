<?php
$page='terms';
include('header.php');
 ?>
 <style>
 	.lbl{
		width:200px;
		float:left;
	}
	#submit{
		background:rgb(176,0,0);
		color:#fff;
		padding:10px;
		border:0px;
		border-radius:5px;
		-moz-border-radius:5px;
		-webkit-border-radius:5px;
		font-weight:bold;
	}
 </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
	function checkform(){
		var form = document.request;
		var re = /\S+@\S+\.\S+/;
		var email = form.email.value;
		
		if(form.fname.value == '')
		{
			alert('Please Enter First Name');
			form.fname.focus();
			return false;
		}
		
		if(form.lname.value == '')
		{
			alert('Please Enter Last Name');
			form.lname.focus();
			return false;
		}
		
		if(form.company.value == '')
		{
			alert('Please Enter Company Name');
			form.company.focus();
			return false;
		}
		
		if(form.phone.value == '')
		{
			alert('Please Enter Phone No');
			form.phone.focus();
			return false;
		}
		
		if(form.email.value == '')
		{
			alert('Please Enter Email address');
			form.email.focus();
			return false;
		}
		
		if(!re.test(email))
		{
			alert('Please Enter Valid Email Address');
			form.email.focus();
			return false;
		}
		
		if(form.terms.checked == false)
		{
			alert('Please check on terms and condition checkbox.');
			return false;
		}
	}
 </script>
  <div class="content">
    <div class="container">
     <div class="col-lg-12">
        <div class="col-lg-9">
            <div class="col-lg-12">
                <div class="sub1" style="margin-top:20px; margin-bottom:15px; margin-left:-5px;">
                    <h4>Advertise and Partnership with us</h4>
                </div>
                <p><strong>Advertise request form:</strong></p>
                
                <p>Required fields are marked with<i style="margin-left:10px; color:#CC0000;">*</i></p>
                <form name="request" method="post" action="" id="request" onsubmit="return checkform();">
                    <p><label class="lbl">First Name: </label><input type="text" name="fname" id="fname" /><i style="margin-left:10px; color:#CC0000;">*</i></p>
                    <p><label class="lbl">Last Name: </label><input type="text" name="lname" id="lname" /><i style="margin-left:10px; color:#CC0000;">*</i></p>
                    <p><label class="lbl">Name of Company: </label><input type="text" name="company" id="company" /><i style="margin-left:10px; color:#CC0000;">*</i></p>
                    <p><label class="lbl">Business Phone Number: </label><input type="text" name="phone" id="phone" /><i style="margin-left:10px; color:#CC0000;">*</i></p>
                    <p><label class="lbl">Business E-mail Address: </label><input type="text" name="email" id="email" /><i style="margin-left:10px; color:#CC0000;">*</i></p><br />
                    <p><input type="checkbox" value="1" name="terms" id="terms" style="margin-right:10px;" /> By submitting this form, you agree that TradeMyDeals may use your information to contact you regarding your advertising opportunities on our website. TradeMyDeals will not share, or sell to any other parties your information.</p><br />
                    <p><label class="lbl">&nbsp;</label><input type="submit" name="submit" id="submit" value="SUBMIT YOUR REQUEST" /></p><br /><br />
                </form>
                
                <p>Create your own advertisement or send someone a special message. You can sell your car or almost anything through our websites at really low prices. And now you can do it online!</p>
                
                <p>By submitting this form, you agree that TradeMyDeals may use your information to contact you regarding your advertising opportunities on our website. TradeMyDeals will not share, or sell to any other parties your information.</p>
            </div>
        </div>


<?php include('footer.php'); ?>