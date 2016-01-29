<?php
include "db.php";
error_reporting(0);
session_start();
$user=$_SESSION['status'];
$user_id=$_SESSION['userid'];
$userdb=mysql_query("SELECT * FROM user WHERE id='$user_id'");
$userfetch=mysql_fetch_array($userdb);
$isActive = $userfetch['is_activate'];
$country=mysql_query("SELECT DISTINCT country_name FROM tbl_country_details");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trade my deals</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="texqt/html; charset=utf-8" />
    
    <!-- Slider Files -->
    <link rel="stylesheet" type="text/css" media="all" href="slider/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="slider/nivo-slider/nivo-slider.css" />
    <script type= "text/javascript" src = "countries.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

      <style> 
  Select { 
    font-family: Arial, Helvetica, sans-serif;
    background: rgba(255, 255, 255, 0.44); 
    color: #333; 
    border: 1px solid #A4A4A4; 
    padding: 4px 8px 4px 4px !important;
    line-height: 1; 
    width: 160px; 
    height:30px; 
  } 
 select:hover { 
    border: 1px solid #FF00FF; 
    box-shadow: inset 0px 1px 2px rgba(0,0,0,0.3); 
    -moz-box-shadow: inset 0px 1px 2px rgba(0,0,0,0.3); 
    -webkit-box-shadow: inset 0px 1px 2px rgba(0,0,0,0.3); 
  } 
 select:focus { 
    border: 1px solid #4d90fe; 
    outline: none; 
    box-shadow: inset 0px 1px 2px rgba(0,0,0,0.3);  
    -moz-box-shadow: inset 0px 1px 2px rgba(0,0,0,0.3); 
    -webkit-box-shadow: inset 0px 1px 2px rgba(0,0,0,0.3); 
    background: rgb(255, 255, 255); } 
  
</style>
<script  src=”//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js”></script>
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
 $("#deals_click111").hide();
  $(".click111").click(function(){
  $("#deals_click111").toggle();
  });
});
$(document).ready(function(){
 $(".deals_work2").hide();
  $(".click2").click(function(){
  $(".deals_work2").toggle();
  });
});
$(document).ready(function(){
 $(".deals_work3").hide();
  $(".click3").click(function(){
  $(".deals_work3").toggle();
  });
});

$(document).ready(function(){
 $(".deals_work4").hide();
  $(".click4").click(function(){
  $(".deals_work4").toggle();
  });
});

$(document).ready(function(){
 $(".deals_work5").hide();
  $(".click5").click(function(){
  $(".deals_work5").toggle();
  });
});


$(document).ready(function(){
 $(".deals_work6").hide();
  $(".click6").click(function(){
  $(".deals_work6").toggle();
  });
});
$(document).ready(function(){
 $(".deals_work72").hide();
  $(".click7").click(function(){
  $(".deals_work72").toggle();
  });
});
$(document).ready(function(){
 $(".deals_work82").hide();
  $(".click8").click(function(){
  $(".deals_work82").toggle();
  });
});
$(document).ready(function(){
 $(".deals_work92").hide();
  $(".click9").click(function(){
  $(".deals_work92").toggle();
  });
});
$(document).ready(function(){
 $(".deals_work102").hide();
  $(".click10").click(function(){
  $(".deals_work102").toggle();
  });
});
$(document).ready(function(){
 $(".deals_work112").hide();
  $(".click11").click(function(){
  $(".deals_work112").toggle();
  });
});
</script>
  <!-- Slider Files -->
     
    <script type="text/javascript" src="slider/fg.menu.js"></script>
    <script>
var website=0;
var regular=0;
var premium1=0;
var premium2=0;
var highlightdeal=0;
var value1=0;
var days=0;
var promember=0;
var goldmember=0;
var sum=0;
var total=0;
var deal=0;
var sum1=0;
var sathya1=0;

function checkTotal(){
website=parseInt(document.getElementById("website").value);
total+=website;
document.listForm.total.value=total;
}

