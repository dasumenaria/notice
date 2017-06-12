<?php
include("database.php");
error_reporting(0);
@ini_set('display_errors',0);
ini_set('max_execution_time', 200000);
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
	$name_exp=explode(' ', $su_name);
	$su_name=implode('-',$name_exp);

	// file name for download
	$filename="Class-$cl_name-$se_name-$su_name";
	header ("Expires: 0");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . "GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/vnd.ms-excel");
	header ("Content-Disposition: attachment; filename=".$filename.".csv");
	header ("Content-Description: Generated Report" );
	$fct="S.No.,Roll No,Student Name,Subject,Max Marks,".$exam_type."";
	
	$qwq=$fct;   
	$qwq.="\n";


$query=mysql_query("select * from `login` where `class_id`='$class' && `section_id`='$section' order By `name`");
while($fets=mysql_fetch_array($query))
	{
		$f++;
		$roll_no=$fets['roll_no'];
		$scholar_no=$fets['scholar_no'];
		$student_name=$fets['name'];
		$query7=mysql_query("select `subject_name` from `master_subject` where `id`='$subject_fetch'");
		$fet7=mysql_fetch_array($query7);
		$subject_name=$fet7['subject_name'];
		$x='';
		$qwq.="$f,$roll_no,$student_name,$subject_name";
		$qwq.="\n";
	}

echo $qwq; 
?> 
