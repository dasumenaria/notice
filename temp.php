<?php 
include("database.php");

$firstSearch=mysql_query("select * from `login`");		
$i=0;
while($row=mysql_fetch_array($firstSearch))
{	
	/*$i++;
	$id=$row['id'];
	$dob=$row['dob'];
	$exdob=explode('/', $dob);
	
	$datedob=$exdob[0].'-'.$exdob[1].'-'.$exdob[2];
	//$dob=date('d-m-Y', strtotime($dob));
	$date_of_birth=date('Y-m-d', strtotime($datedob));
	$eno=$row['eno'];
	$password=md5($eno);
	
	mysql_query("update `login` set `dob` = '$date_of_birth' , `password` = '$password'  where `id` = '$id' ");
	echo "update `login` set `dob` = '$date_of_birth' , `password` = '$password'  where `id` = '$id' <br>";	
	//if($i==10){ exit;}	
	*/
	$name=$row['name'];	
	$dob=$row['dob'];
	$year=date('Y', strtotime($dob));
	$exdobname=explode(' ', $name);
	$first_name=$exdobname[1];
	echo $user_name=$first_name.$year.'<br />';

}

 ?>