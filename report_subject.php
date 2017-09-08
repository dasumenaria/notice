<?php
include("index_layout.php");
include("database.php");
include("authentication.php");

$class_id=$_GET['cls'];
$section_id=$_GET['sec'];
$exam_type_id=$_GET['trm'];
$subject_id=$_GET['sub'];
$sect_id=$section_id;

 ?>
<html >
<head>
<?php ?>
<style>
td{
	border: 1px solid #ddd;
	
}
th{
	border: 2px solid #ddd;
	
}
tr{
	border: 1px solid #ddd;
	
}
.table-bordered {
    border: 1px solid #ddd;
	
	
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}
.table {
    background-color: transparent;
}
.table {
    border-spacing: 0;
    border-collapse: collapse;
	    white-space: normal;
    line-height: normal;
    font-weight: normal;
    font-size: medium;
    font-variant: normal;
    font-style: normal;
    color: -webkit-text;
    text-align: start;
	    display: table;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Report | Subject</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<?php css(); ?>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
 </head>
 <body style="background-color:#FFF;">
<!-- BEGIN HEADER -->

<!-- BEGIN CONTAINER -->
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<?php 
		$cl=mysql_query("select `roman` from `master_class` where `id`='$class_id'");
		$sf=mysql_fetch_array($cl);
		
		$cl_romn=$sf['roman'];
		
		$cl1=mysql_query("select `section_name` from `master_section` where `id`='$section_id'");
		$sf1=mysql_fetch_array($cl1);
		
		$sc_name=$sf1['section_name'];
		
		$cl2=mysql_query("select `exam_type` from `master_exam` where `id`='$section_id'");
		$sf2=mysql_fetch_array($cl2);
		
		$exam_type_name=$sf2['exam_type'];
		
		$cl3=mysql_query("select `subject_name` from `master_subject` where `id`='$subject_id'");
		$sf3=mysql_fetch_array($cl3);
		
		$sb_name=$sf3['subject_name'];
		?>
		
		
			<div class="portlet box pink">
			<div class="portlet-title" style="float:left !important;">
				<div class="caption"  style="text-align:center;">
					
				</div>
			</div>
			<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<h3 color="black" style="color:#0078D7 !important;"><center><i class="icon-puzzle"></i> View Details Of Class: <?php echo $cl_romn; ?> and Section: <?php echo $sc_name; ?>
			<br>Exam Type - <?php echo $exam_type_name; ?>
			<br>Subject - <?php echo $sb_name; ?>
			</center></h3>
				<input type="hidden" name="cls" value="<?php echo $class_id; ?>">
				<input type="hidden" name="sec" value="<?php echo $section_id; ?>">
				<input type="hidden" name="exm" value="<?php echo $exam_id; ?>">
					<div class="form-body">
						 
						 <div class="table-responsive">
								<table id="user" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th rowspan='3'>
										 Scholar no
									</th>
									<th rowspan='3'>
										 Name
									</th>
									
									<?php 
									 $slt=mysql_query("select `subject_name` from `master_subject` where `id`='$subject_id'");
									 $flt=mysql_fetch_array($slt);
									 $sub_name=$flt['subject_name'];
										?>
										
										<th style="text-align:center"  colspan="2">
											 <?php echo $sub_name; ?>
	
										</th>
 								
								</tr>
								<tr>
									<th>Marks Obtained</th>
									<th>Maximum Marks</th>
								</tr>
								</thead>
								<tbody>
									
								<?php 
								$w=0;
								
									$qr=mysql_query("select * from `login` where `class_id`='$class_id' && `section_id`='$section_id' ORDER BY `name`");
									while($fr=mysql_fetch_array($qr))
									{$w++;
									$student_id=$fr['id'];
									$scholar_no=$fr['eno'];
									$roll_no=$fr['roll_no'];
									$name=$fr['name'];
									?>
									<tr>
									<td><?php echo $scholar_no; ?></td>
									<td><?php echo $name; ?></td>
								<?php
									$qry=mysql_query("select * from `student_marks` where `class_id`='$class_id' && `section_id`='$section_id' && `subject_id`='$subject_id' && `exam_type_id`='$exam_type_id' && `student_id`='$student_id'");
									$frq=mysql_fetch_array($qry);
									
										$max_marks=$frq['max_marks'];
										$obtained_marks=$frq['obtained_marks'];
										$teacher_id=$frq['teacher_id'];
		
									?>
									
									<td style="text-align:center">
										<?php echo $obtained_marks; ?>
									</td>
									<td style="text-align:center">
										<?php echo $max_marks; ?>
									</td>
									 
										<?php } ?>
			 						 
								</tbody>
								</table>
							</div>
						 
						 
					</div>
					

				
			</div>
				<!-- END FORM-->
				</div>
			</div>
			
			<!-- END PAGE CONTENT-->
		</div>
	
	<!-- END CONTENT -->
	
</div>
 <?php scripts(); ?>
<!-- END PAGE LEVEL SCRIPTS -->
</body>
<!-- END BODY -->
</html>