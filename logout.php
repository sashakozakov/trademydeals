<?php
session_start();

   unset($_SESSION['FBID']);
      unset($_SESSION['USERNAME']);

   unset($_SESSION['FULLNAME']);

   unset($_SESSION['EMAIL']);
   unset($_SESSION['emailid']);
      unset($_SESSION['LOGOUT']);
unset($_SESSION['status']);
unset($_SESSION['user_name']);
unset($_SESSION['userid']);


header("Location: index.php");  
exit;


?>