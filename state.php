<?php
include('db.php') ;   // include Your Connection File Name

$country_id = $_REQUEST['country_id'];

$sql_state = mysql_query("SELECT DISTINCT subdivision_name FROM `tbl_country_details` WHERE `country_iso_code`='$country_id'");
echo "<select onChange='get_cities(this.value)' name='state' id='state1' test='".$_COOKIE['def_state']."'>";
while($row_state = mysql_fetch_array($sql_state))
{

    if($row_state['subdivision_name'] == $_COOKIE['def_state']) $selected = 'selected';
    else $selected = '';
    $row_state['subdivision_name'] = $row_state['subdivision_name']?:"Select State";
echo '<option value="'.$row_state['subdivision_name'].'" '.$selected.'>'.$row_state['subdivision_name'].'</option>';
}
echo "</select>";
?>