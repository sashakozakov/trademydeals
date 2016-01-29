<?php
include("db.php");
include('header.php');
$email = trim(mysql_escape_string($_GET['email']));
$key   = trim(mysql_escape_string($_GET['key']));
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $('.content2').css('display','none');
});
</script>
<?php
if (isset($email) && isset($key))
	 
	{
	  $userActive = mysql_query("UPDATE user SET is_activate=1 WHERE email ='".$email."' AND hash='".$key."' ") or die(mysql_error());
	 
	if (mysql_affected_rows() > 0)
	{?>
	 <div class="content">
    	<div class="container">
        	<div class="col-lg-12">
            	<div class="col-lg-9">
                	<div class="col-lg-12">
                	<div class="deals_content">Thank you for registering to TradeMyDeals. Your Account has been activated. View Dashboard <a href="Editmyinfo.php" style="text-decoration:none;"">Click Here</a></div></div></div></div></div></div>
<?php	}
	}	
include('footer.php');
?>
