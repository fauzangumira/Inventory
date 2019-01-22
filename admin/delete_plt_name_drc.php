<?php
include('./lib/dbcon.php');
dbcon();
if (isset($_POST['delete_plt_name'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM platform_name_drc where platform_id='$id[$i]'");
}
header("location: plt_name_drc.php");
}
?>