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
$subject_id=mysql_real_escape_string($_REQUEST["subject_id"]);
$date=mysql_real_escape_string($_REQUEST["date"]);
$date1=date('Y-m-d',strtotime($date));
$curent_date=date("Y-m-d");

	if(!empty($class_id) && empty($section_id))
	{
		$q=mysql_query("select * from class_section where class_id='$class_id'");		
		while($f=mysql_fetch_array($q))
		{
			 $sect_id=$f['section_id'];
			
			
			
			$fetch_st=mysql_query("select * from syllabus where flag='0' AND class_id='$class_id' AND section_id='$sect_id'");		
			$fetch_st1=mysql_fetch_array($fetch_st);
			if(empty($fetch_st1))
			{
				@$file_name=$_FILES["file"]["name"];
				$filedata=explode('/', $_FILES["file"]["type"]);
				  $filedata[1];
				 
				if($filedata[1]=='pdf' || $filedata[1]=='PDF' )
				{
				$sql="insert into syllabus(class_id,section_id,subject_id,date,user_id,curent_date)values('$class_id','$sect_id','$subject_id','$date1','$user_id','$curent_date')";
				$r=mysql_query($sql);
				$sid=mysql_insert_id();
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
			else
			{
				
				$message2 = "Syllabus Already exist.";
			}
		} 
	}
	else
	{
			$fetch_st=mysql_query("select * from syllabus where flag='0' AND class_id='$class_id' AND section_id='$section_id'");		
			$fetch_st1=mysql_fetch_array($fetch_st);
			if(empty($fetch_st1))
			{
				@$file_name=$_FILES["file"]["name"];
				$filedata=explode('/', $_FILES["file"]["type"]);
				  $filedata[1];
			 
				if($filedata[1]=='pdf' || $filedata[1]=='PDF')
				{
				$sql="insert into syllabus(class_id,section_id,subject_id,date,user_id,curent_date)values('$class_id','$section_id','$subject_id','$date1','$user_id','$curent_date')";
				$r=mysql_query($sql);
				$sid=mysql_insert_id();
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
			else
			{
				
				$message2 = "Syllabus Already exist.";
			}
			
	}

	
}
  ?> 
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
                       <!-- <input id="alert_message" type="text" class="form-control" value="some alert text goes here..." placeholder="enter a text ...">-->
<div class="message" id="success" style="color:#44B6AE; text-align:center"><label class="control-label"><?php echo $message; ?></label></div>
<?php } ?>
<?php if($message1!="") { ?>
                       <!-- <input id="alert_message" type="text" class="form-control" value="some alert text goes here..." placeholder="enter a text ...">-->
<div class="message" id="success" style="color:#44B6AE; text-align:center"><label class="control-label"><?php echo $message1; ?></label></div>
<?php } ?>
<?php if($message2!="") { ?>
                       <!-- <input id="alert_message" type="text" class="form-control" value="some alert text goes here..." placeholder="enter a text ...">-->
<div class="message" id="success" style="color:#44B6AE; text-align:center"><label class="control-label"><?php echo $message2; ?></label></div>
<?php } ?>						 
<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
					<div class="form-body">
					<div class="form-group">
										<label class="col-md-3 control-label">Date</label>
										
										<div class="col-md-3">
											<input class="form-control form-control-inline input-md date-picker" required  value="<?php echo date("d-m-Y"); ?>" placeholder="dd/mm/yyyy" type="text" 
                                            data-date-format="dd-mm-yyyy" type="text" name="date">
										</div>
										</div>
										 
                                                   <div class="form-group">
                                                    <label class="control-label col-md-3">Class</label>
													<div class="col-md-3">
                                                   <select class="form-control select select2 select2me user" placeholder="Select class.." name="class_id"><option value=""></option>
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
													<div class="col-md-3">
                                                   <select class="form-control select select2 select2me" placeholder="Select section.." name=" ">
                                                        <option value=""></option>
                                                         
                                                        </select>
                                                    </div></div>
											</div>
											<div class="form-group">
                                                    <label class="control-label col-md-3">Subject</label>
													<div class="col-md-3">
                                                   <select class="form-control select select2 select2me" placeholder="Select subject.." name="subject_id">
                                                        <option value=""></option>
                                                        <?php
                                            $r1=mysql_query("select * from master_subject");		
                                            $i=0;
                                            while($row1=mysql_fetch_array($r1))
                                            {
                                            $id=$row1['id'];
                                            $subject_name=$row1['subject_name'];
                                            ?>
                                            <option value="<?php echo $id;?>"><?php echo $subject_name;?></option>
                                            <?php } ?>
                                                        </select></div>
                                                    </div>
													
													
														<div class="form-group">
										 <label class="control-label col-md-3">Upload PDF File</label>
                                            <div class=" col-md-3 fileinput fileinput-new" style="padding-left: 15px;" data-provides="fileinput">
                                                <div class="col-md-10 fileinput-new thumbnail" style="width: 200px;  height: 50px;">
                                                    <img src="" style="width:100%;" alt=""/>
                                                </div>
                                                <div class="col-md-3 fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="btn default btn-file addbtnfile" style="background-color:#00CCFF; color:#FFF">
                                                    <span class="fileinput-new">
                                                    <i class="fa fa-plus"></i> </span>
                                                    <span class="fileinput-exists">
                                                    <i class="fa fa-plus"></i> </span>
                                                    <input type="file" class="default" name="file" id="file1">
                                                    </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput" style=" color:#FFF">
                                                    <i class="fa fa-trash"></i> </a></div>
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
 
	$(document).ready(function() 
	{
		//alert();
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
 
