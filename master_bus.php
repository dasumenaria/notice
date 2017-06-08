<?php
 include("index_layout.php");
 include("database.php");
 
 
if(isset($_POST['submit']))
{
 
$vehicle_type=$_POST["vehicle_type"];
$vehicle_no=$_POST["vehicle_no"];
 
/*  echo"insert into note(vehicle_type,vehicle_no)values('$vehicle_type','$vehicle_no')"; 
 exit;
   */
$sql="insert into master_bus(vehicle_type,vehicle_no)values('$vehicle_type','$vehicle_no')";
$r=mysql_query($sql);
 
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
<title>Master Bus</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Master Bus
							</div>
							<div class="tools">
							 
								
							</div>
						</div>
						<div class="portlet-body form">
						 
<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
					<br/>
				<div class="form-group">
					<label class="col-md-3 control-label">Vehicle Type</label>
					<div class="col-md-4">
					<input type="text" class="form-control" placeholder="Vehicle Type" name="vehicle_type">
					</div>
				</div> 
				<div class="form-group">
					<label class="col-md-3 control-label">Vehicle No.</label>
					<div class="col-md-4">
					<input type="text" class="form-control" placeholder="Vehicle Type" name="vehicle_no">
					<span style="color:green;font-size:12px;">Like /* Bus 1, Bus 2 */ Auto 1/* Taxi 1... </span>
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
 

