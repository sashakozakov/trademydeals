<?php
include('header.php');
$messageCount = mysql_query("SELECT * FROM messages WHERE receiver_id=".$user_id."");
$messageRow = mysql_num_rows($messageCount);
?>
   <div class="content">
    <div class="container">
            <div class="col-lg-12">
            <div class="col-lg-9">
                <div class="col-lg-12 ads ">
                    <h4 style="color:#CC0000; border-bottom:#cc0000 solid 2px; padding-bottom:30px;">My Account
                      <?php
                      if($userfetch['status']=='Gold Membership'){

                      }
                      elseif ($userfetch['status']=='Pro Membership') 
                      {
                                              ?>  <!--a href="membership1.php"><button type="button" class="btn  btn-danger pull-right">Upgrade Gold or Pro Membership&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></button></a--></h4>

                                              <?php }
                  else{
                      ?>  <!--a href="membership1.php"><button type="button" class="btn  btn-danger pull-right">Upgrade Gold or Pro Membership&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></button></a--></h4>
              <?php } ?>  </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-6">
                            <p><button type="button" class="btn btn-lg btn-success btn2" style="margin-right:20px; padding:10px 20px; ">inbox<span style="color:#ff0000;">(<?php echo $messageRow;?>)</span></button><button type="button" class="btn btn-lg btn-success btn1" style="margin-right:20px; padding:10px 20px; ">Send</button><button type="button" class="btn btn-lg btn-success btn1" style="margin-right:20px; padding:10px 20px; ">Delete</button></p>
                            </div>
                      <div class="input-group pull-right col-lg-5">
                      <input type="text" class="form-control" style="padding:5px;">
                      <span class="input-group-addon" style="margin-left:10px;"><span class="glyphicon glyphicon-search"></span></span>                    </div>
                    </div>
                    <div class="col-lg-12 myads">
                    <br>
                        <div class="col-lg-2">
                        <p><a href="membershipuser.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-left:0px; margin-top:15px;" id="myads">My Ads</button></a></p>
                        <p><a href="mydeals.php"><button type="button" class="btn btn-lg btn-success btn1" id="mydeals" style="margin-top:3px">My Deals</button></a></p>           
                        <p><a href="mycoupons.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">My Coupons</button></a></p>
                        <p><a href="myflyers.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">My Flyers</button></a></p>
                        <p><a href="myjobs.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">My Jobs</button></a></p>
                        <p><a href="myresumes.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">My Resumes</button></a></p>
                         <p><a href="mymessages.php"><button type="button" class="btn btn-lg btn-success btn2" style="margin-top:3px;margin-left:0px;">My Message</button></a></p>
                        <p><a href="editmyinfo.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">Edit my info</button></a></p>
                        <p><a href="billinghistory.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">Billing History</button></a></p>
                        </div>
                        <div class="col-lg-10">
                  <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th style=" text-align:center; color:#990000;">#</th>
                                    <th style="  text-align:center;color:#990000;">Date</th>
                                    <th style=" text-align:center; color:#990000;">Subject</th>
                                    <th style="  text-align:center;color:#990000;">Actions</th>
                                </tr>
                            </thead><?php
							$option = array (5, 10, 25, 50, 100, 200); 
							$default = 12; // default number of records per page 
							$action = $_SERVER['PHP_SELF']; // if this doesn't work, enter the filename 
							
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
							 
                             $adssql=mysql_query("SELECT * FROM `messages` WHERE receiver_id='$user_id' LIMIT $limit");
						     //echo "SELECT * FROM `messages` WHERE receiver_id='$user_id'"; 
                             $sn=0;
                             while ( $ads=mysql_fetch_array($adssql)) 
                             {
							 $receiverId = $ads['user_id'];
							 $messageId = $ads['id'];
                             $sn++;
                             ?>
                            <tr>
                                <td  style="padding-left:10px;"><?php echo $sn; ?></td>
                                <td style="padding-left:60px;"><?php echo $ads['date']; ?></td>
                                <td style="padding-left:20px;"><?php echo $ads['messages']; ?></td>
                                <td style="padding-left:20px;"><a href="reply.php?rId=<?php echo $receiverId;?>"><button type="button" class="btn btn-sm btn-success btn1">Reply</button></a><a href="viewMessage.php?id=<?php echo $messageId;?>"><button type="button" class="btn btn-sm btn-success btn1">View</button></a><a href="delMessage.php?id=<?php echo $messageId;?>"><button type="button" class="btn btn-sm btn-success btn1">Delete</button></a></td>
                            </tr><?php } 
                            $sn=0;
                            ?>
                        </table>
                        <?php
						// control query------------------------------ 
                        /* this query checks how many records you have in your table. 
                        I created this query so we could be able to check if user is 
                        trying to append number larger than the number of records 
                        to the query string.*/ 
                        $off_sql = mysql_query ("SELECT * FROM `messages` WHERE user_id='$user_id'") or die ("Error in query: $off_sql".mysql_error()); 
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
               
                
                </div>
                
                
            </div>
           <?php
           include('footer.php')
           ?>