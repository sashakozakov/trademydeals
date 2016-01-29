<?php
$page='ads';
include('header.php');
$userId = $_SESSION['userid'];
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<?php 

                   $single_query=mysql_query("SELECT * FROM `user` WHERE `id`='$userId' ");     
                   $single=mysql_fetch_array($single_query);
?>
   

<div class="content">
    <div class="container">
            <div class="col-lg-12">
            <div class="col-lg-9">
                <div class="col-lg-12">
                    <div class="col-lg-12"><form name="userform" action="userupdate.php" method="post" onsubmit="return checkUser();">
                            <h3 style="padding-bottom:20px; border-bottom:#000 solid 1px;">User Profile</h3>
                        </div>
                    <div class="col-lg-12">
                    <div class="col-lg-2">
                        <p><a href="membershipuser.php"><button type="button" class="btn btn-lg btn-success btn1" style=" margin-top:15px;margin-left:0px;" id="myads">My Ads</button></a></p>
                        <p><a href="mydeals.php"><button type="button" class="btn btn-lg btn-success btn1" id="mydeals" style="margin-top:3px;">My Deals</button></a></p>          
                        <p><a href="mycoupons.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px;">My Coupons</button></a></p>
                        <p><a href="myflyer.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px;">My Flyers</button></a></p>
                        <p><a href="myjobs.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px;">My Jobs</button></a></p>
                        <p><a href="myresumes.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">My Resumes</button></a></p>
                        <p><a href="mymessages.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">My Message</button></a></p>
                        <p><a href="Editmyinfo.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px;margin-left:0px;">Edit my info</button></a></p>
                        <p><a href="billinghistory.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">Billing History</button></a></p>
                        </div>
  
        	
                       <div class="col-lg-10">
                          
                          <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style=" text-align:left; color:#990000;">First Name</th>
                                    <th  style="padding-left:10px;"><?php echo $single['firstname']; ?></td>
                                </tr>
								
								<tr>
                                     <th style=" text-align:left; color:#990000;">Last Name</th>
                                     <th style="padding-left:10px;"><?php echo $single['lastname']; ?></td>
                                </tr>
								
								<tr>
                                     <th style=" text-align:left; color:#990000;">Company Name</th>
                                     <th style="padding-left:10px;"><?php echo $single['companyname']; ?></td>
                                </tr>
								
								<tr>
                                     <th style=" text-align:left; color:#990000;">Email</th>
                                     <th style="padding-left:10px;"><?php echo $single['email']; ?></td>
                                </tr>
								
								<tr>
                                     <th style=" text-align:left; color:#990000;">Country</th>
                                     <th style="padding-left:10px;"><?php echo $single['country']; ?></td>
                                </tr>
								
								<tr>
                                     <th style=" text-align:left; color:#990000;">State</th>
                                     <th style="padding-left:10px;"><?php echo $single['state']; ?></td>
                                </tr>
								
								<tr>
                                     <th style=" text-align:left; color:#990000;">City</th>
                                     <th style="padding-left:10px;"><?php echo $single['town']; ?></td>
                                </tr>
								
								<tr>
                                     <th style=" text-align:left; color:#990000;">Postal Code</th>
                                     <th style="padding-left:10px;"><?php echo $single['postalcode']; ?></td>
                                </tr>
								
								<tr>
                                     <th style=" text-align:left; color:#990000;">Billing Email</th>
                                     <th style="padding-left:10px;"><?php echo $single['billing_email']; ?></td>
                                </tr>
								
								<tr>
                                     <th style=" text-align:left; color:#990000;">Phone</th>
                                     <th style="padding-left:10px;"><?php echo $single['phone']; ?></td>
                                </tr>
                            </thead>
                           
                        </table>
                    </div>
                           
                       </div>
                
	
                        
                    </div>
                   </form>
         </div>
      </div>
                      <?php 
include('footer.php');
                ?>