<?php
$page='deals';
include('header.php');
 ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<?php 
$id=$_GET['id'];
                   $single_query=mysql_query("SELECT * FROM `deals` WHERE `id`='$id' ");     
                  $single=mysql_fetch_array($single_query);
                  $puser=$single['user_id'];
                   ?>
   <script>
$(document).ready(function(){
 $(".getads1").hide();
  $(".getbtn1").click(function(){
    $(".getads1").show();
     $(".getadscon").toggle();
  });
});
</script>

  <script language="JavaScript">
var message="";
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if
(document.layers||(document.getElementById&&!document.all )) {
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers)
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
document.oncontextmenu=new Function("return false")
    
    </script>
     <style>
.getads1{
}
.getbtn1{
}
.getadscon{
}
</style>
   	<div class="content">
    	<div class="container">
        	<div class="col-lg-12">
            	
                	<div class="col-lg-9 ads">
                    	<div class="col-lg-12">
                    	<h4 style="color:#CC0000;"><?php echo $single['deals_title']; ?>
                        <a href="<?php echo 'http://'.$single['websitelink'];?>" target="_blank"><button type="button" class="btn btn-danger pull-right">Get Deal&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></button></a></h4>
                        <p style="border-bottom:#CC0000 solid 2px; font-size:9px;">Total views:8</p>
                        	
                            <li>Posted <strong><?php echo $single['date_time']; ?> </strong></li>
                            </div>
                        <div class="col-lg-5 " style="margin-top:10px;"><br>
                        	<img src="img/<?php echo $single['images']; ?>" class="img-responsive">
                        </div>
                        <div class="col-lg-1"></div>
                        <form action="#" onsubmit="showAddress(this.address.value); return false">
                             <input type="hidden" size="34" name="address" value="<?php echo $single['state'].','.$single['country']; ?>" />
                        <div class="col-lg-6"><br>
                        	<p style="margin-left:30px;"><span class="glyphicon glyphicon-globe" style="margin-right:10px;"></span>Website:&nbsp;<a href="<?php echo 'http://'.$single['websitelink'];?>" target="_blank"><?php echo $single['websitelink']; ?> </a></p>
                            <p style="margin-left:30px;"><span class="glyphicon glyphicon-phone-alt" style="margin-right:10px;"></span>Phone:&nbsp; <a href="skype:skype_user?call"><?php echo $countryCode;?> <?php echo $single['city_your'];?></a></p>
                            <p style="margin-left:30px;"><span class="glyphicon glyphicon-envelope" style="margin-right:10px;"></span>Email:&nbsp;<a href="mailto:<?php echo $single['postalcode_your'];?>"><?php echo $single['postalcode_your'];?></a></p>
                            <p style="margin-left:30px;"><span class="glyphicon glyphicon-home" style="margin-right:10px;"></span>Location:&nbsp;<?php echo $single['state'].','.$single['country']; ?></p>			
                            <p style="margin-left:40px;"><a href="#">
                                    <button type="submit" class="btn btn-warning btn-sm" style="color:#fff">Direction</button>
                                </a>&nbsp;&nbsp;
                                <a href="#"><button type="button" class="btn btn-warning btn-sm" style="color:#fff">More info</button></a></p>
                        </div>
                       
                         
                                      
                            
                          </form>
                          
                          <div class="col-lg-12 ">
                        <p><a href="#">Description</a><?php echo $single['description']; ?></p>

                        <div class="getadscon"><p style="margin-left:40px;"><a href="https://www.facebook.com/sharer/sharer.php?u=http://bluewhalesolutions.com/D/trademydeals/" target="_blank"><button type="button" class="btn btn-warning btn-sm" style=" color:#fff"><i class="fa fa-facebook"></i>&nbsp;Share</button></a>&nbsp;&nbsp;<a href="https://twitter.com/share?url=http://bluewhalesolutions.com/D/trademydeals/" target="_blank"><button type="button" class="btn btn-warning btn-sm" style="color:#fff"><i class="fa fa-twitter"></i>&nbsp;Tweet</button></a>&nbsp;&nbsp;<a href="https://plus.google.com/share?url=http://bluewhalesolutions.com/D/trademydeals/" target="_blank"><button type="button" class="btn btn-warning btn-sm" style=" color:#fff"><i class="fa fa-google-plus"></i>&nbsp;Share</button></a>&nbsp;&nbsp;<a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to= &su=SUBJECT&body=BODY" target="_blank"><button type="button" class="btn btn-warning btn-sm" style="color:#fff"><i class="fa fa-envelope"></i>&nbsp;E-mail</button></a></p>
                        </div>
                        <div class="col-lg-12 getadscon">
                            <div class="sub1" style="background:#3399FF; border:#3399ff solid 1px; border-radius:0px;">
                                <h4>Add Details</h4>
                             </div>
                            
                             <p style="font-size:11px; margin-bottom:10px;">less 5% dealon filpcart with sales deals</p>    
                        </div>
                        <div class="col-lg-12 getadscon">
                            
                        <div align="center" id="map" style="height:260px;"></div>
                        </div>
                        <table bgcolor="#FFFFFF" width="300">
                            <tr>
                                <td width="70"></td>
                                <td><input type="hidden" size="34" name="latitude" value="" id="lat" /></td>
                                <td width="70"></td>
                                <td><input type="hidden" size="34" name="longitude" value="" id="lng" /></td>
                            </tr>
                        </table>
                        <div class="col-lg-12 getadscon" style=" margin-top:20px;">
                    <div class="sub1 col-lg-12" style="background:#FFCC33; border:#FFCC33 solid 1px; border-radius:0px;">
                        <h4>Hot deals</h4>
                    </div>
                    <div class="col-lg-12 getadscon" ><?php 
                   $top_query=mysql_query("SELECT * FROM `deals` ORDER BY id DESC LIMIT 3");     
                  while ($top=mysql_fetch_array($top_query)) {
                   ?>
                         <div class="col-lg-4">
                            <div class="content2" style="margin-top:10px;">
                                        <img src="img/<?php echo $top['images']; ?>" class="img-responsive">
                                       <a href="getdeals.php?id=<?php echo $top['id']; ?>"><h3><?php echo $top['deals_title']; ?></h3>
                                        <p><?php echo $top['description']; ?></p>
                                        <button type="button" class="btn btn-sm btn-danger pull-right btn5">View</button>
                                    </a></div>
                        </div><?php } ?>
                        
                    </div>
                    
                </div>
                    </div>
                   <form action="process1.php" method="post"><?php 
                    $userdb1=mysql_query("SELECT * FROM user WHERE id='$puser'");
