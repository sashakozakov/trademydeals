<?php
include('header.php');
$username=mysql_query("SELECT * FROM user WHERE id=$user_id");
$static=mysql_fetch_array($username);
$membership_table=mysql_query("SELECT * FROM membership WHERE user_id=$user_id ORDER BY id desc LIMIT 1");
$membership_value=mysql_fetch_array($membership_table);
?>
   <?php 
if ($static['status']=='Pro Membership' OR $static['status']=='Gold Membership') { ?>
<form action="flyers_process.php" method="post" enctype="multipart/form-data" name="listForm" >
<?php 
} 
else{ ?>
  <form action="paypal2/paypal3.php?sandbox=1" method="post" enctype="multipart/form-data" name="listForm" >
<?php
}
?>
    <div class="content">
      <div class="container">
        <div class="col-lg-12">
          <div class="col-lg-9">
              <div class="col-lg-12">
                  <div class="deals_content">
                      <h4>Post Deal  &nbsp;&nbsp;&nbsp;</h4>
                        <div class="deals_sub">
                          <h4>Deals Details</h4>
                        </div>
                        <div class="deals_form">
                          <div class="col-lg-12">
                                <div class="col-lg-3">
                                    <p>Deal Title<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                </div>
                                <div class="col-lg-7">
                                      <input name="title" type="text" class="form-control">
                                       <input name="user_id" type="hidden" value="<?php echo $user_id; ?>">
                                       <input name="product" type="hidden" value="<?php echo "flyers"; ?>">
                                        <input type="hidden" name="cmd" value="_cart" /> <?php // use _cart for cart checkout ?>
    <input type="hidden" name="currency_code" value="USD" />
                                </div>
                                <div class="col-lg-2">
                                </div>
                            </div>
                            <div class="col-lg-12" style="margin-top:20px;">
                                <div class="col-lg-3">
                                    <p>Company Name</p>
                                </div>
                                <div class="col-lg-7">
                                      <input name="company" type="text" class="form-control">
                                </div>
                                <div class="col-lg-2">
                                </div>
                            </div>
                            <div class="col-lg-12" style="margin-top:20px;">
                                <div class="col-lg-3">
                                    <p> Deals Description<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                </div>
                                <div class="col-lg-8">
                                      <textarea name="description" class="form-control"></textarea>
                                </div>
                                <div class="col-lg-1">
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
              
                <div class="col-lg-12">
                  <div class="deals_content">
                      <br>
                        <div class="deals_sub">
                          <h4>Deals Location</h4>
                        </div>
                        <div class="deals_form">
                          <div class="col-lg-12">
                                <div class="col-lg-3">
                                    <p>Country</p>
                                </div>
                                <div class="col-lg-5">
                                     <select class="form-control" id="country" name ="country"></select>
                                </div>
                                <div class="col-lg-4">
                                </div>
                            </div>
                            <div class="col-lg-12" style="margin-top:20px;">
                                <div class="col-lg-3">
                                    <p>State</p>
                                </div>
                                <div class="col-lg-5">
                                    <select class="form-control" name ="state" id ="state"></select>
                                </div>
                                <div class="col-lg-4">
                                </div>
                            </div>
                            <div class="col-lg-12" style="margin-top:20px;">
                                <div class="col-lg-3">
                                    <p>City</p>
                                </div>
                                <div class="col-lg-7">
                                     <input name="city" type="text" class="form-control">
                                </div>
                                <div class="col-lg-2">
                                </div>
                            </div>
                            <div class="col-lg-12" style="margin-top:20px;">
                                <div class="col-lg-3">
                                    <p>Postal code or Street</p>
                                </div>
                                <div class="col-lg-7">
                                     <input name="postalcode" type="text" class="form-control">
                                </div>
                                <div class="col-lg-2">
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
              
                <div class="col-lg-12">
                  <div class="deals_content">
                      <br>
                        <div class="deals_sub">
                          <h4>Your Contact Information</h4>
                        </div>
                        <div class="deals_form">
                          
                            
                            <div class="col-lg-12" style="margin-top:20px;">
                                <div class="col-lg-3">
                                    <p>Phone</p>
                                </div>
                                <div class="col-lg-7">
                                     <input name="current_city" type="text" class="form-control">
                                </div>
                                <div class="col-lg-2">
                                </div>
                            </div>
                            <div class="col-lg-12" style="margin-top:20px;">
                                <div class="col-lg-3">
                                    <p>Email</p>
                                </div>
                                <div class="col-lg-7">
                                     <input name="current_postalcode" type="text" class="form-control">
                                </div>
                                <div class="col-lg-2">
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
            
                <div class="col-lg-12">
                  <div class="deals_content">
                      <br>
                        <div class="deals_sub">
                          <h4>Links and Pictures</h4>
                        </div>
                        <div class="deals_form">
                          
                            
                            <div class="col-lg-12">
                                <div class="col-lg-1">
                                    <input type="checkbox" class=" click1" name="website" value="5"  id="website"                onClick="checkTotal()">
                                </div>
                                <div class="col-lg-4">
                                     <a href="#"><button type="button" class="btn btn-warning btn-sm" style="border:none; margin-left:-30px; margin-top:5px;">Website Link</button>&nbsp; 7days - 58.50</a>
                                </div>
                                
                                 <div class="col-lg-1">
                                    <input type="checkbox" class="click11" >
                                </div>
                                <div class="col-lg-2">
                                     <button type="button" class="btn btn-warning btn-sm" style="border:none; margin-left:-30px; margin-top:5px;">You Tube</button>
                                </div>
                                 <div class="col-lg-1">
                                    <input type="checkbox" class="click111">
                                </div>
                                <div class="col-lg-2">
                                     <button type="button" class="btn btn-warning btn-sm" style="border:none; margin-left:-30px; margin-top:5px;">Images</button>
                                </div>
                                <div class="col-lg-1">
                                </div>
                            </div>
                            <div class="deals_click">  <br>
                            <div class="col-lg-12">
                                <div class="col-lg-3">
                                    <p>Website URL<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                </div>
                                <div class="col-lg-7">
                                      <input name="website1" type="text" class="form-control">
                                </div>
                                <div class="col-lg-2">
                                </div>
                            </div> </div>
                            <div class="col-lg-12" style="margin-top:10px;" id="deals_click11">
                                <div class="col-lg-3">
                                    <p>Youtube Link<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                </div>
                                <div class="col-lg-7">
                                      <input name="youtube" type="text" class="form-control">
                                </div>
                                <div class="col-lg-2">
                                </div>
                            </div>  
                            <div class="col-lg-12" style="margin-top:10px;" id="deals_click111">
                                <div class="col-lg-3">
                                   <p>Logo images<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                    <p>Deals images<i style="margin-left:10px; color:#CC0000;">*</i></p>
                                </div>
                                <div class="col-lg-2">
                                       <input type="file" name="file2" class="btn btn btn-primary btn6" value="Post Your Deal"/><br />
                                       <input type="file" name="file" class="btn btn btn-primary btn6" value="Post Your Deal"/>
                                </div>
                                <div class="col-lg-7">
                                </div>
                            </div> 
                             <div class="col-lg-12" style="margin-top:10px;">
                             
                             </div> 
                            </div>                       
                        </div>
                    
                 </div><?php 
