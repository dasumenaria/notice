<?php
 include("index_layout.php");
 include("database.php");
   ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attendance</title>
</head>
<?php contant_start(); menu();  ?>
<body>
<div class="page-content-wrapper">
	<div class="page-content">
		 <div class="portlet box ">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Attendance
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									 
									<div class="col-md-3">
										<div class="btn-group">
										<label>Student Class</label>
											<select class="select2_category form-control select2me" id="spnsr" data-placeholder="Choose a Category" tabindex="1" name="bs_fc" style="width:200px;">
											<option value="">----Select class----</option>
											<?php
				 
				$query=mysql_query("select `id`,`class_name` from `master_class` where flag=0  order by id Asc ");
				while($fetch=mysql_fetch_array($query))
				{
			 		$id=$fetch['id'];
					$class_name=$fetch['class_name'];
 				?>
											<option value="<?php echo $id; ?>"><?php echo $class_name;?></option>
											 
				<?php } ?>				
											</select>
										</div>
									</div>
									
									<div class="col-md-3" style="margin-top:22px;">
										<div class="form-group">
										<div class="col-md-3">
									 
											<div style="margin-top:1px;"class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
	 										
												<input type="text" class="form-control" id="from" placeholder="From Date">
												<span class="input-group-addon">
												to </span>
												<input type="text" class="form-control"  id="to"name="to" placeholder="To Date">
											</div>
											<!-- /input-group -->
											 
										</div>
									</div>
									</div>
									 
									<div class="col-md-3" style="margin-left:120px;margin-top:22px;">
										<div class="form-group">
										<div class="col-md-3">
							<div class="input-icon right">
							<i class="fa"></i>
								<button type="button" name="sub" class="btn green chk_input cl">Submit</button>
							</div>
 
							</div>	
									</div>
									</div>
								 </div>
							</div>
							<div id="data" >
							 
							</div>
						</div>
					</div>
	</div>
</div>
</body>
<?php footer(); ?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
  
 <script>
	$(document).ready(function() {
 
$(".chk_input").live("click",function(){	

	var froms= $('#from').val();			   
	var tos= $('#to').val();
	var spnsr=$('#spnsr').val();
 
	$.ajax({
		url: "ajax_class_attendance.php?from="+froms+"&to="+tos+"&spnsr="+spnsr,
		}).done(function(response){
				$("#data").html(""+response+"");
		});
		
	});
});
</script>
 
 
 
 <?php scripts();?>

</html>
 

