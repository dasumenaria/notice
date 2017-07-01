<?php
 include("index_layout.php");
 include("database.php");
$session_id=$_SESSION['id'];
$student_id=$_GET['stdnt_id'];

  ?> 
   
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Details</title>
    
<link href="assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>  
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper" >
		 <div class="page-content"  >
			<div class="row " style="background:#F1F3FA;">
			<div class="page-bar">
			 </div>
				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<div class="profile-sidebar">
						<!-- PORTLET MAIN -->
						<div class="portlet light profile-sidebar-portlet">
							<!-- SIDEBAR USERPIC -->
								<?php 
                                $query=mysql_query("select * from `login` where `id`='$student_id'");
                                $fetch=mysql_fetch_array($query);
                                $id=$fetch['id'];
                                $name=$fetch['name'];
                                $image=$fetch['image'];
                                $class_id=$fetch['class_id'];
                                $section_id=$fetch['section_id'];
                                $mobile_no=$fetch['mobile_no'];
                                $dob=$fetch['dob'];
                                $dob_chng=date('d-m-Y',strtotime($dob));
                                
                                $father_name=$fetch['father_name'];
                                $mother_name=$fetch['mother_name'];
                                $cls=mysql_query("select * from `master_class` where `id`='$class_id'");
                                $fet_cls=mysql_fetch_array($cls);
                                $class_name=$fet_cls['class_name'];
                                $sec=mysql_query("select * from `master_section` where `id`='$section_id'");
                                $fet_sec=mysql_fetch_array($sec);
                                $section_name=$fet_sec['section_name'];




