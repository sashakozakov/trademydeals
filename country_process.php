<?php
include('db.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];
$sql = mysql_query("SELECT * FROM `tbl_country_details` WHERE `country_iso_code`='$country'");
$country_row = mysql_fetch_assoc($sql);
$country1=$country_row['country_name'];	


    header('location: index.php?country='.$country1.'&&state='.$state.'&&city='.$city.'');

?>

