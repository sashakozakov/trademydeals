<?php
include('header.php');
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
                                              ?>  <a href="membership1.php"><button type="button" class="btn  btn-danger pull-right">Upgrade Gold or Pro Membership&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></button></a></h4>

                                              <?php }
                  else{
                      ?>  <a href="membership1.php"><button type="button" class="btn  btn-danger pull-right">Upgrade Gold or Pro Membership&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></button></a></h4>
              <?php } ?>  </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-6">
                            <p><button type="button" class="btn btn-lg btn-success btn2" style="margin-right:20px; padding:10px 20px; ">inbox</button><button type="button" class="btn btn-lg btn-success btn1" style="margin-right:20px; padding:10px 20px; ">Send</button><button type="button" class="btn btn-lg btn-success btn1" style="margin-right:20px; padding:10px 20px; ">Delete</button></p>
                            </div>
                      <div class="input-group pull-right col-lg-5">
                      <input type="text" class="form-control" style="padding:5px;">
                      <span class="input-group-addon" style="margin-left:10px;"><span class="glyphicon glyphicon-search"></span></span>                    </div>
                    </div>
                    <div class="col-lg-12 myads">
                    <br>
                        <div class="col-lg-2">
                        <p><a href="membershipuser.php"><button type="button" class="btn btn-lg btn-success btn2" style="margin-top:3px" id="myads">My Ads</button></a></p>
                        <p><a href="mydeals.php"><button type="button" class="btn btn-lg btn-success btn1" id="mydeals" style="margin-top:3px">My Deals</button></a></p>           
                        <p><a href="mycoupons.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">My Coupons</button></a></p>
                        <p><a href="myflyers.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">My Flyers</button></a></p>
                        <p><a href="myjobs.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">My Jobs</button></a></p>
                        <p><a href="myresumes.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-left:0px; margin-top:15px;">My Resumes</button></a></p>
                         <p><a href="myflyers.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">My Message</button></a></p>
                        <p><a href="mymessages.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">Edit my info</button></a></p>
                        <p><a href="myresumes.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">Billing History</button></a></p>
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
                             $adssql=mysql_query("SELECT * FROM `ads` WHERE user_id='$user_id'");
                             $count=0;
                             while ( $ads=mysql_fetch_array($adssql)) 
                             {
                             $count++;
                             ?>
                            <tr>
                                
                                <td  style="padding-left:10px;"><?php echo $count; ?></td>
                                <td style="padding-left:60px;"><?php echo $ads['date_time']; ?></td>
                                <td style="padding-left:20px;"><?php echo $ads['ads_title']; ?></td>
                                <td style="padding-left:20px;" width="220px">
                                    <button type="button" class="btn btn-sm btn-success btn1">Edit</button>
                                    <button type="button" class="btn btn-sm btn-success btn1">View</button>
                                    <button type="button" class="btn btn-sm btn-success btn1">Delete</button>
<!--                                    <button type="button" class="btn btn-sm btn-success btn1">Extended</button>-->
                                </td>
                            </tr><?php } 
                            $count=0;
                            ?>
                         
                        </table>
                    </div>
                    </div>
                </div> 
               
                
                </div>
                
                
            </div>
           <?php
           include('footer.php')
           ?>