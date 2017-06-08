<?php 
session_start();
include("database.php");
$view_u=$_GET['view_u'];
$date=$_GET['date'];
$ex_date=date('Y-m-d', strtotime($date));
?>
	<div>	<table class="table-condensed table-bordered" width="100%">
								<thead>
								<tr style="background-color:#FFFFFF; color:#1A0DB3">
									<td>
										 #
									</td>
									<td>
                                        <label class="contrl-label">Student Name</label>
									</td>
									<td>
                                        <label class="contrl-label">Class</label>
									</td>
									<td>
                                        <label class="contrl-label">Section</label>
									</td>
									<td>
										<label class="contrl-label">Date</label>
									</td>
									<td>
										<label class="contrl-label">Teacher</label>
									</td>
								</tr>
								</thead>
							  <?php
			  $r1=mysql_query("select * from attendance where attendance_date='".$ex_date."'");		
					$i=0;
					while($row1=mysql_fetch_assoc($r1))
					{
					 @$student_id=$row1['student_id'];
					 @$user_id=$row1['user_id'];
					 
					  $un=mysql_query("select * from faculty_login where id='".$user_id."'");		
					  $un1=mysql_fetch_assoc($un);
					  @$user_name=$un1['user_name'];
					 
					 $r2=mysql_query("select * from login where id='".$student_id."'");		
					 while($row2=mysql_fetch_assoc($r2))
					{
					 	@$registration_id=$row2['registration_id'];
                    	$r3=mysql_query("select * from student where id='".$registration_id."' AND class_id='".$view_u."'");		
					 while($row3=mysql_fetch_assoc($r3))
					{
						$i++;
					 @$name=$row3['name'];
					 @$class_id=$row3['class_id'];
					  @$section_id=$row3['section_id'];
					  
					  $cn=mysql_query("select * from master_class where id='".$class_id."'");		
					  $cn1=mysql_fetch_assoc($cn);
					  @$class_name=$cn1['class_name'];
					    
					  $sn=mysql_query("select * from master_section where id='".$section_id."'");		
					  $sn1=mysql_fetch_assoc($sn);
					  @$section_name=$sn1['section_name'];
					  
					?>
					<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $name;?></td>
					<td><?php echo $class_name;?></td>
					<td><?php echo $section_name;?></td>
					<td><?php echo $date;?></td>
					<td><?php echo $user_name;?></td>
					</tr>
					<?php }}}?>