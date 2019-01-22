<?php
include('./lib/dbcon.php');
dbcon();
if (isset($_POST['delete_host_name'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM host_name_drc where host_id='$id[$i]'");
}
header("location: host_name_drc.php");
}
?>