<?php 


$name0 = $_POST['highlight'];
$name1 = $_POST['promote_ads1']; 
$name2 = $_POST['promote_ads2']; 
$name3 = $_POST['promote_ads3']; 

if($name0 =='high')     {
header( 'Location: paypal2/paypal2.php?sandbox=1' ) ; 
 }
else{
header( 'Location: postfree.php' ) ; 
 }


?>