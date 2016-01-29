<?php
session_start();

//if(!isset($_SESSION['admin_id']) || $_SESSION['admin_id'] != 200 ) {
//    header("Location: http://trademydeals.com/coming_soon/index.php");
//    exit();
//}

$page = 'home';
include('header.php');

?>
    <div class="banner">
        <div class="container">
            <div class="col-md-12 col-lg-12">
                <div class="col-md-12 col-lg-12">
                    <!-- Slider Starts  Here-->

                    <div class="gallery-area">
                        <div class="slider-wrapper theme-default">
                            <div id="slider" class="nivoSlider">
                                <img src="slider/slider_image/slide_show1.png" data-thumb="slider/slider_image/slide_show1.png" alt="" title="<a href='http://www.trademydeals.com/deals.php' onClick='alert('')>Hot Deals</a>" class="img-responsive" /></a>
                                <img src="slider/slider_image/slide_show3_11.png" data-thumb="slider/slider_image/slide_show3_11.png" alt="" title="<a href='http://www.trademydeals.com/coupons.php' onClick='alert('')>Hot Coupons</a>" class="img-responsive" /></a>
                                <img src="slider/slider_image/slide_show2.png" data-thumb="slider/slider_image/slide_show2.png" alt="" title="<a href='http://www.trademydeals.com/flyers.php' onClick='alert('')>Hot Flyer </a>" class="img-responsive" /></a>
                                <img src="slider/slider_image/slide_show4.png" data-thumb="slider/slider_image/slide_show4.png" alt="" title="<a href='http://www.trademydeals.com/ads.php' onClick='alert('')>Hot ads </a>"  class="img-responsive"/></a>
                                <img src="slider/slider_image/slide_show5.png" data-thumb="slider/slider_image/slide_show5.png" alt="" title="<a href='http://www.trademydeals.com/jobs.php' onClick='alert('')>Hot Jobs </a>"  class="img-responsive"/>  </a>
                            </div>
                        </div>
                    </div>
                    <script src="js/jquery.bxslider.min.js"></script>
                    <!-- bxSlider CSS file -->
                    <link href="css/jquery.bxslider.css" rel="stylesheet" />
                    <script type="text/javascript">
                        $(document).ready(function(){
                            if($('.bxslider').length){
                                $('.bxslider').bxSlider({
                                    slideWidth: 235,
                                    minSlides: 3,
                                    maxSlides: 3,

                                    pager: false,
                                    responsive: false,
                                    auto: true,
                                    autoStart: true,
                                    pause: 5000,
                                    autoHover: true
                                });
                            }
                            if($('.aisdeslider').length) {
                                $('.aisdeslider').bxSlider({

                                    minSlides: 5,
                                    maxSlides: 5,
                                    mode: 'vertical',
                                    pager: false,
                                    responsive: false,
                                    auto: true,
                                    autoStart: true,
                                    pause: 5000,

                                    autoHover: true
                                });
                            }
                        });
                    </script>
