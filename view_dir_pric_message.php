<?php
 include("index_layout.php");
 include("database.php");
 require_once('ImageManipulator.php');
 $user=$_SESSION['category'];

if(isset($_POST['sub_del']))
	{
		$delet_Message=$_POST['delet_Message'];
		mysql_query("update `director_principle_message` SET `flag`='1' where id='$delet_Message'" );
		@header('Location:dir_princ_meaasge.php'); 
	}
	if(isset($_POST['sub_edit']))
	{
		$edit=$_REQUEST['edit_id'];  
		$sms_sender_role=mysql_real_escape_string($_REQUEST["sms_sender_role"]);
		$sms_receive_role=mysql_real_escape_string($_REQUEST["sms_receive_role"]);
		$message1=mysql_real_escape_string($_REQUEST["message"]);
		
 
		$r=mysql_query("update `director_principle_message` SET `sms_sender_role`='$sms_sender_role',`sms_receive_role`='$sms_receive_role',`message`='$message1' where id='$edit'" );
		$r=mysql_query($r);
		
		
			 $fil_name =	$_FILES['fileToUpload']['tmp_name'];		
			if(!empty($fil_name))
			{
				
				$validExtensions = array('.jpg', '.jpeg', '.gif', '.png');
				 $fileExtension = strrchr($_FILES['fileToUpload']['name'], ".");			
				if (in_array($fileExtension, $validExtensions)) 
				{
					$newNamePrefix = uniqid();
					$manipulator = new ImageManipulator($_FILES['fileToUpload']['tmp_name']);
					$newImage = $manipulator->resample(640, 360);
					$_FILES['fileToUpload']['name'];		
					
					$manipulator->save('message/' . $newNamePrefix . $_FILES['fileToUpload']['name']);
					$insert_path=$newNamePrefix.$_FILES['fileToUpload']['name'];
					$sql1="update `director_principle_message` set `pic`='$insert_path' where `id`='$edit'"; 
					$rl=mysql_query($sql1);

				}  
			
		echo '<script text="javascript">alert(Message Update Successfully")</script>';	
			}
			
	}

  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Event</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i> View Message
					</div>
				<div class="tools">
					<a class="" href="dir_princ_meaasge.php" style="color:white"><i class="fa fa-plus">&nbsp;Add Message</i></a>
					</div>
				</div>
				<div class="portlet-body form">
					
						<div class="form-body">
						<form class="form-horizontal" role="form" id="form_sample_2" method="post" enctype="multipart/form-data">
						<div class="row col-md-12">
							<div class="form-group col-md-6">
								<label class="control-label col-md-3">Select Date</label>
								<div class="col-md-4">
									<div class="input-group input-large date-picker input-daterange" data-date-format="dd-mm-yyyy">
										<input type="text" class="form-control" id="from">
										<span class="input-group-addon">
										to </span>
										<input type="text" class="form-control" id="to">
									</div>
								</div>
							</div>
							<div class="form-group col-md-4">
								<label class="col-md-3 control-label" style="text-align:right">Select</label>
								<div class="col-md-4">
									<select name="role_id" class="form-control select2me input-medium" placeholder="Select..." id="view_u">
										<option value=""></option>
										<?php
										$r1=mysql_query("select * from master_role where id=1 OR id=4 OR id=5");		
										$i=0;
										while($row1=mysql_fetch_array($r1))
										{
											$id=$row1['id'];
											$role_name=$row1['role_name'];
										?>
										<option value="<?php echo $id;?>"><?php echo $role_name;?></option>                              
									<?php }?> 
									</select>
								</div>
							</div>
							<div class="form-group col-md-2" style="margin-left:50px">
								<button class="btn btn blue view_u" type="button">Go</button>
							</div>
						</div>
						</br>
						</br>
						</br>
						</form>
						<center>
						<div id="data" class="scroller" style="height:400px; padding-top:5px"  data-always-visible="1" data-rail-visible="0">
						
						</div>
						</center>
			</div>
		
</div></div>
</div></div></div>
</body>

<?php footer();?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){    
	$(".view_u").die().live("click",function(){
			$("#data").html("<img height='50px' src='img/loading.gif'/>");
			var view_u=$("#view_u").val();
			var to=$("#to").val();
			var from=$("#from").val();
			if(view_u.length>0){}else{ view_u='';}
			if(to.length>0){}else{ to='';}
			if(from.length>0){}else{ from='';}
			 
			$.ajax({
				url: "ajax_view_dir_pric.php?view_u="+view_u+"&to="+to+"&from="+from,
				}).done(function(response) {
					$("#data").html(""+response+"");
				});
			});
});
</script>
<?php scripts();?>

</html>

