<?php
function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 0) return $min; // not so random...
    $log = log($range, 2);
    $bytes = (int)($log / 8) + 1; // length in bytes
    $bits = (int)$log + 1; // length in bits
    $filter = (int)(1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd >= $range);
    return $min + $rnd;
}

function getToken($length)
{

    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet .= "0123456789";
    for ($i = 0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, strlen($codeAlphabet))];
    }
    return $token;
}

function UploadImages($id, $type)
{
//echo $id."GIreesh".$type;die;

    for ($i = 1; $i <= 15; $i++) {
        $file = $_FILES['post_file' . $i];
        if ($file['name'] != '') {
            $allowedExts = array("gif", "jpeg", "jpg", "png");
            $extension = end(explode(".", $file["name"]));
            if ((($file["type"] == "image/gif") || ($file["type"] == "image/jpeg") || ($file["type"] == "image/jpg") || ($file["type"] == "image/pjpeg") || ($file["type"] == "image/x-png") || ($file["type"] == "image/png")) || ($file["size"] < 1000000) && in_array($extension, $allowedExts)) {
                if ($file["error"] > 0) {
                    echo "Return Code: " . $file["error"] . "<br>";
                } else {
                    $file_name = getToken(6) . $file["name"];
                    move_uploaded_file($file["tmp_name"], "img/" . $file_name);
                    $sql = "INSERT INTO  `trademydeal`.`post-images` (`post_id` ,`post_type` ,`image`)VALUES ('$id',  '$type',  '$file_name')";
                    mysql_query($sql);
                    $tmp = "img/" . $file["name"];
                }
            }

        }
    }
}

function getPostedAllFeature()
{
    $sql = "(SELECT id, user_id, date_time, ads_title as title,'ads' as types, promote_ads as promote, promote_ads1 as promote1, promote_ads2 as promote2, promote_ads3  as promote3, promote_ads4 as promote4, promote_high, promote_top, promote_sider, promote_slider, promote_home, views_count FROM ads)
			UNION
			(SELECT id, user_id, date_time, coupon as title,'coupons' as types, promote_coupons as promote, promote_coupons1 as promote1, promote_coupons2 as promote2, promote_coupons3  as promote3, promote_coupons4 as promote4, promote_high, promote_top, promote_sider, promote_slider, promote_home, views_count 
			FROM coupons)
			UNION  
			(SELECT id, user_id, date_time, deals_title as title,'deals' as types, promote_deals as promote, promote_deals1 as promote1, promote_deals2 as promote2, promote_deals3 as promote3, promote_deals4 as promote4, promote_high, promote_top, promote_sider, promote_slider, promote_home, views_count 
			FROM deals)
			UNION  
			(SELECT id, user_id, date_time, flyers_title as title,'flyers' as types, promote_flyers  as promote,promote_flyers1 as promote1, promote_flyers2 as promote2, promote_flyers3  as promote3, promote_flyers4 as promote4, promote_high, promote_top, promote_sider, promote_slider, promote_home, views_count 
			FROM flyers)
			UNION  
			(SELECT id, user_id, date_time, jobs_title as title,'jobs' as types, promote_jobs as promote,promote_jobs1 as promote1, promote_jobs2 as promote2, promote_jobs3  as promote3, promote_jobs4 as promote4, promote_high, promote_top, promote_sider, promote_slider, promote_home, views_count 
			FROM jobs)
			UNION  
			(SELECT id, user_id, date_time, resumes_title as title,'resumes' as types, promote_resumes as promote,promote_resumes1 as promote1, promote_resumes2 as promote2, promote_resumes3  as promote3, promote_resumes4 as promote4, promote_high, promote_top, promote_sider, promote_slider, promote_home, views_count 
			FROM resumes)
			order by date_time desc";
    $query = mysql_query($sql);
    if (mysql_num_rows($query) > 0) {
        $result = array();
        $i = 0;
        while ($resu = mysql_fetch_assoc($query)) {
            $result[$i] = $resu;
            $i++;
        }
    }
    return $result;

}

