n<?php
	include("index_layout.php");
	include("database.php");
 
	if(isset($_POST['sub']))
	{
		$vender_name=$_POST['vender_name'];	
		mysql_query("insert into `master_vendor` SET `vendor_name`='$vender_name'");	
	}
	if(isset($_POST['sub_del']))
	{
		$delet_vender=$_POST['delet_vender'];
		mysql_query("update `master_vendor` SET `flag`='1' where id='$delet_vender'" );
	}
	if(isset($_POST['sub_edit']))
	{
		$edit=$_REQUEST['edit_id'];  
		$vender_name=mysql_real_escape_string($_REQUEST["vender_name"]);
		$r=mysql_query("update `master_vendor` SET `vendor_name`='$vender_name' where id='$edit'" );
		$r=mysql_query($r);	
	}
?> 
<html>
	<head>
		<?php css();?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Master Vendor</title>
	</head>
		<?php contant_start(); menu(); ?>
	<body>
		<div class="page-content-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-md-6">
						<div class="portlet box">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i>Master Vendor
								</div>
							</div>
							<div class="portlet-body form">
							<!-- BEGIN FORM-->
								<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
									<div class="form-body">
										<div class="form-group">
											<label class="control-label col-md-3">Vendor Name</label>
											<div class="col-md-6">
												<div class="input-icon right">
													<i class="fa"></i>
													<input class="form-control" placeholder="Please Enter Vendor Name" required name="vender_name" autocomplete="off" type="text">
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
					<!-------------------------- View------------>
					<div class="col-md-6">
						<div class="portlet box">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i>View Vendor
								</div>
							</div>
							<div class="portlet-body form">
								<div class="table-scrollable" >
									<table class="table   table-hover" width="100%" style="font-family:Open Sans;">
										<thead>
											<tr style="background:#F5F5F5">
												<th> #</th>
												<th>Vendor Name</th>
												<th>Action</th>
											</tr>
										</thead>
										<?php $r1=mysql_query("select * from master_vendor where flag='0'");		
										$i=0;
										while($row1=mysql_fetch_array($r1))
										{
											$i++;
											$id=$row1['id'];
											$vender_name=$row1['vendor_name'];
										?>
										<tbody>
											<tr>
												<td><?php echo $i;?></td>
												<td class="search"><?php echo $vender_name;?></td>
												<td><a class="btn blue-madison blue-stripe btn-sm" rel="tooltip" title="Edit" data-toggle="modal" href="#edit<?php echo $id;?>"><i class="fa fa-edit"></i></a>
												&nbsp;
												<!--------editon-->
												<div class="modal fade" id="edit<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
													<div class="modal-dialog modal-md">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
																<div class="portlet-body form">
																	<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
																		<input type="hidden" name='edit_id' class="form-control" value="<?php echo $id;?>" >	
																		<div class="form-body">
																			<div class="form-group">
																				<label class="control-label col-md-3">Vendor Name</label>
																				<div class="col-md-6">
																					<div class="input-icon right">
																						<i class="fa"></i>
																						<input class="form-control" placeholder="Please Enter Vender Name" required name="vender_name" autocomplete="off" type="text" value="<?php echo $vender_name;?>">
																					</div>
																				</div>
																			</div>
																			<div class=" right1" align="right" style="margin-right:10px">
																				<button type="submit" class="btn green" name="sub_edit">Update</button>
																			</div>
																		</div>
																	</form>
																</div>
															</div>
														</div>
														<!-- /.modal-content -->
													</div>
													<!-- /.modal-dialog -->
												</div>
											<!---- update----->
												<a class="btn blue-madison red-stripe btn-sm"  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
												<div class="modal fade" id="delete<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
													<div class="modal-dialog modal-md">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
																<span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete this  Vender?</span>
															</div>
															<div class="modal-footer">
																<form method="post" name="delete<?php echo $id ;?>">
																	<input type="hidden" name="delet_vender" value="<?php echo $id; ?>" />
																	<button type="submit" name="sub_del" value="" class="btn btn-sm red-sunglo ">Yes</button> 
																</form>
															</div>
														</div>
														<!-- /.modal-content -->
													</div>
												<!-- /.modal-dialog -->
												</div>
												</td>
											</tr>
										</tbody>
										<?php } ?>
									</table>
								</div>
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
 

