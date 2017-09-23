<?php
include("database.php");
  @$poll_id=$_GET['pon'];
  	if((!empty($poll_id))){ 
	
	
	$sets=mysql_query("select * from `poll` where `id`='$poll_id'");
	$fets=mysql_fetch_array($sets);
	
	$id=$poll_id;
	$question=$fets['question'];
	$img_name=$fets['image'];
	?>
	<a class="btn blue-madison blue-stripe btn-sm"  rel="tooltip" title="View"  data-toggle="modal" href="#view<?php echo $id ;?>"> Option <i class="fa fa-book"></i></a>
            <div class="modal fade" id="view<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <span class="modal-title" style="font-size:14px; text-align:left">
							Poll Question - <?php echo $question; ?></span>
                        </div>
                        <div class="modal-body" align="left">
                            <?php 
							$d=0;
							$set=mysql_query("select * from `poll_option` where `poll_id`='$id'");
							while($fet=mysql_fetch_array($set))
							{	$d++;
								$poll_option=$fet['poll_option'];
								?>
								<span><?php echo $d.'.  '.$poll_option; ?></span></br>
							<?php } if(!empty($img_name)){ ?>
								<img src="poll/<?php echo $img_name; ?>" height="40px" width="40px">
							<?php } ?>
							
                        </div>
						<div class="modal-footer">
							 <button type="button" name="sub_delete" value="" class="btn btn-sm red-sunglo" data-dismiss="modal" aria-hidden="true">Close</button> 
                        </div>
                    </div>
                </div>
            </div>
            
			
 
					<div class="table-responsive">
					 <!--a style="padding: 3px 15px; background-color:rgba(218, 73, 73, 0.74); color:#FFF" href="work_report_excel.php" target="blank"><strong>Excel</strong></a--><br>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>
										 Sr.no
									</th>
									<th>
										 User
									</th>
									<th>
										Feedback
									</th>
									<th>
										Suggestion
									</th>
									<th>
										 Date
									</th>
								</tr>
								</thead>
								<tbody>
									
									<?php 
									
									$query=mysql_query("select * from `poll_feedback` where `poll_id`='$poll_id'");
									$count=mysql_num_rows($query);
									while($fetch=mysql_fetch_array($query))
									{
										$feedback=$fetch['feedback'];
										$user_id=$fetch['user_id'];
										$roll_id=$fetch['role_id'];
										$suggestion=$fetch['suggestion'];
										$created_on=date('d-M-Y', strtotime($fetch['created_on']));
										  if($roll_id==5){
											  $st=mysql_query("select `name` from `login` where `id`='$user_id'");
											  $ft=mysql_fetch_array($st);
											  
											  $user_name=$ft['name'];
										  }else if($roll_id!=5){
											  $st1=mysql_query("select `name` from `faculty_login` where `id`='$user_id'");
											  $ft1=mysql_fetch_array($st1);
											  
											  $user_name=$ft1['name'];
										  }
										if($count>0){
											$f++;
										?>
									<tr>
										<td><?php echo $f; ?></td>
								        <td><?php echo $user_name; ?></td>
										<td><?php echo $feedback; ?></td>
										<td><?php echo $suggestion; ?></td>
										<td><?php echo $created_on; ?></td>
									</tr>
										<?php } } 
										 if(empty($count)){ ?>
										<tr><td align="center" colspan="6">No Record Found</td></tr>
										<?php } ?>
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
	.