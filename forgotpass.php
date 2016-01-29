<?php
include('header.php');
include('db.php');
$email = $_POST['emailAddress'];
if(isset($_POST['submit']) && $_POST['submit'] == 'Submit')
{	
$emailQuery = mysql_query("SELECT * FROM user WHERE email='".$email."'");
$emailResult = mysql_fetch_array($emailQuery);

if(mysql_num_rows($emailQuery) > 0)
{	
$nickname = $emailResult['nickname'];
$hash = $emailResult['hash'];
$subject = 'Hi'.' '.$nickname.' '.'You have successfully Requested for new password';
$headers  = 'From: canada@bandjcanada.com \r\n';
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$url = 'http://trademydeals.com/newpassword.php?email='. urlencode($email) . '&key='.$hash;	
$txt = '<p>Hello&nbsp;'.$nickname.'</p>';
$txt.= '<p>Click below link to generate new password for your account</p>';
$txt.= '<p><a href='.$url.'>Click Here to reet your password.</a></p>';
$txt.= '<p>Once confirmed, you are redirect to reset password page.</p>';
$txt.= '<p>If clicking the link above does not work, you can type or copy and paste this URL into your browser.</p>';
$txt.= '<p>'.$url.'</p>';		
$txt.= '<p>Regards,</p>';
$txt.= '<p>Trade My Deals Team</p>'; 
mail($email,$subject,$txt,$headers);
$msg = 'We sent you reset password link please check  your Email Address';
}else{
$msg = 'Email Address not exist in our database please check and try again';
}
}
?>
<style type="text/css">
.formwidth{width:40%;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.content2').css('display','none');
	
	$('.formwidth').submit(function(){
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;		 
	if($('#emailAddress').val().trim() == ''){
      alert('Enter Email Address');
	  return false;
    }
	})
});	
</script>
<div class="content">
    	<div class="container">
        	<div class="col-lg-12">
            	<div class="col-lg-9">
                	<div class="col-lg-12">
                	<div class="deals_content">  	
<span style="pull-left">Enter your Registered Email Address Below Text box and We sent you reset password verification link via E-mail.</span>
<form name="formpass" action="forgotpass.php" method="post" class="formwidth">
   <span style="font-weight:bold;color:#FF000;"><?php echo $msg;?></span>
   <div><input type="text" name="emailAddress" id="emailAddress" class="form-control"></div>
   <div><input type="submit" name="submit" class="btn btn btn-primary pull-left btn6" style="border-top-left-radius:10px;
border-top-right-radius:10px;border-bottom-left-radius:10px; padding:5px 10px; 
border-bottom-right-radius:10px; " value="Submit"></div>
</form>
</div></div></div></div></div></div>
<?php 
include('footer.php');
?>
	
	
	