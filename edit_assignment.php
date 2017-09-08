<?php
date_default_timezone_set('asia/kolkata');  
include("index_layout.php");
include("database.php");
$update_id=$_GET['id'];
$user=$_SESSION['category'];
$user_id=$_SESSION['id'];
$date=date('Y-m-d');
 		
if(isset($_POST['submit']))
{
	
	$update_id=$_POST["update_id"];
	$class_id=$_POST["class_id"];
	$section_id=$_POST["section_id"];
	$subject_id=$_POST["subject_id"];				
 	$topic=$_POST["topic"];
	$submission_date=$_POST["submission_date"];
	$sub_date=date('Y-m-d',strtotime($submission_date));
	$description=$_POST["description"];
	$student_id=$_POST["student_id"]; 

	if(empty($student_id))
		{
			$sql="update `assignment` set `user_id`='$user_id',`student_id`='',`topic`='$topic',`description`='$description',`class_id`='$class_id',`section_id`='$section_id',`subject_id`='$subject_id',`submission_date`='$sub_date'  where `id`='$update_id'";
			
			$r=mysql_query($sql);
			if($_FILES["file"]["tmp_name"])
			{
				$time=time();
				$file_name=$_FILES["file"]["name"]; 
				$ext=pathinfo($file_name,PATHINFO_EXTENSION);
				$photo=$topic.$time.'.'.$ext;
				move_uploaded_file($_FILES["file"]["tmp_name"],"homework/".$photo);
				$r1=mysql_query("update `assignment` set file='$photo' where id='$update_id'");
				 
			}
			//- Notification	 
			/*	$std_nm=mysql_query("SELECT `device_token`,`notification_key`,`id`,`role_id` FROM `login` where section_id='".$section_id."' AND  class_id='".$class_id."' AND device_token != '' ");
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
							'link' => 'notice://Assignment?id='.$insert_id.'&student_id=',
							'notification_id' => $insert_id,
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
						//--- NOTIFICATIO INSERT
						$NOTY_insert="INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES('$title','$message','$user_id','$submitted_by','$date','$time','$role_id')";
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
					}*/
				//--
				//-------------------------
		}
	else if(!empty($student_id))
	{
	 	$implodestsdnt=implode(',',$student_id);
		$sql="update `assignment` set `user_id`='$user_id',`student_id`='$implodestsdnt',`topic`='$topic',`description`='$description',`class_id`='$class_id',`section_id`='$section_id',`subject_id`='$subject_id',`submission_date`='$sub_date'  where `id`='$update_id'";
		 
		$r2=mysql_query($sql); 
		if($_FILES["file"]["name"]){
			$time=time();
			$file_name=$_FILES["file"]["name"]; 
			$ext=pathinfo($file_name,PATHINFO_EXTENSION);
			$photo=$topic.$time.'.'.$ext;
			move_uploaded_file($_FILES["file"]["tmp_name"],"homework/".$photo);
			$r4=mysql_query("update `assignment` set file='$photo' where id='$update_id'");
		}
		//** NOTIFICATION
		/*foreach($student_id as $value)
		{
			$student_id=$value;
			$std_nm=mysql_query("SELECT `device_token`,`notification_key`,`id`,`role_id` FROM `login` where id='".$student_id."' AND device_token != '' ");
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
							'link' => 'notice://Assignment?id='.$insert_id.'&student_id=',
							'notification_id' => $insert_id,
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
						//--- NOTIFICATIO INSERT
						$NOTY_insert="INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES('$title','$message','$user_id','$submitted_by','$date','$time','$role_id')";
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
		}	*/
	}

}