function checksubtotal(regular){
sum=parseInt(regular);
total=parseInt(document.listForm.total.value);
total=(total)+(sum);
document.listForm.total.value=total;
}
function subtotal(){
//sathya1=document.getElementById("sathya").checked;
sum1=parseInt(document.listForm.high.value)*parseInt(document.listForm.select1.value);
document.listForm.output.value = sum1;
total=parseInt(document.listForm.total.value);
//total=(total)+(sum1);
total=(sum1);
document.listForm.total.value=total;
}
function subtotalnew(){
sum1=parseInt(document.listForm.top.value)*parseInt(document.listForm.select2.value);
document.listForm.output1.value = sum1;
total=parseInt(document.listForm.total.value);
total=(total)+(sum1);
document.listForm.total.value=total;
}
function subtotalnew1(){
sum1=parseInt(document.listForm.home1.value)*parseInt(document.listForm.select3.value);
document.listForm.output2.value = sum1;
total=parseInt(document.listForm.total.value);
total=(total)+(sum1);
document.listForm.total.value=total;
}
function subtotalnew2(){
sum1=parseInt(document.listForm.sidebar.value)*parseInt(document.listForm.select4.value);
document.listForm.output3.value = sum1;
total=parseInt(document.listForm.total.value);
total=(total)+(sum1);
document.listForm.total.value=total;
}
function subtotalnew3(){
sum1=parseInt(document.listForm.sliderdeals.value)*parseInt(document.listForm.select5.value);
document.listForm.output4.value = sum1;
total=parseInt(document.listForm.total.value);
total=(total)+(sum1);
document.listForm.total.value=total;
}
</script>
     <script type="text/javascript">    
    $(function(){
      // BUTTONS
      $('.fg-button').hover(
        function(){ $(this).removeClass('ui-state-default').addClass('ui-state-focus'); },
        function(){ $(this).removeClass('ui-state-focus').addClass('ui-state-default'); }
      );
      
      // MENUS      
    $('#flat').menu({ 
      content: $('#flat').next().php(), // grab content from this page
      showSpeed: 400 
    });
    
    $('#hierarchy').menu({
      content: $('#hierarchy').next().php(),
      crumbDefaultText: ' '
    });
    
    $('#hierarchybreadcrumb').menu({
      content: $('#hierarchybreadcrumb').next().php(),
      backLink: false
    });
    
    // or from an external source
    $.get('menuContent.php', function(data){ // grab content from another page
      $('#flyout').menu({ content: data, flyOut: true });
    });
    });
    </script>
    
    
  <script type="text/javascript"> $(function(){ $('<div style="position: absolute; top: 20px; right: 300px;" />').appendTo('body').themeswitcher(); }); </script>

        <link rel="stylesheet" type="text/css" href="elastislider/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="elastislider/css/elastislide.css" />
    <link rel="stylesheet" type="text/css" href="elastislider/css/custom.css" />
    <script src="elastislider/js/modernizr.custom.17475.js"></script>
                        
<script src=" http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAUvgMDpSwpIVSdk4Lt1gyZxRrPG9ukeNb8tYptMFxTfI6RCHRlBR6oN-gOMyEFzILA_3i60HC7gO7HQ "
        type="text/javascript">
//My Google Maps Key
    </script>

    <script type="text/javascript">

window.onload=function load() {
if (GBrowserIsCompatible()) {
var map = new GMap2(document.getElementById("map"));
map.addControl (new GSmallMapControl());
map.addControl(new GMapTypeControl());
var center = new GLatLng(45.4215296,-75.69719309999999);
map.setCenter(center, 14);
//map.setMapType(G_SATELLITE_MAP);
geocoder = new GClientGeocoder();

var marker = new GMarker(center, {draggable: true}); 
map.addOverlay(marker);
document.getElementById("lat").value = center.lat();
document.getElementById("lng").value = center.lng ();

geocoder = new GClientGeocoder();

GEvent.addListener(marker, "dragend", function() {
var point =marker.getPoint();
map.panTo(point);
document.getElementById("lat").value = point.lat();
document.getElementById("lng").value = point.lng();
});

GEvent.addListener(map, "moveend", function() {
map.clearOverlays();
var center = map.getCenter();
var marker = new GMarker(center, {draggable: true});
map.addOverlay(marker);
document.getElementById ("lat").value = center.lat();
document.getElementById("lng").value = center.lng();

GEvent.addListener(marker, "dragend", function() {
var point =marker.getPoint();
map.panTo(point);
document.getElementById("lat").value = point.lat();
document.getElementById("lng").value = point.lng();
});
});
}
}

