<?php 
include('../db.php');
$id1=$_GET['uid'];
$id=$_GET['id'];
$product=$_GET['product'];
$delete=mysql_query("DELETE FROM $product WHERE id='$id'");
header('location:accountdetails.php?uid=' .$id1);
?>