<?php
 include("index_layout.php");
 include("database.php");
 $status_ftc=$_GET['s'];
 $faculty_login_id=$_SESSION['id'];
	$role=$_SESSION['category'];
	$message ='';
	 
	if(isset($_POST['approve_details'])) 
	{
		$update_id=$_POST['update_id'];
 		mysql_query("update `inquiry_form` set `status`='1' where `id` = '$update_id' ");
		$message='Complaint approve successfully';	
	}
	if(isset($_POST['reject_details'])) 
	{
		$update_id=$_POST['update_id'];
 		mysql_query("update `inquiry_form` set `status`='2' where `id` = '$update_id' ");
		$message='Complaint reject successfully';	
	}
 ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint</title>
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
						<div class="portlet-title ">
							<div class="caption">
								<i class="fa fa-gift"></i> View Complaint
							</div>
							 
						</div>
						<div class="portlet-body form">
								<div class="form-body">
                              <div style="margin:10px">
                               
                             	<a href="view_inquiry.php?s=0" class="<?php if($status_ftc==0){ echo 'btn btn-sm red'; } else { echo 'btn btn-sm blue'; }  ?>">In-Process <i class="glyphicon glyphicon-refresh"></i></a>
                                <a href="view_inquiry.php?s=1" class="<?php if($status_ftc==1){echo 'btn btn-sm red'; } else { echo 'btn btn-sm blue'; }  ?>">Approved <i class="glyphicon glyphicon-ok"></i></a>
                                <a href="view_inquiry.php?s=2" class="<?php if($status_ftc==2){echo 'btn btn-sm red'; } else { echo 'btn btn-sm blue'; }  ?>">Rejected <i class="glyphicon glyphicon-remove"></i></a>
                              </div>
							<div class="scroller" style="height:500px;"  data-always-visible="1" data-rail-visible="0">
                               <?php if($message){ ?>
                               <div id="success">
                                    <div class="alert alert-success">
                                        <strong><?php echo $message; ?></strong> 
                                    </div>
                               </div>
                                <?php } ?> 
                                 
								<table class="table table-bordered table-hover" style="width:100%;">
								<thead>
								<tr style="background-color:#FFFFFF;">
									<th>
										 #
									</th>
									<th>
										Submitted By
									</th><th>
										Name
									</th>
									<th>
										 Email
									</th>
									
                                    <th>
                                        Study
									</th>
									  <th>
                                        Mobile No
									</th>
									<th>
                                        Date
									</th>
									<th>
                                        Query
									</th>
									<th>
                                        Action
									</th>
								</tr>
								</thead>
                                    <tbody>
									 <?php
										  $i=0;
										   
										   	$r1=mysql_query("select * from `inquiry_form` where `status`='$status_ftc' order by curent_date Desc");	
										   
                                            while($row1=mysql_fetch_array($r1))
                                            {
												$i++;
												$id=$row1['id'];
												$name=$row1['name'];
												$email=$row1['email'];
												$study=$row1['study'];
												$address=$row1['address'];
												$mobile_no=$row1['mobile_no'];
												$query=$row1['query'];
												$curent_date=$row1['curent_date'];
												$user_id=$row1['user_id'];
												$ftc_data=mysql_query("select `name` from `login` where `id`='$user_id'");
												$data=mysql_fetch_array($ftc_data);
												$submittedBy=$data['name'];
												
												$news_date1=str_replace('-', '', $curent_date);
												$exact_trim=$news_date1;
												$datetime = DateTime::createFromFormat('Ymd', $exact_trim);
												$ems=$datetime->format('M');
												
											 
												$qry_date=date("d-m-Y", strtotime($curent_date)); 	
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
                                           <td>
												<?php echo $i;?>
											</td>
											<td>
												<?php echo $submittedBy;?>
											</td>
											<td>
											<?php echo $name;?>
											</td>
											<td>
											<?php echo $email;?>
											</td>
											 <td>
											<?php echo $study;?>
											</td>
											 <td>
											<?php echo $mobile_no;?>
											</td>
											 <td>
											<?php echo $qry_date;?>
											</td>
											 <td>
											<?php echo $query;?>
											</td>
                                            <td>
                                            
                                            <div class="btn-group">
														<button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown"> Action <i class="fa fa-angle-down"></i></button>
														<ul class="dropdown-menu" role="menu">
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