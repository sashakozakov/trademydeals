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
$id=$_GET['id'];
$messageQuery = mysql_query("SELECT * FROM messages WHERE id=".$id."");
$messageResult = mysql_fetch_array($messageQuery);
$userId = $messageResult['user_id'];
if($userId == 200)
{
$senderMail = mysql_query("SELECT email FROM admin_user WHERE id=".$userId."");
$senderResult = mysql_fetch_array($senderMail);
}else{
$senderMail = mysql_query("SELECT email FROM user WHERE id=".$userId."");
$senderResult = mysql_fetch_array($senderMail);
}
?>
   	<div class="content">
    	<div class="container">
        	<div class="col-lg-12">
                  <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align:center;color:#990000;">#</th>
                                    <th style="text-align:center;color:#990000;">Date</th>
                                    <th style="text-align:center;color:#990000;">Subject</th>
								    <th style="text-align:center;color:#990000;">Sender Email</th>	
                                </tr>
                            </thead>
                            <tr>
                                <td style="padding-left:10px;"><?php echo $messageResult['id']; ?></td>
                                <td style="padding-left:60px;"><?php echo $messageResult['date']; ?></td>
                                <td style="padding-left:20px;"><?php echo $messageResult['messages']; ?></td>
								<td style="padding-left:20px;"><?php echo $senderResult['email']; ?></td>
                            </tr>
                        </table>
                    </div>
                    </div>
            </div>
		</div>
	</div>	
<?php 
include('footer.php');
?>