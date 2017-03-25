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
								<i class="fa fa-gift"></i> View Attendance Absent list
							</div>
						<!--<div class="tools">
							<a class="" href="timetable.php" style="color:white"><i class="fa fa-plus">&nbsp;Add Time Table</i></a>
							</div>-->
						</div>
						<div class="portlet-body form">
								<div class="form-body">
                                 <div class="row">
								  <div class="col-md-12">
								<div class="form-group">
                                                    <label class="control-label col-md-2">Select Class</label>
													<div class="col-md-3">
                                                   <select class="form-control select select2 select2me input-medium" placeholder="Select class.." name="class_id" id="class_id"><option value=""></option>
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
											
											
											<label class="control-label col-md-2">Select Date</label>
													<div class="col-md-3">
                                                  <input class="form-control form-control-inline input-medium date-picker" required  value="<?php echo date("d-m-Y"); ?>" placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy" type="text" name="date" id="date">
											</div>
											
											 <div class="col-md-2">
                    <label >&nbsp;</label>
                    <button class="btn blue" id="go">Find</button>
				</div>
				</div>

				</div>
				</div>
				<br>
   <div class="row">
								  <div class="col-md-12">
								<div class="form-group">
                                                    <label class="control-label col-md-2">Total Absent</label>
													<div class="col-md-3">
                                                   <select class="form-control select select2 select2me input-medium" placeholder="Select class.." name="class_id" id="class_id"><option value=""></option>
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
											
											
											<label class="control-label col-md-2">Select Date</label>
													<div class="col-md-3">
                                                  <input class="form-control form-control-inline input-medium date-picker" required  value="<?php echo date("d-m-Y"); ?>" placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy" type="text" name="date" id="date">
											</div>
											
											 <div class="col-md-2">
                    <label >&nbsp;</label>
                    <button class="btn blue" id="go">Absent Students</button>
                    </div>
											
											
											
											
                                                    </div>
                                                    
</div>
</div>
<div id="data" class="scroller" style="height:400px; padding-top:5px"  data-always-visible="1" data-rail-visible="0"></div>
</div>
</div></div>
</div></div></div>
</body>

<?php footer();?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){    
        $("#go").die().live("click",function(){
	    var view_u=$("#class_id").val();
		 var date=$("#date").val();
		 
		 if(view_u=="" || date=="")
		 {
			 alert("Please select date or class first! ");
		 }
		 else
		 {
	  	$.ajax({
			url: "ajax_view_att.php?view_u="+view_u+"&date="+date,
			}).done(function(response) {
		   $("#data").html(""+response+"");
			});
		 }
});
});
</script>
<?php scripts();?>

</html>

