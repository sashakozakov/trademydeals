<div class="col-lg-3">
    <div class="col-lg-12"><ul class="aisdeslider"> <?php

            $sel_Query3 = "SELECT * FROM `deals` where promote_deals3 = 'sidebar' and country='$country_name' and payment_status = '1' ORDER BY id desc limit 1";
        $query3 = mysql_query($sel_Query3);

        while ($slider1= mysql_fetch_object($query3))

        {?>
            <li class="content2" style="margin-top:10px;">
            <img src="img/<?php echo get_post_image($slider1->id,'deals');?>" class="img-responsive">

            <a href="getdeals.php?id=<?php echo $slider1->id; ?>"><h3><?php echo get_post_tile_string($slider1->deals_title); ?></h3>
                <p><?php echo substr($slider1->description,0,15).'...'; ?></p>
                <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button></a>
            </li>
            <?php }  $sel_Query4 = "SELECT * FROM `coupons`  where promote_coupons3 = 'sidebar' and country='$country_name' and payment_status = '1'   ORDER BY id desc limit 1";
        $query4 = mysql_query($sel_Query4);

        while ($slider2= mysql_fetch_object($query4))

        { ?>
            <li class="content2" style="margin-top:10px;">
            <img src="img/<?php echo get_post_image($slider2->id,'coupons');?>" class="img-responsive">

            <a href="getcoupons.php?id=<?php echo $slider2->id; ?>"><h3><?php echo get_post_tile_string($slider2->coupon); ?></h3>
                <p><?php  echo substr($slider2->description,0,15).'...';?></p>
                <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button></a>
            </li>
            <?php }   $sel_Query5 = "SELECT * FROM `flyers`  where promote_flyers3 = 'sidebar' and country='$country_name' and payment_status = '1'   ORDER BY id desc LIMIT 1";
        $query5 = mysql_query($sel_Query5);

        while ($slider3= mysql_fetch_object($query5))

        { ?>
            <li class="content2" style="margin-top:10px;">
            <img src="img/<?php echo get_post_image($slider3->id,'flyers');?>" class="img-responsive">


            <a href="getflyers.php?id=<?php echo $slider3->id; ?>">
                <h3><?php echo get_post_tile_string($slider3->flyers_title); ?></h3>
                <p><?php  echo substr($slider3->description,0,15).'...';?></p>
                <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
            </a>
            </li>
            <?php }    $sel_Query6 = "SELECT * FROM `ads`  where promote_ads3 = 'sidebar' and country='$country_name'  and payment_status = '1'   ORDER BY id desc LIMIT 1";
        $query6 = mysql_query($sel_Query6);

        while ($slider4= mysql_fetch_object($query6))

        { ?>
            <li class="content2" style="margin-top:10px;">
            <img src="img/<?php echo get_post_image($slider4->id,'ads');?>" class="img-responsive">

            <a href="getads.php?id=<?php echo $slider4->id; ?>"><h3><?php echo get_post_tile_string($slider4->ads_title); ?></h3>
                <p><?php  echo substr($slider4->description,0,15).'...';?></p>
                <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button></a>
            </li>
            <?php }   $sel_Query7 = "SELECT * FROM `jobs`  where promote_jobs3 = 'sidebar' and country='$country_name' and payment_status = '1'   ORDER BY id desc LIMIT 1";
        $query7 = mysql_query($sel_Query7);

        while ($slider5= mysql_fetch_object($query7))

        { ?>
            <li class="content2" style="margin-top:10px;"> <img src="img/<?php echo get_post_image($slider5->id,'jobs');?>" class="img-responsive">

            <a href="getjobs.php?id=<?php echo $slider5->id; ?>"><h3><?php echo get_post_tile_string($slider5->jobs_title); ?></h3>
                <p><?php echo substr($slider5->description,0,15).'...'; ?></p>
                <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button></a>
            </li>
            <?php }   $sel_Query8 = "SELECT * FROM `resumes`  where promote_resumes3 = 'sidebar' and country='$country_name' and payment_status = '1'   ORDER BY id desc LIMIT 1";
        $query8 = mysql_query($sel_Query8);

        while ($slider6= mysql_fetch_object($query8))

        { ?>
            <li class="content2" style="margin-top:10px;"><img src="img/<?php echo get_post_image($slider6->id,'resumes');?>" class="img-responsive">

            <a href="getresumes.php?id=<?php echo $slider6->id; ?>"><h3><?php echo get_post_tile_string($slider6->resumes_title); ?></h3>
                <p><?php echo substr($slider6->description,0,15).'...';?></p>
                <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button></a>
            </li>
            <?php  } ?>
            </ul>
        </div>
</div>
</div>
</div>
</div>