if ($static['status']=='Pro Membership' OR $static['status']=='Gold Membership') {
}
              else  {?>
                 <div class="col-lg-12">
                  <div class="deals_content">
                      <br>
                        <div class="deals_sub">
                          <h4>Deal Publishing Plan</h4>
                        </div>
                        <div class="deals_form">
                          
                            
                            <div class="col-lg-12" >
                                <div class="col-lg-1">
                                    <input type="radio" name="regular" value="20"  onClick="checksubtotal(this.value)"/>
                                </div>
                                <div class="col-lg-7">
                                <p style="background:#f79e12; padding:5px; margin-left:-20px; margin-top:5px;">Regular - $20permonth(post will be on Deals page)</p>
                                </div>
                                <div class="col-lg-4"></div>
                            </div>  
                             <div class="col-lg-12">
                                <div class="col-lg-1" >
                                    <input type="radio" name="regular" value="30" onClick="checksubtotal(this.value)"/>
                                </div>
                                <div class="col-lg-7">
                                <p style="background:#f79e12; padding:5px; margin-left:-20px; margin-top:5px;">premium -$60permonth(post will be on Homepage-Gallery Section)</p>
                                </div>
                                <div class="col-lg-4"></div>
                            </div>       
                             <div class="col-lg-12">
                                <div class="col-lg-1">
                                    <input type="radio"  name="regular" value="40" onClick="checksubtotal(this.value)"/>
                                </div>
                                <div class="col-lg-5">
                                <p style="background:#f79e12; padding:5px; margin-left:-20px;margin-top:5px;">premium -$80 per 2months)</p>
                                </div>
                                <div class="col-lg-6"></div>
                            </div>       
                                                      
                        </div>
                    </div>
                 </div><?php } ?>
                 <script type="text/javascript "src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> 
