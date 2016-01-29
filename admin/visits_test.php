<?php
include('header.php'); 

$sql = "SELECT  `date_time` , count( * ) FROM  `visit_counter` GROUP BY date_time ORDER BY date_time"; 
$query = mysql_query($sql);
$tets_arra = array();
while($result = mysql_fetch_array($query))
{
	
	$tets_arra[] = array($result[0], $result[1]);
}
$psql = "SELECT  `date_time` , sum( count_view ) FROM  `page_view_counter` GROUP BY date_time ORDER BY date_time"; 
$pquery = mysql_query($psql);
$page_array = array();
while($presult = mysql_fetch_array($pquery))
{
	
	$page_array[] = array($presult[0], $presult[1]);
}
//var_dump($tets_arra); die;
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
				</li><li>
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
							Posted Features					</h3>
					
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
		  </div>
<div class="col-md-6 col-sm-6" style="width:100%;">
					<!-- BEGIN PORTLET-->
					<div class="portlet solid bordered grey-cararra">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bar-chart-o"></i>Site Visits
							</div>
							<div class="actions" style="margin-right: 25px;">
								<div class="btn-group" data-toggle="buttons">
									<label class="btn grey-steel btn-sm active">
									<div style="width: 50px;height: 20px;background-color: #4086DD;"></div>Visits</label>
									<label class="btn grey-steel btn-sm">
									<div style="width: 50px;height: 20px;background-color: #FCA643;"></div>Page Views</label>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div id="site_statistics_loading">
								<img src="assets/admin/layout/img/loading.gif" alt="loading"/>
							</div>
							<div id="site_statistics_content" class="display-none">
								<div id="site_statistics" style="overflow:visible;" class="chart">
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
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


<script src="assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>

<script src="assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<style>
.flot-text{left:-8px !important}
</style>
<script>
jQuery(document).ready(function() {    
  
   
   Index.initCharts(); // init index page's custom scripts
  
});
 var Index = function () {

    return {
	initCharts: function () {
            if (!jQuery.plot) {
                return;
            }

            function showChartTooltip(x, y, xValue, yValue) {
                $('<div id="tooltip" class="chart-tooltip">' + yValue + '<\/div>').css({
                    position: 'absolute',
                    display: 'none',
                    top: y - 40,
                    left: x - 40,
                    border: '0px solid #ccc',
                    padding: '2px 6px',
                    'background-color': '#fff'
                }).appendTo("body").fadeIn(200);
            }

            var data = [];
            var totalPoints = 250;

            // random data generator for plot charts

            function getRandomData() {
                if (data.length > 0) data = data.slice(1);
                // do a random walk
                while (data.length < totalPoints) {
                    var prev = data.length > 0 ? data[data.length - 1] : 50;
                    var y = prev + Math.random() * 10 - 5;
                    if (y < 0) y = 0;
                    if (y > 100) y = 100;
                    data.push(y);
                }
                // zip the generated y values with the x values
                var res = [];
                for (var i = 0; i < data.length; ++i) res.push([i, data[i]])
                return res;
            }

            function randValue() {
                return (Math.floor(Math.random() * (1 + 50 - 20))) + 10;
            }
			

			
            var visitors = [
                ['02/2013', 1500],
                ['03/2013', 2500],
                ['04/2013', 1700],
                ['05/2013', 800],
                ['06/2013', 1500],
                ['07/2013', 2350],
                ['08/2013', 1500],
                ['09/2013', 1300],
                ['10/2013', 4600]
				['11/2013', 1500],
                ['12/2013', 2500],
                ['13/2013', 1700],
                ['14/2013', 800],
                ['15/2013', 1500],
                ['16/2013', 2350],
                ['17/2013', 1500],
                ['18/2013', 1300],
                ['19/2013', 4600]
				['20/2013', 1500],
                ['21/2013', 2500],
                ['22/2013', 1700],
                ['23/2013', 800],
                ['24/2013', 1500],
                ['25/2013', 2350],
                ['26/2013', 1500],
                ['27/2013', 1300],
                ['28/2013', 4600]
				['29/2013', 1500],
                ['30/2013', 2500],
                ['31/2013', 1700],
                ['01/2014', 800],
                ['02/2014', 1500],
                ['03/2014', 2350],
                ['04/2014', 1500],
                ['05/2014', 1300],
                ['06/2014', 4600]
            ];


            if ($('#site_statistics').size() != 0) {

                $('#site_statistics_loading').hide();
                $('#site_statistics_content').show();

                var plot_statistics = $.plot($("#site_statistics"),
                    [{
                        data: visitors,
                        lines: {
                            fill: 0.6,
                            lineWidth: 0
                        },
                        color: ['#f89f9f']
                    }, {
                        data: visitors,
                        points: {
                            show: true,
                            fill: true,
                            radius: 5,
                            fillColor: "#f89f9f",
                            lineWidth: 3
                        },
                        color: '#fff',
                        shadowSize: 0
                    }],

                    {
                        xaxis: {
                            tickLength: 0,
                            tickDecimals: 0,
                            mode: "categories",
                            min: 0,
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        yaxis: {
                            ticks: 5,
                            tickDecimals: 0,
                            tickColor: "#eee",
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#eee",
                            borderColor: "#eee",
                            borderWidth: 1
                        }
                    });

                var previousPoint = null;
                $("#site_statistics").bind("plothover", function (event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));
                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);

                            showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + ' visits');
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });
            }


           
        }

    };

}();
</script>	
<script>
jQuery(document).ready(function() {    
   App.init();
   MapsGoogle.init();
});
</script>
</body>
<!-- END BODY -->
</html>