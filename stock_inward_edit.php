<?php
	include("index_layout.php");
	include("database.php");
 
	if(isset($_POST['sub']))	
	{
		
		$item_id=$_POST['item_id'];
		$quantity=$_POST['quantity'];	
		$date=$_POST['date'];	
		$total=$_POST['total'];	
		$item_rate=$_POST['item_rate'];	
		$remarks=$_POST['remarks'];
		
		mysql_query("insert into `stock_inword` (`item_id`,`quantity`,`item_rate`,`date`,`total`,`remarks`) values('$item_id','$quantity','$item_rate','$date','$total','$remarks')");
		
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
								<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
									<div class="form-body">
										<?php
											$r1=mysql_query("select * from `stock_inword` where `id`='$id'");
											while($row1=mysql_fetch_array($r1))
											{
												$i++;
												$item_id=$row1['item_id'];
												$quantity=$row1['quantity'];
												$item_rate=$row1['item_rate'];
												$total=$row1['total'];
												$date=$row1['date'];
												$remarks=$row1['remarks'];
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
												<input class="form-control" placeholder="Please Enter quantity" required name="quantity" autocomplete="off" id='quantity'  onkeyup="myFunction()" value="quantity"type="text">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Item Rate</label>
											<div class="col-md-6">
												<div class="input-icon right">
													<input  class="form-control" required="required" placeholder="price" id='item_rate' name="item_rate" value="item_rate" readonly>	
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Total</label>
											<div class="col-md-6">
												<div class="input-icon right">
													<input  class="form-control" required="required" placeholder="Total" id='total' value="total" name="total" readonly>	
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Date</label>
											<div class="col-md-6">
												<div class="input-icon right">
													<input  type="date" class="form-control" required="required" placeholder="select date"  name="date" value="date" >	
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Remarks</label>
											<div class="col-md-6">
												<div class="input-icon right">
													<i class="fa"></i>
													<input class="form-control" placeholder="Please Enter Remarks" required name="remarks" autocomplete="off" value="remakrs" type="text">
												</div>
											</div>
										</div>
										<div class="col-md-offset-5 col-md-6" style="">
												<input type="submit" name="sub" value="submit" class="btn btn-primary">
												<button type="reset" class="btn default">Cancel</button>
										</div>
										</br>
										</br>
										<?php } ?>
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
 

