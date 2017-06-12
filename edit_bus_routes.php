<?php
 include("index_layout.php");
 include("database.php");
 $vhcl_id=$_GET['v_id'];
 
if(isset($_POST['submit']))
{
	
	$station_id=$_POST["station_id"];
	
	$d_b="delete from `bus_routes` where `vehicle_id`='$vhcl_id'";
	$delet_bus_id=mysql_query($d_b);
	
	$i=0;
	foreach($station_id as $value){
	$stion_id=$value;
	
	$sql="insert into bus_routes(vehicle_id,station_id)values('$vhcl_id','$stion_id')";
$r=mysql_query($sql);
 	 $i++;
	 }
}
	  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Station</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Station
							</div>
							<div class="tools">
							 
								
								</div>
						</div>
						<div class="portlet-body form">
						 
<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
					<br/> 
					<div class="form-group">
						<label class="control-label col-md-3">Selected Station</label>
						<div class="col-md-4">
							<select id="select2_sample_modal_2" class="form-control select2me" name="station_id[]" multiple="multiple" selected="selected">
									<?php 
									$query=mysql_query("select * from `bus_routes` where vehicle_id='".$vhcl_id."'");
									while($fetch=mysql_fetch_array($query))
									{
										$i++;
										$id=$fetch['id'];
										$station_id=$fetch['station_id'];
										$query1=mysql_query("select `station` from `master_station` where id='".$station_id."'");
										$fetch1=mysql_fetch_array($query1); 
										$station=$fetch1['station'];
									?>
									 <option value="<?php echo $station_id ;?>" selected="selected"><?php echo $station;?></option>
									<?php } ?>
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
 

