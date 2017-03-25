<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];
 $ids=$_GET['event_id'];
 $ititle=$_GET['title'];

  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="assets/global/plugins/dropzone/css/dropzone.css" rel="stylesheet"/>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Add More Images for Event: <?php echo $ititle;?>
							</div>
							<div class="tools">
							
							</div>
						</div>
						<div class="portlet-body form">
						
						<div class="row">
				<div class="col-md-12">
					
					<form action="upload.php?event_id=<?php echo $ids;?>" class="dropzone" id="my-dropzone" enctype="multipart/form-data">
					</form>
				</div>
			</div>
                      
			
			</div></div></div></div>
</body>

<?php footer();?>	
<script src="assets/global/plugins/dropzone/dropzone.js"></script>
<script src="assets/admin/pages/scripts/form-dropzone.js"></script>
<script>
jQuery(document).ready(function() {
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
         FormDropzone.init();
});
</script>			
<?php scripts();?>

</html>