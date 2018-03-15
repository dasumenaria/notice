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
	
	$qry.="`curent_date` BETWEEN '".$from."' and '".$to."' && ";	
}

if(!empty($view_u))
{  
	if($view_u == 1) 
	{
		$qry.="";
	}
	else
	{
		$qry.=" (`role_id`='".$view_u."' || `role_id`='1' ) && ";
	}
}
 
$qry.=" `flag`= 0  order by id Desc ";

  ?>
	<div> <table class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>#</th>
									<th>Event Title</th>
									<th>Date from</th>
									<th>Date To</th>
									<th>Location</th>
									<th>Image</th>
									<th>Action</th>
								</tr>
								</thead>
							  <?php
			 
			  $r1=mysql_query("select * from event where ".$qry."");		
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
					$n_name='event/event';
					$exact_folderName=$n_name.$id.'/';
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
									<img src="<?php echo $exact_folderName.$image;?>" height="30px" width="30px"/>
									</td>
									<td>
									 <a class="btn blue btn-sm" data-toggle="modal" rel="tooltip" title="View Details" href="#view<?php echo $id ;?>"  >
										<i class="fa fa-search"></i></a>
										
						<div class="modal fade" id="view<?php echo $id ;?>"  tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"><b>Details</b></h4>
										</div>
										<div class="modal-body">
											<table class="table table-condensed table-bordered" width="100%">
												<tr>
												<th>#</th>
												<th>Event Name</th>
												<th>Date</th>
												<th>Time</th>
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
										<div class="modal-footer">
											 
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
				
										
										
		 						
										
										
                                        &nbsp;		
                                        <a class="btn yellow btn-sm" rel="tooltip" title="Edit Details" target="_blank" href="event_edit.php?id=<?php echo $id;?>">
										<i class="fa fa-edit"></i></a>
                                        &nbsp;				
                                       
<a class="btn red btn-sm" rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
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
									