<script type='text/javascript'>
$(document).ready(function(){
$("#show1").show();
$(".click2").change(function(){
  var user_id=$("#user_id").val();
  var user_value1=$(".click2").val();
  $.ajax({
    url: "display_process3.php",
    type:"POST",
    data:{user_id : user_id,user_value1 : user_value1},
    success:function(data){
      console.log(data);
      //return false;
      $("#show1").html(data);
      }
    })
  });
$(".click3").change(function(){
  var user_id=$("#user_id").val();
  var user_value1=$(".click3").val();
  $.ajax({
    url: "display_process3.php",
    type:"POST",
    data:{user_id : user_id,user_value1 : user_value1},
    success:function(data){
      console.log(data);
      //return false;
      $("#show2").html(data);
      }
    })
  });
$(".click4").change(function(){
  var user_id=$("#user_id").val();
  var user_value1=$(".click4").val();
  $.ajax({
    url: "display_process3.php",
    type:"POST",
    data:{user_id : user_id,user_value1 : user_value1},
    success:function(data){
      console.log(data);
      //return false;
      $("#show3").html(data);
      }
    })
  });
$(".click5").change(function(){
  var user_id=$("#user_id").val();
  var user_value1=$(".click5").val();
  $.ajax({
    url: "display_process3.php",
    type:"POST",
    data:{user_id : user_id,user_value1 : user_value1},
    success:function(data){
      console.log(data);
      //return false;
      $("#show4").html(data);
      }
    })
  });
$(".click6").change(function(){
  var user_id=$("#user_id").val();

  var user_value1=$(".click6").val();
  $.ajax({
    url: "display_process3.php",
    type:"POST",
    data:{user_id : user_id,user_value1 : user_value1},
    success:function(data){
      console.log(data);
      //return false;
      $("#show5").html(data);
      }
    })
  });
  });
</script>


                 <div class="col-lg-12">
                  <div class="deals_content">
                      <br><input type="hidden" value="<?php echo $user_id; ?>" id="user_id" />
                        <div class="deals_sub">
                          <h4>Promote Your Flyer</h4>
                        </div>
                        <div class="deals_form">
                          
                            
                            <div class="col-lg-12">
                                <div class="col-lg-1">
                                    <input type="checkbox" class="click2" name="highlight" value="high">
                                </div>
                                <div class="col-lg-5">
                                <p style="background:#f79e12; padding:5px; margin-left:-20px; margin-top:5px;">Hightlighted Flyer</p>
                                </div>
                                <div id="show1" class="col-lg-6"></div>
                            </div>  
                            <div class="deals_work2">
                             <div class="col-lg-12">
                              <div class="col-lg-1"></div>
                              <?php 
