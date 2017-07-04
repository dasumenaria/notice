<?php
	include("index_layout.php");
	include("database.php");
	
ini_set('max_execution_time', 100000);
date_default_timezone_set('Asia/Calcutta');	
$date_convrt=date('d-m-Y');
$date=date("Y-m-d",strtotime($date_convrt));
$time = date('h:i:s a', time());
	$message1="";
if(isset($_POST['sub']))
{
$visitor=$_POST['visitor'];
$contact=$_POST['contact'];
$city=$_POST['city'];
$Vehicle=$_POST['Vehicle'];
$host=$_POST['host'];
$Remark=$_POST['remark'];


mysql_query("insert into `visitor_reg` set `visitor_name`='$visitor',`contact_no`='$contact',`city`='$city',`Vehicle_no`='$Vehicle',`host_name`='$host',`in_time` = '$time' , `in_date` = '$date',`remark`='$Remark',`user_id`='$member_id',`status_id`='0'");

echo "<script language=\"javascript\">
		alert('Visitor CheckedIn SuccessFully .');
		window.location='visitor_checkedIn.php';
	</script>
	";
}
?>

<html>
	<head>
		<?php css();?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Registration</title>
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
									<i class="fa fa-gift"></i>Visitor Register
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
									
									<div class="form-body">
										
										<div class="form-group">	
											<label class="control-label col-md-4">Visitor Name</label>
											<div class="col-md-4">
												<input type="text" class="form-control" name="visitor" required/></td>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-4">Contact No.</label>
											<div class="col-md-4">
												<input class="form-control" type="text" maxlength="10" min="10" name="contact" >
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-4">City/Place</label>
											<div class="col-md-4">
												<input class="form-control" type="text"  name="city" ></input>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-4">Vehicle No.</label>
											<div class="col-md-4">
												<input type="text" name="Vehicle" class="form-control"/>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-4">Whom To Meet</label>
											<div class="col-md-4">
												<input type="text" name="host" class="form-control" required/>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-4">Remarks</label>
											<div class="col-md-5">
												<textarea class="form-control" rows="3"  style="resize:none;" name="remark"></textarea>
											</div>
										</div>
										<div class="form-group">
												<label class="control-label col-md-4"></label>
											<div class="col-md-8">
												<button type="submit" name="sub" class="btn green" />&nbsp;Checked In</button>
												
											</div>	
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
</html>
 

