<?php
include("index_layout.php");
include("database.php");
@session_start();
$user_id=@$_SESSION['id'];
$message=""; 
if(isset($_POST['submit']))
{
	$type=mysql_real_escape_string($_REQUEST["category_id"]);
	$name=mysql_real_escape_string($_REQUEST["name"]);
	$date1=mysql_real_escape_string($_REQUEST["date_from"]);
	$date_to=mysql_real_escape_string($_REQUEST["date_to"]);
	$date=date('Y-m-d',strtotime($date1));
	$date_to_cahnged=date('Y-m-d',strtotime($date_to));
	 
	
	$result1 = array();
	$currentTime = strtotime($date);
		$endTime = strtotime($date_to_cahnged);
	while ($currentTime <= $endTime) 
	{
		  if (date('N', $currentTime) < 8)
		  {
			$result1[] = date('Y-m-d', $currentTime);
		  }
		  $currentTime = strtotime('+1 day', $currentTime);
	}
	foreach($result1 as $value)
	{
		$d = date_parse_from_format("Y-m-d", $value);
		$curent_date=date('Y-m-d');
		$x_d=$d["month"];
		$sql="insert into acedmic_calendar(category_id,description,date,tag,curent_date,user_id)values('$type','$name','$value','$x_d','$curent_date','$user_id')";
		$r=mysql_query($sql); 
	}
 	$message="Calendar Added Successfully ";
	$eventid=mysql_insert_id();
}
?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Academic Calendar</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
 			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i>Academic Calendar
					</div>
				
					<div class="tools">
					<a class="" href="view_academy_calendar.php" style="color:white"><i class="fa fa-plus">&nbsp;View Calendar</i></a>
					</div>
				</div>
				<div class="portlet-body form">
<?php if($message!="") { ?>
<div id="success" class="alert alert-success" style="margin-top:10px; width:50%">
<?php echo $message; ?>
</div>
<?php } ?>
							<form class="form-horizontal" role="form" id="form_sample_2" method="post" enctype="multipart/form-data">
								<div class="form-body">
                               	<div class="form-group">
											<label class="col-md-3 control-label">Select Category <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-4">
                                        <select name="category_id" required class="form-control select select2 select2me" placeholder="Select..." id="category_id">
                                         <option value=""></option>
                                            <?php
                                            $r1=mysql_query("select * from master_category");		
                                            $i=0;
                                            while($row1=mysql_fetch_array($r1))
                                            {
                                            $id=$row1['id'];
                                            $category_name=$row1['category_name'];
                                            ?>
                              <option value="<?php echo $id;?>"><?php echo $category_name;?></option>                              
                              <?php }?> 
                              <select/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Description <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-4">
										<textarea class="form-control " required placeholder="Date From - To  / or  Title/Description etc." type="text" name="name" value=""></textarea>
										</div>
									</div>
 									<div class="form-group">
										<label class="col-md-3 control-label"> Date From<span class="required" aria-required="true"> * </span></label>
										<div class="col-md-4">
											<input class="form-control form-control-inline input-md date-picker" required id="field_5" value="<?php echo date("d-m-Y"); ?>" placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy" type="text" name="date_from">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label"> Date to<span class="required" aria-required="true"> * </span></label>
										<div class="col-md-4">
											<input class="form-control form-control-inline input-md date-picker" required id="field_5" value="<?php echo date("d-m-Y"); ?>" placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy" type="text" name="date_to">
										</div>
									</div>
								</div>
								<div class=" right1" align="center" style="margin-right:10px">
									<button type="submit" class="btn green" name="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
			
			
			</div></div>
</body>

<?php footer();?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
<?php if($eventid>0){ ?>
var update_id = <?php echo $eventid; ?>;
		$.ajax({
			url: "notification_page.php?function_name=create_academy_notify&id="+update_id,
			type: "POST",
			success: function(data)
			{   
 			}
		});
<?php } ?>
</script>
<script>
		var myVar=setInterval(function(){myTimerr()},4000);
		function myTimerr() 
		{
		$("#success").hide();
		} 
		</script>
<?php scripts();?>

</html>

