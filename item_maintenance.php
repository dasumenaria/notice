<?php
	include("index_layout.php");
	include("database.php");
	$message="";
	if(isset($_POST['sub']))	
	{
		$item_id=$_POST['item_id'];
		$no_of_item=$_POST['no_of_item'];	
		$date1=$_POST['date'];
		$date=date('Y-m-d',strtotime($date1));	
		$remarks=$_POST['remarks'];
		$maintenance_cost=$_POST['maintenance_cost'];
		
		mysql_query("insert into `item_maintenance` (`item_id`,`no_of_item`,`date`,`remarks`,`maintenance_cost`) values('$item_id','$no_of_item','$date','$remarks','$maintenance_cost')");	
		
		$message="Stock sucessfully submited";
	}
?>

<html>
	<head>
		<?php css();?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Item Maintenance</title>
	</head>
	<?php contant_start(); menu();  ?>
	<body>
		<div class="page-content-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-md-12">
						<div class="portlet box">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i>Item Maintenance
								</div>
							</div>
							<div class="portlet-body form">
							<!-- BEGIN FORM-->
								<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"><br>
									<?php
									if(!empty($message))
									{
									?>
									<div class="alert alert-success">
											<strong>Success ! : </strong> <?php echo $message;?>
									</div>									
									<?php } ?>
									<div class="form-body">
										
										<div class="form-group">
											<label class="control-label col-md-3">Item Name</label>
											<div class="col-md-6">
												<i class="fa"></i>
												<select name="item_id" class="form-control class_id select2me" required="required" placeholder="Select..." id="sname">
													<option value=""></option>
															<?php
																$r1=mysql_query("select `item_name`,`id`,`price` from master_item where   flag = 0  order by id ASC");		
																$i=0;
																while($row1=mysql_fetch_array($r1))
																{
																$price = $row1['price'];	
																$id=$row1['id'];
																$item_name=$row1['item_name'];
															?>
													<option value="<?php echo $id; ?>"  ><?php echo $item_name;?></option>
														<?php } ?> 
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">No Of Quantity</label>
											<div class="col-md-6">
												<div class="input-icon right">
												<i class="fa"></i>
												<input class="form-control" placeholder="Please Enter No Of Item" required name="no_of_item" autocomplete="off" id='no_of_item' type="text">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Date</label>
											<div class="col-md-6">
												<div class="input-icon right">
													<input  type="text" class="form-control date-picker"  required="required" placeholder="DD-MM-YYYY"  name="date" value="" >	
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Remarks</label>
											<div class="col-md-6">
												<div class="input-icon right">
													<i class="fa"></i>
													<input class="form-control" placeholder="Please Enter Remarks" required name="remarks" autocomplete="off" type="text">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Maintenance Cost</label>
											<div class="col-md-6">
												<div class="input-icon right">
													<i class="fa"></i>
													<input class="form-control" placeholder="Please Enter Maintenance Cost" required name="maintenance_cost" autocomplete="off" type="text">
												</div>
											</div>
										</div>
										<div class="col-md-offset-5 col-md-6" style="">
												<input type="submit" name="sub" value="submit" class="btn btn-primary">
												<button type="reset" class="btn default">Cancel</button>
										</div>
										</br>
										</br>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
<?php footer(); ?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<?php scripts();?>

</html>
 

