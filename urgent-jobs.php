<?php
$page='jobs';
include('header.php');
 ?>
 <style>
 	.btn5{
		margin-bottom:0px;
	}
	.col-lg-2 .img-responsive {
		height: 100px;
		width: 100px;
	}
	.content3 {
		margin: 10px 0px;
		padding: 5px 0px;
	}
 </style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <div class="content">
    <div class="container">
     <div class="col-lg-12">
        <div class="col-lg-9">
            <div class="col-lg-12">
                <div class="sub1" style="margin-top:20px; margin-bottom:15px; margin-left:-5px;">
                    <h4>Urgent Jobs</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-12"  >
                    <div class="newcontent">
                        <?php
                        $option = array (5, 10, 25, 50, 100, 200); 
                        $default = 12; // default number of records per page 
                        $action = $_SERVER['PHP_SELF']; 
                        
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
                        
                        $top_query=mysql_query("SELECT * FROM `jobs` WHERE `urgent`='urgent' and payment_status = '1' ORDER BY id desc LIMIT $limit"); //date_time DESC
                        while ($top=mysql_fetch_array($top_query)) { ?>
                            <div class="col-lg-12 content3" style="background:#f4fcdd;" >
                              <div class="col-lg-2">
                                 <img src="img/<?php echo get_post_image($top['id'],'jobs');?>" class="img-responsive">
                                </div>
                                <div class="col-lg-10  ">
                                   	<a href="getjobs.php?id=<?php echo $top['id']; ?>"><h3 style="margin-left:20px;"><?php echo get_post_tile_string($top['jobs_title']); ?></h3>
                                        <p style="margin-left:20px;"><?php echo substr($top['description'],0,15).'...'; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5" style="margin-bottom:2px;">View</button>
                               		</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php 
                // control query------------------------------ 
                /* this query checks how many records you have in your table. 
                I created this query so we could be able to check if user is 
                trying to append number larger than the number of records 
                to the query string.*/
                $off_sql = mysql_query ("SELECT * FROM `jobs` WHERE `urgent`='urgent' and payment_status = '1'") or die ("Error in query: $off_sql".mysql_error()); 
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
                <div class="col-lg-12" style="margin:20px 0 0" align="center";>
                    <ul class="pagination">
                    <?php if ($off <> 1) { 
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
        </div>
<?php include('footer.php'); ?>