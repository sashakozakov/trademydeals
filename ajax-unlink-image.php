<?php
include_once 'classes/SafeMySQL.class.php';

$file_name = $_REQUEST['file_name'];

unlink("img/".$file_name);
$id = $_REQUEST['image_id'];
if(!empty($id)) {
    $db = SafeMySQL::getInstance();

    $delete = 'post-images';
    $db->query("DELETE FROM ?n WHERE id=?i",$delete,$id);
echo $id;
}
?>