<?php
date_default_timezone_set('asia/kolkata');  
include("index_layout.php");
include("database.php");
require_once('ImageManipulator.php'); 
$user=$_SESSION['category'];
$user_id=$_SESSION['id'];
$get_id=$_GET['id'];
$message="";
 
if(isset($_POST['submit']))
{
	$role_id=5;
	$name=mysql_real_escape_string($_REQUEST["name"]);
	$eno=mysql_real_escape_string($_REQUEST["eno"]);
	$mobile_no=mysql_real_escape_string($_REQUEST["mobile_no"]);
	$father_mobile=mysql_real_escape_string($_REQUEST["father_mobile"]);
	$password=md5($eno);
	$father_name=mysql_real_escape_string($_REQUEST["father_name"]);
	$mother_name=mysql_real_escape_string($_REQUEST["mother_name"]);
	$class_id=mysql_real_escape_string($_REQUEST["class_id"]);
	$section_id=mysql_real_escape_string($_REQUEST["section_id"]);
	$medium_id=mysql_real_escape_string($_REQUEST["medium_id"]);
	$dob1=mysql_real_escape_string($_REQUEST["dob"]);
	$username=mysql_real_escape_string($_REQUEST["username"]);
	$password=mysql_real_escape_string($_REQUEST["password"]);
	$k_image=$_REQUEST["k_image"];
	$dob=date('Y-m-d',strtotime($dob1));
	$curent_date=date('Y-m-d');
	$notification_key='AAAATJpd3X0:APA91bFIfAJIxq5oBGv4YUfMPDLmhVT-iUilXpJS8l7AwSLIxy4-E1efuYrH4vY2oOwIP6ecLma0zvgva-lB5RYtkgjYa8pKiCBhxcQFqfbPrDbpXmBcc3oiGRQmRTrkucSkBxZAn8Tv';
	if(!empty($password)) 
	{
		$password=md5($password);
		$update_s=mysql_query("update `login` SET `password`='$password' where id='".$get_id."'" );
	}	
	$update_s=mysql_query("update `login` SET `name`='$name',`eno`='$eno',`mobile_no`='$mobile_no',`father_name`='$father_name',`mother_name`='$mother_name',`class_id`='$class_id',`section_id`='$section_id',`medium`='$medium_id',`dob`='$dob',`father_mobile`='$father_mobile',`curent_date`='$curent_date',`user_id`='$user_id',`role_id`='$role_id',`username`='$username' where id='".$get_id."'" );

	$message="Registration Update Successfully";
	$photo1="student".$get_id.".jpg";
	$file_upload='noimage.png';
		// moe photo in  floder//
		if(move_uploaded_file($_FILES["image"]["tmp_name"],"user/".$photo1))
		{
			$r=mysql_query("update login set image='$photo1' where id='$get_id'");
		}
 		$message = true;	

}
 
?> 

</script>
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Profile</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box blue" >
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Update Profile
							</div>
							<div class="tools">
 							</div>
						</div>
						<div class="portlet-body form">
						
