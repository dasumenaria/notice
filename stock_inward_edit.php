<?php
 include("index_layout.php");
 include("database.php");
 $id=$_GET['id'];
  
if(isset($_POST['update_details'])) 
	{
		$vender_id=$_POST['vender_id'];
		$item_id=$_POST['item_id'];
		$quantity=$_POST['quantity'];
		$item_rate=$_POST['item_rate']; 
		$total=$_POST['total'];
		$date=date('Y-m-d', strtotime($_POST['date']));
		 $remarks=$_POST['remarks'];
		$update_id=$_POST['update_id'];
 		mysql_query("update `stock_inward` set `vender_id`='$vender_id' ,`item_id`='$item_id' ,`quantity`='$quantity' ,`item_rate`='$item_rate' , `total`='$total' ,`date`='$date' , `remarks`='$remarks' where `id` = '$id' ");
		$message='Stock Inward update successfully';	

$set=mysql_query("select SUM(quantity) FROM `stock_inward` where `item_id`='$item_id'");
$fet=mysql_fetch_array($set);
$total_quantity=$fet[0];

			mysql_query("update `stock_quantity` set `quantity`='$total_quantity' where `item_id`='$item_id'");
	}


 ?> 
<html>
	<head>
	<?php css();?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Stock Inward Edit</title>
	</head>
	<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i> Stock Inward Edit
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
                        <table class="table-condensed table-bordered" style="width:100%;">
							<tbody>
								<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"  > 
								<div class="form-body">
								<?php
									
									
									$r1=mysql_query("select * from `stock_inward` where `id`='$id'");
									$row1=mysql_fetch_array($r1);
									
										$i++;
										$vender_id=$row1['vender_id'];
										$item_id=$row1['item_id'];
										$quantity=$row1['quantity'];
										$item_rate=$row1['item_rate'];
										$total=$row1['total'];
										$date=$row1['date'];
										$remarks=$row1['remarks']; 
								?>
								
									<div class="form-group">
										<label class="control-label col-md-3">Vender Name</label>
										<div class="col-md-6">
											<i class="fa"></i>
											<select name="vender_id" class="form-control class_id select2me" required="required" placeholder="Select..." id="sname">
												<option value="item_name"></option>
														<?php
															$r1=mysql_query("select * from master_vender where `flag` = '0' ");		
															$i=0;
															while($row1=mysql_fetch_array($r1))
															{
																
															$ids=$row1['id'];
															$vender_name=$row1['vender_name'];
														?>
												<option <?php if($ids ==$vender_id){echo "selected";}?> value="<?php echo $ids; ?>"  ><?php echo $vender_name;?></option>
													<?php } ?> 
											</select>
										</div>
									</div></br></br>
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
									</div></br></br>
									<div class="form-group">
										<label class="control-label col-md-3">Quantity</label>
										<div class="col-md-6">
											<div class="input-icon right">
											<i class="fa"></i>
											<input class="form-control" placeholder="Please Enter quantity" required name="quantity" autocomplete="off" id='quantity'  onkeyup="myFunction()" value="<?php echo $quantity; ?>" type="text">
											</div>
										</div>
									</div></br></br>
									<div class="form-group">
										<label class="control-label col-md-3">Item Rate</label>
										<div class="col-md-6">
											<div class="input-icon right">
												<input  class="form-control" required="required" placeholder="price" id='item_rate' name="item_rate" value="<?php echo $item_rate; ?>" readonly>	
											</div>
										</div>
									</div></br></br>
									<div class="form-group">
										<label class="control-label col-md-3">Total</label>
										<div class="col-md-6">
											<div class="input-icon right">
												<input  class="form-control" required="required" placeholder="Total" id='total' value="<?php echo $total; ?>" name="total" readonly>	
											</div>
										</div>
										<input  type="hidden" name="update_id" value="<?php echo $id ; ?>" >	
									</div></br></br>
									<div class="form-group">
										<label class="control-label col-md-3">Date</label>
										<div class="col-md-6">
											<div class="input-icon right">
												<input  type="date" class="form-control" required="required" placeholder="select date"  name="date" value="<?php echo $date ; ?>" >	
											</div>
										</div>
									</div></br></br>
									<div class="form-group">
										<label class="control-label col-md-3">Remarks</label>
										<div class="col-md-6">
											<div class="input-icon right">
												<i class="fa"></i>
												<input class="form-control" placeholder="Please Enter Remarks" required name="remarks" autocomplete="off" value="<?php echo $remarks ; ?>" type="text">
											</div>
										</div>
									</div>
									</br>
									</br>

									<div class="form-group">
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="update_details" class="btn blue" >Update</button>
										</div>
									</div>
								</div>
								</div>
							</tbody>
                        </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php footer();?>
<?php scripts();?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>

$(document).ready(function() {
	$('.class_id').change(function(){	
		var amount = $(this).find('option:selected').attr('amount');
		$('#item_rate').val(amount);
		
		
	});

		
});
function myFunction() 
	{
		
	var x = document.getElementById("quantity");
    var y = document.getElementById("item_rate");
    var z = document.getElementById("total");
	z.value = parseInt(x.value * y.value);

	}
	


</script>
</html>