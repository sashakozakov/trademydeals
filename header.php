<?php

session_start();
include "db.php";
include "custom_function.php";
update_user_visit();
update_page_visit();
//error_reporting(0);

$user=$_SESSION['status'];
$user_id=$_SESSION['userid'];
$userdb=mysql_query("SELECT * FROM user WHERE id='$user_id'");
$userfetch=mysql_fetch_array($userdb);
$isActive = $userfetch['is_activate'];
$country=mysql_query("SELECT DISTINCT country_name FROM tbl_country_details WHERE country_name='Canada' OR country_name='United Kingdom' OR country_name='Australia' OR country_name='United States'");
$country_name = ($_COOKIE['def_country'] == "United States") ? 'USA': $_COOKIE['def_country'];
$countries = array('Australia','Canada','USA','United Kingdom');
if(!in_array($country_name,$countries)) $country_name = 'Canada';
require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();

$geoplugin->locate();
//echo $geoplugin->countryName." ".$geoplugin->countryCode;
//$ip = $_SERVER['REMOTE_ADDR'];
//$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
//$country = $details->country; // -> "US"
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
    <link href="css/media.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="texqt/html; charset=utf-8" />
    <meta name='webgains-site-verification' content='02vdnjpe' />
    <meta name="fo-verify" content="a7f346f4-a9a4-4bcc-a766-8a5f1cdf56e1">
    <!-- Slider Files -->
    <link rel="stylesheet" type="text/css" media="all" href="slider/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="slider/nivo-slider/nivo-slider.css" />
    <script type= "text/javascript" src = "js/jquery.min.js"></script>
    <script type= "text/javascript" src = "js/checkForm.js"></script>
    <!--    <script type= "text/javascript" src = "js/checkCoupon.js"></script>-->
    <script type= "text/javascript" src = "js/checkAds.js"></script>
    <script type= "text/javascript" src = "js/checkJobs.js"></script>
    <script type= "text/javascript" src = "js/checkResume.js"></script>
    <script type= "text/javascript" src = "countries.js"></script>
    <script type= "text/javascript" src = "js/main.js"></script>


    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
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

        .abc {
            display: none;
        }

        #state1, #city{
            width:110px;
            background:#fff;
        }

        #state1
        {
            margin:0px 10px;
        }

    </style>
    <script  src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).on('change','#country',function(){
            var country =  $(this).val();
            $.ajax({
                url: "countryCode.php",
                type:"POST",
                data:{country : $(this).val()},
                dataType: "html",
                success:function(data){
                    $('.country_code').html(data);
                }
            });

        });
    </script>

    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

    <script type="text/javascript">
        bkLib.onDomLoaded(function() {
            new nicEditor({buttonList : ['bold','italic','underline','ol','ul','link','unlink']}).panelInstance('description');
        });
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
                checkTotal();
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
            if($("#chk1").attr('checked') != 'checked')      $(".deals_work2").hide();
            $(".click2").click(function(){
                $(".deals_work2").toggle();
            });
        });
        $(document).ready(function(){
            if($("#chk2").attr('checked') != 'checked')       $(".deals_work3").hide();
            $(".click3").click(function(){
                $(".deals_work3").toggle();
            });
        });

        $(document).ready(function(){
            if($("#chk3").attr('checked') != 'checked')     $(".deals_work4").hide();
            $(".click4").click(function(){
                $(".deals_work4").toggle();
            });
        });

        $(document).ready(function(){
            if($("#chk6").attr('checked') != 'checked')       $(".deals_work10").hide();
            $(".click10").click(function(){
                $(".deals_work10").toggle();
            });
        });











        $(document).ready(function(){
            if($("#chk4").attr('checked') != 'checked')     $(".deals_work5").hide();
            $(".click5").click(function(){
                $(".deals_work5").toggle();
            });
        });


        $(document).ready(function(){
            if($("#chk5").attr('checked') != 'checked')       $(".deals_work6").hide();
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
            calcTotal();
            return;
            weblink=parseFloat(document.getElementById("weblink").value);
//alert(weblink);
            total+=parseFloat(weblink);
            document.listForm.total.value=total;
        }

        function checksubtotal(regular){
            sum=parseFloat(regular);
            total=parseFloat(document.listForm.total.value);
            total=total+(sum);
            document.listForm.total.value=total;
        }

        function checksubtotal(regular){
            calcTotal();
            return;
            sum=parseFloat(regular);

            if($("input[name='regular'][value='20']").prop("checked"))
            {
                if(total==118 || total==60)
                {
                    total=parseFloat(document.listForm.total.value)-60;
                }
                if(total==138 || total==80)
                {
                    total=parseFloat(document.listForm.total.value)-80;
                }
                sum1 = total + (sum);
                //alert(sum1);
            }
            if($("input[name='regular'][value='60']").prop("checked")){
                if(total==78 || total ==20)
                {
                    total=parseFloat(document.listForm.total.value)-20;
                }

                if(total==138 || total==80)
                {
                    total=parseFloat(document.listForm.total.value)-80;
                }
                sum1 = total + (sum);
                //alert(sum1);
            }
            if($("input[name='regular'][value='80']").prop("checked")){

                if(total==78 || total==20)
                {
                    total=parseFloat(document.listForm.total.value)-20;
                }
                if(total==118 || total==60)
                {
                    total=parseFloat(document.listForm.total.value)-60;
                }
                sum1 = total + (sum);
                //alert(sum1);
            }
            total=(sum1);
            document.listForm.total.value=total;
        }

        function calcTotal(){
            if($("#post_type").val() == 'flyers' || $("#post_type").val() == 'deals' || $("#post_type").val() == 'coupons'){
                sum = 20;
            }else{
                sum = 0;
            }

            document.listForm.total.value = sum;
            if(typeof(document.listForm.highlight) != "undefined" && document.listForm.highlight.checked == true){
                sum += parseFloat(document.listForm.high.value)*parseFloat(document.listForm.select1.value);
            }

            if(typeof(document.listForm.promote_ads1) != "undefined" && document.listForm.promote_ads1.checked == true){
                sum += parseFloat(document.listForm.top.value)*parseFloat(document.listForm.select2.value);
            }

            if(typeof(document.listForm.promote_ads2) != "undefined" && document.listForm.promote_ads2.checked == true){
                sum += parseFloat(document.listForm.home1.value)*parseFloat(document.listForm.select3.value);
            }

            if(typeof(document.listForm.promote_ads3) != "undefined" && document.listForm.promote_ads3.checked == true){
                sum += parseFloat(document.listForm.sidebar.value)*parseFloat(document.listForm.select4.value);
            }

            if(typeof(document.listForm.promote10) != "undefined" && document.listForm.promote10.checked == true){
                sum += parseFloat(document.listForm.urgent1.value)*parseFloat(document.listForm.select10.value);
            }

            if(typeof(document.listForm.promote_ads4) != "undefined" && document.listForm.promote_ads4.checked == true){
                sum += parseFloat(document.listForm.sliderdeals.value)*parseFloat(document.listForm.select5.value);
            }

            if(typeof(document.listForm.regular) != "undefined" && document.listForm.regular.value != ""){
                sum += parseFloat(document.listForm.regular.value);
            }

            if(typeof(document.listForm.website) != "undefined" && document.listForm.website.checked == true
                && ($("#post_type").val() == 'ads' || $("#post_type").val() == 'jobs' || $("#post_type").val() == 'resumes')){
                sum += 5;//parseFloat(document.listForm.weblink.value);
            }

            var total_images = $("#total_images").val();
            if(total_images>5)
            {
                add = parseFloat(total_images)-5;
                sum += add;
            }

            document.listForm.total.value = sum;

        }
        function subtotal(){
            sum1=parseFloat(document.listForm.high.value)*parseFloat(document.listForm.select1.value);
            document.listForm.output.value = sum1;
//total=parseFloat(document.listForm.total.value);
//total=(total)+(sum1);
//document.listForm.total.value=total;
            calcTotal();
        }
        /*var old_value = 3;
         var old_value_sum = 15;
         function subtotal(){
         sum1=parseFloat(document.listForm.high.value)*parseFloat(document.listForm.select1.value);
         var new_value = parseFloat(document.listForm.select1.value);;
         document.listForm.output.value = sum1;
         total=parseFloat(document.listForm.total.value);

         if(new_value>old_value)
         {
         alert(old_value_sum);
         total=(total)+(sum1) - old_value_sum ;

         }else if(new_value<old_value){

         total=(total)-(old_value_sum);
         }else if(new_value==old_value)
         {

         total=(total)+(sum1);
         }
         document.listForm.total.value=total;
         old_value = parseFloat(document.listForm.select1.value);
         old_value_sum=parseFloat(document.listForm.high.value)*parseFloat(old_value);

         }*/
        function subtotalnew(){
            sum1=parseFloat(document.listForm.top.value)*parseFloat(document.listForm.select2.value);
            document.listForm.output1.value = sum1;
            /*total=parseFloat(document.listForm.total.value);
             total=(total)+(sum1);
             document.listForm.total.value=total;*/
            calcTotal();
        }
        function subtotalnew1(){
            sum1=parseFloat(document.listForm.home1.value)*parseFloat(document.listForm.select3.value);
            document.listForm.output2.value = sum1;
            /*total=parseFloat(document.listForm.total.value);
             total=(total)+(sum1);
             document.listForm.total.value=total;*/
            calcTotal();
        }
        function subtotalnew2(){
            sum1=parseFloat(document.listForm.sidebar.value)*parseFloat(document.listForm.select4.value);
            document.listForm.output3.value = sum1;
            /*total=parseFloat(document.listForm.total.value);
             total=(total)+(sum1);
             document.listForm.total.value=total;*/
            calcTotal();
        }
        function subtotalnew3(){
            sum1=parseFloat(document.listForm.sliderdeals.value)*parseFloat(document.listForm.select5.value);
            document.listForm.output4.value = sum1;
            /*total=parseFloat(document.listForm.total.value);
             total=(total)+(sum1);
             document.listForm.total.value=total;*/
            calcTotal();
        }
        function subtotal10(){
            sum1=parseFloat(document.listForm.urgent1.value)*parseFloat(document.listForm.select10.value);
            document.listForm.output10.value = sum1;
            /*total=parseFloat(document.listForm.total.value);
             total=(total)+(sum1);
             document.listForm.total.value=total;*/
            calcTotal();
        }

        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires="+d.toUTCString();
            document.cookie = cname + "=" + cvalue + "; " + expires;
        }

    </script>
    <script type="text/javascript">
        $(function(){
            // BUTTONS
            $('.fg-button').hover(
                function(){ $(this).removeClass('ui-state-default').addClass('ui-state-focus'); },
                function(){ $(this).removeClass('ui-state-focus').addClass('ui-state-default'); }
            );

            $("#change_loc").click(function(){
                $('#country1').change();
                setTimeout(function(){
                    $('#state1').change();
                },300 );

//                $("#def_location").hide();
//                $("#location").show();
            })

            $("#save_location").click(function(){
                setCookie("def_country",$.trim($("#country1 :selected").text()),365);
                setCookie("def_country_code",$("#country1").val(),365);
                setCookie("def_state",$("#state1").val(),365);
                setCookie("def_city",$("#city").val(),365);
                $('.close').click();
                $("#location_text").text($.trim($("#country1 :selected").text())+', '+$("#state1").val()+', '+$("#city").val());
                //   $("#location").hide();
                $("#def_location").show();
                location.reload();
                return false;
            })

            // MENUS
            /* $('#flat').menu({
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
             });*/

            // or from an external source
//            $.get('menuContent.php', function(data){ // grab content from another page
//                $('#flyout').menu({ content: data, flyOut: true });
//            });
        });
    </script>


    <script type="text/javascript">
        $(function(){
            //$('<div style="position: absolute; top: 20px; right: 300px;" />').appendTo('body').themeswitcher();
        });
    </script>

    <link rel="stylesheet" type="text/css" href="elastislider/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="elastislider/css/elastislide.css" />
    <link rel="stylesheet" type="text/css" href="elastislider/css/custom.css" />
    <script src="elastislider/js/modernizr.custom.17475.js"></script>

    <!--    <script src=" http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAUvgMDpSwpIVSdk4Lt1gyZxRrPG9ukeNb8tYptMFxTfI6RCHRlBR6oN-gOMyEFzILA_3i60HC7gO7HQ "-->
    <!--            type="text/javascript">-->
    <!--        //My Google Maps Key-->
    <!--    </script>-->

    <script type="text/javascript">

        //        window.onload=function load() {
        //            if (GBrowserIsCompatible()) {
        //                var map = new GMap2(document.getElementById("map"));
        //                map.addControl (new GSmallMapControl());
        //                map.addControl(new GMapTypeControl());
        //                var center = new GLatLng(45.4215296,-75.69719309999999);
        //                map.setCenter(center, 14);
        ////map.setMapType(G_SATELLITE_MAP);
        //                geocoder = new GClientGeocoder();
        //
        //                var marker = new GMarker(center, {draggable: true});
        //                map.addOverlay(marker);
        //                document.getElementById("lat").value = center.lat();
        //                document.getElementById("lng").value = center.lng ();
        //
        //                geocoder = new GClientGeocoder();
        //
        //                GEvent.addListener(marker, "dragend", function() {
        //                    var point =marker.getPoint();
        //                    map.panTo(point);
        //                    document.getElementById("lat").value = point.lat();
        //                    document.getElementById("lng").value = point.lng();
        //                });
        //
        //                GEvent.addListener(map, "moveend", function() {
        //                    map.clearOverlays();
        //                    var center = map.getCenter();
        //                    var marker = new GMarker(center, {draggable: true});
        //                    map.addOverlay(marker);
        //                    document.getElementById ("lat").value = center.lat();
        //                    document.getElementById("lng").value = center.lng();
        //
        //                    GEvent.addListener(marker, "dragend", function() {
        //                        var point =marker.getPoint();
        //                        map.panTo(point);
        //                        document.getElementById("lat").value = point.lat();
        //                        document.getElementById("lng").value = point.lng();
        //                    });
        //                });
        //            }
        //        }

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
    </script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</head>
