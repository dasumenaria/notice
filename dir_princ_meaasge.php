<?php
 include("index_layout.php");
 include("database.php");
 $role_id = $_SESSION['category']; 
 $login_id=$_SESSION['id']; 
 $update_id=0;

 
  $message='';
	if(isset($_POST['submit'])) 
	{
		$message=$_POST['message'];
		$sms_to_role=$_POST['sms_to_role'];
		$sms_from_role=$_POST['sms_from_role'];
	
  		mysql_query("insert into `director_principle_message` set `message`='$message1' , `sms_receive_role`='$sms_to_role' , `sms_sender_role`='$sms_from_role' , `login_id`='$login_id'");
		$update_id=mysql_insert_id();
  		$message='SMS send successfully';
		
	}
?> 
<?php 
 
 if(isset($_POST['sub_del']))
{
   $delet_Message=$_POST['delet_Message'];
  mysql_query("update `director_principle_message` SET `flag`='1' where id='$delet_Message'" );
   @header('Location:dir_princ_meaasge.php'); 
  }
if(isset($_POST['sub_edit']))
{
$edit=$_REQUEST['edit_id'];  
$sms_sender_role=mysql_real_escape_string($_REQUEST["sms_sender_role"]);
$sms_receive_role=mysql_real_escape_string($_REQUEST["sms_receive_role"]);
$message1=mysql_real_escape_string($_REQUEST["message"]);

$r=mysql_query("update `director_principle_message` SET `sms_sender_role`='$sms_sender_role',`sms_receive_role`='$sms_receive_role',`message`='$message1' where id='$edit'" );
$r=mysql_query($r);
echo '<script text="javascript">alert(Message Update Successfully")</script>';	
 
}




  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Director Principle Message</title>
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
								<i class="fa fa-gift"></i> Director Principle Message
							</div>
							 
						</div>
						<div class="portlet-body form">
							<div class="form-body">
								<div class="scroller"   data-always-visible="1" data-rail-visible="0">
								   
                               <form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
                               		
                                    <div class="form-group">
										<label class="col-md-3 control-label">Message From</label>
										<div class="col-md-6">
                                            <select name="sms_from_role" class="form-control select2me " placeholder="Select..." id="role_id">
                                                <option value=""></option>
                                                    <?php
                                                    $r1=mysql_query("select * from master_role where id=2 OR id=3");		
                                                    $i=0;
                                                    while($row1=mysql_fetch_array($r1))
                                                    {
                                                        $role_id=$row1['id'];
                                                        $role_name=$row1['role_name'];
                                                        ?>
                                                        <option value="<?php echo $role_id;?>"><?php echo $role_name;?></option>                              
                                                    <?php 
                                                    }?> 
                                            </select>
										</div>
                                    </div>
                               		<div class="form-group">
										<label class="col-md-3 control-label">Message To</label>
										<div class="col-md-6">
                                            <select name="sms_to_role" class="form-control select2me " placeholder="Select..." id="sid">
                                                <option value=""></option>
                                                    <?php
                                                    $r1=mysql_query("select * from master_role where id=1 OR id=4 OR id=5");		
                                                    $i=0;
                                                    while($row1=mysql_fetch_array($r1))
                                                    {
                                                        $id=$row1['id'];
                                                        $role_name=$row1['role_name'];
                                                        ?>
                                                        <option value="<?php echo $id;?>"><?php echo $role_name;?></option>                              
                                                    <?php 
                                                    }?> 
                                            </select>
										</div>
                                    </div>
                                    <div class="form-group">
										<label class="col-md-3 control-label">Message</label>
										<div class="col-md-6">
											<textarea class="form-control input-md" required type="text" name="message1"></textarea>
										</div>
									</div>
									<div class=" right1" align="center">
                                        <button type="submit" class="btn green formsubmit" name="submit" >Submit</button>
                                    </div>
                               </form> 
							   
								</div>
							</div>
						</div>
											<div class="col-md-12"><br><br></div>
											<div class="col-md-12">
									<div class="portlet box">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>View Message
										</div>
									</div>
									<div class="portlet-body form">
										<div class="table-scrollable" >
											<table class="table   table-hover" width="100%" style="font-family:Open Sans;">
												<thead>
													<tr style="background:#F5F5F5">
														<th> #</th>
														<th>Message From</th>
														<th>Message To</th>
														<th>Message</th>
														<th>Action</th>
													</tr>
												</thead>
											
											<tbody>
											<?php
											
											$sets=mysql_query("select * from `director_principle_message` where `flag`=0");		
												
												while($fets=mysql_fetch_array($sets))
											{
											$m++;
											$id=$fets['id'];
											$del_id=$fets['id'];
											$sms_sender_role=$fets['sms_sender_role'];
													$qry_vender_name=mysql_query("select `role_name` from `master_role` where id='$sms_sender_role'");
													$fetch_name=mysql_fetch_array($qry_vender_name);
													$role_name=$fetch_name['role_name'];
											$sms_receive_role=$fets['sms_receive_role'];
														$qry_vender_name=mysql_query("select `role_name` from `master_role` where id='$sms_receive_role'");
														$fetch_name=mysql_fetch_array($qry_vender_name);
														$role_name1=$fetch_name['role_name'];
											$message1=$fets['message'];
											?>
											
														<tr>
															<td>
															<?php echo $m;?>
															</td>
															<td class="search">
															<?php echo $role_name;?>
															</td>
															<td class="search">
															<?php echo $role_name1;?>
															</td>
															<td class="search">
															<?php echo $message1;?>
															</td>
															<td>
																<a class="btn blue-madison blue-stripe btn-sm" rel="tooltip" title="Edit" data-toggle="modal" href="#edit<?php echo $id;?>"><i class="fa fa-edit"></i></a>
																&nbsp;
																<!--------editon-->
																 <div class="modal fade" id="edit<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
										<div class="modal-dialog modal-md">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												   <div class="portlet-body form">
													<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
													
													
														<input type="hidden" name='edit_id' class="form-control" value="<?php echo $id;?>" >	
													
														<div class="form-body">
												 
												<div class="form-group">
													<label class="control-label col-md-3">Message From</label>
													<div class="col-md-6">
														<select name="sms_sender_role" class="form-control select2me " placeholder="Select..." id="role_id">
                                                <option value=""></option>
                                                    <?php
                                                    $r1=mysql_query("select * from master_role where id=2 OR id=3");		
                                                    $i=0;
                                                    while($row1=mysql_fetch_array($r1))
                                                    {
                                                        $role_id=$row1['id'];
                                                        $role_name=$row1['role_name'];
                                                        ?>
                                                        <option <?php if($role_id ==$sms_sender_role){echo "selected";}?> value="<?php echo $role_id;?>"><?php echo $role_name;?></option>                              
                                                    <?php 
                                                    }?> 
                                            </select>
														
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Message To</label>
													<div class="col-md-6">
														 <select name="sms_receive_role" class="form-control select2me " placeholder="Select..." id="sid">
                                                <option value=""></option>
                                                    <?php
                                                    $r1=mysql_query("select * from master_role where id=1 OR id=4 OR id=5");		
                                                    $i=0;
                                                    while($row1=mysql_fetch_array($r1))
                                                    {
                                                        $id=$row1['id'];
                                                        $role_name=$row1['role_name'];
                                                        ?>
                                                        <option <?php if($id ==$sms_receive_role){echo "selected";}?> value="<?php echo $id;?>"><?php echo $role_name;?></option>                              
                                                    <?php 
                                                    }?> 
                                            </select>
														
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Message</label>
													<div class="col-md-6">
														<div class="input-icon right">
														<i class="fa"></i>
														<input class="form-control" placeholder="Please Enter Message From" required name="message" autocomplete="off" type="text" value="<?php echo $message1;?>">
														</div>
														
													</div>
												</div>
												 <div class=" right1" align="right" style="margin-right:10px">
															<button type="submit" class="btn green" name="sub_edit">Update</button>
														</div>
													</form>
											</div>
											</div>
												</div>
										   
											</div>
										<!-- /.modal-content -->
										</div>
								<!-- /.modal-dialog -->
									</div>
                                        
                                        
                                        
                                        
                                        <!---- update----->
                                       
									      <a class="btn blue-madison red-stripe btn-sm"  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $del_id ;?>"><i class="fa fa-trash"></i></a>
            <div class="modal fade" id="delete<?php echo $del_id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete this  class?</span>
                        </div>
                        <div class="modal-footer">
                        <form method="post" name="delete<?php echo $del_id ;?>">
                            <input type="hidden" name="delet_Message" value="<?php echo $del_id; ?>" />
                            
                            <button type="submit" name="sub_del" value="" class="btn btn-sm red-sunglo ">Yes</button> 
                        </form>
                        </div>
                    </div>
                <!-- /.modal-content -->
                </div>
        <!-- /.modal-dialog -->
            </div>
									   
									   
									   
									</td>
								</tr>
								
                    <?php } ?>
					</tbody>
								</table>
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
<?php if($update_id>0){?>
		var update_id = <?php echo $update_id; ?>;
		$.ajax({
			url: "notification_page.php?function_name=principle_director_message&id="+update_id,
			type: "POST",
			success: function(data)
			{   
 			}
		});
	 
<?php }?>



	var myVar=setInterval(function(){myTimerr()},4000);
	function myTimerr() 
	{
		$("#success").hide();
	}
 	
	
 </script>
</html>