function getPostedByType($type)
{
    switch ($type) {
        case 'ads':
            $sql = "SELECT id, user_id, date_time, ads_title as title,'ads' as types, promote_ads, promote_ads1, promote_ads2, promote_ads3 , promote_ads4, promote_high, promote_top, promote_sider, promote_slider, promote_home, views_count
			FROM ads order by date_time desc";
            break;
        case 'coupons':
            $sql = "SELECT id, user_id, date_time, coupon as title,'coupon' as types, promote_coupons, promote_coupons1, promote_coupons2, promote_coupons3 , promote_coupons4, promote_high, promote_top, promote_sider, promote_slider, promote_home, views_count
			FROM coupons order by date_time desc";
            break;
        case 'deals':

            $sql = "SELECT id, user_id, date_time, deals_title as title,'deal' as types, promote_deals, promote_deals1, promote_deals2, promote_deals3 , promote_deals4, promote_high, promote_top, promote_sider, promote_slider, promote_home, views_count
			FROM deals order by date_time desc";
            break;
        case 'flyers':
            $table_name = "flyers";
            $sql = "SELECT id, user_id, date_time, flyers_title as title,'flyer' as types, promote_flyers ,promote_flyers1, promote_flyers2, promote_flyers3 , promote_flyers4, promote_high, promote_top, promote_sider, promote_slider, promote_home, views_count
			FROM flyers order by date_time desc";
            break;
        case 'resumes':
            $table_name = "resumes";
            $sql = "SELECT id, user_id, date_time, resumes_title as title,'resume' as types, promote_resumes,promote_resumes1, promote_resumes2, promote_resumes3 , promote_resumes4, promote_high, promote_top, promote_sider, promote_slider, promote_home, views_count
			FROM resumes order by date_time desc";
            break;
        case 'jobs':
            $table_name = "jobs";
            $sql = "SELECT id, user_id, date_time, jobs_title as title,'job' as types, promote_jobs,promote_jobs1, promote_jobs2, promote_jobs3 , promote_jobs4, promote_high, promote_top, promote_sider, promote_slider, promote_home, views_count
			FROM jobs";
            break;
    }
    $query = mysql_query($sql);
    if (mysql_num_rows($query) > 0) {
        $result = array();
        $i = 0;
        while ($resu = mysql_fetch_assoc($query)) {
            $result[$i] = $resu;
            $i++;
        }
    }
    return $result;

}

function delete_post($id, $type)
{
    $sql = "delete from `$type` where id = '$id' ";
    mysql_query($sql);
}

function get_User_Details($id)
{
    $sql = "select email,firstname,lastname from user where id = '$id' ";
    $query = mysql_query($sql);
    if (mysql_num_rows($query) > 0) {

        $result = mysql_fetch_row($query);
        return $result;

    }

}

function getPostDetails($id, $type)
{
    $sql = "SELECT * FROM `$type` where id = '$id'";
    $query = mysql_query($sql);
    if (mysql_num_rows($query) > 0) {
        $result = array();
        $i = 0;
        while ($resu = mysql_fetch_assoc($query)) {
            $result[$i] = $resu;
            $i++;
        }
        return $result;
    } else {
        return 'No Result Found';
    }

}

function getPostImagesByID($id, $type)
{
    $sql = "SELECT * FROM `post-images` where post_id = '$id' and post_type = '$type'";
    $query = mysql_query($sql);
    if (mysql_num_rows($query) > 0) {
        $result = array();
        $i = 0;
        while ($resu = mysql_fetch_assoc($query)) {
            $result[$i] = $resu;
            $i++;
        }
        return $result;
    } else {
        return 'No Result Found';
    }

}