if ($static['status']=='Pro Membership' OR $static['status']=='Gold Membership') 
{
}
              else  {?>
                                <div class="col-lg-1">
                                    <input type="radio" name="high" value="5" onClick="subtotal()">
                                </div>
                                <div class="col-lg-3">
                                <p style=" margin-left:-20px; margin-top:5px;">$5per</p>
                                </div>
                                <div class="col-lg-2">
                                  <select name="select1" onClick="subtotal()">
                                  <option value="7">7 Days</option>
                                  <option value="14">14 Days</option>
                                  </select>
                                </div>
                                <div class="col-lg-1">
                                  <p><input type="text" name="output" value="$0" style="border:none; background:#e2e2e2;"></p>
                                </div>
                                <div class="col-lg-1"></div><?php } ?>
                            </div>  <?php
if ($static['status']=='Gold Membership' )

                         { }
                         else {  ?>
                            <div class="col-lg-12">
                              <div class="col-lg-1"></div>
                              <div class="col-lg-1">
                                    <input type="radio" name="high" class="click7" value="high_premium">
                                </div>
                                <div class="col-lg-4">
                                <p style=" margin-left:-20px; margin-top:5px;">Become a member:</p>
                                </div>
                                <div class="col-lg-6">
                                
                                </div>
                              
                            </div><div class="deals_work7">
                             <div class="col-lg-12"> <?php
if ($static['status']=='Pro Membership' )

                         { }
                         else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-1">
                                    <input type="radio" name="membership" value="50"  onClick="checksubtotal(this.value)" >
                                </div>
                                
                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">pro member -$50per month</p>
                                </div><?php } ?>
                                <div class="col-lg-2">
                                
                                </div>
                                <div class="col-lg-1">
                                    <input type="radio"  name="membership" value="80"  onClick="checksubtotal(this.value)">
                                </div>
                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">Gold member -$80per month</p>
                                </div>
                                <div class="col-lg-3">
                                
                                </div>
                              
                            </div>
                            <div class="col-lg-12"> <?php
if ($static['status']=='Pro Membership' )

                         { }
                         else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-4" style="border:#fff solid 1px;">
                                
                                <p style=" margin-top:10px;">you'll have 5 highlighted Flyers included + more</p>
                                  <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div><?php } ?>
                                <div class="col-lg-2">
                                   
                                </div>
                                <div class="col-lg-4" style="border:#fff solid 1px;">
                                 <p style=" margin-left:-10px; margin-top:10px;">you'll have 10 highlighted Flyers included + a lot more</p>
                                 <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div>
                                <div class="col-lg-1">
                                
                                </div>
                              
                            </div>
                                          </div><?php } ?>

                          </div> 
                             <div class="col-lg-12">
                                <div class="col-lg-1">
                                    <input type="checkbox" class=" click3" name="promote_ads1" value="top">
                                </div>
                                <div class="col-lg-5">
                                <p style="background:#f79e12; padding:5px; margin-left:-20px; margin-top:5px;">Top Flyer</p>
                                </div>
                                <div id="show2" class="col-lg-6"></div>
                            </div>  
                            <div class="deals_work3">
                             <div class="col-lg-12">
                              <div class="col-lg-1"></div>
                              <?php 
if ($static['status']=='Pro Membership' OR $static['status']=='Gold Membership') {
}
              else  {?>
                                <div class="col-lg-1">
                                    <input type="radio" name="top" value="8" onClick="subtotalnew()">
                                </div>
                                <div class="col-lg-3">
                                <p style=" margin-left:-20px; margin-top:5px;">$8per</p>
                                </div>
                                <div class="col-lg-2">
                                  <select name="select2" onClick="subtotalnew()">
                                    <option value="7">7 Days</option>
                                    <option value="14">14 Days</option>
                                  </select>
                                </div>
                                <div class="col-lg-1">
                                  <p><input type="text" name="output1" value="$0" style="border:none; background:#e2e2e2;"></p>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>  <?php
if ($static['status']=='Gold Membership' )

                         { }
                         else {  ?>
                            <div class="col-lg-12">
                              <div class="col-lg-1"></div>
                              <div class="col-lg-1">
                                    <input type="radio" class="click8" name="top" value="top_premium">
                                </div>
                                <div class="col-lg-4">
                                <p style=" margin-left:-20px; margin-top:5px;">Become a member:</p>
                                </div>
                                <div class="col-lg-6">
                                
                                </div>
                              
                            </div><?php } ?><div class="deals_work8">
                             <div class="col-lg-12"> <?php
if ($static['status']=='Pro Membership' )

                         { }
                         else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-1">
                                    <input type="radio" name="member1" value="50" onClick="checksubtotal(this.value)">
                                </div>
                                
                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">pro member -$50 per month</p>
                                </div><?php } ?>
                                <div class="col-lg-2">
                                
                                </div>
                                <div class="col-lg-1">
                                    <input type="radio"  name="member1" value="80" onClick="checksubtotal(this.value)">
                                </div>
                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">Gold member -$80 per month</p>
                                </div>
                                <div class="col-lg-3">
                                
                                </div>
                              
                            </div>
                            <div class="col-lg-12"> <?php
