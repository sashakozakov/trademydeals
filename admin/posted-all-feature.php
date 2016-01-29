<?php
include('header.php');
 ?>
 <script>
function Confirm_Box() {
  
    if (confirm("Are you realy want to delete this post") == true) {
        return true; 
    } else {
        return false; 
    }
   
}
</script>
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
				
				<li class="start">
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
				</li><li class="active">
					<a href="javascript:;">
						<i class="fa fa-bookmark-o"></i>
						<span class="title">
							Posted Feature
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="posted-all-feature.php">
								 All Posts
							</a>
						</li>
						<li>
							<a href="posted-feature.php?action=ads">
								 Ads
							</a>
						</li>
						<li>
							<a href="posted-feature.php?action=deals">
								 Deals
							</a>
						</li>
						<li>
							<a href="posted-feature.php?action=coupons">
								 Coupons
							</a>
						</li>
						<li>
							<a href="posted-feature.php?action=resumes">
								 Resumes
							</a>
						</li>
						<li>
							<a href="posted-feature.php?action=jobs">
								 Jobs
							</a>
						</li>
						<li>
							<a href="posted-feature.php?action=flyers">
								 Flyers
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
							<?php echo ucfirst($_GET['action']);?>			</h3>
					
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
		  </div>
			
            
            <br>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box">
						<div class="portlet-body">
							<div class="table-toolbar">
								
								<div class=" pull-right">
									
								</div>
							</div><br>
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th>
									S.no								</th>
								<th>
									Post Name								</th>
									
																
								<th>
									Type								</th>
									
									
								<th>
									Position								</th>
								<th>
									User Name								</th>
								
								<th>
									User Email 					</th>
								
								<th>
									Date of Creation								</th>	
									<th>
									#Views								</th>	
								<th style="width:150px;">
									Action								</th>
							</tr>
							</thead>
							<tbody>
								<?php
								//include("../db.php"); // include the library file
								$action = $_GET['action']; 
								if(!isset($_GET['action'])){
								$posts=getPostedAllFeature();
								}
								//print_R($user);
								$count=0;
                                 foreach($posts as $post) {
								 $total_position = "";
								 $position = $post['promote'];
								 $position1 = $post['promote1'];
								 $position2 = $post['promote2'];
								 $position3 = $post['promote3'];
								 $position4 = $post['promote4'];
									if($position!=""){
										$total_position .=ucfirst($position).", "; 
									}
									if($position1!=""){
										$total_position .=ucfirst($position1).", "; 
									}
									if($position2!=""){
										$total_position .=ucfirst($position2).", "; 
									}
									if($position3!=""){
										$total_position .=ucfirst($position3).", "; 
									}
									
									if($position4!=""){
										$total_position .=ucfirst($position4).", "; 
									}
									$total_position =trim($total_position,", ");  
									$user_details = get_User_Details($post['user_id']);
									$date = $post['date_time']; 
								    $strDate = strtotime($date);
									$finalDate = date('m-d-Y',$strDate);
									$dateObj = DateTime::createFromFormat('m-d-Y', $finalDate);
									//var_dump($dateObj);
                                    $createDate = $dateObj->format('M d, Y');
                                    $count++;                                                           
								?>
							<tr>
								<td>
									<?php echo $count; ?>								</td>
								<td>
									 <?php echo $post['title']; ?>
								 </td>
							<td>
									 <?php echo ucfirst($post['types']); ?>
								 </td>
								 <td>
									 <?php echo $total_position; ?>
								 </td>
								 <td>
									 <?php echo $user_details['1']." ".$user_details['2']; ?>	
								 </td>
								 <td>
									 <?php echo $user_details['0']; ?>
								 </td>
								
								<td>
									 <?php echo $createDate;?>								
								</td>
								<td>
									 <?php echo $post['views_count']; ?>				
								</td>			
								<td>
									
											<a href="edit_<?php echo $post['types'];?>.php?id=<?php echo $post['id'];?>"><button  class="btn orange btn-sm">
									Edit									</button></a>&nbsp;|&nbsp;<a onclick="return Confirm_Box();" href="delete_post.php?id=<?php echo $post['id'];?>&action=<?php echo $post['types'];?>"><button  class="btn red btn-sm">
									Delete									</button></a>								</td>
							</tr><?php }
							 $count=0; ?>
							
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
		  </div>
		</div>
	</div>
	<!-- END CONTENT -->
</div>



<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="js/core/app.js" type="text/javascript"></script>

<script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<script>

jQuery(document).ready(function() {    
 $('#sample_editable_1').DataTable();
   App.init();
   MapsGoogle.init();
  
});
</script>
</body>
<!-- END BODY -->
</html>