<?php
ob_start();
$page='membership';
include('header.php');
$username=mysql_query("SELECT * FROM user WHERE id=$user_id");
$static=mysql_fetch_array($username);
 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

   <div class="content">
   	<div class="container">
    <div class="col-lg-12">
        	<div class="col-lg-9">
            	
                	<div class="col-lg-12">
                	<div class="sub1" style="margin-top:20px; margin-bottom:15px; margin-left:-5px;">
                    	<h4>Ads</h4>
                    </div>
                    </div>
                    <div class="col-lg-12">
                    	<div class="table-responsive">
                        	<table class="table table-bordered">
                            	<thead>
                                	<tr style="background:#0099FF; border:none; text-align:center;">
                                    	<th></th>
                                        <th>Free</th>
                                        <th>Pro</th>
                                        <th>Gold</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<tr >
                                    	<td><p style="color:#00CC66; font-size:22px;">Ads</p></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                    	<td>Post Ads</td>
                                        <td style="text-align:center;">+</td>
                                        <td style="text-align:center;">+</td>
                                        <td style="text-align:center;">+</td>
                                    </tr>
                                     <tr>
                                    	<td>Home Page Gallery Ad</td>
                                        <td><p style="font-size:18px; text-align:center;">$20 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">3 Ads</p></td>
                                        <td><p style="font-size:18px; text-align:center;">5 Ads</p></td>
                                    </tr>
                                    <tr>
                                    	<td>Top Ad</td>
                                        <td><p style="font-size:18px; text-align:center;">$10 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">5 Ads</p></td>
                                        <td><p style="font-size:18px; text-align:center;">7 Ads</p></td>
                                    </tr>
                                     <tr>
                                    	<td>Highlighted Ad</td>
                                        <td><p style="font-size:18px; text-align:center;">$5 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">7 Ads</p></td>
                                        <td><p style="font-size:18px; text-align:center;">10 Ads</p></td>
                                    </tr>
                                    <tr>
                                    	<td>Sidebar Ad</td>
                                        <td><p style="font-size:18px; text-align:center;">$15 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">3 Ads</p></td>
                                        <td><p style="font-size:18px; text-align:center;">5 Ads</p></td>
                                    </tr>
                                    <tr>
                                    	<td>Homepage Slider Ad</td>
                                        <td><p style="font-size:18px; text-align:center;">$50 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">1 Ads</p></td>
                                        <td><p style="font-size:18px; text-align:center;">2 Ads</p></td>
                                    </tr>
                                    <tr >
                                    	<td><p style="color:#00CC66; font-size:22px;">Deals</p></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                    	<td>Post Deals</td>
                                        <td style="text-align:center;">+</td>
                                        <td style="text-align:center;">+</td>
                                        <td style="text-align:center;">+</td>
                                    </tr>
                                     <tr>
                                    	<td>Home Page Gallery Deals</td>
                                        <td><p style="font-size:18px; text-align:center;">$20 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">3 Deals</p></td>
                                        <td><p style="font-size:18px; text-align:center;">5 Deals</p></td>
                                    </tr>
                                    <tr>
                                    	<td>Top Deals</td>
                                        <td><p style="font-size:18px; text-align:center;">$10 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">5 Deals</p></td>
                                        <td><p style="font-size:18px; text-align:center;">7 Deals</p></td>
                                    </tr>
                                     <tr>
                                    	<td>Highlighted Deals</td>
                                        <td><p style="font-size:18px; text-align:center;">$5 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">7 Deals</p></td>
                                        <td><p style="font-size:18px; text-align:center;">10 Ads</p></td>
                                    </tr>
                                    <tr>
                                    	<td>Sidebar Deals</td>
                                        <td><p style="font-size:18px; text-align:center;">$15 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">3 Deals</p></td>
                                        <td><p style="font-size:18px; text-align:center;">5 Deals</p></td>
                                    </tr>
                                    <tr>
                                    	<td>Homepage Slider Ad</td>
                                        <td><p style="font-size:18px; text-align:center;">$50 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">1 Ads</p></td>
                                        <td><p style="font-size:18px; text-align:center;">2 Ads</p></td>
                                    </tr>
                                    
                                     <tr >
                                    	<td><p style="color:#00CC66; font-size:22px;">Coupons</p></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                    	<td>Post Coupon</td>
                                        <td style="text-align:center; font-size:18px;">$20 for each</td>
                                        <td style="text-align:center; font-size:18px;">3 Coupons</td>
                                        <td style="text-align:center; font-size:18px;">5 Coupons</td>
                                    </tr>
                                     <tr>
                                    	<td>Home Page Gallery Coupon</td>
                                        <td><p style="font-size:18px; text-align:center;">$20 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">3 Coupons</p></td>
                                        <td><p style="font-size:18px; text-align:center;">5 Coupons</p></td>
                                    </tr>
                                    <tr>
                                    	<td>Top Coupon</td>
                                        <td><p style="font-size:18px; text-align:center;">$10 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">5 Coupons</p></td>
                                        <td><p style="font-size:18px; text-align:center;">7 Coupons</p></td>
                                    </tr>
                                     <tr>
                                    	<td>Highlighted Coupon</td>
                                        <td><p style="font-size:18px; text-align:center;">$5 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">7 Coupons</p></td>
                                        <td><p style="font-size:18px; text-align:center;">10 Coupons</p></td>
                                    </tr>
                                    <tr>
                                    	<td>Sidebar Coupon</td>
                                        <td><p style="font-size:18px; text-align:center;">$15 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">3 Coupons</p></td>
                                        <td><p style="font-size:18px; text-align:center;">5 Coupons</p></td>
                                    </tr>
                                    <tr>
                                    	<td>Homepage Slider Coupon</td>
                                        <td><p style="font-size:18px; text-align:center;">$50 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">1 Coupons</p></td>
                                        <td><p style="font-size:18px; text-align:center;">2 Coupons</p></td>
                                    </tr>
                                    
                                     <tr >
                                    	<td><p style="color:#00CC66; font-size:22px;">Flyers</p></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                    	<td>Post Flyer</td>
                                        <td style="text-align:center; font-size:18px;">$20 for each</td>
                                        <td style="text-align:center; font-size:18px;">3 Flyers</td>
                                        <td style="text-align:center; font-size:18px;">5 Flyers</td>
                                    </tr>
                                     <tr>
                                    	<td>Home Page Gallery Flyer</td>
                                        <td><p style="font-size:18px; text-align:center;">$20 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">3 Flyers</p></td>
                                        <td><p style="font-size:18px; text-align:center;">5 Flyers</p></td>
                                    </tr>
                                    <tr>
                                    	<td>Top Flyer</td>
                                        <td><p style="font-size:18px; text-align:center;">$10 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">5 Flyers</p></td>
                                        <td><p style="font-size:18px; text-align:center;">7 Flyers</p></td>
                                    </tr>
                                     <tr>
                                    	<td>Highlighted Flyer</td>
                                        <td><p style="font-size:18px; text-align:center;">$5 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">7 Flyers</p></td>
                                        <td><p style="font-size:18px; text-align:center;">10 Flyers</p></td>
                                    </tr>
                                    <tr>
                                    	<td>Sidebar Flyer</td>
                                        <td><p style="font-size:18px; text-align:center;">$15 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">3 Flyers</p></td>
                                        <td><p style="font-size:18px; text-align:center;">5 Flyers</p></td>
                                    </tr>
                                    <tr>
                                    	<td>Homepage Slider Flyer</td>
                                        <td><p style="font-size:18px; text-align:center;">$50 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">1 Flyers</p></td>
                                        <td><p style="font-size:18px; text-align:center;">2 Flyers</p></td>
                                    </tr>
                                    
                                     <tr >
                                    	<td><p style="color:#00CC66; font-size:22px;">Jobs</p></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                    	<td>Post job</td>
                                        <td style="text-align:center;">+</td>
                                        <td style="text-align:center;">+</td>
                                        <td style="text-align:center;">+</td>
                                    </tr>
                                     <tr>
                                    	<td>Home Page Gallery Job</td>
                                        <td><p style="font-size:18px; text-align:center;">$20 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">3 Jobs</p></td>
                                        <td><p style="font-size:18px; text-align:center;">5 Jobs</p></td>
                                    </tr>
                                    <tr>
                                    	<td>Top Job</td>
                                        <td><p style="font-size:18px; text-align:center;">$10 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">5 Jobs</p></td>
                                        <td><p style="font-size:18px; text-align:center;">7 Jobs</p></td>
                                    </tr>
                                     <tr>
                                    	<td>Highlighted Job</td>
                                        <td><p style="font-size:18px; text-align:center;">$5 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">7 Jobs</p></td>
                                        <td><p style="font-size:18px; text-align:center;">10 Jobs</p></td>
                                    </tr>
                                    <tr>
                                    	<td>Sidebar Job</td>
                                        <td><p style="font-size:18px; text-align:center;">$15 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">3 Jobs</p></td>
                                        <td><p style="font-size:18px; text-align:center;">5 Jobs</p></td>
                                    </tr>
                                    <tr>
                                    	<td>Homepage Slider Job</td>
                                        <td><p style="font-size:18px; text-align:center;">$50 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">1 Jobs</p></td>
                                        <td><p style="font-size:18px; text-align:center;">2 Jobs</p></td>
                                    </tr>

                                     <tr >
                                    	<td><p style="color:#00CC66; font-size:22px;">Resumes</p></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                    	<td>Post Resume</td>
                                        <td style="text-align:center;">+</td>
                                        <td style="text-align:center;">+</td>
                                        <td style="text-align:center;">+</td>
                                    </tr>
                                     <tr>
                                    	<td>Home Page Gallery Resume</td>
                                        <td><p style="font-size:18px; text-align:center;">$20 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">3 Resumes</p></td>
                                        <td><p style="font-size:18px; text-align:center;">5 Resumes</p></td>
                                    </tr>
                                    <tr>
                                    	<td>Top Resume</td>
                                        <td><p style="font-size:18px; text-align:center;">$10 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">5 Resumes</p></td>
                                        <td><p style="font-size:18px; text-align:center;">7 Resumes</p></td>
                                    </tr>
                                     <tr>
                                    	<td>Highlighted Resume</td>
                                        <td><p style="font-size:18px; text-align:center;">$5 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">7 Resumes</p></td>
                                        <td><p style="font-size:18px; text-align:center;">10 Resumes</p></td>
                                    </tr>
                                    <tr>
                                    	<td>Sidebar Resume</td>
                                        <td><p style="font-size:18px; text-align:center;">$15 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">3 Resumes</p></td>
                                        <td><p style="font-size:18px; text-align:center;">5 Resumes</p></td>
                                    </tr>
                                    <tr>
                                    	<td>Homepage Slider Resume</td>
                                        <td><p style="font-size:18px; text-align:center;">$50 for each</p></td>
                                        <td><p style="font-size:18px; text-align:center;">1 Resumes</p></td>
                                        <td><p style="font-size:18px; text-align:center;">2 Resumes</p></td>
                                    </tr>

                                    


                                    



                                    

                                </tbody>
                                <tfoot>
                                	<tr>
                                    	<td><p style="font-size:22px; color:#FF9900">Price Per Month</p></td>
                                         <td><p style="font-size:18px; text-align:center;color:#FF9900">Free</p></td>
                                        <td><p style="font-size:18px; text-align:center;color:#FF9900">$70</p></td>
                                        <td><p style="font-size:18px; text-align:center;color:#FF9900">$110</p></td>
                                        
                                    </tr>
                                    <tr style="text-align:center;">
                                    	<td></td>
                                     <?php if($user_id)
                                     { if($static['status']=='Free Membership'){
                                        ?><td>You Are a Free-Membership</td><?php
                                     }
                                     else
                                     {
                                     ?>
                                        <td><a href="billingdetails.php?membership=<?php echo 'Free Membership'; ?>"><button type="button" class="btn btn-lg btn-danger">Select</button></a></td>
                                       <?php }
                                       if($static['status']=='Pro Membership')
                                        {?>
                                      <td>You Are a Pro-Membership</td><?php
                                     }
                                     else
                                     {
                                     ?>
                                        <td><a href="billingdetails.php?membership=<?php echo'Pro Membership'; ?>&amount=70"><button type="button" class="btn btn-lg btn-danger">Select</button></a></td>
                                        <?php } if($static['status']=='Gold Membership')
                                        {?>
                                      <td>You Are a Gold-Membership</td><?php
                                     }
                                     else
                                     {
                                     ?><td><a href="billingdetails.php?membership=<?php echo "Gold Membership"; ?>&amount=110"><button type="button" class="btn btn-lg btn-danger">Select</button></a></td>
                                   <?php } }else
                                   { ?> <td><a href="signin.php?membership=<?php echo 'Free Membership'; ?>"><button type="button" class="btn btn-lg btn-danger">Select</button></a></td>
                                        <td><a href="signin.php?membership=<?php echo'Pro Membership'; ?>&amount=70"><button type="button" class="btn btn-lg btn-danger">Select</button></a></td>
                                        <td><a href="signin.php?membership=<?php echo "Gold Membership"; ?>&amount=110"><button type="button" class="btn btn-lg btn-danger">Select</button></a></td>
                                   <?php } ?>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
           
            </div>
           
              <?php 
include('footer.php');
                ?>