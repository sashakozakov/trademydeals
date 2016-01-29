<?php
include('header.php');
//echo "Gireesh";
if(isset($_POST['update_post']))
{
    UpdatePost();
    header("Location: posted-feature.php?action=coupons");
}
$ads_detail = getPostDetails($_REQUEST['id'],'coupons');
$ads_details =$ads_detail[0];
$ads_images = getPostImagesByID($_REQUEST['id'],'coupons');

?>
<style>
    .col-lg-7{
        width:60%;
    }
</style>

<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="js/core/app.js" type="text/javascript"></script>


<script src="assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>

<script src="assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script type= "text/javascript" src = "../countries.js"></script>
<script type="text/javascript">
    function checkCoupons()
    {
        var form = document.listForm;
        var re = /\S+@\S+\.\S+/;
        var email = form.current_postalcode.value;

        if(form.title.value == '')
        {
            alert('Please Enter Deal Title Name');
            form.title.select();
            form.title.focus();
            return false;
        }

        if(form.description.value == '')
        {
            alert('Please Enter Deal Description');
            form.description.select();
            form.description.focus();
            return false;
        }

        if(form.country.value == -1)
        {
            alert('Please Select Country from dropdown');
            form.description.select();
            form.description.focus();
            return false;
        }

        if(form.current_city.value == '')
        {
            alert('Please Enter Phone number');
            form.current_city.select();
            form.current_city.focus();
            return false;
        }

        if(form.current_postalcode.value == '')
        {
            alert('Please Enter Email Address');
            form.current_postalcode.select();
            form.current_postalcode.focus();
            return false;
        }

        if(!re.test(email))
        {
            alert('Please Enter Valide Email Address');
            form.current_postalcode.select();
            form.current_postalcode.focus();
            return false;
        }

        if(form.regular[0].checked == false && form.regular[1].checked == false && form.regular[2].checked == false)
        {
            alert('Please Select Deal Publishing Plan');
            return false;
        }

        return true;
    }
</script>
<script type="text/javascript">

    function get_state($country_id){
        $.ajax({
            url : 'state.php?country_id='+$country_id,
            cache : false,
            beforeSend : function (){
//Show a message
            },
            complete : function($response, $status){
                if ($status != 'error' && $status != 'timeout') {
                    $('#stateLayer').html($response.responseText);
                }
            },
            error : function ($responseObj){
                alert('Something went wrong while processing your request.\n\nError => '
                + $responseObj.responseText);
            }
        });
    }
    function get_cities($state_name){
        $.ajax({
            url : 'city.php?state_name='+$state_name,
            cache : false,
            beforeSend : function (){
//Show a message
            },
            complete : function($response, $status){
                if ($status != 'error' && $status != 'timeout') {
                    $('#cityLayer').html($response.responseText);
                }
            },
            error : function ($responseObj){
                alert('Something went wrong while processing your request.\n\nError =>'
                + $responseObj.responseText);
            }
        });
    }
</script>
<script>
    $(document).ready(function(){
        $(".deals_click").hide();
        $(".click1").click(function(){
            $(".deals_click").toggle();
        });
    });
    $(document).ready(function(){
        $("#deals_click11").hide();
        $(".click11").click(function(){
            $("#deals_click11").toggle();
        });
    });
    $(document).ready(function(){
        <?php if(is_array($ads_images)){?>
        $("#deals_click111").show();
        <?php }else{  ?>
        $("#deals_click111").hide();
        <?php }?>
        $(".click111").click(function(){
            $("#deals_click111").toggle();
        });
    });

