 <?php
include '../db.php';
$main_menu_id1=isset($_GET['main_menu_id1'])? $_GET['main_menu_id1']:''; 
?>
 <!DOCTYPE html><html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Metronic | Admin Dashboard Template</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link href="css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="css/default.css" rel="stylesheet" type="text/css" id="style_color"/><!-- END THEME STYLES -->
<script type="text/javascript "src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script> 
<!-- BEGIN SUB MENU CATEGORY ITEM DELETE-->
<script>
    $(document).ready(function() {
        $('.btn_del').click(function() {
        var sub_menu_id= $(this).attr('value');
		var $ele = $(this).parent().parent();
		if(confirm("Are you sure you want to delete this?"))
		{
        $.ajax({
			type:'GET',
            url:'del_other_item.php',
            data:{'sub_menu_id':sub_menu_id},
            success: function(data){
                 if(data=="YES"){
                    $ele.fadeOut().remove();
					location.refresh();
                 }else{
                        alert("can't delete the row")
                 }
             }

            });
		}
		return false;
        });
	});
</script>
<!-- END SUB MENU CATEGORY ITEM DELETE-->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="page-container">
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
				
				<li class="start  ">
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
				<li class="active">
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
	<div class="page-content-wrapper">
		<div class="page-content">
        
            <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Edit Details</h4>
						</div>
						<div class="modal-body">
							<div class="row">
				<div class="col-lg-12">
                
					<form action="#" class="form-horizontal">
											<div class="form-body table1">
												
												<div class="row ">
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label col-md-3">
                                                            Type</label>
															<div class="col-md-9">
																<input type="text" class="form-control" >
																
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-4">
														
													</div>
													<!--/span-->
												</div>
                                                
												<!--/row-->
                                                
											
												
												<!--/row-->
												
												<!--/row-->
											</div>
											
										</form>
				</div>
			</div>
						</div>
						<div class="modal-footer">
							
							<button type="button" class="btn blue pull-right">Update</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
            
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
							Other Categories
					</h3>
					
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			
            
            <br>
			<div class="row profile">
				<div class="col-md-12">
					<!--BEGIN TABS-->
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_1" data-toggle="tab">
									Flyer
								</a>
							</li>
							<li>
								<a href="#tab_1_3" data-toggle="tab">
									jobs
								</a>
							</li>
							<li>
								<a href="#tab_1_4" data-toggle="tab">
									Resume
							</a></li>
						</ul>
                        <div>
                        <?php
include('db.php');
if(isset($_GET['sub_menu_id']))
{	
$sub_menu_id = $_GET['sub_menu_id'];

if($main_menu_id1==3)
{
$query = "SELECT sub_menu_category FROM tbl_sub_menu WHERE sub_menu_id=$sub_menu_id ";
}
else
{
$query = "SELECT sub_menu_category_item FROM tbl_sub_menu WHERE sub_menu_id=$sub_menu_id ";
}
$result=mysql_query($query);
$value=mysql_fetch_assoc($result);
?>
<form action="update_othercategory_item.php?main_menu_id1=<?php echo $main_menu_id1?>&sub_menu_id=<?php echo $sub_menu_id; ?>"  method="POST">

<input type="hidden" name="sub_menu_id" value="<?php echo $sub_menu_id; ?>"/>
<h4>Type
<input type="text" value="<?php if($main_menu_id1==3){echo $value['sub_menu_category'];}else{echo $value['sub_menu_category_item'];}}?>" name="sub_menu_category"/>
</h4>
<input type="submit" value="Update" />
</form>
</div>

						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
								  <div class="col-md-12"><!--end row-->
									<p>&nbsp;</p>
								  </div>
								</div>
						  </div>
							<!--tab_1_2-->
							<div class="tab-pane" id="tab_1_3">
								<div class="row profile-account">
									
									<div class="col-md-12"></div>
									<!--end col-md-9-->
                                    
								</div>
							</div>
							<!--end tab-pane-->
							<div class="tab-pane" id="tab_1_4">
								<div class="row">
									<div class="col-md-12"></div>
								</div>
								
                          </div>
							<!--end tab-pane-->
							<div class="tab-pane" id="tab_1_6">
								<div class="row">
				<div class="col-md-12">
					<!-- BEGIN BASIC PORTLET-->
					<div class="portlet solid">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Geolocation
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="gmap_basic" class="gmaps">
							</div>
						</div>
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

</body>
</html>