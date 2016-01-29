<?php
include('header.php');
$userId = $_SESSION['userid'];
$profileQuery = mysql_query("SELECT * FROM user WHERE id=".$userId."");
$userDetails  = mysql_fetch_array($profileQuery);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <div class="content">
    <div class="container">
            <div class="col-lg-12">
            <div class="col-lg-9">
                <div class="col-lg-12">
                    <div class="col-lg-12"><form action="userProfile.php?editId=<?php echo $userId;?>" method="post">
                            <h3 style="padding-bottom:20px; border-bottom:#000 solid 1px;">Edit Profile </h3>
                        </div>
                    <div class="col-lg-12">
                   
                        <div class="col-lg-10">
                        
                        <div class="col-lg-12">
                       <!-- <div class="col-lg-12">
                            <p>COUNTRY<i style="margin-left:10px; color:#CC0000; margin-top:10px;">*</i></p>
                             <select class="form-control" id="country" name ="country"></select>
                        </div>-->
                        </div>
                        <div class="col-lg-12">
                        <div class="col-lg-6">
                        <p>Email Address<i style=" color:#CC0000; margin-top:10px;">*</i></p>
                        <input type="text" class="form-control" name="email" value="<?php echo $userDetails['email']; ?>"> 
                        </div>
                        <div class="col-lg-6">
                        <!--<p>LAST NAME<i style=" color:#CC0000; margin-top:10px;">*</i></p>-->
                        </div>
                        </div>
                        
                        
                        
                        <div class="col-lg-12">
                        <div class="col-lg-6">
                      
                       
                        </div>
                        <div class="col-lg-6">
                       <!--<input type="text" class="form-control" value="<?php echo $userfetch['lastname']; ?>">-->
                        </div>
                        </div>
                        
                        <div class="col-lg-12">
                        <div class="col-lg-12">
                            <!--<p>COMPANY NAME<i style="margin-left:10px; color:#CC0000; margin-top:20px;">*</i></p>
                            <input type="text" class="form-control" value="<?php echo $userfetch['companyname']; ?>">-->
                        </div>
                        </div>
                        
                        <div class="col-lg-12">
                        <div class="col-lg-12">
                            <!--<p>TOWN/CITY<i style="margin-left:10px; color:#CC0000; margin-top:20px;">*</i></p>
                            <input type="text" class="form-control" value="<?php echo $userfetch['town']; ?>">-->
                        </div>
                        </div>
                         <div class="col-lg-12">
                        <div class="col-lg-6">
                        <!--<p>STATE/COUNTRY<i style=" color:#CC0000; margin-top:20px;">*</i></p>-->
                       
                        </div>
                        <div class="col-lg-6">
                        <!--<p>POSTCODE/ZIP<i style=" color:#CC0000; margin-top:20px;">*</i></p>-->
                       
                        </div>
                        </div>
                        
                        
                        
                        <div class="col-lg-12">
                        <div class="col-lg-6">
                       <!--<input type="text" class="form-control" value="<?php echo $userfetch['state']; ?>">-->
                       
                        </div>
                        <div class="col-lg-6">
                       <!--<input type="text" class="form-control" value="<?php echo $userfetch['postalcode']; ?>">-->
                       
                        </div>
                        </div>
                         <div class="col-lg-12">
                        <div class="col-lg-6">
                        <!--<p>EMAIL ADDRESS<i style=" color:#CC0000; margin-top:20px;">*</i></p>-->
                       
                        </div>
                        <div class="col-lg-6">
                        <!--<p>PHONE<i style=" color:#CC0000; margin-top:20px;">*</i></p>-->
                       
                        </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="col-lg-6">
                      <!-- <input type="text" class="form-control" value="<?php echo $userfetch['billing_email']; ?>">-->
                       
                        </div>
                        <div class="col-lg-6">
                      <!-- <input type="text" class="form-control" value="<?php echo $userfetch['phone']; ?>">-->
                       
                        </div>
                        </div>
                       <div class="col-lg-12">
                            <button type="submit" class="btn btn-lg btn-primary btn2" style=" margin-top:15px;margin-left:20px;" id="myads">Update</button>
                       </div>
                        </div>
                        
                    </div>
                   </form>
         </div>
            </div>
              <?php 
include('footer.php');
                ?>