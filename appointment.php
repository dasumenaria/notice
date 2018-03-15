<?php
 include("index_layout.php");
 include("database.php");
 $faculty_login_id=$_SESSION['id'];
 $status_ftc=$_GET['s'];
 $message='';
	if(isset($_POST['update_details'])) 
	{
		$update_id=$_POST['update_id'];
		$appoint_to=$_POST['appoint_to'];
		$appoint_time=$_POST['appoint_time'];
		$reason=$_POST['reason'];
		$appoint_date=date('Y-m-d', strtotime($_POST['appoint_date']));;
 		mysql_query("update `appointment` set `appoint_to`='$appoint_to' , `appoint_date`='$appoint_date' , `appoint_time`='$appoint_time' , `reason`='$reason' where `id` = '$update_id' ");
		$message='Appointment update successfully';	
	}
	if(isset($_POST['approve_details'])) 
	{
		$update_id=$_POST['update_id'];
 		mysql_query("update `appointment` set `status`='1' where `id` = '$update_id' ");
		//--
		$sub_sqls = mysql_query("SELECT `student_id` FROM `appointment` where id='".$update_id."'");
		$sub_sqlsa= mysql_fetch_array($sub_sqls);
		$student_id = $sub_sqlsa['student_id'];
		$message='Appointment approve successfully';	
	}
	if(isset($_POST['reject_details'])) 
	{
		$update_id=$_POST['update_id'];
 		mysql_query("update `appointment` set `status`='2' where `id` = '$update_id' ");
		//--
		$sub_sqls = mysql_query("SELECT `student_id` FROM `appointment` where id='".$update_id."'");
		$sub_sqlsa= mysql_fetch_array($sub_sqls);
		$student_id = $sub_sqlsa['student_id'];
		$message='Appointment reject successfully';	
	}
	if(isset($_POST['complete_details'])) 
	{
		$update_id=$_POST['update_id'];
 		mysql_query("update `appointment` set `status`='3' where `id` = '$update_id' ");
		//--
		$sub_sqls = mysql_query("SELECT `student_id` FROM `appointment` where id='".$update_id."'");
		$sub_sqlsa= mysql_fetch_array($sub_sqls);
		$student_id = $sub_sqlsa['student_id'];
		$message='Appointment complete successfully';	
	}
	
