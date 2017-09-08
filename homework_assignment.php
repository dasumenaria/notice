<?php
date_default_timezone_set('asia/kolkata');  
include("index_layout.php");
include("database.php");
$user=$_SESSION['category'];
$user_id=$_SESSION['id'];
$date=date('Y-m-d');
 		
if(isset($_POST['submit']))
{
	
	$class_id=$_POST["class_id"];
	$section_id=$_POST["section_id"];
	$subject_id=$_POST["subject_id"];				
	$yesno=$_POST["yesno"];				
	$topic=$_POST["topic"];
	$submission_date=$_POST["submission_date"];
	$sub_date=date('Y-m-d',strtotime($submission_date));
	$description=$_POST["description"];
	$student_id=$_POST["student_id"]; 

	if($yesno=='1')
	{
			$sql="insert into assignment(user_id,student_id,topic,description,class_id,section_id,subject_id,submission_date,curent_date) values('$user_id','','$topic','$description','$class_id','$section_id','$subject_id','$sub_date','$date')";
			$r=mysql_query($sql);
			$time=time();
			$eventid=mysql_insert_id();
			$file_name=$_FILES["file"]["name"]; 
			$ext=pathinfo($file_name,PATHINFO_EXTENSION);
			$photo=$topic.$time.'.'.$ext;
			move_uploaded_file($_FILES["file"]["tmp_name"],"homework/".$photo);
			$r1=mysql_query("update `assignment` set file='$photo' where id='$eventid'");
			
			
				//---------------------------------------------------------------
				$std_nm=mysql_query("SELECT `device_token`,`notification_key`,`id`,`role_id` FROM `login` where section_id='".$section_id."' AND  class_id='".$class_id."' AND device_token != '' ");
				while($ftc_nm=mysql_fetch_array($std_nm))
					{
						$device_token = $ftc_nm['device_token'];
						$notification_key = $ftc_nm['notification_key'];
						$user_ids=$ftc_nm['id'];
						$role_id=$ftc_nm['role_id'];

						$message='New Assignment Submitted';
						$title='Assignment';
						$submitted_by=$user_id;
						$user_idss=$user_ids;
						$date=date("M d Y");
						$time=date("h:i:A");

						$msg = array
						(
							'title'=> $title,
							'message'  => $message,
							'button_text' => 'View',
							'link' => 'notice://Assignment?id='.$eventid.'&student_id='.$user_idss,
							'notification_id' => $eventid,
						);
						$url = 'https://fcm.googleapis.com/fcm/send';
						$fields = array
						(
							'registration_ids'  => array($device_token),
							'data'   => $msg
						);
						$headers = array
						(
							'Authorization: key=' .$notification_key,
							'Content-Type: application/json'
						);
						$link='notice://Assignment?id='.$eventid.'&student_id='.$user_idss;
						//--- NOTIFICATIO INSERT
						$NOTY_insert="INSERT into notification(title,message,user_id,submitted_by,date,time,role_id,link)VALUES('$title','$message','$user_id','$submitted_by','$date','$time','$role_id','$link')";
						$rr=mysql_query($NOTY_insert);
						//-- END

						json_encode($fields);
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
						$result = curl_exec($ch);
						curl_close($ch);
					}
				//--
				//-------------------------
		}
	else if($yesno=='2')
	{
		$implodestsdnt=implode(',',$student_id);
		$sql1="insert into assignment(user_id,student_id,topic,description,class_id,section_id,subject_id,submission_date,curent_date) values('$user_id','$implodestsdnt','$topic','$description','$class_id','$section_id','$subject_id','$sub_date','$date')";
			$r2=mysql_query($sql1); 
			$time=time();
			$eventid=mysql_insert_id();
			$file_name=$_FILES["file"]["name"]; 
			$ext=pathinfo($file_name,PATHINFO_EXTENSION);
			$photo=$topic.$time.'.'.$ext;
			move_uploaded_file($_FILES["file"]["tmp_name"],"homework/".$photo);
			$r4=mysql_query("update `assignment` set file='$photo' where id='$eventid'");
			 
			foreach($student_id as $value)
			{
				$student_ids=$value;
					//---------------------------------------------------------------
				$std_nm=mysql_query("SELECT `device_token`,`notification_key`,`id`,`role_id` FROM `login` where id='".$student_ids."' AND device_token != '' ");
				while($ftc_nm=mysql_fetch_array($std_nm))
					{
						$device_token = $ftc_nm['device_token'];
						$notification_key = $ftc_nm['notification_key'];
						$user_ids=$ftc_nm['id'];
						$role_id=$ftc_nm['role_id'];

						$message='New Assignment Submitted';
						$title='Assignment';
						$submitted_by=$user_id;
						$user_idss=$user_ids;
						$date=date("M d Y");
						$time=date("h:i:A");

						$msg = array
						(
							'title'=> $title ,
							'message'  => $message,
							'button_text' => 'View',
							'link' => 'notice://Assignment?id='.$eventid.'&student_id='.$student_ids,
							'notification_id' => $eventid,
						);
						$url = 'https://fcm.googleapis.com/fcm/send';
						$fields = array
						(
							'registration_ids'  => array($device_token),
							'data'   => $msg
						);
						$headers = array
						(
							'Authorization: key=' .$notification_key,
							'Content-Type: application/json'
						);
						$link='notice://Assignment?id='.$eventid.'&student_id='.$student_ids;
						//--- NOTIFICATIO INSERT
						$NOTY_insert="INSERT into notification(title,message,user_id,submitted_by,date,time,role_id,link)VALUES('$title','$message','$user_idss','$submitted_by','$date','$time','$role_id','$link')";
						$rr=mysql_query($NOTY_insert);
						//-- END


						json_encode($fields);
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
						$result = curl_exec($ch);
						curl_close($ch);
					}
				//--
		}	
	}

}
		
		
		
	
?> 

