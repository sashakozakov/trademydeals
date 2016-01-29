<?php 
include "db.php";
$id = $_REQUEST['id'];
$sub_id = $_REQUEST['sub_cat_id'];
$main_menu_id = $_REQUEST['main_menu_id'];
$q = "SELECT * FROM  `tbl_sub_menu` WHERE  `sub_menu_category` LIKE  '$id' and main_menu_id = '$main_menu_id'";
$sql=  mysql_query($q);
 while ($row = mysql_fetch_array($sql)) {
	if($sub_id == $row['sub_menu_id']){
		echo "<option selected value='".$row['sub_menu_id']."'>".$row['sub_menu_category_item']."</option>";
	}else{
		echo "<option value='".$row['sub_menu_id']."'>".$row['sub_menu_category_item']."</option>";
	}	
}
?>