<?php
include('db.php');
$id = $_GET['id'];
$message=mysql_query("DELETE FROM `messages` WHERE id=".$id."");
header('location:mymessages.php');
?>