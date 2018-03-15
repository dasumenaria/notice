<?php
 include("index_layout.php");
 include("database.php");
 $user=@$_SESSION['category'];
 $user_id=@$_SESSION['id'];

 if(isset($_POST['sub_del']))
{
  $delet_model=$_POST['delet_model'];
   $r=mysql_query("update `acedmic_calendar` SET `flag`='1' where id='$delet_model'" );
    $sql=mysql_query($r);
  }
$message=""; 
if(isset($_POST['sub_edit']))
{
	$type=mysql_real_escape_string($_REQUEST["category_id"]);
	$name=mysql_real_escape_string($_REQUEST["name"]);
	$edit=mysql_real_escape_string($_REQUEST["edit_id"]);
	$date1=mysql_real_escape_string($_REQUEST["date"]);
	$date=date('Y-m-d',strtotime($date1));
	$d = date_parse_from_format("Y-m-d", $date);
	$curent_date=date('Y-m-d');
	$x_d=$d["month"];
	$r=mysql_query("update `acedmic_calendar` SET `category_id`='$type',`description`='$name',`date`='$date',`user_id`='$user_id',`tag`='$x_d' where id='$edit'" );
	$message="Calendar Update Successfully ";
}
   ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Calendar</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i> View Calendar
					</div>
				<div class="tools">
					<a class="" href="academy_calendar.php" style="color:white"><i class="fa fa-plus">&nbsp;Add Calendar</i></a>
					</div>
				</div>
				<div class="portlet-body form">
					<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
						<div class="form-body">
						<div class="row col-md-12">
							<div class="form-group col-md-6">
								<label class="control-label col-md-3">Select Date</label>
								<div class="col-md-4">
									<div class="input-group input-large date-picker input-daterange" data-date-format="dd-mm-yyyy">
										<input type="text" class="form-control" id="from">
										<span class="input-group-addon">
										to </span>
										<input type="text" class="form-control" id="to">
									</div>
								</div>
							</div>
							<div class="form-group col-md-4">
								<label class="col-md-3 control-label" style="text-align:right">Select</label>
								<div class="col-md-4">
									<select name="role_id" class="form-control select2me input-medium" placeholder="Select..." id="view_u">
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
									</select>
								</div>
							</div>
							<div class="form-group col-md-2" style="margin-left:50px">
								<button class="btn btn blue view_u" type="button">Go</button>
							</div>
						</div>
						</br>
						</br>
						</br>
						<center>
						<div id="data" class="scroller" style="height:400px; padding-top:5px"  data-always-visible="1" data-rail-visible="0">
						
						</div>
						</center>
			</div>
		</form>
</div></div>
</div></div></div>
</body>

<?php footer();?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){    
	$(".view_u").die().live("click",function(){
			$("#data").html("<img height='50px' src='img/loading.gif'/>");
			var view_u=$("#view_u").val();
			var to=$("#to").val();
			var from=$("#from").val();
			if(view_u.length>0){}else{ view_u='';}
			if(to.length>0){}else{ to='';}
			if(from.length>0){}else{ from='';}
			 
			$.ajax({
				url: "ajax_view_cal.php?view_u="+view_u+"&to="+to+"&from="+from,
				}).done(function(response) {
				$("#data").html(""+response+"");
				$('.date-picker').datepicker(); 
				});
	});
});
</script>
 

<?php scripts();?>

</html>