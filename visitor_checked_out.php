<?php
	include("index_layout.php");
	include("database.php");
	
date_default_timezone_set('Asia/Calcutta');	
$time = date('h:i:s a', time());
$date_convrt=date('d-m-Y');
$date=date("Y-m-d",strtotime($date_convrt));
$id_ses=$_SESSION['SESS_ID'];

	if(isset($_POST['sub_dat_gat']))
	{
				$id_cal = $_POST['update_id'];
				 $remark = $_POST['remark'];
				mysql_query("update  `visitor_reg`  set `out_time` = '$time',`out_date`='$date',`remark`='$remark',`user_id`='$id_ses' where `id` = '$id_cal'");
	}

?>

<html>
	<head>
		<?php css();?>
		<link href="csss/photo.css" type="text/css" rel="stylesheet" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Check Out View</title>
		
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
									<i class="fa fa-gift"></i>Checked Out
								</div>
							</div>
							
							<div class="portlet-body form">
							
							<!-- BEGIN FORM-->
									<table aria-describedby="sample_1_info" class="table table-striped table-bordered dataTable" id="sample_1">
									<thead>
										<tr>
											<th>S.No</th>
                                            <th>Name</th>
                                             <th>Host Name</th>
											<th>City</th>
                                             <th>Date</th>
											<th>In Time</th>
											<th>Checked Out</th>
										</tr>
									</thead>
									<tbody>
										<tr>
                                        <?php
										$i=0;
										$reg_all=mysql_query("select * from `visitor_reg` where `out_time`='' ");
										$num_rows =mysql_num_rows($reg_all);
										if($num_rows > 0)
											{
											while($ftc_data=mysql_fetch_array($reg_all))
												{
													$i++;
													$id = $ftc_data['id'];
													$in_date = $ftc_data['in_date'];
														$in_date_frmt=date("d-m-Y",strtotime($in_date));
													$in_time = $ftc_data['in_time'];
													$visitor_name = $ftc_data['visitor_name'];
													$city = $ftc_data['city'];	
													$host_name=$ftc_data['host_name'];
													$remark=$ftc_data['remark'];
											?>
									
											<td><?php echo $i ?></td>
											<td><?php echo $visitor_name ?></td>
                                            <td><?php echo $host_name ?></td>
											<td><?php echo $city ?></td>
                                            <td><?php echo $in_date_frmt ?></td>
                                            <td><?php echo $in_time ?></td>
                                           
											 <td>
											 <a class="btn mini red" data-toggle="modal" href="#checkout<?php echo $id; ?>"><i class="glyphicon glyphicon-ok"></i> Checked Out </a>
									
    								
										<div class="modal fade" id="checkout<?php echo $id; ?>" tabindex="-1" role="basic" aria-hidden="true" >
											<div class="modal-dialog">
												<form method="post">
												<div class="modal-content">
													<div class="modal-header">
														
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
														<h4 class="modal-title"><strong>Do you want to Checkout</strong></h4>
													</div>
													<div class="modal-body replace_data" style="min-height:80px;">
														<div class="form-group"><label style="width:30%"><b>Remarks</b></label><input type="text" class="form-control input-medium" name="remark" value="<?php echo $remark ;?>"/></div>
													</div>
													<input type="hidden" name="update_id" value="<?php echo $id; ?>">
													<div class="modal-footer">
														<button type="button" class="btn default" data-dismiss="modal">Close</button>
														<button type="submit" name="sub_dat_gat" class="btn red">Checkout</button>
													</div>
												</div>
												</form>
											</div>
										</div>
									</td></tr>
                                        <?php
                                        }
											}
											else
											{	echo "<p style='color:red'><strong>No Data Found</strong></p>";
											}
											
										?>
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
<?php footer(); ?>
<?php scripts();?>
</html>
 

