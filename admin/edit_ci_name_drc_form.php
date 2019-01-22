<div class="row-fluid">				  
   <a href="ci_name.php" class="btn btn-info" id="add" data-placement="right" title="Click to Add Client" ><i class="icon-plus-sign icon-large"></i> Add CI Name</a>
   <script type="text/javascript">
	$(document).ready(function(){
	$('#add').tooltip('show');
	$('#add').tooltip('hide');
	});
	</script> 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-pencil icon-large"></i> Edit CI Name</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php
								$query = mysql_query("select * from ci_name_drc where ci_id = '$get_id'")or die(mysql_error());
								$row = mysql_fetch_array($query);
								?>
								
								 <!-- --------------------form ---------------------->						
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['ci_name']; ?>" name="ci_name" id="focusedInput" type="text" placeholder = "CI Name" required>
                                          </div>
                                        </div>
										
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success" id="update" data-placement="right" title="Click to Update"><i class="icon-save icon-large"> Update</i></button>
                                                <script type="text/javascript">
	                                            $(document).ready(function(){
	                                            $('#update').tooltip('show');
	                                            $('#update').tooltip('hide');
	                                            });
	                                            </script>
                                          </div>
                                        </div>
                                </form>
										
					</div>
                </div>
            </div>
              <!-- /block -->
      </div>
<?php		
if (isset($_POST['update'])){

$ci_name = strtoupper($_POST['ci_name']);

mysql_query("update ci_name_drc set ci_name = '$ci_name'  where ci_id = '$get_id' ")or die(mysql_error());

mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Edit CI drc $ci_name')")or die(mysql_error());	
?>
<script>
  window.location = "ci_name_drc.php";
 $.jGrowl("CI Name Successfully Update", { header: 'CI Name Updated' });  
</script>
<?php
}
?>