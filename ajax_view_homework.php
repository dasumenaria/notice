<?php 
	include("database.php");
	  $class_id=$_GET['pon'];
	  $sect_id=$_GET['pon1'];
	  $stdnt_id=$_GET['pon2'];
$qury='';
if(!empty($class_id) && empty($sect_id) && empty($stdnt_id))
{
	$qury="`class_id` = '$class_id'";
}
 	if(empty($class_id) && !empty($sect_id) && empty($stdnt_id))
{
	$qury="`section_id` = '$sect_id'";
}
 	if(empty($class_id) && empty($sect_id) && !empty($stdnt_id))
{
	$qury="`student_id` LIKE '%$stdnt_id%'";
}
	if(!empty($class_id) && !empty($sect_id) && empty($stdnt_id))
{
	$qury="`class_id` = '$class_id' && `section_id` = '$sect_id'";
}
	if(empty($class_id) && !empty($sect_id) && !empty($stdnt_id))
{
	$qury="`section_id` = '$sect_id' && `student_id` LIKE '%$stdnt_id%'";
}
if(!empty($class_id) && empty($sect_id) && !empty($stdnt_id))
{
	$qury="`class_id` = '$class_id' && `student_id` LIKE '%$stdnt_id%'";
}
if(!empty($class_id) && !empty($sect_id) && !empty($stdnt_id))
{
	$qury="`class_id` = '$class_id' && `section_id` = '$sect_id' && `student_id` LIKE '%$stdnt_id%'";
}
$qury.=" && `flag`=0 ORDER by `submission_date` DESC";
?>
<form method="post">
 	 <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
		<thead>
			<tr>
				<th>Teacher Name</th>
				<th>Topic</th>
				<th>Description</th>
				<th>Class</th>
				<th>Section</th>
				<th>Subject</th>
				<th>Submission Date</th>
				<th>Edit</th>
                <th>Delete</th>
			</tr>
		</thead>

		  
		<tbody>
 
		<?php
							  
	$query=mysql_query("select * from `assignment` where ".$qury."");

	while($fetch=mysql_fetch_array($query))
		{
			$id=$fetch['id'];
			$student_id=$fetch['student_id'];
			$std_explode=explode(',',$student_id);
			$name=array();
			foreach($std_explode as $std_data)
			{
				$student_name=mysql_query("select `name` from `login` where `id`='$std_data'");
				$fetch_name=mysql_fetch_array($student_name);
				$name[]=$fetch_name['name'].'<br />';
			}
 			$topic=$fetch['topic'];
			$description=$fetch['description'];

			$class_id=$fetch['class_id'];
			$cls_name=mysql_query("select `class_name` from `master_class` where `id`='$class_id'");
			$fetch_class=mysql_fetch_array($cls_name);
			$class_name=$fetch_class['class_name'];

			$subject_id=$fetch['subject_id'];
			$sub_name=mysql_query("select `subject_name` from `master_subject` where `id`='$subject_id'");
			$fetch_subject=mysql_fetch_array($sub_name);
			$subject_name=$fetch_subject['subject_name'];

			$section_id=$fetch['section_id'];
			$qt=mysql_query("select * from `master_section` where `id`='$section_id'");
			$ft=mysql_fetch_array($qt);
			$section_id=$ft['id'];
			$section_name=$ft['section_name'];	

			$submission_date=$fetch['submission_date'];
			$actual_date=date('d-m-Y',strtotime($submission_date));
			$user_id=$fetch['user_id'];
			$dasasdsad=mysql_query("select * from `faculty_login` where `id`='$user_id'");
			$ftd=mysql_fetch_array($dasasdsad);
			$section_id=$ftd['id'];
			$user_name=$ftd['user_name'];

		?>
			 <tr>
				 <td><?php echo $user_name;  ?></td> 
				 <td><?php echo $topic; ?></td>
				 <td><?php echo $description; ?></td>
				 <td><?php echo $class_name; ?></td>
				 <td><?php echo $section_name; ?></td>
				 <td><?php echo $subject_name; ?></td>
				 <td><?php echo $actual_date; ?></td>
                 <th><a class="btn btn-circle btn-xs" style="color:#03F;" target="_blank" data-toggle="modal" href="edit_assignment.php?id=<?php echo $id ;?>"><i class="fa fa-edit"></i> Edit</a> 
                <!--<a class="btn btn-circle btn-xs" style="color:#03F;"
  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i> Delete</a>
            <div class="modal fade" id="delete<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete this user?</span>
                        </div>
                        <div class="modal-footer">
                        <form method="post">
                            <input type="hidden" name="deleted_id" value="<?php echo $id; ?>" />
									
                            <button type="submit" name="sub_delete" value="" class="btn btn-sm red-sunglo ">Yes</button> 
                        </form>
                        </div>
                    </div>
                 </div>
             </div>
				--->	
             	</th>
                <td>
                <div class="checkbox-list"><label>
											<input type="checkbox" name="miltiple_delete[]" value="<?php echo $id; ?>"> </label>
				</div>
                 </td>    
 			</tr>
		<?php } ?>	
		</tbody>
  	
	</table>
    <div style="width:100%" align="center"> <input type="submit" class="btn btn-primary" name="delateall" value="Delete" /></div>
 </form>