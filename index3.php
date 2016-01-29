<?php
include('header.php');
$product=$_GET['product'];
 ?>
    <div class="banner">
      <div class="container">
          <div class="col-lg-12">
              <div class="col-lg-12">
              <!-- Slider Starts  Here-->
    
<div class="gallery-area">
    <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
            <img src="slider/slider_image/slide_show1.png" data-thumb="slider/slider_image/slide_show1.png" alt="" title="<a href='http://www.trademydeals.com/deals.php' onClick='alert('')>Hot Deals</a>" class="img-responsive" />
<img src="slider/slider_image/slide_show3_11.png" data-thumb="slider/slider_image/slide_show3_11.png" alt="" title="<a href='http://www.trademydeals.com/coupons.php' onClick='alert('')>Hot Coupons</a>" class="img-responsive" />
<img src="slider/slider_image/slide_show2.png" data-thumb="slider/slider_image/slide_show2.png" alt="" title="<a href='http://www.trademydeals.com/flyers.php' onClick='alert('')>Hot Flyer </a>" class="img-responsive" />
<img src="slider/slider_image/slide_show4.png" data-thumb="slider/slider_image/slide_show4.png" alt="" title="<a href='http://www.trademydeals.com/ads.php' onClick='alert('')>Hot ads </a>"  class="img-responsive"/>
<img src="slider/slider_image/slide_show5.png" data-thumb="slider/slider_image/slide_show5.png" alt="" title="<a href='http://www.trademydeals.com/jobs.php' onClick='alert('')>Hot Jobs </a>"  class="img-responsive"/>        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
          <div class="col-lg-12">
              <div class="col-lg-12">
              <div class="subcontent">
                  <h3>Top Features</h3>
                </div>
                <div class="subcontent2">
                  <div class="col-lg-12" style="background:#d1a78f;">
                    <div class="container1">
            <div class="main1">
        <ul id="carousel" class="elastislide-list" style="min-height:250px;">
		 	<?php   
                        $my_country = $_GET['product'];   ?>
        <?php    $sel_Query = "SELECT * FROM `deals` WHERE country='$my_country' ORDER BY id DESC";
$query = mysql_query($sel_Query);

while ($row1= mysql_fetch_object($query))
 
                      {?>   <li style="min-width:220px; padding-right:13px; padding:10px 10px; max-width:230px;">
           
                      <div class="content1">
                             <img src="img/<?php echo $row1->images;?>" class="img-responsive">
                              <a><h3><?php echo $row1->deals_title; ?></h3></a>
                              <p><?php echo $row1->description; ?></p>
                              <button type="button" class="btn btn-sm btn-danger pull-right btn4">View</button>
                         </div>
                     </li><?php } ?>
        
        </ul>
      </div>
    </div>
                    </div>
                </div>
              </div>
            </div>
                    <div class="col-lg-12">
              <div class="col-lg-9">
                  <div class="col-lg-12" style=" margin-top:20px;">
                  <div class="sub1">
                      <h4>Hot deal</h4>
                    </div>
                    <div class="col-lg-12"  >
                        <?php    $sel_Query1 = "SELECT * FROM `deals` WHERE deals_title LIKE '%$product%' OR company_name LIKE '%$product%' OR description LIKE '%$product%'  ORDER BY id DESC limit 3";
$query1 = mysql_query($sel_Query1);

while ($row11= mysql_fetch_object($query1))
 
                      {?>  <div class="col-lg-4">
                        
                            <div class="content2" style="margin-top:10px;">
                                        <img src="img/<?php echo $row11->images; ?>" class="img-responsive">
                                       <a><h3><?php echo $row11->deals_title; ?></h3></a>
                                        <p><?php echo $row11->description; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                                    </div>
                                
                        </div>  <?php } ?>
                        
                    </div>
                    
                </div>
                <div class="col-lg-12" style=" margin-top:20px;">
                  <div class="sub1">
                      <h4>Hot deals</h4>
                    </div>
                    <div class="col-lg-12" >
<?php    $sel_Query1 = "SELECT * FROM `coupons` WHERE coupon LIKE '%$product%' OR company_name LIKE '%$product%' OR description LIKE '%$product%'  ORDER BY id DESC limit 3";
$query1 = mysql_query($sel_Query1);

while ($coupons= mysql_fetch_object($query1))
 
                      {?> 


                      <div class="col-lg-4">
                          <div class="content2" style="margin-top:10px;">
                                      <img src="img/<?php echo $coupons->images; ?>" class="img-responsive">
                                       <a><h3><?php echo $coupons->coupon; ?></h3></a>
                                        <p><?php echo $coupons->description; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                                    </div>
                        </div>
                       <?php } ?>
                    </div>
                  
                </div>
                <div class="col-lg-12" style=" margin-top:20px;">
                  <div class="sub1">
                      <h4>Hot deals</h4>
                    </div>
                    <div class="col-lg-12"  >
<?php    $sel_Query2 = "SELECT * FROM `flyers` WHERE flyers_title LIKE '%$product%' OR company_name LIKE '%$product%' OR description LIKE '%$product%'  ORDER BY id DESC limit 3";
$query2 = mysql_query($sel_Query2);

while ($flyers= mysql_fetch_object($query2))
 
                      {?> 

                      <div class="col-lg-4">
                          <div class="content2" style="margin-top:10px;">
                                      <img src="img/<?php echo $flyers->images; ?>" class="img-responsive">
                                       <a><h3><?php echo $flyers->flyers_title; ?></h3></a>
                                        <p><?php echo $flyers->description; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                                    </div>
                        </div>
                                              <?php } ?>

                   </div>
                  
                </div>
                </div>
                <?php 
include('footer.php');
                ?>