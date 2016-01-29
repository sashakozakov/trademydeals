<?php
include('../db.php');
$title=$_POST['title'];
$description=$_POST['description'];
$country=$_POST['country'];
$state=$_POST['state'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$websitelink=$_POST['websitelink'];
$youtube=$_POST['youtube'];
$time=$_POST['date'];


$allowedExts = array("gif", "jpeg", "jpg", "png");
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
  "../img/" . $_FILES["file"]["name"]);
 // echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
  $tmp = "../img/" . $_FILES["file"]["name"];
 
  echo $tmp;
  }
  }
}
else
 {
 //echo "Invalid file";
 }

 $temp1=$_FILES["file"]["name"];

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
   echo "Upload: " . $_FILES["file2"]["name"] . "<br>";
   echo "Type: " . $_FILES["file2"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file2"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file2"]["tmp_name"] . "<br>";

if (file_exists("../img/" . $_FILES["file2"]["name"]))
  {
  echo $_FILES["file2"]["name"] . " already exists. ";
  }
else
  {
  move_uploaded_file($_FILES["file2"]["tmp_name"],
  "../img/" . $_FILES["file2"]["name"]);
 // echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
  $tmp2 = "../img/" . $_FILES["file2"]["name"];
 
  echo $tmp2;
  }
  }
}
else
 {
// echo "Invalid file";
 }

 $temp2=$_FILES["file2"]["name"];
 $process=$_GET['product'];
 $pid=$_POST['pid'];
 


 if($process=="deals")
 {
 	$data="UPDATE deals set `deals_title`='$title',`country`='$country',`state`='$state',`city_your`='$phone',`postalcode_your`='$email',`websitelink`='$websitelink',`youtube`='$youtube',`images`='$temp1',deals_images='$temp2' WHERE id=$pid";
    $sql=mysql_query($data);
    header("location:index.php");
 }
 elseif($process=='coupons')
 {
 	$data="UPDATE coupons set `coupons_title`='$title',`country`='$country',`state`='$state',`city_your`='$phone',`postalcode_your`='$email',`websitelink`='$websitelink',`youtube`='$youtube',`images`='$temp1',coupons_images='$temp2' WHERE id=$pid";
    $sql=mysql_query($data);
    header("location:index.php");
 }
 elseif($process=='flyers')
 {
 	$data="UPDATE flyers set `flyers_title`='$title',`country`='$country',`state`='$state',`city_your`='$phone',`postalcode_your`='$email',`websitelink`='$websitelink',`youtube`='$youtube',`images`='$temp1',flyers_images='$temp2' WHERE id=$pid";
    $sql=mysql_query($data);
    
    header("location:index.php");
 }
 elseif($process=='ads')
 {
 	$data="UPDATE ads set `ads_title`='$title',`country`='$country',`state`='$state',`city_your`='$phone',`postalcode_your`='$email',`websitelink`='$websitelink',`youtube`='$youtube',`images`='$temp1',ads_images='$temp2' WHERE id=$pid";
    $sql=mysql_query($data);

     header("Location: index.php");

    //header("location:index.php");
 }
 elseif($process=='jobs')
 {
 	$data="UPDATE jobs set `jobs_title`='$title',`country`='$country',`state`='$state',`city_your`='$phone',`postalcode_your`='$email',`websitelink`='$websitelink',`youtube`='$youtube',`images`='$temp1',jobs_images='$temp2' WHERE id=$pid";
    $sql=mysql_query($data);
    header("location:index.php");
 }
 else
 {
 	$data="UPDATE resumes set `resumes_title`='$title',`country`='$country',`state`='$state',`city_your`='$phone',`postalcode_your`='$email',`websitelink`='$websitelink',`youtube`='$youtube',`images`='$temp1',resumes_images='$temp2' WHERE id=$pid";
    $sql=mysql_query($data);
    header("location:index.php");
 } exit();
?>