<!--<div class="footer">-->
<!--    <div class="container">-->
<!--        <div class="col-lg-12">-->
<!--            <div class="col-lg-2">-->
<!--                <h3 style="margin-top:5px;">Other Countries / Regions:</h3>-->
<!--            </div>-->
<!--            <div class="col-lg-9">-->
<!--                --><?php
//                $country1=mysql_query("SELECT DISTINCT country_name FROM tbl_country_details");
//                while ($countryname1=mysql_fetch_array($country1) ) {
//                    if(!in_array($countryname1['country_name'],array('Thailand','Malaysia','Republic of Korea','Taiwan','Vietnam','Kazakhstan','Saudi Arabia','Slovenia','Iran'))){
//                        ?>
<!--                        <li><a href="indexcountry.php?pcountry=--><?php //echo $countryname1['country_name']; ?><!--">--><?php //echo $countryname1['country_name']; ?><!--</a></li>-->
<!--                    --><?php //} ?>
<!---->
<!--                --><?php //} ?>
<!---->
<!--                <li><a href="indexcountry.php?pcountry=Finland">Finland</a></li>-->
<!--                <li><a href="indexcountry.php?pcountry=Luxembourg">Luxembourg</a></li>-->
<!--                <li><a href="indexcountry.php?pcountry=Ireland">Ireland</a></li>-->
<!--                <li><a href="indexcountry.php?pcountry=Mexico">Mexico</a></li>-->
<!--                <li><a href="indexcountry.php?pcountry=Ukraine">Ukraine</a></li>-->
<!--                <li><a href="indexcountry.php?pcountry=New Zealand">New Zealand</a></li>-->
<!--                <li><a href="indexcountry.php?pcountry=Poland">Poland</a></li>-->
<!--                <li><a href="indexcountry.php?pcountry=South Africa">South Africa</a></li>-->
<!--                <li><a href="indexcountry.php?pcountry=Switzerland">Switzerland</a></li>-->
<!---->
<!---->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<div class="footernew">
    <div class="container">
        <div class="col-lg-12">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <h3>Trade MyDeals Support</h3>
                <li><a href="contactus.php">Contact Trade MyDeals</a></li>
                <li><a href="safety-tips.php">Online Safety Tips</a></li>
                <li><a href="/help.php">Trade MyDeals Help Page</a></li>
                <li><a href="/questions.php">Frequently Asked Question</a></li>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <h3>Trade MyDeals Information</h3>
                <li><a href="member-benefit.php">Trade MyDeals Member Benefits</a></li>
                <li><a href="aboutus.php">About Trade MyDeals</a></li>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <h3>Explore Trade MyDeals</h3>
                <li><a href="terms.php">Terms Of Use</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="posting-policy.php">Posting Policy</a></li>
                <li><a href="advertise.php">Advertise With Us</a></li>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <h3>Quick Link</h3>
                <li><a href="deals.php">Deals</a></li>
                <li><a href="coupons.php">Coupons</a></li>
                <li><a href="flyers.php">Flyers</a></li>
                <li><a href="ads.php">Ads</a></li>
                <li><a href="jobs.php">Jobs</a></li>
                <li><a href="resumes.php">Resumes</a></li>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="container">
        <div class="col-lg-12">
            <p>Copyright 2014 &copy; <a href="#">trademydeals.com</a> by : B&J Canada SS</p>
        </div>
    </div>
</div>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
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
<script type="text/javascript" src="elastislider/js/jquerypp.custom.js"></script>
<script type="text/javascript" src="elastislider/js/jquery.elastislide.js"></script>
<script type="text/javascript">

    $( '#carousel' ).elastislide();

</script>
<script language="javascript">
//    get_state(document.getElementById('country1').value);
</script>
<?php if($def_region != ''){ ?>
    <script type="text/javascript">
        get_cities('<?php echo $def_region; ?>');
        $(window).load(function() {
            $("#state1 [value='<?php echo $def_region; ?>']").attr('selected','selected');
            $("#city [value='<?php echo $def_city; ?>']").attr('selected','selected');
        });
    </script>
<?php } ?>

<script src="js/hover.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">My Location</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="" id="location"> <!--country_process.php-->
                    <select name="country" id="country1" onChange="get_state(this.value)" required="required" style="background:#fff; width:110px;">
                        <option value="">Select Country</option>
                        <?php $sql_country = mysql_query("SELECT DISTINCT `country_iso_code`,`country_name` FROM `tbl_country_details` WHERE country_name='Canada' OR country_name='United Kingdom' OR country_name='Australia' OR country_name='United States' ORDER BY `country_iso_code` ASC");
                        while($row_country = mysql_fetch_assoc($sql_country)) {
                            ?>
                            <option value="<?php  echo $row_country['country_iso_code']; ?>" <?php if($def_country_iso==$row_country['country_iso_code']){ echo "selected"; }?>>
                                <?php echo $row_country['country_name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <span id="stateLayer">
                    <select name="state" id="state1" onChange="get_cities(this.value)" required="required" style="background:#fff; width:110px; margin:0px 10px;">
                        <option value="">Select State</option>
                    </select>
                    </span>

                    <span id="cityLayer">
                    <select name="city" id="city" required="required" style="background:#fff; width:110px;">
                        <option value="">Select City</option>
                    </select>
                    </span>
<!--                    <input type="submit" class="btn btn-sm btn-success btn1" name="submit"  value="Save" style="margin-left:5px;" />-->
                    <!--select id="country" style="display:none;"></select-->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" name="submit" id="save_location">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>$(document).ready(function(){
        $('#div1,#div2').on('click',function(){
            $('#description').val($('.nicEdit-main').text());
        });
  var  p = 1; });
//    $(document).ready(function(){
//        if($('#feauture_content').length){
//            setTimeout(function(){
//                $.ajax({
//                    url: 'http://trademydeals.com/classes/Common.class.php',
//                    method:'POST',
//                    data: { func:'getFeatures',p:p},
//                    dataType : "json",
//                    success: function(data) {
//                        $('#feauture_content').html(data.data)
//                        console.log('sddd');
//                        p++;
//                    }
//                });
//            },3000);
//        }
//
//    });
</script>
</body>
</html>
