<?php
 include("index_layout.php");
 include("database.php");
@$session_id=$_SESSION['id'];
 date_default_timezone_set('Asia/Calcutta');
ini_set('max_execution_time', 100000); 
if(isset($_POST['submit']))
{
echo $student_id=$_POST["student_id"];
$achivement=$_REQUEST["achivement"];
$rank=$_REQUEST["rank"];
$date_current=date('Y-m-d');
 
 $i=0;
  foreach($achivement as $value){

		 $achive=$achivement[$i];
	 	 $rank=$value;
//echo"insert into achivements(student_id,achivement,rank,curent_date)values('$student_id','$achive','$rank','$date_current')";
//exit;
$sql="insert into achivements(student_id,achivement,rank,curent_date)values('$student_id','$achive','$rank','$date_current')";
$r=mysql_query($sql);
	 $i++;
	 }
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
<title>Achivement</title>
</head>
<?php contant_start(); menu();  ?>
<body>
 	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Achivement
							</div>
							<div class="tools">
							 
								
							</div>
						</div>
						<div class="portlet-body form">
						 
<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Student Name</label>
							<div class="col-md-4">
							   <div class="input-icon right">
									<i class="fa"></i>
									<select class="form-control user" required name="student_id" >
									<option value="">---Select Name---</option>
								    <?php 
									$query=mysql_query("select * from `login`where flag='0' order by id ASC");
									while($fetch=mysql_fetch_array($query))
									{$i++;
										$id=$fetch['id'];
										$name=$fetch['name'];
									?>
									<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
									<?php } ?>
									</select>
								</div>
								<span class="help-block">
								please select Name</span>
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
			url: "ajax_achivements.php?pon="+t,
			}).done(function(response) {

		   $("#dt").html(""+response+"");
		    
			
			});
			  });	 

   			  $(".user1").live("change",function(){
				  var t=$(".user").val();
	 			   var s=$(this).val();
				   
				    $.ajax({
			url: "ajax_achivements.php?pon="+t+"&pon1="+s,
			}).done(function(response) {
				
		   $("#data").html(""+response+"");
	 
		   });
			  });	  
 			  
		 });
	</script>


<?php scripts();?>

</html>
 

