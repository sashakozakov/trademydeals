<?php 
include('db.php');
include('custom_function.php'); 
if(isset($_GET['action']) && $_GET['action']!='')
{
	$action = $_GET['action'];
	delete_post($_GET['id'],$action);
	header("Location: posted-feature.php?action=$action");
}

?>