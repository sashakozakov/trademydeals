<?php
include('db.php');
if(isset($_GET['sub_menu_id']))
{
	$main_menu_id = $_GET['main_menu_id'];
	$sub_menu_id = $_GET['sub_menu_id'];
$sub_menu_category_item=$_GET['sub_menu_category_item'];
$query = "UPDATE tbl_sub_menu SET sub_menu_category_item='$sub_menu_category_item' WHERE sub_menu_id=$sub_menu_id ";
$result=mysql_query($query);
if(! $result )
{
  die('Could not update data: ' . mysql_error());
}
header("location:dealscategory.php?main_menu_id=$main_menu_id");
}
?>
