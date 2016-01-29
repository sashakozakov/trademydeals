<?php
if(isset($_GET['delete']) && $_GET['delete'] == 'true'){
	include("../db.php"); // include the library file
	$user=mysql_query("DELETE FROM user where id = ".$_GET['uid']."");
	header("location: account.php");
	die();
}

if(isset($_GET['approve']) && $_GET['approve'] == 'true'){
	include("../db.php"); // include the library file
	$user=mysql_query("UPDATE user set approve = 1 where id = ".$_GET['uid']."");
	header("location: account.php");
	die();
}

if(isset($_GET['suspend']) && $_GET['suspend'] == 'true'){
	include("../db.php"); // include the library file
	$user=mysql_query("UPDATE user set is_activate = 1 where id = ".$_GET['uid']."");
	header("location: account.php");
	die();
}

if(isset($_GET['suspend']) && $_GET['suspend'] == 'false'){
	include("../db.php"); // include the library file
	$user=mysql_query("UPDATE user set is_activate = 0 where id = ".$_GET['uid']."");
	header("location: account.php");
	die();
}
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
							User Accounts
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="account.php">
								<i class="fa fa-bullhorn"></i>
								Accounts
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
					<h3 class="page-title">User Accounts</h3>
					
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
									<div class="btn-group">
									<a href="#">
											<button id="sample_editable_1_new" class="btn green" style="margin-bottom:20px;">
									  Edit									</button></a>								</div>
								</div>
							</div><br>
							<table class="table table-striped table-hover table-bordered datatable" id="sample_editable_1">
							<thead>
							<tr>
								<th>
									S.no								</th>
								<th>
									Email								</th>
									
																
								<th>
									Name								</th>
									
									
								<th>
									Username								</th>
								<th>
									Password								</th>
								
								<th>
									Member Type								</th>

								<th>
									Date of Creation								</th>	
								<th colspan="4" style="text-align:center;">Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								include("../db.php"); // include the library file
								$user=mysql_query("SELECT * FROM user");
								$count=0;
                                 while ($userdetail=mysql_fetch_array($user)) {
									
									$date = $userdetail['date']; 
								    $strDate = strtotime($date);
									$finalDate = date('m-d-Y',$strDate);
									$dateObj = DateTime::createFromFormat('m-d-Y', $finalDate);
									//var_dump($dateObj);
									if(!empty($dateObj)) $createDate = $dateObj->format('M d, Y');
                                    $count++;                                                           
								?>
							<tr>
								<td>
									<?php echo $count; ?>								</td>
								<td>
									 <a href="accountdetails.php?uid=<?php echo $userdetail['id']; ?>"><?php echo $userdetail['email']; ?></a></td>
							
								<td>
									 <a href="accountdetails.php?uid=<?php echo $userdetail['id']; ?>"><?php echo $userdetail['firstname']; ?></a></td>	 
									 
								<td>
									 <?php echo $userdetail['nickname']; ?>								</td>	 
								<td>
									 <?php echo $userdetail['password']; ?>								</td>
								
								<td>
									 <?php echo $userdetail['status']; ?>								</td>
								 
								<td>
									 <?php echo $createDate;?>								</td>	 
								<td><a href="accountdetails.php?uid=<?php echo $userdetail['id']; ?>"><button  class="btn green btn-sm">View</button></a></td>
                                <td><a class="delete" href="account.php?delete=true&uid=<?php echo $userdetail['id']; ?>"><button  class="btn green btn-sm">Delete</button></a></td>
                                <?php if($userdetail['approve'] == 0){ ?>
	                                <td><a class="approve" href="account.php?approve=true&uid=<?php echo $userdetail['id']; ?>"><button  class="btn green btn-sm">Approve</button></a></td>
                                <?php }else{ ?>
                                	<td><strong>Approved</strong></td>
                                <?php } ?>
                                
                                <?php if($userdetail['is_activate'] == 0){ ?>
	                                <td><a class="suspend" href="account.php?suspend=true&uid=<?php echo $userdetail['id']; ?>"><button  class="btn green btn-sm">Suspend</button></a></td>
                                <?php }else{ ?>
                                	<td><a class="suspend" href="account.php?suspend=false&uid=<?php echo $userdetail['id']; ?>"><button  class="btn green btn-sm">Active</button></a></td>
                                <?php } ?>
                                
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



<!--link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css"-->
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<!--script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script-->
<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="js/core/app.js" type="text/javascript"></script>

<script>

jQuery(document).ready(function() {    
   //$('#sample_editable_1').DataTable();
   
  App.init();
   //MapsGoogle.init();
   jQuery(".delete").click(function(){
		if(confirm("Are you sure you want to delete this user.")){
			return true;
		}else{
			return false;
		}
	})
});
</script>
</body>
<!-- END BODY -->
</html>