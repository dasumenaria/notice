<?php
 include("index_layout.php");
 include("database.php");
   ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Routes</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Bus Routes
							</div>
							<div class="tools">
							 
								
							</div>
						</div>
						<div class="portlet-body form">
						 
<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
					<br/>
					<div class="form-group">
							<label class="control-label col-md-3">Vehicle No</label>
							<div class="col-md-4">
							   
 
									<select class="form-control user select2me" name="vehicle_id" required  >
									<option value="">---Select---</option>
								    <?php 
									$query=mysql_query("select * from `master_bus` where flag='0'");
									while($fetch=mysql_fetch_array($query))
									{$i++;
										$id=$fetch['id'];
										$vehicle_no=$fetch['vehicle_no'];
									?>
									<option value="<?php echo $id; ?>"><?php echo $vehicle_no; ?></option>
									<?php } ?>
									</select>
								 
								 
							</div>
						</div>
					 <div id="data"></div>
					 
				<div class="form-actions top">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<a href="" class="btn green vid" >Edit</a>
							</div>
						</div>
					</div>	

				</form>
						</div>
					</div>
			</div></div>
</body>
<?php footer(); ?>

<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<script>
		$(document).ready(function() {
 			
 		 $(".user").live("change",function(){
			  
		 		   var t=$(this).val();
				   $('.vid').attr('href','edit_bus_routes.php?v_id='+t+'');
				     $.ajax({
			url: "ajax_bus_routes.php?pon="+t,
			}).done(function(response) {
				
		   $("#data").html(""+response+"");
	 
		   });
			  });	 

   			  
		 });
	</script>

<?php scripts();?>

</html>
 

