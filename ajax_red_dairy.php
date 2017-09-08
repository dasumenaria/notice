<?php
 include("index_layout.php");
 include("database.php");
	 $user=$_SESSION['category'];
	 $stdn_name=$_GET['stdn_name'];
	 $stdn_cls=$_GET['stdn_cls'];
	 $stdn_sec=$_GET['stdn_sec'];
	 
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////

  $qury='';
  
	if(!empty($stdn_cls) && empty($stdn_sec) && empty($stdn_name))
	{
		$qury="`class_id` = '$stdn_cls'";
	}
	if(empty($stdn_cls) && !empty($stdn_sec) && empty($stdn_name))
	{
		$qury="`section_id` = '$stdn_sec'";
	}
	if(empty($stdn_cls) && empty($stdn_sec) && !empty($stdn_name))
	{
		$qury="`student_id` = '$stdn_name'";
	}
	if(!empty($stdn_cls) && !empty($stdn_sec) && empty($stdn_name))
	{
		$qury="`class_id` = '$stdn_cls' && `section_id` = '$stdn_sec'";
	}
	if(empty($stdn_cls) && !empty($stdn_sec) && !empty($stdn_name))
	{
		$qury="`section_id` = '$stdn_sec' && `student_id` = '$stdn_name'";
	}
	if(!empty($stdn_cls) && empty($stdn_sec) && !empty($stdn_name))
	{
		$qury="`class_id` = '$stdn_cls' && `student_id` = '$stdn_name'";
	}
	if(!empty($stdn_cls) && !empty($stdn_sec) && !empty($stdn_name))
	{
		$qury="`class_id` = '$stdn_cls' && `section_id` = '$stdn_sec' && `student_id` = '$stdn_name'";
	}
 
  ?> 
  
<table class="table table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
	<thead>
		<tr role="row" style="background:#f9f9f9;">
		<th>Student Name</th>
		<th>Gread</th>
		<th>Remark</th>
        <th>Date</th>
        <th>Teacher Name</th>
        <th>Action</th>
        </tr>
	</thead>

	<?php
		 
	$r1=mysql_query("select * from remarks where ".$qury." && flag='0' order by id Desc");
	while($row1=mysql_fetch_array($r1))
	{
		$id=$row1['id'];
		$student_id=$row1['student_id'];
			$sid=mysql_query("select * from login where id='".$student_id."'");
			$sid=mysql_fetch_array($sid);
			$name=$sid['name'];
		$gread=$row1['gread'];
		$remark=$row1['remark'];
		$date=date('d-m-Y', strtotime($row1['timestamp']));  
		$login_id=$row1['login_id'];
			$Fid=mysql_query("select `user_name` from faculty_login where id='".$login_id."'");
			$FTCC=mysql_fetch_array($Fid);
			$user_name=$FTCC['user_name'];
		 
 	?>
<tbody>
	<tr>
		 
		<td class="search">
			<?php echo $name;?>
		</td>
		<td>
			<?php echo $gread;?>
		</td>
		<td>
			<?php echo $remark;?>
		</td>
        <td>
			<?php echo $date;?>
		</td>
        <td><?php echo $user_name;?></td>
        <td>
 			<a class="btn btn-circle btn-xs" style="color:#FFF; background-color:#F03"  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
			<div class="modal fade" id="delete<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete this record ?</span>
						</div>
						<div class="modal-footer">
							<form method="post" name="delete<?php echo $id ;?>">
								<input type="hidden" name="delet_student" value="<?php echo $id; ?>" />
								<button type="submit" name="sub_del" value="" class="btn btn-sm red-sunglo ">Yes</button> 
							</form>
						</div>
					</div>
					 
				</div>
		 
			</div>
		</td>
	</tr>
</tbody>
		<?php  }?>
</table>
							


