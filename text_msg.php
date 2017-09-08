<?php
date_default_timezone_set('asia/kolkata');
 include("index_layout.php");
 include("database.php");
  $faculty_login_id=$_SESSION['id'];
	$role=$_SESSION['category'];
	$message ='';
	if(isset($_POST['submit'])) 
	{
		$message=$_POST['message'];
		$date_from=date('Y-m-d');
		if(!empty($_FILES["photo"]["name"]))
		{
			@$file_name=$_FILES["photo"]["name"];
			$file_tmp_name=$_FILES['photo']['tmp_name'];
			$target ="text_message/"; 
			$filedata=explode('/', $_FILES["photo"]["type"]); 
			$random=rand(100, 10000);
			$target=$target.basename($random.'.'.$filedata[1]);
			move_uploaded_file($file_tmp_name,$target);
			$item_image=$random.'.'.$filedata[1];
			//echo "insert into `text_message` set `text`='$message',`date`='$date_from',`text_image`='$item_image' " ; exit;
			mysql_query("insert into `text_message` set `text`='$message',`date`='$date_from',`text_image`='$item_image' ");
		}
		else
		{
			mysql_query("insert into `text_message` set `text`='$message' , `date`='$date_from' ");
		}
		$message='Text insert successfully';	
	}
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Text Message</title>
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
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Text Message
							</div>
							 
						</div>
						<div class="portlet-body form">
							<div class="form-body">
                              	<div class="scroller">
								   <?php if($message){ ?>
                                   <div id="success">
                                        <div class="alert alert-success">
                                            <strong><?php echo $message; ?></strong> 
                                        </div>
                                   </div>
                                    <?php } ?> 
                               <form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-md-3 control-label">Image</label>
										<div class="col-md-6">
											<input type="file" class="form-control input-md" name="photo">
										</div>
									</div>
                                    <div class="form-group">
										<label class="col-md-3 control-label">Message</label>
										<div class="col-md-6">
											<textarea class="form-control input-md" rows="4" maxlength="30" required type="text" name="message"></textarea>
										</div>
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
<?php scripts();?>
<script>
	 
	var myVar=setInterval(function(){myTimerr()},4000);
	function myTimerr() 
	{
		$("#success").hide();
	}
	
 </script>
</html>