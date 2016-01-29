<?php
include('db.php');
$user_id=$_POST['user_id'];
$user_value1=$_POST['user_value1'];
if ($user_value1=='high') {
	$sql=mysql_query("SELECT highlighted_flyers FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['highlighted_flyers']-1;
    $update=mysql_query("UPDATE membership SET highlighted_flyers='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");

}
elseif ($user_value1=='top') {
	$sql=mysql_query("SELECT top_flyers FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['top_flyers']-1;
    $update=mysql_query("UPDATE membership SET top_flyers='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");

}
elseif ($user_value1=='home') {
	$sql=mysql_query("SELECT homepage_flyers FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['homepage_flyers']-1;
    $update=mysql_query("UPDATE membership SET homepage_flyers='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");

}
elseif ($user_value1=='sidebar') {
	$sql=mysql_query("SELECT sidebar_flyers FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['sidebar_flyers']-1;
    $update=mysql_query("UPDATE membership SET sidebar_flyers='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");

}
elseif ($user_value1=='slider') {
	$sql=mysql_query("SELECT slider_flyers FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['slider_flyers']-1;
    $update=mysql_query("UPDATE membership SET slider_flyers='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");

}

?>