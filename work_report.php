<?php
 include("index_layout.php");
 include("database.php");
 
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Report | Work</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Work Report
							</div>
							<div class="tools">
							
							
							</div>
						</div>
						<div class="portlet-body form">
						 
<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Teacher</label>
							<div class="col-md-4">
							   <div class="input-icon right">
									<i class="fa"></i>
									<select class="form-control user" required name="class_id" >
									<option value="">---Select teacher---</option>
								    <?php 
									$query=mysql_query("select `user_name`,`id` from `faculty_login` order by `user_name`");
									while($fetch=mysql_fetch_array($query))
									{$i++;
										$fac_id=$fetch['id'];
										$fac_name=$fetch['user_name'];
									?>
									<option value="<?php echo $fac_id; ?>"><?php echo $fac_name; ?></option>
									<?php } ?>
									</select>
								</div>
								<span class="help-block">
								please select Teacher</span>
							</div>
						</div>
					<div id="dt"></div>
					
					 <div id="data"> </div>
					<div id="si"></div>
					<div id="ext"></div>
					 	 
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


	$(".chk_input").live("click",function()
	{

		var attr_val= $(this).attr('chk_val');			   
		var valu=$(this).is( ':checked' );

		if(valu==0)
		{
			$(".all_chk"+attr_val ).parent('span').removeClass('checked');
			$(".all_chk"+attr_val ).removeAttr('checked','checked');
		}
		else
		{
			$(".all_chk"+attr_val ).parent('span').addClass('checked');
			$(".all_chk"+attr_val ).attr('checked','checked');
		}
	});

	$(".user").live("change",function()
	{
		var t=$(this).val();
		 $("#data").html('<span class="loading_span" align="center">Loading...</span>');
		$.ajax(
		{
			url: "ajax_work_report.php?pon="+t,
		}).done(function(response) 
		{
			$("#data").html(""+response+""); 
		});
	});
  
});
</script>


<?php scripts();?>

</html>
 

