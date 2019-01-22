<?php 
session_start();
if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
	header("location:".host()."../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>Technology Resource Inventory System (T.R.I.S)</title>		   
        <!-- Bootstrap -->
			<!-- <link href="images/logo.png" rel="icon" type="image"> -->
			<link href="../images/favicon.png" rel="icon" type="image">
			<link href="bootstrap/css/background.css" rel="stylesheet" media="screen">
			<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
			<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
			<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
			<link href="bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
			<link href="bootstrap/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
			<link href="bootstrap/css/my_style.css" rel="stylesheet" media="screen">
			<link href="bootstrap/css/print.css" rel="stylesheet" media="print">			
			<link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
			<link href="assets/styles.css" rel="stylesheet" media="screen">								
		    <link href="bootstrap/css/bootstrap.min1.css" rel="stylesheet" media="screen">
		    <link href="bootstrap/css/sb_admin.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          
        <![endif]-->
		<!-- calendar css -->
		<script src="bootstrap/js/html5.js"></script>
		<link href="vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
		<script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<!-- data table -->
		<link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
		<!-- notification  -->
		<link href="vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
		<!-- wysiwug  -->
		<link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>
	
		<script src="vendors/jGrowl/jquery.jgrowl.js"></script>
                <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>
<?php include('./lib/dbcon.php'); 
dbcon();
//Check whether the session variable SESS_MEMBER_ID is present or not

$session_id=$_SESSION['id'];

$user_query = mysql_query("select * from admin where admin_id = '$session_id'")or die(mysql_error());
$user_row = mysql_fetch_array($user_query);
$admin_username = $user_row['username'];
?>