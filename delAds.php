<?php
include('db.php');
$id = $_GET['id'];
$message=mysql_query("DELETE FROM `ads` WHERE id=".$id."");
header('location:membershipuser.php');
?>