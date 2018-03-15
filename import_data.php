<?php
include("index_layout.php");
include("database.php");
$id=$_GET['id'];
$message='';  
if(isset($_POST["update_details"]))
{
	
	$stdnt_class =$_POST['stdnt_class'];
	$section_id =$_POST['section_id'];
	$stdnt_medium =$_POST['stdnt_medium'];
	$notification_key='AAAATJpd3X0:APA91bFIfAJIxq5oBGv4YUfMPDLmhVT-iUilXpJS8l7AwSLIxy4-E1efuYrH4vY2oOwIP6ecLma0zvgva-lB5RYtkgjYa8pKiCBhxcQFqfbPrDbpXmBcc3oiGRQmRTrkucSkBxZAn8Tv';
		$filename=$_FILES["file"]["tmp_name"];
		$file_name=$_FILES["file"]["name"];
		$ext = explode(".", $file_name);
 		if($ext[1] != csv)
		{
			echo "<script type=\"text/javascript\">
			alert(\"Invalid File:Please Upload CSV File.\");
			window.location = \"import_data.php\"
			</script>";
		}
		else
		{
			$file = fopen($filename, "r");
			$x=0;
			$a=0;
			$n=0;
			while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
			{
				$x++;
				 
				if($x==1){continue;}
				if($x==2){continue;}
				$eno=$emapData[6];
				$fetch_st=mysql_query("select * from login where flag='0' AND eno='$eno'");		
			$fetch_st1=mysql_fetch_array($fetch_st);
			if(empty($fetch_st1))
			{
				$a++;	
				$sql=mysql_query("select * from `login` order by id DESC limit 1 ");
				$fet=mysql_fetch_array($sql);
				$last_id_fet=$fet['id'];
				$reg_no=$fet['reg_no'];
				$add_id =$reg_no+1;
				$password=md5($emapData[10]);
				$dob=md5($emapData[1]);
				if(!empty($dob))
				{
					$datex=date('Y-M-D', strtotime($dob));
				}
				else
				{
					$datex='0000-00-00';
				}
				$sql = "INSERT into login (`name`,`dob`,`father_name`,`mother_name`,`address`,`roll_no`,`eno`,`mobile_no`,`father_mobile`,`username`,`password`,`class_id`,`section_id`,`medium`,`reg_no`,`user_id`,`role_id`,'notification_key') 
				values('$emapData[0]','$datex','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','$emapData[10]','$password','$stdnt_class ','$section_id','$stdnt_medium','$add_id','1','5','$notification_key')";
				$result = mysql_query($sql);
			
			}
			else
			{
					$n++;
			}
 			$message='Total '.$a.' entries Insert Successfull & '.$n.' entries enroll no already exist.'; 
			fclose($file);
		} 
	}		
}
 ?> 
<html>
	<head>
	<?php css();?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Update Student Password</title>
	</head>
	<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box blue">
				<div class="portlet-title ">
					<div class="caption">
						<i class="fa fa-gift"></i> Import Student Data
					</div>
				</div>
				<div class="portlet-body form">
					<div class="form-body">
                        <div class="scroller" style="height:500px;"  data-always-visible="1" data-rail-visible="0">
                        <?php if($message){ ?>
                            <div id="success">
								<div class="alert alert-success">
									<strong><?php echo $message; ?></strong> 
                                </div>
                            </div>
                        <?php } ?> 
						<form  class="form-horizontal" id="form_sample_2"  role="form" method="post" enctype="multipart/form-data" > 
						<div style="float:right">
							<a href="img/formate.csv" class="btn red btn-sm" download><i class="fa fa-download"></i> Download Formet</a>
						</div>
                        <table class="table-condensed table-bordered" style="width:100%;">
							<tbody>
								
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Select Class <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-4">
                                            <select name="stdnt_class" required class="form-control select2me   section " placeholder="Select..." id="class_id">
                                                <option value="">Select Class</option>
                                                    <?php
                                                    $r1=mysql_query("select * from master_class where flag='0'");		
                                                    $i=0;
                                                    while($row1=mysql_fetch_array($r1))
                                                    {
                                                        $cls_id=$row1['id'];
                                                        $class_name=$row1['class_name'];
                                                        ?>
                                                        <option value="<?php echo $cls_id;?>"><?php echo $class_name;?></option>                              
                                                    <?php 
                                                    }?> 
                                            </select>
										</div>
                                    </div>
									<div class="form-group">
										<label class="col-md-3 control-label">Select Section <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-4" id="data">
                                            <select name="section_id" required class="form-control select2me " placeholder="Select..." id="role_id">
                                                <option value=""></option>
												<?php 
												$r1=mysql_query("select * from master_section");		
													$i=0;
													while($row1=mysql_fetch_array($r1))
													{
													$id=$row1['id'];
													$section_name=$row1['section_name'];
													?>
														<option value="<?php echo $id;?>" <?php if($id==$section_id) { echo 'selected'; } ?>><?php echo $section_name;?></option>
													<?php } ?>
                                                   
                                            </select>
										</div>
                                    </div>
									<div class="form-group">
										<label class="col-md-3 control-label">Select Medium <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-4">
                                            <select name="stdnt_medium" class="form-control select2me   " placeholder="Select..." required id="role_id">
                                                <option value="">Select Medium</option>
                                                    <?php
                                                    $r3=mysql_query("select * from master_medium where flag='0'");		
                                                    $iii=0;
                                                    while($row3=mysql_fetch_array($r3))
                                                    {
                                                        $med_id=$row3['id'];
                                                        $medium_name=$row3['medium_name'];
                                                        ?>
                                                        <option value="<?php echo $med_id;?>"><?php echo $medium_name;?></option>                              
                                                    <?php 
                                                    }?> 
                                            </select>
										</div>
                                    </div>
									<div class="form-group">
										<label class="col-md-3 control-label">Import CSV <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-4">
                                            <input type="file" name="file" required id="file" class="input-large form-control">
										</div>
                                    </div>
									<div class="form-group">
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="update_details" class="btn blue" >Submit</button>
										</div>
									</div>
								</div>
								</div>
							</tbody>
                        </table>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php footer();?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Password Match').css('color', 'green');
  } else 
    $('#message').html('Password Not Match').css('color', 'red');
});
});
</script>

<?php scripts();?>
</html>