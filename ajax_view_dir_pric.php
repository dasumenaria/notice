<?php 
session_start();
include("database.php");
$to=$_GET['to'];
$from=$_GET['from'];
$view_u=$_GET['view_u'];
$qry='';
if(!empty($from) && !empty($to))
{
	$from=date('Y-m-d',strtotime($from));
	$to=date('Y-m-d',strtotime($to));
	
	$qry.="`current_date` BETWEEN '".$from."' and '".$to."' && ";	
}

if(!empty($view_u))
{  
	if($view_u == 1) 
	{
		$qry.="";
	}
	else
	{
		$qry.=" (`sms_receive_role`='".$view_u."' || `sms_receive_role`='1' ) && ";
	}
}
 
$qry.=" `flag`= 0  order by id Desc ";

  ?>
	<div> 
		<table class="table table-bordered table-hover" width="100%" style="font-family:Open Sans;" >
												<thead>
													<tr style="background:#F5F5F5">
														<th> #</th>
														<th>Sender</th>
														<th>Receiver</th>
														<th>Message</th>
														<th>Image</th>
														<th>Action</th>
													</tr>
												</thead>
											
											<tbody>
											<?php
											 
											$sets=mysql_query("select * from `director_principle_message` where ".$qry."");		
												
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
											$pic=$fets['pic'];
											?>
											
														<tr>
															<td width="5%">
															<?php echo $m;?>
															</td>
															<td width="10%">
															<?php echo $role_name;?>
															</td>
															<td width="10%" >
															<?php echo $role_name1;?>
															</td>
															<td  >
															<?php echo $message1;?>
															</td>
															<td width="10%" >
															<?php if(!empty($pic)){?>
																<img src= "message/<?php echo $pic;?>" style="width:50px;height:50px;">
											<?php } ?>
															</td>
															<td width="15%">
																<a class="btn blue-madison blue-stripe btn-sm" rel="tooltip" title="Edit" data-toggle="modal" href="#edit<?php echo $id;?>"><i class="fa fa-edit"></i></a>
																&nbsp;
																<!--------editon-->
																 <div class="modal fade" id="edit<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
										<div class="modal-dialog modal-md">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												   <div class="portlet-body form">
													<form class="form-horizontal" role="form" id="form_sample_2" method="post" enctype="multipart/form-data">
													
													
														<input type="hidden" name='edit_id' class="form-control" value="<?php echo $id;?>" >	
													
														<div class="form-body">
												 
												<div class="form-group">
													<label class="control-label col-md-3">Message From <span class="required" aria-required="true"> * </span></label>
													<div class="col-md-6">
														<select name="sms_sender_role" class="form-control select2me " required placeholder="Select..." id="role_id">
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
													<label class="control-label col-md-3">Message To <span class="required" aria-required="true"> * </span></label>
													<div class="col-md-6">
														 <select name="sms_receive_role" class="form-control select2me " required placeholder="Select..." id="sid">
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
													<label class="control-label col-md-3">Message<span class="required" aria-required="true"> * </span></label>
													<div class="col-md-6">
														<div class="input-icon right">
														<i class="fa"></i>
														<textarea class="form-control" placeholder="Please Enter Message From" required name="message" autocomplete="off"  ><?php echo $message1;?></textarea >
														</div>
											 		</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label">Images</label>
													<input type="file" class="form-control input-medium" name="fileToUpload" />
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
									