function upload()
{
    $target = '../img/';
    $allowed = array('png', 'jpg', 'gif', 'jpeg');
    $name = $_FILES['file2']['name'];
    $type = $_FILES['file2']['type'];
    $size = $_FILES['file2']['size'];
    $max_size = 5000 * 1024;
    echo json_encode(array('status' => 1, 'image' => $_FILES));;
    $temp = explode('.', $name);
    $data['name'] = current($temp);
    $extension = end($temp);


    if ($_FILES['file']['error'] > 0) {
        echo json_encode(array('status' => 0, 'error' => ''));
        exit;
    }

    if ($size > $max_size) {
        echo json_encode(array('status' => 0, 'error' => 'Размер файла больше допустимого (5мб)'));
        exit;
    }

    if ((($type == 'image/gif') || ($type == 'image/jpeg')
            || ($type == 'image/jpg') || ($type == 'image/pjpeg')
            || ($type == 'image/x-png') || ($type == 'image/png'))
        && in_array(strtolower($extension), $allowed)
    ) {

        $file = $data['name'] . '.' . $extension;

        move_uploaded_file($_FILES["file2"]["tmp_name"], $target . $file);

        return $file;
    } else {
        echo json_encode(array('status' => 0, 'error' => 'Недопустимый формат файла'));
        exit;
    }
}

