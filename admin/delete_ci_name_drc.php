<?php
include('./lib/dbcon.php');
dbcon();
if (isset($_POST['delete_ci_name'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM ci_name_drc where ci_id='$id[$i]'");
}
header("location: ci_name_drc.php");
}
?>