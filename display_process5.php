<?php
include('db.php');
$user_id=$_POST['user_id'];
$user_value1=$_POST['user_value1'];
if ($user_value1=='high') {
	$sql=mysql_query("SELECT highlighted_resumes FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['highlighted_resumes']-1;
    $update=mysql_query("UPDATE membership SET highlighted_resumes='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
//echo // "Remaining highlighted resume $value1";
}
elseif ($user_value1=='top') {
	$sql=mysql_query("SELECT top_resumes FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['top_resumes']-1;
    $update=mysql_query("UPDATE membership SET top_resumes='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
    //echo //"Remaining top resume $value1";

}
elseif ($user_value1=='home') {
	$sql=mysql_query("SELECT homepage_resumes FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['homepage_resumes']-1;
    $update=mysql_query("UPDATE membership SET homepage_resumes='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
  // echo //"Remaining homepage resume $value1";
}
elseif ($user_value1=='sidebar') {
	$sql=mysql_query("SELECT sidebar_resumes FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['sidebar_resumes']-1;
    $update=mysql_query("UPDATE membership SET sidebar_resumes='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
    //echo //"Remaining sidebar resume $value1";
}
elseif ($user_value1=='slider') {
	$sql=mysql_query("SELECT slider_resumes FROM `membership` WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
	$high=mysql_fetch_array($sql);
    $value1=$high['slider_resumes']-1;
    $update=mysql_query("UPDATE membership SET slider_resumes='$value1' WHERE user_id='$user_id' ORDER BY id desc LIMIT 1");
    //echo //"Remaining slider resume $value1";
}

?>