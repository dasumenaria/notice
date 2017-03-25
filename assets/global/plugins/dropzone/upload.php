<?php

 include("index_layout.php");
 include("database.php");

 if(!empty($_FILES)){
    $targetDir = "uploads/";
    $fileName = $_FILES['file']['name'];
    $targetFile = $targetDir.$fileName;
	$fa='lo';
    $sql="insert into sub_gallery(gallery_pic)values('$fa')";
	$r=mysql_query($sql);
    if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
        //insert file information into db table
		$f='lo';
	
	$sql="insert into sub_gallery(gallery_pic)values('$f')";
	$r=mysql_query($sql);
   }
  }
?>