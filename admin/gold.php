<?php
include('../db.php');
$homepage_ads=$_POST['homepage_ads'];
$top_ads=$_POST['top_ads'];
$highlighted_ads=$_POST['highlighted_ads'];
$sidebar_ads=$_POST['sidebar_ads'];
$slider_ads =$_POST['slider_ads'];
$homepage_deals=$_POST['homepage_deals'];
$top_deals=$_POST['top_deals'];
$highlighted_deals=$_POST['highlighted_deals'];
$sidebar_deals=$_POST['sidebar_deals'];
$slider_deals =$_POST['slider_deals'];
$homepage_jobs=$_POST['homepage_jobs'];
$top_jobs=$_POST['top_jobs'];
$highlighted_jobs=$_POST['highlighted_jobs'];
$sidebar_jobs=$_POST['sidebar_jobs'];
$slider_jobs =$_POST['slider_jobs'];
$homepage_resumes=$_POST['homepage_resumes'];
$top_resumes=$_POST['top_resumes'];
$highlighted_resumes=$_POST['highlighted_resumes'];
$sidebar_resumes=$_POST['sidebar_resumes'];
$slider_resumes =$_POST['slider_resumes'];
$post_flyer=$_POST['post_flyer'];
$homepage_flyers=$_POST['homepage_flyers'];
$top_flyers=$_POST['top_flyers'];
$highlighted_flyers=$_POST['highlighted_flyers'];
$sidebar_flyers=$_POST['sidebar_flyers'];
$slider_flyers =$_POST['slider_flyers'];
$post_coupons=$_POST['post_coupons'];
$homepage_coupons=$_POST['homepage_coupons'];
$top_coupons=$_POST['top_coupons'];
$highlighted_coupons=$_POST['highlighted_coupons'];
$sidebar_coupons=$_POST['sidebar_coupons'];
$slider_coupons =$_POST['slider_coupons'];
mysql_query("UPDATE `admin_membership` SET `date`=now(),`time`=now(),`homepage_deals`='$homepage_deals',`top_deals`='$top_deals',`highlighted_deals`='$highlighted_deals',`sidebar_deals`='$sidebar_deals',`slider_deals`='$slider_deals',`post_coupons`='$post_coupons',`homepage_coupons`='$homepage_coupons',`top_coupons`='$top_coupons',`highlighted_coupons`='$highlighted_coupons',`sidebar_coupons`='$sidebar_coupons',`slider_coupons`='$slider_coupons',`post_flyer`='$post_flyer',`homepage_flyers`='$homepage_flyers',`top_flyers`='$top_flyers',`highlighted_flyers`='$highlighted_flyers',`sidebar_flyers`='$sidebar_flyers',`slider_flyers`='$slider_flyers',`homepage_ads`='$homepage_ads',`top_ads`='$top_ads',`highlighted_ads`='$highlighted_ads',`sidebar_ads`='$sidebar_ads',`slider_ads`='$slider_ads',`homepage_jobs`='$homepage_jobs',`top_jobs`='$top_jobs',`highlighted_jobs`='$highlighted_jobs',`sidebar_jobs`='$sidebar_jobs',`slider_jobs`='$slider_jobs',`homepage_resumes`='$homepage_resumes',`top_resumes`='$top_resumes',`highlighted_resumes`='$highlighted_resumes',`sidebar_resumes`='$sidebar_resumes',`slider_resumes`='$slider_resumes' WHERE status='Gold Membership'");
header('location:goldmembership.php')
?>