<body  onunload="GUnload()">
<div class="header">
    <div class="container">
        <div class="col-md-12 col-lg-12">
            <div class="col-xs-6 col-md-3 col-lg-3 social-btns">
                <li><a href="https://www.facebook.com/trademydealsinternational/?ref=hl" target="_blank"><img src="images/1.png"></a></li>
                <li><a href="https://plus.google.com/u/0/107279557881407049137" target="_blank"><img src="images/2.png"></a></li>
                <!--li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://bluewhalesolutions.com/D/trademydeals/" target="_blank"><img src="images/3.png"></a></li-->
                <!--li><a href="#"><img src="images/4.png"></a></li-->
                <li><a href="https://twitter.com/trademydeals" target="_blank"><img src="images/5.png"></a></li>
                <li><a href="https://www.youtube.com/channel/UCWAoWpc47OQft8IIr6sSFcQ" target="_blank"><img src="images/6.png"></a></li>
                <!--<p><span class="glyphicon glyphicon-envelope"></span></i>Email:info@cocarada.com</p>-->
            </div>


            <div class="col-xs-8 col-md-3 col-lg-3 ads-btns">
                <ul class="list-inline">
                    <li><a href="postad.php" class="btn btn-sm btn-success btn1">Post Ad Free</a></li>
                    <li><a href="postdeal.php" class="btn btn-sm btn-success btn2">Post Deal</a></li>
                </ul>
            </div>

            <?php

            $users=$_SESSION['user_name'];

            if($user == true && $isActive == 1)
            {?><!--<div class="col-lg-2">
                  <a href="membershipuser.php"><p><?php echo $users ?></p></a>
                  </div>-->
            <div class="col-xs-4 col-md-2 col-lg-2 header-signup">
                <ul class="list-inline pull-right">
                    <li><a href="dashboard.php">My Account</a></li>
                    <li>&nbsp;<span style="color:#FFF;">|</span>&nbsp;</li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <?php } else { ?>
                <div class="col-xs-4 col-md-3 col-lg-3 header-signup">
                    <ul class="list-inline">
                        <li><a href="signin.php">Log-in</a></li>
                        <li>&nbsp;<span style="color:#FFF;">|</span>&nbsp;</li>
                        <li><a href="signup.php">Signup</a></li>
                    </ul>
                </div>
            <?php } ?>

            <div class="col-xs-8 col-md-3 col-lg-3 def_location">
                <?php
                if(isset($_COOKIE['def_country_code']) && $_COOKIE['def_country_code'] != ''){
                    $def_country = $_COOKIE['def_country'];
                    $def_country_iso = $_COOKIE['def_country_code'];
                    $def_region = $_COOKIE['def_state'];
                    $def_city = $_COOKIE['def_city'];
                }else{
                    $def_country = $geoplugin->countryName;
                    $def_country_iso = $geoplugin->countryCode;
                    $def_region = $geoplugin->region;
                    $def_city = $geoplugin->city;
                }
                /*if($geoplugin->countryCode==$row_country['country_iso_code']){
                    $def_country = $row_country['country_name'];
                    $def_country_iso = $row_country['country_iso_code'];
                }*/

                ?>

                <div id="def_location" style="color:#fff; font-weight:bold;">
                    <img src="images/location.png" alt="Location" style="margin-right:10px;" />
                    <span id="location_text"><?php echo $def_country.', '.$def_region.', '.$def_city; ?></span>
                    <button type="button" class="btn btn-primary btn-lg btn-sm btn-success btn1" id="change_loc" data-toggle="modal" data-target="#myModal" style="margin-left:10px;">
                        Edit
                    </button>
                    <!--                    <input type="button" class="btn btn-sm btn-success btn1" id="change_loc" value="Edit" style="margin-left:10px;" />-->
                </div>
            </div>


            <!--div>
              <div id="google_translate_element" class="col-lg-3 pull-right"></div>
            </div-->

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

