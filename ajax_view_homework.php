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
	$qury="`student_id` = '$stdnt_id'";
}
	if(!empty($class_id) && !empty($sect_id) && empty($stdnt_id))
{
	$qury="`class_id` = '$class_id' && `section_id` = '$sect_id'";
}
	if(empty($class_id) && !empty($sect_id) && !empty($stdnt_id))
{
	$qury="`section_id` = '$sect_id' && `student_id` = '$stdnt_id'";
}
if(!empty($class_id) && empty($sect_id) && !empty($stdnt_id))
{
	$qury="`class_id` = '$class_id' && `student_id` = '$stdnt_id'";
}
if(!empty($class_id) && !empty($sect_id) && !empty($stdnt_id))
{
	$qury="`class_id` = '$class_id' && `section_id` = '$sect_id' && `student_id` = '$stdnt_id'";
}

//echo $qury;
?>
	<div class="portlet-body">						 
	 <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
		<thead>
			<tr>
				<?php if(!empty($stdnt_id)){?><th>Name</th><?php }?>
				<th>Topic</th>
				<th>Description</th>
				<th>Class</th>
				<th>Section</th>
				<th>Subject</th>
				<th>Submission Date</th>
				
			</tr>
		</thead>

		  
		<tbody>
 
		<?php
							  
			$query=mysql_query("select * from `assignment` where ".$qury."");
			while($fetch=mysql_fetch_array($query))
			  
		{

			$student_id=$fetch['student_id'];
			$student_name=mysql_query("select `name` from `login` where `id`='$student_id'");
			$fetch_name=mysql_fetch_array($student_name);
			$name=$fetch_name['name'];

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

		?>
			 <tr>
					<?php if(!empty($stdnt_id)){?> <td><?php echo $name; ?></td><?php }?>
				 <td><?php echo $topic; ?></td>
				 <td><?php echo $description; ?></td>
				 <td><?php echo $class_name; ?></td>
				 <td><?php echo $section_name; ?></td>
				 <td><?php echo $subject_id; ?></td>
				 <td><?php echo $actual_date; ?></td>
			</tr>
		<?php } ?>	
		</tbody>
  	
	</table>
	</div>