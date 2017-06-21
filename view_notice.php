<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];

?>



<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Notice View</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box default">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Notice View
							</div>
								<div class="tools">
							<a class="" href="create_notice_re.php" style="color: white"><i class="fa fa-search">Create New Notice</i></a>
							
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
								 
									 
									<div class="col-md-12" >
                                        
                      				<div class="form-group">
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

                      
                      
                      
                                        
					<div class="form-group">
                    <label class="col-md-2">&nbsp;</label>
					<label class="col-md-2">Search By Date</label>
					<div class="col-md-2">
					<input type="text" class="form-control form-control-inline input-medium date-picker" placeholder="From Date"data-date-format="dd-mm-yyyy" id="from">
                    
                    <label>To</label>
                     
					<input type="text" class="form-control form-control-inline input-medium date-picker" placeholder="To Date" data-date-format="dd-mm-yyyy" id="to">
                    </div>
                    <div class="col-md-1">
                    <label >&nbsp;</label>
                    <button class="btn blue" id="go">GO</button>
                    </div>
                    </div>
					</div>
					</div><br>
                    
								
					
                            <div id="viewdata" class="scroller" style="height: 400px;" data-always-visible="1" data-rail-visible="0">
							<table class="table table-bordered table-hover" id="sample_1">
 
								<thead>
								<tr style="background-color:#FFFFFF; color:#1A0DB3;background:#f9f9f9;">
                            <td>
                                    #

								</td>
								<td>
                                    Notice Number
								</td>
								<td>
									 Date
									 </td>
								<td>
									 Title	
								</td>
								<td>
									Description
								</td>
								<td>
									PDF
								</td>
							 </tr>
							</thead>
                             <?php
			  $r1=mysql_query("select * from notice where flag='0' order by id Desc ");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$noticenumber=$row1['id'];
					$notice_no=$row1['notice_no'];
					$title=$row1['title'];
                    $dateofpublish=$row1['dateofpublish'];
					$description=$row1['description'];
					$notice_file=$row1['file_name'];
                    ?>
							<tbody>
							<tr>
								<td>
                                <?php echo $i;?>
    
								</td>
								<td>
									<?php echo 'MDS/2016-2017/A/'; echo $notice_no;?>
								</td>
								
								<td>
									 <?php echo $dateofpublish;?>
								</td>
								<td>
									 <?php echo $title;?>
								</td>
								<td>
									<?php echo $description;?>
								</td>
								
								<td>
<a href="notice/<?php echo $notice_file; ?>"><i class="btn btn-circle btn-xs fa fa-cloud-download" style="background-color:#EEEEEE"></i></a>
								</td>
							</tr>
							</tbody>
                    <?php } ?>
							</table>
                            </div>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
					</div>
					</div>	
					</div>
					</div>
</div>
</body>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
 $("#category").change(function(){
 var ids=$(this).val();
    $.ajax({
			url: "category_wise_notice.php?category_id="+ids,
			}).done(function(response) {
		   $("#viewdata").html(""+response+"");
			});
});

});
</script>

<script>
$(document).ready(function(){
 $("#go").click(function(){
var from = $("#from").val();
		var to = $("#to").val();
		$.ajax({
				url: "date_wise_notice.php?from="+from+"&to="+to+"",
				}).done(function(response) {
		   $("#viewdata").html(""+response+"");
			});
		});

});

</script>

<?php footer();?>
 
<?php scripts();?>


</html>