</script>
<style>
    .deals_sub {
        background: rgb(77, 166, 223);
    }
    .deals_sub {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }
    .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }</style>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">

            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {

                    $(".hide_image").hide();

                    $("#add_more_image").click(function(){
                        price_total = parseInt($("#total").val());
                        total = parseInt($("#image_total").val())+1;

                        $("#total").val(price_total+1);
                        $("#post_file"+total).show();
                        $("#image_total").val(total);
                        $("#div1").show();
                        $("#div2").hide();
                    });
                    $("#datepicker").datepicker();
                });
                function update_subcategory(id,main_menu_id)
                {
                    $.ajax({
                        url: "../ajax-get-subcat.php",
                        type:"POST",
                        data:{id : id,main_menu_id : main_menu_id},
                        success:function(data){
                            console.log(data);
                            //return false;
                            $("#sub-category").html(data);
                        }
                    });
                }
                function check_imagesize(id)
                {
                    //alert(id);
                    var _URL = window.URL;
                    var iSize = ($("#"+id)[0].files[0].size / 1024);
                    var ext = $("#"+id).val().split('.').pop().toLowerCase();
                    //alert(ext);
                    var file, img;
                    //alert(iSize);
                    if (iSize / 1024 > 1)
                    {
                        if (((iSize / 1024) / 1024) > 1)
                        {
                            iSize = (Math.round(((iSize / 1024) / 1024) * 100) / 100);
                            //alert(iSize+"Gb");

                        }
                        else
                        {
                            iSize = (Math.round((iSize / 1024) * 100) / 100)

                            //alert(iSize + "Mb");
                            if(ext == "bmp"){
                                if(iSize>4){
                                    alert("Bitmap image size should be less then 4 MB. Please upload new image or reduce the size of image");
                                    $("#"+id).val("");
                                    return false;
                                }
                            }else{
                                if(iSize>15){
                                    alert("Image size should be less then 15 MB. Please upload new image or reduce the size of image");
                                    $("#"+id).val("");
                                    return false;
                                }
                            }
                        }
                    }
                    else
                    {
                        iSize = (Math.round(iSize * 100) / 100)
                        //$("#lblSize").html( iSize  + "kb");
                        //alert(iSize  + "kb");

                    }

                    if ((file = $("#"+id)[0].files[0])) {
                        img = new Image();
                        img.onload = function () {
                            // alert("Width:" + this.width + "   Height: " + this.width);//this will give you image width and height and you can easily validate here.....
                            //if(this.width)
                            //alert(this.width);
                            //alert(this.height);
                            if(this.width>6000){
                                alert("The image dimantion should be less then 6000W * 4000H");
                                $("#"+id).val("");
                                return false;
                            }
                            if(this.height>4000){
                                alert("The image dimantion should be less then 6000W * 4000H");
                                $("#"+id).val("");
                                return false;
                            }

                        };
                        img.src = _URL.createObjectURL(file);
                    }
                }
            </script>

            <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
            <link rel="stylesheet" href="../juploader/css/jquery.fileupload.css">
            <form action="" method="post" enctype="multipart/form-data" name="listForm" onsubmit="return checkCoupons();" >
                <input type="hidden" value="coupons" name="post_type" id="post_type" />
                <input type="hidden" value="<?php echo $_REQUEST['id'];?>" name="post_id" id="post_type" />


                <div class="content">
                    <div class="container">
                        <div class="col-lg-12">
                            <div class="col-lg-9">
                                <div class="col-lg-3">
                                    <p><a href="membershipuser.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px" id="myads">My Ads</button></a></p>
                                    <p><a href="mydeals.php"><button type="button" class="btn btn-lg btn-success btn1" id="mydeals" style="margin-top:3px">My Deals</button></a></p>
                                    <p><a href="mycoupons.php"><button type="button" class="btn btn-lg btn-success btn2" style="margin-left:0px; margin-top:15px;">My Coupons</button></a></p>
                                    <p><a href="myflyers.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">My Flyers</button></a></p>
                                    <p><a href="myjobs.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">My Jobs</button></a></p>
                                    <p><a href="myresumes.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">My Resumes</button></a></p>
                                    <p><a href="mymessages.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">My Message</button></a></p>
                                    <p><a href="Editmyinfo.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">Edit my info</button></a></p>
                                    <p><a href="myresumes.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">Billing History</button></a></p>
                                </div>
                                <div class="col-lg-9">
                                    <div class="deals_content">

                                        <div class="deals_sub">
                                            <h4>Coupon Details</h4>
                                        </div>
                                        <div class="deals_form">

                                            <div class="col-lg-12" style="margin-top:20px;">
                                                <div class="col-lg-3">
                                                    <p>Category<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <input type="hidden" name="user_id" value="<?php echo $user_id;?>"/>
                                                    <select class="form-control" id="category" name="category" onchange="update_subcategory(this.value,2)">
                                                        <option value="0">-Select Category-</option>
                                                        <?php $q = "SELECT DISTINCT sub_menu_category,main_menu_id
													FROM  `tbl_sub_menu` where main_menu_id ='2' ";
                                                        $sql=  mysql_query($q);
                                                        while ($row = mysql_fetch_array($sql)) {
                                                            if($row['sub_menu_category'] == $ads_details['category-name']){
                                                                ?>
                                                                <option selected value="<?php echo $row['sub_menu_category']; ?>"><?php echo $row['sub_menu_category']; ?></option>
                                                            <?php
                                                            }else {
                                                                ?>
                                                                <option value="<?php echo $row['sub_menu_category']; ?>"><?php echo $row['sub_menu_category']; ?></option>
                                                            <?php }} ?>		  </select>
                                                </div>

                                            </div>
                                            <div class="col-lg-12" style="margin-top:20px;margin-bottom:20px;">
                                                <div class="col-lg-3">
                                                    <p>Sub-Category<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <select class="form-control" id="sub-category" name="sub-category"></select>
                                                </div>

                                            </div>
                                            <div class="col-lg-12">
                                                <div class="col-lg-3">
                                                    <p>Coupon Title<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <input name="title" value="<?php echo $ads_details['coupon'];?>" id="title" type="text" class="form-control">


                                                    <input type="hidden" name="currency_code" value="USD" />
                                                </div>
                                                <div class="col-lg-2">
                                                </div>
                                            </div>
                                            <div class="col-lg-12" style="margin-top:20px;">
                                                <div class="col-lg-3">
                                                    <p>Company Name</p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <input name="company" value="<?php echo $ads_details['company_name'];?>" type="text" class="form-control">
                                                </div>
                                                <div class="col-lg-2">
                                                </div>
                                            </div>
                                            <div class="col-lg-12" style="margin-top:20px;">
                                                <div class="col-lg-3">
                                                    <p> Coupon Description<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <textarea name="description" id="description" class="form-control"  ><?php echo $ads_details['description'];?></textarea>
                                                </div>
                                                <div class="col-lg-1">
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-12">
                                    <div class="deals_content">
                                        <br>
                                        <div class="deals_sub">
                                            <h4>Coupon Location</h4>
                                        </div>
                                        <div class="deals_form">
                                            <div class="col-lg-12">
                                                <div class="col-lg-3">
                                                    <p>Country</p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <select  class="form-control" id="country" name ="country"></select>
                                                </div>
                                                <div class="col-lg-4">
                                                </div>
                                            </div>
                                            <div class="col-lg-12" style="margin-top:20px;">
                                                <div class="col-lg-3">
                                                    <p>State</p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <select class="form-control" name ="state" id ="state"></select>
                                                </div>
                                                <div class="col-lg-4">
                                                </div>
                                            </div>
                                            <div class="col-lg-12" style="margin-top:20px;">
                                                <div class="col-lg-3">
                                                    <p>City</p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <input value="<?php echo $ads_details['city_coupon'];?>" name="city" type="text" class="form-control">
                                                </div>
                                                <div class="col-lg-2">
                                                </div>
                                            </div>
                                            <div class="col-lg-12" style="margin-top:20px;">
                                                <div class="col-lg-3">
                                                    <p>Postal code or Street</p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <input name="postalcode" value="<?php echo $ads_details['postalcode_coupon'];?>" type="text" class="form-control">
                                                </div>
                                                <div class="col-lg-2">
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-12">
                                    <div class="deals_content">
                                        <br>
                                        <div class="deals_sub">
                                            <h4>Your Contact Information</h4>
                                        </div>
                                        <div class="deals_form">


                                            <div class="col-lg-12" style="margin-top:20px;">
                                                <div class="col-lg-3">
                                                    <p>Phone</p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <input name="current_city" value="<?php echo $ads_details['city_your'];?>" type="text" class="form-control">
                                                </div>
                                                <div class="col-lg-2">
                                                </div>
                                            </div>
                                            <div class="col-lg-12" style="margin-top:20px;">
                                                <div class="col-lg-3">
                                                    <p>Email</p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <input name="current_postalcode" value="<?php echo $ads_details['postalcode_your'];?>" type="text" class="form-control">
                                                </div>
                                                <div class="col-lg-2">
                                                </div>
                                            </div>

                                            <div class="col-lg-12" style="margin-top:20px;">
                                                <div class="col-lg-3">
                                                    <p>Expire Date</p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <input name="expire" type="text" value="<?php echo $ads_details['exp_date'];?>"  id="datepicker">
                                                </div>
                                                <div class="col-lg-2">
                                                </div>
                                            </div>









                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-12">
                                    <div class="deals_content">
                                        <br>
                                        <div class="deals_sub">
                                            <h4>Links and Pictures</h4>
                                        </div>
                                        <div class="deals_form">

                                            <div class="col-lg-12">
                                                <div class="col-lg-1">
                                                    <input type="checkbox" class=" click1" name="website" <?php if($ads_details['websitelink']!=""){echo "checked='checked';";}?>  id="website">
                                                </div>
                                                <div class="col-lg-4">
                                                    <a href="#"><button type="button" class="btn btn-warning btn-sm" style="border:none; margin-left:-30px; margin-top:5px;">Website Link</button></a>
                                                </div>

                                                <div class="col-lg-1">
                                                    <input type="checkbox" class="click11" <?php if($ads_details['youtube']!=""){echo "checked='checked';";}?>>
                                                </div>
                                                <div class="col-lg-2">
                                                    <button type="button" class="btn btn-warning btn-sm" style="border:none; margin-left:-30px; margin-top:5px;">You Tube</button>
                                                </div>
                                                <div class="col-lg-1">
                                                    <input type="checkbox" class="click111" <?php if(!empty($ads_details['coupons_images']) || is_array($ads_images)){echo "checked='checked';";}?>>
                                                </div>
                                                <div class="col-lg-2">
                                                    <button type="button" class="btn btn-warning btn-sm" style="border:none; margin-left:-30px; margin-top:5px;">Images</button>
                                                </div>
                                                <div class="col-lg-1">
                                                </div>
                                            </div>
                                            <div class="deals_click">  <br>





                                                <div class="col-lg-12">
                                                    <div class="col-lg-3">
                                                        <p>Website URL<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input name="website" type="text" class="form-control" value="<?php echo $ads_details['websitelink'];?>">
                                                    </div>
                                                    <div class="col-lg-2">
                                                    </div>
                                                </div> </div>
                                            <div class="col-lg-12" style="margin-top:10px;" id="deals_click11">
                                                <div class="col-lg-3">
                                                    <p>Youtube Link<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <input name="youtube" <?php echo $ads_details['youtube'];?> type="text" class="form-control">
                                                </div>
                                                <div class="col-lg-2">
                                                </div>
                                            </div>
                                            <div class="col-lg-12" style="margin-top:10px;" id="deals_click111">
                                                <div class="col-lg-3">
                                                    <p>Logo image<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                                    <p>Ad image<i style="margin-left:10px; color:#CC0000;">*</i></p>

                                                    <br><br><strong>Images should be of size 6000*4000 or Max file size 4MB. Limit 5 images. Extra images will be charged $1 each</strong>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="col-lg-7">
                                                        <input type="file" name="file2" class="btn btn btn-primary btn6" value="Post Your Deal" accept="image/x-png, image/gif, image/jpeg"/>
                                                        <img class= "post_images" src='../img/<?php echo $ads_details['ads_images'];?>' style=" margin-right: 10px;height: 80px;width: 100px;margin-top: 20px;margin-bottom: 20px;"/><br />
                                                    </div>
                                                    <div class="col-lg-7">
									   <span class="upload-btn btn-successs fileinput-button">
											<i class="glyphicon glyphicon-plus"></i>
											<span>Select image</span>
											<!-- The file input field used as target for the file upload widget -->
											<!--<input id="fileupload" type="file" name="files[]" multiple>-->
											<input  type="file" id="fileupload" class="btn btn btn-primary btn6"  accept="image/x-png, image/gif, image/jpeg"/>
											<input  type="hidden" id="total_images" name="total_images"/><br />
											</span>

                                                        <div id="progress" class="progress">
                                                            <div class="progress-bar progress-bar-success"></div>
                                                        </div>

                                                        <div id="files" onchange="" class="files">
                                                            <?php $ijk = 0 ;if(is_array($ads_images)) { foreach($ads_images as $ads_image){ $ijk++; ?>
                                                                <div class="post_image_box"><a id="img_box_link_<?php echo $ijk;?>" class="close_link"  onclick="unlink_file('<?php echo $ads_image['image'];?>',<?php echo $ijk;?>)">Remove</a><img class= "post_images" id="img_box_<?php echo $ijk;?>" src='../img/<?php echo $ads_image['image'];?>' style=" margin-right: 10px;height: 80px;width: 100px;"/></div>


                                                            <?php } } ?>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                </div>

                                            </div>
                                            <div class="col-lg-12" style="margin-top:10px;">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <script type="text/javascript "src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
                                <script type='text/javascript'>
                                    $(document).ready(function(){
                                        $("#show1").show();
                                        $(".click2").change(function(){
                                            var user_id=$("#user_id").val();
                                            var user_value1=$(".click2").val();
                                            if($(this).is(":checked")) {
                                                $.ajax({
                                                    url: "../display_process.php",
                                                    type:"POST",
                                                    data:{user_id : user_id,user_value1 : user_value1},
                                                    success:function(data){
                                                        console.log(data);
                                                        //return false;
                                                        $("#show1").html(data);
                                                    }
                                                })
                                            }
                                        });
                                        $(".click3").change(function(){
                                            var user_id=$("#user_id").val();
                                            var user_value1=$(".click3").val();
                                            if($(this).is(":checked")) {
                                                $.ajax({
                                                    url: "../display_process.php",
                                                    type:"POST",
                                                    data:{user_id : user_id,user_value1 : user_value1},
                                                    success:function(data){
                                                        console.log(data);
                                                        //return false;
                                                        $("#show2").html(data);
                                                    }
                                                })
                                            }
                                        });
                                        $(".click4").change(function(){
                                            var user_id=$("#user_id").val();
                                            var user_value1=$(".click4").val();
                                            if($(this).is(":checked")) {
                                                $.ajax({
                                                    url: "../display_process.php",
                                                    type:"POST",
                                                    data:{user_id : user_id,user_value1 : user_value1},
                                                    success:function(data){
                                                        console.log(data);
                                                        //return false;
                                                        $("#show3").html(data);
                                                    }
                                                })
                                            }
                                        });
                                        $(".click5").change(function(){
                                            var user_id=$("#user_id").val();
                                            var user_value1=$(".click5").val();
                                            if($(this).is(":checked")) {
                                                $.ajax({
                                                    url: "../display_process.php",
                                                    type:"POST",
                                                    data:{user_id : user_id,user_value1 : user_value1},
                                                    success:function(data){
                                                        console.log(data);
                                                        //return false;
                                                        $("#show4").html(data);
                                                    }
                                                })
                                            }
                                        });
                                        $(".click6").change(function(){
                                            var user_id=$("#user_id").val();
                                            var user_value1=$(".click6").val();
                                            if($(this).is(":checked")) {
                                                $.ajax({
                                                    url: "../display_process.php",
                                                    type:"POST",
                                                    data:{user_id : user_id,user_value1 : user_value1},
                                                    success:function(data){
                                                        console.log(data);
                                                        //return false;
                                                        $("#show5").html(data);
                                                    }
                                                })
                                            }
                                        });
                                    });
                                </script>
                                <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
                                <script src="../juploader/js/vendor/jquery.ui.widget.js"></script>

                                <!-- The basic File Upload plugin -->
                                <script src="../juploader/js/jquery.fileupload.js"></script>
                                <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->

                                <script>
                                    /*jslint unparam: true */
                                    /*global window, $ */
                                    var j = jQuery.noConflict();
                                    function unlink_file(file_name,counter_value){



                                        $.ajax({
                                            url: "../ajax-unlink-image.php",
                                            type:"POST",
                                            data:{file_name : file_name},
                                            success:function(data){
                                                $("#img_box_link_"+counter_value).remove();
                                                $("#img_box_"+counter_value).remove();
                                                $("#image_hidden_id_"+counter_value).remove();

                                                var total_images = $("#total_images").val();
                                                if(total_images>5)
                                                {
                                                    var price_total = parseInt($("#total").val());
                                                    $("#total").val(price_total-1);
                                                    $("#total_images").val(total_images-1);
                                                }

                                            }
                                        });
                                    }
                                    var counter = <?php echo $ijk;?>;
                                    j(function () {
                                        'use strict';
                                        // Change this to the location of your server-side upload handler:
                                        var url = window.location.hostname === 'http://trademydeals.com/' ?
                                            '//jquery-file-upload.appspot.com/' : '/upload_test.php';
                                        j('#fileupload').fileupload({
                                            url: url,
                                            dataType: 'json',
                                            done: function (e, data) {
                                                j.each(data.result.files, function (index, file) {
                                                    counter ++;
                                                    var data_html;
                                                    if(counter>5)
                                                    {
                                                        var price_total = parseInt(j("#total").val());
                                                        j("#total").val(price_total+1);
                                                    }
                                                    j("#total_images").val(counter);
                                                    j("<input id='image_hidden_id_"+counter+"' type= 'hidden' name='upload_file[]' value='file.name'>").val(file.name).appendTo('#files');
                                                    data_html = '<a id="img_box_link_'+counter+'" class="close_link"  onclick="unlink_file('+"'"+file.name+"'"+','+counter+')">Remove</a><img class= "post_images" id="img_box_'+counter+'" src='+file.url+' style=" margin-right: 10px;height: 80px;width: 100px;"/>';
                                                    //j('<img src="" class="close_btn">').appendTo('#files');
                                                    j('<div class="post_image_box"/>').html(data_html).appendTo('#files');
                                                });
                                            },
                                            fail: function (data) { alert('incorrect image')},
                                            progressall: function (e, data) {
                                                var progress = parseInt(data.loaded / data.total * 100, 10);
                                                j('#progress .progress-bar').css(
                                                    'width',
                                                    progress + '%'
                                                );
                                            }
                                        }).prop('disabled', !j.support.fileInput)
                                            .parent().addClass(j.support.fileInput ? undefined : 'disabled');
                                    });
                                </script>


                                <div class="col-lg-12">
                                    <div class="deals_content">
                                        <br>
                                        <div class="deals_sub">
                                            <h4>Promote Your Coupon</h4>
                                        </div>
                                        <div class="deals_form">

                                            <script>
                                                function showIPAddress(chk) {
                                                    document.getElementById("div1").style.display = chk.checked ? "block" : "none";
                                                    document.getElementById("div2").style.display = chk.checked ? "none" : "block";
                                                }
                                            </script>
                                            <script>

                                                $(document).ready(function(){
                                                    $('#chk1').click(function(){
                                                        $('.deals_work2').toggle();
                                                    });
                                                });

                                                $(document).ready(function(){
                                                    $('#chk2').click(function(){
                                                        $('.deals_work3').toggle();
                                                    });
                                                });

                                                $(document).ready(function(){
                                                    $('#chk3').click(function(){
                                                        $('.deals_work4').toggle();
                                                    });
                                                });

                                                $(document).ready(function(){
                                                    $('#chk4').click(function(){
                                                        $('.deals_work5').toggle();
                                                    });
                                                });
                                                $(document).ready(function(){
                                                    $('#chk5').click(function(){
                                                        $('.deals_work6').toggle();
                                                    });
                                                });

                                            </script>
                                            <div class="col-lg-12">
                                                <div class="col-lg-1">
                                                    <input type="checkbox" id="chk1" <?php if($ads_details['promote_coupons']!=""){echo "checked='checked';";}?> class="click2" name="highlight" value="high" onClick="subtotal();">
                                                </div>
                                                <div class="col-lg-5">
                                                    <p onclick="$('.click2').click()" style="background:#f79e12; padding:5px; margin-left:-20px; margin-top:5px;">Hightlighted Coupon</p>
                                                </div>
                                                <div id="show1" class="col-lg-6"></div>
                                            </div>
                                            <div class="deals_work2">
                                                <div class="col-lg-12">
                                                    <div class="col-lg-1"></div>
                                                    <?php if ($static['status']=='Pro Membership' OR $static['status']=='Gold Membership') {

                                                    } else  {?>
                                                        <div class="col-lg-1">
                                                            <input class="abc" type="radio" name="high" value="1" onClick="showIPAddress(this);subtotal()" checked>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <p style=" margin-left:-20px; margin-top:5px;">$1per</p>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <select name="select1" style="width:100px;" onClick="subtotal()">
                                                                <option value="3">3 Days</option>
                                                                <option value="7">7 Days</option>
                                                                <option value="14">14 Days</option>
                                                                <option value="30">30 Days</option>
                                                                <option value="60">60 Days</option>
                                                                <option value="90">90 Days</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-1">


                                                            <p><input type="text" name="output" value="3" style="border:none; background:#e2e2e2;"></p>
                                                        </div>
                                                        <div class="col-lg-4"><a href="images/highlighted.jpg" class="image-link" title=""><img src="images/highlighted.jpg" style="height: 100px; width: 100px;" /></a></div>
                                                    <?php } ?>
                                                </div>  <?php
                                                if ($static['status']=='Gold Membership' )

                                                { }
                                                else {  ?>
                                                    <div class="col-lg-12">
                                                    <div class="col-lg-1"></div>
                                                    <!--<div class="col-lg-1">
                                    <input type="radio" name="high" class="click7" value="high_premium">
                                </div>
                                <div class="col-lg-4">
                                <p style=" margin-left:-20px; margin-top:5px;">Become a member:</p>
                                </div>
                                <div class="col-lg-6">

                                </div>

                            </div><div class="deals_work7">
                             <div class="col-lg-12"> <?php
                                                    if ($static['status']=='Pro Membership' )

                                                    { }
                                                    else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-1">
                                    <input type="radio" name="membership" value="50"  onClick="checksubtotal(this.value)" >
                                </div>

                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">pro member -$50per month</p>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-1">
                                    <input type="radio"  name="membership" value="80"  onClick="checksubtotal(this.value)">
                                </div>
                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">Gold member -$80per month</p>
                                </div>
                                <div class="col-lg-3">

                                </div>

                            </div>

                            <div class="col-lg-12"> <?php
                                                    if ($static['status']=='Pro Membership' )

                                                    { }
                                                    else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-4" style="border:#fff solid 1px;">

                                <p style=" margin-top:10px;">you'll have 5 highlighted Coupons included + more</p>
                                  <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-4" style="border:#fff solid 1px;">
                                 <p style=" margin-left:-10px; margin-top:10px;">you'll have 10 highlighted Coupons included + a lot more</p>
                                 <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div>
                                <div class="col-lg-1">

                                </div>

                            </div>-->
                                                    </div><?php } ?>

                                            </div>
                                            <div class="col-lg-12">
                                                <div class="col-lg-1">
                                                    <input type="checkbox" id='chk2' <?php if($ads_details['promote_coupons1']!=""){echo "checked='checked';";}?>  class=" click3" name="promote_ads1" value="top" onClick="subtotalnew()">
                                                </div>
                                                <div class="col-lg-5">
                                                    <p onclick="$('.click3').click()" style="background:#f79e12; padding:5px; margin-left:-20px; margin-top:5px;">Top Coupons</p>
                                                </div>
                                                <div id="show2" class="col-lg-6"></div>
                                            </div>
                                            <div class="deals_work3">
                                                <div class="col-lg-12">
                                                    <div class="col-lg-1"></div>
                                                    <?php
                                                    if ($static['status']=='Pro Membership' OR $static['status']=='Gold Membership') {
                                                    }
                                                    else  {?>
                                                    <div class="col-lg-1">
                                                        <input class="abc" type="radio" name="top" value="6" onClick="subtotalnew()" checked>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <p style=" margin-left:-20px; margin-top:5px;" >$2per</p>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <select name="select2" style="width:100px;" onClick="subtotalnew()">
                                                            <option value="3">3 Days</option>
                                                            <option value="7">7 Days</option>
                                                            <option value="14">14 Days</option>
                                                            <option value="30">30 Days</option>
                                                            <option value="60">60 Days</option>
                                                            <option value="90">90 Days</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <p><input type="text" name="output1" value="2" style="border:none; background:#e2e2e2;"></p>
                                                    </div>
                                                    <div class="col-lg-4"><a href="images/top.jpg" class="image-link" title=""><img src="images/top.jpg" style="height: 100px; width: 100px;" /></a></div>
                                                </div>  <?php
                                                if ($static['status']=='Gold Membership' )

                                                { }
                                                else {  ?>
                                                <div class="col-lg-12">
                                                    <div class="col-lg-1"></div>
                                                    <!-- <div class="col-lg-1">
                                    <input type="radio" class="click8" name="top" value="top_premium">
                                </div>
                                <div class="col-lg-4">
                                <p style=" margin-left:-20px; margin-top:5px;">Become a member:</p>
                                </div>
                                <div class="col-lg-6">

                                </div>

                            </div><?php } ?><div class="deals_work8">
                             <div class="col-lg-12"> <?php
                                                    if ($static['status']=='Pro Membership' )

                                                    { }
                                                    else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-1">
                                    <input type="radio" name="member1" value="50" onClick="checksubtotal(this.value)">
                                </div>

                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">pro member -$50 per month</p>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-1">
                                    <input type="radio"  name="member1" value="80" onClick="checksubtotal(this.value)">
                                </div>
                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">Gold member -$80 per month</p>
                                </div>
                                <div class="col-lg-3">

                                </div>

                            </div>
                            <div class="col-lg-12"> <?php
                                                    if ($static['status']=='Pro Membership' )

                                                    { }
                                                    else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-4" style="border:#fff solid 1px;">

                                <p style=" margin-top:10px;">you'll have 3 top Coupons included + more </p>
                                  <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-4" style="border:#fff solid 1px;">
                                 <p style=" margin-left:-10px; margin-top:10px;">you'll have 6 top Coupons included + a lot more</p>
                                 <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div>
                                <div class="col-lg-1">

                                </div>
                              </div>--><?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="col-lg-1">
                                                    <input type="checkbox" id="chk3" <?php if($ads_details['promote_coupons2']!=""){echo "checked='checked';";}?> class=" click4" name="promote_ads2" value="home" onClick="subtotalnew1()">
                                                </div>
                                                <div class="col-lg-5">
                                                    <p onclick="$('.click4').click()" style="background:#f79e12; padding:5px; margin-left:-20px; margin-top:5px;">Home page Gallery Coupons</p>
                                                </div>
                                                <div id="show3" class="col-lg-6"></div>
                                            </div>
                                            <div class="deals_work4">
                                                <div class="col-lg-12">
                                                    <div class="col-lg-1"></div>
                                                    <?php
                                                    if ($static['status']=='Pro Membership' OR $static['status']=='Gold Membership') {
                                                    }
                                                    else  {?>
                                                    <div class="col-lg-1">
                                                        <input class="abc" type="radio" name="home1" value="9" onClick="subtotalnew1()" checked>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <p style=" margin-left:-20px; margin-top:5px;">$3per</p>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <select name="select3" style="width:100px;" onClick="subtotalnew1()">
                                                            <option value="3">3 Days</option>
                                                            <option value="7">7 Days</option>
                                                            <option value="14">14 Days</option>
                                                            <option value="30">30 Days</option>
                                                            <option value="60">60 Days</option>
                                                            <option value="90">90 Days</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <p><input type="text" name="output2" value="3" style="border:none; background:#e2e2e2;"></p>
                                                    </div>
                                                    <div class="col-lg-4"><a href="images/home-page-gallery.jpg" class="image-link" title=""><img src="images/home-page-gallery.jpg" style="height: 100px; width: 100px;" /></a></div>
                                                </div> <?php
                                                if ($static['status']=='Gold Membership' )

                                                { }
                                                else {  ?>
                                                <div class="col-lg-12">
                                                    <div class="col-lg-1"></div>
                                                    <!--  <div class="col-lg-1">
                                    <input type="radio" class="click9" name="home" value="home_premium">
                                </div>
                                <div class="col-lg-4">
                                <p style=" margin-left:-20px; margin-top:5px;">Become a member:</p>
                                </div>
                                <div class="col-lg-6">

                                </div>

                            </div><?php } ?>
              <div class="deals_work9">
                             <div class="col-lg-12"> <?php
                                                    if ($static['status']=='Pro Membership' )

                                                    { }
                                                    else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-1">
                                    <input type="radio" name="membership_home" value="50" onClick="checksubtotal(this.value)">
                                </div>

                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">pro member -$50 per month</p>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-1">
                                    <input type="radio"  name="membership_home" value="80" onClick="checksubtotal(this.value)">
                                </div>
                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">Gold member -$80 per month</p>
                                </div>
                                <div class="col-lg-3">

                                </div>

                            </div>
                            <div class="col-lg-12"> <?php
                                                    if ($static['status']=='Pro Membership' )

                                                    { }
                                                    else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-4" style="border:#fff solid 1px;">

                                <p style=" margin-top:10px;">you'll have 5 home page Coupons included + more </p>
                                  <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-4" style="border:#fff solid 1px;">
                                 <p style=" margin-left:-10px; margin-top:10px;">you'll have 10 home page Coupons included + a lot more</p>
                                 <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div>
                                <div class="col-lg-1">

                                </div>
                              </div>--><?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="col-lg-1">
                                                    <input type="checkbox" id='chk4' <?php if($ads_details['promote_coupons3']!=""){echo "checked='checked';";}?> class=" click5" name="promote_ads3" value="sidebar" onClick="subtotalnew2()">
                                                </div>
                                                <div class="col-lg-5">
                                                    <p onclick="$('.click5').click()" style="background:#f79e12; padding:5px; margin-left:-20px;margin-top:5px;">Sidebar Coupon</p>
                                                </div>
                                                <div id="show4" class="col-lg-6"></div>
                                            </div>
                                            <div class="deals_work5">
                                                <div class="col-lg-12">
                                                    <div class="col-lg-1"></div>
                                                    <?php
                                                    if ($static['status']=='Pro Membership' OR $static['status']=='Gold Membership') {
                                                    }
                                                    else  {?>
                                                    <div class="col-lg-1">
                                                        <input class="abc" type="radio" name="sidebar" value="7.5" onClick="subtotalnew2()" checked>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <p style=" margin-left:-20px; margin-top:5px;">$2.5per</p>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <select name="select4" style="width:100px;" onClick="subtotalnew2()">
                                                            <option value="3">3 Days</option>
                                                            <option value="7">7 Days</option>
                                                            <option value="14">14 Days</option>
                                                            <option value="30">30 Days</option>
                                                            <option value="60">60 Days</option>
                                                            <option value="90">90 Days</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <p><input type="text" name="output3" value="2.5" style="border:none; background:#e2e2e2;"></p>
                                                    </div>
                                                    <div class="col-lg-4"><a href="images/sidebar.jpg" class="image-link" title=""><img src="images/sidebar.jpg" style="height: 100px; width: 100px;" /></a></div>
                                                </div>  <?php
                                                if ($static['status']=='Gold Membership' )

                                                { }
                                                else {  ?>
                                                <div class="col-lg-12">
                                                    <div class="col-lg-1"></div>
                                                    <!--<div class="col-lg-1">
                                    <input type="radio" class="click10" name="sidebar" value="sidebar_premium">
                                </div>
                                <div class="col-lg-4">
                                <p style=" margin-left:-20px; margin-top:5px;">Become a member:</p>
                                </div>
                                <div class="col-lg-6">

                                </div>

                            </div><?php } ?><div class="deals_work10">
                             <div class="col-lg-12"> <?php
                                                    if ($static['status']=='Pro Membership' )

                                                    { }
                                                    else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-1">
                                    <input type="radio" name="membership_sidebar" value="50" onClick="checksubtotal(this.value)">
                                </div>

                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">pro member -$50 per month</p>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-1">
                                    <input type="radio"  name="membership_sidebar" value="80" onClick="checksubtotal(this.value)">
                                </div>
                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">Gold member -$80 per month</p>
                                </div>
                                <div class="col-lg-3">

                                </div>

                            </div>
                            <div class="col-lg-12"> <?php
                                                    if ($static['status']=='Pro Membership' )

                                                    { }
                                                    else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-4" style="border:#fff solid 1px;">

                                <p style=" margin-top:10px;">you'll have 2 sidebar Coupons included + more</p>
                                  <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-4" style="border:#fff solid 1px;">
                                 <p style=" margin-left:-10px; margin-top:10px;">you'll have 4 sidebar Coupons included + a lot more</p>
                                 <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div>
                                <div class="col-lg-1">

                                </div>
                              </div>--><?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="col-lg-1">
                                                    <input type="checkbox" id="chk5" <?php if($ads_details['promote_coupons4']!=""){echo "checked='checked';";}?>  class=" click6" name="promote_ads4" value="slider" onClick="subtotalnew3()">
                                                </div>
                                                <div class="col-lg-5">
                                                    <p onclick="$('.click6').click()" style="background:#f79e12; padding:5px; margin-left:-20px;margin-top:5px;">Top Feature Home page slider Coupons</p>
                                                </div>
                                                <div class="col-lg-6"></div>
                                            </div>
                                            <div class="deals_work6">
                                                <div class="col-lg-12">
                                                    <div class="col-lg-1"></div>
                                                    <?php
                                                    if ($static['status']=='Pro Membership' OR $static['status']=='Gold Membership') {
                                                    }
                                                    else  {?>
                                                    <div class="col-lg-1">
                                                        <input class="abc" type="radio" name="sliderdeals" value="10.5" onClick="subtotalnew3()" checked>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <p style=" margin-left:-20px; margin-top:5px;">$3.5</p>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <select name="select5" style="width:100px;" onClick="subtotalnew3()">
                                                            <option value="3">3 Days</option>
                                                            <option value="7">7 Days</option>
                                                            <option value="14">14 Days</option>
                                                            <option value="30">30 Days</option>
                                                            <option value="60">60 Days</option>
                                                            <option value="90">90 Days</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <p><input type="text" name="output4" value="3.5" style="border:none; background:#e2e2e2;"></p>
                                                    </div>
                                                    <div class="col-lg-4"><a href="images/top-features.jpg" class="image-link" title=""><img src="images/top-features.jpg" style="height: 100px; width: 100px;" /></a></div>
                                                </div>  <?php
                                                if ($static['status']=='Gold Membership' )

                                                { }
                                                else {  ?>
                                                <div class="col-lg-12">
                                                    <div class="col-lg-1"></div>
                                                    <!--<div class="col-lg-1">
                                    <input type="radio" class="click11" name="topfeature" value="top feature_premium">
                                </div>
                                <div class="col-lg-4">
                                <p style=" margin-left:-20px; margin-top:5px;">Become a member:</p>
                                </div>
                                <div class="col-lg-6">

                                </div>

                            </div><?php } ?> <div class="deals_work11">
                             <div class="col-lg-12"> <?php
                                                    if ($static['status']=='Pro Membership' )

                                                    { }
                                                    else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-1">
                                    <input type="radio" class="click11" name="membership_topfeature" value="50"                  onClick="checksubtotal(this.value)">
                                </div>

                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">Upgrade Pro Membership</p>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-1">
                                    <input type="radio"  name="membership_topfeature" value="80" onClick="checksubtotal(this.value)">
                                </div>
                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">Upgrade Gold Membership</p>
                                </div>
                                <div class="col-lg-3">

                                </div>

                            </div>

                            <div class="col-lg-12"> <?php
                                                    if ($static['status']=='Pro Membership' )

                                                    { }
                                                    else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-4" style="border:#fff solid 1px;">

                                <p style=" margin-top:10px;">you'll have 4 sidebar Coupons included + a lot more</p>
                                  <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-4" style="border:#fff solid 1px;">
                                 <p style=" margin-left:-10px; margin-top:10px;">you'll have 4 sidebar Coupons included + a lot more</p>
                                 <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div>
                                <div class="col-lg-1">
                                    </div>
                              </div>--><?php } ?>
                                                </div>
                                            </div>  <br>

                                        </div>
                                    </div>
                                </div>



                                <div class="col-lg-12">


                                    <input type="submit" name="update_post" class="btn btn btn-primary pull-left btn6" value="Update Coupon" >
                                </div>
                            </div>
            </form>
            <?php



            include('footer.php');
            ?>
            <script src="../js/jquery-1.11.1.min.js"></script>
            <script src="../js/jquery-ui.min.js" type="text/javascript"></script>
            <link href="../css/jquery-ui.css" rel="stylesheet">
            <?php if(!empty($ads_details['category-name'])){?>
                <script>
                    $.ajax({
                        url: "../ajax-get-subcat.php",
                        type:"POST",
                        data:{id : '<?php echo $ads_details['category-name'];?>',main_menu_id : 2,sub_cat_id:<?php echo $ads_details['sub-category-id'];?>},
                        success:function(data){
                            //console.log(data);
                            //return false;
                            $("#sub-category").html(data);
                        }
                    });

                </script>
            <?php } ?>
            <script language="javascript">
                populateCountries("country", "state");
            </script>
            <script type="text/javascript">

                $(document).ready(function(){
                    $( "#dialog4" ).dialog({
                        autoOpen: false,
                        show: {
                            effect: "blind",
                            duration: 1000
                        },
                        hide: {
                            effect: "explode",
                            duration: 1000
                        },
                        width:500,
                        resizable: false,
                        draggable: false,
                        closeOnEscape: true
                    });

                    $('#btnPreview').on('click',function(){
                        var formData = $('#listForm').serializeArray();
                        $.ajax({
                            url: 'http://trademydeals.com/adsPreview.php',
                            method:'POST',
                            data: formData,
                            success: function(data) {
                                if($("#title").val() != '' || $("#description").val() != '')
                                {
                                    $("#dialog4").html(data);
                                    $("#dialog4").dialog("open");
                                } else {
                                    alert("No Preview Data Available");
                                    return false;
                                }
                            }
                        });
                    });
                });
            </script>

            <style>
                .flot-text{left:-8px !important}
            </style>
            <script>
                jQuery(document).ready(function() {

                    jQuery("#country option[value='<?php echo $ads_details['country'];?>']").attr('selected', 'selected');
                    populateStates("country", "state");
                    jQuery("#state option[value='<?php echo $ads_details['state'];?>']").attr('selected', 'selected');
                    //Index.initCharts(); // init index page's custom scripts
                });

            </script>
            <script>
                jQuery(document).ready(function() {
                    App.init();
                    MapsGoogle.init();
                });
            </script>
            </body>
            <!-- END BODY -->
            </html>