<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];
  $datet=date('Y-m-d');
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> View Events</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> View Events
							</div>
						</div>
						<div class="portlet-body form">
						<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
                                 <div class="row">
								 <div class="col-md-12">
								<div class="form-group">
										<label class="col-md-2 control-label" style="text-align:right">Select Role Wise</label>
										<div class="col-md-3">
                                        <select name="role_id" class="form-control select select2 select2me input-medium" placeholder="Select..." id="view_u">
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
                              <select/>
</div>

<label class="col-md-2 control-label" style="text-align:right">Select Month Wise</label>
										<div class="col-md-3">
                                       		<select name="event_id"  class="date_wise_event form-control select2me select2 select" placeholder="Select Month.." >
								<option value=""></option>
								<option value="01">January</option> 
<option value="02">February</option> 
<option value="03">March</option> 
<option value="04">April</option> 
<option value="05">May</option> 
<option value="06">June</option> 
<option value="07">July</option> 
<option value="08">August</option> 
<option value="09">September</option> 
<option value="10">October</option> 
<option value="11">November</option> 
<option value="12">December</option> 
								<select/>
</div>
</div></div></div>
<div id="data" class="scroller" style="height:400px; padding-top:5px"  data-always-visible="1" data-rail-visible="0"></div>
</div>
</form>
</div></div>
</div></div></div>
</body>

<?php footer();?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<script>
$(document).ready(function(){
	$('#search').keyup(function() 
	{
		var $rows = $('#mytbl tbody tr');
		var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
		$rows.show().filter(function() {
			var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
			return !~text.indexOf(val);
		}).hide();
	});
	});
	</script>

<script>
$(document).ready(function(){
 $(".date_wise_event").change(function(){
 var ids=$(this).val();
    $.ajax({
			url: "ajax_date_wise_event.php?date_wise_event_id="+ids,
			}).done(function(response) {
		   $("#data").html(""+response+"");
			});

 });
});
</script>

<script>
$(document).ready(function(){    
        $("#view_u").die().live("change",function(){
	    var view_u=$("#view_u").val();
	  	$.ajax({
			url: "das_ajax_view_events.php?view_u="+view_u,
			}).done(function(response) {
		   $("#data").html(""+response+"");
			});
});
});
</script>

<?php scripts();?>

</html>

