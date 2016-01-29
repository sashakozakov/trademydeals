<?php
include('header.php');
$email = $_GET['email'];
$password = $_POST['password'];
if(isset($_POST['submit']) && $_POST['submit'] == 'Update')
{
$updateQuery = mysql_query("UPDATE user SET password='".$password."' WHERE email='".$email."'");
$msg = "Password has been Successfully Changed";
}
?>
<script type="text/javascript">	
 function checkPass()
 {
	var form = document.formpass;
	if(form.password.value == '')
	{
	   alert('Please Enter New Password');
	   form.password.select();
	   form.password.focus();
	   return false;
	}
	
	if(form.confimrpass.value == '')
	{
	   alert('Please Enter Confirm Password');
	   form.confimrpass.select();
	   form.confimrpass.focus();
	   return false;
	}
	
	if(form.password.value != form.confimrpass.value)
	{
	   alert('Password not matched');
	   form.confimrpass.select();
	   form.confimrpass.focus();
	   return false;
	}
	return true;
 }
</script>
<style type="text/css">
.formwidth{width:40%;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('.content2').css('display','none');
});	
</script>
<div class="content">
    	<div class="container">
        	<div class="col-lg-12">
            	<div class="col-lg-9">
                	<div class="col-lg-12">
                	<div class="deals_content">  	
<form name="formpass" action="newpassword.php?email=<?php echo urlencode($email);?>" method="post" class="formwidth" onsubmit="return checkPass();">
   <span class="pull-left" style="font-weight:bold;color:#FF000;"><?php echo $msg;?></span>
   <div>New Password<input type="password" name="password" id="password" class="form-control"></div>
   <div>Confirm Password<input type="password" name="confimrpass" id="confirmpass" class="form-control"></div>
   <div><input type="submit" name="submit" class="btn btn btn-primary pull-left btn6" style="border-top-left-radius:10px;
border-top-right-radius:10px;border-bottom-left-radius:10px; padding:5px 10px; 
border-bottom-right-radius:10px;" value="Update"></div>
</form>
</div></div></div></div></div></div>
    
<?php 
include('footer.php');
?>
	
	
	