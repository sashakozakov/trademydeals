<?php
include('../db.php');
$headers = "From: kumarioffshore@gmail.com" ;
$nickname=$_POST['nickname'];
$payer_fname=$_POST['payer_fname'];
$payer_lname=$_POST['player_lname'];
$email=$_POST['email'];
$password=$_POST['password'];
$companyname=$_POST['companyname'];
$phone=$_POST['phone'];
$city=$_POST['city'];
$state=$_POST['state'];
$country=$_POST['country'];
$payer_zip=$_POST['payer_zip'];
$ip = $_SERVER['REMOTE_ADDR'];
if($_POST['password']==$_POST['rpassword'])
{
mysql_query("INSERT INTO `user`(`email`, `password`, `nickname`, `date`, `time`, `ip_address`, `status`, `country`, `firstname`, `lastname`, `town`, `state`, `postalcode`, `billing_email`, `phone`, `companyname`) VALUES ('$email','$password','$nickname',now(),now(),'$ip','Free Membership','$country','$payer_fname','$payer_lname','$city','$state','$payer_zip','$email','$phone','$companyname')");
mail($email, 'Hi '.$nickname .'You Have Successfully Register Trade My Deals', 'Your in Free Membership',$headers);
header("location:index.php");
}
?>