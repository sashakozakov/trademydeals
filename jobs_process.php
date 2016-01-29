<?php 
require_once("db.php");
include("custom_function.php");
$title=addslashes($_POST['title']);
$company=$_POST['company'];
$category=$_POST['category'];
$sub_category=$_POST['sub-category'];
$description=htmlspecialchars($_POST['description'], ENT_QUOTES);
$country=$_POST['country'];
$state=$_POST['state'];
$city_ads=$_POST['city'];
$postal_ads=$_POST['postalcode'];
$city_your=$_POST['current_city'];
$postal_your=$_POST['current_postalcode'];
$website=$_POST['website'];
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
$exp_date=$_POST['expire'];
$share_phone=isset($_POST['share_phone']) ? 1 : 0;
$share_email=isset($_POST['share_email']) ? 1 : 0;

/*$allowedExts = array("gif", "jpeg", "jpg", "png");
 $extension = end(explode(".", $_FILES["file"]["name"]));
 if ((($_FILES["file"]["type"] == "image/gif")
 || ($_FILES["file"]["type"] == "image/jpeg")
 || ($_FILES["file"]["type"] == "image/jpg")
 || ($_FILES["file"]["type"] == "image/pjpeg")
 || ($_FILES["file"]["type"] == "image/x-png")
 || ($_FILES["file"]["type"] == "image/png"))
    ||($_FILES["file"]["size"] < 1000000)
    && in_array($extension, $allowedExts))
  {
 if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
}
 else
{
   echo "Upload: " . $_FILES["file"]["name"] . "<br>";
   echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

if (file_exists("../img/" . $_FILES["file"]["name"]))
  {
  echo $_FILES["file"]["name"] . " already exists. ";
  }
else
  {
  move_uploaded_file($_FILES["file"]["tmp_name"],
  "img/" . $_FILES["file"]["name"]);
 // echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
  $tmp = "img/" . $_FILES["file"]["name"];
 
  echo $tmp;
  }
  }
}
else
 {
 echo "Invalid file";
 }

 $temp1=$_FILES["file"]["name"];*/

 $allowedExts2 = array("gif", "jpeg", "jpg", "png");
 $extension2 = end(explode(".", $_FILES["file2"]["name"]));
 if ((($_FILES["file2"]["type"] == "image/gif")
 || ($_FILES["file2"]["type"] == "image/jpeg")
 || ($_FILES["file2"]["type"] == "image/jpg")
 || ($_FILES["file2"]["type"] == "image/pjpeg")
 || ($_FILES["file2"]["type"] == "image/x-png")
 || ($_FILES["file2"]["type"] == "image/png"))
    ||($_FILES["file2"]["size"] < 1000000)
    && in_array($extension, $allowedExts))
  {
 if ($_FILES["file2"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file2"]["error"] . "<br>";
}
 else
{
 /*   echo "Upload: " . $_FILES["file2"]["name"] . "<br>";
   echo "Type: " . $_FILES["file2"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file2"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file2"]["tmp_name"] . "<br>"; */

if (file_exists("../img/" . $_FILES["file2"]["name"]))
  {
  echo $_FILES["file2"]["name"] . " already exists. ";
  }
else
  {
 $file_name = getToken(6).$_FILES["file2"]['name'];
  move_uploaded_file($_FILES["file2"]["tmp_name"],  "img/" . $file_name);
 // echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
  //$tmp2 = "img/" . getToken(6).$_FILES["file2"]["name"];
 
 // echo $tmp2;
  }
  }
}
 $temp2=$file_name;
 $user=mysql_query("SELECT * FROM user WHERE id='$user_id'");
    $username=mysql_fetch_array($user);
    $nickname=$username['nickname'];
    $subject = "Hi $nickname You have successfully Posted Your Job $title in Trade My Deals";
    $txt = "http://trademydeals.com/jobs.php";
    $headers = "From: admin@trademydeals.com" ;
    $uemail = $username['email'];
    $message=mysql_query("INSERT INTO `messages` (`messages`,`user_id`,`receiver_email`,`receiver_id`,`time`,`date`) VALUES('You have login Sucessfully in Trade my deals','200','admin@gmail.com','$user_id',now(),now())");
    mail($uemail,$subject,$txt,$headers);
  
    $sql="INSERT INTO `jobs`(`user_id`,`jobs_title`, `category-name`,`sub-category-id`,`company_name`, `description`, `country`, `state`, `city_job`, `postalcode_job`, `city_your`, `postalcode_your`, `websitelink`, `youtube`, `images`, `publish_plan`, `promote_jobs`,`promote_jobs1`,`promote_jobs2`,`promote_jobs3`,`promote_jobs4`, `promote_high`, `promote_top`, `promote_sider`, `promote_slider`, `promote_home`, `date_time`,`jobs_images`,`exp_date`,`share_phone`,`share_email`) VALUES  ('$user_id','$title','$category','$sub_category','$company','$description','$country','$state','$city_ads','$postal_ads','$city_your','$postal_your','$website','$youtube','$temp1','$text','$promote_ads','$promote_ads1','$promote_ads2','$promote_ads3','$promote_ads4','$promote_high','$promote_top','$promote_sider','$promote_slider','$promote_home', now(),'$temp2','$exp_date','$share_phone','$share_email')";
    //echo $sql;
    mysql_query($sql);
	$insert_id = mysql_insert_id();
	UploadImages($insert_id,'jobs');
    header("Location: getjobs.php?id=$insert_id");
	exit;    
?>