?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Appointments Details</title>
</head>
<style>
span {
	    padding: 3px !important;
}
</style>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Appointments Details
							</div>
							 
						</div>
						<div class="portlet-body form">
								<div class="form-body">
                              <div style="margin:10px">
                               
                             	<a href="appointment.php?s=0" class="<?php if($status_ftc==0){ echo 'btn btn-sm red'; } else { echo 'btn btn-sm blue'; }  ?>">In-Process <i class="glyphicon glyphicon-refresh"></i></a>
                                <a href="appointment.php?s=1" class="<?php if($status_ftc==1){echo 'btn btn-sm red'; } else { echo 'btn btn-sm blue'; }  ?>">Approved <i class="glyphicon glyphicon-ok"></i></a>
                                <a href="appointment.php?s=2" class="<?php if($status_ftc==2){echo 'btn btn-sm red'; } else { echo 'btn btn-sm blue'; }  ?>">Rejected <i class="glyphicon glyphicon-remove"></i></a>
                                <a href="appointment.php?s=3" class="<?php if($status_ftc==3){echo 'btn btn-sm red'; } else { echo 'btn btn-sm blue'; }  ?>">Completed <i class="glyphicon glyphicon-check"></i></a>
                              </div>
                             
								 <div class="scroller" style="height:500px;"  data-always-visible="1" data-rail-visible="0">
                               <?php if($message){ ?>
                               <div id="success">
                                    <div class="alert alert-success">
                                        <strong><?php echo $message; ?></strong> 
                                    </div>
                               </div>
                                <?php } ?> 
                                 
								<table class="table-condensed table-bordered" style="width:100%;">
								<thead>
								<tr style="background-color:#FFFFFF; color:rgba(94, 94, 94, 0.82);">
									<th>S. No.</th>
									<th>Name</th>
									<th>Appointmenat To</th>
									<th>Mobile No</th>
									<th>Date</th>
									<th>Time</th>
									<th>Reason</th>
                                    <th>Status</th>
                                    <?php if($status_ftc!=3){ ?> <th>Action</th><?php } ?>
								</tr>
								</thead>
                                    <tbody>
									 <?php
										  $i=0;
										   $r1=mysql_query("select * from `appointment` where `status`='$status_ftc' order by appoint_date Desc ");		
                                            while($row1=mysql_fetch_array($r1))
                                            {
												$i++;
												$id=$row1['id'];
												$appoint_to=$row1['appoint_to'];
												$appoint_date=$row1['appoint_date'];        
												$appoint_time=$row1['appoint_time'];
												$reason=$row1['reason'];
												$mobile_no=$row1['mobile_no'];
												$date=date('d-m-Y',strtotime($appoint_date));
												$status_dup=$row1['status'];
												$name=$row1['name'];
										if($status_dup==0){
                                            $recod='<span class="label label-sm label-warning">In-Process</span>';
                                        }
                                        if($status_dup==1){
                                            $recod='<span class="label label-sm label-success">Approved</span>';
                                         }
                                        else if($status_dup==2){
                                            $recod='<span class="label label-sm btn red btn-sm">Rejected</span>';
                                         }
                                        else if($status_dup==3){
                                            $recod='<span class="label label-danger label-sm btn blue btn-sm">Completed</span>';
                                         }
												
                                        ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $appoint_to;?></td>
                                            <td><?php echo $mobile_no;?></td>
                                            <td><?php echo $date;?></td>
                                            <td><?php echo $appoint_time;?></td>	
                                            <td><?php echo $reason;?></td>
                                            <td><?php echo $recod;?></td>
                                            <?php if($status_ftc!=3){ ?>
                                            <td>
                                            <div class="btn-group">
														<button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Action <i class="fa fa-angle-down"></i></button>
														<ul class="dropdown-menu" role="menu">
                                                       
															<li>
											<a class="edit_contact" data-toggle="modal" id="<?php echo $id; ?>" href="#basic"><i class="glyphicon glyphicon-edit"></i>Edit </a>
															</li>
                                                           
                                                            <li class="divider">
															<li>
																<a data-toggle="modal" href="#approve<?php echo $id; ?>"><i class="glyphicon glyphicon-ok"></i>Approve </a>
            												</li>
                                                            <li class="divider">
															<li>
																<a data-toggle="modal" href="#reject<?php echo $id; ?>"><i class="glyphicon glyphicon-remove"></i>Reject </a>
															</li>
															<li class="divider">
															</li>
															<li>
                                                                <a data-toggle="modal" href="#complete<?php echo $id; ?>"><i class="glyphicon glyphicon-check"></i>Complete </a>
															</li>
														</ul>
													</div>
        <div class="modal fade" id="approve<?php echo $id; ?>" tabindex="-1" role="basic" aria-hidden="true" >
                <div class="modal-dialog">
                    <form method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><strong>Do you want to approve</strong></h4>
                        </div>
                        <input type="hidden" name="update_id" value="<?php echo $id; ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                            <button type="submit" name="approve_details" class="btn red">Approved</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            
            <div class="modal fade" id="reject<?php echo $id; ?>" tabindex="-1" role="basic" aria-hidden="true" >
                <div class="modal-dialog">
                    <form method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><strong>Do you want to reject</strong></h4>
                        </div>
                        <input type="hidden" name="update_id" value="<?php echo $id; ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                            <button type="submit" name="reject_details" class="btn red">Reject</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
                                            
            <div class="modal fade" id="complete<?php echo $id; ?>" tabindex="-1" role="basic" aria-hidden="true" >
                <div class="modal-dialog">
                    <form method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><strong>Do you want move to completed </strong></h4>
                        </div>
                        <input type="hidden" name="update_id" value="<?php echo $id; ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                            <button type="submit" name="complete_details" class="btn red">Completed</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>                                
                                            
                                             
                                            </td>
                                           <?php } ?>
                                        </tr>
                         <?php } ?>
                                    </tbody>
                                </table>
                                
                                <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true" >
                                    <div class="modal-dialog">
                                        <form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title"><strong>Edit appointment Details</strong></h4>
                                            </div>
                                            <div class="modal-body replace_data" style="min-height: 180px;">
                                            
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                                <button type="submit" name="update_details" class="btn blue">Update</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
								</div>

                                
								</div>
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
			url: "ajax_page.php?function_name=edit_appointment&id="+id,
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