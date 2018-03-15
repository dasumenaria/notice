<?php
date_default_timezone_set('asia/kolkata');  
include("index_layout.php");
include("database.php");
$user=$_SESSION['category'];
$user_id=$_SESSION['id'];
$date=date('Y-m-d');
 		
if(isset($_POST['submit']))
{
	$data_arrs = $_POST;
	foreach($data_arrs['assignment'] as $key => $data_arr)
	{

		foreach($_FILES['file']['error'] as $k=>  $error) {
			$data_arr['file_name'] = $_FILES['file']['name'][$key];
			$data_arr['file_tmp_name'] = $_FILES['file']['tmp_name'][$key];
		}
		
	$class_id=$data_arrs["class_id"];
	$section_id=$data_arrs["section_id"];
	$subject_id=$data_arr["subject_id"];				
	$yesno=$data_arrs["yesno"];				
	$topic=$data_arr["topic"];
	$submission_date=$data_arr["submission_date"];
	$sub_date=date('Y-m-d',strtotime($submission_date));
	$description=$data_arr['description'];
	$student_id = $data_arr['student_id'];
	$file_name=$data_arr['file_name'];
	$file_tmp_name=$data_arr['file_tmp_name'];

	if($yesno=='1')
	{
			$sql="insert into assignment(user_id,student_id,topic,description,class_id,section_id,subject_id,submission_date,curent_date) values('$user_id','','$topic','$description','$class_id','$section_id','$subject_id','$sub_date','$date')";
			$r=mysql_query($sql);
			$time=time();
			$eventid=mysql_insert_id();
		if(!empty($file_tmp_name))
		{		
			$ext=pathinfo($file_name,PATHINFO_EXTENSION);
			$photo=$topic.$time.'.'.$ext;
			move_uploaded_file($file_tmp_name,"assignment/".$photo);
			$r1=mysql_query("update `assignment` set file='$photo' where id='$eventid'");
		}	
			
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
							'notification_id' => $user_idss,
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
				//-------------------------
		}
	else if($yesno=='2')
	{
		$implodestsdnt=implode(',',$student_id);
		$sql1="insert into assignment(user_id,student_id,topic,description,class_id,section_id,subject_id,submission_date,curent_date) values('$user_id','$implodestsdnt','$topic','$description','$class_id','$section_id','$subject_id','$sub_date','$date')";
			$r2=mysql_query($sql1); 
			$time=time();
			$eventid=mysql_insert_id(); 
		if(!empty($file_tmp_name))
		{	
			$ext=pathinfo($file_name,PATHINFO_EXTENSION);
			$photo=$topic.$time.'.'.$ext;
			move_uploaded_file($file_tmp_name,"assignment/".$photo);
			$r4=mysql_query("update `assignment` set file='$photo' where id='$eventid'");
		}	 
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
							'notification_id' => $user_ids,
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
}
		
		
		
	
?> 

<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Work Assignment</title>
<style>
	span {
		font-size: 14px;
	}
</style>
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
						 	<form  id="form_sample_2" method="post" enctype="multipart/form-data">
								<div class="form-body">
								</br>
								<div class="row">
								   <div class="col-sm-6">
										  <div class="form-group">
													<label class=" col-md-3 control-label"><b>Select</b></label>
												<div class="col-md-9">
													<label><input type="radio" name="yesno" checked value="2" class="rd"> Student Wise</label>
													<label><input type="radio"  name="yesno" value="1" class="rd"> Class Wise </label>
													 
												</div>
											</div>
									 </div>
									 
									</div>
								</div>
									 
									<div class="row">
										<div class="col-md-6">
											<div class="form-group"	>
												<label class="col-md-3 control-label"><b>Class</b> <span class="required" aria-required="true"> * </span></label>
												<div class="col-md-3">
													<select name="class_id" id="cls_id" required class="user form-control select2me input-medium" placeholder="Select Class">
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
												<label class="col-md-3 control-label"><b>Section</b> <span class="required" aria-required="true"> * </span></label>
												<div class="col-md-3">
													<select name="section_id" required class="form-control input-medium" placeholder="Select..." >
													<option value="">Select...</option>
													 </select>
												</div>												 
												</div>												 
											</div>
										</div>
										<div class="col-md-offset-6 col-md-5">
											<div class="form-group">
											  <a class="btn btn-xs btn-default addrow" style="float: right;" href="#" role="button">
											  <i class="fa fa-plus"></i> Add row</a>
											</div>
										</div>
									</div>

									
										<table id="other_filds" width="100%">
											
											<tbody>
											
											</tbody>
										</table>
									
										
									<div  align="center" style="margin-top:10px">
										<input  type="submit" class="btn green" name="submit"  value="Submit">
									</div> 
								</div>
							</form>
						</div>
					</div>
</div></div>
<div style="display:none;">
	<table id="bottomTbls" width="100%">
		<tbody id="bottomTbody">
			<tr class="one">
				<td height="100px">
					<div class="col-md-4">
						<span style="text-align:center"><b>Subject </b><span class="required" aria-required="true"> * </span></span>
						<select name="subject_id[]" required class="form-control subject_id input-medium" placeholder="Select Subject" >
							<option value=""> Select...</option>
						</select>
					</div>
				</td>
				<td>
					<div class="col-md-4">
					<span style="text-align:center"><b>Topic </b><span class="required" aria-required="true"> * </span></span>
					<input class="form-control input-medium" required  value="" placeholder="Enter Topic" type="text" name="topic[]">
					</div>
				</td>
				<td>
					<div class="col-md-4">
					<span style="text-align:center"><b>Date</b> <span class="required" aria-required="true"> * </span></span>
					<input class="form-control form-control-inline input-medium date-picker" required  value="" placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy"  name="submission_date[]">
					</div>
				</td>
				<td>
					<div class="col-md-4">
					<a class="btn btn-xs btn-default deleterow red" href="#" role="button"> <i class="fa fa-times"></i>  Remove Row </a>
					</div>
				</td>
			</tr>
			<tr class="two">
				<td>
					<div class="col-md-9">
					<span align="center"><b>Image</b></span>
					<input type="file" class="form-control" name="file[]" id="file1">
					</div>
				</td>
				<td>
					<div class="col-md-4">
					<div class="ifYes student_list">
						<span align="center"><b>Student</b> <span class="required" aria-required="true"> * </span></span>
						<select name="student_id[]" class="form-control select2me input-medium" multiple='multiple' placeholder="Select..." id="student_data" >
							<option value=""></option>
								<?php
									$r1=mysql_query("select `name`,`id` from login where `flag`=0 order by id ASC");		
									$i=0;
									while($row1=mysql_fetch_array($r1))
									{
										$id=$row1['id'];
										$name=$row1['name'];
									?>
										<option value="<?php echo $id;?>">
											<?php echo $name;?>
										</option>                              
							<?php }?> 
						</select>
					</div>
					</div>
				</td>
				<td colspan="2">
					<div class="col-md-4">
					<span align="center"><b>Description</b> <span class="required" aria-required="true"> * </span></span>
					<textarea class="form-control input-medium" rows="1" required placeholder="Discription" type="text" name="description[]"></textarea>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
 </div>
 
 
</html>
</body>

<?php footer();?>
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
		Userchange();
		renameRows();
	});	 

	
	function Userchange()
	{
		var t= $(".user option:selected").val();
		$.ajax({
		url: "ajax_homework.php?pon="+t,
		}).done(function(response) {
			$('#dt').html(response);
			renameRows();
		});
	}
	
	function user1()
	{
		var t=$("#cls_id").val();
		var s=$('.user1 option:selected').val();
		$.ajax({
		url: "ajax_homework.php?pon="+t+"&pon1="+s,
		}).done(function(response) {
			$('table#other_filds tbody tr.one td:eq(0)').html(response);
			$('table#bottomTbls tbody tr.one td:eq(0)').html(response);
			$('table#other_filds tbody tr.two td:eq(1) select').select2();
			renameRows();
		});
	}
	
	
	$(".user1").live("change",function(){
		user1();
		renameRows();
	});	  
	
	$("#cls_id").live("change",function(){
		classChnage();
		renameRows();
	});

	$("#sec_id").live("change",function(){ 
		classSectionChnage();
		renameRows();
	});	
	
	
	function classChnage()
	{
		var class_id=$("#cls_id").val();
		if(class_id != '')
		{		
			$.ajax({
			url: "ajax_homework_student_list.php?class_id="+class_id,
			}).done(function(response) {
			 $('#other_filds tbody tr.two td').find('div.student_list').html(response);
			 renameRows();
			});
		}
	}
	
	function classSectionChnage()
	{
		var class_id=$("#cls_id").val();
		var section_id=$("#sec_id").val();
		if(class_id != '' && section_id != '')
		{		
			$.ajax({
			url: "ajax_homework_student_list.php?class_id="+class_id+"&section_id="+section_id,
			}).done(function(response) { 
			 $('#other_filds tbody tr.two td').find('div.student_list').html(response);
			 renameRows();
			});
		}
	}
	
	
		$('.addrow').live("click",function() {
		add_row();
	});
	add_row();
	function add_row(){
		var tr1=$("#bottomTbls tbody#bottomTbody tr.one").clone();
		var tr2=$("#bottomTbls tbody#bottomTbody tr.two").clone();
		$("#other_filds tbody").append(tr1);
		$("#other_filds tbody").append(tr2);
		
		renameRows();
	}

	$('.deleterow').live("click",function() {
		$(this).closest("tr.one").next("tr.two").remove();
		$(this).closest("tr.one").remove();
		renameRows();
	});	
	
	function renameRows()
	{
		var i=0; var j=0;
		$("#other_filds tbody tr.one").each(function(){
			$(this).find('td:eq(0) select').attr({name:"assignment["+i+"][subject_id]"});
			$(this).find('td:eq(1) input').attr({name:"assignment["+i+"][topic]"});
			$(this).find('td:eq(2) input').attr({name:"assignment["+i+"][submission_date]"}).datepicker();
			i++;
		});	
		
		
		$("#other_filds tbody tr.two").each(function(){
			$(this).find('td:eq(0) input').attr({name:"file[]"});
			$(this).find('td:eq(1) select').attr({name:"assignment["+j+"][student_id][]"}).select2();
			$(this).find('td:eq(2) textarea').attr({name:"assignment["+j+"][description]"});
			j++;
		});
	}
	
});
</script> 
<?php scripts();?>


 
 
