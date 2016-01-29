<?php
$page = 'home';
include('header.php');
 ?>
    <div class="banner">
      <div class="container">
          <div class="col-lg-12">
              <div class="col-lg-12">
              <!-- Slider Starts  Here-->
    
<div class="gallery-area">
    <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
           <img src="slider/slider_image/slide_show1.png" data-thumb="slider/slider_image/slide_show1.png" alt="" title="<a href='http://www.trademydeals.com/deals.php' onClick='alert('')>Hot Deals</a>" class="img-responsive" /></a>
<img src="slider/slider_image/slide_show3_11.png" data-thumb="slider/slider_image/slide_show3_11.png" alt="" title="<a href='http://www.trademydeals.com/coupons.php' onClick='alert('')>Hot Coupons</a>" class="img-responsive" /></a>
<img src="slider/slider_image/slide_show2.png" data-thumb="slider/slider_image/slide_show2.png" alt="" title="<a href='http://www.trademydeals.com/flyers.php' onClick='alert('')>Hot Flyer </a>" class="img-responsive" /></a>
<img src="slider/slider_image/slide_show4.png" data-thumb="slider/slider_image/slide_show4.png" alt="" title="<a href='http://www.trademydeals.com/ads.php' onClick='alert('')>Hot ads </a>"  class="img-responsive"/></a>
<img src="slider/slider_image/slide_show5.png" data-thumb="slider/slider_image/slide_show5.png" alt="" title="<a href='http://www.trademydeals.com/jobs.php' onClick='alert('')>Hot Jobs </a>"  class="img-responsive"/>  </a>      </div>
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
        <?php    $sel_Query = "SELECT * FROM `deals` ORDER BY 'id' desc limit 5";
$query = mysql_query($sel_Query);

