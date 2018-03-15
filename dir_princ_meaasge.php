<?php
 include("index_layout.php");
 include("database.php");
 require_once('ImageManipulator.php'); 
 $role_id = $_SESSION['category']; 
 $login_id=$_SESSION['id']; 
 $user_id=$_SESSION['id'];
 $update_id=0;

 
  $message='';
	if(isset($_POST['submit'])) 
	{
		$text_messgae=$_POST['text_messgae'];
		$sms_to_role=$_POST['sms_to_role'];
		$sms_from_role=$_POST['sms_from_role'];
		$crnt_date=date('Y-m-d');
		mysql_query("insert into `director_principle_message` set `message`='$text_messgae' , `sms_receive_role`='$sms_to_role' , `sms_sender_role`='$sms_from_role',`login_id`='$login_id', `current_date`='$crnt_date'");
		$update_id=mysql_insert_id();
		$message='SMS send successfully';		
	
		if ($_FILES['fileToUpload']['error'] > 0) 
		{	
			echo "Error: " . $_FILES['fileToUpload']['error'] . "<br />";
		}
		else 
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
					$sql1="update `director_principle_message` set `pic`='$insert_path' where `id`='$update_id'"; 
					$rl=mysql_query($sql1);

				}  
			}
	}
	  
	



  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Director Principal Message</title>
</head>
<style>
span {
	    padding: 3px !important;
}
</style>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Director Principal Message
							</div>
							<div class="tools">
						<a class="" href="view_dir_pric_message.php" style="color:white"><i class="fa fa-plus">&nbsp;View Message</i></a>
</div>					
						</div>
						<div class="portlet-body form">
<?php if($message!="") { ?>
<div id="success" class="alert alert-success" style="margin-top:10px; width:50%">
<?php echo $message; ?>
</div>
<?php } ?>
							<div class="form-body">
								<div class="scroller"   data-always-visible="1" data-rail-visible="0">
								   
                               <form class="form-horizontal" role="form" id="form_sample_2" method="post" enctype="multipart/form-data">
                               		
                                    <div class="form-group">
										<label class="col-md-3 control-label">Message From <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-6">
                                            <select name="sms_from_role" class="form-control select2me " required placeholder="Select..." id="role_id">
                                                <option value=""></option>
                                                    <?php
                                                    $r1=mysql_query("select * from master_role where id=2 OR id=3");		
                                                    $i=0;
                                                    while($row1=mysql_fetch_array($r1))
                                                    {
                                                        $role_id=$row1['id'];
                                                        $role_name=$row1['role_name'];
                                                        ?>
                                                        <option value="<?php echo $role_id;?>"><?php echo $role_name;?></option>                              
                                                    <?php 
                                                    }?> 
                                            </select>
										</div>
                                    </div>
                               		<div class="form-group">
										<label class="col-md-3 control-label">Message To <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-6">
                                            <select name="sms_to_role" required class="form-control select2me " placeholder="Select..." id="sid">
                                                <option value=""></option>
                                                    <?php
                                                    $r1=mysql_query("select * from master_role where id=1 OR id=4 OR id=5");		
                                                    $i=0;
                                                    while($row1=mysql_fetch_array($r1))
                                                    {
                                                        $id=$row1['id'];
                                                        $role_name=$row1['role_name'];
                                                        ?>
                                                        <option value="<?php echo $id;?>"><?php echo $role_name;?></option> <?php 
                                                    }?> 
                                            </select>
										</div>
                                    </div>
                                    <div class="form-group">
										<label class="col-md-3 control-label">Message <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-6">
											<textarea class="form-control input-md" required type="text" name="text_messgae"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Images </label>
										<input type="file" class="form-control input-large" name="fileToUpload" />
									</div>
									<div class=" right1" align="center">
                                        <button type="submit" class="btn green formsubmit" name="submit" >Submit</button>
                                    </div>
                               </form> 
							   
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
</body>
 
<?php footer();?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
<?php if($update_id>0){?>
	var update_id = <?php echo $update_id; ?>;
	$.ajax({
		url: "notification_page.php?function_name=principle_director_message&id="+update_id,
		type: "POST",
		success: function(data)
		{
		}
	});
<?php }?>



	var myVar=setInterval(function(){myTimerr()},4000);
	function myTimerr() 
	{
		$("#success").hide();
	}
 	
	
 </script>
 <?php scripts();?>
</html>