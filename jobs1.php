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
                  <div class="sub1" style="margin-top:20px; margin-bottom:15px; margin-left:-15px;">
                      <h4>Jobs</h4>
                    </div>

                    </div>
                     <div class="col-lg-2" style="margin-top:20px;">
         <a href="postjob.php"><button type="button" class="btn btn-danger btn-lg" style="border-top-left-radius:10px;
border-top-right-radius:10px;border-bottom-left-radius:10px; padding:8px 16px; 
border-bottom-right-radius:10px; margin-left:0px;">Post Jobs</button></a>

         </div>
                </div>
                
               
                        <div class="col-lg-12" style=" margin-top:20px;">
                  <div class="sub1 " style="background:#FFCC33; border:#FFCC33 solid 1px; border-radius:0px; ">
                      <h4>Top Jobs &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" style="color:#000; font-size:13px; text-decoration:underline;font-weight:700;">See all Top Jobs</a></h4>
                    </div>
                    <?php 
                   $top_query=mysql_query("SELECT * FROM `jobs` WHERE `promote_jobs1`='top' ORDER BY `id` DESC");     
                  while ($top=mysql_fetch_array($top_query)) {
                   ?>

                    <div class="col-lg-12 content3" style="background:#f4fcdd;" >
                      <div class="col-lg-1">
                          <img src="img/<?php echo $top['images']; ?>" style="margin-left:-30px;" width="100px" height="70px">
                        </div>
                        <div class="col-lg-11  ">
                           <a href="getjobs.php?id=<?php echo $top['id']; ?>"><h3 style="margin-left:20px;"><?php echo $top['jobs_title']; ?></h3>
                                        <p style="margin-left:20px;"><?php echo $top['description']; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5" style="margin-bottom:2px;">View</button>
                       </a> </div>
                    </div><?php } ?>
                
                  
                </div>
              
                <div class="col-lg-12" style=" margin-top:20px;">
                  <div class="sub1 col-lg-12" style="background:#b97a57; border:#FFCC33 solid 1px; border-radius:0px;">
                      <h4>Urgent Jobs &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" style="color:#000; font-size:13px; text-decoration:underline;font-weight:700;">See all Urgent Jobs</a></h4>
                    </div> <?php 
                   $urgent=mysql_query("SELECT * FROM `jobs` WHERE `urgent`='urgent' ORDER BY `id` DESC");     
                  while ($urgent1=mysql_fetch_array($urgent)) {
                   ?>
                    <div class="col-lg-12 content3"  >
                      <div class="col-lg-1">
                          <img src="img/<?php echo $urgent1['images']; ?>" style="margin-left:-30px;" width="100px" height="70px">
                        </div>
                        <div class="col-lg-11  ">
                           <a href="getjobs.php?id=<?php echo $urgent1['id']; ?>"><h3 style="margin-left:20px;"><?php echo $urgent1['jobs_title']; ?></h3></a>
                                        <p style="margin-left:20px;"><?php echo $urgent1['description']; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5" style="margin-bottom:2px;">View</button>
                     </a>   </div>
                    </div><?php } ?>
                   
                  
                </div>
                <div class="col-lg-12" style="margin-top:20px;">
                  <div class="sub1 col-lg-12" style="background:#4ca6e1; border:#FFCC33 solid 1px; border-radius:0px;">
                      <h4>All Jobs</h4>
                    </div>   <?php 
                      $filename = "jobs.php"; // name of this file 
$option = array (5, 10, 25, 50, 100, 200); 
$default = 6; // default number of records per page 
$action = $_SERVER['PHP_SELF']; // if this doesn't work, enter the filename 
//$search=isset($_REQUEST['search'])? $_REQUEST['search']:''; 
// $search=isset($_GET['search'])? $_GET['search']:'';     
     
        
$query = "SELECT * FROM `jobs` ORDER BY 'id'";
        
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
    
if($row->promote_jobs=='high'){
?>
<div class="col-lg-12  content3" style=" border:#CC0000 solid 4px;" >
    <?php }
else{ ?>
    <div class="col-lg-12  content3" ><?php
} ?>
  
                    
                      <div class="col-lg-1">
                          <img src="img/<?php echo $row->images; ?>" style="margin-left:-30px;"  width="100px" height="70px">
                        </div>
                        <div class="col-lg-11  ">
                           <a href="getjobs.php?id=<?php echo $row->id; ?>"><h3 style="margin-left:20px;"><?php echo $row->jobs_title; ?></h3>
                                        <p style="margin-left:20px;"><?php echo $row->description; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5" style="margin-bottom:2px;">View</button>
                        </a></div>
                    </div><?php } ?>
                   
                </div>
                 <div class="col-lg-12"><br>
                <div class="col-lg-9">
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


                    
                </div>
                </div>
            </div>
           <?php 
include('footer.php');
                ?>