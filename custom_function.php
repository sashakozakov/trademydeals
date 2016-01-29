<?php 
function crypto_rand_secure($min, $max) {
        $range = $max - $min;
        if ($range < 0) return $min; // not so random...
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
}

function getToken($length){

    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    for($i=0;$i<$length;$i++){
        $token .= $codeAlphabet[crypto_rand_secure(0,strlen($codeAlphabet))];
    }
    return $token;
}
/*function UploadImages($id,$type)
{
//echo $id."GIreesh".$type;die;
	
	for($i=1; $i<=15; $i++){
		$file = $_FILES['post_file'.$i];
		if($file['name'] != ''){
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$extension = end(explode(".", $file["name"]));
			if ((($file["type"] == "image/gif") || ($file["type"] == "image/jpeg") || ($file["type"] == "image/jpg") || ($file["type"] == "image/pjpeg") || ($file["type"] == "image/x-png") || ($file["type"] == "image/png")) ||($file["size"] < 1000000) && in_array($extension, $allowedExts))
			{
				if ($file["error"] > 0)
				{
					echo "Return Code: " . $file["error"] . "<br>";
				}
				else
				{
					$file_name = getToken(6).$file["name"];
					move_uploaded_file($file["tmp_name"],"img/" .$file_name );
					$sql = "INSERT INTO  `trademydeal`.`post-images` (`post_id` ,`post_type` ,`image`)VALUES ('$id',  '$type',  '$file_name')"; 	
					mysql_query($sql);
					$tmp = "img/" . $file["name"];
				}
			}
			
		}
	}
}*/
function UploadImages($id,$type)
{
	foreach($_POST['upload_file'] as $file_name){
						$sql = "INSERT INTO  `trademydeal`.`post-images` (`post_id` ,`post_type` ,`image`)VALUES ('$id',  '$type',  '$file_name')"; 	
						mysql_query($sql);
	}
}

