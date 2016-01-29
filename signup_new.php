<?php
session_start();
include_once 'classes/SafeMySQL.class.php';

$data['email'] = $_POST['email'];
$data['nickname'] = $_POST['nickname'];
$data['password'] = $_POST['password'];
$data['repassword'] = $_POST['repassword'];
$msg='';

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))  $errors['email'] = 'Please enter valid email';
if(strlen($data['password'])<6) $errors['password'] = 'The password must be at least 6 characters';
else if($data['password'] !== $data['repassword'])  $errors['repassword'] = 'The password confirmation does not match';
if(empty($data['nickname'])) $errors['nickname'] = 'The name field is required';
$recaptcha=$_POST['g-recaptcha-response'];
if(!empty($recaptcha))
{

    function getCurlData($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
        $curlData = curl_exec($curl);
        curl_close($curl);
        return $curlData;
    }

    $google_url="https://www.google.com/recaptcha/api/siteverify";
    $secret='6LdefRETAAAAALIL1o9Y5JDwxYhA1f-yKt2Xlb1N';
    $ip=$_SERVER['REMOTE_ADDR'];
    $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
    $res=getCurlData($url);
    $res= json_decode($res, true);

    if($res['success'])
    {

    }
    else
    {
   //     $errors['recaptcha'] = 'Please re-enter your reCAPTCHA';
    }

}
else
{
//    $errors['recaptcha'] = 'Please re-enter your reCAPTCHA';
}


if(!empty($errors))  {
    $err = '';
    foreach($errors as $key =>$val){
        $err .=  'error['.$key.']='.$val.'&';
    }
    $err = trim($err,'&');
    header('location:signup.php?'.$err);
}
$data['password'] = md5($data['password']);
unset($data['repassword']);
$data['is_activate'] = true;

$db = SafeMySQL::getInstance();
$email = $data['email'];
$nickname = $data['nickname'];
$arr = $db->query("SELECT * FROM user where email = '$email'");
$user =$db->fetch($arr);

if(!empty($user['email'])) { header('location:signup.php?id=2');exit();}

$sql = "INSERT INTO ?n SET ?u";
$db->query($sql,'user',$data);


$subject = 'Hi'.' '.$data['nickname'].' '.'You have successfully Register in Trade My Deals';
$headers  = 'From: admin@trademydeals.com \r\n';
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$url = 'http://trademydeals.com/verify.php?email='. urlencode($email) . '&key='.$hash;
$txt = '<p>Hello&nbsp;'.$data['nickname'].'</p>';
$txt.= '<p>Congratulations! You have successfully Register in Trade My Deals.</p>';
$txt.= '<p>Regards,</p>';
$txt.= '<p>Trade My Deals Team</p>';

mail($email,$subject,$txt,$headers);

$_SESSION['status']='true';
$_SESSION['user_name']=$data['nickname'];
$_SESSION['email']=$data['email'];

header('location:registerSuccess.php');



