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
<script>
function initialize()
{
  var mapProp = {
    center: new google.maps.LatLng(51.508742,-0.120850),
    zoom:7,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}

function loadScript()
{
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false&callback=initialize";
  document.body.appendChild(script);
}

window.onload = loadScript;
</script>
  </head>
  <body>
   	<div class="header">
    	<div class="container">
        	<div class="col-lg-12">
            	<div class="col-lg-3">
                	<p><span class="glyphicon glyphicon-envelope"></span></i>Email:info@cocarada.com</p>
                </div>
                <div class="col-lg-3">
                	<p><span class="glyphicon glyphicon-phone-alt"></span>Phone:+91 81001 55234</p>
                </div>
                <div class="col-lg-3">
                	<p>Login:Sign in</p>
                </div>
                <div class="col-lg-3">
                	<div class="col-lg-12">
                        <li><a href="#"><img src="images/1.png"></a></li>
                        <li><a href="#"><img src="images/2.png"></a></li>
                        <li><a href="#"><img src="images/3.png"></a></li>
                        <li><a href="#"><img src="images/4.png"></a></li>
                        <li><a href="#"><img src="images/5.png"></a></li>
                        <li><a href="#"><img src="images/6.png"></a></li>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="logo">
    	<div class="container">
    	<div class="col-lg-12">
        	<div class="col-lg-9">
            	<img src="images/logo.png" class="img-responsive" >
            </div>
            <div class="col-lg-3">
            	<div class="col-lg-12">
                	<div class="col-lg-6">
                    	<button type="button" class="btn btn-sm btn-success btn1">Post Ad Free</button>
                    </div>
                    <div class="col-lg-6">
                    	<button type="button" class="btn btn-sm btn-success btn2">Post Deal</button>
                    </div>
                </div>
                <div class="col-lg-12">
                
                	<div class="input-group">
                      <input type="text" class="form-control" style="padding:5px;">
                      <span class="input-group-addon" style="margin-left:10px;"><span class="glyphicon glyphicon-search"></span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="menu" style="border:none;">
    	<div class="container">
        <div class="col-lg-12">
      	<div class="col-lg-12">
    	 <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="deals.php">Deals</a></li>
               <li class="dropdown">
	            <a href="coupons.php" class="dropdown-toggle" data-hover="dropdown">Coupons <b class="caret"></b></a>
	            <ul class="dropdown-menu multi-column columns-4" >
		            <div class="row">
			            <div class="col-sm-3">
				            <ul class="multi-column-dropdown">
					            <li><a href="#"><strong>Apparel</strong></a></li>
                              	<li><a href="#">Baby Apparel</a></li>
					            <li><a href="#">Childern`s Apparel</a></li>
					            <li><a href="#">Men`s Apparel</a></li>
					            <li><a href="#">Women`s Apparel</a></li>
                               <li class="divider"></li>
                                 <li><a href="#"><strong>Automotive</strong></a></li>
					            <li><a href="#">Auto Parts & Accessories</a></li>
					            <li><a href="#">Auto Services</a></li>
					            <li><a href="#">Other</a></li>
                               <li class="divider"></li>
                                <li><a href="#"><strong>Beauty & Wellness</strong></a></li>
					            <li><a href="#">Beauty Supplies & Personal Care</a></li>
					            <li><a href="#">Salon & Spa</a></li>
					            <li><a href="#">Other</a></li>
					          
				            </ul>
			            </div>
			            <div class="col-sm-3">
				             <ul class="multi-column-dropdown">
					            <li><a href="#"><strong>Computers & Electronics</strong></a></li>
                              	<li><a href="#">Cameras</a></li>
					            <li><a href="#">Computers & Tablets/eReaders</a></li>
					            <li><a href="#">Home Theatre / Audio</a></li>
                                 <li><a href="#">Peripherals / Accessories</a></li>
					            <li><a href="#">Televisions</a></li>
                                <li><a href="#">Video Games</a></li>
					            <li><a href="#">Other</a></li>
                               <li class="divider"></li>
                                 <li><a href="#"><strong>Entertainment</strong></a></li>
					            <li><a href="#">BooksMusic ,& Accessories</a></li>
					            <li><a href="#">Events & Attractions</a></li>
					            <li><a href="#">Video Games</a></li>
					            <li><a href="#">Other</a></li>
                               <li class="divider"></li>
                                <li><a href="#"><strong>Financial Services</strong></a></li>
				            </ul>
			            </div>
                         <div class="col-sm-3">
				            <ul class="multi-column-dropdown">
					            <li><a href="#"><strong>Groceries</strong></a></li>
                               <li class="divider"></li>
					            <li><a href="#"><strong>Group Deals</strong></a></li>
                                <li class="divider"></li>
					             <li><a href="#"><strong>Home & Garden</strong></a></li>
					            <li><a href="#">Appliance</a></li>
					            <li><a href="#">Furniture</a></li>
                                 <li><a href="#">Home Decor</a></li>
					            <li><a href="#">Home Improvement & Tools</a></li>
					            <li><a href="#">Home Services & Repairs</a></li>
                                <li><a href="#">Office Supplies</a></li>
					            <li><a href="#">Off Doors & Patio</a></li>
                                <li><a href="#">Pets</a></li>
					            <li><a href="#">Other</a></li>
                               <li class="divider"></li>
                                 <li><a href="#"><strong>Kids & Babies</strong></a></li>
					            <li><a href="#">Baby Apparel</a></li>
					            <li><a href="#">Baby Needs</a></li>
					             <li><a href="#">Children`s Apparel</a></li>
                                 <li><a href="#">School Supplies</a></li>
					            <li><a href="#">Toys & Games</a></li>
					            <li><a href="#">Other</a></li>
				            </ul>
			            </div>
			            <div class="col-sm-3">
				            <ul class="multi-column-dropdown">
					            <li><a href="#"><strong>Restaurants</strong></a></li>
					            <li><a href="#">Coffees & Desserts</a></li>
                                <li><a href="#">Fast Food</a></li>
					            <li><a href="#">Restaurants & Bars</a></li>
                              
					            <li class="divider"></li>
					           	<li><a href="#"><strong>Small Business</strong></a></li>
					            <li><a href="#">Furniture</a></li>
                                <li><a href="#">Office Supplies</a></li>
					            <li><a href="#">Services</a></li>
					            <li class="divider"></li>
                                <li><a href="#"><strong>Sports & Business</strong></a></li>
					            <li><a href="#">Clothing Accessories</a></li>
                                <li><a href="#">Equipment</a></li>
					            <li><a href="#">Gyms & Related Service</a></li>
                              
					            <li class="divider"></li>
                                 <li><a href="#"><strong>Travel</strong></a></li>
					            <li><a href="#">Car Rentals</a></li>
                                <li><a href="#">Events & Attractions</a></li>
					            <li><a href="#">Flights</a></li>
                                <li><a href="#">Hotels</a></li>
                                 <li><a href="#">Rail & Bus</a></li>
					           
				            </ul>
			            </div>
		            </div>
	            </ul>
	        </li>
               <li class="dropdown">
	            <a href="flyers.php" class="dropdown-toggle" data-hover="dropdown">Flyers <b class="caret"></b></a>
	            <ul class="dropdown-menu multi-column columns-4">
		            <div class="row">
			            <div class="col-sm-3">
				            <ul class="multi-column-dropdown">
					            <li><a href="#">Apparel</a></li>
					            <li><a href="#">Automotive</a></li>
					            <li><a href="#">Beauty & Wellness</a></li>
					          
				            </ul>
			            </div>
			            <div class="col-sm-3">
				            <ul class="multi-column-dropdown">
					            <li><a href="#">Computer & Electronics</a></li>
					            <li><a href="#">Entertainment</a></li>
					            <li><a href="#">Groceries</a></li>
					           
				            </ul>
			            </div>
			            <div class="col-sm-3">
				            <ul class="multi-column-dropdown">
					            <li><a href="#">Home & Garden</a></li>
					            <li><a href="#">Kids & Babies</a></li>
					            <li><a href="#">Small Business</a></li>
					           
				            </ul>
			            </div>
                         <div class="col-sm-3">
				            <ul class="multi-column-dropdown">
					            <li><a href="#">Sports & Fitness</a></li>
					           
				            </ul>
			            </div>
		            </div>
	            </ul>
	        </li>
              <li  class="active"><a href="ads.php">Ads</a></li>   
               <li class="dropdown">
	            <a href="jobs.php" class="dropdown-toggle"  data-hover="dropdown">Jobs <b class="caret"></b></a>
	            <ul class="dropdown-menu multi-column columns-2">
		            <div class="row">
			            <div class="col-sm-6">
				            <ul class="multi-column-dropdown">
					            <li><a href="#">Programmer,computer</a></li>
					            <li><a href="#">Child Care</a></li>
					            <li><a href="#">bar,food,hospitality</a></li>
                                <li><a href="#">Cleaning,housekeeper</a></li>
					            <li><a href="#">Construction,trades</a></li>
					            <li><a href="#">Customer Service</a></li>
                                <li><a href="#">driver,security</a></li>
					            <li><a href="#">general labour</a></li>
					            
				            </ul>
			            </div>
			            <div class="col-sm-6">
				            <ul class="multi-column-dropdown">
					            <li><a href="#">graphic,web design</a></li>
					            <li><a href="#">health care</a></li>
					            <li><a href="#">hail stylist,salon</a></li>
					            <li><a href="#">office&nbsp;mqr,receptionlist</a></li>
					            <li><a href="#">Part time,students</a></li>
                                 <li><a href="#">accounting,mgmt</a></li>
					            <li><a href="#">sales,retail sales</a></li>
					            <li><a href="#">tv,media,fashion</a></li>
					            <li><a href="#">other</a></li>
				            </ul>
			            </div>
			          
		            </div>
	            </ul>
	        </li><li class="dropdown">
	            <a href="resumes.php"   data-hover="dropdown">Resumes<b class="caret"></b></a>
	           <ul class="dropdown-menu multi-column columns-2">
		            <div class="row">
			            <div class="col-sm-6">
				            <ul class="multi-column-dropdown">
					            <li><a href="#">Construction,trades</a></li>
					            <li><a href="#">Customer&nbsp;services</a></li>
					            <li><a href="#">general labour</a></li>
                                <li><a href="#">accounting,mgmt</a></li>
					            <li><a href="#">Child Care</a></li>
					            <li><a href="#">bar,food,hospitality</a></li>
                                <li><a href="#">Cleaning,housekeeper</a></li>
					            <li><a href="#">Child Care</a></li>
					            
				            </ul>
			            </div>
			            <div class="col-sm-6">
				            <ul class="multi-column-dropdown">
                            	<li><a href="#">Construction,trades</a></li>
                                <li><a href="#">driver,security</a></li>
                                <li><a href="#">general labour</a></li>
					            <li><a href="#">graphic,web design</a></li>
					            <li><a href="#">hail stylist,salon</a></li>
					            <li><a href="#">office&nbsp;mqr,receptionlist</a></li>
					            <li><a href="#">Part time,students</a></li>
                                 <li><a href="#">programmers,computers</a></li>
					            <li><a href="#">sales,retail sales</a></li>
					            <li><a href="#">tv,media,fashion</a></li>
					            <li><a href="#">other</a></li>
				            </ul>
			            </div>
			          
		            </div>
	            </ul>
	        </li><li><a href="#">Membership</a></li>
             
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </div>
    </div>
    </div>
    </div>

    </div>
    </div>
   	<div class="content">
    	<div class="container">
        	<div class="col-lg-12">
            	
                	<div class="col-lg-9 ads">
                    	<h4 style="color:#CC0000;">Ad Name
                        <a href="ads1.php"><button type="button" class="btn  btn-danger pull-right">Get the Details</button></a></h4>
                        <p style="border-bottom:#CC0000 solid 2px; font-size:9px;">Total views:8</p>
                        	<li>Posted auguest 12,2014 @5.30pm</li>
                            <li>Posted auguest 12,2014 @5.30pm</li>
                            <li>Posted auguest 12,2014 @5.30pm</li>
                        <div class="col-lg-5 " style="margin-top:10px;"><br>
                        	<img src="images/bag.PNG" class="img-responsive">
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-6"><br>
                        	<p style="margin-left:30px;"><span class="glyphicon glyphicon-globe" style="margin-right:10px;"></span>Website:&nbsp;www.websitename.com</p>
                            <p style="margin-left:30px;"><span class="glyphicon glyphicon-phone-alt" style="margin-right:10px;"></span>Phone:&nbsp;+91 99999918989</p>
                            <p style="margin-left:30px;"><span class="glyphicon glyphicon-envelope" style="margin-right:10px;"></span>Email:&nbsp;info@websitesame.com</p>
                            <p style="margin-left:30px;"><span class="glyphicon glyphicon-home" style="margin-right:10px;"></span>Location:&nbsp;ottaca, Canda</p>			<p style="margin-left:40px;"><a href="#"><button type="button" class="btn btn-default btn-sm" style="background:#ccc; color:#fff">Direction</button></a>&nbsp;&nbsp;<a href="#"><button type="button" class="btn btn-default btn-sm" style="background:#ccc;color:#fff">More info</button></a></p>
                        </div>
                        <div class="col-lg-12">
                        <p><a href="#">Description</a>Dropdowns are automatically positioned via CSS within the normal flow of the document. This means dropdowns may be cropped by parents with certain overflow properties or appear out of bounds of the viewport. Address these issues on your own as they arise.</p>
                        <p style="margin-left:40px;"><a href="#"><button type="button" class="btn btn-default btn-sm" style="background:#ccc; color:#fff"><i class="fa fa-facebook"></i>&nbsp;Share</button></a>&nbsp;&nbsp;<a href="#"><button type="button" class="btn btn-default btn-sm" style="background:#ccc;color:#fff">More info</button></a>&nbsp;&nbsp;<a href="#"><button type="button" class="btn btn-default btn-sm" style="background:#ccc; color:#fff">Direction</button></a>&nbsp;&nbsp;<a href="#"><button type="button" class="btn btn-default btn-sm" style="background:#ccc;color:#fff">More info</button></a></p>
                        </div>
                        <div class="col-lg-12">
                        	<div class="sub1" style="background:#3399FF; border:#3399ff solid 1px; border-radius:0px;">
                    			<h4>Add Details</h4>
                   			 </div>
                             <p style="font-size:11px; margin-bottom:10px;">less 5% dealon filpcart with sales deals</p>    
                        </div>
                        <div class="col-lg-12">
                        <div id="googleMap" style="height:260px;"></div>
                        </div>
                        <div class="col-lg-12" style=" margin-top:20px;">
                	<div class="sub1 col-lg-12" style="background:#FFCC33; border:#FFCC33 solid 1px; border-radius:0px;">
                    	<h4>Hot deals</h4>
                    </div>
                    <div class="col-lg-12" >
                    	<div class="col-lg-4">
                        	<div class="content2" style="margin-top:10px;">
                                    	<img src="images/Tv.png" class="img-responsive">
                                       <a><h3>Ad Name</h3></a>
                                        <p>etre5yrtrty destry seytarey sytryu asetre dfytr saytey fdgrey rytrt</p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                                    </div>
                        </div>
                        <div class="col-lg-4">
                        	<div class="content2" style="margin-top:10px;">
                                    	<img src="images/Tv.png" class="img-responsive">
                                       <a><h3>Ad Name</h3></a>
                                        <p>etre5yrtrty destry seytarey sytryu asetre dfytr saytey fdgrey rytrt</p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                                    </div>
                        </div>
                        <div class="col-lg-4">
                        	<div class="content2" style="margin-top:10px;">
                                    	<img src="images/Tv.png" class="img-responsive">
                                       <a><h3>Ad Name</h3></a>
                                        <p>etre5yrtrty destry seytarey sytryu asetre dfytr saytey fdgrey rytrt</p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                                    </div>
                        </div>
                    </div>
                	
                </div>
                    </div>
                    
                    <div class="col-lg-3">
                    	<img src="images/sony.png" class="img-responsive" style="margin-top:5px; ">
                    <img src="images/revlon.png"  class="img-responsive" style="margin-top:5px;">
                    </div>
                </div>
        </div>
    </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>