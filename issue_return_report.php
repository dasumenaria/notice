<?php
	include("index_layout.php");
	include("database.php");
?>

<html>
	<head>
		<?php css();?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Item Issue</title>
	</head>
	<?php contant_start(); menu();  ?>
	<body>
		<div class="page-content-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-md-12">
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i> Issue Return Report
								</div>
							</div>
							<div class="portlet-body form">
							<!-- BEGIN FORM-->
								<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
									<div class="form-body">
                                    	
                                        <div class="col-md-12">
                                        	<div class="form-group col-md-6">
                                                <label class="control-label col-md-4">Issue Date</label>
                                                <div class="col-md-8">
                                                    <div class="input-group input-large date-picker input-daterange" data-date-format="mm/dd/yyyy">
                                                        <input type="text" class="form-control" placeholder="From Date" name="from" id="from">
                                                        <span class="input-group-addon">
                                                        to </span>
                                                        <input type="text" class="form-control"  placeholder="To Date" name="to" id="to">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label col-md-4">Select Item</label>
                                                <div class="col-md-8">
                                                  	<select class="form-control select2me item_id" required="required" placeholder="Select...">
                                                        <option value=""> Select...</option>
                                                            <?php
                                                            $r1=mysql_query("select `item_name`,`id`,`price` from master_item where flag = 0 order by id ASC");		
                                                            $i=0;
                                                            while($row1=mysql_fetch_array($r1))
                                                            {
                                                                $id=$row1['id'];
                                                                $item_name=$row1['item_name'];
																$price=$row1['price'];
                                                               ?>
                                                                <option  value="<?php echo $id;?>" price='<?php echo $price;?>'><?php echo $item_name;?></option>
                                                            <?php 
                                                            }?> 
                                                      </select>   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group col-md-6">
                                                <label class="control-label col-md-4">Select Item</label>
                                                <div class="col-md-8">
                                                  	<select class="form-control report_type" required="required" placeholder="Select...">
                                                        <option value="issue_item" selected> Issue Report</option>
                                                        <option value="return_item"> Return Report</option>   
                                                      </select>   
                                                </div>
                                            </div>
                                        
                                        </div> 
                                        <div class="form-group" align="center">
                                            <button type="button" class="btn btn-sm red-sunglo GetData"> Report <i class="fa fa-book"></i></button> 
                                        </div>
                                      
										<div align="center" id="replace_data">
												 &nbsp;
										</div>
									</div> 
								</form>
							</div>
						</div>
					</div>
					<!-------------------------- View------------>
 				</div>
			</div>
		</div>
 	</body>
<?php footer(); ?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {	
	 
	$('.GetData').click(function(){
		var from = $('#from').val();
		var to = $('#to').val();
		var report_type = $('.report_type').val();
		var item_id = $('.item_id option:selected').val();
  		$.ajax({
			url: "notification_page.php?function_name=ItemReturnAjaxView&id="+item_id+"&from="+from+"&to="+to+"&report_type="+report_type,
			}).done(function(response) {
			 
			$('#replace_data').html(response);
  		});
		
	});
});
</script>
<?php scripts();?>

</html>
 

