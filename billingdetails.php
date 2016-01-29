<?php

include('header.php');
$_SESSION['membership']=$_GET['membership'];
$membership=$_GET['membership'];
$amount=$_GET['amount'];
 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

   <div class="content">
   	<div class="container">
    		<div class="col-lg-12">
        	<div class="col-lg-9">
            	<div class="col-lg-12">
                	<div class="sub1" style="margin-top:20px; margin-bottom:15px; margin-left:-5px;">
                    	<h4>Checkout</h4>
                    </div>
                   <?php if($amount) {?>
                    <form action="paypal/paypal.php" method="post"> 
                     <?php } 
                     else {
                      ?> <form action="billingdetails_process.php" method="post"><?php } ?> 
                  
                    <div class="col-lg-12">
                        <div class="col-lg-7">
                        <div class="col-lg-12">
                            <h3 style="padding-bottom:20px; border-bottom:#000 solid 1px;">Billing Details <i class="fa fa-chevron-circle-down" style="float:right;"></i></h3>
                        </div>
                       	<div class="col-lg-12">
                        <div class="col-lg-12">
                        	<p>COUNTRY<i style="margin-left:10px; color:#CC0000;">*</i></p>
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
                       <input type="text" name="payer_fname" class="form-control">
                       
                        </div>
                        <div class="col-lg-6">
                       <input type="text" name="payer_lname" class="form-control">
                       
                        </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="col-lg-12">
                        	<p>COMPANY NAME<i style="margin-left:10px; color:#CC0000; margin-top:20px;">*</i></p>
                            <input type="text" name="companyname" class="form-control">
                        </div>
                        </div>
                        
                        <div class="col-lg-12">
                        <div class="col-lg-12">
                        	<p>TOWN/CITY<i style="margin-left:10px; color:#CC0000; margin-top:20px;">*</i></p>
                            <input type="text" name="city" class="form-control">
                        </div>
                        </div>
                         <div class="col-lg-12">
                        <div class="col-lg-6">
                        <p>STATE<i style=" color:#CC0000; margin-top:20px;">*</i></p>
                       
                        </div>
                        <div class="col-lg-6">
                        <p>POSTCODE/ZIP<i style=" color:#CC0000; margin-top:20px;">*</i></p>
                       
                        </div>
                        </div>
                        
                        
                        
                        <div class="col-lg-12">
                        <div class="col-lg-6">
                      <select class="form-control" name ="state" id ="state"></select>
                       
                        </div>
                        <div class="col-lg-6">
                       <input type="text" name="payer_zip" class="form-control">
                       
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
                       <input type="text" name="payer_email" class="form-control">
                       
                        </div>
                        <div class="col-lg-6">
                       <input type="text" name="phone" class="form-control">
                       
                        </div>
                        </div>
                       
                        </div>
                        <div class="col-lg-5">
                        	<h3 style="color:#990000;">Have an Account?</h3>
                            <button type="button" class="btn btn-sm btn-success btn1" style="float:right; color:#fff;">Log in Account</button>
                        </div>
                    </div>
                    <div class="col-lg-12"></div>
                     <div class="col-lg-12" style="margin-top:40px;">
                          <div class="col-lg-6">
                            </div>
                          <div class="col-lg-4">
                          <p>ORDER TOTAL</p>
                          </div>
                           <div class="col-lg-1">
                           <?php echo $amount; ?>
                                 </div>
                                 </div>
                                
                   <div class="col-lg-12">
                	<div class="col-lg-12">
                     <br>
                                 <hr>
                        <div class="pay">
                    <li><input type="radio"></li>
                    <li><p>PAYPAL</p></li>
                  
                        <li><a href="#"><img src="images/img6.png"></a></li>
                        <li><a href="#"><img src="images/img5.png"></a></li>
                        <li><a href="#"><img src="images/img4.png"></a></li>
                        <li><a href="#"><img src="images/img3.png"></a></li>
                        <li><a href="#"><img src="images/img.png"></a></li>
                        <li><a href="#" style="color:#FF0000">What is PayPal?</a></div>
                        <br>
                                           </div>
                </div>
                <br>
                   
                     <div class="col-lg-12" style="border: black  solid  2px; padding:10px;">
                        <div class="col-lg-12" >
                        	<p><i style="margin-left:10px;margin-top:20px;">Pay via paypal you can pay with your credit card if you don't have a paypal account.</i></p>
                            
                        </div>
                        </div>
                        <input type="hidden" name="product_quantity" value="<?php echo rand(1, 4); ?>" />
                        <input type="hidden" name="product_name" value="<?php echo $membership; ?>" />
                       <input type="hidden" name="invoice" value="<?php echo date("His").rand(1234, 9632); ?>" />
                         <input type="hidden" name="action" value="process" />
    <input type="hidden" name="cmd" value="_cart" /> <?php // use _cart for cart checkout ?>
    <input type="hidden" name="currency_code" value="USD" />
                    <input type="hidden" name="product_amount" value="<?php echo $amount; ?>" />
                             
                                 
                   <div class="col-lg-12">
                   <br>
                      <hr> 
                     <div class="col-lg-6"></div>
                     <div class="col-lg-2"></div>
                     <div class="col-lg-4">
                       <input type="submit" class="btn btn-warning" style=" margin-top:20px;background:#000000; color:#FFFFFF;" value="PROCEED TO PAYPAL"/>
                           </div> 
                           </div>                         
                        </form>          
         </div>
            </div>
            <?php 
include('footer.php');
                ?>