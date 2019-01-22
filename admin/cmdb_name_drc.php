<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('app_name_drc_sidebar.php'); ?>
			    
				  <div class="span9" id="content">
                     <div class="row-fluid">
				  
					 <h2 id="sc" align="center"><image src="images/sclogo.png" width="45%" height="45%"/></h2>
				<?php	
	             $count_item=mysql_query("SELECT cmdb_id,
										   app_name,
										   os_name,
										   host_name,
										   ip_name,
										   platform_name,
										   ci_name,
										   dev_name
									  FROM cmdb_drc cmdb
										   LEFT JOIN application_name_drc app
											  ON cmdb.app_id = app.app_id
										   LEFT JOIN os_name_drc os
											  ON cmdb.os_id = os.os_id
										   LEFT JOIN host_name_drc HOST
											  ON cmdb.host_id = HOST.host_id
										   LEFT JOIN ip_name_drc ip
											  ON cmdb.ip_id = ip.ip_id
										   LEFT JOIN platform_name_drc plt
											  ON cmdb.plt_id = plt.platform_id
										   LEFT JOIN ci_name_drc ci
											  ON cmdb.ci_id = ci.ci_id
										   LEFT JOIN device_name_drc dev
											  ON cmdb.dev_id = dev.dev_id
										");
	             $count = mysql_num_rows($count_item);
                 ?>		                 					 
				   <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                             <div class="muted pull-left"><i class="icon-check"></i>&nbsp;New CMDB List</div>
							 <div class="muted pull-right">
								Number of CMDB: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                          </div>
						  
				<h4 id="sc">New CMDB List
					<div align="right" id="sc">Date:
						<?php
                            $date = new DateTime();
                            echo $date->format('l, F jS, Y');
                         ?></div>
				 </h4>		  
						   	 
  <div class="container-fluid">
 <div class="row-fluid">						 
 <br/>
	
</div>
</div>

<div class="block-content collapse in">
   <div class="span12">
	
<form id="send" method="post">	
<div class="empty">
	<div class="control-group">
		 <label class="control-label" for="inputEmail">Application Name</label>
			 <div class="controls">
				  <select name="app_id" class="chzn-select" required/>
				    <option></option>
			          <?php $result =  mysql_query("select * from application_name_drc")or die(mysql_error()); 
			          while ($row=mysql_fetch_array($result)){ ?>
				   <option value="<?php echo $row['app_id']; ?>&nbspName&nbsp<?php echo $row['app_name']; ?>"><?php echo $row['app_name']; ?></option>
				    <?php } ?>
				   </select>   
		    </div>
			
			<label class="control-label" for="inputEmail">Device Name</label>
			 <div class="controls">
				  <select name="dev_id" class="chzn-select" required/>
				    <option></option>
			          <?php $result =  mysql_query("select * from device_name_drc")or die(mysql_error()); 
			          while ($row=mysql_fetch_array($result)){ ?>
				   <option value="<?php echo $row['dev_id']; ?>&nbspName&nbsp<?php echo $row['dev_name']; ?>"><?php echo $row['dev_name']; ?></option>
				    <?php } ?>
				   </select>
		    </div>
			
			<label class="control-label" for="inputEmail">CI Name</label>
			 <div class="controls">
				  <select name="ci_id" class="chzn-select" required/>
				    <option></option>
			          <?php $result =  mysql_query("select * from ci_name_drc")or die(mysql_error()); 
			          while ($row=mysql_fetch_array($result)){ ?>
				   <option value="<?php echo $row['ci_id']; ?>&nbspName&nbsp<?php echo $row['ci_name']; ?>"><?php echo $row['ci_name']; ?></option>
				    <?php } ?>
				   </select>
		    </div>
			
			<label class="control-label" for="inputEmail">Host Name</label>
			 <div class="controls">
				  <select name="host_id" class="chzn-select" required/>
				    <option></option>
			          <?php $result =  mysql_query("select * from host_name_drc")or die(mysql_error()); 
			          while ($row=mysql_fetch_array($result)){ ?>
				   <option value="<?php echo $row['host_id']; ?>&nbspName&nbsp<?php echo $row['host_name']; ?>"><?php echo $row['host_name']; ?></option>
				    <?php } ?>
				   </select>
		    </div>
			
			<label class="control-label" for="inputEmail">Platform Name</label>
			 <div class="controls">
				  <select name="plt_id" class="chzn-select" required/>
				    <option></option>
			          <?php $result =  mysql_query("select * from platform_name_drc")or die(mysql_error()); 
			          while ($row=mysql_fetch_array($result)){ ?>
				   <option value="<?php echo $row['platform_id']; ?>&nbspName&nbsp<?php echo $row['platform_name']; ?>"><?php echo $row['platform_name']; ?></option>
				    <?php } ?>
				   </select>
		    </div>
			
			<label class="control-label" for="inputEmail">IP Address</label>
			 <div class="controls">
				  <select name="ip_id" class="chzn-select" required/>
				    <option></option>
			          <?php $result =  mysql_query("select * from ip_name_drc")or die(mysql_error()); 
			          while ($row=mysql_fetch_array($result)){ ?>
				   <option value="<?php echo $row['ip_id']; ?>&nbspName&nbsp<?php echo $row['ip_name']; ?>"><?php echo $row['ip_name']; ?></option>
				    <?php } ?>
				   </select>
		    </div>
			
			<label class="control-label" for="inputEmail">Operating System Name</label>
			 <div class="controls">
				  <select name="os_id" class="chzn-select" required/>
				    <option></option>
			          <?php $result =  mysql_query("select * from os_name_drc")or die(mysql_error()); 
			          while ($row=mysql_fetch_array($result)){ ?>
				   <option value="<?php echo $row['os_id']; ?>&nbspName&nbsp<?php echo $row['os_name']; ?>"><?php echo $row['os_name']; ?></option>
				    <?php } ?>
				   </select>
		    </div>
			
	</div>
			
	  <div class="control-group"> 
		<div class="controls">
		<button  class="btn btn-primary" id="snd" data-placement="right" title="Click to Assign"><i class="icon-share"> Assign CMDB</i></button>
         <script type="text/javascript">
	     $(document).ready(function(){
	     $('#snd').tooltip('show');
	     $('#snd').tooltip('hide');
	     });
	    </script>
			 		 
		 <div class="pull-right">
	      <a href="print_new.php" class="btn btn-info" id="print" data-placement="left" title="Click to Print"><i class="icon-print icon-large"></i> Print List</a> 
		       <script type="text/javascript">
		       $(document).ready(function(){
		       $('#print').tooltip('show');
		       $('#print').tooltip('hide');
		       });
		        </script> 	
         </div>
	  </div>
 </div>
</div>                      
  	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<thead>		
		        <tr>
				<th class="empty"></th>
					<th>Application Name</th>
					<th>Device Name</th>
					<th>CI Name</th>
					<th>Host Name</th>
			        <th>Platform Name</th>
					<th>IP Address</th>
					<th>Operating System Name</th>                   					              		  
		    </tr>
		</thead>
<tbody>
<!-----------------------------------Content------------------------------------>
	
		<?php
	    $device_query = mysql_query("SELECT cmdb_id,
									   app_name,
									   os_name,
									   host_name,
									   ip_name,
									   platform_name,
									   ci_name,
									   dev_name
								  FROM cmdb_drc cmdb
									   LEFT JOIN application_name_drc app
										  ON cmdb.app_id = app.app_id
									   LEFT JOIN os_name_drc os
										  ON cmdb.os_id = os.os_id
									   LEFT JOIN host_name_drc HOST
										  ON cmdb.host_id = HOST.host_id
									   LEFT JOIN ip_name_drc ip
										  ON cmdb.ip_id = ip.ip_id
									   LEFT JOIN platform_name_drc plt
										  ON cmdb.plt_id = plt.platform_id
									   LEFT JOIN ci_name_drc ci
										  ON cmdb.ci_id = ci.ci_id
									   LEFT JOIN device_name_drc dev
										  ON cmdb.dev_id = dev.dev_id
										  order by cmdb_id") or die(mysql_error());
	    while ($row = mysql_fetch_array($device_query)) {
		$id = $row['cmdb_id'];
		$dev_name = $row['dev_name'];
		?>
										
		<tr>
		<td width="30" class="empty">
			<input id="" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>&nbspName&nbsp<?php echo $dev_name; ?>" >
		</td>
			<td><?php echo $row['app_name']; ?></td>
			<td><?php echo $row['dev_name']; ?></td>
			<td><?php echo $row['ci_name']; ?></td>
			<td><?php echo $row['host_name']; ?></td>
			<td><?php echo $row['platform_name']; ?></td>
			<td><?php echo $row['ip_name']; ?></td>
			<td><?php echo $row['os_name']; ?></td>
		</tr>
											
	<?php } ?>   

</tbody>
</table>
</form>	
<script>
		jQuery(document).ready(function(){
		jQuery("#send").submit(function(e){
			e.preventDefault();{												
			var formData = jQuery(this).serialize();
			$.ajax({
			type: "POST",
			url: "send_cmdb_drc.php",
			data: formData,
			success: function(html){
					
			$.jGrowl("CMDB Successfully Assign", { header: 'CMDB Assign' });
			var delay = 500;
			setTimeout(function(){ window.location = 'cmdb_name_drc.php'  }, delay);  
						
			}
												
		 });
			
	   }
	});
});
</script>
				  		
</div>
</div>

</div>
</div>
</div>

	
<?php include('footer.php'); ?>
</div>
<?php include('script.php'); ?>
 </body>
</html>