<?php
include('db.php');
if(isset($_GET['sub_menu_id']))
{
	
$sub_menu_id = $_GET['sub_menu_id'];
//echo $sub_menu_id = $_GET['sub_menu_id'];
$query = "SELECT sub_menu_category_item FROM tbl_sub_menu WHERE sub_menu_id=1";
$result=mysql_query($query);
$value=mysql_fetch_array($result);
echo $value;
//
//echo $value['sub_menu_category_item'];
}
?>