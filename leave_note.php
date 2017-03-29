<?php
 include("index_layout.php");
 include("database.php");
 $status_ftc=$_GET['s'];
 $faculty_login_id=$_SESSION['id'];
	$role=$_SESSION['category'];
	$message ='';
	if(isset($_POST['update_details'])) 
	{
		$reason=$_POST['reason'];
		$date_from=date('Y-m-d', strtotime($_POST['date_from']));;
		$date_to=date('Y-m-d', strtotime($_POST['date_to']));
		$update_id=$_POST['update_id'];
 		mysql_query("update `leave_note` set `date_from`='$date_from' , `date_to`='$date_to' , `reason`='$reason' where `id` = '$update_id' ");
		$message='Leave update successfully';	
	}
	if(isset($_POST['approve_details'])) 
	{
		$update_id=$_POST['update_id'];
 		mysql_query("update `leave_note` set `status`='1' where `id` = '$update_id' ");
		$message='Leave approve successfully';	
	}
	if(isset($_POST['reject_details'])) 
	{
		$update_id=$_POST['update_id'];
 		mysql_query("update `leave_note` set `status`='2' where `id` = '$update_id' ");
		$message='Leave reject successfully';	
	}
 ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Leave Note
							</div>
							 
						</div>
						<div class="portlet-body form">
								<div class="form-body">
                              <div style="margin:10px">
                               
                             	<a href="leave_note.php?s=0" class="<?php if($status_ftc==0){ echo 'btn btn-sm red'; } else { echo 'btn btn-sm blue'; }  ?>">In-Process <i class="glyphicon glyphicon-refresh"></i></a>
                                <a href="leave_note.php?s=1" class="<?php if($status_ftc==1){echo 'btn btn-sm red'; } else { echo 'btn btn-sm blue'; }  ?>">Approved <i class="glyphicon glyphicon-ok"></i></a>
                                <a href="leave_note.php?s=2" class="<?php if($status_ftc==2){echo 'btn btn-sm red'; } else { echo 'btn btn-sm blue'; }  ?>">Rejected <i class="glyphicon glyphicon-remove"></i></a>
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
									<th>Student Name</th>
                                    <th>Enrollment No</th>
									<th>Leave From</th>
                                    <th>Leave To</th>
									<th>Reason</th>
									<th>Status</th>
                                    <th>Action</th>
								</tr>
								</thead>
                                    <tbody>
									 <?php
										  $i=0;
										  if($role==3){
											  $r1=mysql_query("select * from `leave_note` where `status`='$status_ftc' && `faculty_id`='$faculty_login_id' order by timestamp Desc ");	 
										  }else
										  {
										   	 $r1=mysql_query("select * from `leave_note` where `status`='$status_ftc' order by timestamp Desc ");	
										  }
                                            while($row1=mysql_fetch_array($r1))
                                            {
												$i++;
												$id=$row1['id'];
												$date_to=$row1['date_to'];
												$dateTO=date('d-m-Y',strtotime($date_to));
												$date_from=$row1['date_from'];        
												$reason=$row1['reason'];
												$dateFROM=date('d-m-Y',strtotime($date_from));
												$status_dup=$row1['status'];
												$student_id=$row1['student_id'];
												$role=mysql_query("select `name`,`father_name`,`mother_name`,`eno` from `login`  where `id`= '$student_id' ");
												$fetrole=mysql_fetch_array($role);
												$name=$fetrole['name'];
												$eno=$fetrole['eno'];
												//$father_name=$fetrole['father_name'];
												//$mother_name=$fetrole['mother_name'];	
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
                                            <td><?php echo $name;?></td>
                                            <td><?php echo $eno;?></td>
                                            <td><?php echo $dateFROM;?></td>
                                            <td><?php echo $dateTO?></td>
                                            <td><?php echo $reason;?></td>
                                            <td><?php echo $recod;?></td>
                                            <td>
                                            
                                            <div class="btn-group">
														<button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown"> Action <i class="fa fa-angle-down"></i></button>
														<ul class="dropdown-menu" role="menu">
                                                       
															<li>
											<a class="edit_contact" data-toggle="modal" id="<?php echo $id; ?>" href="#basic"><i class="glyphicon glyphicon-edit"></i>Edit </a>
															</li>
                                                           
                                                            <li class="divider">
															<li>
																<a data-toggle="modal" href="#approve<?php echo $id; ?>"><i class="glyphicon glyphicon-ok"></i> Approve </a>
            												</li>
                                                            <li class="divider">
															<li>
																<a data-toggle="modal" href="#reject<?php echo $id; ?>"><i class="glyphicon glyphicon-remove"></i> Reject </a>
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
                            <button type="submit" name="approve_details" class="btn red">Delete</button>
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
                            <button type="submit" name="reject_details" class="btn red">Delete</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
                                             </td>
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