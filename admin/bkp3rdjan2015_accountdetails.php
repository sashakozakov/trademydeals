<?php
include('header.php');
$id1=$_GET['uid'];
$user1=mysql_query("SELECT * FROM user WHERE id='$id1'");
$userdetail=mysql_fetch_array($user1);

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
									Account Details
								</a>
							</li>
							<li>
								<a href="#tab_1_3" data-toggle="tab">
									Change Password
								</a>
							</li>
							<li>
								<a href="#tab_1_4" data-toggle="tab">
									Message
								</a>
							</li>
							<li>
								<a href="#tab_1_7" data-toggle="tab">
									 Ads
								</a>
							</li>
                            <li>
								<a href="#tab_1_8" data-toggle="tab">
									 Flyers
								</a>
							</li>
                            <li>
								<a href="#tab_1_9" data-toggle="tab">
									 Deals
								</a>
							</li>
                            <li>
								<a href="#tab_1_10" data-toggle="tab">
									 Coupons
								</a>
							</li>
                            <li>
								<a href="#tab_1_11" data-toggle="tab">
									 Jobs
								</a>
							</li>
                            <li>
								<a href="#tab_1_12" data-toggle="tab">
									 Resumes
								</a>
							</li>
                            <li>
								<a href="#tab_1_13" data-toggle="tab">
									 Billing Information
								</a>
							</li>

						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
									<div class="col-md-3">
										<ul class="list-unstyled profile-nav">
											<li>
												<img src="assets/img/profile/profile-img.png" class="img-responsive" alt=""/>
												
											</li><br>
                                            
										</ul>
									</div>
									<div class="col-md-9">
                                    	<h3>User</h3>
										<div class="row">
											<div class="col-md-6 profile-info">
                                           		<div class="row">
                                                    <div class="col-md-5">
                                                        <p>User Name</p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p><?php echo $userdetail['nickname']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <p>Registration Date</p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p><?php echo $userdetail['date']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <p>E-mail</p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p><?php echo $userdetail['email']; ?></p>
                                                    </div>
                                                </div>
                                               
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <p>Company Name</p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p><?php echo $userdetail['companyname']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <p>First Name</p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p><?php echo $userdetail['firstname']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <p>Last Name</p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p><?php echo $userdetail['lastname']; ?></p>
                                                    </div>
                                                </div>
                                              
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <p>Country</p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p><?php echo $userdetail['country']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <p>City</p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p><?php echo $userdetail['town']; ?></p>
                                                    </div>
                                                </div>
                                               
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <p>ZIP Code</p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p><?php echo $userdetail['postalcode']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <p>Phone No</p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p><?php echo $userdetail['phone']; ?></p>
                                                    </div>
                                                </div>
                                               
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <p>Membership</p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p><?php echo $userdetail['status']; ?></p>
                                                    </div>
                                                </div>
                                               
                                                 <div class="row">
                                                    <div class="col-md-5">
                                                        <p>IP address</p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p><?php echo $userdetail['ip_address']; ?></p>
                                                    </div>
                                                </div>
											</div>
											<!--end col-md-8-->
											
											<!--end col-md-4-->
										</div>
										<!--end row-->
										
									</div>
								</div>
							</div>
							<!--tab_1_2-->
							<div class="tab-pane" id="tab_1_3">
								<div class="row profile-account">
									<div class="col-md-2">
										
									</div>
									<div class="col-md-6">
										<div class="tab-content">
											<div id="tab_1-1" class="tab-pane active">
												<form role="form" action="update_process.php" method="post">
													<div class="form-group">
														<label class="control-label">First Name</label>
														<input type="text" name="fname" value="<?php echo $userdetail['firstname']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Last Name</label>
														<input type="text" name="lname" value="<?php echo $userdetail['lastname']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Current Password</label>
														<input type="text" name="password" value="<?php echo $userdetail['password']; ?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">change Password</label>
														<input type="text" name="rpassword" value="" class="form-control"/>
                                                        <input type="hidden" name="userid" value="<?php echo $userdetail['id']; ?>" />
													</div>
												
													<div class="margiv-top-10">
														<input type="submit" class="btn green" value="Submit">
															 
														
														<input type="reset" class="btn default" value="Cancel">
															
													</div>
												</form>
											</div>
											
											
											
										</div>
									</div>
									<!--end col-md-9-->
                                    <div class="col-md-3">
										
									</div>
								</div>
							</div>
							<!--end tab-pane-->
							<div class="tab-pane" id="tab_1_4">
								<div class="row">
                                	<div class="col-md-3"></div>
									<div class="col-md-6">
										<form role="form" action="message.php" method="post">
													<div class="form-group">
														<label class="control-label">Message</label>
														<textarea name="message" class="form-control" rows="6"></textarea>
													    <input type="hidden" name="userid" value="<?php echo $userdetail['id']; ?>" />
                                                    </div>
													
												    <div class="margiv-top-10">
                                                        <input type="submit" class="btn green" value="Submit">
                                                             
                                                        
                                                        <input type="reset" class="btn default" value="Cancel">
                                                            
                                                    </div>
												</form>
									</div>
								</div>
								<div class="col-md-3"></div>
							
							</div>
							<!--end tab-pane-->
							<div class="tab-pane" id="tab_1_7">
                             <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                             <tr>
                             <th>Product Name</th>
                             <th>Type</th>
                             <th>Position</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Date of Creation</th>
                             <th>View</th>
                             <th>Action</th>
                             </tr>
                             <?php 
                             $ad=mysql_query("SELECT * FROM ads WHERE user_id='$id1'");
                            while( $ads=mysql_fetch_array($ad)){?>
                             <tr>
                             <td><?php echo $ads['ads_title']; ?></td>
                             <td>Ad</td>
                             <td><?php echo $ads['promote_ads'].','; echo $ads['promote_ads1'].','; echo $ads['promote_ads2'].','; echo $ads['promote_ads3'].','; echo $ads['promote_ads4']; ?></td>
                             <td><?php echo $userdetail['nickname']; ?></td>
                             <td><?php echo $ads['postalcode_your']; ?></td>
                             <td><?php echo $ads['date_time']; ?></td>
                             <td>1236</td>
                             <td><a href="updateuser.php?id=<?php echo $ads['id']; ?>&product=ads&uid=<?php echo $id1; ?>"><i class="fa fa-pencil"></i></a>
<a href="pdelete.php?id=<?php echo $ads['id']; ?>&uid=<?php echo $id1; ?>&product=ads"><i class="fa fa-times"></i></a></td>
                             
                             </tr><?php } ?>
                             </table>
                            </div><!--ads-->
                            <div class="tab-pane" id="tab_1_8">
                             <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                             <tr>
                             <th>Product Name</th>
                             <th>Type</th>
                             <th>Position</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Date of Creation</th>
                             <th>View</th>
                             <th>Action</th>
                             </tr>
                             <tr>
                             <?php 
                             $flyer=mysql_query("SELECT * FROM flyers WHERE user_id='$id1'");
                            while( $flyers=mysql_fetch_array($flyer)){?>
                             <tr>
                             <td><?php echo $flyers['flyers_title']; ?></td>
                             <td>flyer</td>
                             <td><?php echo $flyers['promote_flyers'].','; echo $flyers['promote_flyers1'].','; echo $flyers['promote_flyers2'].','; echo $flyers['promote_flyers3'].','; echo $flyers['promote_flyers4']; ?></td>
                             <td><?php echo $userdetail['nickname']; ?></td>
                             <td><?php echo $flyers['postalcode_your']; ?></td>
                             <td><?php echo $flyers['date_time']; ?></td>
                             <td>1236</td>
                             <td><a href="updateuser.php?id=<?php echo $flyers['id']; ?>&product=flyers&uid=<?php echo $id1; ?>"><i class="fa fa-pencil"></i></a>
<a href="pdelete.php?id=<?php echo $flyers['id']; ?>&uid=<?php echo $id1; ?>&product=flyers"><i class="fa fa-times"></i></a></td>
                             
                             </tr><?php } ?>
                             </table>
                            </div><!--post-->
                            <div class="tab-pane" id="tab_1_9">
                             <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                             <tr>
                             <th>Product Name</th>
                             <th>Type</th>
                             <th>Position</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Date of Creation</th>
                             <th>View</th>
                             <th>Action</th>
                             </tr>
                             <tr>
                             <?php 
                             $deal=mysql_query("SELECT * FROM deals WHERE user_id='$id1'");
                            while( $deals=mysql_fetch_array($deal)){?>
                             <tr>
                             <td><?php echo $deals['deals_title']; ?></td>
                             <td>deal</td>
                             <td><?php echo $deals['promote_deals'].','; echo $deals['promote_deals1'].','; echo $deals['promote_deals2'].','; echo $deals['promote_deals3'].','; echo $deals['promote_deals4']; ?></td>
                             <td><?php echo $userdetail['nickname']; ?></td>
                             <td><?php echo $deals['postalcode_your']; ?></td>
                             <td><?php echo $deals['date_time']; ?></td>
                             <td>1236</td>
                             <td><a href="updateuser.php?id=<?php echo $deals['id']; ?>&product=deals&uid=<?php echo $id1; ?>"><i class="fa fa-pencil"></i></a>
<a href="pdelete.php?id=<?php echo $deals['id']; ?>&uid=<?php echo $id1; ?>&product=deals"><i class="fa fa-times"></i></a></td>

                             
                             </tr><?php } ?> </table>
                             </div>
                             <div class="tab-pane" id="tab_1_10">
                             <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                             <tr>
                             <th>Product Name</th>
                             <th>Type</th>
                             <th>Position</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Date of Creation</th>
                             <th>View</th>
                             <th>Action</th>
                             </tr>
                              <tr>
                             <?php 
                             $coupon=mysql_query("SELECT * FROM coupons WHERE user_id='$id1'");
                            while( $coupons=mysql_fetch_array($coupon)){?>
                             <tr>
                             <td><?php echo $coupons['coupon']; ?></td>
                             <td>coupon</td>
                             <td><?php echo $coupons['promote_coupons'].','; echo $coupons['promote_coupons1'].','; echo $coupons['promote_coupons2'].','; echo $coupons['promote_coupons3'].','; echo $coupons['promote_coupons4']; ?></td>
                             <td><?php echo $userdetail['nickname']; ?></td>
                             <td><?php echo $coupons['postalcode_your']; ?></td>
                             <td><?php echo $coupons['date_time']; ?></td>
                             <td>1236</td>
                             <td><a href="updateuser.php?id=<?php echo $coupons['id']; ?>&product=coupons&uid=<?php echo $id1; ?>"><i class="fa fa-pencil"></i></a>
<a href="pdelete.php?id=<?php echo $coupons['id']; ?>&uid=<?php echo $id1; ?>&product=coupons"><i class="fa fa-times"></i></a></td>
                             
                             </tr><?php } ?>
                             </table>
                            </div><!--coupons-->
                            <div class="tab-pane" id="tab_1_11">
                             <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                             <tr>
                             <th>Product Name</th>
                             <th>Type</th>
                             <th>Position</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Date of Creation</th>
                             <th>View</th>
                             <th>Action</th>
                             </tr>
                             <tr>
                             <?php 
                             $job=mysql_query("SELECT * FROM jobs WHERE user_id='$id1'");
                            while( $jobs=mysql_fetch_array($job)){?>
                             <tr>
                             <td><?php echo $jobs['jobs_title']; ?></td>
                             <td>job</td>
                             <td><?php echo $jobs['promote_jobs'].','; echo $jobs['promote_jobs1'].','; echo $jobs['promote_jobs2'].','; echo $jobs['promote_jobs3'].','; echo $jobs['promote_jobs4']; ?></td>
                             <td><?php echo $userdetail['nickname']; ?></td>
                             <td><?php echo $jobs['postalcode_your']; ?></td>
                             <td><?php echo $jobs['date_time']; ?></td>
                             <td>1236</td>
                             <td><a href="updateuser.php?id=<?php echo $jobs['id']; ?>&product=jobs&uid=<?php echo $id1; ?>"><i class="fa fa-pencil"></i></a>
<a href="pdelete.php?id=<?php echo $jobs['id']; ?>&uid=<?php echo $id1; ?>&product=jobs"><i class="fa fa-times"></i></a></td>
                             
                             </tr><?php } ?> </table>
                            </div><!--jobs-->
                             <div class="tab-pane" id="tab_1_12">
                             <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                             <tr>
                             <th>Product Name</th>
                             <th>Type</th>
                             <th>Position</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Date of Creation</th>
                             <th>View</th>
                             <th>Action</th>
                             </tr>
                              <tr>
                             <?php 
                             $resume=mysql_query("SELECT * FROM resumes WHERE user_id='$id1'");
                            while( $resumes=mysql_fetch_array($resume)){?>
                             <tr>
                             <td><?php echo $resumes['resumes_title']; ?></td>
                             <td>resume</td>
                             <td><?php echo $resumes['promote_resumes'].','; echo $resumes['promote_resumes1'].','; echo $resumes['promote_resumes2'].','; echo $resumes['promote_resumes3'].','; echo $resumes['promote_resumes4']; ?></td>
                             <td><?php echo $userdetail['nickname']; ?></td>
                             <td><?php echo $resumes['postalcode_your']; ?></td>
                             <td><?php echo $resumes['date_time']; ?></td>
                             <td>1236</td>
                             <td><a href="updateuser.php?id=<?php echo $resume['id']; ?>&product=resume&uid=<?php echo $id1; ?>"><i class="fa fa-pencil"></i></a>
<a href="pdelete.php?id=<?php echo $resumes['id']; ?>&uid=<?php echo $id1; ?>&product=resumes"><i class="fa fa-times"></i></a></td>
                             
                             </tr><?php } ?></table>
                            </div><!--resumes-->
                            <div class="tab-pane" id="tab_1_13">
                             <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                             <tr>
                             <th>ID</th>
                             <th>Oreder ID</th>
                             <th>Payment States</th>
                             <th>Payment Date</th>
                             <th>Email</th>
                             <th>Type</th>
                             <th>Payment Method</th>
                              <th>Action</th>
                             </tr>
                             <tr>
                             <td>2</td>
                             <td>Demo-0999</td>
                             <td>Proceed</td>
                             <td>5/12/2014</td>
                             <td>dealers@Demoflyners.com</td>
                             <td>Pro-User</td>
                             <td>Paypal</td>
                             <td><i class="fa  fa-search"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class=" fa fa-pencil"></i></td>
                             
                             </tr>
                              <tr>
                             <td>3</td>
                             <td>Demo-0999</td>
                             <td>Pending</td>
                             <td>5/12/2014</td>
                             <td>dealers@Demoflyners.com</td>
                             <td>Free-User</td>
                             <td>Credit</td>
                             <td><i class="fa  fa-search"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class=" fa fa-pencil"></i></td>
                             </tr>
                              <tr>                             
                             <td>4</td>
                             <td>Demo-0999</td>
                             <td>Proceed</td>
                             <td>5/12/2014</td>
                             <td>dealers@Demoflyners.com</td>
                             <td>Pro-User</td>
                             <td>Paypal</td>
                             <td><i class="fa  fa-search"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class=" fa fa-pencil"></i></td>
                             </tr>
                             </table>
                            </div>
					<!-- END BASIC PORTLET-->
				</div>
				
			</div>
							</div>
							<!--end tab-pane-->
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