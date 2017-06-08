<?php
include("database.php");
 $from1=$_GET['from'];
  $to1=$_GET['to'];
  $cl_id=$_GET['spnsr'];
 
 

 
 
?>

							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th>
									S./No. 
								</th>
								<th>
									 Student Name
								</th>
								<th>
									Status
								</th>
								<th>
									Attendance Date
								</th>
  							</tr>
							</thead>
							
							<tbody>
					<?php
					 echo"loop";
		if((!empty($from1)) && (!empty($to1)) && (empty($cl_id)))
		{
									
									   $from1=date('Y-m_d',strtotime($from1));
									    $to1=date('Y-m_d',strtotime($to1));
									 
									  
									  $sts=mysql_query("select * from `attendance` WHERE `attendance_date` BETWEEN '$from1' AND '$to1'");
									while($fts=mysql_fetch_array($sts))
								 
								{
									@$k++;
								  $id=$fts['id'];
								  $student_id=$fts['student_id'];
								$query1=mysql_query("select `name` from  `login` where id='".$student_id."' ");
								$fetch1=mysql_fetch_array($query1);
								  $name=$fetch1['name']; 
								$attendance_mark=$fts['attendance_mark'];
								if($attendance_mark==1){
									
									$attendance_mark_msg="P";
								}
								if($attendance_mark==2){
									
									$attendance_mark_msg="A";
								}
								if($attendance_mark==3){
									
									$attendance_mark_msg="L";
								}

								$attendance_date=$fts['attendance_date'];	
								$a_d=date('d-m-Y',strtotime($attendance_date));
								 ?>
							<tr>
								<td>
									<?php echo $k; ?>		
								</td>
								<td>
									<?php echo $name; ?>
								</td>
	 
								<td>
									 <?php echo $attendance_mark_msg; ?>
								</td>
								<td  ><?php echo $a_d; ?>
								</td>
  							</tr>
				<?php

								
									
								}	
			}
			else if((!empty($from1)) && (!empty($to1)) && (!empty($cl_id)))
			{
										$from1=date('Y-m_d',strtotime($from1));
									    $to1=date('Y-m_d',strtotime($to1));
				$e=mysql_query("select * from  login where class_id='".$cl_id."'");
				while($f=mysql_fetch_array($e)){ 
				$nid=$f['id'];
				$name=$f['name']; 
				//echo "select * from `attendance` WHERE `attendance_date` BETWEEN '$from1' AND '$to1' && `student_id`='$nid'";
				$sts1=mysql_query("select * from `attendance` WHERE `attendance_date` BETWEEN '$from1' AND '$to1' && `student_id`='$nid'");
				$count=mysql_num_rows($sts1);
				if($count>0){
				while($fts1=mysql_fetch_array($sts1))
						{
 
						$id=$fts1['id'];
						$student_id=$fts1['student_id'];
						$query1=mysql_query("select * from  `login` where id='".$student_id."' ");
						$fetch1=mysql_fetch_array($query1);
						$name=$fetch1['name'];
						$attendance_mark_msg='';
						$attendance_mark=$fts1['attendance_mark'];
						if($attendance_mark==1){
							
							$attendance_mark_msg="P";
						}
						if($attendance_mark==2){
							
							$attendance_mark_msg="A";
						}
						if($attendance_mark==3){
							
							$attendance_mark_msg="L";
						}

						$attendance_date=$fts1['attendance_date'];	
						$a_d=date('d-m-Y',strtotime($attendance_date));
						
						 
				 ?>
							<tr>
								<td>
							 
								</td>
								<td>
									<?php echo $name; ?>
								</td>
	 
								<td>
									 <?php echo $attendance_mark_msg; ?>
								</td>
								<td  ><?php echo $a_d; ?>
								</td>
  							</tr>
							
							
							
							
							
							
				<?php
				
						}
				}
				
				}
					 }
		 ?>
					 		</tbody>
							</table>
							