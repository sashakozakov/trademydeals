<?php
session_start();
if(strtolower($_POST['captcha_text']) !== strtolower($_SESSION['random_number'])) {
	echo 'false';
}else{
	echo 'true';
}