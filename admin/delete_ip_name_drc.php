<?php
include('./lib/dbcon.php');
dbcon();
if (isset($_POST['delete_ip_name'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM ip_name_drc where ip_id='$id[$i]'");
}
header("location: ip_name_drc.php");
}
?>