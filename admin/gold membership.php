<?php
include('header.php');
$member=mysql_query("SELECT * FROM `admin_membership` WHERE status='Gold Membership' ");
$membership=mysql_fetch_array($member);
 ?>
<!-- BEGIN CONTAINER -->
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
						Gold Membership Details
					</h3>
					
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<form role="form" action="gold.php" method="post">
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_1" data-toggle="tab">
									Ads
								</a>
							</li>
							<li>
								<a href="#tab_1_3" data-toggle="tab">
									Deals
								</a>
							</li>
							<li>
								<a href="#tab_1_4" data-toggle="tab">
									Coupon
								</a>
							</li>
							<li>
								<a href="#tab_1_6" data-toggle="tab">
									 Flyer
								</a>
							</li>
                            <li>
								<a href="#tab_1_7" data-toggle="tab">
									Jobs
								</a>
							</li>
                            <li>
								<a href="#tab_1_8" data-toggle="tab">
									Resumes
								</a>
							</li>
						</ul>
						<div class="tab-content">
							
							<div class="tab-pane active" id="tab_1_1">
                            	<div class="row">
                                	<div class="col-md-2"></div>
                                    <div class="col-md-4">
										
													<div class="form-group">
														<label class="control-label">Home Page Gallery Ad</label>
														<input type="text" name="homepage_ads" value="<?php echo $membership['homepage_ads']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Top Ad</label>
														<input type="text" name="top_ads"value="<?php echo $membership['top_ads']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Highlighted Ad</label>
														<input type="text" name="highlighted_ads" value="<?php echo $membership['highlighted_ads']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Sidebar Ad</label>
														<input type="text" name="sidebar_ads" value="<?php echo $membership['sidebar_ads']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Homepage Slider Ad</label>
														<input type="text" name="slider_ads" value="<?php echo $membership['slider_ads']; ?>" class="form-control"/>
													</div>
													<div class="margiv-top-10">
														<input type="submit" class="btn green" value="Submit">
														<input type="reset" class="btn default" value="Cancel">
													</div>
												
                                                </div>
                                            </div>
							</div>
							<!--tab_1_2-->
							<div class="tab-pane" id="tab_1_3">
								<div class="row">
                                	<div class="col-md-2"></div>
                                    <div class="col-md-4">
										
													
													<div class="form-group">
														<label class="control-label">Home Page Gallery Deals</label>
														<input type="text" name="homepage_deals" value="<?php echo $membership['homepage_deals']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Top Deals</label>
														<input type="text" name="top_deals" value="<?php echo $membership['top_deals']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Highlighted Deals</label>
														<input type="text" name="highlighted_deals" value="<?php echo $membership['highlighted_deals']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Sidebar Deals</label>
														<input type="text" name="sidebar_deals" value="<?php echo $membership['sidebar_deals']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Homepage Slider Deals</label>
														<input type="text" name="slider_deals" value="<?php echo $membership['slider_deals']; ?>" class="form-control"/>
													</div>
													<div class="margiv-top-10">
														<input type="submit" class="btn green" value="Submit">
														<input type="reset" class="btn default" value="Cancel">
															 
														
													</div>
												
                                                </div>
                                            </div>
							</div>
							<!--end tab-pane-->
							<div class="tab-pane" id="tab_1_4">
								<div class="row">
                                	<div class="col-md-2"></div>
                                    <div class="col-md-4">
										
													<div class="form-group">
														<label class="control-label">Post Coupons</label>
														<input type="text" name="post_coupons" value="<?php echo $membership['post_coupons']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Home Page Gallery Coupons</label>
														<input type="text" name="homepage_coupons" value="<?php echo $membership['homepage_coupons']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Top Coupons</label>
														<input type="text" name="top_coupons" value="<?php echo $membership['top_coupons']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Highlighted Coupons</label>
														<input type="text" name="highlighted_coupons" value="<?php echo $membership['highlighted_coupons']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Sidebar Coupons</label>
														<input type="text" name="sidebar_coupons" value="<?php echo $membership['sidebar_coupons']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Homepage Slider Coupons</label>
														<input type="text" name="slider_coupons" value="<?php echo $membership['slider_coupons']; ?>" class="form-control"/>
													</div>
													<div class="margiv-top-10">
														<input type="submit" class="btn green" value="Submit">
														<input type="reset" class="btn default" value="Cancel">
													</div>
												
                                                </div>
                                            </div>
							
							</div>
							<!--end tab-pane-->
							<div class="tab-pane" id="tab_1_6">
								<div class="row">
                                	<div class="col-md-2"></div>
                                    <div class="col-md-4">
										
													<div class="form-group">
														<label class="control-label">Post Flyers</label>
														<input type="text" name="post_flyer" value="<?php echo $membership['post_flyer']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Home Page Gallery Flyers</label>
														<input type="text" name="homepage_flyers" value="<?php echo $membership['homepage_flyers']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Top Flyers</label>
														<input type="text" name="top_flyers" value="<?php echo $membership['top_flyers']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Highlighted Flyers</label>
														<input type="text" name="highlighted_flyers" value="<?php echo $membership['highlighted_flyers']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Sidebar Flyers</label>
														<input type="text" name="sidebar_flyers" value="<?php echo $membership['sidebar_flyers']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Homepage Slider Flyers</label>
														<input type="text" name="slider_flyers" value="<?php echo $membership['slider_flyers']; ?>" class="form-control"/>
													</div>
													<div class="margiv-top-10">
														<input type="submit" class="btn green" value="Submit">
														<input type="reset" class="btn default" value="Cancel">
													</div>
												
                                                </div>
                                            </div>
							</div>
                            <div class="tab-pane" id="tab_1_7">
								<div class="row">
                                	<div class="col-md-2"></div>
                                    <div class="col-md-4">
										
													
													<div class="form-group">
														<label class="control-label">Home Page Jobs</label>
														<input type="text" name="homepage_jobs" value="<?php echo $membership['homepage_jobs']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Top Jobs</label>
														<input type="text" name="top_jobs" value="<?php echo $membership['top_jobs']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Highlighted Jobs</label>
														<input type="text" name="highlighted_jobs" value="<?php echo $membership['highlighted_jobs']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Sidebar Jobs</label>
														<input type="text" name="sidebar_jobs" value="<?php echo $membership['sidebar_jobs']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Homepage Slider Jobs</label>
														<input type="text" name="slider_jobs" value="<?php echo $membership['slider_jobs']; ?>" class="form-control"/>
													</div>
													<div class="margiv-top-10">
														<input type="submit" class="btn green" value="Submit">
														<input type="reset" class="btn default" value="Cancel">
													</div>
												
                                                </div>
                                            </div>
							</div>
                            <div class="tab-pane" id="tab_1_8">
								<div class="row">
                                	<div class="col-md-2"></div>
                                    <div class="col-md-4">
										
													
													<div class="form-group">
														<label class="control-label">Home Page Gallery Resumes</label>
														<input type="text" name="homepage_resumes" value="<?php echo $membership['homepage_resumes']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Top Resumes</label>
														<input type="text" name="top_resumes" value="<?php echo $membership['top_resumes']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Highlighted Resumes</label>
														<input type="text" name="highlighted_resumes" value="<?php echo $membership['highlighted_resumes']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Sidebar Resumes</label>
														<input type="text" name="sidebar_resumes" value="<?php echo $membership['sidebar_resumes']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Homepage Slider Resumes</label>
														<input type="text" name="slider_resumes" value="<?php echo $membership['slider_resumes']; ?>" class="form-control"/>
													</div>
													<div class="margiv-top-10">
														<input type="submit" class="btn green" value="Submit">
														<input type="reset" class="btn default" value="Cancel">
													</div>
												
                                                </div>
                                            </div>
							</div>
							<!--end tab-pane-->
						</div>
					</div>
					<!--END TABS-->
					</form>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
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