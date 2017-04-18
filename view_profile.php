<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];
 if(isset($_POST['sub_del']))
{
  $delet_student=$_POST['delet_student'];
   $r=mysql_query("update `login` SET `flag`='1' where id='$delet_student'" );
    $sql=mysql_query($r);
  }
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration View</title>
</head>
<?php contant_start(); menu();  ?>
<body>
<div class="page-content-wrapper">
<div class="page-content">
<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Registration View
							</div>
						
						</div>
						<div class="portlet-body">
							
							<div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
							<div class="row">
							<div class="col-md-6 col-sm-12">
							<div class="dataTables_length" id="sample_1_length"><label>
							<select name="sample_1_length" aria-controls="sample_1" class="form-control input-small input-inline find_records">
                                <option value="300">Select</option>
                                <option value="300">300</option>
                                <option value="600">600</option>
                                <option value="900">900</option>
                                <option value="1200">1200</option>
                                <option value="1500">1500</option>
                                <option value="1800">1800</option>
                                <option value="2100">2100</option>
                                <option value="2400">2400</option>
                                <option value="2700">2700</option>
                                <option value="3000">3000</option>
                                <option value="3300">3300</option>
							</select> Records</label></div></div>
       						</div>
							<div id="data" class="scroller" style="height:400px; padding-top:5px"  data-always-visible="1" data-rail-visible="0">
							</div>
							
							
							 
							
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
        $(".find_records").die().live("change",function(){
	    var view_u=$(".find_records").val();
	  	$.ajax({
			url: "ajax_view_profiles.php?view_u="+view_u,
			}).done(function(response) {
		   $("#data").html(""+response+"");
			});
});
});
</script>
<?php scripts();?>

</html>