<!--                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
                    <script src="slider/nivo-slider/jquery.nivo.slider.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        $(window).load(function() {
                            $('#slider').nivoSlider({
                                directionNav: false,
                                controlNav: false,
                                animSpeed: 500,
                                pauseTime: 3000
                            });
                        });
                    </script>

                    <!-- Slider End  Here-->
                </div>
            </div>
        </div>
    </div>
    <div class="content">
    <div class="container">
    <div class="col-md-12 col-lg-12">
        <div class="col-lg-12">
            <div class="subcontent">
                <h3>Top Features</h3>
            </div>
            <div class="subcontent2">
                <div class="col-lg-12" style="background:#d1a78f;">
                    <div class="container1">
                        <div class="main1">
                            <ul id="carousel" class="elastislide-list" style="min-height:250px;">
                                <?php  //$sel_Query = "SELECT * FROM `deals` ORDER BY 'id' desc";
                                $sel_Query = "(SELECT id, description, date_time, ads_title as title,'ads' as types,'getads.php' as filename
			FROM ads  where promote_ads4 = 'slider' and country =  '$country_name' and payment_status = '1'  order by date_time desc limit 0 , 6)
			UNION
			(SELECT id, description, date_time, coupon as title,'coupons' as types,'getcoupons.php' as filename
			FROM coupons  where promote_coupons4 = 'slider' and country =  '$country_name' and payment_status = '1'  order by date_time desc limit 0 , 6)
			UNION  
			(SELECT id, description, date_time, deals_title as title,'deals' as types,'getdeals.php' as filename
			FROM deals where promote_deals4 = 'slider' and country =  '$country_name' and payment_status = '1'  order by date_time desc  limit 0 , 6)
			UNION  
			(SELECT id, description, date_time, flyers_title as title,'flyers' as types,'getflyers.php' as filename
			FROM flyers  where promote_flyers4 = 'slider' and country =  '$country_name' and payment_status = '1'  order by date_time desc limit 0 , 6)
			UNION  
			(SELECT id, description, date_time, jobs_title as title,'jobs' as types, 'getjobs.php' as filename
			FROM jobs where promote_jobs4 = 'slider' and country =  '$country_name' and payment_status = '1'  order by date_time desc  limit 0 , 6)
			UNION  
			(SELECT id, description, date_time, resumes_title as title,'resumes' as types, 'getresumes.php' as filename
			FROM resumes where promote_resumes4 = 'slider' and country =  '$country_name' and payment_status = '1'  order by date_time desc limit 0 , 6)";
                                $query = mysql_query($sel_Query);

                                while ($row1= mysql_fetch_object($query))

                                {?>   <li style="min-width:220px; padding-right:13px; padding:10px 10px; max-width:230px;">



                                    <div class="content1">

                                        <img src="img/<?php echo get_post_image($row1->id,$row1->types);?>" class="img-responsive">


                                        <a href="<?php echo $row1->filename;?>?id=<?php echo $row1->id; ?>"><h3><?php echo get_post_tile_string($row1->title); ?></h3>
                                            <p><?php echo substr($row1->description,0,15).'...'; ?></p>
                                            <button type="button" class="btn btn-sm btn-danger pull-right btn4">View</button></a>
                                    </div>
                                    </li><?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-12">
    <div class="col-md-10 col-lg-9" id="feauture_content">
        <?php

        function featured($key){

            ?>
            <div class="col-md-12 col-lg-12" style=" margin-top:20px;">
            <div class="sub1">
                <h4>Featured <?=$key?> <a class="see_all" href="http://trademydeals.com/featured_<?php echo $key?>.php">See All</a></h4>
            </div>
            <div class="col-lg-12 " id="carousel_<?=$key?>">
<ul class="bxslider carousel_<?=$key?>">
                <?php
                $promote = 'promote_'.$key.'2';
                $title = $key.'_title';
                $country_name = ($_COOKIE['def_country'] == "United States") ? 'USA': $_COOKIE['def_country'];
                $countries = array('Australia','Canada','USA','United Kingdom');
                if(!in_array($country_name,$countries)) $country_name = 'Canada';

                $sel_Query1 = "SELECT * FROM $key where $promote = 'home' and country =  '$country_name' and payment_status = '1' ORDER BY RAND() limit 10";

                $query1 = mysql_query($sel_Query1);

                while ($row11 = mysql_fetch_object($query1)) {
                    ?>
                    <div class="col-lg-4">

                        <div class="content2" style="margin-top:10px;">
                        <li>
                            <img src="img/<?php echo get_post_image($row11->id, $key); ?>" class="img-responsive">


                            <a href="getdeals.php?id=<?php echo $row11->id; ?>">
                                <h3><?php echo get_post_tile_string($row11->$title); ?></h3>

                                <p><?php echo substr($row11->description, 0, 15) . '...'; ?></p>
                                <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                            </a>

                        </div>

                    </div>  <?php } ?>
</ul>
            </div>

            </div><?
        };
        $keys = array('deals','coupons','flyers','ads','jobs','resumes');
        //shuffle($keys);
        $count = count($keys);
        for($i=0; $i<$count; $i++){
            featured($keys[$i]);
        }
        ?>

    </div>
    <!-- Button trigger modal -->

<?php
include('footer.php');
?>