function showAddress(address) {
var map = new GMap2(document.getElementById("map"));
map.addControl(new GSmallMapControl());
map.addControl(new GMapTypeControl());
if (geocoder) {
geocoder.getLatLng (
address,
function(point) {
if (!point) {
alert(address + " city not found !");
}
else {
document.getElementById("lat").value = point.lat();
document.getElementById("lng").value = point.lng();
map.clearOverlays()
map.setCenter(point, 8);
var marker = new GMarker(point, {draggable: true}); 
map.addOverlay(marker);

GEvent.addListener(marker, "dragend", function() {
var pt =marker.getPoint();
map.panTo(pt);
document.getElementById("lat").value = pt.lat();
document.getElementById("lng").value = pt.lng();
});

GEvent.addListener(map, "moveend", function() {
map.clearOverlays();
var center = map.getCenter();
var marker = new GMarker(center, {draggable: true});
map.addOverlay(marker);
document.getElementById("lat").value = center.lat();
document.getElementById("lng").value = center.lng();

GEvent.addListener(marker, "dragend", function() {
var pt =marker.getPoint();
map.panTo(pt);
document.getElementById("lat").value = pt.lat();
document.getElementById("lng").value = pt.lng();
});
});
}}
);
}}
    </script>
    <!--google language translation script-->
            <script>
            function googleTranslateElementInit() {
              new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,de,sr,es,hi,ko,ru,es-co,th,ro,fr,nl,ru,zu,ur,tr,sk,ms,ja,it,id,hu,he',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                }, 'google_translate_element');
                }
                </script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                <style type="text/css">iframe.goog-te-banner-frame { display:none !
                important; }</style>
                <style type="text/css">body {position: static !important; top: 0 !
                important;}
                .goog-te-gadget-icon{
                background:none !important;
                }
            </style> 

  </head>
  <body onload="load()" onunload="GUnload()">
    <div class="header">
      <div class="container">
          <div class="col-lg-12">
              <div class="col-lg-3">
              <li><a href="https://www.facebook.com/pages/Trademydeals/324887917684548" target="_blank"><img src="images/1.png"></a></li>
                        <li><a href="https://plus.google.com/u/0/107279557881407049137" target="_blank"><img src="images/2.png"></a></li>
                        <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://bluewhalesolutions.com/D/trademydeals/" target="_blank"><img src="images/3.png"></a></li>
                        <li><a href="#"><img src="images/4.png"></a></li>
                        <li><a href="https://twitter.com/trademydeals" target="_blank"><img src="images/5.png"></a></li>
                        <li><a href="https://www.youtube.com/channel/UCWAoWpc47OQft8IIr6sSFcQ" target="_blank"><img src="images/6.png"></a></li>
                  <!--<p><span class="glyphicon glyphicon-envelope"></span></i>Email:info@cocarada.com</p>-->
                </div>
               
                <?php
                $users=$_SESSION['user_name'];
                if($user == 'true' && $isActive == 1)
                  {?><!--<div class="col-lg-2">
                  <a href="membershipuser.php"><p><?php echo $users ?></p></a>
                  </div>-->
                  <div class="col-lg-3">
                   <ul class="list-inline pull-right">
                    <li><a href="Editmyinfo.php">My Account</a></li>
					<li>&nbsp;<span style="color:#FFF;">|</span>&nbsp;</li>
                    <li><a href="logout.php">Logout</a></li>
                   </ul>
                  </div>
                  <?php } else { ?>
                <div class="col-lg-3">
                  <ul class="list-inline pull-right">
                    <li><a href="signup.php">Log-in</a></li>
					<li>&nbsp;<span style="color:#FFF;">|</span>&nbsp;</li>
                    <li><a href="signin.php">Signup</a></li>
                   </ul>
                </div>
                <?php } ?>
              
           <div class="col-lg-3">
                      <ul class="list-inline pull-right">
                       <li><a href="postad.php" class="btn btn-sm btn-success btn1">Post Ad Free</a></li>
                       <li><a href="postdeal.php" class="btn btn-sm btn-success btn2">Post Deal</a></li>
                      </ul>          
           </div>
           
                
                <div>    
                  <div id="google_translate_element" class="col-lg-3 pull-right"></div>
                </div>
                
                </div>
            </div>

            <!--google language translation div-->
             
            <!--google language translation div-->

            <!--
            <div id="google_translate_element" style="float:right;"></div><script type="text/javascript">
                      function googleTranslateElementInit() {
                      new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL, multilanguagePage: true}, 'google_translate_element');
                        }
                    </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
        </div>
        
        
    </div>
    <div class="logo">
      <div class="container">
      <div class="col-lg-12">
          <div class="col-lg-6">
              <img src="images/logo.png" class="img-responsive" >
            </div>
            <div class="col-lg-6">
              <div class="col-lg-12">
                  <div class="col-lg-7"></div>
                  <!--<div class="col-lg-3">
                      <a href="postad.php"><button type="button" class="btn btn-sm btn-success btn1" >Post Ad Free</button></a>
                    </div>
                    <div class="col-lg-2">
                      <a href="postdeal.php"><button type="button" class="btn btn-sm btn-success btn2" style=" margin-left:0px;">Post Deal</button></a>
                    </div>-->
                </div>
                <div class="col-lg-12">
                  <div class="col-lg-2"><p style="font-size:14px; margin-left:-30px; margin-top:8px;">My Location:</p></div>
                  <div class="col-lg-7">
                      <div class="btn-group">
                          <form method="POST" action="country_process.php">
                              <table>
                                  <tr>
                                      <td>
                                          <span><select name="country" id="country1" onChange="get_state(this.value)" required="required">Select Country
        <option value="">Select Country</option>
