<?php
 
include("database.php");
$class_id=$_GET['pon'];
@$sect_id=$_GET['pon1'];

if((!empty($class_id))){ 
?>
<div class="portlet-body">
  <table  align='center' class="table table-striped table-bordered " style="width:20%;text-align:center">
    <tr>
  	<td>achivements</td>
	 
	<td>Rank</td>
	<td>&nbsp;</td>
	</tr>
	 
	<tr>
	<td align="right">
		<input type='text'class="form-control input-medium " name="achivement[]">
	</td>
	 
 	<td align="right">
		<input type='text'class="form-control input-medium " name="rank[]">
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
	
	
