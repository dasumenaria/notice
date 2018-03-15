 <?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];
 $user_id=$_SESSION['id'];
 $message="";
 $message1="";
 $message2="";
 $insert_id=0;
if(isset($_POST['submit']))
{
	$class_id=mysql_real_escape_string($_REQUEST["class_id"]);
	$section_id=mysql_real_escape_string($_REQUEST["section_id"]);
	$date=mysql_real_escape_string($_REQUEST["date"]);
	$date1=date('Y-m-d',strtotime($date));
	$curent_date=date("Y-m-d");
	if(!empty($class_id) && empty($section_id))
	{
		$q=mysql_query("select * from class_section where class_id='$class_id'");		
		while($f=mysql_fetch_array($q))
		{
			$sect_id=$f['section_id'];
			@$file_name=$_FILES["file"]["name"];
			$filedata=explode('/', $_FILES["file"]["type"]);
			  $filedata[1];
			 
			if($filedata[1]=='pdf' || $filedata[1]=='PDF' )
			{
				$sql="insert into syllabus(class_id,section_id,subject_id,date,user_id,curent_date)values('$class_id','$sect_id','$subject_id','$date1','$user_id','$curent_date')";
				$r=mysql_query($sql);
				$sid=mysql_insert_id();
				$insert_id=$sid;
				$pdf="pdf";
				$pdff=".pdf";
				@$file_name=$_FILES["file"]["name"];
				if(!empty($file_name))
				{
					@$file_name=$_FILES["file"]["name"];
					$file_tmp_name=$_FILES['file']['tmp_name'];
					$target ="syllabus/";
					$file_name=$pdf.$sid.$pdff;
					$filedata=explode('/', $_FILES["file"]["type"]);
					$filedata[1];
					if($filedata[1]=='pdf')
					{
						$target=$target.basename($file_name);
						move_uploaded_file($file_tmp_name,$target);
						$file_name=$pdf.$sid.$pdff;
					}
				}
				else
				{
					$file_name='no_data.pdf';
				}
			
				$xsql=mysql_query("update `syllabus` SET `file`='$file_name' where id='".$sid."'" );
				$xsqlr=mysql_query($xsql);    
				$message = "Syllabus Add Successfully.";
				$insert_id=$sid;
		    }
		    else
			{
				$message1 = "file type different, Please select pdf file.";
			}
		} 
	}
	else if(!empty($class_id) && !empty($section_id))
	{
  			@$file_name=$_FILES["file"]["name"]; 
			$filedata=explode('/', $_FILES["file"]["type"]);
			if($filedata[1]=='pdf' || $filedata[1]=='PDF')
			{
				$sql="insert into syllabus(class_id,section_id,subject_id,date,user_id,curent_date)values('$class_id','$section_id','$subject_id','$date1','$user_id','$curent_date')";
				$r=mysql_query($sql);
				$sid=mysql_insert_id();
				$insert_id=$sid;
				$pdf="pdf";
				$pdff=".pdf";
				@$file_name=$_FILES["file"]["name"];
				if(!empty($file_name))
				{
					@$file_name=$_FILES["file"]["name"];
					$file_tmp_name=$_FILES['file']['tmp_name'];
					$target ="syllabus/";
					$file_name=$pdf.$sid.$pdff;
					$filedata=explode('/', $_FILES["file"]["type"]);
					$filedata[1];
					if($filedata[1]=='pdf')
					{
						$target=$target.basename($file_name);
						move_uploaded_file($file_tmp_name,$target);
						$file_name=$pdf.$sid.$pdff;
					}
				}
				else
				{
					$file_name='no_data.pdf';
				}
				
					$xsql=mysql_query("update `syllabus` SET `file`='$file_name' where id='".$sid."'" );
					$xsqlr=mysql_query($xsql);    
					$message = "Syllabus Add Successfully.";
					$insert_id=$sid;
			}
			else
			{
				$message1 = "file type different, Please select pdf file.";
			}
		 
	}
	else{
		$message2 = "Please select class and section";	
	}
	 
}  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Syallbus</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box blue"> 
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Syallbus
							</div>
							<div class="tools">
							 
								
							</div>
						</div>
						<div class="portlet-body form">
<?php if($message!="") { ?>
<div id="success" class="alert alert-success" style="margin-top:10px; width:50%">
<?php echo $message; ?>
</div>
<?php } ?>
<?php if($message1!="") { ?>
<div id="success" class="alert alert-danger" style="margin-top:10px; width:50%">
<?php echo $message1; ?>
</div>
<?php } ?>
<?php if($message2!="") { ?>
<div id="success" class="alert alert-danger" style="margin-top:10px; width:50%">
<?php echo $message2; ?>
</div>
<?php } ?>
 					 
<form  class="form-horizontal" id="form_sample_2"   role="form" method="post"  enctype="multipart/form-data"> 
					<div class="form-body">
					<div class="form-group">
										<label class="col-md-3 control-label">Date <span class="required" aria-required="true"> * </span></label>
										
										<div class="col-md-4">
											<input class="form-control form-control-inline input-md date-picker" required  value="<?php echo date("d-m-Y"); ?>" placeholder="dd/mm/yyyy" type="text" 
                                            data-date-format="dd-mm-yyyy" type="text" name="date">
										</div>
										</div>
										 
                                                   <div class="form-group">
                                                    <label class="control-label col-md-3">Class<span class="required" aria-required="true"> * </span></label>
													<div class="col-md-4">
                                                   <select class="form-control select select2 select2me user" required placeholder="Select .." name="class_id"><option value=""></option>
                                                   <?php
                                            $r1=mysql_query("select * from master_class");		
                                            $i=0;
                                            while($row1=mysql_fetch_array($r1))
                                            {
                                            $id=$row1['id'];
                                            $class_name=$row1['class_name'];
                                            ?>
                                            <option value="<?php echo $id;?>"><?php echo $class_name;?></option>
                                            <?php } ?>
                                            </select>
											</div>
                                                    </div>
						 
											<div id="dt">
													<div class="form-group">
                                                    <label class="control-label col-md-3">Section</label>
													<div class="col-md-4">
                                                   <select class="form-control" placeholder="Select.." name=" ">
                                                        <option value="">Select...</option>
                                                         
                                                        </select>
                                                    </div></div>
											</div>
											<div class="form-group">
										 <label class="control-label col-md-3">Upload PDF File<span class="required" aria-required="true"> * </span></label>
                                            <div class=" col-md-4">
												<input type="file" required class="form-control" name="file" id="file1">
                                                     
											</div>
					 
					 
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
<?php if($insert_id>0){ ?>
var update_id = <?php echo $insert_id; ?>;
		$.ajax({
			url: "notification_page.php?function_name=create_syllabus_notifys&id="+update_id,
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

$(document).ready(function() 
{
 	$(".user").live("change",function()
	{			
		var s=$(this).val();
		$.ajax({
		url: "ajax_syllabus.php?pon="+s,
		}).done(function(response) {
			//alert(response);  
			$("#dt").html(""+response+"");
			$('.select2me').select2();
		});
	});	  

});
	</script>


<?php scripts();?>

</html>
 

