<?php
	include("index_layout.php");
	include("database.php");
	$message="";
	if(isset($_POST['sub']))	
	{
		
		
		$stock_type=$_POST['stock'];
		$vendor_id=$_POST['vender_id'];
		$item_id=$_POST['item_id'];
		$quantity=$_POST['quantity'];	
		$date1=$_POST['date']; 
			$date=date('Y-m-d',strtotime($date1));
		$total=$_POST['total'];	
		$item_rate=$_POST['item_rate'];	
		$remarks=$_POST['remarks'];
		if($stock_type==1)
		{
		mysql_query("insert into `stock_inward` (`stock_type`,`vendor_id`,`item_id`,`quantity`,`item_rate`,`date`,`total`,`remarks`) values('$stock_type','$vendor_id','$item_id','$quantity','$item_rate','$date','$total','$remarks')");
		
			$fetchstock=mysql_query("select * FROM `stock_quantity` where `item_id`='$item_id'");
			$count=mysql_num_rows($fetchstock);
			if($count >0)
			{
				//update
				$row1=mysql_fetch_array($fetchstock);
				$FTCid=$row1['id'];
				$FTCquantity=$row1['quantity'];
			
				$FTCitem_id=$row1['item_id'];
				$totalquantity=$FTCquantity+$quantity;
				mysql_query("update `stock_quantity` set `quantity`='$totalquantity' where `id`='$FTCid'");

			}
				else
				{
					//insert
					mysql_query("insert into `stock_quantity` (`item_id`,`quantity`) values('$item_id','$quantity')");

				}
			$message1="Stock sucessfully submited";
		}
		else if($stock_type==2)
		{
			
			$fetchstock=mysql_query("select * FROM `stock_quantity` where `item_id`='$item_id'");
							$row1=mysql_fetch_array($fetchstock);
				$FTCid=$row1['id'];
				$FTCquantity=$row1['quantity'];
			if($FTCquantity >=$quantity)
			{
				//update

				mysql_query("insert into `stock_inward` (`stock_type`,`vendor_id`,`item_id`,`quantity`,`item_rate`,`date`,`total`,`remarks`) values('$stock_type','$vendor_id','$item_id','$quantity','$item_rate','$date','$total','$remarks')");
				$FTCitem_id=$row1['item_id'];
				$totalquantity=$FTCquantity-$quantity;
				
				mysql_query("update `stock_quantity` set `quantity`='$totalquantity' where `id`='$FTCid'");

			}
			else
			{
				$message="Input quantity should be less then available quantity";

			}
		}	
	}
?>

<html>
	<head>
		<?php css();?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Stock Inward</title>
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
									<i class="fa fa-gift"></i>Stock Inward
								</div>
							</div>
							<div class="portlet-body form">
							<!-- BEGIN FORM-->
								<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"><br>
									<?php
									if(!empty($message1))
									{
									?>
									<div class="alert alert-success">
											<strong>Success ! : </strong> <?php echo $message1;?>
									</div>									
									<?php } ?>
									<?php
									if(!empty($message))
									{
									?>
									<div class="alert alert-danger">
										<strong>Error ! </strong> <?php echo $message;?>
									</div>
																		
									<?php } ?>
									<div class="form-body">
										<div class="form-group">
											<div style="padding-left:25%" class="radio-list">
												<label class="radio-inline">
													<input type="radio" name="stock" id="stock_inward" value="1" checked> Stock Inward</label>
												<label class="radio-inline">
													<input type="radio" name="stock" id="stock_outward" value="2">Stock Outward</label>	
											</div>
										</div>
										<div class="form-group">	
											<label class="control-label col-md-3">Vender Name</label>
											<div class="col-md-6">
												<i class="fa"></i>
												<select name="vender_id" class="form-control class_id select2me" required="required" placeholder="Select..." id="sname">
													<option value=""></option>
															<?php
																$r1=mysql_query("select `id`,`vendor_name` from master_vendor ");
																$i=0;
																while($row1=mysql_fetch_array($r1))
																{
																$id=$row1['id'];
																$vender_name=$row1['vendor_name'];
															?>
													<option value="<?php echo $id; ?>" ><?php echo $vender_name;?></option>
														<?php } ?> 
												</select>
											</div>
										</div>
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
													<option value="<?php echo $id; ?>" amount = '<?php echo $price; ?>' ><?php echo $item_name;?></option>
														<?php } ?> 
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Quantity</label>
											<div class="col-md-6">
												<div class="input-icon right">
												<i class="fa"></i>
												<input class="form-control" placeholder="Please Enter quantity" required name="quantity" autocomplete="off" id='quantity'  onkeyup="myFunction()" type="text">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Item Rate</label>
											<div class="col-md-6">
												<div class="input-icon right">
													<input  class="form-control" required="required" placeholder="price" id='item_rate' name="item_rate" value="" readonly>	
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Total</label>
											<div class="col-md-6">
												<div class="input-icon right">
													<input  class="form-control" required="required" placeholder="Total" id='total' value="" name="total" readonly>	
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Date</label>
											<div class="col-md-6">
												<div class="input-icon right">
													<input  type="text" class="form-control date-picker" required="required" placeholder="DD-MM-YYYY"  name="date" value="" >	
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
<?php scripts();?>

</html>
 

