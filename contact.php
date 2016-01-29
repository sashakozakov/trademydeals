<?php
//error_reporting(E_ALL);
require("email/phpmailer/class.phpmailer.php");
$to = 'support@trademydeals.com';//$_POST['email1'];//"ali.ahfm@gmail.com"; //support@trademydeals.com
$from_name =  $_POST['name1'];
$from =  $_POST['email1'];
$sub = "Contact form received from $from_name";
$msg = $_POST['message'];
$phone = $_POST['phone'];
$company = $_POST['company'];
$subject = $_POST['subject'];

$html = "<p>Name: $from_name</p>";
$html .= "<p>Email: $from</p>";
$html .= "<p>Subject: $subject</p>";
$html .= "<p>Company: $company</p>";
$html .= "<p>Phone: $phone</p>";
$html .= "<p>Message: $msg</p>";

$mail    = new PHPMailer();
try {
	$mail->IsHTML(true);            // set email format to HTML
	$mail->CharSet="UTF-8";         // set the charset to UTF-8
	$mail->Encoding = '7bit';
	$mail->SetFrom( $from, $from_name);
		//$mail->AddReplyTo( $current_user->user_email, $from_name);
	$mail->Subject = $sub;
	//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->AddAddress($to);
	$mail->MsgHTML($html);
	$mail->Send();
	
}catch (phpmailerException $e) {
  echo $e->errorMessage(); die;//Pretty error messages from PHPMailer 
} catch (Exception $e) {
  echo $e->getMessage(); die; //Boring error messages from anything else!
}

header('location:contactus.php?email=true');
die;

	

?>