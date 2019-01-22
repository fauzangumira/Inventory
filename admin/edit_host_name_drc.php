<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('app_name_drc_sidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('edit_host_name_drc_form.php'); ?>		   			
				</div>
				<?php	
	             $count_host_name=mysql_query("select * from host_name_drc");
	             $count = mysql_num_rows($count_host_name);
                 ?>	
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
					<div class="empty">
                          <div class="alert alert-success alert-dismissable">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                             <i class="icon-info-sign"></i>  <strong>Note!:</strong> Select the checbox if you want to delete?
                          </div>
                    </div>
					 
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i> Host Name (s) List</div>
								<div class="muted pull-right">
								Number of Host Name: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_host_name_drc.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-placement="right" title="Click to Delete check item"  data-toggle="modal" href="#host_delete_drc" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"> Delete</i></a>
									<script type="text/javascript">
									 $(document).ready(function(){
									 $('#delete').tooltip('show');
									 $('#delete').tooltip('hide');
									 });
									</script>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
												<th></th>
												<th>Host Name</th>																							
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$host_name_query = mysql_query("select * from host_name_drc")or die(mysql_error());
													while($row = mysql_fetch_array($host_name_query)){
													$id = $row['host_id'];
													?>
									
												<tr>
												<td width="30">
												<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>

												<td><?php echo $row['host_name']; ?></td>
											
												<?php include('toolttip_edit_delete.php'); ?>															
												<td width="75">
												
												<a rel="tooltip"  title="Edit Client" id="e<?php echo $id; ?>" href="edit_host_name_drc.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"> Edit</i></a>
												</td>
		
									
												</tr>
												<?php } ?>
										</tbody>
									</table>
									</form>
                                </div>
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

</html>