function UpdatePost()
{

    $title = $_POST['title'];
    $exp_date = $_POST['expire'];
    $post_type = $_POST['post_type'];
    $post_id = $_POST['post_id'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $sub_category = $_POST['sub-category'];
    $company = $_POST['company'];
    $description = $_POST['description'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city_ads = $_POST['city'];
    $postal_ads = $_POST['postalcode'];
    $city_your = $_POST['current_city'];
    $postal_your = $_POST['current_postalcode'];
    $website = addslashes($_POST['website']);
    $youtube = addslashes($_POST['youtube']);
    $text = $_POST['text'];
    $share_phone = isset($_POST['share_phone']);
    $share_email = isset($_POST['share_email']);
    $promote_ads = $_POST['highlight'];
    $promote_ads1 = $_POST['promote_ads1'];
    $promote_ads2 = $_POST['promote_ads2'];
    $promote_ads3 = $_POST['promote_ads3'];
    $promote_ads4 = $_POST['promote_ads4'];
    $promote_high = $_POST['high'];
    $promote_top = $_POST['top'];
    $promote_sider = $_POST['sidebar'];
    $promote_slider = $_POST['home'];
    $promote_home = $_POST['topfeature'];
    $user_id = $_POST['user_id'];
    $type = $_POST['type'];
    $price = $_POST['price'];


    if (isset($_FILES['file2']) and !empty($_FILES['file2']) and !empty($_FILES['file2']['name'])) {
        $image = upload();
        $sql_i = "INSERT INTO `post-images` SET post_id = '$post_id', post_type = '$post_type', image ='$image'";
        mysql_query($sql_i);
    }
    if(isset($_POST['upload_file'])){
        foreach($_POST['upload_file'] as $image){
          
            $sql_i = "INSERT INTO `post-images` SET post_id = '$post_id', post_type = '$post_type', image ='$image'";
            mysql_query($sql_i); //fpE2gkblack_file.gif
        }
    }

    switch ($post_type) {

        case 'ads':
            $sql = "update ads set user_id='$user_id', ads_title ='$title' , promote_ads ='$promote_ads', promote_ads1 ='$promote_ads1' , promote_ads2 ='$promote_ads2' , promote_ads3 ='$promote_ads3', promote_ads4 ='$promote_ads4', promote_high ='$promote_high', promote_top ='$promote_top', promote_sider ='$promote_sider', promote_slider ='$promote_slider', promote_home ='$promote_home', `category-name` ='$category', `sub-category-id` ='$sub_category', company_name ='$company', description ='$description', country ='$country', state ='$state', city_ad ='$city_ads', postalcode_ad ='$postal_ads', exp_date ='$exp_date', city_your ='$city_your', share_phone ='$share_phone', share_email='$share_email', postalcode_your ='$postal_your', type ='$type', price='$price', websitelink ='$website', youtube ='$youtube' where id = '$post_id'";
            break;
        case 'coupons':
            $sql = "update coupons set user_id='$user_id', coupon ='$title' , promote_coupons ='$promote_ads', promote_coupons1 ='$promote_ads1' , promote_coupons2 ='$promote_ads2' , promote_coupons3 ='$promote_ads3', promote_coupons4 ='$promote_ads4', promote_high ='$promote_high', promote_top ='$promote_top', promote_sider ='$promote_sider', promote_slider ='$promote_slider', promote_home ='$promote_home', `category-name` ='$category', `sub-category-id` ='$sub_category', company_name ='$company', description ='$description', country ='$country', state ='$state', city_coupon ='$city_ads', postalcode_coupon ='$postal_ads', city_your ='$city_your', share_phone ='$share_phone', share_email='$share_email', postalcode_your ='$postal_your', websitelink ='$website', youtube ='$youtube' where id = '$post_id'";
            break;
        case 'deals':
            $sql = "update deals set user_id='$user_id', deals_title ='$title' , promote_deals ='$promote_ads', promote_deals1 ='$promote_ads1' , promote_deals2 ='$promote_ads2' , promote_deals3 ='$promote_ads3', promote_deals4 ='$promote_ads4', promote_high ='$promote_high', promote_top ='$promote_top', promote_sider ='$promote_sider', promote_slider ='$promote_slider', promote_home ='$promote_home', `category-name` ='$category', `sub-category-id` ='$sub_category', company_name ='$company', description ='$description', country ='$country', state ='$state', city_deal ='$city_ads', postalcode_deal ='$postal_ads', exp_date ='$exp_date', share_phone ='$share_phone', share_email='$share_email', city_your ='$city_your', postalcode_your ='$postal_your', websitelink ='$website', youtube ='$youtube' where id = '$post_id'";
            break;
        case 'flyers':
            $sql = "update flyers set user_id='$user_id', flyers_title ='$title' , promote_flyers ='$promote_ads', promote_flyers1 ='$promote_ads1' , promote_flyers2 ='$promote_ads2' , promote_flyers3 ='$promote_ads3', promote_flyers4 ='$promote_ads4', promote_high ='$promote_high', promote_top ='$promote_top', promote_sider ='$promote_sider', promote_slider ='$promote_slider', promote_home ='$promote_home', `category-name` ='$category', `sub-category-id` ='$sub_category', company_name ='$company', description ='$description', country ='$country', state ='$state', city_flyer ='$city_ads', postalcode_flyer ='$postal_ads', share_phone ='$share_phone', share_email='$share_email', city_your ='$city_your', postalcode_your ='$postal_your', websitelink ='$website', youtube ='$youtube' where id = '$post_id'";
            break;
        case 'resumes':
            $sql = "update resumes set user_id='$user_id', resumes_title ='$title' , promote_resumes ='$promote_ads', promote_resumes1 ='$promote_ads1' , promote_resumes2 ='$promote_ads2' , promote_resumes3 ='$promote_ads3', promote_resumes4 ='$promote_ads4', promote_high ='$promote_high', promote_top ='$promote_top', promote_sider ='$promote_sider', promote_slider ='$promote_slider', promote_home ='$promote_home', `category-name` ='$category', `sub-category-id` ='$sub_category', company_name ='$company', description ='$description', country ='$country', state ='$state', city_resume ='$city_ads', postalcode_resume ='$postal_ads', share_phone ='$share_phone', share_email='$share_email', city_your ='$city_your', postalcode_your ='$postal_your', websitelink ='$website', youtube ='$youtube' where id = '$post_id'";
            break;
        case 'jobs':
            $sql = "update jobs set user_id='$user_id', jobs_title ='$title' , promote_jobs ='$promote_ads', promote_jobs1 ='$promote_ads1' , promote_jobs2 ='$promote_ads2' , promote_jobs3 ='$promote_ads3', promote_jobs4 ='$promote_ads4', promote_high ='$promote_high', promote_top ='$promote_top', promote_sider ='$promote_sider', promote_slider ='$promote_slider', promote_home ='$promote_home', `category-name` ='$category', `sub-category-id` ='$sub_category', company_name ='$company', description ='$description', country ='$country', state ='$state', city_job ='$city_ads', postalcode_job ='$postal_ads', city_your ='$city_your', share_phone ='$share_phone', share_email='$share_email', postalcode_your ='$postal_your', websitelink ='$website', youtube ='$youtube' where id = '$post_id'";
            break;

    }
    mysql_query($sql);
//		echo $sql;
//		echo mysql_query($sql);
//    die();

}
