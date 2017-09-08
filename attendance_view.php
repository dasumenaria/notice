<?php
 include("index_layout.php");
 include("database.php");
 
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Report | Attendance</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Attendance View
							</div>
							<div class="tools">
							
							
							</div>
						</div>
						<div class="portlet-body form">
						 
<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Class</label>
							<div class="col-md-4">
							   <div class="input-icon right">
									<i class="fa"></i>
									<select class="form-control user" required name="class_id" >
									<option value="">---Select Class---</option>
								    <?php 
									$query=mysql_query("select * from `master_class` order by `id`");
									while($fetch=mysql_fetch_array($query))
									{$i++;
										$class_id=$fetch['id'];
										$roman=$fetch['roman'];
									?>
									<option value="<?php echo $class_id; ?>"><?php echo $roman; ?></option>
									<?php } ?>
									</select>
								</div>
								<span class="help-block">
								please select Class</span>
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
		 
		$.ajax(
		{
			url: "ajax_attendance_view.php?pon="+t,
		}).done(function(response) 
		{
			$("#dt").html(""+response+""); 
		});
	});	 

	$(".user1").live("change",function()
	{
		 			    
		var s=$(this).val();
		var c = $('.user').val();
		var t = '';
 		$.ajax({
		url: "ajax_attendance_view.php?pon1="+s+"&pon2="+t+"&pon="+c,
		}).done(function(response) 
		{
			$("#data").html(""+response+"");
		});
	});

	$(".user2").live("change",function()
	{
		 			    
		var sb=$(this).val();
		var t=$(".user").val();
		var s=$(".user1").val();
		var d=$(".user3").val()

		$.ajax({
		url: "ajax_attendance_view.php?pon="+t+"&pon1="+s+"&pon2="+sb+"&dt="+d,
		}).done(function(response) 
		{
			$("#data").html(""+response+"");
		});
	});

	$(".user3").live("change",function()
	{
		var t=$(".user").val();
		var s=$(".user1").val();
		var sb=$(".user2").val();
		var d=$(this).val();
		$.ajax({
		url: "ajax_attendance_view.php?pon="+t+"&pon1="+s+"&pon2="+sb+"&dt="+d,
		}).done(function(response) 
		{
			$("#data").html(""+response+"");
		});
	});


});
</script>


<?php scripts();?>

</html>
 

