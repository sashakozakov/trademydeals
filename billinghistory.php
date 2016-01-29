<?php
include('header.php');
$userId = $_SESSION['userid'];
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
     <div class="content">
    <div class="container">
            <div class="col-lg-12">
            <div class="col-lg-9">
                <div class="col-lg-12 ads ">
                    <h4 style="color:#CC0000; border-bottom:#cc0000 solid 2px; padding-bottom:30px;">Billing History
                        <!--a href="membership1.php"><button type="button" class="btn  btn-danger pull-right">Upgrade Membership&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></button></a--></h4>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        
                      <div class="input-group pull-right col-lg-5">
                      <input type="text" class="form-control" style="padding:5px;">
                      <span class="input-group-addon" style="margin-left:10px;"><span class="glyphicon glyphicon-search"></span></span>                    </div>
                    </div>
                    <div class="col-lg-12 myads">
                    <br>
                        <a href="membership1.php" class="pull-right"><button type="button" class="btn  btn1 pull-right" style="margin-bottom:10px;">Renew Membership</button></a>
                        <div class="col-lg-2">
                        <p><a href="membershipuser.php"><button type="button" class="btn btn-lg btn-success btn1" style=" margin-top:15px;" id="myads">My Ads</button></a></p>
                        <p><a href="mydeals.php"><button type="button" class="btn btn-lg btn-success btn1" id="mydeals" style="margin-top:3px;">My Deals</button></a></p>          
                        <p><a href="mycoupon.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px;">My Coupons</button></a></p>
                        <p><a href="myflyer.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px;">My Flyers</button></a></p>
                        <p><a href="myjobs.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px;">My Jobs</button></a></p>
                        <p><a href="myresumes.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">My Resumes</button></a></p>
                         <p><a href="mymessages.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">My Message</button></a></p>
                        <p><a href="Editmyinfo.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">Edit my info</button></a></p>
                        <p><a href="billinghistory.php"><button type="button" class="btn btn-lg btn-success btn2" style="margin-top:3px;margin-left:0px;">Billing History</button></a></p>
                        </div>
                        <div class="col-lg-10">
                  <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Payment Status</th>
                                    <th>Payment Date</th>
                                    <th>Payment Method</th>
                                    <!--<th>Payment Method</th>-->
                                    <th>Action</th>
                                </tr>
                            </thead><?php
                             $adssql=mysql_query("SELECT * FROM `paypal_log` WHERE user_id='$userId'");
                             $count=0;
                             while ( $ads=mysql_fetch_array($adssql)) 
                             {
							  $txn_id = $ads['txn_id'];
							 //echo "SELECT payer_email,payment_status FROM purchases WHERE trasaction_id='".$txn_id."'";
							 $paymentQuery = mysql_query("SELECT payer_email,payment_status FROM purchases WHERE trasaction_id='".$txn_id."'");
							 $paymentResult = mysql_fetch_array($paymentQuery);	 
							 
							 $postDate = strtotime($ads['posted_date']);	 
							 $displayDate = date('m-d-Y',$postDate);
                             $count++;
                             ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $ads['txn_id']; ?></td>
                                    <td><?php echo $paymentResult['payment_status'];?></td>
                                    <td><?php echo $displayDate;?></td>
                                    <td><?php echo $ads['payment']; ?></td>
                                    <!--<td><?php //echo $ads['log']; ?></td>-->
                                    <td><a href="#"><span class="glyphicon glyphicon-search" style="margin-top:10px; margin-left:10px;" ></span></a></td>
                                </tr>
                                
                            </tbody><?php } ?>
                        </table>
                    </div>
                    </div>
                </div> 
                
                
                </div>
                
                
            </div>
              <?php 
include('footer.php');
                ?>
