<?php
session_start();

include_once 'classes/SafeMySQL.class.php';
$userId = $_SESSION['userid'];

$data['country']  = $_POST['country']?:'';
$data['firstname'] = $_POST['txtfirstname'];
$data['lastname'] = $_POST['txtlastname'];
$data['companyname'] = $_POST['txtcmpname'];
$data['town'] = $_POST['city'];
$data['state'] = $_POST['state'];
$data['postalcode'] = $_POST['postalcode'];
$data['billing_email'] = $_POST['email'];
$data['phone'] = $_POST['phone'];
$data['ip_address'] = $_SERVER['REMOTE_ADDR'];


$db = SafeMySQL::getInstance();
$sql = "INSERT INTO user SET id=?i, ?u ON DUPLICATE KEY UPDATE ?u";
$db->query($sql,$userId,$data,$data);

header("location:Editmyinfo.php");
exit();
?>