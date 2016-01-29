<?php
include('db.php');
$sql1=mysql_query("DROP TABLE admin_membership");
$sql2=mysql_query("DROP TABLE admin_user");
$sql3=mysql_query("DROP TABLE ads");
$sql4=mysql_query("DROP TABLE coupons");
$sql5=mysql_query("DROP TABLE deals");
$sql6=mysql_query("DROP TABLE flyers");
$sql7=mysql_query("DROP TABLE jobs");
$sql8=mysql_query("DROP TABLE membership");
$sql9=mysql_query("DROP TABLE messages");
$sql10=mysql_query("DROP TABLE paypal_log");
$sql11=mysql_query("DROP TABLE purchases");
$sql12=mysql_query("DROP TABLE resumes");
$sql13=mysql_query("DROP TABLE tbl_country_details");
$sql14=mysql_query("DROP TABLE tbl_sub_menu");
$sql15=mysql_query("DROP TABLE user");


?>