while ($row1= mysql_fetch_object($query))

                      {?>   <li style="min-width:220px; padding-right:13px; padding:10px 10px; max-width:230px;">
           
                      <div class="content1">

   <?php $imgdeal = $row1->images; ?>
<?php if ($imgdeal === '') { ?>
  <img src="img/blank.jpg" class="img-responsive">
 <?php } else { ?>
     <img src="img/<?php echo $row1->images;?>" class="img-responsive">
<?php } ?>



                        
                              <a href="getdeals.php?id=<?php echo $row1->id; ?>"><h3><?php echo $row1->deals_title; ?></h3>
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
                    <div class="col-lg-12">
              <div class="col-lg-9">
                  <div class="col-lg-12" style=" margin-top:20px;">
                  <div class="sub1">
                      <h4>Hot deals</h4>
                    </div>
                    <div class="col-lg-12">
					<?php   
                        $my_country = $_GET['pcountry'];   ?>
       <?php $sel_Query1 = "SELECT * FROM `deals` WHERE Country = '$my_country'";


						
$query1 = mysql_query($sel_Query1);

if(mysql_num_rows($query1 ) <= 0)
{
    echo "No Results Found";
}


while ($row11= mysql_fetch_object($query1))
 
                      {?>  <div class="col-lg-4">
                        
                          <div class="content2" style="margin-top:10px;">
                          <?php $imgdeal = $row11->images; ?>
<?php if ($imgdeal === '') { ?>
  <img src="img/blank.jpg" class="img-responsive">
 <?php } else { ?>
  <img src="img/<?php echo $row11->images; ?>" class="img-responsive">
<?php } ?>


                                      
                                       <a href="getdeals.php?id=<?php echo $row11->id; ?>"><h3><?php echo $row11->deals_title; ?></h3>
                                        <p><?php echo substr($row11->description,0,15).'...'; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button></a>
                                    </div>
                                
                        </div>  <?php } ?>

                        
                    </div>
                    
                </div>
                <div class="col-lg-12" style=" margin-top:20px;">
                  <div class="sub1">
                      <h4>Featured Coupons</h4>
                    </div>
                    <div class="col-lg-12" >
						<?php   
                        $my_country = $_GET['pcountry'];   ?>

<?php    $sel_Query1 = "SELECT * FROM `coupons`  WHERE Country = '$my_country'";


$query1 = mysql_query($sel_Query1);

if(mysql_num_rows($query1) <= 0)
{
    echo "No Results Found";
}

while ($coupons= mysql_fetch_object($query1))
 
                      {?> 


                      <div class="col-lg-4">
                          <div class="content2" style="margin-top:10px;">

  <?php $imgdeal = $coupons->images; ?>
<?php if ($imgdeal === '') { ?>
  <img src="img/blank.jpg" class="img-responsive">
 <?php } else { ?>
  <img src="img/<?php echo $coupons->images; ?>" class="img-responsive">
<?php } ?>


                                     
                                       <a href="getcoupons.php?id=<?php echo $coupons->id; ?>"><h3><?php echo $coupons->coupon; ?></h3>
                                        <p><?php echo substr($coupons->description,0,15).'...'; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                                   </a> </div>
                        </div>
<?php } ?>

                    </div>
                  
                </div>
                <div class="col-lg-12" style=" margin-top:20px;">
                  <div class="sub1">
                      <h4>Featured Flyers</h4>
                    </div>
                    <div class="col-lg-12">
						<?php   
                        $my_country = $_GET['pcountry'];   ?>
  <?php    $sel_Query2 = "SELECT * FROM `flyers` WHERE Country = '$my_country'";
$query2 = mysql_query($sel_Query2);
if(mysql_num_rows($query2 ) <= 0)
{
    echo "No Results Found";
}


while ($flyers= mysql_fetch_object($query2))
 
                      {?> 

                      <div class="col-lg-4">
                          <div class="content2" style="margin-top:10px;">

<?php $imgdeal = $flyers->images; ?>
<?php if ($imgdeal === '') { ?>
  <img src="img/blank.jpg" class="img-responsive">
 <?php } else { ?>
       <img src="img/<?php echo $flyers->images; ?>" class="img-responsive">
<?php } ?>
                                
                                       <a href="getflyers.php?id=<?php echo $flyers->id; ?>"><h3><?php echo $flyers->flyers_title; ?></h3>
                                        <p><?php echo substr($flyers->description,0,15).'...'; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                                   </a> </div>
                        </div>
                                              <?php }    ?>

                   </div>
                  
                </div>
                 <div class="col-lg-12" style=" margin-top:20px;">
                  <div class="sub1">
                      <h4>Featured Ads</h4>
                    </div>
                    <div class="col-lg-12" >
					<?php   
                        $my_country = $_GET['pcountry'];   ?>

<?php    $sel_Query3 = "SELECT * FROM `ads` WHERE Country = '$my_country'";
$query3 = mysql_query($sel_Query3);
if(mysql_num_rows($query3 ) <= 0)
{
    echo "No Results Found";
}

while ($ads= mysql_fetch_object($query3))
 
                      {?> 


                      <div class="col-lg-4">
                          <div class="content2" style="margin-top:10px;">

<?php $imgdeal = $ads->images; ?>
<?php if ($imgdeal === '') { ?>
  <img src="img/blank.jpg" class="img-responsive">
 <?php } else { ?>
      <img src="img/<?php echo $ads->images; ?>" class="img-responsive">
<?php } ?>
                                    
                                       <a href="getads.php?id=<?php echo $ads->id; ?>"><h3><?php echo $ads->ads_title; ?></h3>
                                        <p><?php echo substr($ads->description,0,15).'...'; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                                   </a> </div>
                        </div>
                       <?php } ?>
                    </div>
                  
                </div> <div class="col-lg-12" style=" margin-top:20px;">
                  <div class="sub1">
                      <h4>Featured Jobs</h4>
                    </div>
                    <div class="col-lg-12" >
					<?php   
                        $my_country = $_GET['pcountry'];   ?>
<?php    $sel_Query4 = "SELECT * FROM `jobs` WHERE Country = '$my_country'";
$query4 = mysql_query($sel_Query4);
if(mysql_num_rows($query4 ) <= 0)
{
    echo "No Results Found";
}


while ($jobs= mysql_fetch_object($query4))
 
                      {?> 


                      <div class="col-lg-4">
                          <div class="content2" style="margin-top:10px;">
<?php $imgdeal = $jobs->images; ?>
<?php if ($imgdeal === '') { ?>
  <img src="img/blank.jpg" class="img-responsive">
 <?php } else { ?>
    <img src="img/<?php echo $jobs->images; ?>" class="img-responsive">
<?php } ?>
                                    
                                       <a href="getjobs.php?id=<?php echo $jobs->id; ?>"><h3><?php echo $jobs->jobs_title; ?></h3>
                                        <p><?php echo substr($jobs->description,0,15).'...'; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                                   </a> </div>
                        </div>
                       <?php } ?>
                    </div>
                  
                </div>
                 <div class="col-lg-12" style=" margin-top:20px;">
                  <div class="sub1">
                      <h4>Featured Resumes</h4>
                    </div>
                    <div class="col-lg-12" >
					<?php   
                        $my_country = $_GET['pcountry'];   ?>
                      
<?php    $sel_Query5 = "SELECT * FROM `resumes` WHERE Country = '$my_country'";

$query5 = mysql_query($sel_Query5);
if(mysql_num_rows($query5 ) <= 0)
{
    echo "No Results Found";
}


while ($resumes= mysql_fetch_object($query5))
 
                      {?> 


                      <div class="col-lg-4">
                          <div class="content2" style="margin-top:10px;">
<?php $imgdeal = $resumes->images; ?>
<?php if ($imgdeal === '') { ?>
  <img src="img/blank.jpg" class="img-responsive">
 <?php } else { ?>
     <img src="img/<?php echo $resumes->images; ?>" class="img-responsive">
<?php } ?>
                                    
                                       <a href="getresumes.php?id=<?php echo $resumes->id; ?>"><h3><?php echo $resumes->resumes_title; ?></h3>
                                        <p>
										<?php echo substr($resumes->description,0,15).'...'; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                                   </a> </div>
                        </div>
                       <?php } ?>
                    </div>
                  
                </div>
                </div>
                <?php 
include('footer.php');
                ?>