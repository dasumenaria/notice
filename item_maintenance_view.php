<?php
 include("index_layout.php");
 include("database.php");
?>
<?php 
 
 if(isset($_POST['sub_del']))
{
   $delete_item=$_POST['delete_item'];
  mysql_query("update `item_maintenance` SET `flag`='1' where id='$delete_item'");
   @header('Location:item_maintenance_view.php'); 
  }?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Item Maintenance View</title>
</head>

<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i> Item Maintenance View
					</div>
				</div>
				<div class="portlet-body form">
					<div class="form-body">
						<?php if($message){ ?>
							<div id="success">
								<div class="alert alert-success">
									<strong><?php echo $message; ?></strong> 
								</div>
							</div>
                            <?php } ?> 
                            <table class="table-condensed table-bordered" style="width:100%;">
							<thead>
								<tr>
									<th>S. No.</th>
									<th>Item Name</th>
                                    <th>No Of Item</th>
									<th>Date</th>
									<th>Remarks</th>
									<th>Maintenance Cost</th>
                                    <th>Action</th>
								</tr>
							</thead>
                            <tbody>
								<?php
								$r1=mysql_query("select * from `item_maintenance` where flag='0'");
								while($row1=mysql_fetch_array($r1))
								{
									$i++;
									$id=$row1['id'];
									$item_id=$row1['item_id'];
										$qry_item_name=mysql_query("select `item_name` from `master_item` where id='$item_id'");
										$fetch_name=mysql_fetch_array($qry_item_name);
											$item_name=$fetch_name['item_name'];
									$no_of_item=$row1['no_of_item'];
									$date=date('d-m-Y', strtotime($row1['date']));
									$remarks=$row1['remarks'];
									$maintenance_cost=$row1['maintenance_cost'];
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $item_name;?></td>
									<td><?php echo $no_of_item;?></td>
									<td><?php echo $date;?></td>
									<td><?php echo $remarks;?></td>
									<td><?php echo $maintenance_cost;?></td>
									<td>
										<div class="btn-group">
											<a class="btn btn-sm yellow" href="item_maintenance_edit.php?id=<?php echo $id; ?>"><i class="glyphicon glyphicon-edit"></i> Edit </a>
											
										</div>
										<a class="btn blue-madison red-stripe btn-sm"  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
													<div class="modal fade" id="delete<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
														<div class="modal-dialog modal-md">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
																	<span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete this  Item?</span>
																</div>
																<div class="modal-footer">
																	<form method="post" name="delete<?php echo $id ;?>">
																		<input type="hidden" name="delete_item" value="<?php echo $id; ?>" />
																	
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
								<?php } ?>
                            </tbody>
							</table>
					</div>
				</div>
			</div>
		</div>
    </div>
</body>
<?php footer();?>
<?php scripts();?>

</html>