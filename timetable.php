<?php
 include("index_layout.php");
 include("database.php");
@$session_id=@$_SESSION['id'];
 date_default_timezone_set('Asia/Calcutta');
ini_set('max_execution_time', 100000); 

if(isset($_POST['submit']))
{
	$class_id=$_REQUEST["class_id"];
	$section_id=$_REQUEST["section_id"];
	$subject_id=$_REQUEST["subject_id"];
	$time_from=$_REQUEST["time_from"];
	$time_to=$_REQUEST["time_to"]; 
	$date_current=date('Y-m-d');
	$i=0;
	 foreach($subject_id as $value)
	 {
		 $t_f=$time_from[$i];
	 	 $subject_id=$value;
		 $t_t=$time_to[$i];
 
	$q="SELECT `id` from `time_table` where `class_id`='$class_id' && `section_id`='$section_id' && `subject_id`='$subject_id'";
	$f=mysql_query($q);
	$r=mysql_num_rows($f);	
	
		if($r>0)
		{	
			$ftc=mysql_fetch_array($f);
			$id=$ftc['id']; 
			$sql1="update `time_table` SET `user_id`='$session_id',`class_id`='$class_id',`section_id`='$section_id',`subject_id`='$subject_id',`time_from`='$t_f',`time_to`='$t_t',`curent_date`='$date_current' where `id`='".$id."'";
			$r1=mysql_query($sql1);		  
		}
		else
		{
		
			$sql="insert into time_table(user_id,class_id,section_id,time_from,time_to,subject_id,curent_date)values('$session_id','$class_id','$section_id','$t_f','$t_t','$subject_id','$date_current')";
			$r=mysql_query($sql);
				 $i++;
		 }
	 }
}
	 
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Time Table</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Time Table
							</div>
							<div class="tools">
							 <a class="" href="view_timetable.php" style="color:white"><i class="fa fa-plus">&nbsp;View Time Table</i></a>
								
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
	url: "ajax_time_table.php?pon="+t,
	}).done(function(response) {
	
	$("#dt").html(""+response+"");
	  
	
	});
});	 

	$(".user1").live("change",function(){
		var t=$(".user").val();
		var s=$(this).val();
		
		$.ajax({
		url: "ajax_time_table.php?pon="+t+"&pon1="+s,
		}).done(function(response) {
		
		$("#data").html(""+response+"");
		 
		
		});

	});	  

});
	</script>


<?php scripts();?>

</html>
 

