<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];
 $user_id=$_SESSION['id'];
 $view_u=$_GET['id'];

 $message="";
 $message1="";
 $message2="";
if(isset($_POST['update_submit']))
{
	$class_id=mysql_real_escape_string($_REQUEST["class_id"]);
	$section_id=mysql_real_escape_string($_REQUEST["section_id"]);
	$pdf_file=$_REQUEST["pdf_file"];
	$date=mysql_real_escape_string($_REQUEST["date"]);
	$date1=date('Y-m-d',strtotime($date));
	$curent_date=date("Y-m-d");
	@$file_name=$_FILES["file"]["name"];
	 
	$r=mysql_query("update `syllabus` SET `class_id`='$class_id',`section_id`='$section_id',`date`='$date1',`user_id`='$user_id' where id='$view_u'" );
	$message = "Syllabus Update Successfully.";
	$pdf="pdf";
	$pdff=".pdf";
	@$file_name=$_FILES["file"]["name"];
	if(!empty($file_name))
	{
		@$file_name=$_FILES["file"]["name"];
		$file_tmp_name=$_FILES['file']['tmp_name'];
		$target ="syllabus/";
		$file_name=$pdf.$view_u.$pdff;
		$filedata=explode('/', $_FILES["file"]["type"]);
		$filedata[1];
		if($filedata[1]=='pdf')
		{
		 $target=$target.basename($file_name);
		 move_uploaded_file($file_tmp_name,$target);
		$file_name=$pdf.$view_u.$pdff;
		$xsql=mysql_query("update `syllabus` SET `file`='$file_name' where id='".$view_u."'");
		$xsqlr=mysql_query($xsql); 
		$message = "Syllabus Update Successfully.";
		}
		else
		{
			$message = "Please select pdf file";
		}
	}
}
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Update Syllabus
							</div>
							<div class="tools">
						<a class="" href="view_syllabus.php" style="color: white"><i class="fa fa-search"> View</i></a>
								 
							</div>
						</div>
						<div class="portlet-body form">
<?php if($message!="") { ?>
<div id="success" class="alert alert-success" style="margin-top:10px; width:50%">
<?php echo $message; ?>
</div>
<?php } ?>
	<form class="form-horizontal" role="form" id="form_sample_2" method="post" enctype="multipart/form-data">
<?php
			        $r1=mysql_query("select * from syllabus where flag='0' AND id='".$view_u."'");		
					$row1=mysql_fetch_array($r1);
					$id=$row1['id'];
					$class_id=$row1['class_id'];
					$date=$row1['date'];
                    $section_id=$row1['section_id'];
					$file=$row1['file'];
					if($date=='0000-00-00')
					{	$date1='';}
					else
					{ $date1=date("d-m-Y", strtotime($date)); }
				
					$class=mysql_query("select * from master_class where id='".$class_id."'");		
					$classid=mysql_fetch_array($class);
					$class_name=$classid['class_name'];
					
					
					?>

							<div class="form-body">
							
							<input type="hidden" name="pdf_file" value="<?php echo $file;?>">
							
									<div class="form-group">
										<label class="col-md-3 control-label">Date <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-4">
											<input class="form-control form-control-inline  date-picker" required  value="<?php echo $date1;?>" placeholder="dd/mm/yyyy" type="text" 
                                            data-date-format="dd-mm-yyyy" type="text" name="date">
										</div>
										</div>
										                                                    <div class="form-group">
                                                    <label class="control-label col-md-3">Class<span class="required" aria-required="true"> * </span></label>
													<div class="col-md-4">
                                                   <select class="form-control select select2 select2me " required placeholder="Select class.." name="class_id" ><option  ></option>
                                                   <?php
                                            $cr1=mysql_query("select * from master_class");		
                                            $i=0;
                                            while($crow1=mysql_fetch_array($cr1))
                                            {
                                            $cid=$crow1['id'];
                                            $class_name=$crow1['class_name'];
                                            ?>
                                            <option value="<?php echo $cid;?>" <?php if($class_id==$cid){ echo "selected"; }?> ><?php echo $class_name;?></option>
                                            <?php } ?>
                                            </select>
											</div>
                                                    </div>
                                                 
                                                    <div class="form-group">
                                                    <label class="control-label col-md-3">Section<span class="required" aria-required="true"> * </span></label>
													<div class="col-md-4">
                                                   <select class="form-control select select2 select2me" required placeholder="Select section.." name="section_id">
                                                        <option value=""></option>
                                                        <?php
                                            $r1=mysql_query("select * from master_section");		
                                            $i=0;
                                            while($row1=mysql_fetch_array($r1))
                                            {
                                            $id=$row1['id'];
                                            $section_name=$row1['section_name'];
                                            ?>
                                            <option value="<?php echo $id;?>" <?php if($section_id==$id){ echo "selected"; }?>><?php echo $section_name;?></option>
                                            <?php } ?>
                                                        </select>
                                                    </div></div>
													 
										<div class="form-group">
										 <label class="control-label col-md-3">Upload PDF File</label>
                                            <div class=" col-md-4">
												<input type="file" class="form-control" name="file" id="file1">
											</div>
										</div>
													
								</div>
								<div class="right1" align="center" style="margin-right:10px">
									<button type="submit" id="edit_id" class="btn green" name="update_submit">Update</button>
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

