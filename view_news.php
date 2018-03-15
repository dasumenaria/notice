<?php
include("index_layout.php");
include("database.php");
$user=$_SESSION['category'];

if(isset($_POST['sub_del']))
{
	$delet_model=$_POST['delet_model'];
	$r=mysql_query("update `news` SET `flag`='1' where id='$delet_model'" );
	$sql=mysql_query($r);
}
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Event</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i> View News
					</div>
				<div class="tools">
					<a class="" href="create_news.php" style="color:white"><i class="fa fa-plus">&nbsp;Add News</i></a>
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
										$r1=mysql_query("select * from master_role where id=1 OR id=4 OR id=5");		
										$i=0;
										while($row1=mysql_fetch_array($r1))
										{
											$id=$row1['id'];
											$role_name=$row1['role_name'];
										?>
										<option value="<?php echo $id;?>"><?php echo $role_name;?></option>                              
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
				url: "ajax_view_news.php?view_u="+view_u+"&to="+to+"&from="+from,
				}).done(function(response) {
				$("#data").html(""+response+"");
				});
	});
});
</script>
<?php scripts();?>

</html>

