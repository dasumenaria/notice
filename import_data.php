<?php
 include("index_layout.php");
 include("database.php");
 ?>
 <?php
if(isset($_POST["Import"])){
 		$filename=$_FILES["file"]["tmp_name"];
 		 if($_FILES["file"]["size"] > 0)
		 {
 		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
				 
				  $mdeno=md5($emapData[6]);
	           $sql = "INSERT into login (`name`,`father_name`,`mother_name`,`dob`,`address`,`eno`,`role_no`,`class_id`,`section_id`,`image`,`user_id`,`role_id`,`school_id`,`notification_key`,`password`) 
	            	values('$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','$emapData[9]','$emapData[10]','$emapData[11]','$emapData[12]','$emapData[13]','$emapData[14]','$mdeno')";
	          $result = mysql_query( $sql);
			   	if(! $result )
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"import_data.php\"
						</script>";
				}
 }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file

    	         echo "<script type=\"text/javascript\">
    						alert(\"CSV File has been successfully Imported.\");
    						window.location = \"import_data.php\"
    					</script>";
         		 }
    	}	 
    ?>		


	
	
	
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Import Student Data</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Import Student Data
							</div>
							
						</div>
						<div class="portlet-body form">
								<div class="form-body">
								 <div class="table-scrollable">
								 
								 <form class="form-horizontal well" method="post" name="upload_excel" enctype="multipart/form-data">
								 
								<div style="float:right"><a href="img/formate.csv" download>CSV Format - Download Link</a></div>
								 
    					<fieldset>
    						<legend>Import CSV/Excel file</legend>
    						<div class="control-group">
    							
    							<div class="controls">
    								<input type="file" name="file" id="file" class="input-large">
    							</div>
    						</div>
         						<div class="control-group">
    							<div class="controls">
    							<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
    							</div>
    						</div>
    					</fieldset>
    				</form>
								 
								 

							</div>
							</div>
							</div>
							</div>
							</div></div>
</body>

<?php footer();?>
<?php scripts();?>

</html>
