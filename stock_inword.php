<?php
	include("index_layout.php");
	include("database.php");
 
	if(isset($_POST['sub']))	
	{
		$item_name=$_POST['item_name'];	
		$price=$_POST['price'];	
		mysql_query("insert into `master_item` SET `item_name`='$item_name',`price`='$price'");	
	}
?>
<?php 
	if(isset($_POST['sub_del']))
	{
		$delet_item=$_POST['delet_item'];
		mysql_query("update `master_item` SET `flag`='1' where id='$delet_item'" );
	}
	if(isset($_POST['sub_edit']))
	{
		$edit=$_REQUEST['edit_id'];  
		$item_name=mysql_real_escape_string($_REQUEST["item_name"]);
		$price=mysql_real_escape_string($_REQUEST["price"]);
		$r=mysql_query("update `master_item` SET `item_name`='$item_name',`price`='$price' where id='$edit'" );
		$r=mysql_query($r);
		echo '<script text="javascript">alert(Item Added Successfully")</script>';	
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
		<title>Master Item</title>
	</head>
	<?php contant_start(); menu();  ?>
	<body>
		<div class="page-content-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-md-3">
					</div>
					<div class="col-md-6">
						<div class="portlet box">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i>Master Item
								</div>
							</div>
							<div class="portlet-body form">
							<!-- BEGIN FORM-->
								<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
									<div class="form-body">
										<div class="form-group">
											<label class="control-label col-md-3">Item Name</label>
											<div class="col-md-6">
												<div class="input-icon right">
													<i class="fa"></i>
													<input class="form-control" placeholder="Please Enter item Name" required name="item_name" autocomplete="off" type="text">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Quantity</label>
											<div class="col-md-6">
												<div class="input-icon right">
												<i class="fa"></i>
												<input class="form-control" placeholder="Please Enter quantity" required name="quantity" autocomplete="off" type="text">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Item Rate</label>
											<div class="col-md-6">
												<div class="input-icon right">
													<i class="fa"></i>
													<input class="form-control" placeholder="Please Enter item Rate" required name="rate" autocomplete="off" type="text">
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

</html>
 

