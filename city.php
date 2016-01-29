<?php
include('db.php') ;   // include Your Connection File Name

$state_name = $_REQUEST['state_name'];
$sql_city = mysql_query("SELECT DISTINCT `city_name` FROM `tbl_country_details` WHERE subdivision_name='$state_name'");
echo "<select name='city' id='city'>";
echo '<option value="" test="'.$_COOKIE['def_city'].'">Select City</option>';
while($row_city = mysql_fetch_array($sql_city))
{
    if($row_city['city_name'] == $_COOKIE['def_city']) $selected = 'selected';
    else $selected = '';
    $row_city['city_name'] = $row_city['city_name']?:"Select City";
echo '<option value="'.$row_city['city_name'].'"'.$selected.' >'.$row_city['city_name'].'</option>';
}
echo "</select>";
?>