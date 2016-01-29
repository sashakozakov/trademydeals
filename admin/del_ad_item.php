<?php
include('db.php');
if(isset($_GET['sub_menu_id']))
{
$sub_menu_id = $_GET['sub_menu_id'];
$query = "DELETE FROM `tbl_sub_menu` WHERE `sub_menu_id`=".$sub_menu_id;
$result=mysql_query($query);
if(isset($result)) {
   echo "YES";
} else {
   echo "NO";
}
}
?>