<?php
include('header.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <div class="content">
    <div class="container">
            <div class="col-lg-12">
            <div class="col-lg-9">
                <div class="col-lg-12">
                    <div class="col-lg-12"><form action="userupdate.php" method="post" >
                            <h3 style="padding-bottom:20px; border-bottom:#000 solid 1px;">Edit Details </h3>
                        </div>
                    <div class="col-lg-12">
                    <div class="col-lg-2">
                            <p><a href="membershipuser.php"><button type="button" class="btn btn-lg btn-success btn2" style=" margin-top:15px;margin-left:0px;" id="myads">My Ads</button></a></p>
                        <p><a href="mydeals.php"><button type="button" class="btn btn-lg btn-success btn1" id="mydeals" style="margin-top:3px;">My Deals</button></a></p>          
                        <p><a href="mycoupon.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px;">My Coupons</button></a></p>
                        <p><a href="myflyer.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px;">My Flyers</button></a></p>
                        <p><a href="myjobs.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px;">My Jobs</button></a></p>
                        <p><a href="myresumes.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">My Resumes</button></a></p>
                         <p><a href="mymessages.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">My Message</button></a></p>
                        <p><a href="editmyinfo.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">Edit my info</button></a></p>
                        <p><a href="billinghistory.php"><button type="button" class="btn btn-lg btn-success btn1" style="margin-top:3px">Billing History</button></a></p>
                        </div>
                        <div class="col-lg-10">
                        
                        <div class="col-lg-12">
                        <div class="col-lg-12">
                            <p>COUNTRY<i style="margin-left:10px; color:#CC0000; margin-top:10px;">*</i></p>
                             <select class="form-control" id="country" name ="country"></select>
                        </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="col-lg-6">
                        <p>FIRST NAME<i style=" color:#CC0000; margin-top:10px;">*</i></p>
                       
                        </div>
                        <div class="col-lg-6">
                        <p>LAST NAME<i style=" color:#CC0000; margin-top:10px;">*</i></p>
                       
                        </div>
                        </div>
                        
                        
                        
                        <div class="col-lg-12">
                        <div class="col-lg-6">
                       <input type="text" class="form-control" name='txtfirstname' value="<?php echo $userfetch['firstname']; ?>">
                       
                        </div>
                        <div class="col-lg-6">
                       <input type="text" class="form-control" name='txtlastname' value="<?php echo $userfetch['lastname']; ?>">
                       
                        </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="col-lg-12">
                            <p>COMPANY NAME<i style="margin-left:10px; color:#CC0000; margin-top:20px;">*</i></p>
                            <input type="text" class="form-control" name='txtcmpname' value="<?php echo $userfetch['companyname']; ?>">
                        </div>
                        </div>
                        
                        <div class="col-lg-12">
                        <div class="col-lg-12">
                            <p>TOWN/CITY<i style="margin-left:10px; color:#CC0000; margin-top:20px;">*</i></p>
                            <input type="text" class="form-control" name="town"  value="<?php echo $userfetch['town']; ?>">
                        </div>
                        </div>
                         <div class="col-lg-12">
                        <div class="col-lg-6">
                        <p>STATE/COUNTRY<i style=" color:#CC0000; margin-top:20px;">*</i></p>
                       
                        </div>
                        <div class="col-lg-6">
                        <p>POSTCODE/ZIP<i style=" color:#CC0000; margin-top:20px;">*</i></p>
                       
                        </div>
                        </div>
                        
                        
                        
                        <div class="col-lg-12">
                        <div class="col-lg-6">
                       <input type="text" class="form-control" value="<?php echo $userfetch['state']; ?>">
                       
                        </div>
                        <div class="col-lg-6">
                       <input type="text" class="form-control" value="<?php echo $userfetch['postalcode']; ?>">
                       
                        </div>
                        </div>
                         <div class="col-lg-12">
                        <div class="col-lg-6">
                        <p>EMAIL ADDRESS<i style=" color:#CC0000; margin-top:20px;">*</i></p>
                       
                        </div>
                        <div class="col-lg-6">
                        <p>PHONE<i style=" color:#CC0000; margin-top:20px;">*</i></p>
                       
                        </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="col-lg-6">
                       <input type="text" class="form-control" value="<?php echo $userfetch['billing_email']; ?>">
                       
                        </div>
                        <div class="col-lg-6">
                       <input type="text" class="form-control" name="phone" value="<?php echo $userfetch['phone']; ?>">
                       
                        </div>
                        </div>
                       <div class="col-lg-12">
                            <button type="submit" class="btn btn-lg btn-primary btn2" style=" margin-top:15px;margin-left:20px;" id="myads">Submit</button>
                       </div>
                        </div>
                        
                    </div>
                   </form>
         </div>
            </div>
              <?php 
include('footer.php');
                ?>
