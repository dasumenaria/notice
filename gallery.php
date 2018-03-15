<?php
include("index_layout.php");
include("database.php");
require_once('ImageManipulator.php'); 
$user=$_SESSION['category'];
$message="";
$insert_id=0;
if(isset($_POST['submit']))
{
	$type=mysql_real_escape_string($_REQUEST["category_id"]);
	$event_id=mysql_real_escape_string($_REQUEST["event_id"]); 
	$news_id=mysql_real_escape_string($_REQUEST["news_id"]);
	if(!empty($event_id) || !empty($news_id))
	{
		if($type==4)
		{
			$r1=mysql_query("select * from gallery where event_news_id='$event_id' AND category_id='$type'");		
			$row1=mysql_fetch_array($r1);
			$message="Images Added Successfully";
			$e_id=$row1['id'];
			if(!empty($row1))
			{
					$n_name='event';
					$folderName2=$n_name.$event_id;
					$directoryPath = $n_name."/".$folderName2;
					mkdir($directoryPath, 0777);
					$gallery_pic=array_filter($_FILES["gallery_pic"]["tmp_name"]);
					$o=sizeof($gallery_pic);  
					$gp=0;
				
					for($j=0; $j<$o; $j++)
					{
						$newNamePrefix = rand(100, 10000).$e_id;
						$gp=$gallery_pic[$j];
						$manipulator = new ImageManipulator($gp);
						$newImage = $manipulator->resample(640, 360);
						$manipulator->save("event/".$folderName2."/" . $newNamePrefix . ".jpg");
						$insert_path=$newNamePrefix.".jpg";
						$sql1="insert into sub_gallery(gallery_id,gallery_pic)values('$e_id','$insert_path')"; 
						$rl=mysql_query($sql1);
					}	
			}
			else
			{
				$sql="insert into gallery(event_news_id,category_id)values('$event_id','$type')";
				$r=mysql_query($sql);
				$ids=mysql_insert_id();
				$n_name='event';
				$folderName2=$n_name.$event_id;
				$directoryPath = $n_name."/".$folderName2;
				mkdir($directoryPath, 0777);
				$gallery_pic=array_filter($_FILES["gallery_pic"]["tmp_name"]);
				$o=sizeof($gallery_pic);
				$gp=0;
				for($j=0; $j<$o; $j++)
				{
					 
					$newNamePrefix = rand(100, 10000).$ids;
					$gp=$gallery_pic[$j];
					$manipulator = new ImageManipulator($gp);
					$newImage = $manipulator->resample(640, 360);
					$manipulator->save("event/".$folderName2."/" . $newNamePrefix .".jpg");
					$insert_path=$newNamePrefix.".jpg";
					$sql1="insert into sub_gallery(gallery_id,gallery_pic)values('$ids','$insert_path')"; 
					$rl=mysql_query($sql1);

				}
			}
		}
		else if($type==5)
		{

		$r1=mysql_query("select * from gallery where event_news_id='$news_id' AND category_id='$type'");		
		$row1=mysql_fetch_array($r1);
		$countt=mysql_num_rows($r1);
		$e_id=$row1['id'];;
			if($countt>0)
			{
				$n_name='news';
				$folderName2=$n_name.$news_id;
				$directoryPath = $n_name."/".$folderName2;
				mkdir($directoryPath, 0777);
				$gallery_pic=array_filter($_FILES["gallery_pic"]["tmp_name"]);
				$o=sizeof($gallery_pic);
				$gp=0;
				for($j=0; $j<$o; $j++)
				{
					$newNamePrefix = rand(100, 10000).$e_id;
					$gp=$gallery_pic[$j];
					$manipulator = new ImageManipulator($gp);
					$newImage = $manipulator->resample(640, 360);
					$manipulator->save("news/".$folderName2."/" . $newNamePrefix . ".jpg");
					$insert_path=$newNamePrefix.".jpg";
					$sql1="insert into sub_gallery(gallery_id,gallery_pic)values('$e_id','$insert_path')"; 
					$rl=mysql_query($sql1);
				}	
			}
			else
			{
				$sql="insert into gallery(event_news_id,category_id)values('$news_id','$type')";
				$r=mysql_query($sql);
				$ids=mysql_insert_id();
				$n_name='news';
				$folderName2=$n_name.$news_id;
				$directoryPath = $n_name."/".$folderName2;
				mkdir($directoryPath, 0777);
				$gallery_pic=array_filter($_FILES["gallery_pic"]["tmp_name"]);
				$o=sizeof($gallery_pic);
			   $gp=0;
				for($j=0; $j<$o; $j++)
				{
					$newNamePrefix = rand(100, 10000).$ids;
					$gp=$gallery_pic[$j];
					$manipulator = new ImageManipulator($gp);
					$newImage = $manipulator->resample(640, 360);
					$manipulator->save("news/".$folderName2."/" . $newNamePrefix . ".jpg");
					$insert_path=$newNamePrefix.".jpg";
					$sql1="insert into sub_gallery(gallery_id,gallery_pic)values('$ids','$insert_path')"; 
					$rl=mysql_query($sql1);
				}
			}	
			$message="Images Added Successfully";
		}
	}
	else
	{
		$message="Error to upload image";
	}
 }   
