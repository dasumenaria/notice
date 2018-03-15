<?php
include("database.php");
ini_set('max_execution_time', 10000);
$filename = "Student Result.xls";
header("Content-Disposition: attachment; filename=".$filename."");
header("Content-Type: application/vnd.ms-excel");	
 
$stdn_name=$_GET['stdn_name'];
$stdn_cls=$_GET['stdn_cls'];
$stdn_sec=$_GET['stdn_sec'];
	 
//////////////////////////////////////////////////////////////////////////////////////////////////////////
  $qury='';
	if(!empty($stdn_cls) && empty($stdn_sec) && empty($stdn_name))
	{
		$qury="`class_id` = '$stdn_cls' &&";
	}
		if(empty($stdn_cls) && !empty($stdn_sec) && empty($stdn_name))
	{
		$qury="`section_id` = '$stdn_sec' && ";
	}
		if(empty($stdn_cls) && empty($stdn_sec) && !empty($stdn_name))
	{
		$qury="`id` = '$stdn_name' &&";
	}
		if(!empty($stdn_cls) && !empty($stdn_sec) && empty($stdn_name))
	{
		$qury="`class_id` = '$stdn_cls' && `section_id` = '$stdn_sec' && ";
	}
		if(empty($stdn_cls) && !empty($stdn_sec) && !empty($stdn_name))
	{
		$qury="`section_id` = '$stdn_sec' && `id` = '$stdn_name' && ";
	}
	if(!empty($stdn_cls) && empty($stdn_sec) && !empty($stdn_name))
	{
		$qury="`class_id` = '$stdn_cls' && `id` = '$stdn_name' &&";
	}
	if(!empty($stdn_cls) && !empty($stdn_sec) && !empty($stdn_name))
	{
		$qury="`class_id` = '$stdn_cls' && `section_id` = '$stdn_sec' && `id` = '$stdn_name' &&";
	}
$qury.='flag=0'; 
$dates.='<table border="1">
	<thead>
	<tr role="row" style="background:#f9f9f9;">
	<th width = "15px">S.No</th>
	<th>Student Name</th>
	<th>Father Name</th>
	<th>Mother Name</th>
	<th>Mobile No</th>
	<th>Father Mobile No</th>
	<th>DOB</th>
	<th >Address</th>
	<th >Scholler No.</th>
	<th >Roll No.</th>
	<th >Class</th>
	<th >Section</th> 
	<th >Username</th>
 	</tr>
	</thead>';
 
 $x=0;
		$r1=mysql_query("select * from login where ".$qury."");
		while($row1=mysql_fetch_array($r1))
		{  $x++;
		$id=$row1['id'];
		$name=$row1['name'];
		$eno=$row1['eno'];
		$user_image=$row1['image'];
		$father_name=$row1['father_name'];
		$address=$row1['address'];
		$mother_name=$row1['mother_name'];
		$class_id=$row1['class_id'];
		$section_id=$row1['section_id'];
		$medium=$row1['medium'];
		$mobile_no=$row1['mobile_no'];
		$user_name=$row1['username'];
		$father_mobile=$row1['father_mobile'];
		$roll_no=$row1['roll_no'];
		$dob1=$row1['dob'];
		$dob=date('d-m-Y', strtotime($dob1));
	 
		$cid=mysql_query("select * from master_class where id=$class_id");
			$cid1=mysql_fetch_array($cid);
			$class_name=$cid1['class_name'];

		$sid=mysql_query("select * from master_section where id=$section_id");
			$sid1=mysql_fetch_array($sid);
			$section_name=$sid1['section_name'];

		$mid=mysql_query("select * from master_medium where id=$medium");
			$mid1=mysql_fetch_array($mid);
			$medium_name=$mid1['medium_name'];
 	 
	$dates.='<tbody>
	<tr>
	<td width = "15px">'.$x.'</td>
	<td class="search">'.$name.'</td>
	<td class="search">'.$father_name.'</td>
	<td class="search">'.$mother_name.'</td>
	<td class="search">'.$mobile_no.'</td>
	<td class="search">'.$father_mobile.'</td>
	<td class="search">'.$dob.'</td>
	<td class="search">'.$address.'</td>
	<td>'.$eno.'</td>
	<td>'.$roll_no.'</td>
	<td>'.$class_name.'</td>
	<td>'.$section_name.'</td>
	<td>'.$user_name.'</td>
 	</tr>
	</tbody>';
	  } 
$dates.='</table>';
						
echo $dates;