<?php if($message!="") { ?>
<div id="success" class="alert alert-success" style="margin-top:10px; width:50%">
<b>Thank You, profile update has been successfully.</b>
</div>
<?php }   ?>	
						<div class="form-body">
						<?php
                            $r1=mysql_query("select * from login where id='$get_id'");		
                            $i=0;
                            $row1=mysql_fetch_array($r1);                            
                            $id=$row1['id'];
                            $name=$row1['name'];
                            $father_name=$row1['father_name'];
							$role_id=$row1['role_id'];
                            $mother_name=$row1['mother_name'];
                            $class_id=$row1['class_id'];        
                            $section_id=$row1['section_id'];
							$medium_id=$row1['medium'];
                            $eno=$row1['eno'];
                            $mobile_no=$row1['mobile_no'];
							$father_mobile=$row1['father_mobile'];
                            $user_image=$row1['image'];
                            $username=$row1['username'];
                             
                            $dob=$row1['dob'];
							$x_dob=date('d-m-Y', strtotime($dob));
                            
                            ?>
							<form class="form-horizontal" role="form" id="form_sample_2" method="post" enctype="multipart/form-data">
						
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class=" col-md-2 control-label">Full Name <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-3">
											 <input type="text" placeholder="Full Name" name="name" value="<?php echo $name; ?>" required  class="form-control"/>
											</div>
											<label class="col-md-2 control-label">Scholler Number <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-3">
												<input type="text" placeholder="Enrollment Number" readonly value="<?php echo $eno; ?>" name="eno" required class="form-control"  />
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class=" col-md-2 control-label">Father Name <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-3">
											  <input type="text" placeholder="Father Name"  value="<?php echo $father_name; ?>" name="father_name" required  class="form-control"/>
											</div>
											<label class="col-md-2 control-label">Mother Name  </label>
											<div class="col-md-3">
												<input type="text" placeholder="Mother Name"  value="<?php echo $mother_name; ?>" name="mother_name"   class="form-control"/>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class=" col-md-2 control-label">Student Mobile No. <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-3">
											 <input type="text" placeholder="Mobile No."  value="<?php echo $mobile_no; ?>" name="mobile_no" required class="form-control"/>
											</div>
											<label class="col-md-2 control-label">Parents Mobile No. </label>
											<div class="col-md-3">
												<input type="text" placeholder="Parents Mobile No"  value="<?php echo $father_mobile; ?>" name="parent_mobile_no" class="form-control"/>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class=" col-md-2 control-label">Class <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-3">
											 <select class="form-control select select2 select2me" required placeholder="Select class.." name="class_id"><option  ></option>
                                                <?php
												$r1=mysql_query("select * from master_class");		
												$i=0;
												while($row1=mysql_fetch_array($r1))
												{
													$id=$row1['id'];
													$class_name=$row1['class_name'];
													?>
													<option value="<?php echo $id;?>" <?php if($id==$class_id) { echo 'selected'; } ?>><?php echo $class_name;?></option>
												<?php } ?>
												</select>
											</div>
											<label class="col-md-2 control-label">Section <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-3">
												<select class="form-control select select2 select2me" required placeholder="Select section.." name="section_id">
													<option  ></option>
													<?php
													$r1=mysql_query("select * from master_section");		
													$i=0;
													while($row1=mysql_fetch_array($r1))
													{
													$id=$row1['id'];
													$section_name=$row1['section_name'];
													?>
														<option value="<?php echo $id;?>" <?php if($id==$section_id) { echo 'selected'; } ?>><?php echo $section_name;?></option>
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
												<option  ></option>
												<?php
												$r1=mysql_query("select * from master_medium");		
												$i=0;
												while($row1=mysql_fetch_array($r1))
												{
													$id=$row1['id'];
													$medium_name=$row1['medium_name'];
													?>
													<option <?php if($id==$medium_id) { echo 'selected'; } ?> value="<?php echo $id;?>"><?php echo $medium_name;?></option>
												<?php } ?>
											</select>
											</div>
											<label class=" col-md-2 control-label">Date of Birth <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-3">
											 <input class="form-control date-picker" required id="field_5" value="<?php echo  $x_dob;?>" placeholder="dd-mm-yyyy" type="text" data-date-format="dd-mm-yyyy" type="text" name="dob">
											</div>
											
										</div>
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class=" col-md-2 control-label">Username <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-3">
											  <input type="text" placeholder="Username" name="username" required value="<?php echo  $username;?>"class="form-control"/>
											</div>
											<label class="col-md-2 control-label">Password </label>
											<div class="col-md-3">
												<input type="text" placeholder="Password" name="password" value=""class="form-control"/>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-md-2 control-label">Student Image</label>
											<div class="col-md-3">
												<div class="col-md-10 fileinput-new thumbnail" style="width: 200px;  height: 150px;">
                                                    <img src="user/<?php echo $user_image; ?>" style="width:100%;" alt="" />
                                                    </div>
											</div>
											<label class="col-md-2 control-label">Change Image</label>
											<div class="col-md-3">
												<input type="file" class="form-control" name="image" id="file1 " onChange="loadFile(event)">
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

