
  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Add Platform Name</i></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								 <!--------------------form------------------->
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="plt_name" id="focusedInput" type="text" placeholder = "Platform Name" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-info" id="save" data-placement="right" title="Click to Save"><i class="icon-plus-sign icon-large"> Save</i></button>
												<script type="text/javascript">
	                                            $(document).ready(function(){
	                                            $('#save').tooltip('show');
	                                            $('#save').tooltip('hide');
	                                            });
	                                            </script>
                                          </div>
                                        </div>
                                </form>
								
								</div>
                            </div>
                        </div>
                        <!-- /block -->
						
						<!-- <div class = "block">
							<div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Select Application Name</i></div>
                            </div>
								<div class="block-content">
									<div id='TextBoxesGroup'>
										<div id="TextBoxDiv1">
											<label>Textbox #1 : </label><input type='textbox' id='textbox1' >
										</div>
									</div>
									
									<br/>
									<input type='button' value='Add Button' id='addButton'>
									<input type='button' value='Remove Button' id='removeButton'>
										
								</div>
						</div> -->
						
						<!--- Batas Select --->
                    </div>				 
					
					
								
									
					<?php
if (isset($_POST['save'])){
$plt_name = strtoupper($_POST['plt_name']);

$query = mysql_query("select * from platform_name_drc where platform_name = '$plt_name'")or die(mysql_error());
$count = mysql_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Davice Name Already Exist');
</script>
<?php
}else{

mysql_query("insert into platform_name_drc (platform_name) values('$plt_name')")or die(mysql_error());

mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Add platform name drc $plt_name')")or die(mysql_error());
?>
<script>
window.location = "plt_name_drc.php";
$.jGrowl("Platform Name Successfully added", { header: 'Platform Name add' });
</script>


<?php
}
}
?>