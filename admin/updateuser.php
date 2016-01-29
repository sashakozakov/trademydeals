<?php
include('header.php');
$pid=$_GET['id'];
$product=$_GET['product'];
$uid=$_GET['uid'];
$select=mysql_query("SELECT * FROM $product WHERE id='$pid'");
$change=mysql_fetch_array($select);
?>
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- add "navbar-no-scroll" class to disable the scrolling of the sidebar menu -->
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				
				<li class="start active ">
					<a href="index.php">
						<i class="fa fa-home"></i>
						<span class="title">
							Dashboard
						</span>
						<span class="selected">
						</span>
					</a>
				</li>
				<li>
					<a href="javascript:;">
						<i class="fa fa-shopping-cart"></i>
						<span class="title">
							User Account
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="account.php">
								<i class="fa fa-bullhorn"></i>
								Account
							</a>
						</li>
						<li>
							<a href="newaccount.php">
								<i class="fa fa-shopping-cart"></i>
								New Account
							</a>
						</li>
						<li>
							<a href="deleteaccount.php">
								<i class="fa fa-tags"></i>
								Delete Account
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
						<i class="fa fa-cogs"></i>
						<span class="title">
							Category
						</span>
						<span class="arrow ">
						</span>
					</a>
				<ul class="sub-menu">
						<li>
							<a href="dealscategory.php?main_menu_id=<?php echo '1'; ?>">
								 Deals Category
							</a>
						</li>
						<li>
							<a href="couponcategory.php?main_menu_id=<?php echo '2'; ?>">
								Coupon Category
							</a>
						</li>
						<li>
							<a href="adscategory.php?main_menu_id=<?php echo '4'; ?>">
								 Ads Category
							</a>
						</li>
						<li>
							<a href="othercategory.php?main_menu_id1=<?php echo '3'; ?>&main_menu_id2=<?php echo '5'; ?>&main_menu_id3=<?php echo '6'; ?>">
								Other Category
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
						<i class="fa fa-bookmark-o"></i>
						<span class="title">
							Membership
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="free membership.php">
								 Free
							</a>
						</li>
						<li>
							<a href="promembership.php">
								Pro
							</a>
						</li>
						<li>
							<a href="goldmembership.php">
								Gold
							</a>
						</li>
						
					</ul>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						View Account Details
					</h3>
					
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row profile">
				<div class="col-md-12">
					<!--BEGIN TABS-->
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_1" data-toggle="tab">
									Edit
								</a>
							</li>
							
						</ul><form action="product.php?product=<?php echo $product; ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">

						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
                           <input type="hidden" name="pid" value="<?php echo $pid; ?> " />
  <input type="hidden" name="product" value="<?php echo $product; ?> " />
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Product Name</label>
    <div class="col-sm-6"><?php if($product=='deals') {?>
      <input type="text" value="<?php echo $change['deals_title']; ?>"  class="form-control" name="title" id="inputPassword" placeholder="Product name">
    <?php }  elseif($product=='coupons') {?>
      <input type="text" value="<?php echo $change['coupon']; ?>"  class="form-control" name="title" id="inputPassword" placeholder="Product name">
    <?php }  elseif($product=='flyers') {?>
      <input type="text" value="<?php echo $change['flyers_title']; ?>"  class="form-control" name="title" id="inputPassword" placeholder="Product name">
    <?php }  elseif($product=='ads') {?>
      <input type="text" value="<?php echo $change['ads_title']; ?>"  class="form-control" name="title" id="inputPassword" placeholder="Product name">
    <?php }  elseif($product=='jobs') {?>
      <input type="text" value="<?php echo $change['jobs_title']; ?>"  class="form-control" name="title" id="inputPassword" placeholder="Product name">
    <?php }  else {?>
      <input type="text" value="<?php echo $change['resumes_title']; ?>"  class="form-control" name="title" id="inputPassword" placeholder="Product name">
    <?php } ?>

   </div>
    <div class="col-sm-4">
    </div>
  </div>

 
  
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-6">
    	
      <textarea type="text"  class="form-control" name="description" id="inputPassword" placeholder="Description"><?php echo $change['description']; ?></textarea>
    </div>
    <div class="col-sm-4">
    </div>
  </div>


  
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Country</label>
    <div class="col-sm-6">
      <input type="text" value="<?php echo $change['country']; ?>"  class="form-control" name="country" id="inputPassword" placeholder="country">
    </div>
    <div class="col-sm-4">
    </div>
  </div>


  
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">State</label>
    <div class="col-sm-6">
      <input type="text" value="<?php echo $change['state']; ?>"  class="form-control" name="state" id="inputPassword" placeholder="State">
    </div>
    <div class="col-sm-4">
    </div>
  </div>


  
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Phone</label>
    <div class="col-sm-6">
      <input type="text" value="<?php echo $change['city_your']; ?>"  class="form-control" name="phone" id="inputPassword" placeholder="Phone">
    </div>
    <div class="col-sm-4">
    </div>
  </div>


  
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-6">
      <input type="text" value="<?php echo $change['postalcode_your']; ?>"  class="form-control" name="email" id="inputPassword" placeholder="Email">
    </div>
    <div class="col-sm-4">
    </div>
  </div>

  
  
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Website link</label>
    <div class="col-sm-6">
      <input type="text" value="<?php echo $change['websitelink']; ?>"  class="form-control" name="websitelink" id="inputPassword" placeholder="websitelinks">
    </div>
    <div class="col-sm-4">
    </div>
  </div>


  
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Youtube</label>
    <div class="col-sm-6">
      <input type="text" value="<?php echo $change['youtube']; ?>"  class="form-control" name="youtube" id="inputPassword" placeholder="youtube">
    </div>
    <div class="col-sm-4">
    </div>
  </div>


  
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Logo Image</label>
    <div class="col-sm-6">
     <div class="col-lg-12">
     <div class="col-lg-6"><?php if($product=='deals') {?>
      <input type="text" value="<?php echo $change['deals_images']; ?>"  class="form-control" >
    <?php }  elseif($product=='coupons') {?>
      <input type="text" value="<?php echo $change['coupons_images']; ?>"  class="form-control" >
    <?php }  elseif($product=='flyers') {?>
      <input type="text" value="<?php echo $change['flyers_images']; ?>"  class="form-control" >
    <?php }  elseif($product=='ads') {?>
      <input type="text" value="<?php echo $change['ads_images']; ?>"  class="form-control" >
    <?php }  elseif($product=='jobs') {?>
      <input type="text" value="<?php echo $change['jobs_images']; ?>"  class="form-control" >
    <?php }  else {?>
      <input type="text" value="<?php echo $change['resumes_images']; ?>"  class="form-control" >
    <?php } ?>
     
     </div>
      <div class="col-lg-6">
      <input type="file" name="file2" ></div>
      </div>
    </div>
    <div class="col-sm-4">
    </div>
  </div>


  
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label"><?php echo $product; ?> Image</label>
    <div class="col-sm-6">
     <div class="col-lg-12">
     <div class="col-lg-6">
      <input type="text" value="<?php echo $change['images']; ?>"  class="form-control" name="" id="inputPassword" placeholder=""></div>
      <div class="col-lg-6">
      <input type="file" name="file" ></div>
      </div>
    </div>
    <div class="col-sm-4">
    </div>
  </div>



  
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Time</label>
    <div class="col-sm-6">
      <input type="text" value="<?php echo $change['date_time']; ?>"  class="form-control" name="date" id="inputPassword" placeholder="Time">
    </div>
    <div class="col-sm-4">
    </div>
  </div>


  
  

                          
                           
                            <div class="col-lg-12">
                            <div class="col-lg-6" style="text-align:center;">
                           <button type="submit" class="btn green btn-sm">Update</button>
                            </div>
                            <div class="col-lg-6">
                            <button type="reset" class="btn green btn-sm">Cancel</button>
                            </div>
                           
                            </div>
								</div>
							</form>
						</div>
					</div>
					<!--END TABS-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.min.js" type="text/javascript"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="js/core/app.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {    
   App.init();
   MapsGoogle.init();
});
</script>

<!-- END BODY -->
</html>