if ($static['status']=='Pro Membership' )

                         { }
                         else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-4" style="border:#fff solid 1px;">
                                
                                <p style=" margin-top:10px;">you'll have 3 top Flyers included + more </p>
                                  <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div><?php } ?>
                                <div class="col-lg-2">
                                   
                                </div>
                                <div class="col-lg-4" style="border:#fff solid 1px;">
                                 <p style=" margin-left:-10px; margin-top:10px;">you'll have 6 top Flyers included + a lot more</p>
                                 <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div>
                                <div class="col-lg-1">
                                
                                </div>
                              </div><?php } ?>
                            </div>
                          </div> 
                          
                          
                           <div class="col-lg-12">
                                <div class="col-lg-1">
                                    <input type="checkbox" class=" click4" name="promote_ads2" value="home">
                                </div>
                                <div class="col-lg-5">
                                <p style="background:#f79e12; padding:5px; margin-left:-20px; margin-top:5px;">Home page Gallery Flyer</p>
                                </div>
                                <div id="show3" class="col-lg-6"></div>
                            </div>  
                            <div class="deals_work4">
                             <div class="col-lg-12">
                              <div class="col-lg-1"></div>
                              <?php 
if ($static['status']=='Pro Membership' OR $static['status']=='Gold Membership') {
}
              else  {?>
                                <div class="col-lg-1">
                                    <input type="radio" name="home1" value="40" onClick="subtotalnew1()">
                                </div>
                                <div class="col-lg-3">
                                <p style=" margin-left:-20px; margin-top:5px;">$10per</p>
                                </div>
                                <div class="col-lg-2">
                                  <select name="select3" onClick="subtotalnew1()">
                                    <option value="7">7 Days</option>
                                    <option value="14">14 Days</option>
                                  </select>
                                </div>
                                <div class="col-lg-1">
                                 <p><input type="text" name="output2" value="$0" style="border:none; background:#e2e2e2;"></p>
                                </div>
                                <div class="col-lg-1"></div>
                            </div> <?php
if ($static['status']=='Gold Membership' )

                         { }
                         else {  ?>
                            <div class="col-lg-12">
                              <div class="col-lg-1"></div>
                              <div class="col-lg-1">
                                    <input type="radio" class="click9" name="home" value="home_premium">
                                </div>
                                <div class="col-lg-4">
                                <p style=" margin-left:-20px; margin-top:5px;">Become a member:</p>
                                </div>
                                <div class="col-lg-6">
                                
                                </div>
                              
                            </div><?php } ?>
              <div class="deals_work9">
                             <div class="col-lg-12"> <?php
if ($static['status']=='Pro Membership' )

                         { }
                         else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-1">
                                    <input type="radio" name="membership_home" value="50" onClick="checksubtotal(this.value)">
                                </div>
                                
                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">pro member -$50 per month</p>
                                </div><?php } ?>
                                <div class="col-lg-2">
                                
                                </div>
                                <div class="col-lg-1">
                                    <input type="radio"  name="membership_home" value="80" onClick="checksubtotal(this.value)">
                                </div>
                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">Gold member -$80 per month</p>
                                </div>
                                <div class="col-lg-3">
                                
                                </div>
                              
                            </div>
                            <div class="col-lg-12"> <?php