?>							
							<div class="profile-userpic">
	 
								<img src="user/<?php echo $image;?>" class="img-responsive" style="width:200px;height:200px;">
							</div>
							<!-- END SIDEBAR USERPIC -->
							<!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">

								<div class="profile-usertitle-name">
									 <?php echo $name;?>
								</div>
								<!--<div class="profile-usertitle-job">
								
									  
								</div>-->
							</div>
							<!-- END SIDEBAR USER TITLE -->
							<!-- SIDEBAR BUTTONS -->
							<div class="profile-userbuttons">
								<button type="button" class="btn btn-circle green-haze btn-sm"><?php echo $class_name;?></button>
								<button type="button" class="btn btn-circle btn-danger btn-sm"><?php echo $section_name;?></button>
							</div>
							<!-- END SIDEBAR BUTTONS -->
							<!-- SIDEBAR MENU -->
							<div class="profile-usermenu">
								<ul class="nav">
									<li class="active">
										<a href="#">
										<label Style="color:#5a7391;font-weight:bold;">Father Name:</label> <?php echo $father_name;?></a>
									</li>
									<li>
										<a href="#">
										<label Style="color:#5a7391;font-weight:bold;">Mother Name:</label> <?php echo $mother_name;?> </a>
									</li>
									<li>
										<a href="#" target="_blank">
										<label Style="color:#5a7391;font-weight:bold;">Mobile No :</label> 
										<i class="icon-call-out"></i>
										<?php echo $mobile_no;?> </a>
									</li>
									<li>
										<a href="extra_profile_help.html">
										<label Style="color:#5a7391;font-weight:bold;">Date Of Birth :</label> 
										<i class="icon-present"></i> 
										 <?php echo $dob_chng;?> </a>
									</li>
								</ul>
							</div>
							<!-- END MENU -->
						</div>
						<!-- END PORTLET MAIN -->
						<!-- PORTLET MAIN -->
						<div class="portlet light">
							<!-- STAT -->
							<div class="row list-separated profile-stat">
								 <div class="portlet-title">
										<div class="caption">
											<center>
											<span class="caption-subject font-blue-madison bold uppercase" style="padding-left:10px">Achivement</span>
											</center>
 										</div>
	 
									</div>
							</div>
							<!-- END STAT -->
							 <div class="scroller" style="height: 200px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
													<ul class="feeds">
															<?php 
															$achiv=mysql_query("select * from `achivements` where student_id='$student_id'"); 
															 
															while($fetch2=mysql_fetch_array($achiv))
																{
																	 
																	$student_id=$fetch2['student_id'];
																	$sn=mysql_query("select `name` from `login` where id='".$student_id."'"); 
																	$fet_sn=mysql_fetch_array($sn);
																	 $achivement=$fetch2['achivement'];
																	$rank=$fetch2['rank'];
															?>
															<li> 
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-sm label-success">
																			<i class="fa fa-trophy"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			<?php echo $rank;?> Position in <?php echo $achivement;?>
																		</div>
																	</div>
																</div>
															</div>
														 </li>
														 
																<?php } ?>
													 </ul>
												</div>
						</div>
						<!-- END PORTLET MAIN -->
					</div>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<div class="col-md-6">
								<!-- BEGIN PORTLET -->
								<div class="portlet light ">
									<div class="portlet-title">
										<div style="font-weight:300; font-size:18px">
											<center>
												<span class="caption-subject font-blue-madison bold uppercase" >Attendance Status </span>
											</center> 
 										</div>
	 
									</div>
									<div class="portlet-body">
										<div class="row number-stats margin-bottom-30">
											<div class="col-md-6 col-sm-6 col-xs-6">
												<div class="stat-left">
													<div class="stat-chart">
													
														<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
														<div id="sparkline_bar"></div>
													</div>
													<div class="stat-number">
														<div class="title">
															Present
														</div>
														<div class="number">
																<?php
																	$attnd="SELECT `id` from `attendance` where `student_id`='".$student_id."' && attendance_mark='1'";
																	$total_present=mysql_query($attnd);
																	$present=mysql_num_rows($total_present);
																?>	
															<button type="button" class="btn btn-circle btn-sm" style="background:#12B770;color:white;"><?php echo $present;?>	</button>		
															 
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-6">
												<div class="stat-right">
													<div class="stat-chart">
														<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
														<div id="sparkline_bar2"></div>
													</div>
													<div class="stat-number">
														<div class="title">
																Absent
														</div>
														<div class="number">
															<?php
																	$attnd_absent="SELECT `id` from `attendance` where `student_id`='".$student_id."' && attendance_mark='2'";
																	$total_absent=mysql_query($attnd_absent);
																	$absent=mysql_num_rows($total_absent);
																?>		
																<button type="button" class="btn btn-circle btn-sm" style="background:#F0424B;;color:white;"><?php echo $absent;?></button>
															 
														</div>
													</div>
												</div>
											</div>

										</div>
										<div class="table-scrollable table-scrollable-borderless" style="height:230px;overflow-y:scroll;">
											<table class="table table-hover table-light" >
											<thead>
											<tr class="uppercase">
												<th colspan="2">
													Month
												</th>
												<th>
													Present
												</th>
												<th>
													 Absent
												</th>
												<th>
													Leave
												</th> 
											</tr>
											</thead>
											<?php
											$current_year=date('Y');
												for ($i = 1; $i <= 12; $i++)
												{
												 $first_date= $current_year."-".$i."-01";
												 $last_date= date("Y-m-t", strtotime($first_date));
												 
												$mnth_wise_attnd=mysql_query("select `attendance_mark` from `attendance` where attendance_date BETWEEN '$first_date' AND '$last_date' && `attendance_mark`='1'" );
												 $tot_prsnt=mysql_num_rows($mnth_wise_attnd);
												 
												 $mnth_wise_absnt=mysql_query("select `attendance_mark` from `attendance` where attendance_date BETWEEN '$first_date' AND '$last_date' && `attendance_mark`='2'" );
												 $tot_absnt=mysql_num_rows($mnth_wise_absnt);
												 
												 $mnth_wise_lev=mysql_query("select `attendance_mark` from `attendance` where attendance_date BETWEEN '$first_date' AND '$last_date' && `attendance_mark`='3'" );
												 $tot_lev=mysql_num_rows($mnth_wise_lev);
												 
												
												
												 ?>
													<tr> 
														<td>
															<a href="#" class="primary-link"><?php echo date('M',strtotime($first_date));?></a>
														</td>
														<td>&nbsp;
															 
														</td>
														<td>
															 <span style="color:#12B770;"><?php if($tot_prsnt==0) { echo "0"; }else{echo $tot_prsnt; }?></span>
														</td>
														<td>
															  <span style="color:#F0424B;;"><?php if($tot_absnt==0) { echo "0"; }else{echo $tot_absnt; }?></span>
														</td>
														<td>
															 <span style="color:#F5911A;"><?php if($tot_lev==0) { echo "0"; }else{echo $tot_lev; }?></span>
														</td>
													</tr>
												 <?php
												 
												} 	
											?>
											
											 </table>
										</div>
									</div>
								</div>
								<!-- END PORTLET -->
							</div>
							<div class="col-md-6">
								<!-- BEGIN PORTLET -->
								<div class="portlet light ">
									<div class="portlet-title">
										<div class="caption">
											<center>
											<span class="caption-subject font-blue-madison bold uppercase" style="padding-left:60px">Class Test Report </span>
											 
											</center>
 										</div>
	 
									</div>
									<div class="portlet-body">
										<div class="row number-stats margin-bottom-30">
											<div class="col-md-6 col-sm-6 col-xs-6">
												<div class="stat-left">
													<div class="stat-chart">
														<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
														<div id="sparkline_bar"></div>
													</div>
													<div class="stat-number">
														<div class="title">
															Number of Test
														</div>
														<div class="number">
																<?php
																	$n_exam="SELECT `id` from `master_exam`";
																	$total_exam=mysql_query($n_exam);
																	$tot_exam=mysql_num_rows($total_exam);
																?>		
															 <?php echo $tot_exam;?>
														</div>
													</div>
												</div>
											</div>
											 
										</div>
										<div class="table-scrollable table-scrollable-borderless" style="height:230px;overflow-y:scroll;">
											<table class="table table-hover table-light" >
											<thead>
											<tr class="uppercase">
												<th colspan="2">
													Exam Terms
												</th>
												<th>
													Subject
												</th>
												<th>
														Maximum Marks
												</th>
												<th>
													Obtained Marks
												</th> 
											</tr>
											</thead>
											<?php 
											$exm_trm=mysql_query("SELECT   `student_marks`.`subject_id`
																, `student_marks`.`max_marks`
																, `student_marks`.`obtained_marks`
																, `master_exam`.`id`
																, `master_exam`.`exam_type`
																FROM
																`new_notice`.`student_marks`
																INNER JOIN `new_notice`.`master_exam` 
																ON (`student_marks`.`exam_type_id` = `master_exam`.`id`) WHERE student_id='".$student_id."'");
											while($fetch_exm_trm=mysql_fetch_array($exm_trm))
											{
												$ex_subject_id=$fetch_exm_trm['subject_id'];
															$sub=mysql_query("select `subject_name` from master_subject where id='".$ex_subject_id."'" );
															$fetch_sub=mysql_fetch_array($sub);
															$subject_name=$fetch_sub['subject_name'];
												
												$max_marks=$fetch_exm_trm['max_marks'];
												$obtained_marks=$fetch_exm_trm['obtained_marks'];
												$exam_type=$fetch_exm_trm['exam_type'];

											?>
											<tr> 
												<td>
													<a href="#" class="primary-link"><?php echo $exam_type; ?></a>
												</td>
												<td>&nbsp;
													 
												</td>
												<td>
													 <?php echo $subject_name; ?>
												</td>
												<td align="center">
													 <?php echo $max_marks; ?>
												</td>
												<td align="center">
													 <?php echo $obtained_marks; ?>
												</td>
											</tr>
											<?php }?>
											   </table>
										</div>
									</div>
								</div>
								<!-- END PORTLET -->
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<!-- BEGIN PORTLET -->
								<div class="portlet light">
									<div class="portlet-title">
										<div class="caption caption-md" style="padding-left:90px">
											<i class="icon-bar-chart theme-font hide"></i>
											<center><span class="caption-subject font-blue-madison bold uppercase">Fees Status</span></center>
											
										</div>
										 
									</div>
									<div class="portlet-body">
										<div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
											 <table class="table table-hover table-light" >
											<thead>
											<tr class="uppercase">
												<th colspan="2">
													Month
												</th>
												 
												<th>
													Fee 
												</th> 
											</tr>
											</thead>
											<?php
											$current_year=date('Y');
												for ($i = 1; $i <= 12; $i++)
												{
												 $first_date= $current_year."-".$i."-01";
												 $last_date= date("Y-m-t", strtotime($first_date));
												 ?>
													<tr> 
														<td>
															<a href="#" class="primary-link"><?php echo date('F ',strtotime($first_date));?></a>
														</td>
														<td>&nbsp;
															 
														</td>
														<td>
															 Paid
														</td>
														 
													</tr>
												 <?php
												 
												} 	
											?>
											
											 </table>
										</div>
									</div>
								</div>
								<!-- END PORTLET -->
							</div>
							<div class="col-md-6">
								<!-- BEGIN PORTLET -->
								<div class="portlet light tasks-widget">
									<div class="portlet-title">
										<div class="caption caption-md" style="padding-left:130px">
											<i class="icon-bar-chart theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Remarks</span>
											 
										</div>
										 
									</div>
									<div class="portlet-body">
										<div class="task-content">
											<div class="scroller" style="height: 282px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
												<!-- START TASK LIST -->
												<ul class="task-list">
												<?php 
															 		$rm_ftc=mysql_query
																	("SELECT
																		`remarks`.`gread`
																		, `remarks`.`remark`
																		, `login`.`name`
																	FROM
																		`new_notice`.`remarks`
																		INNER JOIN `new_notice`.`login` 
																			ON (`remarks`.`student_id` = `login`.`id`)WHERE student_id='$student_id';"); 
																	 while($fet_rm=mysql_fetch_array($rm_ftc))
																	 {
																	 $remark=$fet_rm['remark'];
																	$gread=$fet_rm['gread'];
															?>
																	<li>
																	
																		 <div class="task-title">
																			<span class="task-title-sp">
																			<i class=""></i><?php echo $remark;?>
																			</span>
																			<span class="label label-sm label-success"><?php echo $gread;?></span>
																			 
																		</div>
																	 </li>
																<?php }?>
												 </ul>
												<!-- END START TASK LIST -->
											</div>
										</div>
										<div class="task-footer">
											<div class="btn-arrow-link pull-right">
												<a href="#">See All Tasks</a>
											</div>
										</div>
									</div>
								</div>
								<!-- END PORTLET -->
							</div>
						</div>
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
			</div>
			
			 
			</div>
	</div>
</body>
<?php footer(); ?>

<?php scripts();?>

</html>
 

