<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('Device_sidebar.php'); ?>
		
						<div class="span9" id="content">
		                    <div class="row-fluid">
							
		                        <!-- block -->
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Add Device</div>
										<div class="muted pull-right"><a id="return" data-placement="left" title="Click to Return" href="device_stocks.php"><i class="icon-arrow-left icon-large"></i> Back</a></div>
										<script type="text/javascript">
										$(document).ready(function(){
										$('#return').tooltip('show');
										$('#return').tooltip('hide');
										});
										</script>                          
		                            </div>
									
		                <div class="block-content collapse in">	
                         <div class="alert alert-success"><i class="icon-info-sign"></i> Please Fill in required details</div>						
							<form class="form-horizontal" method="post" enctype="multipart/form-data">											
								
										<div class="control-group">
		                                 <label class="control-label" for="inputEmail">Device Name</label>
			                                <div class="controls">
				                              <select name="dev_id" class="chzn-select"  required/>
				                                 <option></option>
			                                     <?php $device_name=mysql_query("select * from device_name")or die(mysql_error()); 
			                                     while ($row=mysql_fetch_array($device_name)){ 												
												 ?>
				                                 <option value="<?php echo $row['dev_id']; ?>&nbspName&nbsp<?php echo $row['dev_name']; ?>"><?php echo $row['dev_name']; ?></option>
				                                 <?php } ?>
				                               </select>
		                                     </div>
	                                    </div>
											
										<div class="control-group">
											<label class="control-label" for="inputPassword">Date</label>
											<div class="controls">
                                                                                            <input type="datetime" class="span8" name="tanggal" id='datetimepicker' required>
											</div>
										</div>
                                                                                <script>
                                                                                $( function() {
                                                                                  $( "#datetimepicker" ).datepicker({
                                                                                    showOtherMonths: true,
                                                                                    selectOtherMonths: true
                                                                                  });
                                                                                } );
                                                                                </script>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Device Brand</label>
											<div class="controls">
											<input type="text" class="span8" name="dev_brand" id="inputPassword" placeholder="Device Brand" required>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Inventory Code</label>
											<div class="controls">
											<input type="text" class="span8" name="dev_serial" id="inputPassword" placeholder="Device Serial Number" required>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Device Model</label>
											<div class="controls">
											<input type="text" class="span8" name="dev_model" id="inputPassword" placeholder="Device Model" required>
											</div>
										</div>
										
										<div id="hide">
										<div class="control-group">
											<label class="control-label" for="inputPassword"  placeholder="Device Status" >Device Status</label>
											<div class="controls">
											<select name="dev_status"  required>										
													<option>New</option>																									
												</select>								
											</div>
										</div>
										</div>
												
										<div class="control-group">
											<label class="control-label" for="inputPassword">Description</label>
											<div class="controls">
													<textarea name="dev_desc" id="ckeditor_full"></textarea>
											</div>
										</div>
                                                                                
                                                                                <div class="control-group">
											<label class="control-label" for="Image">Image</label>
											<div class="controls">
                                                                                             <input type='file' id="imgInp" class="span8" name="imgInp"  />
                                                                                            <br>
                                                                                            <img id="blah" src="#" alt="your image" height="100" hidden />
											</div>
										</div>
											
										<div class="control-group">
										<div class="controls">
										<button name="save" id="save" name="singlebutton" data-placement="right" title="Click here to Save your new data." class="btn btn-primary"><i class="icon-save"></i> Save</button>				
										</div>
										</div>
										<script type="text/javascript">
                                                                                function readURL(input) {
                                                                                    if (input.files && input.files[0]) {
                                                                                        var reader = new FileReader();

                                                                                        reader.onload = function (e) {
                                                                                            $('#blah').show();
                                                                                            $('#blah').attr('src', e.target.result);
                                                                                        }

                                                                                        reader.readAsDataURL(input.files[0]);
                                                                                    }
                                                                                }

                                                                                $("#imgInp").change(function(){
                                                                                    readURL(this);
                                                                                });
                                                                                    
                                                                                    
										$(document).ready(function(){
										$('#save').tooltip('show');
										$('#save').tooltip('hide');
										});
										</script>
							</form>
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["imgInp"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (isset($_POST['save'])){
$tanggal = date("Y-m-d", strtotime($_POST['tanggal']));;    
$dev_id = $_POST['dev_id'];
$dev_desc = $_POST['dev_desc'];
$dev_serial = $_POST['dev_serial'];
$dev_brand = $_POST['dev_brand'];
$dev_model = $_POST['dev_model'];
$dev_status = $_POST['dev_status'];
//$gambar = $_POST['gambar'];  
										
						
$query = mysql_query("select * from stdevice where dev_serial = '$dev_serial' ")or die(mysql_error());
$count = mysql_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Device Code Already Exist');
window.location = "device_stocks.php";
</script>
<?php
}else{


if (move_uploaded_file($_FILES["imgInp"]["tmp_name"], $target_file)) {
    $gambar_asli= 'uploads/'.basename( $_FILES["imgInp"]["name"]);
}else{
    $gambar_asli='';
    ?>
<!--    <script>
    alert('Gagal Upload Gambar');
    window.location = "add_device.php";
    </script>-->
    <?php
}
    
mysql_query("insert into stdevice (tanggal,dev_id,dev_desc,dev_serial,dev_brand,dev_model,dev_status,gambar_asli) values('$tanggal','$dev_id','$dev_desc','$dev_serial','$dev_brand','$dev_model','$dev_status','$gambar_asli')")or die(mysql_error());
mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Add device Detail id $dev_id')")or die(mysql_error());											
?>
<script>
window.location = "device_stocks.php";
$.jGrowl("Device Successfully added", { header: 'Device add' });
</script>
<?php
}
}
?>
																										
		                            </div>
		                        </div>
		                        <!-- /block -->
		                    </div>
		                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>