$userfetch1=mysql_fetch_array($userdb1);
                    ?>
                    <div class="getads1">
                    <div class="col-lg-12">
                             <a href="#"><button type="button" class="btn  btn-danger">Email Author</button></a>
                             <div class="col-lg-12">
                                <div class="col-lg-8" style="margin-left:-30px; margin-top:20px;">
                                     <input type="text" name="to" class="form-control" value="<?php echo $userfetch1['email']; ?>" style="background:#efefef;">
<input type="hidden" name="user" value="<?php echo $users ?>">
<input type="hidden" name="puser" value="<?php echo $puser ?>">
<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                </div>
                                <div class="col-lg-8" style="margin-left:-30px; margin-top:20px;">
                                    <input type="text" required name="name1" class="form-control"  value="<?php echo $userfetch['email']; ?>" style="background:#efefef;">
                                </div>
                                 <div class="col-lg-10" style="margin-left:-30px; margin-top:20px;">
                                    <textarea required name="message" class="form-control"  style="background:#fff; padding:50px 0px;"></textarea>
                                </div>
                               
                             </div>
                             <div class="col-lg-12">
                                <p style="margin-left:-15px; margin-top:20px;">Attach File (Option)</p>
                                <p style="margin-left:-15px; margin-top:20px;"><button type="button" class="btn btn-sm btn-success btn1">Choose File</button>&nbsp;&nbsp;No file Choosen. Maximum 1MB</p>
                             </div>
                            
                             <div class="col-lg-12">
                                <p style="margin-left:-15px; margin-top:10px;"><input type="checkbox" style="margin-right:10px;">Send me a copy of email</p>
                                 <button type="submit" class="btn btn-lg btn-success btn1" style="margin-left:-15px; margin-top:20px; ">Send Email</button>
                                 <p style="margin-left:-15px; margin-top:10px;">Filters Email for security Reasons</p>
                                 <p style="margin-left:-15px; margin-top:10px;">By checking on "Send Email".<span style="font-size:16px;">You are Agreeing with our terms and conditions.</span></p>
                             </div>
                        </div>
                    </div>
                </form>
                    </div>
                      <?php 
include('footer.php');
                ?>
                ?>