<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Work Assignment</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
				<div class="portlet box blue" >
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Home Work Assignment
							</div>
							 
						</div>
						<div class="portlet-body form">
						 	<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
								</br>
								<div class="row">
								   <div class="col-sm-6">
										  <div class="form-group">
													<label class=" col-md-3 control-label">Select</label>
												<div class="col-md-9">
													<label><input type="radio" checked name="yesno" value="1" class="rd"> Class Wise </label>
													<label><input type="radio" name="yesno" value="2" class="rd"> Student Wise</label> 
												</div>
											</div>
									 </div>
									 
									</div>
								</div>
									 
									<div class="row">
										<div class="col-md-6">
											<div class="form-group"	>
												<label class="col-md-3 control-label">Class</label>
												<div class="col-md-3">
													<select name="class_id" id="cls_id" class=" user form-control select2me input-medium" placeholder="Select Class">
													<option value=""></option>
													<?php
													$cls_ftc=mysql_query("select * from master_class");		
													while($ftc_cls=mysql_fetch_array($cls_ftc))
													{
													$id=$ftc_cls['id'];
													$class_name=$ftc_cls['class_name'];
													?>
													<option value="<?php echo $id;?>"><?php echo $class_name;?></option>                              
													<?php }?> 
													</select>
												</div>												 
											</div>
										</div>
										<div class="col-md-6">
											<div id="dt">	
											<div class="form-group">
												<label class="col-md-3 control-label">Section</label>
												<div class="col-md-3">
													<select name="section_id" class="form-control select2me input-medium" placeholder="Select Section" >
													<option value=""></option>
													 </select>
												</div>												 
												</div>												 
											</div>
										</div>
										</div>
										<div class="row">
										<div class="col-md-6">
										 <div id="data">
												<div class="form-group">
												<label class="col-md-3 control-label">Subject</label>
												<div class="col-md-3">
													<select name="subject_id" class="form-control select2me input-medium" placeholder="Select Subject" >
													<option value=""></option>
													 </select>
												</div>												 
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-md-3 control-label">Topic</label>
												<div class="col-md-3">
												<input class="form-control input-medium " required  value="" placeholder="Enter Topic" type="text" name="topic">
												</div>

											</div> 
										</div>
										</div>
									 
									 <div class="row">
										<div class="col-md-6">
											<label class="col-md-3 control-label" align="center">Date</label>
											<div class="col-md-3">
											<input class="form-control form-control-inline input-medium date-picker" required  value="" placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy"  name="submission_date">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Image</label>
												<div class=" col-md-6 fileinput fileinput-new" style="padding-left: 15px;" data-provides="fileinput">
												<input type="file" class="form-control" name="file" id="file1">
											</div>
											</div>
										</div>
									</div>
								<div class="row">
                                	<div class="col-md-6 ifYes" style="display:none">
										 
											<div class="form-group">
													<label class=" col-md-3 control-label">Select Student </label>
												<div class="col-md-3">
													<select name="student_id[]" class="form-control select2me input-medium"   multiple='multiple' placeholder="Select...">
													<option value=""></option>
														<?php
														$r1=mysql_query("select `name`,`id` from login where `flag`=0  order by id ASC");		
														$i=0;
														while($row1=mysql_fetch_array($r1))
														{
															$id=$row1['id'];
															$name=$row1['name'];
														?>
															<option value="<?php echo $id;?>"><?php echo $name;?></option>                              
													<?php }?> 
													</select>
												</div>
											</div>
										 
                                    </div>
										<div class="col-md-6">
											<label class="col-md-3 control-label" align="center">Discription</label>
											<div class="col-md-3">
											<textarea class="form-control input-medium" rows="1" required placeholder="Discription" type="text" name="description"></textarea>										 	
											</div>
										</div>
									</div>									
								 <div  align="center">
									<input  type="submit" class="btn green" name="submit"  value="Submit">
						</div> 
								</div>
							</form>
						</div>
					</div>
					
 
 		

</div></div>
</body>

<?php  footer();?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script> 
 
$(document).ready(function() {
		
	$(".rd").live("click",function(){
	 var valu=$(this).val();
		if(valu==2)
		{ 
		 $('.ifyes').show();
		}
		else
		{
		 $('.ifyes').hide();
		}
	});
	
	$(".user").live("change",function(){
		var t=$(this).val();
		$.ajax({
		url: "ajax_homework.php?pon="+t,
		}).done(function(response) {
		$("#dt").html(""+response+"");
			$('.select2me').select2();  
		});
	});	 

	$(".user1").live("change",function(){
 		var t=$("#cls_id").val();
		var s=$(this).val();
		$.ajax({
		url: "ajax_homework.php?pon="+t+"&pon1="+s,
		}).done(function(response) {
		 $("#data").html(""+response+"");
		 
		
		});
	 
	});	  

});

 </script> 
 
 

 
			
 <?php scripts();?>

</html>

