<?php
include('db.php');
$main_menu_id1=isset($_GET['main_menu_id1'])? $_GET['main_menu_id1']:''; 


if(isset($_GET['sub_menu_id']))
{
$sub_menu_id = $_GET['sub_menu_id'];
$sub_menu_category=$_POST['sub_menu_category'];
if($main_menu_id1==3)
{
$query = "UPDATE tbl_sub_menu SET sub_menu_category='$sub_menu_category' WHERE sub_menu_id = $sub_menu_id ";
}
else
{
$query = "UPDATE tbl_sub_menu SET sub_menu_category_item='$sub_menu_category' WHERE sub_menu_id = $sub_menu_id ";
}
$result=mysql_query($query);
if(! $result )
{
  die('Could not update data: ' . mysql_error());
}
header('Location: othercategory.php?main_menu_id1=3&main_menu_id2=5&main_menu_id3=6');
}
?>