$ftc_data=mysql_query("select * from `assignment` where `id` = '$update_id'");
$data_ftc=mysql_fetch_array($ftc_data);	
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
                            <input type="hidden" name="update_id" value="<?php echo  $data_ftc['id']?>">
								<div class="form-body">
								</br>
								<div class="row">
								    
									 <div class="col-sm-6">
										<div class="ifYes"<?php if($data_ftc['student_id']==''){ echo'style="display:none"'; } ?> >
											<div class="form-group">
													<label class=" col-md-3 control-label">Select Student </label>
												<div class="col-md-3">
													<select name="student_id[]" class="form-control input-medium select2me" multiple="multiple" placeholder="Select...">
													<option value=""></option>
														<?php
														$r1=mysql_query("select `name`,`id` from login order by id ASC");		
														$i=0;
														$std=explode(',',$data_ftc['student_id']);
														while($row1=mysql_fetch_array($r1))
														{
															$id=$row1['id'];
															$name=$row1['name'];
														?>
														<option <?php if(in_array($id , $std)){?> selected <?php }?> value="<?php echo $id;?>"><?php echo $name;?></option>                              
													<?php }?> 
													</select>
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
													<option <?php if($data_ftc['class_id']==$id){ echo "selected"; } ?> value="<?php echo $id;?>"><?php echo $class_name;?></option>                              
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
												<select class="form-control user1 select2me input-medium search_hw seduntFind" id="sec_id" required name="section_id">
                                                    <option value="">---Select Section---</option>
                                                        <?php 
                                                            $query2=mysql_query("select * from `class_section` where `class_id`='".$data_ftc['class_id']."'"); 
                                                            while($fetch2=mysql_fetch_array($query2))
                                                            {
                                                                $i++;
                                                            $section_id=$fetch2['section_id'];
                                                            $qt=mysql_query("select * from `master_section` where `id`='$section_id'");
                                                            $ft=mysql_fetch_array($qt);
            
                                                            $section_id=$ft['id'];
                                                            $section_name=$ft['section_name'];	
                                                            
                                                            ?>
                                                            <option <?php if($data_ftc['section_id']==$section_id){ echo "selected"; } ?>  value="<?php echo $section_id; ?>"><?php echo $section_name; ?></option>
                                                        <?php } ?>
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
													<select class="form-control select2me input-medium" required name="subject_id">
                                                        <option value="">---Select Subject---</option>
                                                            <?php 
                                                              $query4=mysql_query("select * from `subject_mapping` where `class_id`='".$data_ftc['class_id']."' && section_id='".$data_ftc['section_id']."'"); 
                                                                while($fetch4=mysql_fetch_array($query4))
                                                                {
                                                                    $subject_id=$fetch4['subject_id'];
                                                                    $sub=(explode(",",$subject_id));
                                                                    foreach($sub as $sub_id){
                                                                        $qt4=mysql_query("select * from `master_subject` where `id`='$sub_id'");
                                                                        $fetch_name=mysql_fetch_array($qt4);
                                                                        $subject_id=$fetch_name['id'];
                                                                        $subject_name=$fetch_name['subject_name']; ?>
                                                                            <option <?php if($data_ftc['subject_id']==$subject_id){ echo "selected"; } ?> value="<?php echo $subject_id; ?>"><?php echo $subject_name; ?></option>
                                                                    <?php } ?>
                                                            <?php } ?>
                                                    </select>
												</div>												 
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-md-3 control-label">Topic</label>
												<div class="col-md-3">
												<input class="form-control input-medium " required  value="<?php echo $data_ftc['topic']; ?>" placeholder="Enter Topic" type="text" name="topic">
												</div>

											</div> 
										</div>
										</div>
									 
									 <div class="row">
										<div class="col-md-6">
											<label class="col-md-3 control-label" align="center">Date</label>
											<div class="col-md-3">
											<input class="form-control form-control-inline input-medium date-picker" required  value="<?php echo date('d-m-Y',strtotime($data_ftc['submission_date'])); ?>" placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy"  name="submission_date">
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
									<div class="col-md-6">
											<label class="col-md-3 control-label" align="center">Discription</label>
											<div class="col-md-3">
											<textarea class="form-control input-medium" rows="1" required placeholder="Discription" type="text" name="description"><?php echo $data_ftc['description'];?></textarea>										 	
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

