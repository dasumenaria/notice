<?php
include("database.php");
  @$faculty_id=$_GET['pon'];
  	if((!empty($faculty_id))){ ?>
 
					<div class="table-responsive">
					 <a style="padding: 3px 15px; background-color:rgba(218, 73, 73, 0.74); color:#FFF" href="work_report_excel.php" target="blank"><strong>Excel</strong></a><br>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>
										 Sr.no
									</th>
									<th>
										Teacher Name
									</th>
									<th>
										 Field
									</th>
									<th>
										 Description
									</th>
									<th>
										 Remark
									</th>
									<th>
										 Date
									</th>
								</tr>
								</thead>
								<tbody>
									
									<?php 
									
									$query=mysql_query("select * from `faculty_login` where `id`='$faculty_id'");
									$fetch=mysql_fetch_array($query);
									
										$name=$fetch['name'];
										 
										$set=mysql_query("select * from `work_report` where `user_id`='$faculty_id' ORDER BY `id` DESC");
										$count=mysql_num_rows($set);
										while($fet=mysql_fetch_array($set))
										{
										$field=$fet['field'];
										$description=$fet['description'];
										$remarks=$fet['remarks'];
										$timestamp=date('d-M-Y', strtotime($fet['timestamp']));
										if($count>0){
											$f++;
										?>
									<tr>
										<td><?php echo $f; ?></td>
								        <td><?php echo $name; ?></td>
										<td><?php echo $field; ?></td>
										<td><?php echo $description; ?></td>
										<td><?php echo $remarks; ?></td>
										<td><?php echo $timestamp; ?></td>
									</tr>
										<?php } else{ ?>
										<tr><td align="center" colspan="6">No Record Found</td></tr>
										<?php } } ?>
								</tbody>
							</table>
						</div>

<?php }	?>
<script>
	$('.date-picker').datepicker();
	$('.timepicker').timepicker();
	$('.AddNew').click(function(){
	   var row = $(this).closest('tr').clone();
	   row.find('input').val('');
	   $(this).closest('tr').after(row);
	   $('input[type="button"]', row).removeClass('AddNew').addClass('RemoveRow').val('-');
	});

	$('table').on('click', '.RemoveRow', function(){
	  $(this).closest('tr').remove();
	});
</script>
	