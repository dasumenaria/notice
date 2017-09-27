<?php
include("index_layout.php");
		include("database.php");
 $session_id=@$_SESSION['id']; 
$message='';
if(isset($_POST['submit']))
{
	$category_id=5;
	$title=mysql_real_escape_string($_POST["title"]);
 	$curent_date=date("Y-m-d");
	@$file_name=$_FILES["image"]["name"];
	$user_id=$_SESSION['id'];
 	 
		mkdir($directoryPath, 0777);
		if(!empty($file_name))
		{
			@$file_name=$_FILES["image"]["name"];
			$file_tmp_name=$_FILES['image']['tmp_name'];
			$target ="audio/";
			$file_name=strtotime(date('d-m-Y h:i:s'));
			$filedata=explode('/', $_FILES["image"]["type"]);
			$filedata[1];
			$random=rand(100, 10000);
			$target=$target.basename($random.$file_name.'.'.$filedata[1]);
			move_uploaded_file($file_tmp_name,$target);
			$audio_name=$random.$file_name.'.'.$filedata[1];
		}else
		{
			$audio_name='no_image.png';
		}
	 
	 
	mysql_query("insert into `audio` SET `title`='$title',`audio_name`='$audio_name',`user_id`='$user_id'");
	$message = "Audio Added Successfully.";
}
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Audio</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Audios
							</div>
							<div class="tools">
								<a class="" href="audio_view.php" style="color: white"><i class="fa fa-search"> View </i></a>
 							</div>
						</div>
						<div class="portlet-body form">
<?php if($message!="") { ?>
<div id="success" class="alert alert-success" style="margin-top:10px; width:50%">
<?php echo $message; ?>
</div>
<?php } ?>
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Title</label>
										<div class="col-md-4">
											<input class="form-control" required placeholder="Title" type="text" name="title">
										</div>
									</div>
									 
									<div class="form-group">
										<label class="col-md-3 control-label">Audio</label>
										<div class="col-md-4">
											<input type="file" required="" name="image">
										</div>
									</div>
								<div class=" right1" align="center">
									<button type="submit" class="btn green" name="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
			</div></div>
</body>
<?php footer(); ?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<script>
<?php if($insert_id>0){ ?>
var update_id = <?php echo $insert_id; ?>;
	$.ajax({
		url: "notification_page.php?function_name=create_videos_notifys&id="+update_id,
		type: "POST",
		success: function(data)
		{   
		}
});
<?php } ?>
var myVar=setInterval(function(){myTimerr()},4000);
function myTimerr() 
{
	$("#success").hide();
} 
</script>


<?php scripts();?>

</html>

