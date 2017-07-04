<?php
	include("index_layout.php");
	include("database.php");
?>

<html>
	<head>
		<?php css();?>
		<link href="csss/photo.css" type="text/css" rel="stylesheet" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Report View</title>
		
	</head>
	<?php contant_start(); menu();  ?>
	<body>
		<div class="page-content-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-md-12">
						<div class="portlet box">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i>Checked Out View
								</div>
							</div>
							
							<div class="portlet-body form">
								<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"><br>
							<!-- BEGIN FORM-->
									<div class="row">
								 
									 
									<div class="col-md-12" >
                                        
                                        <div class="form-group col-md-8">
                                            <label class="control-label col-md-3">Search By Date</label>
                                            <div class="col-md-4">
                                                <div class="input-group input-large date-picker input-daterange" data-date-format="mm/dd/yyyy">
                                                    <input type="text" class="form-control" placeholder="From Date" name="from" id="from">
                                                    <span class="input-group-addon">
                                                    to </span>
                                                    <input type="text" class="form-control"  placeholder="To Date" name="to" id="to">
                                                </div>
                                            </div>
                                        </div>
                                        <div >
                                         <button class="btn red" type="button" id="go">GO</button>
                                        </div>
                                    </div>
                                    </div>	
									 <div id="viewdata" class="scroller" style="height: 400px;" >
									<table aria-describedby="sample_1_info" class="table table-striped table-bordered dataTable" id="sample_1">
									<thead>
										<tr><td align='right' colspan="11">
											<a style="background-color:#48D1CC" class="btn btn-primary" href="visitor_report_excel.php">Download Excel</a>
										</td></tr>
										<tr>
											<th>S.No</th>
                                            <th>Visitor Name</th>
                                            <th>Contact No</th>
                                             <th>Host Name</th>
											<th>Vehicle No</th>
											<th>In Time</th>
											<th>Out Time</th>
											<th>In Date</th>
											<th>Out Date</th>
											<th>City</th>
                                             <th>Remark</th>
										</tr>
									</thead>
									<tbody>
										<tr>
                                        <?php
										$i=0;
										$reg_all=mysql_query("select * from `visitor_reg` where DATE(in_date)= DATE(NOW()) ORDER BY ID DESC");
										$num_rows =mysql_num_rows($reg_all);
										if($num_rows > 0)
											{
											while($ftc_data=mysql_fetch_array($reg_all))
												{
													$i++;
													$id = $ftc_data['id'];
													$visitor_name = $ftc_data['visitor_name'];
													$contact_no = $ftc_data['contact_no'];	
													$host_name=$ftc_data['host_name'];
													$Vehicle_no=$ftc_data['Vehicle_no'];
													$in_time = $ftc_data['in_time'];
													$out_time = $ftc_data['out_time'];
													$in_date = $ftc_data['in_date'];
														$in_date_frmt=date("d-m-Y",strtotime($in_date));
													$out_date = $ftc_data['out_date'];
														if(empty($out_date)|| $out_date=="0000-00-00")
														{
															$out_date_frmt="";
														}
														else
														{
															$out_date_frmt=date("d-m-Y",strtotime($out_date));
														}
														
													$city = $ftc_data['city'];
													$remark=$ftc_data['remark'];
											?>
									
											<td><?php echo $i ?></td>
											<td><?php echo $visitor_name ?></td>
                                            <td><?php echo $contact_no ?></td>
                                            <td><?php echo $host_name ?></td>
                                            <td><?php echo $Vehicle_no ?></td>
                                            <td><?php echo $in_time ?></td>
                                            <td><?php echo $out_time ?></td>
                                            <td><?php echo $in_date_frmt ?></td>
                                            <td><?php echo $out_date_frmt ?></td>
											<td><?php echo $city ?></td>
											<td><?php echo $remark ?></td></tr>
                                        <?php
                                        }
											}
											else
											{	echo "<p style='color:red'><strong>No Data Found</strong></p>";
											}
											
										?>
									</tbody>
								</table>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body><script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
 
$(document).ready(function(){
 $("#go").click(function(){
var from = $("#from").val();
		var to = $("#to").val();
		$.ajax({
				url: "date_wise_visitor_report.php?from="+from+"&to="+to+"",
				}).done(function(response) {
		   $("#viewdata").html(""+response+"");
			});
		});

});

</script>

<?php footer();?>
<?php scripts();?>
</html>
 

