<?php
 include("index_layout.php");
 include("database.php");
 ?>
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sports</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Sports
							</div>
							<div class="tools">
                            <a class="" href="sports.php" style="color: white"><i class="fa fa-search">Add sports Gallery</i></a>
							</div>
						</div>
                        <div class="portlet-body form" style="min-height:400px">
						<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
						
                             
                                <div class="form-group col-md-12">
                                <label class="control-label col-md-3">Sports</label>
                                    <div class="col-md-4">
                                        <select class="form-control user" required name="class_id">
                                            <option value="">---Select Sports---</option>
                                                <?php 
                                                $query=mysql_query("select * from `master_sports` where flag='0'");
                                                while($fetch=mysql_fetch_array($query))
                                                {$i++;
                                                $id=$fetch['id'];
                                                $sports_name=$fetch['sports_name'];
                                                ?>
                                            <option value="<?php echo $id; ?>"><?php echo $sports_name; ?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                </div>
             
                            <div id="data"></div>
                         
				
            	</form>
                </div>
			</div>
		</div>
 </div>
</body>
<?php footer(); ?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<script>
	$(document).ready(function() {
		$(".user").live("change",function(){
			var t=$(".user").val();
			 
			$.ajax({
				url: "ajax_view_sports.php?pon="+t,
				}).done(function(response) {
				$("#data").html(""+response+"");
			});
		});	  
	
	});
</script>
<?php scripts();?>

</html>
 

