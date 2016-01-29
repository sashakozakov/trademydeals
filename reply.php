<?php
include('header.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $('.content2').css('display','none');
});
</script>
<?php 
$id=$_GET['rId'];

                   if($id == 200)
                   {
                   $single_query=mysql_query("SELECT * FROM admin_user WHERE `id`='$id' ");     
                   $single=mysql_fetch_array($single_query);
                   $email=$single['email'];
				   $puser=$single['id'];
				   } else {	
                   $single_query=mysql_query("SELECT * FROM user WHERE `id`='$id' ");     
                   $single=mysql_fetch_array($single_query);
                   $email=$single['email'];
				   $puser=$single['id'];
				  }
?>
   	<div class="content">
    	<div class="container">
        	<div class="col-lg-12">
           
                    <form action="replyProcess.php" method="post">
                    <div class="getads1">
                    <div class="col-lg-12">
                          
                             <div class="col-lg-12">
                                <div class="col-lg-8" style="margin-left:-30px; margin-top:20px;">
                                    <input type="text" name="to" class="form-control" value="<?php echo $email;?>" style="background:#efefef;">
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
                                <p style="margin-left:-15px; margin-top:10px;"><input type="checkbox" name="ccmail" style="margin-right:10px;">Send me a copy of email</p>
                                 <button type="submit" class="btn btn-lg btn-success btn1" style="margin-left:-15px; margin-top:20px; ">Send Email</button>
                                 <p style="margin-left:-15px; margin-top:10px;">Filters Email for security Reasons</p>
                                 <p style="margin-left:-15px; margin-top:10px;">By checking on "Send Email".<span style="font-size:16px;">You are Agreeing with our terms and conditions.</span></p>
                             </div>
                        </div>
                    </div>
                    </form>
					
					
            </div>
		</div>
	</div>	
<?php 
include('footer.php');
?>