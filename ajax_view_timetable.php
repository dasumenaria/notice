<?php
include("database.php");
$function_for=$_GET['function_for'];

 @$class_id=$_GET['class_id'];
 @$section_ids=$_GET['section_id'];

if(!empty($class_id) && empty($section_ids))
{
?>
    <select class="form-control select2me section" required name="section_id">
        <option value=""> Select...</option>
            <?php 
                $query2=mysql_query("select * from `class_section` where `class_id`='$class_id'"); 
                while($fetch2=mysql_fetch_array($query2))
				{
                    $section_id=$fetch2['section_id'];
					$qt=mysql_query("select * from `master_section` where `id`='$section_id'");
					$ft=mysql_fetch_array($qt);
					$section_id=$ft['id'];
					$section_name=$ft['section_name'];	
                ?>
                <option value="<?php echo $section_id; ?>"><?php echo $section_name; ?></option>
            <?php } ?>
    </select>
               
<?php
}
if($function_for=='exam')
{
		if( !empty($class_id) && (!empty($section_ids) ))
	{ 
	?>
		<table class="table-condensed table-bordered" width="100%">
		<thead>
			<tr style="background-color:#FFFFFF; color:#1A0DB3">
				<td>
					#
				</td>
				<td>
					Subject
				</td>
                <td>Exam Date</td>
				<td>
					Time From
				</td>
				<td>
					Time To 
				</td>
                <td>Room No.</td>
				<td>
					Action
				</td>
			</tr>
		</thead>
		<?php
		$r1=mysql_query("select * from exam_time_table where class_id='".$class_id."' && section_id='".$section_ids."' ");		
		$i=0;
		while($row1=mysql_fetch_array($r1))
		{
			$i++;
			$id=$row1['id'];
			$class_id=$row1['class_id'];
			$date=$row1['exam_date'];
			$section_id=$row1['section_id'];
			if($date=='0000-00-00')
			{	$date1='';}
			else
			{ $date1=date("d-m-Y", strtotime($date)); }
			$time_from=$row1['time_from'];
			$room_no=$row1['room_no'];
			$time_to=$row1['time_to'];
			$subject_id=$row1['subject_id'];
			$class=mysql_query("select * from master_subject where id='".$subject_id."'");		
			$classid=mysql_fetch_array($class);
			$subject_name=$classid['subject_name'];
			
			$subject=mysql_query("select * from master_section where id='".$section_id."'");		
			$subjectid=mysql_fetch_array($subject);
			$section_name=$subjectid['section_name'];
			?>
			<tbody>
				<tr>
					<td>
						<?php echo $i;?>
					</td>
                    
					<td class="search">
						<?php echo $subject_name;?>
					</td>
                    <td><?php echo $date1;?></td>
					<td>
						<?php echo $time_from;?>
					</td>
					<td>	
						<?php echo $time_to;?>
					</td>
                    <td><?php echo $room_no;?></td>
					<td>
						
						<a class="btn btn-circle btn-danger" rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
						<div class="modal fade" id="delete<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
									<span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete this timetable?</span>
									</div>
									<div class="modal-footer">
										<form method="post" name="delete<?php echo $id ;?>">
											<input type="hidden" name="delete_name" id="delete_name" value="<?php echo $id; ?>" />
											<button type="submit" name="sub_del" value="" id="delete_id" class="btn btn-sm red-sunglo ">Yes</button> 
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
			<?php 
			} ?>
		</table>
	<?php
	}

}
if($function_for=='timetable')
{
	if( !empty($class_id) && (!empty($section_ids) ))
	{ 
	?>
		<table class="table-condensed table-bordered" width="100%">
		<thead>
			<tr style="background-color:#FFFFFF; color:#1A0DB3">
				<td>
					#
				</td>
				<td>
					Subject
				</td>
				<td>
					Time From
				</td>
				<td>
					Time To 
				</td>
				<td>
					Action
				</td>
			</tr>
		</thead>
		<?php
		$r1=mysql_query("select * from time_table where class_id='".$class_id."' && section_id='".$section_ids."' ");		
		$i=0;
		while($row1=mysql_fetch_array($r1))
		{
			$i++;
			$id=$row1['id'];
			$class_id=$row1['class_id'];
			$date=$row1['date'];
			$section_id=$row1['section_id'];
			if($date=='0000-00-00')
			{	$date1='';}
			else
			{ $date1=date("d-m-Y", strtotime($date)); }
			$time_from=$row1['time_from'];
			$time_to=$row1['time_to'];
			$subject_id=$row1['subject_id'];
			$class=mysql_query("select * from master_subject where id='".$subject_id."'");		
			$classid=mysql_fetch_array($class);
			$subject_name=$classid['subject_name'];
			
			$subject=mysql_query("select * from master_section where id='".$section_id."'");		
			$subjectid=mysql_fetch_array($subject);
			$section_name=$subjectid['section_name'];
			?>
			<tbody>
				<tr>
					<td>
						<?php echo $i;?>
					</td>
					<td class="search">
						<?php echo $subject_name;?>
					</td>
					<td>
						<?php echo $time_from;?>
					</td>
					<td>	
						<?php echo $time_to;?>
					</td>
					<td>
						
						<a class="btn btn-circle btn-danger" rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
						<div class="modal fade" id="delete<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
									<span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete this timetable?</span>
									</div>
									<div class="modal-footer">
										<form method="post" name="delete<?php echo $id ;?>">
											<input type="hidden" name="delete_name" id="delete_name" value="<?php echo $id; ?>" />
											<button type="submit" name="sub_del" value="" id="delete_id" class="btn btn-sm red-sunglo ">Yes</button> 
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
			<?php 
			} ?>
		</table>
	<?php
	}
}