?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery</title>

<style>
.form-horizontal .radio > span{
	margin-top:-3px !important;
}
</style>

</head>
<?php contant_start(); menu();  ?>
<body>
<div class="page-content-wrapper">
 <div class="page-content">
	<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-gift"></i> Gallery
		</div>
		<div class="tools">
		<a class="" href="view_gallery.php" style="color: white"><i class="fa fa-search">View Gallery </i></a>
		 
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
										<label class="col-md-3 control-label">Select Category <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-5">
                                        <select name="category_id" class="form-control select select2 select2me " placeholder="Select..." id="category_id" required>
                                         <option value=""></option>
                                            <?php
                                            $r1=mysql_query("select * from master_category where id=4 OR id=5");		
                                            $i=0;
                                            while($row1=mysql_fetch_array($r1))
                                            {
                                            $id=$row1['id'];
                                            $category_name=$row1['category_name'];
                                            ?>
										<option value="<?php echo $id;?>"><?php echo $category_name;?></option>                              
									<?php }?> 
								  <select/>
								</div>
							</div>
								
								
									<div class="form-group" id="e_idtext" style="display:none">
									<label class="col-md-3 control-label">Event Name <span class="required" aria-required="true"> * </span></label>
									<div class="col-md-5">
									<select name="event_id" class="form-control select select2 select2me" placeholder=""  >
									<option value=""></option>
									<?php
									$r1=mysql_query("select * from event where flag='0' order by id Desc ");		
									$i=0;
									while($row1=mysql_fetch_array($r1))
									{
									$id=$row1['id'];
									$title=$row1['title'];
									?>
									<option value="<?php echo $id;?>"><?php echo $title;?></option>                              
									<?php }?> 
									<select/>
									</div>
									</div>

									<div class="form-group" id="n_idtext" style="display:none">
									<label class="col-md-3 control-label">News Name <span class="required" aria-required="true"> * </span></label>
									<div class="col-md-5">
									<select name="news_id" class="form-control select select2 select2me"  placeholder=""  >
									<option value=""></option>
									<?php
									$r1=mysql_query("select * from news where flag='0' order by id Desc ");		
									$i=0;
									while($row1=mysql_fetch_array($r1))
									{
									$id=$row1['id'];
									$title=$row1['title'];
									?>
									<option value="<?php echo $id;?>"><?php echo $title;?></option>                              
									<?php }?> 
									<select/>
									</div>
									</div>
									
									
									
									
						<div class="form-group">
							<label class="col-md-3 control-label">Add Images <span class="required" aria-required="true"> * </span></label>
							<div class="col-md-6">
								<table style="width:100%;" class="table" id="parant_table">
									<tbody>
										<tr>
											
											<td>
												<input type="file" class="default form-control" name="gallery_pic[]" id="file1" required>
											</td>
											<td>
												&nbsp;<button type="button" onclick="add_row()" class="btn blue btn-sm"> <i class="fa fa-plus"></i></button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class=" right1" align="center" style="margin-right:10px">
						<button type="submit" class="btn green" name="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
			
	<label class="col-md-3 control-label"> </label>
	<div class="col-md-7">
		<table id="sample" style="display:none;">
			<tbody>    
				<tr>
					<td>
						<input type="file" class="default form-control" name="gallery_pic[]" id="file1">
					</td>

					<td>
						<button type="button" onClick="add_row()" class="btn blue btn-sm"><i class="fa fa-plus"></i></button>
						<button type="button"  class="btn red btn-sm remove_row"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
			</tbody> 
		</table>
	</div>
                                             
			
			</div>
</body>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>

<?php if($insert_id>0){ ?>
	var update_id = <?php echo $insert_id; ?>;
 		$.ajax({
			url: "notification_page.php?function_name=create_gallery_notifys&id="+update_id,
			type: "POST",
			success: function(data)
			{    
 			}
	});
<?php } ?>
$(document).ready(function(){    
        $(".remove_row").die().live("click",function(){
            $(this).closest("#parant_table tr").remove();
        });

        $("#category_id").on("change",function(){
			var p=$(this).val();
			if(p==4)
			{
          $("#e_idtext").show();
		  $("#n_idtext").hide();
			}
			else if(p==5){
		   $("#e_idtext").hide();
		   $("#n_idtext").show();
			}
        });
	});	
</script>
		
		
		
		
	});	
</script>
 
<script>
    function add_row(){  
        var new_line=$("#sample tbody").html();
            $("#parant_table tbody").append(new_line);
    }
</script>
<script>
var myVar=setInterval(function(){myTimerr()},4000);
		function myTimerr() 
		{
		$("#success").hide();
		} 
</script>






<?php footer();?>
<?php scripts();?>

</html>



Success!
