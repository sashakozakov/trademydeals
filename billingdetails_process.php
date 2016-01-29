<?php
session_start();
include('db.php');
$nickname=$_SESSION['user_name'];
$country=$_POST['country'];
$fname=$_POST['payer_fname'];
$lname=$_POST['payer_lname'];
$companyname=$_POST['companyname'];
$city=$_POST['city'];
$state=$_POST['state'];
$zipcode=$_POST['payer_zip'];
$phone=$_POST['phone'];
$email=$_POST["payer_email"];
$ip = $_SERVER['REMOTE_ADDR'];


$sql3="UPDATE `user` SET ip_address='$ip',status='Free Membership',country='$country',firstname='$fname',lastname='$lname',town='$city',state='$state',postalcode='$zipcode',billing_email='$email',phone='$phone',companyname='$companyname' WHERE nickname='$nickname' ";
        $query2=mysql_query($sql3);
        header("Location:index.php");
?>