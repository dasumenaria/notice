<?php
include("index_layout.php");
include("database.php");
$get_event_id=$_GET['event_id'];

if(!empty($_FILES)){
    $targetDir = "uploads/";
    $fileName = $_FILES['file']['name'];

	$rnd=rand(100, 10000);
	$random=$rnd.$get_event_id;
	$photo1="event".$random.".jpg";

	
    $targetFile = $targetDir.$photo1;
    if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
        //insert file information into db table
		
		$r1=mysql_query("select * from gallery where event_id='$get_event_id' AND type='1'");		
		$row1=mysql_fetch_assoc($r1);
		if(empty($row1))
		{
		$type=1;
		$sql="insert into gallery(event_id, type)values('".$get_event_id."','".$type."')";
		$r=mysql_query($sql);
		$ids=mysql_insert_id();	
		$sql="insert into sub_gallery(gallery_id, gallery_pic)values('".$ids."','".$photo1."')";
		$r=mysql_query($sql);	
		}
		else{
		$r1=mysql_query("select * from gallery where event_id='$get_event_id' AND type='1'");		
		$row1=mysql_fetch_assoc($r1);
		$ids=$row1['id'];
		$sql="insert into sub_gallery(gallery_id, gallery_pic)values('".$ids."','".$photo1."')";
		$r=mysql_query($sql);
		}

   }
  }
?>