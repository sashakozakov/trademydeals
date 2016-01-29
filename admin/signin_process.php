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
$sql=mysql_query("select * from user where email='$email'");
if (mysql_num_rows($sql)) {
	header('location:signin.php?id=2');
}
else{
	$sql1=mysql_query("INSERT INTO `user`(`email`, `password`, `nickname`) VALUES ('$email','$password','$nickname')");
    	
    if(mysql_affected_rows()>0)
		{
			$sql=mysql_query("SELECT * FROM `user` WHERE (email='$email' or nickname='$nickname') and password='$password'");
            $query=mysql_fetch_array($sql);
			if($membership){
			
    $usermessages=$query['id'];
	$message=mysql_query("INSERT INTO `messages` (`messages`,`user_id`,`receiver_email`,`receiver_id`,`time`,`date`) VALUES('You have login Sucessfully in Trade my deals','admin@gmail.com','200','$usermessages',now(),now())");
mail($email,'Hi $nickname You have successfully Register in Trade My Deals','http://bluewhalesolutions.com/D/trademydeals/signup.php','From: srini21itking@gmail.com');
				$_SESSION['status']='true';
		header('location:billingdetails.php?membership='.$membership.'&amount='.$amount);

	}
	else{
		$_SESSION['userid']=$query['id'];
		$usermessages=$query['id'];
	$message=mysql_query("INSERT INTO `messages` (`messages`,`user_id`,`receiver_id`,`time`,`date`) VALUES('You have login Sucessfully in Trade my deals','200','$usermessages',now(),now())");

    $_SESSION['status']='true';
    header('location:index.php?name='.$email);
	
		}
	}
		else{
			header('location:signin.php?id=3');
		}
}

}
else{
	
		header('location:signin.php?id=1');
	
	
}

?>