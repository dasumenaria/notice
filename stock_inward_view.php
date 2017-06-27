<?php
 include("index_layout.php");
 include("database.php");
?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stock Inward View</title>
</head>

<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i> Stock Inward View
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
									<th>Vendor Name</th>
									<th>Item Name</th>
                                    <th>Quantity</th>
									<th>Rate</th>
                                    <th>Total</th>
									<th>Date</th>
									<th>Remarks</th>
                                    <th>Action</th>
								</tr>
							</thead>
                            <tbody>
								<?php
								$r1=mysql_query("select * from `stock_inward` where flag='0'");
								while($row1=mysql_fetch_array($r1))
								{
									$i++;
									$id=$row1['id'];
									$vender_id=$row1['vendor_id'];
										$qry_vender_name=mysql_query("select `vendor_name` from `master_vendor` where id='$vender_id'");
										$fetch_name=mysql_fetch_array($qry_vender_name);
											$vender_name=$fetch_name['vendor_name'];
									$item_id=$row1['item_id'];
										$qry_item_name=mysql_query("select `item_name` from `master_item` where id='$item_id'");
										$fetch_name=mysql_fetch_array($qry_item_name);
											$item_name=$fetch_name['item_name'];
									$quantity=$row1['quantity'];
									$item_rate=$row1['item_rate'];
									$total=$row1['total'];
									$date=$row1['date'];
									$remarks=$row1['remarks'];
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $vender_name;?></td>
									<td><?php echo $item_name;?></td>
									<td><?php echo $quantity;?></td>
									<td><?php echo $item_rate;?></td>
									<td><?php echo $total?></td>
									<td><?php echo $date;?></td>
									<td><?php echo $remarks;?></td>
									<td>
										<div class="btn-group">
											<a class="btn btn-sm yellow" href="stock_inward_edit.php?id=<?php echo $id; ?>"><i class="glyphicon glyphicon-edit"></i> Edit </a>
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
<script>
	$('.edit_contact').click(function(){
		var	id= $(this).attr('id');
		$.ajax({
			url: "ajax_page.php?function_name=edit_leave_note&id="+id,
			type: "POST",
			success: function(data)
			{   
				  $('.replace_data').html(data);
				  $('.date-picker').datepicker();
				  $('.timepicker').timepicker();
			}
		});
	});
	
	var myVar=setInterval(function(){myTimerr()},4000);
	function myTimerr() 
	{
		$("#success").hide();
	}
	
 </script>	


</html>