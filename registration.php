<?php
date_default_timezone_set('asia/kolkata');  
include("index_layout.php");
include("database.php");
require_once('ImageManipulator.php'); 
$user=$_SESSION['category'];
$user_id=$_SESSION['id'];
$message=false;
$message2=false;
$mmessage="";	
if(isset($_POST['submit']))
{
	$role_id=5;
	$name=mysql_real_escape_string($_REQUEST["name"]);
	$eno=mysql_real_escape_string($_REQUEST["eno"]);
	$mobile_no=mysql_real_escape_string($_REQUEST["mobile_no"]);
	$parent_mobile_no=mysql_real_escape_string($_REQUEST["parent_mobile_no"]);
 	$father_name=mysql_real_escape_string($_REQUEST["father_name"]);
	$mother_name=mysql_real_escape_string($_REQUEST["mother_name"]);
	$class_id=mysql_real_escape_string($_REQUEST["class_id"]);
	$section_id=mysql_real_escape_string($_REQUEST["section_id"]);
	$medium_id=mysql_real_escape_string($_REQUEST["medium_id"]);
	$dob1=mysql_real_escape_string($_REQUEST["dob"]);
	$username=mysql_real_escape_string($_REQUEST["username"]);
	$password=mysql_real_escape_string($_REQUEST["password"]);
	$dob=date('Y-m-d',strtotime($dob1));
	$curent_date=date('Y-m-d');
	
	$notification_key='AAAATJpd3X0:APA91bFIfAJIxq5oBGv4YUfMPDLmhVT-iUilXpJS8l7AwSLIxy4-E1efuYrH4vY2oOwIP6ecLma0zvgva-lB5RYtkgjYa8pKiCBhxcQFqfbPrDbpXmBcc3oiGRQmRTrkucSkBxZAn8Tv';
	//-- GENERATE  USERNAME PASWORD
	$password=md5($password);	
	$fetch_st=mysql_query("select * from login where flag='0' AND eno='$eno'");		
	$fetch_st1=mysql_fetch_array($fetch_st);
 	if(empty($fetch_st1))
	{
					
		$sql="insert into login(name,eno,mobile_no,father_name,mother_name,class_id,section_id,medium,dob,father_mobile,curent_date,user_id,role_id,notification_key,password,username)values('$name','$eno','$mobile_no','$father_name','$mother_name','$class_id','$section_id','$medium_id','$dob','$parent_mobile_no','$curent_date','$user_id','$role_id','$notification_key','$password','$username')";
		$r=mysql_query($sql);
		$mmessage="Student Registration Successfully";
		$ids=mysql_insert_id();
		$photo1="student".$ids.".jpg";
		$file_upload='noimage.png';
		// moe photo in  floder//
		if(move_uploaded_file($_FILES["image"]["tmp_name"],"user/".$photo1))
		{
			$r=mysql_query("update login set image='$photo1' where id='$ids'");
		}
		else{
			$r=mysql_query("update login set image='$file_upload' where id='$ids'");
		}
		$message =true;	
	}
	else
	{
		$message2 =true;	
	}
}
?> 

</script>
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box blue" >
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Student Registration
							</div>
							<div class="tools">
 							</div>
						</div>
						<div class="portlet-body form">
						
<?php if($message!="") { ?>
<div id="success" class="alert alert-success" style="margin-top:10px; width:50%">
<b>Thank You, registration has been successfully.</b>
</div>
<?php } ?>
<?php if($message2!="") { ?>
<div id="success" class="alert alert-danger" style="margin-top:10px; width:50%">
<b>Student enrollment no already exist!</b>
</div>
<?php } ?>	
						<div class="form-body">
							<form class="form-horizontal" role="form" id="form_sample_2" method="post" enctype="multipart/form-data">
						
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class=" col-md-2 control-label">Full Name <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-3">
											 <input type="text" placeholder="Full Name" name="name" required value=""class="form-control"/>
											</div>
											<label class="col-md-2 control-label">Scholler Number <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-3">
												<input type="text" placeholder="Enrollment Number" name="eno" required class="form-control" value=""/>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class=" col-md-2 control-label">Father Name <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-3">
											  <input type="text" placeholder="Father Name" name="father_name" required value=""class="form-control"/>
											</div>
											<label class="col-md-2 control-label">Mother Name  </label>
											<div class="col-md-3">
												<input type="text" placeholder="Mother Name" name="mother_name"  value=""class="form-control"/>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class=" col-md-2 control-label">Student Mobile No. <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-3">
											 <input type="text" placeholder="Mobile No." name="mobile_no" required class="form-control" value=""/>
											</div>
											<label class="col-md-2 control-label">Parents Mobile No. </label>
											<div class="col-md-3">
												<input type="text" placeholder="Parents Mobile No" name="parent_mobile_no" class="form-control" value=""/>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class=" col-md-2 control-label">Class <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-3">
											 <select class="form-control select2me" required placeholder="Select class.." name="class_id"><option value=""></option>
                                                <?php
												$r1=mysql_query("select * from master_class");		
												$i=0;
												while($row1=mysql_fetch_array($r1))
												{
													$id=$row1['id'];
													$class_name=$row1['class_name'];
													?>
													<option value="<?php echo $id;?>"><?php echo $class_name;?></option>
												<?php } ?>
												</select>
											</div>
											<label class="col-md-2 control-label">Section <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-3">
												<select class="form-control select select2 select2me" required placeholder="Select section.." name="section_id">
													<option value=""></option>
													<?php
													$r1=mysql_query("select * from master_section");		
													$i=0;
													while($row1=mysql_fetch_array($r1))
													{
													$id=$row1['id'];
													$section_name=$row1['section_name'];
													?>
														<option value="<?php echo $id;?>"><?php echo $section_name;?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class=" col-md-2 control-label">Medium <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-3">
											 <select class="form-control select select2 select2me" required placeholder="Select medium.." name="medium_id">
												<option value=""></option>
												<?php
												$r1=mysql_query("select * from master_medium");		
												$i=0;
												while($row1=mysql_fetch_array($r1))
												{
													$id=$row1['id'];
													$medium_name=$row1['medium_name'];
													?>
													<option value="<?php echo $id;?>"><?php echo $medium_name;?></option>
												<?php } ?>
											</select>
											</div>
											<label class="col-md-2 control-label">Student Image</label>
											<div class="col-md-3">
												<input type="file" class="form-control" name="image" id="file1 " onChange="loadFile(event)">
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class=" col-md-2 control-label">Username <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-3">
											  <input type="text" placeholder="Username" name="username" required value=""class="form-control"/>
											</div>
											<label class="col-md-2 control-label">Password <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-3">
												<input type="text" placeholder="Password" name="password" required value=""class="form-control"/>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class=" col-md-2 control-label">Date of Birth <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-3">
											 <input class="form-control date-picker" required id="field_5" value="<?php echo date("d-m-Y"); ?>" placeholder="dd-mm-yyyy" type="text" data-date-format="dd-mm-yyyy" type="text" name="dob">
											</div>
 										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12" align="center">
										<button type="submit" class="btn green" name="submit">Submit</button>
									</div>
								</div>
							 
 		
							</form>
						</div>
					</div>
				</div>
			</div>
	</div>
</body>

<?php  footer();?>			
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){   
		var myVar=setInterval(function(){myTimerr()},4000);
		function myTimerr() 
		{
			$("#success").hide();
		} 
	});
</script>
 <?php scripts();?>

</html>

