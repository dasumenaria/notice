<?php
 include("index_layout.php");
 include("database.php");
@$session_id=@$_SESSION['id'];
date_default_timezone_set('Asia/Calcutta');
ini_set('max_execution_time', 100000); 

if(isset($_POST['submit']))
{
	$report_type=$_POST["report_type"];
	$date_from=$_POST["date_from"];
	$date_to=$_POST["date_to"];
	$todat=date('Y-m-d',strtotime($date_to));
	$fromdat=date('Y-m-d',strtotime($date_from));
	if($report_type=="inward")
	{
		echo "<script>
		location='inventory_report.php';
		window.open('inward_report.php?fromdat=$fromdat&todat=$todat','_newtab');
		</script>";	
	}
	if($report_type=="outward")
	{
		echo "<script>
		location='inventory_report.php';
		window.open('outward_report.php?fromdat=$fromdat&todat=$todat','_newtab');
		</script>";	
	}
	if($report_type=="issue")
	{
		echo "<script>
		location='inventory_report.php';
		window.open('issue_report.php?fromdat=$fromdat&todat=$todat','_newtab');
		</script>";	
	}
	if($report_type=="return")
	{
		echo "<script>
		location='inventory_report.php';
		window.open('return_report.php?fromdat=$fromdat&todat=$todat','_newtab');
		</script>";	
	}
	 
}
	 
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Time Table</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		<div class="page-content">
			
		<div class="col-md-6">
			<div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i>Incentory Reports
                    </div>
                    <div class="tools">
                     
                    </div>
                </div>
                <div class="portlet-body form">
						 
                <form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
					<div class="form-body">
                    	<div class="form-group">
							<label class="control-label col-md-3">Date From</label>
							<div class="col-md-8">
							   <div class="input-icon right">
									<i class="fa"></i>
									<input class="form-control date-picker" required  value="<?php echo date("d-m-Y"); ?>" placeholder="dd-mm-yyyy" type="text" data-date-format="dd-mm-yyyy" name="date_from">
								</div> 
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Date to</label>
							<div class="col-md-8">
							   <div class="input-icon right">
									<i class="fa"></i>
									<input class="form-control date-picker" required  value="<?php echo date("d-m-Y"); ?>"  placeholder="dd-mm-yyyy" type="text" data-date-format="dd-mm-yyyy" name="date_to">
								</div> 
							</div>
						</div>
                        <div class="form-group">
							<label class="control-label col-md-3">Select Report</label>
							<div class="col-md-8">
							   <div class="input-icon right">
									<i class="fa"></i>
									<select class="form-control user" required name="report_type" >
										<option value="">Select...</option>
								     	<option value="inward"> Inward </option>
                                        <option value="outward"> Outward </option>
                                        <option value="issue"> Issue </option>
                                        <option value="return"> Return </option> 
									</select>
								</div> 
							</div>
						</div>
                        <div align="center" style="margin-top:10px">
                            <button type="submit" class="btn green" name="submit">Report</button>
                        </div>
					</div>
					

				</form>
                </div>
            </div>
		</div>
        <div class="col-md-6">
			<div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i>Stock Report
                    </div>
                    <div class="tools">
                     
                    </div>
                </div>
                <div class="portlet-body form" style="min-height:190px">
 					<table class="table table-bordered table-hover" style="margin:10 10 10 0">
                    	<thead>
                        	<tr>
                            	<th>S.No.</th><th>Item Name</th><th>Avaiable Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $reg_all=mysql_query("select * from `stock_quantity`");
						$num=mysql_num_rows($reg_all);
						if($num>0)
						{
							$k=1;
							while($ftc_pre_data=mysql_fetch_array($reg_all))
							{
								$i++;
								$quantity = $ftc_pre_data['quantity'];
								$item_id = $ftc_pre_data['item_id'];
									$dataftc1=mysql_query("select * from `master_item` where `id`='$item_id'");
									$ftc_data1=mysql_fetch_array($dataftc1);
									$item_name=$ftc_data1['item_name'];
							?>
                        	<tr>
                            	<td><?php echo $i;?></td><td><?php echo $item_name;?></td><td><?php echo $quantity;?></td>
                            </tr>
                            <?php
							}
						}
						else
						{
							?>
                        	<tr>
                            	<td colspan="10">No record Found</td>
                            </tr>
                            <?php	
						}
							?>
                        </tbody>
                    </table> 
                </div>
            </div>
		</div>
        
       </div>
      </div>
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
	url: "ajax_time_table.php?pon="+t,
	}).done(function(response) {
	
	$("#dt").html(""+response+"");
	  
	
	});
});	 

	$(".user1").live("change",function(){
		var t=$(".user").val();
		var s=$(this).val();
		
		$.ajax({
		url: "ajax_time_table.php?pon="+t+"&pon1="+s,
		}).done(function(response) {
		
		$("#data").html(""+response+"");
		 
		
		});


	});	  

});
	</script>


<?php scripts();?>

</html>
 

