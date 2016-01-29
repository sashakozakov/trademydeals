<?php
include('db.php');
$user_id=$_POST['user_id'];
$user_value1=$_POST['user_value1'];
if ($user_value1=='high') {
	$sql=mysql_query("SELECT highlighted_coupons FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['highlighted_coupons']-1;
    $update=mysql_query("UPDATE membership SET highlighted_coupons='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");

}
elseif ($user_value1=='top') {
	$sql=mysql_query("SELECT top_coupons FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['top_coupons']-1;
    $update=mysql_query("UPDATE membership SET top_coupons='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");

}
elseif ($user_value1=='home') {
	$sql=mysql_query("SELECT homepage_coupons FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['homepage_coupons']-1;
    $update=mysql_query("UPDATE membership SET homepage_coupons='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");

}
elseif ($user_value1=='sidebar') {
	$sql=mysql_query("SELECT sidebar_coupons FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['sidebar_coupons']-1;
    $update=mysql_query("UPDATE membership SET sidebar_coupons='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");

}
elseif ($user_value1=='slider') {
	$sql=mysql_query("SELECT slider_coupons FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['slider_coupons']-1;
    $update=mysql_query("UPDATE membership SET slider_coupons='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");

}

?>