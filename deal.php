<?php
include('header.php');
 ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <div class="content">
    <div class="container">
     <div class="col-lg-12">
        <div class="col-lg-9">
            	<div class="col-lg-12">
                	<div class="col-lg-10">
                	<div class="sub1" style="margin-top:20px; margin-bottom:15px; margin-left:-5px;">
                    	<h4>Deals</h4>
                    </div>
                    </div>
                     <div class="col-lg-2" style="margin-top:20px;">
         <a href="postdeal.php"><button type="button" class="btn btn-danger btn-lg" style="border-top-left-radius:10px;
border-top-right-radius:10px;border-bottom-left-radius:10px; padding:8px 16px; 
border-bottom-right-radius:10px; margin-left:10px;">Post Deals</button></a>

         </div>
                </div>
                <div class="col-lg-12">
                	<div class="sub1" style="background:#FF9933; margin-left:10px;">
                    	<h4>Top Deals  &nbsp;&nbsp;&nbsp;<a href="#" style="color:#000000; text-decoration:underline;">see all top deals</a></h4>
                                             
                    </div>
                  
                    <div class="col-lg-12"  >
                    <div class="newcontent"><?php 
                   $top_query=mysql_query("SELECT * FROM `deals` WHERE `promote_deals1`='top' ORDER BY id DESC");     
                  while ($top=mysql_fetch_array($top_query)) {
                   ?>
                    	<div class="col-lg-4">
                          <div class="content2" style="margin-top:10px;">
                                      <img src="img/<?php echo $top['images']; ?>" class="img-responsive">
                                       <a href="getdeals.php?id=<?php echo $top['id']; ?>"><h3><?php echo $top['deals_title']; ?></h3>
                                        <p><?php echo $top['description']; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                                   </a> </div>
                        </div> <?php } ?>
                       
                    </div>
                	</div>
                    
                </div>
                <div class="col-lg-12">
                	<div class="sub1" style="background:#0066FF; margin-left:10px;">
                    	<h4>All Deals</h4>
                    </div>
                    <div class="col-lg-12">
                    	<?php 
                      $filename = "deals.php"; // name of this file 
$option = array (5, 10, 25, 50, 100, 200); 
$default = 6; // default number of records per page 
$action = $_SERVER['PHP_SELF']; // if this doesn't work, enter the filename 
//$search=isset($_REQUEST['search'])? $_REQUEST['search']:''; 
// $search=isset($_GET['search'])? $_GET['search']:'';     
     
        
$query = "SELECT * FROM `deals` ORDER BY id";
        
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
$limit = "0, $nol"; 
$count = 1; 


                                        
                                     $sql = mysql_query ("$query LIMIT $limit") or die ("Error in query: $sql".mysql_error()); 

while ($row= mysql_fetch_object($sql)) { 
?>
                        <div class="col-lg-4">
                          <?php
                          if ($row->promote_high) {
                           echo "<div class='high'>";
                          }
                          else{
                            echo "<div class='slider'>";
                          }
                          ?>
                            
                                        <img src="img/<?php echo $row->images; ?>" class="img-responsive">
                                       <a href="getdeals.php?id=<?php echo $row->id; ?>"><h3><?php echo $row->deals_title; ?></h3>
                                        <p><?php echo $row->description; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                                   </a> </div>
                        </div>
                       <?php } ?>
                        
                    </div>
            </div>
             <div class="col-lg-12">
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