<div class="logo">
    <div class="container">
        <div class="col-md-12 col-lg-12">
            <div class="col-md-12 col-lg-6">
                <a href="http://trademydeals.com/"><img src="images/logo.png" class="img-responsive" ></a>
            </div>

        </div>

        <div class="col-md-12 col-lg-11">
            <form action="search.php" class="search-form" name="searchincat" id="searchincat" method="get" style="float:right;">
                <select name="search_category" id="search_category">
                    <option value="ads">Ads</option>
                    <option value="deals">Deals</option>
                    <option value="coupons">Coupons</option>
                    <option value="flyers">Flyers</option>
                    <option value="jobs">Jobs</option>
                    <option value="resumes">Resumes</option>
                </select>
                <input type="text" name="search_text" id="search_text" value="Search" style="padding-left:10px;" onFocus="if(this.value == 'Search'){this.value = ''}" onBlur="if(this.value == ''){this.value = 'Search'}" />
                <input type="submit" name="submit" id="submit" value="Search" class="btn btn-sm btn-success btn1" />
            </form>
        </div>
    </div>
</div>

<div class="menu" style="border-bottom:none;">
    <div class="container">
        <div class="col-md-12 col-lg-12">
            <div class="col-md-12 col-lg-12">
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
                                                <li><a href="deals.php?product=Apparel"><strong>Apparel</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Apparel'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="deals.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="deals.php?product=Automotive"><strong>Automotive</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Automotive'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="deals.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="deals.php?product=Beauty & Wellness"><strong>Beauty & Wellness</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Beauty & Wellness'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="deals.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="deals.php?product=Computers & Electronics"><strong>Computers & Electronics</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Computer & Electronics'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="deals.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="deals.php?product=Entertainment"><strong>Entertainment</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Entertainment'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="deals.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="deals.php?product=Financial Services"><strong>Financial Services</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Financial Services'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="deals.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="deals.php?product=Groceries"><strong>Groceries</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Groceries'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="deals.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="deals.php?product=Group Deals"><strong>Group Deals</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Group Deals'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="deals.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="deals.php?product=Home & Garden"><strong>Home & Garden</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Home & Garden'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="deals.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="deals.php?product=Kids & Babies"><strong>Kids & Babies</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Kids & Babies'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="deals.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>                    </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="deals.php?product=Restaurants"><strong>Restaurants</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Restaurants'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="deals.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>                           <li class="divider"></li>
                                                <li><a href="deals.php?product=Small Business"><strong>Small Business</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Small Business'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="deals.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="deals.php?product=Sports & Business"><strong>Sports & Business</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Sports & Business'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="deals.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="deals.php?product=Travel"><strong>Travel</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='1' AND `sub_menu_category`='Travel'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="deals.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
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
                                                <li><a href="coupons.php?product=Apparel"><strong>Apparel</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Apparel'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="coupons.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="coupons.php?product=Automotive"><strong>Automotive</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Automotive'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="coupons.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="coupons.php?product=Beauty & Wellness"><strong>Beauty & Wellness</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Beauty & Wellness'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="coupons.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="coupons.php?product=Computers & Electronics"><strong>Computers & Electronics</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Computer & Electronics'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="coupons.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="coupons.php?product=Entertainment"><strong>Entertainment</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Entertainment'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="coupons.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="coupons.php?product=Financial Services"><strong>Financial Services</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Financial Services'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="coupons.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="coupons.php?product=Groceries"><strong>Groceries</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Automotive'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="coupons.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="coupons.php?product=Group Deals"><strong>Group Deals</strong></a></li>
                                                <li class="divider"></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Automotive'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="coupons.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="coupons.php?product=Kids & Babies"><strong>Kids & Babies</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Kids & Babies'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="coupons.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="coupons.php?product=Restaurants"><strong>Restaurants</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Restaurants'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="coupons.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="coupons.php?product=Small Business"><strong>Small Business</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Small Business'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="coupons.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="coupons.php?product=Sports & Business"><strong>Sports & Business</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Sports & Business'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="coupons.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="coupons.php?product=Travel"><strong>Travel</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Travel'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="coupons.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
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
                                <ul class="dropdown-menu multi-column columns-5" >
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="flyers.php?product=Apparel"><strong>Apparel</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Apparel'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="flyers.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="flyers.php?product=Automotive"><strong>Automotive</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Automotive'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="flyers.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="flyers.php?product=Beauty & Wellness"><strong>Beauty & Wellness</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Beauty & Wellness'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="flyers.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="flyers.php?product=Computers & Electronics"><strong>Computers & Electronics</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Computer & Electronics'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="flyers.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="flyers.php?product=Entertainment"><strong>Entertainment</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Entertainment'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="flyers.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="flyers.php?product=Financial Services"><strong>Financial Services</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Financial Services'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="flyers.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="flyers.php?product=Groceries"><strong>Groceries</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Automotive'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="flyers.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="flyers.php?product=Group Deals"><strong>Group Deals</strong></a></li>
                                                <li class="divider"></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Automotive'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="flyers.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="flyers.php?product=Kids & Babies"><strong>Kids & Babies</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Kids & Babies'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="flyers.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="flyers.php?product=Restaurants"><strong>Restaurants</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Restaurants'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="flyers.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="flyers.php?product=Small Business"><strong>Small Business</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Small Business'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="flyers.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="flyers.php?product=Sports & Business"><strong>Sports & Business</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Sports & Business'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="flyers.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="flyers.php?product=Travel"><strong>Travel</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='2' AND `sub_menu_category`='Travel'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="flyers.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                    </div>
                                </ul>
                                <!--                                <ul class="dropdown-menu multi-column columns-5">-->
                                <!--                                    <div class="row">-->
                                <!--                                        <div class="col-sm-2">-->
                                <!--                                            <ul class="multi-column-dropdown">-->
                                <!--                                                <li><a href="ads.php?product=Buy Sell"><strong style="color:#FFCC66">Buy & Sell </strong></a></li>-->
                                <!--                                                --><?php
                                //                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id	 FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category`='Buy Sell'");
                                //                                                while ($row = mysql_fetch_array($sql)) {?>
                                <!--                                                    <li><a href="flyers.php?product=--><?php //echo $row['sub_menu_category_item'];?><!--&id=--><?php //echo $row['sub_menu_id'];?><!--">--><?php //echo $row['sub_menu_category_item'];?><!--</a></li>-->
                                <!--                                                    --><?php
                                //                                                }
                                //                                                ?><!--               </ul>-->
                                <!--                                        </div>-->
                                <!--                                        <div class="col-sm-2">-->
                                <!--                                            <ul class="multi-column-dropdown">-->
                                <!--                                                <li><a href="flyers.php?product=Cars & Vehicles"><strong style="color:#FFCC66">Cars & Vehicles</strong> </a></li>-->
                                <!--                                                --><?php
                                //                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category`='Cars & Vehicles'");
                                //                                                while ($row = mysql_fetch_array($sql)) {?>
                                <!--                                                    <li><a href="flyers.php?product=--><?php //echo $row['sub_menu_category_item'];?><!--&id=--><?php //echo $row['sub_menu_id'];?><!--">--><?php //echo $row['sub_menu_category_item'];?><!--</a></li>-->
                                <!--                                                    --><?php
                                //                                                }
                                //                                                ?>
                                <!--                                                <li><a href="ads.php?product=Services"><strong style="color:#FFCC66">Services</strong></a></li>-->
                                <!--                                                --><?php
                                //                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category`='Services'");
                                //                                                while ($row = mysql_fetch_array($sql)) {?>
                                <!--                                                    <li><a href="flyers.php?product=--><?php //echo $row['sub_menu_category_item'];?><!--&id=--><?php //echo $row['sub_menu_id'];?><!--">--><?php //echo $row['sub_menu_category_item'];?><!--</a></li>-->
                                <!--                                                    --><?php
                                //                                                }
                                //                                                ?>
                                <!--                                            </ul>-->
                                <!--                                        </div>-->
                                <!--                                        <div class="col-sm-2">-->
                                <!--                                            <ul class="multi-column-dropdown">-->
                                <!--                                                <li><a href="flyers.php?product=PETS"><strong style="color:#FFCC66">PETS</strong> </a></li>-->
                                <!--                                                --><?php
                                //                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category`='Pets'");
                                //                                                while ($row = mysql_fetch_array($sql)) {?>
                                <!--                                                    <li><a href="flyers.php?product=--><?php //echo $row['sub_menu_category_item'];?><!--&id=--><?php //echo $row['sub_menu_id'];?><!--">--><?php //echo $row['sub_menu_category_item'];?><!--</a></li>-->
                                <!--                                                    --><?php
                                //                                                }
                                //                                                ?>
                                <!--                                            </ul>-->
                                <!--                                        </div>-->
                                <!--                                        <div class="col-sm-2">-->
                                <!--                                            <ul class="multi-column-dropdown">-->
                                <!--                                                <li><a href="flyers.php?product=--><?php //echo $row['sub_menu_category_item'];?><!--"><strong style="color:#FFCC66">REAL & ESTATE</strong> </a></li>-->
                                <!--                                                <li><a href="flyers.php?product=for rent"><strong style="color:#000; font-size:10px;">For Rent</strong></a></li>-->
                                <!--                                                --><?php
                                //                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category1`='for rent'");
                                //                                                while ($row = mysql_fetch_array($sql)) {?>
                                <!--                                                    <li><a href="flyers.php?product=--><?php //echo $row['sub_menu_category_item'];?><!--&id=--><?php //echo $row['sub_menu_id'];?><!--">--><?php //echo $row['sub_menu_category_item'];?><!--</a></li>-->
                                <!--                                                    --><?php
                                //                                                }
                                //                                                ?>
                                <!--                                                <li><a href="ads.php?product=for sale"><strong style="color:#000; font-size:10px;">For Sale</strong></a></li>-->
                                <!--                                                --><?php
                                //                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category1`='for sale'");
                                //                                                while ($row = mysql_fetch_array($sql)) {?>
                                <!--                                                    <li><a href="flyers.php?product=--><?php //echo $row['sub_menu_category_item'];?><!--&id=--><?php //echo $row['sub_menu_id'];?><!--">--><?php //echo $row['sub_menu_category_item'];?><!--</a></li>-->
                                <!--                                                    --><?php
                                //                                                }
                                //                                                ?>
                                <!--                                                <li><a href="ads.php?product=other"><strong style="color:#000; font-size:10px;">Other</strong></a></li>-->
                                <!--                                                --><?php
                                //                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category1`='other'");
                                //                                                while ($row = mysql_fetch_array($sql)) {?>
                                <!--                                                    <li><a href="flyers.php?product=--><?php //echo $row['sub_menu_category_item'];?><!--&id=--><?php //echo $row['sub_menu_id'];?><!--">--><?php //echo $row['sub_menu_category_item'];?><!--</a></li>-->
                                <!--                                                    --><?php
                                //                                                }
                                //                                                ?>
                                <!--                                            </ul>-->
                                <!--                                        </div>-->
                                <!--                                        <div class="col-sm-2">-->
                                <!--                                            <ul class="multi-column-dropdown">-->
                                <!--                                                <li><a href="ads.php?product=COMMUNITY"><strong style="color:#FFCC66">COMMUNITY</strong> </a></li>-->
                                <!--                                                --><?php
                                //                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category`='COMMUNITY'");
                                //                                                while ($row = mysql_fetch_array($sql)) {?>
                                <!--                                                    <li><a href="flyers.php?product=--><?php //echo $row['sub_menu_category_item'];?><!--&id=--><?php //echo $row['sub_menu_id'];?><!--">--><?php //echo $row['sub_menu_category_item'];?><!--</a></li>-->
                                <!--                                                    --><?php
                                //                                                }
                                //                                                ?>
                                <!--                                            </ul>-->
                                <!--                                        </div>-->
                                <!--                                        <div class="col-sm-2">-->
                                <!--                                            <ul class="multi-column-dropdown">-->
                                <!--                                                <li><a href="#"><strong style="color:#FFCC66; margin-left:-35px;">VACATION&nbsp;RENTAL</strong> </a></li>-->
                                <!--                                                <select class="form-control">-->
                                <!--                                                    <option value="select country">Select&nbsp;country</option>-->
                                <!--                                                    <option value="select country">Select&nbsp;country</option>-->
                                <!--                                                </select>-->
                                <!--                                            </ul>-->
                                <!--                                        </div>-->
                                <!--                                    </div>-->
                                <!--                                </ul>-->

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
                                                <li><a href="ads.php?product=Buy Sell"><strong style="color:#FFCC66">Buy & Sell </strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id	 FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category`='Buy Sell'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="ads.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>               </ul>
                                        </div>
                                        <div class="col-sm-2">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="ads.php?product=Cars & Vehicles"><strong style="color:#FFCC66">Cars & Vehicles</strong> </a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category`='Cars & Vehicles'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="ads.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li><a href="ads.php?product=Services"><strong style="color:#FFCC66">Services</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category`='Services'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="ads.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col-sm-2">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="ads.php?product=PETS"><strong style="color:#FFCC66">PETS</strong> </a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category`='Pets'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="ads.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col-sm-2">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="ads.php?product=<?php echo $row['sub_menu_category_item'];?>"><strong style="color:#FFCC66">REAL & ESTATE</strong> </a></li>
                                                <li><a href="ads.php?product=for rent"><strong style="color:#000; font-size:10px;">For Rent</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category1`='for rent'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="ads.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li><a href="ads.php?product=for sale"><strong style="color:#000; font-size:10px;">For Sale</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category1`='for sale'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="ads.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                                <li><a href="ads.php?product=other"><strong style="color:#000; font-size:10px;">Other</strong></a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category1`='other'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="ads.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col-sm-2">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="ads.php?product=COMMUNITY"><strong style="color:#FFCC66">COMMUNITY</strong> </a></li>
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='4' AND `sub_menu_category`='COMMUNITY'");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="ads.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
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
                                        <div class="col-sm-3" style="width:35%;">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='5' limit 0,9 ");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="jobs.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                        <div class="col-sm-3" style="width:35%;">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='5'  limit 9 , 20 ");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="jobs.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
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
                                        <div class="col-sm-3" style="width:35%;">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='6' limit 0,9 ");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="resumes.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                        <div class="col-sm-3" style="width:35%;">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                $sql=  mysql_query("SELECT sub_menu_category_item,sub_menu_id FROM `tbl_sub_menu` WHERE `main_menu_id`='6'  limit 9 , 20 ");
                                                while ($row = mysql_fetch_array($sql)) {?>
                                                    <li><a href="resumes.php?product=<?php echo $row['sub_menu_category_item'];?>&id=<?php echo $row['sub_menu_id'];?>"><?php echo $row['sub_menu_category_item'];?></a></li>
                                                    <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                    </div>
                                </ul>
                            </li> <?php
                            /*if($page=='membership'){ ?>
                                 <li class="active"><a href="membership1.php">Membership</a></li><?php }
                                else { ?><li ><a href="membership1.php">Membership</a></li> <?php }*/ ?>
                        </ul>
                    </div>
                    <!--/.navbar-collapse-->
                </nav>
            </div>
        </div>
    </div>

</div>
</div>
