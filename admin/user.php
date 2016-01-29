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
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link href="css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="css/default.css" rel="stylesheet" type="text/css" id="style_color"/><!-- END THEME STYLES -->
<script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="page-container">
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="start ">
					<a href="user.php">
						
						<span class="title">
							User
						</span>
					</a>
				</li>
				<li>
					<a href="userdetails.php">
						
						<span class="title">
							User Details
						</span>
					</a>
				</li>
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
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<div class="page-content-wrapper">
		<div class="page-content">
        
            
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
							User
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
							<div class="table-toolbar">
								
								<div class=" pull-right">
									<div class="btn-group">
									<a href="#">
											<button id="sample_editable_1_new" class="btn green" style="margin-bottom:20px;">
											Edit
									</button></a>
								</div>
								</div>
							</div><br>
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th>
									S.no
								</th>
								<th>
									Username
								</th>
								<th>
									Category
								</th>
								<th>
									Action
								</th>
								
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>
									 <a href="#portlet-config1" data-toggle="modal" class="config">alex</a>
								</td>
								<td>
									 Alex Nilson
								</td>
								<td>
									 1234
								</td>
								<td>
									 <a href="userdetails.php">
											<button  class="btn green btn-sm">
											View
									</button></a>
								</td>
								
							</tr>
							<tr>
								<td>
									 lisa
								</td>
								<td>
									 Lisa Wong
								</td>
								<td>
									 434
								</td>
								<td>
									 <a href="userdetails.php">
											<button  class="btn green btn-sm">
											View
									</button></a>
								</td>
								
							</tr>
							<tr>
								<td>
									 nick12
								</td>
								<td>
									 Nick Roberts
								</td>
								<td>
									 232
								</td>
								<td>
									  <a href="userdetails.php">
											<button  class="btn green btn-sm">
											View
									</button></a>
								</td>
								
							</tr>
							<tr>
								<td>
									 goldweb
								</td>
								<td>
									 Sergio Jackson
								</td>
								<td>
									 132
								</td>
                                <td>
									 <a href="userdetails.php">
											<button  class="btn green btn-sm">
											View
									</button></a>
								</td>
								
							</tr>
							<tr>
								<td>
									 webriver
								</td>
								<td>
									 Antonio Sanches
								</td>
								<td>
									 462
								</td>
                                <td>
									 <a href="userdetails.php">
											<button  class="btn green btn-sm">
											View
									</button></a>
								</td>
								
							</tr>
							<tr>
								<td>
									 gist124
								</td>
								<td>
									 Nick Roberts
								</td>
								<td>
									 62
								</td>
                                <td>
									 <a href="userdetails.php">
											<button  class="btn green btn-sm">
											View
									</button></a>
								</td>
								
							</tr>
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