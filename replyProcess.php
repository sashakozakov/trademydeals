<?php
include('db.php');
$to=$_POST['to'];
$from=$_POST['name1'];
$subject ="From: $from" ;
$message=$_POST['message'];
$user=$_POST['user'];
$user_id=$_POST['user_id'];
$puser=$_POST['puser'];
$ccmail = $_POST['ccmail'];
$txt="Hi My name $user Reply your query";
mail($to,$txt,$message,$subject);
if($ccmail != '')
{
  mail($from,$txt,$message,$subject);	
}	
$message=mysql_query("INSERT INTO `messages` (`messages`,`user_id`,`receiver_email`,`receiver_id`,`time`,`date`) VALUES('$message','$user_id','$to','$puser',now(),now())");
$message=mysql_query("INSERT INTO `messages` (`messages`,`user_id`,`receiver_email`,`receiver_id`,`time`,`date`) VALUES('$message','$user_id','admin@gmail.com','200',now(),now())");
header('location:index.php');
?>