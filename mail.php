<?php
$to = "srini21itking@gmail.com";
$subject = "Hi $nickname You have successfully Register in Trade My Deals";
$txt = "http://bluewhalesolutions.com/D/trademydeals/signup.php";
$headers = "From: kumarioffshore@gmail.com" ;

mail($to,$subject,$txt,$headers);
?>