<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('Device_sidebar.php'); ?>
		
						<div class="span9" id="content">
		                    <div class="row-fluid">
									<a href="add_Device.php" class="btn btn-info"  id="add" data-placement="right" title="Click to Add Device" ><i class="icon-plus-sign icon-large"></i> Add Device</a>
					                <script type="text/javascript">
		                             $(document).ready(function(){
		                             $('#add').tooltip('show');
		                             $('#add').tooltip('hide');
		                              });
		                            </script> 
		                        <!-- block -->
		                        <div id="" class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Edit Device</div>
										<div class="muted pull-right"><a id="return" data-placement="left" title="Click to Return" href="device_stocks.php"><i class="icon-arrow-left icon-large"></i> Back</a></div>
																<script type="text/javascript">
																$(document).ready(function(){
																	$('#return').tooltip('show');
																	$('#return').tooltip('hide');
																});
																</script>     
		                            </div>
		                            <div class="block-content collapse in">									
									
									<?php
									$query = mysql_query("select * from stdevice 
									LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id
									where id = '$get_id'")or die(mysql_error());
									$row = mysql_fetch_array($query);
									?>
									
									    <form class="form-horizontal" method="post" enctype="multipart/form-data">
										
										<div class="control-group">
											<label class="control-label" for="inputEmail">Device Name</label>
											<div class="controls">			
												<select id="qtype" name="dev_id" required>

													<option value="<?php echo $row['dev_id']; ?>" ><?php echo $row['dev_name']; ?></option>
													<?php
													$device_query = mysql_query("select * from device_name")or die(mysql_error());
													while($query_device_row = mysql_fetch_array($device_query)){
													$dev_name = $row['dev_name'];
													?>
													<option value="<?php echo $query_device_row['dev_id']; ?>"><?php echo $query_device_row['dev_name'];  ?></option>
													<?php } ?>

												</select>
											</div>
										</div>
                                                                                
                                                                                <div class="control-group">
											<label class="control-label" for="inputPassword">Date</label>
											<div class="controls">
                                                                                            <input type="datetime" class="span8" name="tanggal" id='datetimepicker' value="<?php echo $row['tanggal']; ?>" required>
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
											<input type="text" class="span8" value="<?php echo $row['dev_brand']; ?>" name="dev_brand" id="inputPassword" placeholder="Device Brand" required>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Inventory Code</label>
											<div class="controls">
											<input type="text" class="span8" value="<?php echo $row['dev_serial']; ?>" name="dev_serial" id="inputPassword" placeholder="Device Serial Number" required>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Device Model</label>
											<div class="controls">
											<input type="text" class="span8" value="<?php echo $row['dev_model']; ?>" name="dev_model" id="inputPassword" placeholder="Device Model" required>
											</div>
										</div>
										
										<div id="hide">
										<div class="control-group">
											<label class="control-label" for="inputPassword"  placeholder="Device Status" >Device Status</label>
											<div class="controls">
											<select value="" name="dev_status" required>
													<option><?php echo $row['dev_status']; ?></option>													
												</select>								
											</div>
										</div>
									   </div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Description</label>
											<div class="controls">
													<textarea name="dev_desc" id="ckeditor_full">
													<?php echo $row['dev_desc']; ?>
													</textarea>
											</div>
										</div>
                                                                                
                                                                                <div class="control-group">
											<label class="control-label" for="Image">Image</label>
											<div class="controls">
                                                                                             <input type='file' id="imgInp" class="span8" name="imgInp"  />
                                                                                            <br>
                                                                                            <img id="blah" src="<?php echo $row['gambar_asli']; ?>" alt="your image" height="100" />
											</div>
										</div>
                                                                                
                                                                                <script type="text/javascript">
                                                                                function readURL(input) {
                                                                                    if (input.files && input.files[0]) {
                                                                                        var reader = new FileReader();

                                                                                        reader.onload = function (e) {
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
										
										<div class="control-group">
										<div class="controls">
										
										<button id="update" data-placement="right" title="Click to update" name="update" type="submit" class="btn btn-info"><i class="icon-save icon-large"></i> Update</button>
										</div>
										</div>
										<script type="text/javascript">
										$(document).ready(function(){
										$('#update').tooltip('show');
										$('#update').tooltip('hide');
										});
										</script> 
										</form>
										
										<?php
                                                                                $target_dir = "uploads/";
                                                                                $target_file = $target_dir . basename($_FILES["imgInp"]["name"]);
                                                                                $uploadOk = 1;
                                                                                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                                                                
										if (isset($_POST['update'])){
                                                                                $tanggal = $_POST['tanggal'];  
										$dev_id = $_POST['dev_id'];
										$dev_desc = $_POST['dev_desc'];
										$dev_serial = $_POST['dev_serial'];
										$dev_brand = $_POST['dev_brand'];
										$dev_model = $_POST['dev_model'];
										$dev_status = $_POST['dev_status'];
                                                                                
                                                                                if (move_uploaded_file($_FILES["imgInp"]["tmp_name"], $target_file)) {
                                                                                    unlink($row['gambar_asli']);
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
										
										
									
										mysql_query("update stdevice set dev_id = '$dev_id' ,
                                                                                                    tanggal = '$tanggal',
                                                                                                    dev_desc = '$dev_desc',
                                                                                                    dev_serial  = '$dev_serial',
                                                                                                    dev_brand = '$dev_brand',
                                                                                                    dev_model = '$dev_model',
                                                                                                    dev_status = '$dev_status',
                                                                                                    gambar_asli = '$gambar_asli'    
                                                                                                    where id = '$get_id' ")or die(mysql_error());
																										
									    mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Edit device info $dev_name')")or die(mysql_error());
										?>
										<script>										
										window.location = "device_stocks.php";
										$.jGrowl("Device Successfully Update", { header: 'Device update' });
										</script>
										<?php
										}
										
										
										?>
									
								
		                            </div>
		                        </div>
		                        <!-- /block -->
		                    </div>
		                </div>
            </div>
<script>
	jQuery(document).ready(function(){
		jQuery("#opt11").hide();
		jQuery("#opt12").hide();
		jQuery("#opt13").hide();		

		jQuery("#qtype").change(function(){	
			var x = jQuery(this).val();			
			if(x == '1') {
				jQuery("#opt11").show();
				jQuery("#opt12").hide();
				jQuery("#opt13").hide();
			} else if(x == '2') {
				jQuery("#opt11").hide();
				jQuery("#opt12").show();
				jQuery("#opt13").hide();
			}
		});
		
	});
</script>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>