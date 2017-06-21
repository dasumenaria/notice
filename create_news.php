<?php
 include("index_layout.php");
 include("database.php");
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
	$file_upload='noimage.png';
	$newsid=mysql_insert_id();
	$n_name='news';
	$folderName2=$n_name.$newsid;
	$directoryPath = "news/".$folderName2;
	mkdir($directoryPath, 0777);
		if(!empty($file_name))
		{
			@$file_name=$_FILES["image"]["name"];
			$file_tmp_name=$_FILES['image']['tmp_name'];
			$target ="news/".$folderName2."/";
			$file_name=strtotime(date('d-m-Y h:i:s'));
			$filedata=explode('/', $_FILES["image"]["type"]);
			$filedata[1];
			$random=rand(100, 10000);
			$target=$target.basename($random.$file_name.'.'.$filedata[1]);
			move_uploaded_file($file_tmp_name,$target);
			$item_image=$random.$file_name.'.'.$filedata[1];
		}
		else
		{
			$item_image='no_image.png';
		}
		$xsql=mysql_query("update `news` SET `featured_image`='$item_image' where id='".$newsid."'" );
		$xsqlr=mysql_query($xsql);    
		$message = "News Add Successfully.";
		
		header("Location:create_news.php");  
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
			
			
			<div class="portlet box">
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
                       <!-- <input id="alert_message" type="text" class="form-control" value="some alert text goes here..." placeholder="enter a text ...">-->
<div class="message" id="success" style="color:#44B6AE; text-align:center"><label class="control-label"><?php echo $message; ?></label></div>
<?php } ?>
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
								
							  <div class="form-group">
										<label class="col-md-3 control-label">Select Role</label>
										<div class="col-md-3">
                                        <select name="role_id" class="form-control select select2 select2me input-medium" placeholder="Select..." id="sid">
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
										<label class="col-md-3 control-label">News Title</label>
										<div class="col-md-3">
											<input class="form-control input-md" required placeholder="Title" type="text" name="news_title">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">News Details</label>
										<div class="col-md-3">
										<textarea class="form-control input-md" required placeholder="Details" type="text" name="news_details"></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">News Date</label>
										
										<div class="col-md-3">
											<input class="form-control form-control-inline input-md date-picker" required  value="<?php echo date("d-m-Y"); ?>" placeholder="dd/mm/yyyy" data-date-format="dd-mm-yyyy" type="text" name="news_date">
											
										</div>
										
										
									</div>
									<div class="form-group">
                              <label class="control-label col-md-3">Cover Image</label>
                            
                                            <div class=" col-md-3 fileinput fileinput-new" style="padding-left: 15px;" data-provides="fileinput">
                                                <div class="col-md-10 fileinput-new thumbnail" style="width: 200px;  height: 150px;">
                                                    <img src="img/noimage.png" style="width:100%;" alt=""/>
                                                </div>
                                                <div class="col-md-3 fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="btn default btn-file addbtnfile" style="background-color:#00CCFF; color:#FFF">
                                                    <span class="fileinput-new">
                                                    <i class="fa fa-plus"></i> </span>
                                                    <span class="fileinput-exists">
                                                    <i class="fa fa-plus"></i> </span>
                                                    <input type="file" class="default" name="image" id="file1">
                                                    </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput" style=" color:#FFF">
                                                    <i class="fa fa-trash"></i> </a></div>
                                                </div>
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

