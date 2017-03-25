<?php
session_start();
include("database.php");
$syllabus_delete=$_GET['delete_name'];
$view_u=$_GET['view_u'];
if(!empty($syllabus_delete))
{
		$sd=mysql_query("update `syllabus` SET `flag`='1' where id='$syllabus_delete'" );
		$sql=mysql_query($sd);
}
		?>
		<div><table class="table-condensed table-bordered" width="100%">
								<thead>
								<tr style="background-color:#FFFFFF; color:#1A0DB3">
									<td>
										 #
									</td>
									<td>
										Class
									</td>
									<td>
										 Subject
									</td>
									
                                    <td>
                                        Update Date
									</td>
									<td>
                                        Action
									</td>
								</tr>
								</thead>
							  <?php
			  $r1=mysql_query("select * from syllabus where flag='0' AND class_id='".$view_u."' order by id Desc");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$id=$row1['id'];
					$class_id=$row1['class_id'];
                    $subject_id=$row1['subject_id'];
					$date=$row1['date'];
                    $section_id=$row1['section_id'];
					if($date=='0000-00-00')
					{	$date1='';}
					else
					{ $date1=date("d-m-Y", strtotime($date)); }
				
				
					$class=mysql_query("select * from master_class where id='".$class_id."'");		
					$classid=mysql_fetch_array($class);
					$class_name=$classid['class_name'];
					
					$subject=mysql_query("select * from master_subject where id='".$subject_id."'");		
					$subjectid=mysql_fetch_array($subject);
					$subject_name=$subjectid['subject_name'];
					
					

					
					?>
					
								<tbody>
								<tr>
									<td>
							<?php echo $i;?>
									</td>
									<td class="search">
									<?php echo $class_name;?>
									</td>
                                    <td>
									<?php echo $subject_name;?>
									</td>
									
									<td>	
										 <?php echo $date1;?>
									</td>
									<td>
                                       <a class="btn btn-circle btn-xs" style="color:#03F; background-color:#EEEEEE" href="edit_syllabus.php?id=<?php echo $id;?>" style="color: white">
										<i class="fa fa-edit"></i></a>
                                        &nbsp;				
                                        &nbsp;
                                       
									     <a class="btn btn-circle btn-xs" style="color:#ED1C24; background-color:#EEEEEE"
  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
            <div class="modal fade" id="delete<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete this syllabus?</span>
                        </div>
                        <div class="modal-footer">
                        <form method="post" name="delete<?php echo $id ;?>">
                            <input type="hidden" name="delete_name" id="delete_name" value="<?php echo $id; ?>" />
                            <button type="button" name="sub_del" value="" id="delete_id" class="btn btn-sm red-sunglo ">Yes</button> 
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
	