<?php 
$sql_country = mysql_query("SELECT DISTINCT `country_iso_code`,`country_name` FROM `tbl_country_details` ORDER BY `country_iso_code` ASC");
while($row_country = mysql_fetch_assoc($sql_country)) {?>
    <option value="<?php  echo $row_country['country_iso_code']; ?>">
        <?php echo $row_country['country_name']; ?>
    </option>
<?php
} 
?>
</select>
</span>
                                      </td>
<td>
    <span id="stateLayer">
    <select name="state" id="state1" onChange="get_cities(this.value)" required="required">Select State
        <option value="">Select State</option>
    </select>

</span>
</td>
<td style="padding-left:10px;">
    <span id="cityLayer">
    <select name="city" id="city" required="required">Select City
        <option value="">Select City</option>
    </select>
    </span>
</td></tr>
                              </table>
<div style="padding-left:20px;margin-top:20px;" class="pull-right">
<input type="submit" class="btn btn-sm btn-success btn1" name="submit" value="Search" />
</div>
 
                       </form>
                           
                          </div>
                    </div>
                  <!--<div class="input-group col-lg-5">
                      <input type="text" class="form-control" style="padding:5px;">
                      <span class="input-group-addon" style="margin-left:0px;"><span class="glyphicon glyphicon-search"></span></span>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    </div>
      <div class="menu" style="border-bottom:none;">
      <div class="container">
        <div class="col-lg-12">
        <div class="col-lg-12">
       <nav class="navbar navbar-default" role="navigation">
     <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
        </button>
        
    </div>
    <!--/.navbar-header-->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav"><?php 
        if($page=='home') { ?>
         <li class="active"><a href="index.php">Home</a></li><?php } else  { ?>
         <li><a href="index.php">Home</a></li><?php }
        if($page=='deals') { ?>
          <li class="dropdown active">
              <a href="deals.php" class="dropdown-toggle"  data-hover="dropdown">Deals <b class="caret"></b></a> <?php } 
              else{?> <li class="dropdown">
              <a href="deals.php" class="dropdown-toggle"  data-hover="dropdown">Deals <b class="caret"></b></a> <?php }?>
              <ul class="dropdown-menu multi-column columns-4" style="margin-left:0px;">
                <div class="row">
                  <div class="col-sm-3">
                    <ul class="multi-column-dropdown">
                      <li><a href="#"><strong>Apparel</strong></a></li>
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Apparel'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                               <li class="divider"></li>
                                 <li><a href="#"><strong>Automotive</strong></a></li>
                        <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Automotive'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                               <li class="divider"></li>
                                 <li><a href="#"><strong>Beauty & Wellness</strong></a></li>
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Beauty & Wellness'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                    
                    </ul>
                  </div>
                  <div class="col-sm-3">
                     <ul class="multi-column-dropdown">
                           <li><a href="#"><strong>Computers & Electronics</strong></a></li>
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Computer & Electronics'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                              <li class="divider"></li>
                                 <li><a href="#"><strong>Entertainment</strong></a></li>
                       <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Entertainment'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                               <li class="divider"></li>
                                <li><a href="#"><strong>Financial Services</strong></a></li>
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Financial Services'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                    </ul>
                  </div>
                         <div class="col-sm-3">
                    <ul class="multi-column-dropdown">
                               <li><a href="#"><strong>Groceries</strong></a></li>
                               <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Groceries'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                          <li class="divider"></li>
                               <li><a href="#"><strong>Group Deals</strong></a></li>
                               <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Group Deals'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                          <li class="divider"></li>
                               <li><a href="#"><strong>Home & Garden</strong></a></li>
                       <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Home & Garden'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                          <li class="divider"></li>
                               <li><a href="#"><strong>Kids & Babies</strong></a></li>
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Kids & Babies'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>                    </ul>
                  </div>
                  <div class="col-sm-3">
                    <ul class="multi-column-dropdown">
                               <li><a href="#"><strong>Restaurants</strong></a></li>
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Restaurants'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>                           <li class="divider"></li>
                      <li><a href="#"><strong>Small Business</strong></a></li>
                               <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Small Business'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                           <li class="divider"></li>
                               <li><a href="#"><strong>Sports & Business</strong></a></li>
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Sports & Business'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                           <li class="divider"></li>
                                <li><a href="#"><strong>Travel</strong></a></li>
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Travel'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                    </ul>
                  </div>
                </div>
              </ul>
          </li><?php 
          if($page=='coupons'){ ?>
          <li class="dropdown active">
              <a href="coupons.php" class="dropdown-toggle" data-hover="dropdown">Coupons <b class="caret"></b></a><?php }
              else { ?> <li class="dropdown">
              <a href="coupons.php" class="dropdown-toggle" data-hover="dropdown">Coupons <b class="caret"></b></a> <?php } ?>
              <ul class="dropdown-menu multi-column columns-4" >
                <div class="row">
                  <div class="col-sm-3">
                    <ul class="multi-column-dropdown">
                               <li><a href="#"><strong>Apparel</strong></a></li>
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Apparel'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                            <li class="divider"></li>
                               <li><a href="#"><strong>Automotive</strong></a></li>
                     <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Automotive'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                            <li class="divider"></li>
                               <li><a href="#"><strong>Beauty & Wellness</strong></a></li>
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Beauty & Wellness'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                    
                    </ul>
                  </div>
                  <div class="col-sm-3">
                     <ul class="multi-column-dropdown">
                               <li><a href="#"><strong>Computers & Electronics</strong></a></li>
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Computer & Electronics'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                            <li class="divider"></li>
                               <li><a href="#"><strong>Entertainment</strong></a></li>
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Entertainment'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                            <li class="divider"></li>
                                <li><a href="#"><strong>Financial Services</strong></a></li>
                                <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Financial Services'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                    </ul>
                  </div>
                         <div class="col-sm-3">
                    <ul class="multi-column-dropdown">
                                <li><a href="#"><strong>Groceries</strong></a></li>
                                <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Automotive'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                            <li class="divider"></li>
                      <li><a href="#"><strong>Group Deals</strong></a></li>
                             <li class="divider"></li>
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Automotive'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                            <li class="divider"></li>
                                 <li><a href="#"><strong>Kids & Babies</strong></a></li>
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Kids & Babies'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                    </ul>
                  </div>
                  <div class="col-sm-3">
                    <ul class="multi-column-dropdown">
                                 <li><a href="#"><strong>Restaurants</strong></a></li>
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Restaurants'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                             <li class="divider"></li>
                                 <li><a href="#"><strong>Small Business</strong></a></li>
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Small Business'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                             <li class="divider"></li>
                                 <li><a href="#"><strong>Sports & Business</strong></a></li>
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Sports & Business'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                             <li class="divider"></li>
                                 <li><a href="#"><strong>Travel</strong></a></li>
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Travel'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>
                     
                    </ul>
                  </div>
                </div>
              </ul>
          </li>
         <?php 
          if($page=='flyers'){ ?>
          <li class="dropdown active">
              <a href="flyers.php" class="dropdown-toggle" data-hover="dropdown">Flyers <b class="caret"></b></a><?php }
              else { ?> <li class="dropdown">
              <a href="flyers.php" class="dropdown-toggle" data-hover="dropdown">Flyers <b class="caret"></b></a> <?php } ?>
              <ul class="dropdown-menu multi-column columns-4">
                <div class="row">
                         <div class="col-sm-3">
                    <ul class="multi-column-dropdown">
                        <?php 
                      $sql=  mysql_query("SELECT sub_menu_category FROM `tbl_sub_menu` WHERE `main_menu_id`='3'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category'];?>"><?php echo $row['sub_menu_category'];?></a></li>
                      <?php
                      }
                      ?>
                     
                    </ul>
                  </div>
                </div>
              </ul>
          </li><?php 
        if($page=='ads') { ?>
        <li class="dropdown active">
              <a href="ads.php" class="dropdown-toggle"  data-hover="dropdown">Ads <b class="caret"></b></a><?php } else  { ?>
         <li class="dropdown">
              <a href="ads.php" class="dropdown-toggle"  data-hover="dropdown">Ads <b class="caret"></b></a><?php } ?>
            
              <ul class="dropdown-menu multi-column columns-5">
                <div class="row">
                  <div class="col-sm-2">
                    <ul class="multi-column-dropdown">
                          <li><a href="#"><strong style="color:#FFCC66">Buy & Sell </strong></a></li>
                        <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category`='Buy Sell'");    
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>               </ul>
                  </div>
                  <div class="col-sm-2">
                    <ul class="multi-column-dropdown">
                               <li><a href="#"><strong style="color:#FFCC66">Cars & Vehicles</strong> </a></li>
                          <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category`='Cars & Vehicles'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?> 
                                <li><a href="#"><strong style="color:#FFCC66">Services</strong></a></li>
                            <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category`='Services'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?> 
                    </ul>
                  </div>
                  <div class="col-sm-2">
                    <ul class="multi-column-dropdown">
                               <li><a href="#"><strong style="color:#FFCC66">PETS</strong> </a></li>
                            <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category`='Pets'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?> 
                    </ul>
                  </div>
                         <div class="col-sm-2">
                    <ul class="multi-column-dropdown">
                               <li><a href="#"><strong style="color:#FFCC66">REAL & ESTATE</strong> </a></li>
                               <li><a href="#"><strong style="color:#000; font-size:10px;">For Rent</strong></a></li>
                            <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category1`='for rent'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?> 
                      <li><a href="#"><strong style="color:#000; font-size:10px;">For Sale</strong></a></li>
                            <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category1`='for sale'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>           
                      <li><a href="#"><strong style="color:#000; font-size:10px;">Other</strong></a></li>
                            <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category1`='other'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?>           
                    </ul>
                  </div>
                        <div class="col-sm-2">
                    <ul class="multi-column-dropdown">
                               <li><a href="#"><strong style="color:#FFCC66">COMMUNITY</strong> </a></li>
                            <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category`='COMMUNITY'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?> 
                    </ul>
                  </div>
                        <div class="col-sm-2">
                    <ul class="multi-column-dropdown">
                              <li><a href="#"><strong style="color:#FFCC66; margin-left:-35px;">VACATION&nbsp;RENTAL</strong> </a></li>
                     <select class="form-control">
                                  <option value="select country">Select&nbsp;country</option>
                                  <option value="select country">Select&nbsp;country</option>
                     </select>
                    </ul>
                  </div>
                </div>
              </ul>
          </li>
             <?php 
          if($page=='jobs'){ ?>
          <li class="dropdown active">
              <a href="jobs.php" class="dropdown-toggle" data-hover="dropdown">Jobs <b class="caret"></b></a><?php }
              else { ?> <li class="dropdown">
              <a href="jobs.php" class="dropdown-toggle" data-hover="dropdown">Jobs <b class="caret"></b></a> <?php } ?>
              <ul class="dropdown-menu multi-column columns-2">
                <div class="row">
                  <div class="col-sm-6">
                    <ul class="multi-column-dropdown">
                            <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='5'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?> 
                    </ul>
                  </div>
                </div>
              </ul>
          </li>
              <?php 
          if($page=='resumes'){ ?>
          <li class="dropdown active">
              <a href="resumes.php" class="dropdown-toggle" data-hover="dropdown">Resumes <b class="caret"></b></a><?php }
              else { ?> <li class="dropdown">
              <a href="resumes.php" class="dropdown-toggle" data-hover="dropdown">Resumes <b class="caret"></b></a> <?php } ?>
             <ul class="dropdown-menu multi-column columns-2">
                <div class="row">
                  <div class="col-sm-6">
                    <ul class="multi-column-dropdown">
                      <?php 
                      $sql=  mysql_query("SELECT sub_menu_category_item FROM `tbl_sub_menu` WHERE `main_menu_id`='6'");
                      while ($row = mysql_fetch_array($sql)) {?>
                      <li><a href="index2.php?product=<?php echo $row['sub_menu_category_item'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                      <?php
                      }
                      ?> 
                      
                    </ul>
                  </div>
                </div>
              </ul>
          </li> <?php 
          if($page=='membership'){ ?>
               <li class="active"><a href="membership1.php">Membership</a></li><?php }
              else { ?><li ><a href="membership1.php">Membership</a></li> <?php } ?>
        </ul>
    </div>
    <!--/.navbar-collapse-->
</nav>
    </div>
    </div>
    </div>

    </div>
    </div>