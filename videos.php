<?php
include("index_layout.php");
		include("database.php");
 $session_id=@$_SESSION['id']; 
$message='';
if(isset($_POST['submit']))
{
	$category_id=5;
	$title=mysql_real_escape_string($_POST["title"]);
	$video_url=mysql_real_escape_string($_POST["video_url"]);
	$description=mysql_real_escape_string($_POST["descriptions"]);
 	$curent_date=date("Y-m-d");
 	 
	$sql="insert into videos(user_id,title,description,video_url,curent_date)values('$session_id','$title','$description','$video_url','$curent_date')";
	$r=mysql_query($sql);
 	$insert_id=mysql_insert_id();
	$message = "Video Added Successfully.";
}
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>News</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Videos
							</div>
							<div class="tools">
								<a class="" href="view_videos.php" style="color: white"><i class="fa fa-search"> View </i></a>
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
										<label class="col-md-3 control-label">Descriptions</label>
										<div class="col-md-4">
											<textarea class="form-control" placeholder="Descriptions" type="text" name="descriptions"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Video URL</label>
										<div class="col-md-4">
											<textarea class="form-control" placeholder="http://www.youtube.com/" type="text" name="video_url"></textarea>
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