function getPostImages($id,$type){
	$sql = "select * from `post-images` where post_type = '$type' and post_id = '$id'";
	$query = mysql_query($sql);
	$data = array();
	if(mysql_num_rows($query)){
		while($result = mysql_fetch_array($query))
		{
			$data[$result['id']] =  $result['image'];
		}
	}	
	return $data;
}
function getPostDetails($id,$type){
    $sql = "SELECT * FROM `$type` where id = '$id'";
    $query = mysql_query($sql);
    if(mysql_num_rows($query)>0) {
        $result=array();
        $i=0;
        while($resu=mysql_fetch_assoc($query))
        {
            $result[$i]=$resu;
            $i++;
        }
        return $result;
    } else{
        return 'No Result Found';
    }

}
function count_post_views($type,$id)
{
	$sql = "update `$type` set views_count = views_count + 1 where id = '$id'";
	$query = mysql_query($sql);	
}
function get_post_image($id,$type)
{
	$sql = "select image from `post-images` where post_type = '$type' and post_id = '$id' limit 0,1";
	$query = mysql_query($sql);
	if(mysql_num_rows($query))
	{

		$result = mysql_fetch_row($query);
		if(empty($result) or !file_exists('img/'.$result['0'])) return "blank.jpg";
	}else{
		$logo = get_post_logo($id,$type);
		if($logo !="")
		{
			return $logo;
		}else{
			return "blank.jpg";
		}		
	}	
	return $result['0'];
}
function getPostImagesByID($id,$type){
    $sql = "SELECT * FROM `post-images` where post_id = '$id' and post_type = '$type'";
    $query = mysql_query($sql);
    if(mysql_num_rows($query)>0)
    {
        $result=array();
        $i=0;
        while($resu=mysql_fetch_assoc($query))
        {
            $result[$i]=$resu;
            $i++;
        }
        return $result;
    }
    else{
        return 'No Result Found';
    }

}
function get_post_logo($id,$type)
{
	
	$table_name = "";

	switch($type)
	{
		case 'ads':
		$table_name = "ads";
		$sql = "select ads_images from $table_name where id = '$id' limit 0,1";
		break;
		case 'coupons':
		$table_name = "coupons";
		$sql = "select coupons_images from $table_name where id = '$id' limit 0,1";
		break;
		case 'jobs':
		$table_name = "jobs";
		$sql = "select jobs_images from $table_name where id = '$id' limit 0,1";
		break;
		case 'deals':
		$table_name = "deals";
		$sql = "select deals_images from $table_name where id = '$id' limit 0,1";
		break;
		case 'flyers':
		$table_name = "flyers";
		$sql = "select flyers_images from $table_name where id = '$id' limit 0,1";
		break;
		case 'resumes':
		$table_name = "resumes";
		$sql = "select resumes_images from $table_name where id = '$id' limit 0,1";
		break;
	}

	$query = mysql_query($sql);
	if(mysql_num_rows($query))
	{
		$result = mysql_fetch_row($query);
		return $result['0'];
	}else{
	
		return '';
	}

}
function get_post_tile_string($name){
	if(strlen($name)>20)
	{
		$name = substr($name, 0, 20);
		return $name."....";
	}
	else
	{
		return $name;
	}
}
function updateAdsPaymentStatus($id){
	$sql = "update ads set payment_status = '1' and status = '1'  where id = $id";
	mysql_query($sql);
}
function updateDealsPaymentStatus($id){
	$sql = "update deals set payment_status = '1' where id = $id";
	mysql_query($sql);
}
function updateFlyersPaymentStatus($id){
	$sql = "update flyers set payment_status = '1' where id = $id";
	mysql_query($sql);
}
function updateResumesPaymentStatus($id){
	$sql = "update resumes set payment_status = '1' where id = $id";
	mysql_query($sql);
}
function updateJobsPaymentStatus($id){
	$sql = "update jobs set payment_status = '1' where id = $id";
	mysql_query($sql);
}
function updateCouponsPaymentStatus($id){
	$sql = "update coupons set payment_status = '1' where id = $id";
	mysql_query($sql);
}
function update_user_visit(){
	$date = date('Y-m-d');
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
	$q = "select count(*) as total from visit_counter where user_ip = '$ip' and date_time = '$date'";
	$sql = mysql_query($q);	
	$result = mysql_fetch_row($sql);
	if($result[0]<1)
	{
		$i_sql = "INSERT INTO visit_counter(`user_ip`,`date_time`) VALUES('$ip','$date')";
		mysql_query($i_sql);
	}
}
function update_page_visit(){
	$date = date('Y-m-d');
	$page_name = $_SERVER['PHP_SELF'];
	$q = "select id from page_view_counter where page_name = '$page_name' and date_time = '$date' limit 0,1";
	$sql = mysql_query($q);	
	$result = mysql_fetch_row($sql);
	if($result[0]<1)
	{
		$i_sql = "INSERT INTO page_view_counter(`page_name`,`count_view`,`date_time`) VALUES('$page_name',1,'$date')";
		mysql_query($i_sql);
	}else{
		$usql = "update page_view_counter set count_view = count_view+1 where id = '".$result[0]."'";
		mysql_query($usql);
	}
}
function UpdatePost(){
//echo "<pre>";
    $title=$_POST['title'];
    $exp_date=$_POST['expire'];
    $post_type=$_POST['post_type'];
    $post_id=$_POST['post_id'];
//    $title=$_POST['title'];
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
    $youtube=$_POST['youtube'];
    $text=$_POST['text'];
    $promote_ads=$_POST['highlight'];
    $promote_ads1=$_POST['promote_ads1'];
    $promote_ads2=$_POST['promote_ads2'];
    $promote_ads3=$_POST['promote_ads3'];
    $promote_ads4=$_POST['promote_ads4'];
    $promote_high=$_POST['high'];
    $share_phone=isset($_POST['share_phone']);
    $share_email=isset($_POST['share_email']);
    $promote_top=$_POST['top'];
    $promote_sider=$_POST['sidebar'];
    $promote_slider=$_POST['home'];
    $promote_home=$_POST['topfeature'];
    $user_id=$_POST['user_id'];
    switch($post_type){

        case 'ads':
            $sql = "update ads set user_id='$user_id', ads_title ='$title' , promote_ads ='$promote_ads', promote_ads1 ='$promote_ads1' , promote_ads2 ='$promote_ads2' , promote_ads3 ='$promote_ads3', promote_ads4 ='$promote_ads4', promote_high ='$promote_high', promote_top ='$promote_top', promote_sider ='$promote_sider', promote_slider ='$promote_slider', promote_home ='$promote_home', `category-name` ='$category', `sub-category-id` ='$sub_category', company_name ='$company', description ='$description', country ='$country', state ='$state', city_ad ='$city_ads', postalcode_ad ='$postal_ads', exp_date ='$exp_date', share_phone ='$share_phone', share_email='$share_email', city_your ='$city_your', postalcode_your ='$postal_your', websitelink ='$website', youtube ='$youtube' where id = '$post_id'";
            break;
        case 'coupons':
            $sql = "update coupons set user_id='$user_id', coupon ='$title' , promote_coupons ='$promote_ads', promote_coupons1 ='$promote_ads1' , promote_coupons2 ='$promote_ads2' , promote_coupons3 ='$promote_ads3', promote_coupons4 ='$promote_ads4', promote_high ='$promote_high', promote_top ='$promote_top', promote_sider ='$promote_sider', promote_slider ='$promote_slider', promote_home ='$promote_home', `category-name` ='$category', `sub-category-id` ='$sub_category', company_name ='$company', description ='$description', country ='$country', state ='$state', city_coupon ='$city_ads', postalcode_coupon ='$postal_ads', share_phone ='$share_phone', share_email='$share_email', exp_date ='$exp_date', city_your ='$city_your', postalcode_your ='$postal_your', websitelink ='$website', youtube ='$youtube' where id = '$post_id'";
            break;
        case 'deals':
            $sql = "update deals set user_id='$user_id', deals_title ='$title' , promote_deals ='$promote_ads', promote_deals1 ='$promote_ads1' , promote_deals2 ='$promote_ads2' , promote_deals3 ='$promote_ads3', promote_deals4 ='$promote_ads4', promote_high ='$promote_high', promote_top ='$promote_top', promote_sider ='$promote_sider', promote_slider ='$promote_slider', promote_home ='$promote_home', `category-name` ='$category', `sub-category-id` ='$sub_category', company_name ='$company', description ='$description', country ='$country', state ='$state', city_deal ='$city_ads', postalcode_deal ='$postal_ads', share_phone ='$share_phone', share_email='$share_email', exp_date ='$exp_date', city_your ='$city_your', postalcode_your ='$postal_your', websitelink ='$website', youtube ='$youtube' where id = '$post_id'";
            break;
        case 'flyers':
            $sql = "update flyers set user_id='$user_id', flyers_title ='$title' , promote_flyers ='$promote_ads', promote_flyers1 ='$promote_ads1' , promote_flyers2 ='$promote_ads2' , promote_flyers3 ='$promote_ads3', promote_flyers4 ='$promote_ads4', promote_high ='$promote_high', promote_top ='$promote_top', promote_sider ='$promote_sider', promote_slider ='$promote_slider', promote_home ='$promote_home', `category-name` ='$category', `sub-category-id` ='$sub_category', company_name ='$company', description ='$description', country ='$country', state ='$state', city_flyer ='$city_ads', postalcode_flyer ='$postal_ads', share_phone ='$share_phone', share_email='$share_email', exp_date ='$exp_date', city_your ='$city_your', postalcode_your ='$postal_your', websitelink ='$website', youtube ='$youtube' where id = '$post_id'";
            break;
        case 'resumes':
            $sql = "update resumes set user_id='$user_id', resumes_title ='$title' , promote_resumes ='$promote_ads', promote_resumes1 ='$promote_ads1' , promote_resumes2 ='$promote_ads2' , promote_resumes3 ='$promote_ads3', promote_resumes4 ='$promote_ads4', promote_high ='$promote_high', promote_top ='$promote_top', promote_sider ='$promote_sider', promote_slider ='$promote_slider', promote_home ='$promote_home', `category-name` ='$category', `sub-category-id` ='$sub_category', company_name ='$company', description ='$description', country ='$country', state ='$state', city_resume ='$city_ads', share_phone ='$share_phone', share_email='$share_email', postalcode_resume ='$postal_ads', exp_date ='$exp_date', city_your ='$city_your', postalcode_your ='$postal_your', websitelink ='$website', youtube ='$youtube' where id = '$post_id'";
            break;
        case 'jobs':
            $sql = "update jobs set user_id='$user_id', jobs_title ='$title' , promote_jobs ='$promote_ads', promote_jobs1 ='$promote_ads1' , promote_jobs2 ='$promote_ads2' , promote_jobs3 ='$promote_ads3', promote_jobs4 ='$promote_ads4', promote_high ='$promote_high', promote_top ='$promote_top', promote_sider ='$promote_sider', promote_slider ='$promote_slider', promote_home ='$promote_home', `category-name` ='$category', `sub-category-id` ='$sub_category', company_name ='$company', description ='$description', country ='$country', state ='$state', city_job ='$city_ads', postalcode_job ='$postal_ads', share_phone ='$share_phone', share_email='$share_email', exp_date ='$exp_date', city_your ='$city_your', postalcode_your ='$postal_your', websitelink ='$website', youtube ='$youtube' where id = '$post_id'";
            break;
    }
    $q = mysql_query($sql);

}

function checkIsValidMd5($md5 = '') {
	$check = preg_match('/^[a-f0-9]{32}$/', $md5);
	if($check) {
		return $md5;
	} else {
		return false;
	}
}

function checkIsPostType($type) {
	$define_types = array('ads', 'coupons', 'deals', 'flyers', 'jobs', 'resumes');
	if(in_array($type, $define_types)) {
		return $type;
	} else {
		return false;
	}
}

function getPostLink($id , $type) {
	$link = "http://".$_SERVER['HTTP_HOST'] . "/get". $type . ".php?id=" . $id;
	return $link;
}

function notifications() {}