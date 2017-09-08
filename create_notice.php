<?php
include("index_layout.php");
include("database.php");
	$session_id=@$_SESSION['id']; 
	$user_id=$_SESSION['id'];
	$category=$_SESSION['category'];
	$e_id=0;
	$message="";
	$category_id=6;

	if(isset($_POST['submit']))
	{
	$noticenum=$_POST['noticenum'];
	$notice_no=$_POST['notice_no'];
	$title=$_POST['title'];
	$description=$_POST['description'];
	$dateofpublish1=$_POST['dateofpublish'];
	$dateofpublish=date('Y-m-d',strtotime($dateofpublish1));
	$curent_time=date("h:i A");
	$s=isset($_POST['shareable']);
	if(!empty($s))
	{
		$shareable=$s;
	}
	else
	{
		$shareable='0';
	}
	$curent_date=date("Y-m-d");
	@$class_id=$_POST['class_id'];
	$class='';
	if(!empty($class_id))
	{
		$class=implode(',',$class_id);
	}

	$sql="INSERT INTO `notice`(`role_id`,`notice_no`, `title`, `description`, `time`, `dateofpublish`, `class_id`,`user_id`,`shareable`,`category_id`,`curent_date`) VALUES ('".$category."','".$notice_no."','".$title."','".$description."','".$curent_time."','".$dateofpublish."','".$class."','".$session_id."','".$shareable."','".$category_id."','".$curent_date."')";
	$res=mysql_query($sql);
	$update_id=mysql_insert_id();
	$message="Notice Successfully Created";
		if($_FILES["image"]["tmp_name"])
		{	
			@$filename =$_FILES["image"]["name"];
			@$ext = pathinfo($filename, PATHINFO_EXTENSION);  
			if($ext == 'pdf' )
			{ 
				$photo1="notice".$update_id.".pdf";
				if(move_uploaded_file($_FILES["image"]["tmp_name"],"notice/".$photo1))
				{
					$r=mysql_query("update notice set file_name='$photo1' where id='$update_id'");
				}
			}	
		}
  
	
}

?>
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<?php contant_start(); menu();  ?>
<body> 
	<div class="page-content-wrapper">
		 <div class="page-content">
<?php if($message!="") { ?>
<div id="success" class="alert alert-success" style="margin-top:10px; width:50%">
<?php echo $message; ?>
</div>
<?php } ?>
						<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Notice
							</div>
							<div class="tools">
							<a class="" href="view_notice.php" style="color: white"><i class="fa fa-search">View Notice List</i></a>
							
							</div>
						</div>
						<div class="portlet-body form">
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
									
									
									<div class="form-group">
						   <label class="control-label col-md-3">Notice Number</label>
						   
										 <?php //if($_GET['categoryselect']==2 || $_GET['categoryselect']==3) {
						$last_id=mysql_query("select count(id) as id from `notice`") ;
						$r=mysql_fetch_array($last_id);
						$ticket_num=$r['id'];
						$naxtyear=date("Y");
						$naxtyear=$naxtyear+1;
                           ?>
						   <input type="hidden" value="<?php echo $ticket_num+1;?>" name="noticenum">
						   <div class="col-md-3">
						   <input class="form-control input-md" type="text" name="notice_no" value="<?php echo 'CBA/'.date("Y").'-'.$naxtyear.'/A/';?><?php echo $ticket_num+1;?>" readonly/></b>
						   </div>
                           <?php //} ?>
						   </div>
									<div class="form-group">
										<label class="col-md-3 control-label">Title</label>
										<div class="col-md-3">
										<input class="form-control input-medium" required placeholder="Title" type="text" name="title">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Description</label>
										<div class="col-md-3">
										<input class="form-control input-medium" required placeholder="Description" type="text" name="description">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Date of Publish</label>
										
										<div class="col-md-3">
											<input class="form-control form-control-inline input-md date-picker" required  value="<?php echo date("d-m-Y"); ?>" placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy"  name="dateofpublish">
											
										</div>
									</div>
									
									<div class="form-group">
												<label class="control-label col-md-2"></label>
											<div class="col-md-1">
											<div class="input-group">
											<input type="checkbox" class="form-control" name="shareable" value="yes">
											</div>
											</div>
											<div class="col-md-3">
											<div class="input-group">
											<span align="left">Click Here For Shareable.</span>
											</div>
											</div>
									</div>
									<div class="form-group">
                              <label class="control-label col-md-3">Send To:</label>
                                            
											<div class="form-group">
											<div class="col-md-3">
											 
									<div class="control-group" id="branchselect" >
										<div class="controls">
										<?php 
										$sql="select distinct(class_name),id from master_class";
										$res=mysql_query($sql) or die(mysql_error());
										$count=0;
										while($result=mysql_fetch_array($res)) { $count++; 				
										
										 if($count==4){ $count=1;?><?php } 
												?>
										<td class="checkbox">
										<label><input type="checkbox" value="<?php echo $result['id']; ?>" id="<?php echo $result['class_name']; ?>" name="class_id[]" /><?php echo $result['class_name']; ?></label>
										</td>
										<?php
										}
										?>
										</div>
									</div>
								</div></div></div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">Upload PDF</label>
										<div class="col-md-3">
											
											<input type="file" class="default" name="image" id="file1">
												
										</div>
									</div>
									
									
								</div>
							</div>
								 
						</br>
 								<div class="" align="center" style="margin-right:10px">
									<button type="submit" class="btn green" name="submit">Submit</button>
								</div>
								</div>
							</form>
						</div>
					</div>
			</div></div>
</body>
<?php footer();?>

<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
<?php if($update_id>0){?>
		var update_id = <?php echo $update_id; ?>;
		$.ajax({
			url: "notification_page.php?function_name=notice&id="+update_id,
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

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<script>
$(document).ready(function(){    
	 $("#bw").live("click",function(){
			if($(this).prop("checked") == true){
			$("#branchselect").show();
			}
			else if($(this).prop("checked") == false){
				$("#branchselect").hide();
			}
        });
		$("#mw").live("click",function(){
		   if($(this).prop("checked") == true){
			 $("#mediumselect").show();
			}
			else if($(this).prop("checked") == false){
				$("#mediumselect").hide();
			}
		});
	});	
</script>
<?php scripts();?>
</html>

