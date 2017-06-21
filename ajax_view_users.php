<?php 
session_start();
include("database.php");
  $view_u=$_GET['view_u'];
  ?>
	<div>	<table class="table table-bordered table-hover">
 
								<thead>
								<tr>
									<th>
										 #
									</th>
									<th>
										User Name
									</th>
									<th>
										Mobile No
									</th>
										<th>
										Role
									</th>
									<th>
                                        Action
									</th>
								</tr>
								</thead>
							 <?php
			  $r1=mysql_query("select * from faculty_login where role_id='".$view_u."'");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$id=$row1['id'];
					$user_name=$row1['user_name'];
                    $role_id=$row1['role_id'];
					$mobile_no=$row1['mobile_no'];
					                              
                       $r2=mysql_query("select * from master_role where id='".$role_id."'");		
                            $fet=mysql_fetch_array($r2);
                            $role_name=$fet['role_name'];
							
				?>
								<tbody>
								<tr>
									<td>
							<?php echo $i;?>
									</td>
									<td>
									<?php echo $user_name;?>
									</td>
									<td>
									<?php echo $mobile_no;?>
									</td>
                                    <td>
									<?php echo $role_name;?>
									</td>
									<td>
                                        <a class="btn btn-circle btn-xs" style="color:#FFF; background-color:#FFB848" href="users_edit.php?id=<?php echo $id;?>">
										<i class="fa fa-edit"></i></a>
                                        &nbsp;				
                                       
<a class="btn btn-circle btn-xs" style="color:#FFF; background-color:#F03"
  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
            <div class="modal fade" id="delete<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete this user?</span>
                        </div>
                        <div class="modal-footer">
                        <form method="post" name="delete<?php echo $id ;?>">
                            <input type="hidden" name="delet_model" value="<?php echo $id; ?>" />
									
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
								</tbody>
                    <?php } ?>
								</table>
							</div>
									