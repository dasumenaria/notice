<?php
include("database.php");
  @$class_id=$_GET['pon'];
  @$sect_id=$_GET['pon1'];
  	if((!empty($class_id)) && (empty($sect_id))){ ?>

	<div class="form-group">
						<label class="control-label col-md-3">Section</label> 
							<div class="col-md-4">
							   <div class="input-icon right">
									<i class="fa"></i>
									<select class="form-control user1" required name="section_id">
										<option value="">---Select Section---</option>
											<?php 
												$query2=mysql_query("select * from `class_section` where `class_id`='$class_id'"); 
					 							while($fetch2=mysql_fetch_array($query2))
												{
													$i++;
													$section_id=$fetch2['section_id'];
													
													$qt=mysql_query("select * from `master_section` where `id`='$section_id'");
													$ft=mysql_fetch_array($qt);
	
													$section_id=$ft['id'];
													$section_name=$ft['section_name'];	
													
												?>
												<option value="<?php echo $section_id; ?>"><?php echo $section_name; ?></option>
											<?php } ?>
									</select>
								</div>
								<span class="help-block">
								Please Select Section</span>
							</div>
					</div>
					
 	<?php } 
if((!empty($class_id)) && (!empty($sect_id))){ 
 ?>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>
										 Sr.no
									</th>
									<th>
										 Name
									</th>
									<th>
										 Scholar
									</th>
									<th>
										 Class
									</th>
									<th>
										 Section
									</th>
									<th>
										 Teacher
									</th>
									<th>
										 Banned Facility
									</th>
									<th>
										 Reason
									</th>
									<th>
										 Date
									</th>

								</tr>
								</thead>
								<tbody>
									
									<?php 
									
									$query=mysql_query("select * from `login` where `class_id`='$class_id' && `section_id`='$sect_id' order by `name`");
									while($fetch=mysql_fetch_array($query))
									{
										$student_id=$fetch['id'];
										$name=$fetch['name'];
										$scholar_no=$fetch['eno'];
										$class_id=$fetch['class_id'];
										$section_id=$fetch['section_id'];
										
										$set=mysql_query("select `class_name` from `master_class` where `id`='$class_id'");
										$fet=mysql_fetch_array($set);
 										$class_name=$fet['class_name'];
										$set1=mysql_query("select `section_name` from `master_section` where `id`='$sect_id'");
										$fet1=mysql_fetch_array($set1);
										$section_name=$fet1['section_name'];
										
										$set=mysql_query("select * from `banned_students` where `student_id`='$student_id'");
										$fet=mysql_fetch_array($set);
										
										$banned_facility=$fet['banned_facility'];
										$reason=$fet['reason'];
										$user_id=$fet['user_id'];
										$created_on=date('d-M-Y', strtotime($fet['created_on']));
										
										$st=mysql_query("select `name` from `faculty_login` where `id`='$user_id'");
										$ft=mysql_fetch_array($st);
										$teacher_name=$ft['name'];
										$count=mysql_num_rows($set);
										if($count>0){
											$f++;
										?>
									<tr>
										<td><?php echo $f; ?></td>
								        <td><?php echo $name; ?></td>
										<td><?php echo $scholar_no; ?></td>
										<td><?php echo $class_name; ?></td>
										<td><?php echo $section_name; ?></td>
										<td><?php echo $teacher_name; ?></td>
										<td><?php echo $banned_facility; ?></td>
										<td><?php echo $reason; ?></td>
										<td><?php echo $created_on; ?></td>
									</tr>
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
	
	
