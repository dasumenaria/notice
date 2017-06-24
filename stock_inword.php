<?php
	include("index_layout.php");
	include("database.php");
 
	if(isset($_POST['sub']))	
	{
		
		$item_id=$_POST['item_id'];	
		$quantity=$_POST['quantity'];	
		$date=$_POST['date'];	
		$total=$_POST['total'];	
		$remark=$_POST['remark'];	
		$r=mysql_query("insert into `stock_inword` SET `item_id`='$item_id',`quantity`='$quantity',`date`='$date',`total`='$total',`remark`='$remark'");	
		$r=mysql_query($r);
		
	}
?>

<html>
	<head>
		<?php css();?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Stock Inword</title>
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
									<i class="fa fa-gift"></i>Stock Inword
								</div>
							</div>
							<div class="portlet-body form">
							<!-- BEGIN FORM-->
								<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
									<div class="form-body">
										<div class="form-group">
											<label class="control-label col-md-3">Item Name</label>
											<div class="col-md-6">
												<i class="fa"></i>
												<select name="class_id" class="form-control class_id select2me" required="required" placeholder="Select..." id="sname">
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
													<input  class="form-control" required="required" placeholder="price" id='item_rate' value="" readonly>	
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
													<input  type="date" class="form-control" required="required" placeholder="select date"  name="date" value="date-picker($today)" >	
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Remarks</label>
											<div class="col-md-6">
												<div class="input-icon right">
													<i class="fa"></i>
													<input class="form-control" placeholder="Please Enter Remarks" required name="remark" autocomplete="off" type="text">
												</div>
											</div>
										</div>
										<div class="col-md-offset-5 col-md-6" style="">
												<button type="submit" name="sub" class="btn btn-primary">Submit</button>
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

<?php scripts();?>


<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>

$(document).ready(function() {
	$('.class_id').change(function(){	
		var amount = $(this).find('option:selected').attr('amount');
		$('#item_rate').val(amount);
		$('#total').val(amount);
		
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
 

