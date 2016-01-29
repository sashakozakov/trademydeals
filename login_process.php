<?php
session_start();
include "db.php";
$ename=$_POST['lname'];
$password=md5($_POST['password']);


$sql=mysql_query("SELECT * FROM `user` WHERE (email='$ename' or nickname='$ename') and password='$password'");
$query=mysql_fetch_array($sql);
if ($query) {
	
$_SESSION['status']='true';	
$_SESSION['user_name']=$ename;
$_SESSION['userid']=$query['id'];
header('location:index.php');
	}
elseif($_POST['lname'] == '' && $_POST['password'] == '')
{
  header('location:signin.php?id=3');
}
	else{
         
$sql1=mysql_query("SELECT * FROM `admin_user` WHERE (email='$ename' or nickname='$ename') and password='$password'");
$query1=mysql_fetch_array($sql1); 


if ($query1) {
	$_SESSION['status']='true';	
$_SESSION['user_name']=$ename;
$_SESSION['userid']=$query1['id'];
header('location:admin/index.php');
}
else{

		header('location:signin.php?id=4');
	}
	}
?>