if ($static['status']=='Pro Membership' )

                         { }
                         else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-4" style="border:#fff solid 1px;">
                                
                                <p style=" margin-top:10px;">you'll have 5 home page Flyers included + more </p>
                                  <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div><?php } ?>
                                <div class="col-lg-2">
                                   
                                </div>
                                <div class="col-lg-4" style="border:#fff solid 1px;">
                                 <p style=" margin-left:-10px; margin-top:10px;">you'll have 10 home page Flyers included + a lot more</p>
                                 <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div>
                                <div class="col-lg-1">
                                
                                </div>
                              </div><?php } ?>
                            </div>
                          </div> 
                            
                           
                             <div class="col-lg-12">
                                <div class="col-lg-1">
                                    <input type="checkbox" class=" click5" name="promote_ads3" value="sidebar">
                                </div>
                                <div class="col-lg-5">
                                <p style="background:#f79e12; padding:5px; margin-left:-20px;margin-top:5px;">Sidebar Flyer</p>
                                </div>
                                <div id="show4" class="col-lg-6"></div>
                            </div>   
                            <div class="deals_work5">
                             <div class="col-lg-12">
                              <div class="col-lg-1"></div>
                              <?php 
if ($static['status']=='Pro Membership' OR $static['status']=='Gold Membership') {
}
              else  {?>
                                <div class="col-lg-1">
                                    <input type="radio" name="sidebar" value="10" onClick="subtotalnew2()">
                                </div>
                                <div class="col-lg-3">
                                <p style=" margin-left:-20px; margin-top:5px;">$10per</p>
                                </div>
                                <div class="col-lg-2">
                                  <select name="select4" onClick="subtotalnew2()" >
                                  <option value="7">7 Days</option>
                                  <option value="14">14 Days</option>
                                  </select>
                                </div>
                                <div class="col-lg-1">
                                  <p><input type="text" name="output3" value="$0" style="border:none; background:#e2e2e2;"></p>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>  <?php
if ($static['status']=='Gold Membership' )

                         { }
                         else {  ?>
                            <div class="col-lg-12">
                              <div class="col-lg-1"></div>
                              <div class="col-lg-1">
                                    <input type="radio" class="click10" name="sidebar" value="sidebar_premium">
                                </div>
                                <div class="col-lg-4">
                                <p style=" margin-left:-20px; margin-top:5px;">Become a member:</p>
                                </div>
                                <div class="col-lg-6">
                                
                                </div>
                              
                            </div><?php } ?><div class="deals_work10">
                             <div class="col-lg-12"> <?php
if ($static['status']=='Pro Membership' )

                         { }
                         else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-1">
                                    <input type="radio" name="membership_sidebar" value="50" onClick="checksubtotal(this.value)">
                                </div>
                                
                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">pro member -$50 per month</p>
                                </div><?php } ?>
                                <div class="col-lg-2">
                                
                                </div>
                                <div class="col-lg-1">
                                    <input type="radio"  name="membership_sidebar" value="80" onClick="checksubtotal(this.value)">
                                </div>
                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">Gold member -$80 per month</p>
                                </div>
                                <div class="col-lg-3">
                                
                                </div>
                              
                            </div>
                            <div class="col-lg-12"> <?php
if ($static['status']=='Pro Membership' )

                         { }
                         else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-4" style="border:#fff solid 1px;">
                                
                                <p style=" margin-top:10px;">you'll have 2 sidebar Flyers included + more</p>
                                  <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div><?php } ?>
                                <div class="col-lg-2">
                                   
                                </div>
                                <div class="col-lg-4" style="border:#fff solid 1px;">
                                 <p style=" margin-left:-10px; margin-top:10px;">you'll have 4 sidebar Flyers included + a lot more</p>
                                 <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div>
                                <div class="col-lg-1">
                                
                                </div>
                              </div><?php } ?>
                            </div>
                          </div>    
                            <div class="col-lg-12">
                                <div class="col-lg-1">
                                    <input type="checkbox" class=" click6" name="promote_ads4" value="slider">
                                </div>
                                <div class="col-lg-5">
                                <p style="background:#f79e12; padding:5px; margin-left:-20px;margin-top:5px;">Top Feature Home page slider Flyer</p>
                                </div>
                                <div class="col-lg-6"></div>
                            </div> 
                           <div class="deals_work6">
                             <div class="col-lg-12">
                              <div class="col-lg-1"></div>
                              <?php 
