<?php
error_reporting(0);
?>
<style type="txtlabel/css">	
.txtlabel{font-family:arial;font-weight:normal;font-size:10px;}
.text{font-family:arial;font-weight:bold;font-size:10px;}
</style>
<table border="0" width="100%">
<?php	
if($_POST['title'] != '')
{	
?>
<tr>	
  <td width="40%" class="txtlabel">Title Name</td>
  <td width="60%" class="text"><?php echo $_POST['title'];?></td>
</tr>
<?php } if($_POST['company'] != '') { ?>
<tr>
  <td class="txtlabel">Company Name</td>
  <td class="text"><?php echo $_POST['company'];?></td>
</tr>
<?php } if($_POST['description'] != '') { ?>
<tr>
   <td class="txtlabel">Deal Description</td>
   <td class="text"><?php echo $_POST['description'];?></td>
</tr>
<?php } if($_POST['country'] != '' && $_POST['country'] != -1) { ?>
<tr>
   <td class="txtlabel">Country</td>
   <td class="text"><?php echo $_POST['country'];?></td>
</tr>
<?php } if($_POST['state'] != '') {?>
<tr>
   <td class="txtlabel">State</td>
   <td class="text"><?php echo $_POST['state'];?></td>
</tr>
<?php } if($_POST['city'] != '') {?>
<tr>
   <td class="txtlabel">City</td>
   <td class="text"><?php echo $_POST['city'];?></td>
</tr>
<?php } if($_POST['postalcode'] != '') {?>
<tr>
   <td class="txtlabel">Postal Code</td>
   <td class="text"><?php echo $_POST['postalcode'];?></td>
</tr>
<?php } if($_POST['current_city'] != '') {?>
<tr>
   <td class="txtlabel">Phone</td>
   <td class="text"><?php echo $_POST['current_city'];?></td>
</tr>
<?php } if($_POST['current_postalcode'] != '') {?>
<tr>
   <td class="txtlabel">Email Address</td>
   <td class="text"><?php echo $_POST['current_postalcode'];?></td>
</tr>
<?php } if($_POST['website1'] != '') {?>
<tr>
   <td class="txtlabel">Website Url</td>
   <td class="text"><?php echo $_POST['website1'];?></td>
</tr>
<?php } if($_POST['youtube'] != '') {?>
<tr>
   <td class="txtlabel">Youtube Link</td>
   <td class="text"><?php echo $_POST['youtube'];?></td>
</tr>
<?php } if($_POST['regular'] == 20) {?>
<tr>
   <td class="txtlabel">Deal Publishing Plan</td>
   <td class="text">Regular-&nbsp;<?php echo '$'.$_POST['regular'];?>&nbsp;(post will be on Deals page)</td>
</tr>
<?php } elseif($_POST['regular'] == 60) {?>
<tr>
   <td class="txtlabel">Deal Publishing Plan</td>
   <td class="text">Premium-&nbsp;<?php echo '$'.$_POST['regular'];?>&nbsp;(post will be on Home page gallery section)</td>
</tr>
<?php } elseif($_POST['regular'] == 80){?>
<tr>
   <td class="txtlabel">Deal Publishing Plan</td>
   <td class="text">Premium-&nbsp;<?php echo '$'.$_POST['regular'];?>&nbsp;per 2months</td>
</tr>
<?php } else { } 
if($_POST['highlight'] != '') {?>
<tr>
   <td class="txtlabel">Hightlited Deal</td>
   <td class="text">Yes</td>
</tr>
<?php } if($_POST['promote_ads1'] != '') {?>
<tr>
   <td class="txtlabel">Top Deal</td>
   <td class="text">Yes</td>
</tr>
<?php } if($_POST['promote_ads2'] != '') {?>
<tr>
   <td class="txtlabel">Home page Gallery Deal</td>
   <td class="text">Yes</td>
</tr>
<?php } if($_POST['promote_ads3'] != '') {?>
<tr>
   <td class="txtlabel">Sidebar Deal</td>
   <td class="text">Yes</td>
</tr>
<?php } if($_POST['promote_ads4'] != '') {?>
<tr>
   <td class="txtlabel">Top Feature Home page slider Deal</td>
   <td class="text">Yes</td>
</tr>
<?php } ?>