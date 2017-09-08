<?php
 include("index_layout.php");
 include("database.php");
 
 
if(isset($_POST['sub_delete']))
{
	$delete_id= $_POST['delete_id'];
	$r=mysql_query("delete from `bus_routes` where id='$delete_id'" );
	$sql=mysql_query($r);
	header("location:bus_routes.php");
}

if(isset($_POST['submit']))
{
	$time_from=$_POST['time_from'];
	$time_to=$_POST['time_to'];
	$station_id=$_POST['station_id'];
	$vehicle_id=$_POST['vehicle_id'];
	  $count=sizeof($station_id); 
	for($i=0; $i<$count; $i++)
	{
		$station=$station_id[$i];
		$time_froms= $time_from[$i];
		$time_tos= $time_to[$i];
		$r=mysql_query("insert into `bus_routes` SET `vehicle_id`='$vehicle_id',`time_from`='$time_froms',`time_to`='$time_tos' , `station_id`='$station'");
		$sql=mysql_query($r);
	}
	header("location:bus_routes.php");
 	
}
?>
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Master Station</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Master Station
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body form">
						 
                <form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
					<br/>
					<div class="form-group">
							<label class="control-label col-md-3">Vehicle No</label>
							<div class="col-md-4">
							   
 
									<select class="form-control user ss" name="vehicle_id" required  >
									<option value="">---Select---</option>
								    <?php 
									$query=mysql_query("select * from `master_bus`");
									while($fetch=mysql_fetch_array($query))
									{$i++;
										  $id=$fetch['id'];
										  $vehicle_no=$fetch['vehicle_no'];
									?>
									<option value="<?php echo $id; ?>"><?php echo $vehicle_no; ?></option>
									<?php } ?>
									</select>
								 
								 
							</div>
						</div>
 				<div style="width:100%" align="center">	  
				<table class="table table-bordered table-striped table-hover" style="text-align:center">
					<tr style="text-align:center">
						<td width="100px">Subject</td>
						 
						<td>Pick Time</td>
						<td>Drop Time</td>
						<th>&nbsp;</th>
					</tr>
					 
					<tr>
					<td width="250px" >
						 
						<select class="form-control" name="station_id[]">
							<option value="">---Select Station---</option>
								<?php 
									$query=mysql_query("select * from `master_station`");
									while($fetch=mysql_fetch_array($query))
									{$i++;
										$id=$fetch['id'];
										$station=$fetch['station'];
									?>
									<option value="<?php echo $id; ?>"><?php echo $station; ?></option>
									<?php } ?>
						</select>
						  
					</td>
					 
					<td align="center">
						<input type='text' class="form-control timepicker timepicker-no-seconds input-small" name="time_from[]">
					</td>
					<td align="right">
						<input type='text' class="form-control timepicker timepicker-no-seconds input-small" name="time_to[]">
					</td>
					<td>
						<button type='button' class='AddNew btn btn-icon-only green'><i class="fa fa-plus"></i></button>
						
						<button type='button' class='RemoveRow btn btn-icon-only red'><i class="fa fa-trash"></i></button>
					</td>
						 
					</tr>
					 
				</table>
			</div>				
				<div class="form-actions top">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<input type="submit" name="submit" class="btn green" value="Submit">
								<button type="button" class="btn default">Cancel</button>
							</div>
						</div>
					</div>	

				</form>
            </div>
        </div>
                      
		<div class="portlet box">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>View Station
				</div>
			</div>
			<div class="portlet-body form">
			 <div class="table-scrollable" >
					<table class="table table-hover" width="100%" style="font-family:Open Sans;">
					<thead>
						<tr style="background:#F5F5F5">
							<th>S.No.</th>
							<th>Vehicle No</th>
							<th>Bus Station</th>
							<th>Pick Time</th>
							<th>Drop Time</th>
							<th>Action</th>
						</tr>
					</thead>
				 <?php
							 
			  		$r1=mysql_query("select * from bus_routes where flag='0' order by `vehicle_id`");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$id=$row1['id'];
					$vehicle_id=$row1['vehicle_id'];
						$bus=mysql_query("select * from master_bus where id='$vehicle_id'");		
						$bus_ftc=mysql_fetch_array($bus);
						$vehicle_no=$bus_ftc['vehicle_no'];
					
                    $time_from=$row1['time_from'];
                    $time_to=$row1['time_to'];
                    $station_id=$row1['station_id'];
						$bus=mysql_query("select * from master_station where id='$station_id'");		
						$bus_ftc=mysql_fetch_array($bus);
						$station=$bus_ftc['station'];
					?>
                    <tbody>
								<tr>
									<td>
							<?php echo $i;?>
									</td>
									<td class="search">
									<?php echo $vehicle_no; ?>
									</td>
                                    <td><?php echo $station;?></td>
                                    <td><?php echo $time_from;?></td>
                                    <td><?php echo $time_to;?></td>
									<td>
           
             
                                        
  			<a class="btn blue-madison red-stripe btn-sm"  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
            <div class="modal fade" id="delete<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete ?</span>
                        </div>
                        <div class="modal-footer">
                        <form method="post" name="delete<?php echo $id ;?>">
                            <input type="hidden" name="delete_id" value="<?php echo $id; ?>" />
                            <button type="submit" name="sub_delete" value="" class="btn btn-sm red-sunglo ">Yes</button> 
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </td>
        </tr>
        </tbody>
        <?php } ?>
        </table>-->
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
 
</body>
<?php footer(); ?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
	$('table').on('click', '.AddNew', function(){ 
  	//$('.AddNew').click(function(){  
	   var row = $(this).closest('tr').clone();
	   row.find('input').val('');
	   $(this).closest('tr').after(row);
 	   $('.date-picker').datepicker();
	   $('.timepicker').timepicker();
 	   //$('input[type="button"]', row).find('.AddNew').val('-');.addClass('RemoveRow')
	});

	$('table').on('click', '.RemoveRow', function(){ 
	  $(this).closest('tr').remove();
	});
});	
</script>
<?php scripts();?>

</html>
 