if ($static['status']=='Pro Membership' OR $static['status']=='Gold Membership') {
}
              else  {?>
                                <div class="col-lg-1">
                                    <input type="radio" name="sliderdeals" value="20" onClick="subtotalnew3()"> 
                                </div>
                                <div class="col-lg-3">
                                <p style=" margin-left:-20px; margin-top:5px;">$20</p>
                                </div>
                                <div class="col-lg-2">
                                  <select name="select5" onClick="subtotalnew3()" >
                                    <option value="7">7 Days</option>
                                    <option value="14">14 Days</option>
                                  </select>
                                </div>
                                <div class="col-lg-1">
                                  <p><input type="text" name="output4" value="$0" style="border:none; background:#e2e2e2;"></p>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>  <?php
if ($static['status']=='Gold Membership' )

                         { }
                         else {  ?>
                            <div class="col-lg-12">
                              <div class="col-lg-1"></div>
                              <div class="col-lg-1">
                                    <input type="radio" class="click11" name="topfeature" value="top feature_premium">
                                </div>
                                <div class="col-lg-4">
                                <p style=" margin-left:-20px; margin-top:5px;">Become a member:</p>
                                </div>
                                <div class="col-lg-6">
                                
                                </div>
                              
                            </div><?php } ?> <div class="deals_work11">
                             <div class="col-lg-12"> <?php
if ($static['status']=='Pro Membership' )

                         { }
                         else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-1">
                                    <input type="radio" class="click11" name="membership_topfeature" value="50"                  onClick="checksubtotal(this.value)">
                                </div>
                                
                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">Upgrade Pro Membership</p>
                                </div><?php } ?>
                                <div class="col-lg-2">
                                
                                </div>
                                <div class="col-lg-1">
                                    <input type="radio"  name="membership_topfeature" value="80" onClick="checksubtotal(this.value)">
                                </div>
                                <div class="col-lg-2">
                                <p style=" margin-left:-20px; margin-top:10px;">Upgrade Gold Membership</p>
                                </div>
                                <div class="col-lg-3">
                                
                                </div>
                              
                            </div>
            
                            <div class="col-lg-12"> <?php
if ($static['status']=='Pro Membership' )

                         { }
                         else {  ?>
                              <div class="col-lg-2"></div>
                              <div class="col-lg-4" style="border:#fff solid 1px;">
                                
                                <p style=" margin-top:10px;">you'll have 4 sidebar Flyers included + a lot more</p>
                                  <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div><?php } ?>
                                <div class="col-lg-2">
                                   
                                </div>
                                <div class="col-lg-4" style="border:#fff solid 1px;">
                                 <p style=" margin-left:-10px; margin-top:10px;">you'll have 4 sidebar Flyers included + a lot more</p>
                                 <button type="button" class="btn btn-sm btn-warning pull-right" style="margin-bottom:20px;">Read More</button>
                                </div>
                                <div class="col-lg-1">
                                    </div>
                              </div><?php } ?>
                            </div>
                          </div> <br>     
                            
                            
                        </div>
                    </div>
                 </div>
                 <div class="col-lg-12">
                  <p  style="margin-left:30px; margin-top:30px;"> by posting this Flyer,you are agreeing with our terms and conditions</p>                    <?php 
if ($static['status']=='Pro Membership' OR $static['status']=='Gold Membership') { } else {?> <p>Total:&nbsp;$ <input type="text" name="total" value="0" style="border:none; background:#e2e2e2;"> </p><?php } ?>
                  <input type="submit" class="btn btn btn-primary pull-right btn6" value="Post Your Flyer">  
                 </div>
                </div>
                 </form>
             <?php 
      
             include('footer.php');
             ?>