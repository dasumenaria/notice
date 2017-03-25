<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];

  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> View Time Table
							</div>
						<div class="tools">
							<a class="" href="timetable.php" style="color:white"><i class="fa fa-plus">&nbsp;Add Time Table</i></a>
							</div>
						</div>
						<div class="portlet-body form">
						<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
                                 <div class="row">
								<div class="form-group">
                                                    <label class="control-label col-md-4">Class</label>
													<div class="col-md-3">
                                                   <select class="form-control select select2 select2me" placeholder="Select class.." name="class_id" id="class_id"><option value=""></option>
                                                   <?php
                                            $r1=mysql_query("select * from master_class");		
                                            $i=0;
                                            while($row1=mysql_fetch_array($r1))
                                            {
                                            $id=$row1['id'];
                                            $class_name=$row1['class_name'];
                                            ?>
                                            <option value="<?php echo $id;?>"><?php echo $class_name;?></option>
                                            <?php } ?>
                                            </select>
											</div>
											
											
                                                    </div>
                                                    
</div>
</div>
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
        $("#class_id").die().live("change",function(){
	    var view_u=$("#class_id").val();
		var delete_name="";
	  	$.ajax({
			url: "ajax_view_timetable.php?view_u="+view_u+"&delete_name="+delete_name,
			}).done(function(response) {
		   $("#data").html(""+response+"");
			});
});

 $("#delete_id").die().live("click",function(){
	    var delete_name=$("#delete_name").val();
		var view_u=$("#class_id").val();
	  	$.ajax({
			url: "ajax_view_timetable.php?delete_name="+delete_name+"&view_u="+view_u,
			}).done(function(response) {
		   $("#data").html(""+response+"");
			});
});


});
</script>
<?php scripts();?>

</html>

