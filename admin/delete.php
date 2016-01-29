<?php 
include('../db.php');
$id=$_GET['id'];
mysql_query("DELETE FROM `user` WHERE id='$id'");
header("location:deleteaccount.php");
?>