<?php 
require_once("db.php");
include("custom_function.php");
$title=addslashes($_POST['title']);
$product=$_POST['product'];
$category=$_POST['category'];
$sub_category=$_POST['sub-category'];
$company=$_POST['company'];
$description=$_POST['description'];
$country=$_POST['country'];
$state=$_POST['state'];
$city_ads=$_POST['city'];
$postal_ads=$_POST['postalcode'];
$city_your=$_POST['current_city'];
$postal_your=$_POST['current_postalcode'];
$website=$_POST['website'];
$webname=$_POST['website1'];
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
$type=$_POST['type'];
$price=$_POST['price'];
$share_phone=isset($_POST['share_phone']) ? 1 : 0;
$share_email=isset($_POST['share_email']) ? 1 : 0;

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
   /*echo "Upload: " . $_FILES["file2"]["name"] . "<br>";
   echo "Type: " . $_FILES["file2"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file2"]["size"] / 1024) . " kB<br>";
    echo "Temps file: " . $_FILES["file2"]["tmp_name"] . "<br>"; */

if (file_exists("../img/" . $_FILES["file2"]["name"]))
  {
  echo $_FILES["file2"]["name"] . " already exists. ";
  }
else
  {
  $file_name = getToken(6).$_FILES["file2"]['name'];
  move_uploaded_file($_FILES["file2"]["tmp_name"],  "img/" . $file_name);
 // echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
  $tmp2 = "img/" . getToken(6).$_FILES["file2"]["name"];
 
  //echo $tmp2;
  }
  }
}
$temp2=$file_name;
$sql="INSERT INTO `ads`"
        . "(`user_id`,"
        . "`ads_title`,"
        . "`category-name`,"
        . "`sub-category-id`, "
        . "`company_name`, "
        . "`description`, "
        . "`country`, "
        . "`state`, "
        . "`city_ad`, "
        . "`postalcode_ad`, "
        . "`city_your`, "
        . "`postalcode_your`, "
        . "`websitelink`, "
        . "`youtube`, "
        . "`images`, "
        . "`publish_plan`, "
        . "`promote_ads`,"
        . "`promote_ads1`,"
        . "`promote_ads2`,"
        . "`promote_ads3`,"
        . "`promote_ads4`, "
        . "`promote_high`, "
        . "`promote_top`, "
        . "`promote_sider`, "
        . "`promote_slider`, "
        . "`promote_home`, "
        . "`date_time`,"
        . "`ads_images`,"
        . "`exp_date`,"
        . "`type`,"
        . "`price`,"
        . "`share_phone`"
        . ",`share_email`) VALUES  ('$user_id','$title','$category','$sub_category','$company','$description','$country','$state','$city_ads','$postal_ads','$city_your','$postal_your','$website','$youtube','$temp1','$text','$promote_ads','$promote_ads1','$promote_ads2','$promote_ads3','$promote_ads4','$promote_high','$promote_top','$promote_sider','$promote_slider','$promote_home', now(),'$temp2','$exp_date','$type','$price','$share_phone','$share_email','$share_phone','$share_email')";  
$sql11=mysql_query($sql);
$insert_id = mysql_insert_id($sql11);
UploadImages($insert_id,'ads');
header("Location: getads.php?id=$insert_id");
?>