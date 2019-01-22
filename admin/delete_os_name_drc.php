<?php
include('./lib/dbcon.php');
dbcon();
if (isset($_POST['delete_os_name'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM os_name_drc where os_id='$id[$i]'");
}
header("location: os_name_drc.php");
}
?>