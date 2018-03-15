<?php
include("index_layout.php");
include("database.php");
$user=$_SESSION['category'];
$user_id=$_SESSION['id'];
$role_id=$_SESSION['role'];
$message="";	
if(isset($_POST['submit']))
{ 
	$class_id=mysql_real_escape_string($_REQUEST["class_id"]);
	$section_id=mysql_real_escape_string($_REQUEST["section_id"]);
	$student_id=mysql_real_escape_string($_REQUEST["student_id"]);
	$mobile_no=mysql_real_escape_string($_REQUEST["mobile_no"]);
	$mode_of_complaint=mysql_real_escape_string($_REQUEST["mode_of_complaint"]);
	$query=mysql_real_escape_string($_REQUEST["query"]);
	$date=date('Y-m-d');
 
	$sql="insert into inquiry_form set `class_id`='$class_id' ,`section_id`='$section_id', `student_id`='$student_id', `mobile_no`='$mobile_no',`mode_of_complaint`='$mode_of_complaint',`query`='$query',`curent_date`='$date' ,`user_id`='$user_id',`role_id`='$role_id'";  
	$r=mysql_query($sql); 
	$message="Thank You, Complaint added successfully.";
	 
}
?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Complaint </title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Complaint
							</div>
							<div class="tools">
							 <a class="" href="view_inquiry.php" style="color: white"><i class="fa fa-book"> View Complaint</i></a> 
 							</div>
						</div>
						<div class="portlet-body form" style="min-height:480px">
<?php if($message!="") { ?>
<div id="success" class="alert alert-success" style="margin-top:10px; width:50%">
<?php echo $message; ?>
</div>
<?php } ?>	
		<form class="form-horizontal" id="form_sample_2" method="post" enctype="multipart/form-data">
				  <div class="row col-md-12">  
					<div class="col-md-6">
					<div class="col-md-12">
						 <div class="form-group col-md-12">
							<label class="control-label">Class <span class="required" aria-required="true"> * </span></label>
							<select name="sample_1_length" id="cls" required class="form-control users select2me sec">
								<option value="">Select</option>
								<?php
								$r2=mysql_query("select * from master_class where flag='0'");
								$i=0;
								while($row2=mysql_fetch_array($r2))
								{
									$i++;
									echo $class_id=$row2['id'];
									$class_name=$row2['class_name'];
								?> 
								<option value="<?php echo $class_id; ?>"><?php echo $class_name;?></option>
							<?php } ?>
							</select>
						</div>
						</div>
					</div>
					<div class="col-md-6">
						 <div class="form-group col-md-12">
							<label class="control-label">Section <span class="required" aria-required="true"> * </span></label>
							<select name="sample_1_length" id="sec" required class="form-control users select2me sec">
								<option value="">Select</option>
								<?php
								$r3=mysql_query("select * from master_section where flag='0'");
								$i=0;
								while($row3=mysql_fetch_array($r3))
								{
									$i++;
									$id=$row3['id'];
									$section_name=$row3['section_name'];
								?> 
								<option value="<?php echo $id;?>"><?php echo $section_name;?></option>
							<?php } ?>
							</select>
						</div>
					</div>
				  </div>
				  
				  <div class="row col-md-12">   
					<div class="col-sm-6" >
						 <div class="form-group col-sm-12" id="replace_div">
							<div class="col-md-12">
							<label class="control-label">Student <span class="required" aria-required="true"> * </span></label>
							<select name="sample_1_length" id="sec" required class="form-control users select2me sec">
								<option value="">Select</option>
							</select>
						</div>
						</div>
					</div>
					<div class="col-sm-6" >
						 <div class="form-group col-sm-12">
							 
							<label class="control-label">Mobile No </label>
							<input type="text" maxlength="10" minlength="10" placeholder="Provide in number "  name="mobile_no" value="" class="form-control"/> 
						</div>
					</div>
				 </div> 
				 <div class="row col-md-12">
						<div class="col-sm-6">
							 <div class="form-group col-sm-12">
								<div class="col-md-12">
								<label class="">Mode of Complaint <span class="required" aria-required="true"> * </span></label>
								<select name="mode_of_complaint" id="sec" required class="form-control select2me">
									<option value="">Select</option>
									<option value="Phone Call">Phone Call</option>
									<option value="Walk-in">Walk-in</option>
									<option value="School Diary">School Diary</option>
									<option value="Parent's Contact">Parent's Contact</option>
								</select>
							</div>
							</div>
						</div>
						<div class="col-md-6">
							 <div class="form-group col-sm-12">
							<label class="control-label">Complaint <span class="required" aria-required="true"> * </span></label>
							<textarea placeholder="Provide Complaint here." rows="3" required name="query"  class="form-control"></textarea> 
						</div>
					</div>
				</div>
				  
				
				<div class="row col-md-12" style="margin-top: 35px;">
					<div align="center">
						<button type="submit" class="btn green" name="submit">Submit</button>
					</div>
				</div>
				</form>
			</div>
		 </div>
	  </div>
  </div>
 </body>

<?php footer();?>
<script>
var myVar=setInterval(function(){myTimerr()},4000);
function myTimerr() 
{
	$("#success").hide();
}
</script>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){    
	$(".sec").die().live("change",function(){
		//$("#replace_div").html("<img height='30px' src='img/loading.gif'/>");
		var sec_id=$("#sec").val();
		var cls_id =$("#cls ").val(); 
		if(cls_id.length>0 && sec_id.length>0)
		{
			$.ajax({
			url: "ajax_add_red_dairy.php?class="+cls_id +"&section="+sec_id,
			}).done(function(response) {
 				$("#replace_div").html(""+response+"");
			});
		}
		
	});
});
</script>
<?php scripts();?>

</html>

