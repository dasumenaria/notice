<?php
 
include("database.php");
 $class_id=$_GET['pon'];
 $sect_id=$_GET['pon1'];
 $stdnt_id=$_GET['pon2'];
 
  	if((!empty($class_id)) && (empty($sect_id))){ ?>

	<div class="form-group">
						<label class="control-label col-md-3">Section</label> 
							<div class="col-md-8">
							   <div class="input-icon right">
									<i class="fa"></i>
									<select class="form-control user1 select2me input-medium" id="sec_id" required name="section_id">
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
								  
							</div>
					</div>
					
			 	
 	<?php } 
if((!empty($class_id)) && (!empty($sect_id))){ 
?>
 
 <div class="form-group">
						<label class="control-label col-md-3">Subject</label> 
							<div class="col-md-8">
							   <div class="input-icon right">
									<i class="fa"></i>
									<select class="form-control select2me input-medium" required name="subject_id">
										<option value="">---Select Subject---</option>
											<?php 
												$query4=mysql_query("select * from `subject_mapping` where `class_id`='".$class_id."' && section_id='".$sect_id."'"); 
					 							while($fetch4=mysql_fetch_array($query4))
												{
													$subject_id=$fetch4['subject_id'];
													$sub=(explode(",",$subject_id));
													foreach($sub as $sub_id){
														$qt4=mysql_query("select * from `master_subject` where `id`='$sub_id'");
														$fetch_name=mysql_fetch_array($qt4);
														$subject_id=$fetch_name['id'];
														$subject_name=$fetch_name['subject_name']; ?>
															<option value="<?php echo $subject_id; ?>"><?php echo $subject_name; ?></option>
													<?php } ?>
											<?php } ?>
									</select>
								</div>
								 
							</div>
					</div>
 
 <?php }	?>


<script>
$('.date-picker').datepicker();
$('.timepicker').timepicker();
$('.AddNew').click(function(){
   var row = $(this).closest('tr').clone();
   row.find('input').val('');
   $(this).closest('tr').after(row);
   
   $('.date-picker').datepicker();
   $('.timepicker').timepicker();
   
   
   $('input[type="button"]', row).removeClass('AddNew').addClass('RemoveRow').val('-');
});

$('table').on('click', '.RemoveRow', function(){ 
  $(this).closest('tr').remove();
});	
	</script>
	
	
