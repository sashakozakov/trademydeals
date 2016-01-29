<?php
$page='terms';
include('header.php');
 ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 
 <script type="text/javascript">
 	function checkform(){
		var form = document.request;
		var re = /\S+@\S+\.\S+/;
		var email = form.email1.value;
		
		if(form.name1.value == '')
		{
			alert('Please Enter Name');
			form.name1.focus();
			return false;
		}
				
		if(form.email1.value == '')
		{
			alert('Please Enter Email address');
			form.email1.focus();
			return false;
		}
		
		if(form.message.value == '')
		{
			alert('Please Enter message.');
			form.message.focus();
			return false;
		}
		
		if(!re.test(email))
		{
			alert('Please Enter Valid Email Address');
			form.email1.focus();
			return false;
		}
		
		if(form.captcha_text.value == ''){
			alert('Enter Verification code.');
			form.captcha_text.focus();
			return false;
		}else{
			var return_data = $.ajax({ type:"POST", url: "check_captcha.php", async: false, data: $("#captcha_text").serialize(), success: function(data) { return data; } });
			if(return_data.responseText == 'false'){
				alert('Verification code is wrong.');
				form.captcha_text.focus();
				return false;
			}
		}
	}
	
	$(document).ready(function(){
		$('img#refresh').click(function() {  
			change_captcha();
		 });
		 
		 function change_captcha()
		 {
			document.getElementById('captcha').src="get_captcha.php?rnd=" + Math.random();
		 }
		 
	});
</script>
<style>
	.lbl{
		float:left;
		width:25%;
		font-weight:bold;
	}
	.form-control{
		width:70%;
		display:inline;
	}
</style>
 
  <div class="content">
    <div class="container">
     <div class="col-lg-12">
        <div class="col-lg-9">
            <div class="col-lg-12">
                <div class="sub1" style="margin-top:20px; margin-bottom:15px; margin-left:-5px;">
                    <h4>Contact Us</h4>
                </div>
                <?php if(isset($_GET['email']) && $_GET['email'] == 'true'){
						echo '<p style="color:#00aa00; font-weight:bold; text-align: center; margin: 20px;">Email has sent successfully</p>';
				} ?>
                <form action="contact.php" method="post" name="request" id="request" onsubmit="return checkform();">
                	<p>Required fields are marked with <i style="margin-left:10px; color:#CC0000;">*</i></p>
                    <div class="col-lg-10" style="margin-top:20px;">
                        <label class="lbl">Name:</label>
                        <input type="text" name="name1" id="name1" class="form-control"  value="" style="background:#efefef;"><i style="margin-left:10px; color:#CC0000;">*</i>
                    </div>
                    <div class="col-lg-10" style="margin-top:20px;">
                        <label class="lbl">Email:</label>
                        <input type="text" name="email1" id="email1" class="form-control"  value="" style="background:#efefef;"><i style="margin-left:10px; color:#CC0000;">*</i>
                    </div>
                    <div class="col-lg-10" style="margin-top:20px;">
                        <label class="lbl">Subject:</label>
                        <select name="subject" id="subject" class="form-control">
                        	<option value="subject1">subject1</option>
                            <option value="subject2">subject2</option>
                        </select><i style="margin-left:10px; color:#CC0000;">*</i>
                    </div>
                    <div class="col-lg-10" style="margin-top:20px;">
                        <label class="lbl">Company:</label>
                        <input type="text" name="company" id="company" class="form-control"  value="" style="background:#efefef;">
                    </div>
                    <div class="col-lg-10" style="margin-top:20px;">
                        <label class="lbl">Phone:</label>
                        <input type="text" name="phone" id="phone" class="form-control"  value="" style="background:#efefef;">
                    </div>
                    <div class="col-lg-10" style="margin-top:20px;">
                        <label class="lbl">Message:</label>
                        <textarea name="message" class="form-control" rows="6" cols="50" id="message" style="background:#fff;"></textarea><i style="margin-left:10px; color:#CC0000;">*</i>
                    </div>
                    <div class="col-lg-10" style="margin-top:20px;">
                        <label for="verify" class="lbl">Verification code:</label>
                        <img src="get_captcha.php" alt="" id="captcha" />
                        <img src="images/refresh.jpg" width="25" alt="" id="refresh" style="cursor:pointer; margin-bottom:10px;" /><br /><br />
                        <label class="lbl">&nbsp;</label><input class="form-control" type="text" name="captcha_text" id="captcha_text" style="background:#efefef;" />
                    </div>
                    <div class="col-lg-10" style="margin-top:20px;">
                    	<label class="lbl">&nbsp;</label>
                        <input type="submit" name="submit" value="submit" class="btn btn-lg btn-success btn1" />
                    </div>
                </form>
            </div>
        </div>


<?php include('footer.php'); ?>