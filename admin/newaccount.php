<?php
include('header.php');
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
					Details
					</h3>
					
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			
            
            <br>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box">
						
						<div class="portlet-body">
							
							<form action="adduser.php" method="post" class="form-horizontal">
											<div class="form-body">
												 <div class="row ">
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label col-md-4">
                                                           Nickname</label>
															<div class="col-md-1">
                                                           <p style="margin-top:5px;">:</p>
                                                           </div>
															<div class="col-md-6">
																<input type="text" name="nickname" class="form-control">
																
															</div>
														</div>
													</div>
												</div>
                                                <div class="row ">
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label col-md-4">
                                                           First Name</label>
                                                           <div class="col-md-1">
                                                           <p style="margin-top:5px;">:</p>
                                                           </div>
															<div class="col-md-6">
                                                              <input type="text" name="payer_fname" class="form-control">
															</div>
														</div>
													</div>
												</div>
                                                <div class="row ">
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label col-md-4">
                                                           Last Name</label>
															<div class="col-md-1">
                                                           <p style="margin-top:5px;">:</p>
                                                           </div>
															<div class="col-md-6">
																<input type="text" name="payer_lname" class="form-control">
																
															</div>
														</div>
													</div>
												</div>
                                                <div class="row ">
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label col-md-4">
                                                           Email Address</label>
															<div class="col-md-1">
                                                           <p style="margin-top:5px;">:</p>
                                                           </div>
															<div class="col-md-6">
																<input type="text" name="email" class="form-control"  >
																
															</div>
														</div>
													</div>
												</div>
												<div class="row ">
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label col-md-4">
                                                           Password</label>
															<div class="col-md-1">
                                                           <p style="margin-top:5px;">:</p>
                                                           </div>
															<div class="col-md-6">
																<input type="password" name="password" class="form-control"  >
																
															</div>
														</div>
													</div>
												</div>
											<div class="row ">
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label col-md-4">
                                                          Conform Password</label>
															<div class="col-md-1">
                                                           <p style="margin-top:5px;">:</p>
                                                           </div>
															<div class="col-md-6">
																<input type="password" name="rpassword" class="form-control"  >
																
															</div>
														</div>
													</div>
												</div>
                                                <div class="row ">
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label col-md-4">
                                                           Company Name</label>
															<div class="col-md-1">
                                                           <p style="margin-top:5px;">:</p>
                                                           </div>
															<div class="col-md-6">
																<input type="text" name="companyname" class="form-control">
																
															</div>
														</div>
													</div>
												</div>
                                                <div class="row ">
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label col-md-4">
                                                           Phone</label>
															<div class="col-md-1">
                                                           <p style="margin-top:5px;">:</p>
                                                           </div>
															<div class="col-md-6">
																<input type="text" name="phone" class="form-control">
																
															</div>
														</div>
													</div>
												</div>
                                              
                                                <div class="row ">
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label col-md-4">
                                                           Town / city</label>
															<div class="col-md-1">
                                                           <p style="margin-top:5px;">:</p>
                                                           </div>
															<div class="col-md-6">
																<input type="text" name="city" class="form-control">
															</div>
														</div>
													</div>
												</div>
                                                <div class="row ">
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label col-md-4">
                                                           State</label>
															<div class="col-md-1">
                                                           <p style="margin-top:5px;">:</p>
                                                           </div>
															<div class="col-md-6">
																<input type="text" name="state" class="form-control"  >
															</div>
														</div>
													</div>
												</div>
                                                <div class="row ">
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label col-md-4">
                                                           Country</label>
															<div class="col-md-1">
                                                           <p style="margin-top:5px;">:</p>
                                                           </div>
															<div class="col-md-6">
																<input type="text" name ="country" class="form-control"  >
															</div>
														</div>
													</div>
												</div>
                                                 <div class="row ">
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label col-md-4">
                                                           ZIP Code</label>
															<div class="col-md-1">
                                                           <p style="margin-top:5px;">:</p>
                                                           </div>
															<div class="col-md-6">
																 <input type="text" name="payer_zip" class="form-control">
															</div>
														</div>
													</div>
												</div>
										
						<div class="row"><br>
                        	<div class="col-md-4"></div>
							<div class="col-md-5 ">
								<div class="btn-group">
									<a href="#">
											<button type="submit" id="sample_editable_1_new" class="btn green" style="margin-right:20px;">
												Submit
									</button></a>
                                    <a href="#">
											<button type="reset" id="sample_editable_1_new" class="btn ">
												Cancel
									</button></a>
								</div>
						</div></form>
					</div>
                    </div>
                    </div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
            
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