<?php
require_once("db.php");
require_once("../custom_function.php");  //die(getToken(6));
$title=$_POST['title'];
$company=$_POST['company'];
$category=$_POST['category'];
$sub_category=$_POST['sub-category'];
$description=$_POST['description'];
$country=$_POST['country'];
$state=$_POST['state'];
$city_ads=$_POST['city'];
$postal_ads=$_POST['postalcode'];
$city_your=$_POST['current_city'];
$postal_your=$_POST['current_postalcode'];
$website=$_POST['website1'];
$youtube=$_POST['youtube'];
$text=$_POST['text'];
$promote_ads=$_POST['highlight'];
$promote_ads1=$_POST['promote_ads1'];
$promote_ads2=$_POST['promote_ads2'];
$promote_ads3=$_POST['promote_ads3'];
$promote_ads4=$_POST['promote_ads4'];
$promote_high=$_POST['high'];
$promote_top=$_POST['top'];
$promote_sider=$_POST['sidebar'];
$promote_slider=$_POST['home'];
$promote_home=$_POST['topfeature'];
$user_id=$_POST['user_id'];
$share_phone = isset($_POST['share_phone']);
$share_email = isset($_POST['share_email']);

$types_file = ["image/gif", "image/jpeg", "image/jpg", "image/pjpeg", "image/x-png", "image/png"];


$temp2 = "";


if(!empty($_FILES['file2']['name'])){
    if(!in_array($_FILES["file2"]["type"], $types_file)){

        echo "Invalid format file";
        echo "Please add files format .gif/.jpeg/.jpg/.png";die();

    }elseif($_FILES["file2"]["size"] > 1000000){
        echo "File size must be < 10Mb";die();
    }else{

        $file_name = md5($_FILES["file2"]["tmp_name"]."_".$_FILES["file2"]["name"]);
        move_uploaded_file($_FILES["file2"]["tmp_name"], "../img/" . $file_name);
        $temp2 = $file_name;

    }
}

    $user=mysql_query("SELECT * FROM user WHERE id='$user_id'");
    $username=mysql_fetch_array($user);
    $nickname=$username['nickname'];
    $subject = "Hi $nickname You have successfully Posted Your Flyer $title in Trade My Deals";
    $txt = "http://trademydeals.com/flyers.php";
    $headers = "From: admin@trademydeals.com" ;
    $uemail = $username['email'];
    $message=mysql_query("INSERT INTO `messages` (`messages`,`user_id`,`receiver_email`,`receiver_id`,`time`,`date`) VALUES('You have login Sucessfully in Trade my deals','200','admin@gmail.com','$user_id',now(),now())");
    mail($uemail,$subject,$txt,$headers);
    $sql="INSERT INTO `flyers`(`user_id`,`flyers_title`, `category-name`,`sub-category-id`,`company_name`, `description`, `country`, `state`, `city_flyer`, `postalcode_flyer`, `city_your`, `postalcode_your`, `websitelink`, `youtube`, `images`, `publish_plan`, `promote_flyers`,`promote_flyers1`,`promote_flyers2`,`promote_flyers3`,`promote_flyers4`, `promote_high`, `promote_top`, `promote_sider`, `promote_slider`, `promote_home`, `date_time`,`flyers_images`,`share_phone`,`share_email`) VALUES  ('$user_id','$title','$category','$sub_category','$company','$description','$country','$state','$city_ads','$postal_ads','$city_your','$postal_your','$website','$youtube','$temp1','$text','$promote_ads','$promote_ads1','$promote_ads2','$promote_ads3','$promote_ads4','$promote_high','$promote_top','$promote_sider','$promote_slider','$promote_home', now(),'$temp2', '$share_phone', '$share_email')";
    //echo $sql;
    mysql_query($sql);

    $insert_id = mysql_insert_id();
    UploadImages($insert_id,'flyers');
    ini_set('display_errors',1);
    header('Location: posted-feature.php?action=flyers');
    exit;
