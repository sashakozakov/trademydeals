<?php
session_start();
include('db.php');
$email=$_POST['email'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$nickname=$_POST['nickname'];
$membership=$_GET['membership'];
$amount=$_GET['amount'];

if($password==$repassword){
$sql=mysql_query("SELECT * FROM user WHERE (email='$email' AND nickname='$nickname')");
if (mysql_num_rows($sql)) {
	header('location:signup.php?id=2');
}
else{
        $hash = md5(uniqid(rand(), true));
	$sql1=mysql_query("INSERT INTO `user`(`email`, `password`, `nickname`, `date`,`time`,`is_activate`,`hash`) VALUES ('$email','$password','$nickname',now(),now(),0,'$hash')");

    if(mysql_affected_rows()>0)
		{
			$sql=mysql_query("SELECT * FROM `user` WHERE (email='$email' or nickname='$nickname') and password='$password'");
            $query=mysql_fetch_array($sql);
			if($membership){

    $usermessages=$query['id'];
	$message=mysql_query("INSERT INTO `messages` (`messages`,`user_id`,`receiver_email`,`receiver_id`,`time`,`date`) VALUES('You have login Sucessfully in Trade my deals','200','admin@gmail.com','$usermessages',now(),now())");
mail($email,$subject,$txt,$headers);

				$_SESSION['status']='true';
		header('location:billingdetails.php?membership='.$membership.'&amount='.$amount);

	}
	else{
		$_SESSION['userid']=$query['id'];
		$usermessages=$query['id'];

$message=mysql_query("INSERT INTO `messages` (`messages`,`user_id`,`receiver_id`,`time`,`date`) VALUES('You have login Sucessfully in Trade my deals','200','admin@gmail.com','$usermessages',now(),now())");
$uId = $_SESSION['userid'];
$hashQuery = mysql_query("SELECT hash FROM user WHERE id=".$uId);
$hashResult = mysql_fetch_array($hashQuery);
$hash = $hashResult['hash'];
$subject = 'Hi'.' '.$nickname.' '.'You have successfully Register in Trade My Deals';
$headers  = 'From: admin@trademydeals.com \r\n';
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$url = 'http://trademydeals.com/verify.php?email='. urlencode($email) . '&key='.$hash;	
$txt = '<p>Hello&nbsp;'.$nickname.'</p>';
$txt.= '<p>Congratulations! To complete your registration on TradeMyDeals.</p>';
$txt.= '<p><a href='.$url.'>Click Here to confirm your email address.</a></p>';
$txt.= '<p>Once confirmed, you can manage your ads, email notifications,  feature notifications & much more from your dashboard.</p>';
$txt.= '<p>If clicking the link above does not work, you can type or copy and paste this URL into your browser.</p>';
$txt.= '<p>'.$url.'</p>';		
$txt.= '<p>Regards,</p>';
$txt.= '<p>Trade My Deals Team</p>';

mail($email,$subject,$txt,$headers);

    $_SESSION['status']='true';
    $_SESSION['user_name']=$query['nickname'];
    $_SESSION['email']=$query['email'];
    header('location:registerSuccess.php');
	
		}
	}
		else{
			header('location:signup.php?id=3');
		}
}

}
else{
	
		header('location:signup.php?id=1');
	
	
}

?>