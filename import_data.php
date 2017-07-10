<?php
	include("index_layout.php");
	include("database.php");
?>
<?php

	if(isset($_POST["Import"]))
	{
		$filename=$_FILES["file"]["tmp_name"];
		if($_FILES["file"]["size"] > 0)
		{
			$file = fopen($filename, "r");
			$records=0;
			while(($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
				{
					$numcols = count($emapData);
					$check_data[]=$emapData;
				 
					++$records;
				}	
					$i=0;
					$emapData=0;
					$unseppoeted=0;
					$last_row=sizeof($test)+1;
				print_r($check_data);	
				foreach($check_data as $value)
					{ 
						$i++;
						$name=$value[1];
					 }
						if(!empty($value[1]))
						{
							echo $name=$value[1];
						}
						else
						{
							echo $name='Other';
						}
						exit;
	}}
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
