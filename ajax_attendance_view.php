<?php
include("database.php");
  @$class_id=$_GET['pon'];
  @$sect_id=$_GET['pon1'];
  @$attendance_mark=$_GET['pon2'];
  @$date=$_GET['dt'];
  if(empty($date)){
	  $org_date=date('Y-m-d');
  }else{
	  $org_date=date('Y-m-d', strtotime($date));
  }
 
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
					
					
					<div class="form-group">
						<label class="col-md-3 control-label">Date</label>
						<div class="col-md-4">
							<input class="form-control form-control-inline input-medium date-picker user3" required  value="<?php echo date("d-m-Y"); ?>" placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy" name="date_from">
						</div>
					</div>
										
										
					<div class="form-group">
						<label class="control-label col-md-3">Type</label> 
							<div class="col-md-4">
							   <div class="input-icon right">
									<i class="fa"></i>
									<select class="form-control user2" required name="attendance_mark">
										<option value="">---Select Section---</option>
										<option value="1">Present</option>
										<option value="2">Absent</option>
										<option value="3">Leave</option>
									</select>
								</div>
							</div>
					</div>
					
 	<?php } 
if((!empty($class_id)) && (!empty($sect_id)) && (empty($sub_id))){ 
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
										 Attendance
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
										
										if(empty($attendance_mark)){
											
										$set=mysql_query("select * from `attendance` where `student_id`='$student_id' && `attendance_date`='$org_date'");
										}
										else if(!empty($attendance_mark)){
										$set=mysql_query("select * from `attendance` where `student_id`='$student_id' && `attendance_date`='$org_date' && `attendance_mark`='$attendance_mark'");
											
										}
										$fet=mysql_fetch_array($set);
										
										$attendance_mark_get=$fet['attendance_mark'];
										$user_id=$fet['user_id'];
										$attendance_date=$fet['attendance_date'];
										if(($attendance_mark_get==1) || ($attendance_mark_get==2) || ($attendance_mark_get==3)){
											$f++;
										?>
									<tr>
										<td><?php echo $f; ?></td>
								        <td><?php echo $name; ?></td>
										<td><?php echo $scholar_no; ?></td>
										<td><?php echo $class_name; ?></td>
										<td><?php echo $section_name; ?></td>
										  
                            <td>
							<?php if($attendance_mark_get=='1'){ ?>
									<a class="btn btn-xs yellow">
										Present
									</a>
							<?php }else if($attendance_mark_get=='2'){ ?>
									<a class="btn btn-xs red">
										Absent
									</a>
							<?php }else if($attendance_mark_get=='3'){ ?>
									<a class="btn btn-xs green">
										Leave
									</a>
							<?php } ?>
                            	</td>												 
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
	
	
