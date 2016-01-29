<?php
include("../db.php"); 
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$password=$_POST['rpassword'];
$id=$_POST['userid'];

$sql="UPDATE `user` set `firstname`='$fname',`lastname`='$lname',`password`='$password' WHERE id='$id'";
//echo $sql;
mysql_query($sql);
header('location:index.php');

?>