<?php
include('header.php');
$email = $_SESSION['email'];
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
   $('.content2').css('display','none');
});
</script>
<div class="content">
    	<div class="container">
        	<div class="col-lg-12">
            	<div class="col-lg-9">
                	<div class="col-lg-12">
                	<div class="deals_content">
                    	Your account was successfully created. An email has been sent to <span style="color:#00688B;font-weight:bold;"><?php echo $email;?></span>.Please follow the instructions in the email to complete registration.
                    </div>
                    </div>
                </div>
            </div>       
        </div>   
</div>  
<?php 
include('footer.php');
?>