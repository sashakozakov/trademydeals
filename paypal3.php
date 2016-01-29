<?php
require_once("../db.php"); // include the library file

$title=$_POST['title'];
$product=$_POST['product'];
$company=$_POST['company'];
$description=$_POST['description'];
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
define('EMAIL_ADD', $city_your); // define any notification email
define('PAYPAL_EMAIL_ADD', 'veera.bluewhalesolutions@gmail.com'); // facilitator email which will receive payments change this email to a live paypal account id when the site goes live
require_once("paypal_class.php");
$p 				= new paypal_class(); // paypal class
$p->admin_mail 	= EMAIL_ADD; // set notification email
$action 		= $_REQUEST["action"];

switch($action){
	case "process": // case process insert the form data in DB and process to the paypal
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
 echo "Invalid file";
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
 echo "Invalid file";
 }

 $temp2=$_FILES["file2"]["name"];
    

    $subject = "Hi $nickname You have successfully Posted Your Flyer $title in Trade My Deals";
    $txt = "http://bluewhalesolutions.com/D/trademydeals/flyers.php";
    $headers = "From: kumarioffshore@gmail.com" ;
    mail($city_your,$subject,$txt,$headers);
    $sql="INSERT INTO `flyers`(`user_id`,`flyers_title`, `company_name`, `description`, `country`, `state`, `city_flyer`, `postalcode_flyer`, `city_your`, `postalcode_your`, `websitelink`, `youtube`, `images`, `publish_plan`, `promote_flyers`,`promote_flyers1`,`promote_flyers2`,`promote_flyers3`,`promote_flyers4`, `promote_high`, `promote_top`, `promote_sider`, `promote_slider`, `promote_home`, `date_time`,`flyers_images`) VALUES  ('$user_id','$title','$company','$description','$country','$state','$city_ads','$postal_ads','$city_your','$postal_your','$website','$youtube','$temp1','$text','$promote_ads','$promote_ads1','$promote_ads2','$promote_ads3','$promote_ads4','$promote_high','$promote_top','$promote_sider','$promote_slider','$promote_home', now(),'$temp2')";
   
   $srini= mysql_query($sql);
   $total=$_POST['total'];
    if($total==0)
    {
    	header("location:../index.php");
    }
		$this_script = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		$p->add_field('business', PAYPAL_EMAIL_ADD); // Call the facilitator eaccount
		$p->add_field('cmd', $_POST["cmd"]); // cmd should be _cart for cart checkout
		$p->add_field('upload', '1');
		$p->add_field('return', $this_script.'?action=success'); // return URL after the transaction got over
		$p->add_field('cancel_return', $this_script.'?action=cancel'); // cancel URL if the trasaction was cancelled during half of the transaction
		$p->add_field('notify_url', $this_script.'?action=ipn'); // Notify URL which received IPN (Instant Payment Notification)
		$p->add_field('currency_code', $_POST["currency_code"]);
		$p->add_field('invoice', $_POST["invoice"]);
		$p->add_field('item_name_1', $_POST["title"]);
		//$p->add_field('item_number_1', $_POST["product_id"]);
		$p->add_field('quantity_1', 1);
		$p->add_field('amount_1', $_POST["total"]);
		$p->add_field('first_name', $_POST["company"]);
		//$p->add_field('last_name', $_POST["payer_lname"]);
		//$p->add_field('address1', $_POST["payer_address"]);
		$p->add_field('city', $_POST["city"]);
		$p->add_field('state', $_POST["state"]);
		$p->add_field('country', $_POST["country"]);
		$p->add_field('zip', $_POST["payer_zip"]);
		$p->add_field('email', $_POST["city"]);
		$p->submit_paypal_post(); // POST it to paypal
	//	$p->dump_fields(); // Show the posted values for a reference, comment this line before app goes live
	break;
	
	case "success": // success case to show the user payment got success
		header('location:../index.php');
	
	case "ipn": // IPN case to receive payment information. this case will not displayed in browser. This is server to server communication. PayPal will send the transactions each and every details to this case in secured POST menthod by server to server. 
		$trasaction_id  = $_POST["txn_id"];
		$payment_status = strtolower($_POST["payment_status"]);
		$invoice		= $_POST["invoice"];
		$log_array		= print_r($_POST, TRUE);
		$log_query		= "SELECT * FROM `paypal_log` WHERE `txn_id` = '$trasaction_id'";
		$log_check 		= mysql_query($log_query);
		if(mysql_num_rows($log_check) <= 0){
			mysql_query("INSERT INTO `paypal_log` (`txn_id`, `log`, `posted_date`) VALUES ('$trasaction_id', '$log_array', NOW())");
		}else{
			mysql_query("UPDATE `paypal_log` SET `log` = '$log_array' WHERE `txn_id` = '$trasaction_id'");
		} // Save and update the logs array
		$paypal_log_fetch 	= mysql_fetch_array(mysql_query($log_query));
		$paypal_log_id		= $paypal_log_fetch["id"];
		if ($p->validate_ipn()){ // validate the IPN, do the others stuffs here as per your app logic
			mysql_query("UPDATE `purchases` SET `trasaction_id` = '$trasaction_id ', `log_id` = '$paypal_log_id', `payment_status` = '$payment_status' WHERE `invoice` = '$invoice'");
			$subject = 'Instant Payment Notification - Recieved Payment';
			$p->send_report($subject); // Send the notification about the transaction
		}else{
			$subject = 'Instant Payment Notification - Payment Fail';
			$p->send_report($subject); // failed notification
		}
	break;
}
?>