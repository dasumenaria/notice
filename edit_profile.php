<?php
 include("index_layout.php");
 include("database.php");
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
$parent_mobile_no=mysql_real_escape_string($_REQUEST["parent_mobile_no"]);
$password=md5($eno);
$father_name=mysql_real_escape_string($_REQUEST["father_name"]);
$mother_name=mysql_real_escape_string($_REQUEST["mother_name"]);
$class_id=mysql_real_escape_string($_REQUEST["class_id"]);
$section_id=mysql_real_escape_string($_REQUEST["section_id"]);
$medium_id=mysql_real_escape_string($_REQUEST["medium_id"]);
$dob1=mysql_real_escape_string($_REQUEST["dob"]);
$k_image=$_REQUEST["k_image"];

$dob=date('Y-m-d',strtotime($dob1));
$curent_date=date('Y-m-d');
$notification_key='AAAArt9gILg:APA91bFwFhemkzYV7Sq83t7zvpLC8QY27DC__xWUFIbI1GefXTDD0_4S8hOuOJ88q0oZ3gmWjshoRSwU08xqcWTb1a1PofkKp52nUdN9tB-voht0KhDW4O4Ch39ycj0VNogAuYRj29dN';
//echo "update `login` SET `name`='$name',`eno`='$eno',`mobile_no`='$mobile_no',`father_name`='$father_name',`mother_name`='$mother_name',`class_id`='$class_id',`section_id`='$section_id',`medium`='$medium_id',`dob`='$dob',`parent_mobile_no`='$parent_mobile_no',`curent_date`='$curent_date',`user_id`='$user_id',`role_id`='$role_id',`password`='$password' where id='".$get_id."'" ;
//exit;			 			 
$update_s=mysql_query("update `login` SET `name`='$name',`eno`='$eno',`mobile_no`='$mobile_no',`father_name`='$father_name',`mother_name`='$mother_name',`class_id`='$class_id',`section_id`='$section_id',`medium`='$medium_id',`dob`='$dob',`parent_mobile_no`='$parent_mobile_no',`curent_date`='$curent_date',`user_id`='$user_id',`role_id`='$role_id',`password`='$password' where id='".$get_id."'" );

$message="Registration Update Successfully";
$photo1="student".$get_id.".jpg";
$file_upload='noimage.png';
    // moe photo in  floder//
		if(move_uploaded_file($_FILES["image"]["tmp_name"],"user/".$photo1))
	{
		$r=mysql_query("update login set image='$photo1' where id='$get_id'");
    }
	else{
		$r=mysql_query("update login set image='$k_image' where id='$get_id'");
	}

	$message =true;	

}
	else
	{
		echo mysql_error();
	}
    
  ?> 

