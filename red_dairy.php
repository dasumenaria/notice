<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];
if(isset($_POST['sub_del']))
{
	$delet_student=$_POST['delet_student'];
	$r=mysql_query("update `remarks` SET `flag`='1' where id='$delet_student'" );
	$sql=mysql_query($r);
}
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Red Dairy</title>
</head>
<?php contant_start(); menu();  ?>
<body>
<div class="page-content-wrapper">
<div class="page-content">
<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-globe"></i>Red Dairy View
        </div>
		<div class="tools">
			 <a class="" href="add_red_dairy.php" style="color: white"><i class="fa fa-book"> Add Dairy</i></a> 
			</div>
    
    </div>
    <div class="portlet-body">
        
    <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
	<div class="row">
	<div class="col-md-4 col-sm-12">
			<div id="sample_1_length"><label> Class</label>
				<select name="sample_1_length" id="cls" class="form-control users select2me">
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
		<div class="col-md-4 col-sm-12">
			<div id="sample_1_length"><label> Section</label>
				<select name="sample_1_length" id="sec" class="form-control users select2me">
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
		<div class="col-md-4 col-sm-12">
			<div id="sample_1_length"><label>Name</label>
				<select name="sample_1_length" id="users" class="form-control users select2me">
					<option value="">Select</option>
					<?php
					$r1=mysql_query("select * from login where flag='0'");
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
						$i++;
						$id=$row1['id'];
						$name=$row1['name'];
					?> 
					<option value="<?php echo $id?>"><?php echo $name?></option>
				<?php } ?>
				</select>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top:10px">
		<div class="col-md-4 col-sm-12">
			<div class="form-group col-md-12">
				<label class="">Select Date</label>
				<div >
					<div class="input-group input-large date-picker input-daterange" data-date-format="dd-mm-yyyy">
						<input type="text" class="form-control users" id="from">
						<span class="input-group-addon">
						to </span>
						<input type="text" class="form-control users" id="to">
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-12">
			<div id="sample_1_length"><label> Mode of Complaint</label>
				<select name="mode_of_complaint" id="moc" required class="form-control users select2me">
								<option value="">Select</option>
								<option value="Phone Call">Phone Call</option>
								<option value="Walk-in">Walk-in</option>
								<option value="School Diary">School Diary</option>
								<option value="Parent's Contact">Parent's Contact</option>
							</select>
			</div>
		</div> 
	</div>
	<center>
		<button type="button" id="report" class="btn btn-sm blue"> Report</button>

	
			<div id="data" class="scroller" style="height:400px; padding-top:5px"  data-always-visible="1" data-rail-visible="0">
			</div>
		</center>
		</div>
	</div>
</div>



</div>
</div>
</div>
</body>

<?php footer();?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){    
        $("#report").die().live("click",function(){
			$("#data").html("<img height='50px' src='img/loading.gif'/>");
			var stdn_name=$("#users").val();
			var stdn_cls=$("#cls").val(); 
			var stdn_sec=$("#sec").val();
			var moc=$("#moc").val();
			var from=$("#from").val();
			var to=$("#to").val();
		 	$.ajax({
			url: "ajax_red_dairy.php?stdn_name="+stdn_name+"&stdn_cls="+stdn_cls+"&stdn_sec="+stdn_sec+"&moc="+moc+"&from="+from+"&to="+to,
			}).done(function(response) {
				$("#data").html(""+response+"");
			});
});
});
</script>
<?php scripts();?>

</html>


