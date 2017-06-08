<?php 
session_start();
include("database.php");
$view_u=$_GET['view_u'];
  ?>
	<div> <table class="table table-bordered table-hover" id="sample_1">
								<thead>
								<tr style="background-color:#FFFFFF; color:#1A0DB3;background:#f9f9f9;">
									<td>
										 #
									</td>
									<td>
										<label class="contrl-label">Event Title</label>
									</td>
									<td>
										<label class="contrl-label">Date from</label>
									</td>
										<td>
										<label class="contrl-label">Date To</label>
									</td>
									<td>
                                        <label class="contrl-label">Location</label>
									</td>
									<td>
                                        <label class="contrl-label">Action</label>
									</td>
								</tr>
								</thead>
							  <?php
			  $r1=mysql_query("select * from event where flag='0' and role_id='".$view_u."' order by id Desc ");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$id=$row1['id'];
					$title=$row1['title'];
                    $description=$row1['description'];
					$date_from=$row1['date_from'];
					$from=date('d-m-Y', strtotime($date_from));
					$date_to=$row1['date_to'];
					$to=date('d-m-Y', strtotime($date_to));
					$location=$row1['location'];
                    $image=$row1['image'];
					$role_id=$row1['role_id'];
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
									<?php echo $title;?>
									</td>
									<td>
									<?php echo $from;?>
									</td>
                                    <td>
									<?php echo $to;?>
									</td>
									 <td>
									<?php echo $location;?>
									</td>
									<td>
									 <a class="btn btn-circle btn-xs" style="color:#03F; background-color:#EEEEEE" data-toggle="modal" href="#view<?php echo $id ;?>" style="color: white">
										<i class="fa fa-search"></i></a>
										
										  <div class="modal fade" id="view<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-footer">
                     <table class="table-condensed table-bordered" width="100%">
					 <tr style="background-color:#FFFFFF; color:#1A0DB3">
									<td>
										 #
									</td>
									<td>
										<label class="contrl-label">Event Name</label>
									</td>
									<td>
										<label class="contrl-label">Date</label>
									</td>
										<td>
										<label class="contrl-label">Time</label>
									</td>
									</tr>
					  <?php
			  $event_details=mysql_query("select * from event_details where event_id='".$id."' order by id Desc");		
					$l=0;
					while($event_details1=mysql_fetch_array($event_details))
					{
					$l++;
					$e_id=$event_details1['id'];
					$name=$event_details1['name'];
                    $time=$event_details1['time'];
					$date=$event_details1['date'];
					$x_date=date('d-m-Y', strtotime($date));
					
					?>
					
								<tbody>
								<tr>
									<td>
							<?php echo $l;?>
									</td>
									<td>
									<?php echo $name;?>
									</td>
									<td>
									<?php echo $x_date;?>
									</td>
                                    <td>
									<?php echo $time;?>
									</td>
									</tr>
									</tbody>
					 
					<?php }?>
					 </table>
					 
                        </div>
                    </div>
                <!-- /.modal-content -->
                </div>
        <!-- /.modal-dialog -->
            </div>
										
										
										
                                        &nbsp;		
                                        <a class="btn btn-circle btn-xs" style="color:#03F; background-color:#EEEEEE" href="event_edit.php?id=<?php echo $id;?>" style="color: white">
										<i class="fa fa-edit"></i></a>
                                        &nbsp;				
                                       
									      <a class="btn btn-circle btn-xs" style="color:#ED1C24; background-color:#EEEEEE"
  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
            <div class="modal fade" id="delete<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete this event?</span>
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
									