<?php
include("db.php");

//$types = array('ads', 'coupons', 'deals', 'flyers', 'jobs', 'resumes');
$types = array('ads');
foreach($types as $type) {
    $ads = mysql_query("SELECT * FROM `$type`");
    $current_date = date('m/d/Y');
    $expire_day = date('m/d/Y' , strtotime('-2 day'));
    $expire_day_3 = date('m/d/Y' , strtotime('+3 day'));

    $headers = "From: admin@trademydeals.com";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $subject = 'Expire date';

    while($result = mysql_fetch_array($ads)) {
        if($result['exp_date'] && strtotime($current_date) >= strtotime($result['exp_date'])) {
            mysql_query("UPDATE `$type` SET `status`=0 WHERE `id`={$result['id']}");
        }

        if($result['exp_date'] && $expire_day == $result['exp_date']) {
            $msg = "Your posting : Title: " . $result['ads_title'] . " , will exprire in two days, please signup to www.trademydeals.com  with your email ";
            mail($result['postalcode_your'] , $subject , $msg , $headers);
        }

        if($result['exp_date'] && $expire_day_3 == $result['exp_date']) {
            $msg = "Your posting : Title:" . $result['ads_title'] . " , is expire please signup to www.trademydeals.com  with your email ";
            mail($result['postalcode_your'] , $subject , $msg , $headers);
        }
    }
}