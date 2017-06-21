<?php
 
include("database.php");
  @$class_id=$_GET['pon'];
  @$sect_id=$_GET['pon1'];
  @$sub_id=$_GET['pon2'];
  @$exm_id=$_GET['pon3'];
 
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
if((!empty($class_id)) && (!empty($sect_id)) && (empty($sub_id))){ 
 ?>
<div class="form-group">
						<label class="control-label col-md-3">Subject</label> 
							<div class="col-md-4">
							   <div class="input-icon right">
									<i class="fa"></i>
									<select class="form-control user2" required name="subject_id">
										<option value="">---Select Subject---</option>
											<?php 
											
												$queryas=mysql_query("select * from `subject_mapping` where `class_id` = '$class_id' && `section_id` = '$sect_id'"); 
					 							$setch3=mysql_fetch_array($queryas);											
												$subject_id= $setch3['subject_id'];
												if(!empty($subject_id))
												{
													$ep_sub=explode(',',$subject_id);	
													foreach($ep_sub as $data)
													{
														$query2=mysql_query("select * from `master_subject` where `id` = '$data'"); 	
														$fetch2=mysql_fetch_array($query2);
														$id=$fetch2['id'];
														$subject_name=$fetch2['subject_name'];
													 
 												 
												?>
												<option value="<?php echo $id; ?>"><?php echo $subject_name; ?></option>
											<?php }
												}
												?>
									</select>
								</div>
								<span class="help-block">
								Please Select Subject</span>
							</div>
					</div>

<?php }	

if((empty($class_id)) && (empty($sect_id))  && (!empty($sub_id))){ ?>
	<div class="form-group">
		<label class="control-label col-md-3">Exam Term</label> 
			<div class="col-md-4">
			   <div class="input-icon right">
					<i class="fa"></i>
					<select class="form-control user3" required name="exam_id">
						<option value="">---Select Exam---</option>
							<?php 
								$query2=mysql_query("select * from `master_exam`"); 
								while($fetch2=mysql_fetch_array($query2))
								{
									$i++;
									 
									$id=$fetch2['id'];
									$exam_type=$fetch2['exam_type'];
								
								?>
								<option value="<?php echo $id; ?>"><?php echo $exam_type; ?></option>
							<?php } ?>
					</select>
				</div>
				<span class="help-block">
				Please Select Exam</span>
			</div>
	</div>
<?php } ?>	
<?php if((!empty($class_id)) && (!empty($sect_id))  && (!empty($sub_id)) && (!empty($exm_id))) { ?>


<a style="padding: 3px 15px; background-color:rgba(218, 73, 73, 0.74); color:#FFF;margin-left:30%" href="number_sheet.php?cls=<?php echo $class_id; ?>&sec=<?php echo $sect_id; ?>&sub=<?php echo $sub_id; ?>&trm=<?php echo $exm_id; ?>" ><strong>Download Excel Sheet</strong></a>

<a style="padding: 3px 15px; background-color:rgba(218, 73, 73, 0.74); color:#FFF;margin-left:2%" href="assign_marks.php?cls=<?php echo $class_id; ?>&sec=<?php echo $sect_id; ?>&sub=<?php echo $sub_id; ?>&trm=<?php echo $exm_id; ?>" ><strong> Fill Marks</strong></a>

</br>
</br>
</br>
 

			 

<?php } ?>
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
	
	
