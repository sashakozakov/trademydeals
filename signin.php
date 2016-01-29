<?php
include('header.php');
 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
function validation()
{
	var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i
var b=emailfilter.test(document.form.lname.value);
if(b==false)
{
alert("Enter your email address");
document.form.lname.focus();
return false;
}

	var a = document.form.password.value;
if(a=="")
{
alert("Enter your password");
document.form.password.focus();
return false;
}

}
</script>



    <form name="form" action="login_process.php" method="post" onsubmit="return validation()">
    <div class="content">
      <div class="container">
          <div class="col-lg-12">
              <div class="col-lg-9">
                  <div class="col-lg-12">
                  <div class="deals_content">
                      <h4>Sign In</h4>

                        <div class="deals_form">
                          <div class="col-lg-12 reg-nopad" >
                                <div class="col-lg-7 reg-nopad">
                                    <p>Email Address or Nickname:<i style="margin-left:10px; color:#CC0000;"></i></p>
                                     <input type="text" name="lname" class="form-control">
                                </div>
                                <div class="col-lg-3 reg-nopad">

                                </div>
                                <div class="col-lg-2 reg-nopad">
                                </div>
                            </div>
                            <div class="col-lg-12 reg-nopad" style="margin-top:20px; ">
                                <div class="col-lg-7 reg-nopad">
                                    <p>Password:</p>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="col-lg-3 reg-nopad">

                                </div>
							</div>

                            <div class="col-lg-12 reg-nopad" style="margin-top:20px; ">
                                <div class="col-lg-7 reg-nopad">
                                	<p style="padding:3px; float:left;"><input type="checkbox" style="margin-bottom:10px;">  Keep me signed in<br /><a href="forgotpass.php">Forgot Your password?</a></p>
                                	<input type="submit" class="btn btn btn-primary pull-right btn6" style="border-top-left-radius:10px; border-top-right-radius:10px;border-bottom-left-radius:10px; padding:12px 28px; border-bottom-right-radius:10px; float:right !important; margin-left:0px;" value="Login">
                                </div>
							</div>

 <!--<div class="col-lg-12" style="margin-top:20px; margin-left:70px;">
                                <div class="col-lg-7">
                                    <p>Country</p>
                                      <select class="form-control" id="country" name ="country"></select>
                                </div>
                                <div class="col-lg-3">

                                </div>
                                <div class="col-lg-2">
                                </div>
                            </div>

                                <div class="col-lg-2">
                                </div>


							  <div class="col-lg-12" style="margin-top:20px; margin-left:70px;">
                                <div class="col-lg-7">
                                    <p>State</p>
                                        <select class="form-control" name ="state" id ="state"></select>
                                </div>
                                <div class="col-lg-3">

                                </div>
                                <div class="col-lg-2">
                                </div>
                            </div>-->




                            <div class="col-lg-12" style="margin-top:20px;">
                            	<div class="col-lg-2">

                             	</div>

                                <div class="col-lg-6 have_account">
                                    <h3 style="color:#CC6600; text-align:center;">Dont have an account?</h3>
                                </div>

                            </div>

                        </div>

                    </div>

                </div><!-- col-9-->
                 <div class="col-lg-12">
                   <div class="col-lg-6"></div>
                   <div class="col-lg-3 post-btn" style="margin-top:20px;">
                 <a href="signup.php"> <button type="button" class="btn btn-warning" style="border-top-left-radius:10px;
border-top-right-radius:10px;border-bottom-left-radius:10px; padding:12px 28px;
border-bottom-right-radius:10px;color:#790404; font-weight:bold;" >Sign Up</button></a></div>
<?php $id=$_GET['id'];
if($id==4)
        {?>

              <h3 style="color:#F00; alignment-adjust:middle">The email or password you entered is incorrect.</h3>
                <?php }

if($id==3)
        {?>

              <h3 style="color:#F00; alignment-adjust:middle">Enter Your Email Address/Password.</h3>
                <?php } ?>


                 </div>
                 <!--div class="col-lg-12">

                  <div class="col-lg-12">
               <p>____________________________________<span class="badge">OR</span>__________________________________</p></div>


              </div-->
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <!--br>
              <br-->
                 <!--<div class="col-lg-12">
                             <div class="col-lg-3">

                             </div>
                             <div class="col-lg-6">

                                  <a href="1353/index.php"> <img src="images/loginfb.png">
                              </a> </div>
                               <div class="col-lg-3">
                               </div>
                               </div>-->

                 </div>

</form>

                 <?php
include('footer.php');
                ?>
