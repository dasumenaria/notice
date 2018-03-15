<?php 
session_start();
include("database.php");
$to=$_GET['to'];
$from=$_GET['from'];
$view_u=$_GET['view_u'];
$qry='';
if(!empty($from) && !empty($to))
{
	$from=date('Y-m-d',strtotime($from));
	$to=date('Y-m-d',strtotime($to));
	
	$qry.="`curent_date` BETWEEN '".$from."' and '".$to."' && ";	
}

if(!empty($view_u))
{  
	if($view_u == 1) 
	{
		$qry.="";
	}
	else
	{
		$qry.=" (`role_id`='".$view_u."' || `role_id`='1' ) && ";
	}
}
$filename = "Faculty Result.xls";
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
$flag = false;
ini_set('max_execution_time', 10000);

$qry.=" `flag`= 0  order by id Desc ";
 
 
	$datta.='<div style="margin-top:10px">	
	<table border="1">
 
								<thead>
								<tr>
									<th> #</th>
									<th>Name</th>
									<th>User Name</th>
									<th>Mobile No</th>
									<th>Class</th>
									<th>Section</th>
									<th>address</th>
									<th>Registration Date</th>
									<th>Role</th>
								</tr>
								</thead><tbody>';
							 
					$r1=mysql_query("select * from faculty_login where ".$qry." ");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$id=$row1['id'];
					$user_name=$row1['user_name'];
					$name=$row1['name'];
                    $role_id=$row1['role_id'];
					$class_id=$row1['class_id'];
$dasdas=mysql_query("select * from master_class where id='".$class_id."'");		
$fetc=mysql_fetch_array($dasdas);
$class_name=$fetc['class_name'];

					$section_id=$row1['section_id'];
$dasdasdasd=mysql_query("select * from master_section where id='".$section_id."'");		
$fetcasd=mysql_fetch_array($dasdasdasd);
$section=$fetcasd['section_name'];
					$address=$row1['address'];
					$curent_date=$row1['curent_date'];
					$mobile_no=$row1['mobile_no'];
					                              
$r2=mysql_query("select * from master_role where id='".$role_id."'");		
$fet=mysql_fetch_array($r2);
$role_name=$fet['role_name'];
			 
								$datta.='
								<tr>
									<td>'.$i.'</td>
									<td>'.$name.'</td>
									<td>'.$user_name.'</td>
									<td>'.$mobile_no.'</td>
									<td>'.$class_name.'</td>
									<td>'.$section.'</td>
									<td>'.$address.'</td>
                                    <td>'.$curent_date.'</td>
                                    <td>'.$role_name.'</td>
								</tr>
								';
					}
								$datta.='</tbody></table>
							</div>';
	echo $datta;								