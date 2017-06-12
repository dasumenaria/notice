<?php
include("index_layout.php");
include("database.php");

$class=$_GET['cls'];
$section=$_GET['sec'];
$subject_fetch=$_GET['sub'];
$exam_name=$_GET['trm'];

$ster=mysql_query("select `roman` from `master_class` where `id`='$class'");
$fter=mysql_fetch_array($ster); 
$cl_name=$fter['roman'];

$ster1=mysql_query("select `section_name` from `master_section` where `id`='$section'");
$fter1=mysql_fetch_array($ster1); 
$se_name=$fter1['section_name'];

$ster2=mysql_query("select `subject_name` from `master_subject` where `id`='$subject_fetch'");
$fter2=mysql_fetch_array($ster2); 
$su_name=$fter2['subject_name']; 

$ster3=mysql_query("select `exam_type` from `master_exam` where `id`='$exam_name'");
$fter3=mysql_fetch_array($ster3); 
$exam_type=$fter3['exam_type'];


if(isset($_POST['submit_marks'])){
	/*echo"<pre>";
	print_r($_POST);
	echo"</pre>";*/
	
	$class_id=$_POST['class_id'];
	$section_id=$_POST['section_id'];
	$subject_id=$_POST['subject_id'];
	$exam_type_id=$_POST['exam_type_id'];
	
	$student_id=$_POST['student_id'];
	$marks=$_POST['marks'];
	$max_marks=$_POST['max_marks'];
	$x=0;
	foreach($student_id as $stunt_id)
	{
		$obtained_marks=$marks[$x];
		$Maxx_marks=$max_marks[$x];
		
		
		$sql2= "select `id` from `student_marks` where `class_id`='$class_id' && `section_id`='$section_id' && `student_id`='$stunt_id' && `subject_id`='$subject_id' && `exam_type_id`='$exam_type_id'";
		$check=mysql_query($sql2);
		$cunt=mysql_num_rows($check);
		
		if($cunt>0)
		{	
			$fetch=mysql_fetch_array($check);
			$id=$fetch['id'];
			$sql6="update `student_marks` set `class_id`='$class_id',`section_id`='$section_id',`student_id`='$stunt_id',`subject_id`='$subject_id',`exam_type_id`='$exam_type_id',`obtained_marks`='$obtained_marks' ,`max_marks`='$Maxx_marks' where id='".$id."'";
			mysql_query($sql6);
		} 
		else
		{
			$sql3="insert into `student_marks` SET `class_id`='$class_id',`section_id`='$section_id',`student_id`='$stunt_id',`subject_id`='$subject_id',`exam_type_id`='$exam_type_id',`obtained_marks`='$obtained_marks',`max_marks`='$Maxx_marks'";
			mysql_query($sql3);
		}
		$x++;
	}
}

?>
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Marks | Filling</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i>Marks Filing
					</div>
				</div>
				<div class="col-md-12" style="padding-top:10px;font-size:18px;">
					<div class="col-md-3"><b>Class :- </b><?php echo $cl_name ;?></div>
					<div class="col-md-3"><b>Section :- </b><?php echo $se_name ;?></div>
					<div class="col-md-3"><b>Subject :- </b><?php echo $su_name ;?></div>
					<div class="col-md-3"><b>Term :- </b><?php echo $exam_type ;?></div>
					
				</div>
<div class="portlet-body">
	<div class="table-scrollable">
	<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
				
                
	<table class="table   table-hover" width="100%" bo style="font-family:Open Sans;">
        <thead>
        <tr style="background:#F5F5F5">
            <th width="5%">S.No.</th>
            <th>Roll No.</th>
             <th >Student Name</th>
             <th>Max Marks</th>
            <th width="15%"><?php echo $exam_type; ?></th>
        </tr>
        </thead>
		<tbody>
<?php 
$query=mysql_query("select * from `login` where `class_id`='$class' && `section_id`='$section' order By `name` ASC"); 
$i=0;
	 while($fets=mysql_fetch_array($query))
		{ $i++;
			$stdunt_id=$fets['id'];
			$roll_no=$fets['roll_no'];
 			$student_name=$fets['name'];
 			$marksQuery=mysql_query("select *  from `student_marks` where  `class_id` = '$class' && `section_id` = '$section' && `subject_id` = '$subject_fetch' && `exam_type_id` = '$exam_name' && `student_id` = '$stdunt_id'");
			$ftc_marks=mysql_fetch_array($marksQuery);	
			$max_marks=$ftc_marks['max_marks'];
			$obtained_marks=$ftc_marks['obtained_marks'];
			
  		?>		
			<tr class="main">
				<td><?php echo $i ;?></td>				
				<td><?php echo $roll_no ;?></td>				
				<td><?php echo $student_name ;?></td>				
				<td><input class="allLetter form-control input-small max_marks"  name="max_marks[]" value="<?php echo $max_marks; ?>"></td>	
                <td><input class="allLetter form-control input-small Max_valid"  name="marks[]" value="<?php echo $obtained_marks; ?>"></td>
 			</tr>
            <input class="form-control" type="hidden" name="student_id[]" value="<?php echo $stdunt_id; ?>">

<?php } ?>
<input class="form-control" type="hidden" name="class_id" value="<?php echo $class; ?>">
<input class="form-control" type="hidden" name="subject_id" value="<?php echo $subject_fetch; ?>">
<input class="form-control" type="hidden" name="section_id" value="<?php echo $section; ?>">
<input class="form-control" type="hidden" name="exam_type_id" value="<?php echo $exam_name; ?>">
		</tbody>
	</table>
	<div id="data"></div>
	<div class="col-md-offset-5 col-md-6" style="padding-top:10px;">
	<button type="submit" name="submit_marks" class="btn btn-primary">Submit</button>
	<button type="reset" class="btn default">Cancel</button>
</div>
	</form>
</div>

</div>
</div>
</div>
</div>

</body>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {	
// NUMBUER VALIDATION
	$('.allLetter').keyup(function(){
		var inputtxt=  $(this).val();
		var numbers =  /^[0-9]*\.?[0-9]*$/;
		
		if(inputtxt.match(numbers))  
		{  
		} 
		else  
		{  
			$(this).val('');
			return false;  
		}
	});
	$('.Max_valid').on('keyup , click , blur',function(){
		var inputVal = parseInt($(this).val());
		var inputMax = parseInt($(this).closest('tr.main').find('.max_marks').val());
		//alert(inputVal);alert(inputMax);
		if(inputVal > inputMax)
		{
			alert("Input marks should be less than max marks");
			$(this).val('');
		}
		else
		{}
	})
});
</script>

<?php footer();?>
<?php scripts();?>
</html>

