\<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];
 $user_id=$_SESSION['id'];
  $get_id=$_GET['id'];
 $message="";
 
 $n_name='news/news';
 $exact_folderName=$n_name.$get_id;
 
if(isset($_POST['update_submit']))
{
	$category_id=5;
	$news_title=mysql_real_escape_string($_REQUEST["news_title"]);
	$news_details=mysql_real_escape_string($_REQUEST["news_details"]);
	$role_id=mysql_real_escape_string($_REQUEST["role_id"]);
	$news_date1=mysql_real_escape_string($_REQUEST["news_date"]);
	 @$k_image=$_REQUEST["k_image"];
	$news_date=date('Y-m-d',strtotime($news_date1));
	$curent_date=date("Y-m-d");
	@$file_name=$_FILES["image"]["name"];
	
	$n_name='news';
	$folderName2=$n_name.$get_id;
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
					else{
					$item_image=$k_image;
					}
					
					
	$r=mysql_query("update `news` SET `title`='$news_title',`description`='$news_details',`date`='$news_date',`user_id`='$user_id',`category_id`='$category_id',`role_id`='$role_id',`featured_image`='$item_image' where id='".$get_id."'" );
	
	$message = "News Update Successfully.";
   }
	 
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update News</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Update News
							</div>
							<div class="tools">
							<a class="" href="view_news.php" style="color: white"><i class="fa fa-search"> News View List</i></a>
								<!--<a href="" class="collapse" data-original-title="" title="">
								</a>-->
								
							</div>
						</div>
						<div class="portlet-body form">
						<?php if($message!="") { ?>
                       <!-- <input id="alert_message" type="text" class="form-control" value="some alert text goes here..." placeholder="enter a text ...">-->
<div class="message" id="success" style="color:#44B6AE; text-align:center"><label class="control-label"><?php echo $message; ?></label></div>
<?php } ?>
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
								
								
								 <?php
			  $r1=mysql_query("select * from news where flag='0' AND id='".$get_id."' ");		
					$i=0;
					$row1=mysql_fetch_array($r1);
					$i++;
					$id=$row1['id'];
					$news_title=$row1['title'];
                    $news_details=$row1['description'];
					$news_date=$row1['date'];
					$role_id=$row1['role_id'];
                    $news_pic=$row1['featured_image'];
					if($news_date=='0000-00-00')
					{	$news_date='';}
					else
					{ $news_date=date("d-m-Y", strtotime($news_date)); }
					?>
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
								<option value="<?php echo $id;?>" <?php if($id==$role_id){ echo "selected";}?>><?php echo $role_name;?></option>                              
								<?php }?> 
								<select/>
								</div>
								</div>
								
								
									<div class="form-group">
										<label class="col-md-3 control-label">News Title</label>
										<div class="col-md-3">
											<input class="form-control input-md" required placeholder="Title" type="text" value="<?php echo $news_title;?>" name="news_title">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">News Details</label>
										<div class="col-md-3">
										<textarea class="form-control input-md" required placeholder="Details" type="text" name="news_details"><?php echo $news_details;?></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">News Date</label>
										
										<div class="col-md-3">
											<input class="form-control form-control-inline input-md date-picker" required  value="<?php echo $news_date;?>" placeholder="dd/mm/yyyy" type="text" 
                                            data-date-format="dd-mm-yyyy" type="text" name="news_date">
											
										</div>
										
										
									</div>
									<div class="form-group">
                              <label class="control-label col-md-3">Cover Image</label>
                            
                                            <div class=" col-md-3 fileinput fileinput-new" style="padding-left: 15px;" data-provides="fileinput">
                                                <div class="col-md-10 fileinput-new thumbnail" style="width: 200px;  height: 150px;">
                                                    <img src="<?php echo $exact_folderName;?>/<?php echo $news_pic;?>" style="width:100%;" alt=""/>
                                                </div>
                                                <div class="col-md-3 fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="btn default btn-file addbtnfile" style="background-color:#00CCFF; color:#FFF">
                                                    <span class="fileinput-new">
                                                    <i class="fa fa-plus"></i> </span>
                                                    <span class="fileinput-exists">
                                                    <i class="fa fa-plus"></i> </span>
													 <input type="hidden" class="default" name="k_image" value="<?php echo $image;?>" id="">
                                                    <input type="file" class="default" name="image" id="file1">
                                                    </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput" style=" color:#FFF">
                                                    <i class="fa fa-trash"></i> </a></div>
                                                </div>
												</div>
									
								</div>
								<div class=" right1" align="center" style="margin-right:10px">
									<button type="submit" class="btn green" name="update_submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
			</div></div>
</body>
<?php footer();?>
<script>
var myVar=setInterval(function(){myTimerr()},4000);
		function myTimerr() 
		{
			$("#success").hide();
		} 
</script>


<?php scripts();?>

</html>

