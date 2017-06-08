<?php
 include("index_layout.php");
 include("database.php");
 
 
if(isset($_POST['submit']))
{
	 $vehicle_id=$_POST["vehicle_id"]; 
	 $station_id=$_POST["station_id"];
 
  $i=0;
  
 
	 foreach($station_id as $value){
	 	 $stion_id=$value;
 
/* echo "insert into bus_root(vehicle_id,station_id)values('$vehicle_id','$stion_id')";
exit; */
$sql="insert into bus_routes(vehicle_id,station_id)values('$vehicle_id','$stion_id')";
$r=mysql_query($sql);
 	 $i++;
	 }
}
	else
	{
		echo mysql_error();
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
							   
 
									<select class="form-control user select2me" name="vehicle_id" required  >
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
					<div class="form-group">
						<label class="control-label col-md-3">Select Station</label>
						<div class="col-md-4	">
							<select id="select2_sample_modal_2" class="form-control select2me" name="station_id[]" multiple >
							<option value="">---Select---</option>
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
						</div>
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
			</div></div>
</body>
<?php footer(); ?>

<?php scripts();?>

</html>
 

