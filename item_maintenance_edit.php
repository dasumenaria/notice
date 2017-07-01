<?php
 include("index_layout.php");
 include("database.php");
 $id=$_GET['id'];
  
if(isset($_POST['update_details']))  
	{
		$item_id=$_POST['item_id'];
		$no_of_item=$_POST['no_of_item'];
		$date=date('Y-m-d', strtotime($_POST['date']));
		$remarks=$_POST['remarks'];
		$maintenance_cost=$_POST['maintenance_cost'];
 		mysql_query("update `item_maintenance` set `item_id`='$item_id' ,`no_of_item`='$no_of_item',`date`='$date' , `remarks`='$remarks', `maintenance_cost`='$maintenance_cost' where `id` = '$id' ");
		$message='Stock Inward update successfully';	
		@header("location:item_maintenance_view.php");
	}
?> 
<html>
	<head>
	<?php css();?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Item Maintenance Edit</title>
	</head>
	<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i>Item Maintenance Edit
					</div>
							 
				</div>
				<div class="portlet-body form">
					<div class="form-body">
                        <div class="scroller" style="height:500px;"  data-always-visible="1" data-rail-visible="0">
                        <?php if($message){ ?>
                            <div id="success">
								<div class="alert alert-success">
									<strong><?php echo $message; ?></strong> 
                                </div>
                            </div>
                        <?php } ?> 
                        <form  class="form-horizontal" id="form_sample_2"  role="form" method="post"  > 
                        <table class="table-condensed table-bordered" style="width:100%;">
							<tbody>
								
								<div class="form-body">
								<?php
									$r1=mysql_query("select * from `item_maintenance` where `id`='$id'");
									$row1=mysql_fetch_array($r1);
									
										$i++;
										$item_id=$row1['item_id'];
										$no_of_item=$row1['no_of_item'];
										$date=date('d-m-Y',strtotime($row1['date']));
										$remarks=$row1['remarks']; 
										$maintenance_cost=$row1['maintenance_cost']; 
								?>
									<div class="form-group">
										<label class="control-label col-md-3">Item Name</label>
										<div class="col-md-6">
											<i class="fa"></i>
											<select name="item_id" class="form-control class_id select2me" required="required" placeholder="Select..." id="sname">
												<option value="item_name"></option>
														<?php
															$r1=mysql_query("select * from master_item where `flag` ='0'");		
															$i=0;
															while($row1=mysql_fetch_array($r1))
															{
															$price = $row1['price'];	
															$ids=$row1['id'];
															$item_name=$row1['item_name'];
														?>
												<option <?php if($ids ==$item_id){echo "selected";}?> value="<?php echo $ids; ?>" amount = '<?php echo $price; ?>' ><?php echo $item_name;?></option>
													<?php } ?> 
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">No Of Quantity</label>
										<div class="col-md-6">
											<div class="input-icon right">
											<i class="fa"></i>
											<input class="form-control" placeholder="Please Enter No Of Quantity" required name="no_of_item" autocomplete="off" id='no_of_item'  onkeyup="myFunction()" value="<?php echo $no_of_item; ?>" type="text">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Date</label>
										<div class="col-md-6">
											<div class="input-icon right">
												<input type="text" class="form-control date-picker" required="required" placeholder="select date"  name="date" value="<?php echo $date ; ?>" >	
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Remarks</label>
										<div class="col-md-6">
											<div class="input-icon right">
												<i class="fa"></i>
												<input class="form-control" placeholder="Please Enter Remarks" name="remarks" autocomplete="off" value="<?php echo $remarks ; ?>" type="text">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Maintenance Cost</label>
										<div class="col-md-6">
											<div class="input-icon right">
												<i class="fa"></i>
												<input class="form-control" placeholder="Please Enter Maintenance Cost" name="maintenance_cost" autocomplete="off" value="<?php echo $maintenance_cost ; ?>" type="text">
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="update_details" class="btn blue" >Update</button>
										</div>
									</div>
								</div>
								 
							</tbody>
                        </table>
                        </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php footer();?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<?php scripts();?>
</html>