<?php
$page='ads';
include('header.php');
$username=mysql_query("SELECT * FROM user WHERE id=$user_id");
$static=mysql_fetch_array($username);
$membership_table=mysql_query("SELECT * FROM membership WHERE user_id=$user_id ORDER BY id desc LIMIT 1");
$membership_value=mysql_fetch_array($membership_table);
?>
<link rel="stylesheet" href="css/magnific-popup.css">

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
		dateToday = new Date();
    $("#datepicker").datepicker({ minDate: dateToday, maxDate: "+1M" });
  });
  function update_subcategory(id,main_menu_id)
  {
	$.ajax({
    url: "ajax-get-subcat.php",
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
<link rel="stylesheet" href="juploader/css/jquery.fileupload.css">
    <?php
if ($static['status']=='Pro Membership' OR $static['status']=='Gold Membership') {?>
<form action="ads_process.php" method="post" enctype="multipart/form-data" name="listForm" >
<?php
}
else{
    ?>
<form action="paypal2/paypal.php?sandbox=1" method="post" enctype="multipart/form-data" name="listForm" id="listForm" onsubmit="return checkAds();">
<?php
}
?>
   <div class="content">
      <div class="container">
        <div class="col-lg-12">
          <div class="col-lg-9">
              <div class="col-lg-12">
                  <div class="deals_content">
                      <h4>Post Ad  &nbsp;&nbsp;&nbsp;100% Free</h4>
                        <div class="deals_sub">
                          <h4>Ad Details</h4>
                        </div>
                        <div class="deals_form">
						<div class="col-lg-12 reg-nopad" style="margin-top:20px;">
                                <div class="col-lg-3 reg-nopad">
                                    <p>Category<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                </div>
                                <div class="col-lg-7 reg-nopad">
                                      <select id="category" name="category" onchange="update_subcategory(this.value,4)">
									  <option value="0">-Select Category-</option>
									  <?php $q = "SELECT DISTINCT sub_menu_category,main_menu_id
													FROM  `tbl_sub_menu` where main_menu_id ='4' ";
										$sql=  mysql_query($q);
                      while ($row = mysql_fetch_array($sql)) {?>
							<option value="<?php echo $row['sub_menu_category']; ?>"><?php echo $row['sub_menu_category']; ?></option>
                      <?php
                      }
                      ?>
									  </select>
                                </div>

                            </div>
							<div class="col-lg-12 reg-nopad" style="margin-top:20px;margin-bottom:20px;">
                                <div class="col-lg-3 reg-nopad">
                                    <p>Sub-Category<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                </div>
                                <div class="col-lg-7 reg-nopad">
                                      <select id="sub-category" name="sub-category"></select>
                                </div>

                            </div>

                          <div class="col-lg-12 reg-nopad" style="margin-top:20px;">
                            <div class="col-lg-3 reg-nopad">
                                <p>Ad Type<i style="margin-left:10px; color:#CC0000;">*</i></p>
                            </div>
                            <div class="col-lg-7 reg-nopad">
                                <select id="type" name="type">
                                    <option value="offer">I am Offering</option>
                                    <option value="want">I Want</option>
                                </select>
                            </div>
                            <div class="col-lg-2 reg-nopad">
                            </div>
                        </div>

                        <div class="col-lg-12 reg-nopad" style="margin-top:20px;">
                            <div class="col-lg-3 reg-nopad">
                                <p>Ad Price</p>
                            </div>
                            <div class="col-lg-7 reg-nopad">
                                  <input name="price" id="price" type="text" class="form-control">
                            </div>
                            <div class="col-lg-2 reg-nopad">
                            </div>
                        </div>

                          <div class="col-lg-12 reg-nopad" style="margin-top:20px;">
                                <div class="col-lg-3 reg-nopad">
                                    <p>Ad Title<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                </div>
                                <div class="col-lg-7 reg-nopad">
                                      <input name="title" id="title" type="text" class="form-control">
                                      <input type="hidden" name="action" value="process" />
                                       <input name="user_id" type="hidden" value="<?php echo $user_id; ?>">
                                       <input name="product" id="post_type" type="hidden" value="<?php echo "ads"; ?>">
                                        <input type="hidden" name="cmd" value="_cart" /> <?php // use _cart for cart checkout ?>
    <input type="hidden" name="currency_code" value="USD" />
                                </div>
                                <div class="col-lg-2 reg-nopad">
                                </div>
                            </div>
                            <div class="col-lg-12 reg-nopad" style="margin-top:20px;">
                                <div class="col-lg-3 reg-nopad">
                                    <p>Company Name</p>
                                </div>
                                <div class="col-lg-7 reg-nopad">
                                      <input name="company" type="text" class="form-control">
                                </div>
                                <div class="col-lg-2 reg-nopad">
                                </div>
                            </div>
                            <div class="col-lg-12 reg-nopad" style="margin-top:20px;">
                                <div class="col-lg-3 reg-nopad">
                                    <p> Ad Description<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                </div>
                                <div class="col-lg-8 reg-nopad">
                                      <textarea name="description" id="description" class="form-control"  ></textarea>
                                </div>
                                <div class="col-lg-1 reg-nopad">
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-12">
                  <div class="deals_content">
                      <br>
                        <div class="deals_sub">
                          <h4>Ad Location</h4>
                        </div>
                        <div class="deals_form">
                          <div class="col-lg-12 reg-nopad">
                                <div class="col-lg-3 reg-nopad">
                                    <p>Country<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                </div>
                                <div class="col-lg-5 reg-nopad">
                                     <select class="form-control" id="country" name ="country"></select>
                                </div>
                                <div class="col-lg-4 reg-nopad">
                                </div>
                            </div>
                            <div class="col-lg-12 reg-nopad" style="margin-top:20px;">
                                <div class="col-lg-3 reg-nopad">
                                    <p>State<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                </div>
                                <div class="col-lg-5 reg-nopad">
                                    <select class="form-control" name ="state" id ="state"></select>
                                </div>
                                <div class="col-lg-4 reg-nopad">
                                </div>
                            </div>
                            <div class="col-lg-12 reg-nopad" style="margin-top:20px;">
                                <div class="col-lg-3 reg-nopad">
                                    <p>City<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                </div>
                                <div class="col-lg-7 reg-nopad">
                                     <input name="city" type="text" class="form-control">
                                </div>
                                <div class="col-lg-2 reg-nopad">
                                </div>
                            </div>
                            <div class="col-lg-12 reg-nopad" style="margin-top:20px;">
                                <div class="col-lg-3 reg-nopad">
                                    <p>Postal code<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                </div>
                                <div class="col-lg-7 reg-nopad">
                                     <input name="postalcode" type="text" class="form-control">
                                </div>
                                <div class="col-lg-2 reg-nopad">
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


                            <div class="col-lg-12 reg-nopad" style="margin-top:20px;">
                                <div class="col-lg-3 reg-nopad"><span class="country_code"></span>
                                    <p>Phone</p>
                                </div>
                                <div class="col-lg-7 reg-nopad">
                                     <input name="current_city" type="text" class="form-control">
                                     <p style="margin:5px 0 0"><input type="checkbox" value="1" id="share_phone" name="share_phone" /> Share my phone number with others</p>
                                </div>
                                <div class="col-lg-2 reg-nopad">
                                </div>
                            </div>
                            <div class="col-lg-12 reg-nopad" style="margin-top:20px;">
                                <div class="col-lg-3 reg-nopad">
                                    <p>Email<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                </div>
                                <div class="col-lg-7 reg-nopad">
                                     <input name="current_postalcode" type="text" class="form-control">
                                     <p style="margin:5px 0 0"><input type="checkbox" value="1" id="share_email" name="share_email" /> Share my email with others</p>
                                </div>
                                <div class="col-lg-2 reg-nopad">
                                </div>
                            </div>

                            <div class="col-lg-12 reg-nopad" style="margin-top:20px;">
                                <div class="col-lg-3 reg-nopad">
                                    <p>Expiration Date</p>
                                </div>
                                <div class="col-lg-7 reg-nopad">
                                     <input name="expire" type="text"  id="datepicker">
                                </div>
                                <div class="col-lg-2 reg-nopad">
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
                                    <input type="checkbox" class="click1" name="website"  id="website" onclick="showIPAddress(this);">
                                </div>
                                <div class="col-lg-4">
                                     <button type="button" class="btn btn-warning btn-sm click1" style="border:none; margin-left:-30px; margin-top:5px;">Website Link</button>
                                </div>

                                 <div class="col-lg-1">
                                    <input type="checkbox" class="click11" >
                                </div>
                                <div class="col-lg-2">
                                     <button type="button" class="btn btn-warning btn-sm click11" style="border:none; margin-left:-30px; margin-top:5px;">You Tube</button>
                                </div>
                                 <div class="col-lg-1">
                                    <input type="checkbox" class="click111">
                                </div>
                                <div class="col-lg-2">
                                     <button type="button" class="btn btn-warning btn-sm click111" style="border:none; margin-left:-30px; margin-top:5px;">Images</button>
                                </div>
                                <div class="col-lg-1">
                                </div>
                            </div>
                            <div class="deals_click">  <br>

							<div class="col-lg-1" style="margin-left:48px; display:none;">
                                    <input type="radio"  name="weblink" id="weblink" value="5" onClick="checkTotal()">
                            </div>

                            <div class="col-lg-3" style="margin-bottom:5px;">
                                <p>7days-$5</p>
                            </div>

                            <div class="col-lg-12">
                                <div class="col-lg-3">
                                    <p>Website URL<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                </div>
                                <div class="col-lg-7">
                                      <input name="website1" type="text" class="form-control">
                                </div>
                                <div class="col-lg-2">
                                </div>
                            </div> </div>
                            <div class="col-lg-12" style="margin-top:10px;" id="deals_click11">
                                <div class="col-lg-3">
                                    <p>Youtube Link<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                </div>
                                <div class="col-lg-7">
                                      <input name="youtube" type="text" class="form-control">
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
                                       <input type="file" name="file2" class="btn btn btn-primary btn6" value="Post Your Deal" accept="image/x-png, image/gif, image/jpeg"/><br />

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

											<div id="files" onchange="" class="files"></div>

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
    url: "display_process.php",
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
    url: "display_process.php",
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
    url: "display_process.php",
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
    url: "display_process.php",
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
    url: "display_process.php",
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
<script src="juploader/js/vendor/jquery.ui.widget.js"></script>

<!-- The basic File Upload plugin -->
<script src="juploader/js/jquery.fileupload.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->

<script>
/*jslint unparam: true */
/*global window, $ */
var j = jQuery.noConflict();
function unlink_file(file_name,counter_value){



		$.ajax({
    url: "ajax-unlink-image.php",
    type:"POST",
    data:{file_name : file_name},
    success:function(data){
		$("#img_box_link_"+counter_value).remove();
		$("#img_box_"+counter_value).remove();
		$("#image_hidden_id_"+counter_value).remove();

		var total_images = $("#total_images").val();
		$("#total_images").val(total_images-1);
		calcTotal();
		if(total_images>5)
		{
			/*var price_total = parseInt($("#total").val());
					$("#total").val(price_total-1);
					$("#total_images").val(total_images-1);*/
		}

      }
    });
}
var counter = 0;
j(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'http://localhost/trademydeal/' ?
                '//jquery-file-upload.appspot.com/' : 'upload_test.php';
    j('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) { console.log(data);
            j.each(data.result.files, function (index, file) {
				counter ++;
				var data_html;
				if(counter>5)
				{
					/*var price_total = parseInt(j("#total").val());
					j("#total").val(price_total+1);*/
				}
				j("#total_images").val(counter);
				calcTotal();
                j("<input id='image_hidden_id_"+counter+"' type= 'hidden' name='upload_file[]' value='file.name'>").val(file.name).appendTo('#files');
				data_html = '<a id="img_box_link_'+counter+'" class="close_link"  onclick="unlink_file('+"'"+file.name+"'"+','+counter+')">Remove</a><img class= "post_images" id="img_box_'+counter+'" src='+file.url+' style=" margin-right: 10px;height: 80px;width: 100px;"/>';
				//j('<img src="" class="close_btn">').appendTo('#files');
				 j('<div class="post_image_box"/>').html(data_html).appendTo('#files');
            });
        },
        fail: function (data) {
            alert('incorrect image')
        },
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
                      <br><input type="hidden" value="<?php echo $user_id; ?>" id="user_id" />
                        <div class="deals_sub">
                          <h4>Promote Your Ad</h4>
                        </div>
                        <div class="deals_form">

                            <script>
  function showIPAddress(chk) {
      document.getElementById("div1").style.display = chk.checked ? "block" : "none";
      document.getElementById("div2").style.display = chk.checked ? "none" : "block";
  }
</script>
                            <div class="col-lg-12">
                                <div class="col-lg-1">
                                    <input id="chk1" type="checkbox" class="click2" name="highlight" value="high"  onClick="showIPAddress(this);subtotal()" >
                                </div>
                                <div class="col-lg-5">
                                <p onclick="$('.click2').click()" style="background:#f79e12; padding:5px; margin-left:-20px; margin-top:5px;">Hightlighted Ad</p>
                                </div><?php
if ($static['status']=='Pro Membership' OR $static['status']=='Gold Membership')
{?><div id="show1" class="col-lg-6"> </div><?php
}
              else  {?>
                                <div id="show1" class="col-lg-6"></div><?php } ?>
                            </div>
                            <div class="deals_work2">
                             <div class="col-lg-12">
                              <div class="col-lg-1"></div>
                              <?php
if ($static['status']=='Pro Membership' OR $static['status']=='Gold Membership')
{
}
              else  {?>
                                <div class="col-lg-1">
                                    <input class="abc" type="radio" name="high" value="1" onClick="subtotal()" checked>
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
                                  <p style="margin-left:20px;"><input type="text" name="output" value="$0" style="border:none; background:#e2e2e2; "></p>
                                </div>
                                <div class="col-lg-4"><a href="images/highlighted.jpg" class="image-link" title=""><img src="images/highlighted.jpg" style="height: 100px; width: 100px;" /></a></div>
								<?php } ?>
                            </div>  <?php
if ($static['status']=='Gold Membership' )

                         { }
                         else {  ?>
                            <div class="col-lg-12">
                              <div class="col-lg-1"></div>
                            <!-- <div class="col-lg-1">
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
                              <div class="col-lg-1 deals_work72">
                                    <input type="radio" name="membership" value="50"  onClick="checksubtotal(this.value)" >
                                </div>

                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">pro member -$50per month</p>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-1 deals_work72">
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

                                <p style=" margin-top:10px;">you'll have 5 highlighted Ads included + more</p>
                                  <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-4" style="border:#fff solid 1px;">
                                 <p style=" margin-left:-10px; margin-top:10px;">you'll have 10 highlighted Ads included + a lot more</p>
                                 <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div>
                                <div class="col-lg-1">

                                </div>

                            </div>-->
                                          </div><?php } ?>

                          </div>
                             <div class="col-lg-12">
                                <div class="col-lg-1">
                                    <input  id="chk1" type="checkbox" class=" click3" name="promote_ads1" value="top" onClick="showIPAddress(this);subtotalnew()">
                                </div>
                                <div class="col-lg-5">
                                <p onclick="$('.click3').click()" style="background:#f79e12; padding:5px; margin-left:-20px; margin-top:5px;">Top Ads</p>
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
                                    <input class="abc" type="radio" name="top" value="2" onClick="subtotalnew()" checked>
                                </div>
                                <div class="col-lg-3">
                                <p style=" margin-left:-20px; margin-top:5px;">$2per</p>
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
                                <div class="col-lg-1 ">
                                  <p><input type="text" name="output1" value="$0" style="border:none; background:#e2e2e2;"></p>
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
                              <div class="col-lg-1 deals_work82">
                                    <input type="radio" name="member1" value="50" onClick="checksubtotal(this.value)">
                                </div>

                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">pro member -$50 per month</p>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-1 deals_work82">
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

                                <p style=" margin-top:10px;">you'll have 3 top Ads included + more </p>
                                  <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-4" style="border:#fff solid 1px;">
                                 <p style=" margin-left:-10px; margin-top:10px;">you'll have 6 top Ads included + a lot more</p>
                                 <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div>
                                <div class="col-lg-1">

                                </div>
                              </div> --><?php } ?>
                            </div>
                          </div>
                           <div class="col-lg-12">
                                <div class="col-lg-1">
                                    <input  id="chk1" type="checkbox" class=" click4" name="promote_ads2" value="home" onClick="showIPAddress(this);subtotalnew1()">
                                </div>
                                <div class="col-lg-5">
                                <p onclick="$('.click4').click()" style="background:#f79e12; padding:5px; margin-left:-20px; margin-top:5px;">Home page Gallery Ads</p>
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
                                    <input class="abc" type="radio" name="home1" value="3" onClick="subtotalnew1()" checked>
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
                                 <p><input type="text" name="output2" value="$0" style="border:none; background:#e2e2e2;"></p>
                                </div>
                                <div class="col-lg-4"><a href="images/home-page-gallery.jpg" class="image-link" title=""><img src="images/home-page-gallery.jpg" style="height: 100px; width: 100px;" /></a></div>
                            </div> <?php
if ($static['status']=='Gold Membership' )

                         { }
                         else {  ?>
                            <div class="col-lg-12">
                              <div class="col-lg-1"></div>
                              <!--<div class="col-lg-1">
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
                              <div class="col-lg-1 deals_work92">
                                    <input type="radio" name="membership_home" value="50" onClick="checksubtotal(this.value)">
                                </div>

                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">pro member -$50 per month</p>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-1 deals_work92">
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

                                <p style=" margin-top:10px;">you'll have 5 home page Ads included + more </p>
                                  <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-4" style="border:#fff solid 1px;">
                                 <p style=" margin-left:-10px; margin-top:10px;">you'll have 10 home page Ads included + a lot more</p>
                                 <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div>
                                <div class="col-lg-1">

                                </div>
                              </div>  --><?php } ?>
                            </div>
                          </div>
                             <div class="col-lg-12">
                                <div class="col-lg-1">
                                    <input  id="chk1" type="checkbox" class=" click5" name="promote_ads3" value="sidebar" onClick="showIPAddress(this);subtotalnew2()">
                                </div>
                                <div class="col-lg-5">
                                <p onclick="$('.click5').click()"  style="background:#f79e12; padding:5px; margin-left:-20px;margin-top:5px;">Sidebar Ad</p>
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
                                    <input class="abc" type="radio" name="sidebar" value="2.5" onClick="subtotalnew2()" checked>
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
                                  <p><input type="text" name="output3" value="$0" style="border:none; background:#e2e2e2;"></p>
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
                              <div class="col-lg-1 deals_work102">
                                    <input type="radio" name="membership_sidebar" value="50" onClick="checksubtotal(this.value)">
                                </div>

                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">pro member -$50 per month</p>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-1 deals_work102">
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

                                <p style=" margin-top:10px;">you'll have 2 sidebar Ads included + more</p>
                                  <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-4" style="border:#fff solid 1px;">
                                 <p style=" margin-left:-10px; margin-top:10px;">you'll have 4 sidebar Ads included + a lot more</p>
                                 <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div>
                                <div class="col-lg-1">

                                </div>
                              </div><?php } ?>
                            </div>
                          </div>
                            <div class="col-lg-12">
                                <div class="col-lg-1">
                                    <input type="checkbox" class=" click6" name="promote_ads4" value="slider">
                                </div>
                                <div class="col-lg-5">
                                <p style="background:#f79e12; padding:5px; margin-left:-20px;margin-top:5px;">Top Feature Home page slider Ad</p>
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
                                    <input type="radio" name="sliderdeals" value="20" onClick="subtotalnew3()">
                                </div>
                                <div class="col-lg-3">
                                <p style=" margin-left:-20px; margin-top:5px;">$20</p>
                                </div>
                                <div class="col-lg-2">
                                  <select name="select5" style="width:100px;">
                                  <option value="3">3 Days</option>
                                  <option value="7">7 Days</option>
                                  <option value="14">14 Days</option>
								  <option value="30">30 Days</option>
                                  <option value="60">60 Days</option>
								  <option value="90">90 Days</option>

                                  </select>
                                </div>
                                <div class="col-lg-1">
                                  <p><input type="text" name="output4" value="$0" style="border:none; background:#e2e2e2;"></p>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>  <?php
if ($static['status']=='Gold Membership' )

                         { }
                         else {  ?>
                            <div class="col-lg-12">
                              <div class="col-lg-1"></div>
                              <div class="col-lg-1">
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
                              <div class="col-lg-1 deals_work112">
                                    <input type="radio" class="click11" name="membership_topfeature" value="50"                  onClick="checksubtotal(this.value)">
                                </div>

                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">Upgrade Pro Membership</p>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-1 deals_work112">
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

                                <p style=" margin-top:10px;">you'll have 4 sidebar Ads included + a lot more</p>
                                  <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-4" style="border:#fff solid 1px;">
                                 <p style=" margin-left:-10px; margin-top:10px;">you'll have 4 sidebar Ads included + a lot more</p>
                                 <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div>
                                <div class="col-lg-1">
                                    </div>
                              </div> --><?php } ?>
                            </div>
                          </div>
                          <div class="col-lg-12">
                                <div class="col-lg-1">
                                    <input type="checkbox" class=" click6" name="promote_ads4" value="slider" onclick="showIPAddress(this); subtotalnew3();">
                                </div>
                                <div class="col-lg-5">
                                <p onclick="$('.click6').click()" style="background:#f79e12; padding:5px; margin-left:-20px;margin-top:5px;">Top Feature Home page slider Ads</p>
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
     <input class= "abc" type="radio" name="sliderdeals" value="3.5" onClick="subtotalnew3()" checked>
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
                                  <p><input type="text" name="output4" value="$0" style="border:none; background:#e2e2e2;"></p>
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
                                    <input type="radio" class="click11" name="membership_topfeature" value="50" onClick="checksubtotal(this.value)">
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

                                <p style=" margin-top:10px;">you'll have 4 sidebar Deals included + a lot more</p>
                                  <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-4" style="border:#fff solid 1px;">
                                 <p style=" margin-left:-10px; margin-top:10px;">you'll have 4 sidebar Deals included + a lot more</p>
                                 <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div>
                                <div class="col-lg-1">
                                    </div>
                              </div>--><?php } ?>
                            </div>
                          </div> <br>
         <!--<div class="col-lg-12">
                                <div class="col-lg-1">
                                    <input type="checkbox" class="click10" name="promote10" value="urgent1" onClick="showIPAddress(this);subtotal10()">
                                </div>
                                <div class="col-lg-5">
                                <p style="background:#f79e12; padding:5px; margin-left:-20px;margin-top:5px;">Urgent Jobs</p>
                                </div>
                                <div id="show10" class="col-lg-6"></div>
                            </div>   -->
							  <div class="deals_work10">
                             <div class="col-lg-12">
                              <div class="col-lg-1"></div>
                              <?php
if ($static['status']=='Pro Membership' OR $static['status']=='Gold Membership') {
}
              else  {?>



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

                                <p style=" margin-top:10px;">you'll have 2 sidebar Flyers included + more</p>
                                  <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div><?php } ?>
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-4" style="border:#fff solid 1px;">
                                 <p style=" margin-left:-10px; margin-top:10px;">you'll have 4 sidebar Flyers included + a lot more</p>
                                 <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div>
                                <div class="col-lg-1">

                                </div>
                              </div>--><?php } ?>
                            </div>
                          </div>


                        </div>
                    </div>
                 </div>
                 <div class="col-lg-12">
                  <p  style="margin-left:30px; margin-top:30px;"> By posting this Ad,you are agreeing with our <a href="#"> terms and conditions </a></p>                    <?php
if ($static['status']=='Pro Membership' OR $static['status']=='Gold Membership') { } else {?> <p class="pull-right"><span style="font-weight:bold;font-family:arial;font-size:18px;">Total Price:</span>:&nbsp;$ <input type="text" name="total" id="total" value="0" style="border:none; background:#e2e2e2;"> </p><?php } ?>
                 </div>


				 <div class="col-lg-12">
				   <!--input type="button" class="btn btn btn-primary pull-right btn6" id="btnPreview" value="Preview"-->
 <input  id="div1" style="display:none;"  type="submit" class="btn btn btn-primary pull-right btn6" value="Post My Ad" />  <!--onclick="this.form.target='_blank';return true;"-->
 <input  id="div2" type="submit" class="btn btn btn-primary pull-right btn6 js-post-ad" value="Post My Ad" onclick="listForm.action='ads_process.php' ; return true;" >
				 </div>
                </div>
                 </form>
             <?php



             include('footer.php');
             ?>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<link href="css/jquery-ui.css" rel="stylesheet">

<script src="js/magnific-popup.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

		$('.image-link').magnificPopup({type:'image'});

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

  populateCountries("country", "state");
</script>
<div id="dialog4" title="Ads Preview"></div>
