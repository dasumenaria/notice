<?php
 
include("database.php");
$class_id=$_GET['pon'];
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
					
			<div id="data"></div>		
 	<?php } 
if((!empty($class_id)) && (!empty($sect_id))){ 
?>
<div class="portlet-body">
  <table class="table table-striped table-hover" style="text-align:center">
    <tr>
	<td width="100px">Subject</td>
	 
	<td>Time of Starting</td>
	 
	<td>Time of Ending</td>
	 
	 <td>&nbsp;</td>
	 
	</tr>
	 
	<tr>
	<td width="250px" align="center">
		 
			<select class="select2me form-control" name="subject_id[]">
				<option value="">---Select Subject---</option>
											<?php 
												$query2=mysql_query("select * from `master_subject`"); 
					 							while($fetch2=mysql_fetch_array($query2))
												{
													$i++;
													 
													$subject_name=$fetch2['subject_name'];
													$subject_id=$fetch2['id'];
													
												 
												?>
												<option value="<?php echo $subject_id; ?>"><?php echo $subject_name; ?></option>
											<?php } ?>
			</select>
		  
	</td>
	 
	<td align="right">
		<input type='text'class="form-control timepicker timepicker-no-seconds input-medium" name="time_from[]">
	</td>
	 
 	<td align="right">
		<input type='text' class="form-control timepicker timepicker-no-seconds input-medium" name="time_to[]">
	</td>
	 
		 
	 
    
	 
	 
	<td>
		<input type='button' class='AddNew btn btn-icon-only green' value='+'>
		
	</td>
		 
	</tr>
	 
</table>
</div>
<div class="form-actions top">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<input type="submit" name="submit" class="btn green" value="Submit">
								<button type="button" class="btn default">Cancel</button>
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
   $('input[type="button"]', row).removeClass('AddNew').addClass('RemoveRow').val('-');
});

$('table').on('click', '.RemoveRow', function(){
  $(this).closest('tr').remove();
});	
	</script>
	
	
