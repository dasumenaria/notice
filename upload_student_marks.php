<?php
include("index_layout.php");
include("database.php");
include("auth.php");
if(isset($_POST["submit"]))
{
	$class_id=$_POST['class_id'];
	$subject_id=$_POST['subject_id']; 
	$section_id=$_POST['section_id'];
	$exam_type_id=$_POST['exam_type_id'];
 
 	$teacher_id=$_SESSION['id'];
	$filename=$_FILES["file"]["tmp_name"];
	$fil=$_FILES['file']['name'];
	$ext=pathinfo($fil, PATHINFO_EXTENSION);
	
	if(($_FILES["file"]["size"] >0))
	{ 
		$file = fopen($filename, "r");

		$count = 0; 
		// add this line
		 

		while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
		{ 
			$count++;  	// add this line
			if($count>1)
			{  

				$sql4 = "SELECT `id` from `login` where `name`='$emapData[2]' && `roll_no`='$emapData[1]'";
				$sets1=mysql_query($sql4);
				$fets1=mysql_fetch_array($sets1);
				$student_id=$fets1['id'];
				 
				$sql2= "select `id` from `student_marks` where `class_id`='$class_id' && `section_id`='$section_id' && `student_id`='$student_id' && `subject_id`='$subject_id' && `exam_type_id`='$exam_type_id'";
				$check=mysql_query($sql2);
				$fetch=mysql_fetch_array($check);
				$cunt=mysql_num_rows($check);
				 $id=$fetch['id'];
				if($cunt>0)
				{	
			 
					$sql6="update `student_marks` set `class_id`='$class_id',`section_id`='$section_id',`student_id`='$student_id',`subject_id`='$subject_id',`exam_type_id`='$exam_type_id',`obtained_marks`='$emapData[5]' ,`max_marks`='$emapData[4]',`teacher_id` = '$teacher_id' where id='".$id."'";
					mysql_query($sql6);
				} 
				else
				{
					$sql3="insert into `student_marks` SET `class_id`='$class_id',`section_id`='$section_id',`student_id`='$student_id',`subject_id`='$subject_id',`exam_type_id`='$exam_type_id',`obtained_marks`='$emapData[5]',`max_marks`='$emapData[4]',`teacher_id`= '$teacher_id'";
					mysql_query($sql3);
				}
			}

		}
			fclose($file);
			// echo 'CSV File has been successfully Imported';
			header('Location: upload_student_marks.php');
	}  	
	else
	{
		// echo Wrong File Please TRy Again';
		$msg=1;
		?>
		<script>
		alert('Invalid File:Please Upload CSV File');
		</script>
		<?php
		echo 'Invalid File:Please Upload CSV File';
	}
	exit;
}

?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Exam Terms</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Exam Terms
							</div>
							<div class="tools">
							 
								
							</div>
						</div>
						<div class="portlet-body form">
						 
				<form  class="form-horizontal" id="form_sample_2" enctype="multipart/form-data" role="form" method="post"> 

					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Class</label>
							<div class="col-md-4">
							   <div class="input-icon right">
									<i class="fa"></i>
									<select class="form-control user" required name="class_id" >
									<option value="">---Select Class---</option>
								    <?php 
									$query=mysql_query("select * from `master_class` order by `id`");
									while($fetch=mysql_fetch_array($query))
									{$i++;
										$class_id=$fetch['id'];
										$roman=$fetch['roman'];
									?>
									<option value="<?php echo $class_id; ?>"><?php echo $roman; ?></option>
									<?php } ?>
									</select>
								</div>
								<span class="help-block">
								please select Class</span>
							</div>
						</div>
					<div id="dt"></div>
					
					 <div id="data"> </div>
					<div id="si"></div>
					<div id="ext"></div>
					 	 
					</div>
					

				</form>
						</div>
					</div>
			</div></div>
</body>
<?php footer(); ?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<script>
$(document).ready(function() {


	$(".chk_input").live("click",function()
	{

		var attr_val= $(this).attr('chk_val');			   
		var valu=$(this).is( ':checked' );

		if(valu==0)
		{
			$(".all_chk"+attr_val ).parent('span').removeClass('checked');
			$(".all_chk"+attr_val ).removeAttr('checked','checked');
		}
		else
		{
			$(".all_chk"+attr_val ).parent('span').addClass('checked');
			$(".all_chk"+attr_val ).attr('checked','checked');
		}
	});

	$(".user").live("change",function()
	{
		var t=$(this).val();
		 
		$.ajax(
		{
			url: "ajax_up_stdnt_marks.php?pon="+t,
		}).done(function(response) 
		{
			$("#dt").html(""+response+""); 
		});
	});	 

	$(".user1").live("change",function()
	{
		 			    
		var s=$(this).val();
		var c = $('.user').val();
		var t = '';
 		$.ajax({
		url: "ajax_up_stdnt_marks.php?pon1="+s+"&pon2="+t+"&pon="+c,
		}).done(function(response) 
		{
 			$("#data").html(""+response+"");
		});
	});

	$(".user2").live("change",function()
	{
		 			    
		var sb=$(this).val();

		$.ajax({
		url: "ajax_up_stdnt_marks.php?pon2="+sb,
		}).done(function(response) 
		{
			$("#si").html(""+response+"");
		});
	});	

	$(".user3").live("change",function()
	{
		var t=$(".user").val();
		 
		var s=$(".user1").val();
		 
		var sb=$(".user2").val();
		var ex=$(this).val();
		 
 
		$.ajax({
			
		url: "ajax_up_stdnt_marks.php?pon="+t+"&pon1="+s+"&pon2="+sb+"&pon3="+ex,
		}).done(function(response) 
		{
			$("#ext").html(""+response+"");

		});
	});


});
</script>


<?php scripts();?>

</html>
 

