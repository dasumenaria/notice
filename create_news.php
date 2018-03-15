<?php
include("index_layout.php");
include("database.php");
require_once('ImageManipulator.php'); 
$session_id=@$_SESSION['id']; 
$message='';
if(isset($_POST['submit']))
{
	$category_id=5;
	$news_title=mysql_real_escape_string($_REQUEST["news_title"]);
	$news_details=mysql_real_escape_string($_REQUEST["news_details"]);
	$role_id=mysql_real_escape_string($_REQUEST["role_id"]);
	$news_date1=mysql_real_escape_string($_REQUEST["news_date"]);
	$news_date=date('Y-m-d',strtotime($news_date1));
	$curent_date=date("Y-m-d");
	@$file_name=$_FILES["image"]["name"];
	$sql="insert into news(user_id,title,description,date,category_id,curent_date,role_id)values('$session_id','$news_title','$news_details','$news_date','$category_id','$curent_date','$role_id')";
	$r=mysql_query($sql);
 	$newsid=mysql_insert_id();
	$n_name='news';
	$folderName2=$n_name.$newsid;
	$directoryPath = "news/".$folderName2;
	mkdir($directoryPath, 0777);
	if(!empty($file_name))
	{
 		$filedata=explode('/', $_FILES["image"]["type"]);
		$filedata[1];
		$newNamePrefix = rand(100, 10000); 
		$manipulator = new ImageManipulator($_FILES['image']['tmp_name']);
		$newImage = $manipulator->resample(640, 360);
		$manipulator->save("news/".$folderName2."/" . $newNamePrefix .".". $filedata[1]);
		$insert_path=$newNamePrefix.".".$filedata[1];
 	}
	else
	{
		$insert_path='no_image.png';
	}
	$xsql=mysql_query("update `news` SET `featured_image`='$insert_path' where id='".$newsid."'" );
	$xsqlr=mysql_query($xsql);    
	$message = "News Add Successfully.";
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
								<i class="fa fa-gift"></i> News
							</div>
							<div class="tools">
								<a class="" href="view_news.php" style="color: white"><i class="fa fa-search"> News View List </i></a>
 							</div>
						</div>
						<div class="portlet-body form">
<?php if($message!="") { ?>
<div id="success" class="alert alert-success" style="margin-top:10px; width:50%">
<?php echo $message; ?>
</div>
<?php } ?>
							<form class="form-horizontal" role="form" id="form_sample_2" method="post" enctype="multipart/form-data">
								<div class="form-body">
								
							  <div class="form-group">
										<label class="col-md-3 control-label">Select Role <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-4">
                                        <select name="role_id" class="form-control select2me " required placeholder="Select..." id="sid">
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
 									<div class="form-group">
										<label class="col-md-3 control-label">News Title <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-4">
											<input class="form-control input-md" required placeholder="Title" type="text" name="news_title">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">News Details <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-4">
										<textarea class="form-control input-md" required placeholder="Details" type="text" name="news_details"></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">News Date <span class="required" aria-required="true"> * </span></label>
										
										<div class="col-md-4">
											<input class="form-control form-control-inline input-md date-picker" required  value="<?php echo date("d-m-Y"); ?>" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" type="text" name="news_date">
											
										</div>
										
										
									</div>
									<div class="form-group">
                                      <label class="control-label col-md-3">Cover Image <span class="required" aria-required="true"> * </span></label>
                                        <div class=" col-md-4">
                                            <input type="file" class="default form-control" required name="image" id="file1">
                                        </div>
									
								</div>
								<div class=" right1" align="center" style="margin-right:10px">
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
<?php if($newsid>0){ ?>
var update_id = <?php echo $newsid; ?>;
	$.ajax({
		url: "notification_page.php?function_name=create_news_notifys&id="+update_id,
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

