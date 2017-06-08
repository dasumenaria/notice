<?php
 include("index_layout.php");
 include("database.php");
$session_id=$_SESSION['id'];
 date_default_timezone_set('Asia/Calcutta');
ini_set('max_execution_time', 100000); 
if(isset($_POST['submit']))
{
 
$class_id=$_POST["class_id"];
$section_id=$_POST["section_id"];
$subject_id=$_POST["subject_id"];
$date=$_POST["date"];
$date_chng=date('Y-m_d',strtotime($date));
$time=$_POST["time"]; 
$reason=$_POST["reason"];
    
/*   echo "insert into extra_classes(class_id,section_id,subject_id,date,time,reason)values('$class_id','$section_id','$subject_id','$date_chng','$time','$reason')";
exit;  */
$sql="insert into extra_classes(user_id,class_id,section_id,subject_id,date,time,reason)values('$session_id','$class_id','$section_id','$subject_id','$date_chng','$time','$reason')";
$r=mysql_query($sql);
	 
	 

}
	else
	{
		echo mysql_error();
	}
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Extra Classes</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Extra Classes
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
					 <div id="data">
					 
					 
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
			

$(".chk_input").live("click",function(){
				  
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
			
 		 $(".user").live("change",function(){
		 		   var t=$(this).val();
				   
  		  	$.ajax({
			url: "ajax_extra_classes.php?pon="+t,
			}).done(function(response) {

		   $("#dt").html(""+response+"");
		    
			
			});
			  });	 

   			  $(".user1").live("change",function(){
				  var t=$(".user").val();
	 			   var s=$(this).val();
				   
				    $.ajax({
			url: "ajax_extra_classes.php?pon="+t+"&pon1="+s,
			}).done(function(response) {
		   $("#data").html(""+response+"");
	 
		   });
			  });	  
 			  
		 });
	</script>


<?php scripts();?>

</html>
 

