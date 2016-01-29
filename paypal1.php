<?php
require_once("../db.php"); // include the library file
require_once("../custom_function.php"); 
error_reporting(0);
$title=$_POST['title'];
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

define('EMAIL_ADD', $city_your); // define any notification email
define('PAYPAL_EMAIL_ADD', 'paytotmd@trademydeals.com'); // facilitator email which will receive payments change this email to a live paypal account id when the site goes live
require_once("paypal_class.php");
$p 				= new paypal_class(); // paypal class
$p->admin_mail 	= EMAIL_ADD; // set notification email
$action 		= $_REQUEST["action"];

switch($action){
	case "process": // case process insert the form data in DB and process to the paypal
		/* $allowedExts = array("gif", "jpeg", "jpg", "png");
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
 */
 $temp1 = '';
 $temp2 = '';
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
die;
}
 else
{
   /*echo "Upload: " . $_FILES["file2"]["name"] . "<br>";
   echo "Type: " . $_FILES["file2"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file2"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file2"]["tmp_name"] . "<br>";*/

if (file_exists("../img/" . $_FILES["file2"]["name"]))
  {
  echo $_FILES["file2"]["name"] . " already exists. ";
  die;
  }
else
  {
 $file_name = getToken(6).$_FILES["file2"]['name'];
  move_uploaded_file($_FILES["file2"]["tmp_name"],  "../img/" . $file_name);
  $temp2=$file_name;
  }
  }
}



        
      
    $subject = "Hi $nickname You have successfully Posted Your Coupon $title in Trade My Deals";
    $txt = "http://trademydeals.com/coupons.php";
    $headers = "From: admin@trademydeals.com" ;
    
   // $message=mysql_query("INSERT INTO `messages` (`messages`,`user_id`,`receiver_email`,`receiver_id`,`time`,`date`) VALUES('You have login Sucessfully in Trade my deals','200','admin@gmail.com','$user_id',now(),now())");
    mail($postal_your,$subject,$txt,$headers);
        $sql="INSERT INTO `coupons`(`user_id`,`coupon`, `category-name`,`sub-category-id`,`company_name`, `description`, `country`, `state`, `city_coupon`, `postalcode_coupon`, `city_your`, `postalcode_your`, `websitelink`, `youtube`, `images`, `publish_plan`, `promote_coupons`,`promote_coupons1`,`promote_coupons2`,`promote_coupons3`,`promote_coupons4`, `promote_high`, `promote_top`, `promote_sider`, `promote_slider`, `promote_home`, `date_time`,`coupons_images`,`payment_status`, `exp_date`) VALUES  ('$user_id','$title','$category','$sub_category','$company','$description','$country','$state','$city_ads','$postal_ads','$city_your','$postal_your','$webname','$youtube','$temp1','$text','$promote_ads','$promote_ads1','$promote_ads2','$promote_ads3','$promote_ads4','$promote_high','$promote_top','$promote_sider','$promote_slider','$promote_home', now(),'$temp2',0,'$exp_date')";
    $srini=mysql_query($sql);
	$insert_id = mysql_insert_id();
	UploadImages($insert_id,'coupons');
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
		//$p->add_field('amount_1', $_POST["total"]);
		$p->add_field('amount_1', '0.02');
		$p->add_field('custom', $insert_id);
		$p->add_field('first_name', $_POST["company"]);
		//$p->add_field('last_name', $_POST["payer_lname"]);
		//$p->add_field('address1', $_POST["payer_address"]);
		$p->add_field('city', $_POST["city"]);
		$p->add_field('state', $_POST["state"]);
		$p->add_field('country', $_POST["country"]);
		$p->add_field('zip', $_POST["payer_zip"]);
		$p->add_field('email', $_POST["city"]);
		$p->add_field('rm', '2');
		$p->submit_paypal_post(); // POST it to paypal
	//	$p->dump_fields(); // Show the posted values for a reference, comment this line before app goes live
	break;
	
	case "success": // success case to show the user payment got success
		updateCouponsPaymentStatus($_REQUEST['custom']);
		header('location:../getcoupons.php?id='.$_REQUEST['custom']);
	
	case "ipn": // IPN case to receive payment information. this case will not displayed in browser. This is server to server communication. PayPal will send the transactions each and every details to this case in secured POST menthod by server to server. 
		$trasaction_id  = $_POST["txn_id"];
		$payment_status = strtolower($_POST["payment_status"]);
		$invoice		= $_POST["invoice"];
		$log_array		= print_r($_POST, TRUE);
		$log_query		= "SELECT * FROM `paypal_log` WHERE `txn_id` = '$trasaction_id'";
		$log_check 		= mysql_query($log_query);
		if(mysql_num_rows($log_check) <= 0){
			mysql_query("INSERT INTO `paypal_log` (`txn_id`, `log`, `posted_date`) VALUES ('$trasaction_id', '$log_array', NOW())");
			mysql_query("INSERT INTO `purchases` (`invoice`, `product_id`, `product_name`, `product_quantity`, `product_amount`, `payer_fname`, `payer_lname`, `payer_address`, `payer_city`, `payer_state`, `payer_zip`, `payer_country`, `payer_email`, `payment_status`, `posted_date`) VALUES ('".$_POST["invoice"]."', '".$_POST["product_id"]."', '".$_POST["product_name"]."', '".$_POST["product_quantity"]."', '".$_POST["product_amount"]."', '".$_POST["first_name"]."', '".$_POST["last_name"]."', '".$_POST["address_street"]."', '".$_POST["address_city"]."', '".$_POST["address_state"]."', '".$_POST["address_zip"]."', '".$_POST["payer_country"]."', '".$_POST["payer_email"]."', 'pending', NOW())");
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
<style>
input {
background: none repeat scroll 0 0 #395a95;
    border: 1px solid #395a95;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857;
    margin-bottom: 0;
    padding: 6px 12px;
    text-align: center;
    vertical-align: middle;
    white-space: nowrap;
   color:#fff;
}
 h3 {
    color: #000;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 16px;
    font-weight: 700;
    text-align: center;
}
center {
     color: #000;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 14px;
    font-weight: 700;
    text-align: center;
}
</style>