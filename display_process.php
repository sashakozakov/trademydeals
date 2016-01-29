<?php
include('db.php');
$user_id=$_POST['user_id'];
$user_value1=$_POST['user_value1'];
if ($user_value1=='high') {
	$sql=mysql_query("SELECT highlighted_ads FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['highlighted_ads']-1;
    $update=mysql_query("UPDATE membership SET highlighted_ads='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");

}
elseif ($user_value1=='top') {
	$sql=mysql_query("SELECT top_ads FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['top_ads']-1;
    $update=mysql_query("UPDATE membership SET top_ads='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");

}
elseif ($user_value1=='home') {
	$sql=mysql_query("SELECT homepage_ads FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['homepage_ads']-1;
    $update=mysql_query("UPDATE membership SET homepage_ads='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");

}
elseif ($user_value1=='sidebar') {
	$sql=mysql_query("SELECT sidebar_ads FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['sidebar_ads']-1;
    $update=mysql_query("UPDATE membership SET sidebar_ads='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");

}
elseif ($user_value1=='slider') {
	$sql=mysql_query("SELECT slider_ads FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['slider_ads']-1;
    $update=mysql_query("UPDATE membership SET slider_ads='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");

}

?>