<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="row">
							<div class="col-md-12">
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
	<?php if($message)
       { 
      ?>
    <h5 style="color:red; text-align:center;"  id="success"><b>Thank You, profile update has been successfully.</b></h5>
     <?php 
	} 
	?>							
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Update Profile Account</span>
										</div>
										
									</div>
									<div class="portlet-body">
                                                              
										<div class="tab-content">
											<!-- PERSONAL INFO TAB -->
                             
                          <form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
											<div class="tab-pane active" id="tab_1_1">
                                      <?php
                            $r1=mysql_query("select * from login where id='$get_id'");		
                            $i=0;
                            while($row1=mysql_fetch_array($r1))
                            {
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
							$parent_mobile_no=$row1['parent_mobile_no'];
                            $user_image=$row1['image'];
                            $dob=$row1['dob'];
							$x_dob=date('d-m-Y', strtotime($dob));
                            }
                            ?>
							
                                            <input type="hidden" name='edit_id' class="form-control" value="<?php echo $get_id;?>" >	
                                                        <div class="row">
													 <div class="col-sm-4"><div class="form-group">
                                                    <label class="control-label">Role</label>
													<input type="text" readonly placeholder="" name="role_id"  value="<?php echo "student";?>" required value="Student" class="form-control"/>
													</div></div>		

													<div class="col-sm-2"><div class="form-group">
													<label class="control-label"></label>
													&nbsp;
													</div>
													</div>													
													
                                                    <div class="col-sm-4"><div class="form-group">
                                                    <label class="control-label">Full Name</label>
                                                    <input type="text" placeholder="Full Name" name="name" required value="<?php echo $name;?>" class="form-control"/>
                                                    </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-sm-4"><div class="form-group">
                                                    <label class="control-label">Scholler Number </label>
                                                    <input type="text" placeholder="Enrollment Number" name="eno" required class="form-control" value="<?php echo $eno;?>"/>
                                                    </div>
                                                    </div>
													
													 <div class="col-sm-2"><div class="form-group">
                                                    <label class="control-label"></label>
                                                  &nbsp;
                                                    </div>
                                                    </div>
                                                     
                                                    <div class="col-sm-4"><div class="form-group">
                                                    <label class="control-label">Father Name</label>
                                                    <input type="text" placeholder="Father Name" name="father_name" value="<?php echo $father_name;?>" class="form-control"/>
                                                    </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-4"><div class="form-group">
                                                    <label class="control-label">Mother Name</label>
                                                    <input type="text" placeholder="Mother Name" name="mother_name" value="<?php echo $mother_name;?>" class="form-control"/>
                                                    </div>
                                                    </div>
													
													 <div class="col-sm-2"><div class="form-group">
                                                    <label class="control-label"></label>
                                                  &nbsp;
                                                    </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-4"><div class="form-group">
                                                    <label class="control-label">Student Mobile No.</label>
                                                    <input type="text" placeholder="Mobile No." name="mobile_no" value="<?php echo $mobile_no;?>" class="form-control"/>
                                                    </div>
                                                    </div>
                                                    
                                                  
                                                    <div class="col-sm-4"><div class="form-group">
														<label class="control-label">Father/Mother Mobile No.</label>
														<input type="text" placeholder="Parents Mobile No" name="parent_mobile_no" class="form-control" value="<?php echo $parent_mobile_no;?>"/>
													</div>
                                                    </div>
                                                    
                                                     <div class="col-sm-2"><div class="form-group">
                                                    <label class="control-label"></label>
                                                  &nbsp;
                                                    </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-4"><div class="form-group">
                                                    <label class="control-label">Class</label>
                                                   <select class="form-control select select2 select2me" placeholder="Select class.." name="class_id"><option value=""></option>
                                                   
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
                                                    </div>
                                                    
                                                     <div class="col-sm-4"><div class="form-group">
                                                    <label class="control-label">Section</label>
                                                   <select class="form-control select select2 select2me" placeholder="Select section.." name="section_id">
                                                        <option value=""></option>
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
                                                    
                                                 <div class="col-sm-2"><div class="form-group">
                                                    <label class="control-label"></label>
                                                  &nbsp;
                                                    </div>
                                                    </div>
													
													
                                                     <div class="col-sm-4"><div class="form-group">
                                                    <label class="control-label">Medium</label>
                                                   <select class="form-control select select2 select2me" placeholder="Select medium.." name="medium_id">
                                                        <option value=""></option>
                                                        <?php
                                            $r1=mysql_query("select * from master_medium");		
                                            $i=0;
                                            while($row1=mysql_fetch_array($r1))
                                            {
                                            $id=$row1['id'];
                                            $medium_name=$row1['medium_name'];
                                            ?>
                                            <option value="<?php echo $id;?>" <?php if($id==$medium_id) { echo 'selected'; } ?>><?php echo $medium_name;?></option>
                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-4"><div class="form-group">
                                                    <label class="control-label ">Student Image</label>
                                                    </br>
                                                    <div class=" col-md-6 fileinput fileinput-new" style="padding-left: 0px;" data-provides="fileinput">
                                                    <div class="col-md-10 fileinput-new thumbnail" style="width: 200px;  height: 150px;">
                                                    <img src="user/<?php echo $user_image; ?>" style="width:100%;" alt=""/>
                                                    </div>
                                                    <div class="col-md-6 fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                    </div>
                                                    <div class="col-md-6">
                                                    <span class="btn default btn-file addbtnfile" style="background-color:#00CCFF; color:#FFF">
                                                    <span class="fileinput-new">
                                                    <i class="fa fa-plus"></i> </span>
                                                    <span class="fileinput-exists">
                                                    <i class="fa fa-plus"></i> </span>
													<input type="hidden" class="default" name="k_image" value="<?php echo $user_image;?>" id="">
                                                    <input type="file" class="default" name="image" id="file1 "">
                                                    </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput" style=" color:#FFF">
                                                    <i class="fa fa-trash"></i> </a></div>
                                                    </div>
                                                    </div></div>
                                                    <div class="col-sm-2"><div class="form-group">
                                                    <label class="control-label"></label>
                                                  &nbsp;
                                                    </div>
                                                    </div>
                                                    
                                         <div class="col-sm-4">           

						<div class="form-group">
						<label class="control-label">Date of Birth</label>
						</br>
						<div class="col-md-6">
						<input class="form-control form-control-inline date-picker" required id="field_5" value="<?php echo $x_dob; ?>" placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy" type="text" name="dob">

						</div>
						</div>
						</div>
                                                    <div class="col-sm-12"><div class=" right1" align="right" style="margin-right:10px">
                                                        <button type="submit" class="btn green" name="submit">Submit</button>
                                                    </div></div>
                                                   </div> </div> 
												</form>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						
					</div>
			
			
			</div></div>
</body>

<?php footer();?>
<script>
		var myVar=setInterval(function(){myTimerr()},4000);
		function myTimerr() 
		{
		$("#success").hide();
		} 
</script>
<?php scripts();?>

</html>

