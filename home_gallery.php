	<?php
		include("index_layout.php");
		include("database.php");
		require_once('ImageManipulator.php'); 
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
					$manipulator->save('home/' . $newNamePrefix . $_FILES['fileToUpload']['name']);
 					
					$insert_path=$newNamePrefix.$_FILES['fileToUpload']['name'];
					$sql1="insert into home_gallery(pic)values('$insert_path')"; 
					$rl=mysql_query($sql1);
 				}  
			}
	?>
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Gallery</title>
<style>
.form-horizontal .radio > span
	{
		margin-top:-3px !important;
	}
.portfolio .thumbnail {
    position: relative;
}

.portfolio .thumbnail:hover {
    cursor: pointer;
}

.portfolio .caption {
    bottom: 0;
    position: absolute;
}

.portfolio .btn {
    opacity: 0.75;
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
								<i class="fa fa-gift"></i>Home Gallery
							</div>
							<div class="tools">
							 
							</div>
						</div>
						<div class="portlet-body form"> 
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
								<div class="form-group">
								<label class="col-md-3 control-label">Add Images</label>
								<input type="file" class="form-control input-medium" name="fileToUpload" />
								</div>
								</div>
								<div class=" right1" align="center" style="margin-right:10px">
									<input class="btn green" type="submit" value="sumbit">
								</div>
							</form>
						</div>
					</div>
					<br/><br/>
					<div class="portlet box blue">	
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>View Home Gallery
							</div>
							<div class="tools">
							<a class="" href="view_gallery.php" style="color: white"><i class="fa fa-search">View  Home Gallery </i></a>
							</div>
						</div>
						<div class="portlet-body form"> 
								 
  <div class="row portfolio">
  <?php 
 
	$r1=mysql_query("select * from home_gallery where flag='0' order by id DESC limit 8");		
	while($row1=mysql_fetch_array($r1))
		{
		  $id=$row1['id'];
		  $pic=$row1['pic'];
  ?>
	 
		<div class="col-md-3">
			<div class="thumbnail">
				<img class="img-responsive"  height="160px" width="200px" src="home/<?php echo $pic;?>" data-toggle="modal" data-target="#myModal">
				<div class="caption">
				<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="myModalLabel">Home Gallery</h4>
					</div>
					<div class="modal-body">
						<img class="img-responsive" src=" home/<?php echo $pic;?>" alt="The awesome description">
					</div>
				</div>
			</div>
		</div>
  
	<?php } ?> 
</div>
						</div>
					</div>
			</div>
			
</div>
</body> 
 <?php footer();?>
<?php scripts();?>

</html>


