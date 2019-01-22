<?php
include('./lib/dbcon.php');
dbcon();
if (isset($_POST['delete_app_name'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM application_name_drc where app_id='$id[$i]'");
}
header("location: app_name_drc.php");
}
?>