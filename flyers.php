<?php
$page='flyers';
include('header.php');
 ?>
<style>
	.slider{
		height:230px;
	}
	.btn5{
		margin-bottom:0px;
	}
</style>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
  <div class="content">
    <div class="container">
     <div class="col-lg-12">
        <div class="col-lg-9  mobile-nopad">
            	<div class="col-lg-12">
                	<div class="col-lg-10">
                	<div class="sub1" style="margin-top:20px; margin-bottom:15px; margin-left:-5px;">
                    	<h4>Flyers</h4>
                    </div>
                    </div>
                     <div class="col-lg-2 post-btn" style="margin-top:20px;">
         <a href="postflyer.php"><button type="button" class="btn btn-danger btn-lg" style="border-top-left-radius:10px;
border-top-right-radius:10px;border-bottom-left-radius:10px; padding:8px 16px;
border-bottom-right-radius:10px; margin-left:10px;">Post Flyer</button></a>

         </div>
                </div>
                <div class="col-lg-12">



					<?php $none_all_ads = "block"; if(isset($_REQUEST['product'])){ $none_all_ads = "none";?>
						<div class="sub1" style="background:#FF9933; margin-left:10px;">
                    	<h4>Flyers&nbsp;->&nbsp;<a href="#" style="color:#000000; text-decoration:underline;"><?php echo $_REQUEST['product'];?></a></h4>
						</div>
                   <?php }else{?> <div class="sub1" style="background:#FF9933; margin-left:10px;">
                    	<h4>Top Flyers&nbsp;->&nbsp;<a href="top-flyers.php" style="color:#000000; text-decoration:underline;">see all top flyers</a></h4></div>  <?php } ?>

                    <div class="col-lg-12"  >
                    <div class="newcontent"><?php if(!isset($_REQUEST['product'])){
                   $top_query=mysql_query("SELECT * FROM `flyers` WHERE `promote_flyers1`='top' and payment_status = '1' and country =  '$country_name'  ORDER BY rand() limit 0,6");
                  while ($top=mysql_fetch_array($top_query)) {
                   ?>
                    	<div class="col-lg-4">
                          <div class="content2" style="margin-top:10px;">
                                      <img src="img/<?php echo get_post_image($top['id'],'flyers');?>" class="img-responsive">
                                       <a href="getflyers.php?id=<?php echo $top['id']; ?>"><h3><?php echo get_post_tile_string($top['flyers_title']); ?></h3>


										<p><?php echo substr($top['description'],0,15).'...'; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                                  </a>  </div>
                        </div> <?php }}else{  $top_query=mysql_query("SELECT * FROM `flyers` WHERE `category-name`= '".$_REQUEST['product']."' and payment_status = '1' and country =  '$country_name' ORDER BY date_time DESC");
				if(mysql_num_rows($top_query)){
                  while ($top=mysql_fetch_array($top_query)) {
                   ?>
                    	<div class="col-lg-4">
                          <div class="content2" style="margin-top:10px;">
                                      <img src="img/<?php echo get_post_image($top['id'],'flyers');?>" class="img-responsive">
                                       <a href="getflyers.php?id=<?php echo $top['id']; ?>"><h3><?php echo get_post_tile_string($top['flyers_title']); ?></h3>


										<p><?php echo substr($top['description'],0,15).'...'; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                                  </a>  </div>
                        </div> <?php } }else{?>
						 <p style="margin: 20px 46px 10px -0px;">No jobs are available here.</p>
                       <?php }}  ?>
                    </div>
                	</div>

                </div>
                <div class="col-lg-12" style="display:<?php echo $none_all_ads;?>;">
                	<div class="sub1" style="background:#0066FF; margin-left:10px;">
                    	<h4>All Flyers</h4>
                    </div>
                    <div class="col-lg-12">
                    	<?php
                      $filename = "flyers.php"; // name of this file
$option = array (5, 10, 25, 50, 100, 200);
$default = 12; // default number of records per page
$action = $_SERVER['PHP_SELF']; // if this doesn't work, enter the filename
//$search=isset($_REQUEST['search'])? $_REQUEST['search']:'';
// $search=isset($_GET['search'])? $_GET['search']:'';


//$query = "SELECT * FROM `flyers` where  promote_flyers = 'high'  ORDER BY id desc";
$query = "(SELECT * FROM `flyers` where  (promote_flyers = 'high' or promote_flyers = '') and payment_status = '1' and country =  '$country_name' ORDER BY promote_flyers DESC, date_time desc )";

 // database query. Enter your query here
// end config---------------------------------

$opt_cnt = count ($option);
$go=isset($_GET['go'])? $_GET['go']:'';

// paranoid
if ($go == "") {
$go = $default;
}
elseif (!in_array ($go, $option)) {
$go = $default;
}
elseif (!is_numeric ($go)) {
$go = $default;
}
$nol = $go;
$start = (isset($_GET['offset']) && $_GET['offset'] != '') ? (($_GET['offset']-1)*$default) : 0;
$limit = "$start, $nol";
$count = 1;



                                     $sql = mysql_query ("$query LIMIT $limit") or die ("Error in query: $sql".mysql_error());

while ($row= mysql_fetch_object($sql)) {
?>
                        <div class="col-lg-4">
                           <?php
                          if ($row->promote_flyers=='high') {
                           echo "<div class='high'>";
                          }
                          else{
                            echo "<div class='slider'>";
                          }
                          ?>
                                        <img src="img/<?php echo get_post_image($row->id,'flyers');?>" class="img-responsive">
                                       <a href="getflyers.php?id=<?php echo $row->id; ?>"><h3><?php echo get_post_tile_string($row->flyers_title); ?></h3>
                                        <p><?php echo substr($row->description,0,15).'...'; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                                    </a></div>
                        </div>
                       <?php } ?>

                    </div>
            </div>
             <div class="col-lg-12 media-pagination" style="display:<?php echo $none_all_ads;?>;">
                	<?php




// control query------------------------------
/* this query checks how many records you have in your table.
I created this query so we could be able to check if user is
trying to append number larger than the number of records
to the query string.*/
$off_sql = mysql_query ("$query") or die ("Error in query: $off_sql".mysql_error());
$off_pag = ceil (mysql_num_rows($off_sql) / $nol);
//--------------------------------------------
$off=isset($_GET['offset'])? $_GET['offset']:'';

//paranoid
if (get_magic_quotes_gpc() == 0) {
$off = addslashes ($off);
}
if (!is_numeric ($off)) {
$off = 1;
}
// this checks if user is trying to put something stupid in query string
if ($off > $off_pag) {
$off = 1;
}

if ($off == "1") {
$limit = "0, $nol";
}
elseif ($off <> "") {
for ($i = 0; $i <= ($off - 1) * $nol; $i ++) {
$limit = "$i, $nol";
$count = $i + 1;
}
} ?>

                      <ul class="pagination">
                    <?php  if ($off <> 1) {
$prev = $off - 1;
                          echo "<li ><a  href=\"$filename?offset=$prev&go=$go\">&laquo;</a></li>";
                          }
for ($i = 1; $i <= $off_pag; $i ++) {
if ($i == $off) { ?>
                   <li  class="active"><a href="#"><?php echo $i;?></a></li>
                  <?php  } else {

                         echo " <li ><a  href=\"$filename?offset=$i&go=$go\">$i</a></li> ";
                        }
}
if ($off < $off_pag) {
$next = $off + 1;
                          echo "<li><a href=\"$filename?offset=$next&go=$go\">&raquo;</a></li>";
                          } ?>

						</ul>
                    </div>
                </div>


                                 <?php
include('footer.php');
                ?>
