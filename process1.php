<?php
$file_name = '';
if(isset($_FILES['file']) && $_FILES['file']['name'] != ''){
	if($_FILES["file"]["error"] <= 0){
		$name = explode('.',$_FILES["file"]["name"]);
		$file_name = time().'.'.$name[count($name)-1];
		move_uploaded_file($_FILES["file"]["tmp_name"],  "upload/" . $file_name);
	}
}
require("email/phpmailer/class.phpmailer.php");
$to = $_POST['to_email'];
$from_name =  $_POST['name1'];
$from =  $_POST['email1'];
$sub = "New Message from $from_name";
$msg = $_POST['message'];
$mail    = new PHPMailer();
$mail->IsHTML(true);            // set email format to HTML
$mail->CharSet="UTF-8";         // set the charset to UTF-8
$mail->Encoding = '7bit';
$mail->SetFrom( $from, $from_name);
	//$mail->AddReplyTo( $current_user->user_email, $from_name);
$mail->Subject = $sub;
//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$mail->AddAddress($to);
$mail->MsgHTML($msg);
if($file_name != ''){
	$mail->AddAttachment("upload/".$file_name);
}
$mail->Send();
if(isset($_POST['ccmail']) && $_POST['ccmail'] != '')
{
	$to = $_POST['email1'];
	$from_name =  $_POST['name1'];
	$from =  $_POST['email1'];
	$sub = "New Message";
	$msg = $_POST['message'];
	$mail    = new PHPMailer();
	$mail->IsHTML(true);            // set email format to HTML
	$mail->CharSet="UTF-8";         // set the charset to UTF-8
	$mail->Encoding = '7bit';
	$mail->SetFrom( $from, $from_name);
		//$mail->AddReplyTo( $current_user->user_email, $from_name);
	$mail->Subject = $sub;
	//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->AddAddress($to);
	$mail->MsgHTML($msg);
	if($file_name != ''){
		$mail->AddAttachment("upload/".$file_name);
	}
	$mail->Send();
}
if($_POST['option'] == 'jobs')
	header('location:getjobs.php?email=true&id='.$_POST['id']);
	
if($_POST['option'] == 'resumes')
	header('location:getresumes.php?email=true&id='.$_POST['id']);
	
if($_POST['option'] == 'ads')
	header('location:getads.php?email=true&id='.$_POST['id']);
	

	
/*include('db.php');
$to=$_POST['to'];
$from=$_POST['name1'];
$subject ="From: $from" ;
$message=$_POST['message'];
$user=$_POST['user'];
$user_id=$_POST['user_id'];
$puser=$_POST['puser'];
$ccmail = $_POST['ccmail'];
$txt="Hi My name $user Requesting Your Product";
mail($to,$txt,$message,$subject);
if($ccmail != '')
{
  mail($from,$txt,$message,$subject);	
}	
$message=mysql_query("INSERT INTO `messages` (`messages`,`user_id`,`receiver_email`,`receiver_id`,`time`,`date`) VALUES('$message','$user_id','$to','$puser',now(),now())");
//echo "INSERT INTO `messages` (`messages`,`user_id`,`receiver_email`,`receiver_id`,`time`,`date`) VALUES('$message','$user_id','$to','$puser',now(),now())"; die;
$message=mysql_query("INSERT INTO `messages` (`messages`,`user_id`,`receiver_email`,`receiver_id`,`time`,`date`) VALUES('$message','$user_id','admin@gmail.com','200',now(),now())");
header('location:index.php');*/
?>