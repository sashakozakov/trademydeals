<?php
include("../db.php"); 
$message=$_POST['message'];
$id=$_POST['userid'];
echo $message;
//mysql_query("INSERT INTO `messages`(`messages`, `user_id`, `receiver_id`, `receiver_email`, `time`, `date`) VALUES('$message','200','$id','admin@gmail.com',now(),now())");
//header("location:index.php");
?>