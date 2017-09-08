<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];
 
  $datet=date('Y-m-d');
  $dt=str_replace('-', '', $datet);
$exact_trim=$dt;
$datetime = DateTime::createFromFormat('Ymd', $exact_trim);
$em=$datetime->format('M');
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Inquiry</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Inquiry
							</div>
							
						</div>
						<div class="portlet-body form">
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body" style="height:450px; overflow-y:scroll;">								
								<div class="table-scrollable" >
								<table class="table table-hover " id="mytbl" width="100%">
								<thead>
								<tr><td style="align:left;" colspan="7">&nbsp;Search by Name:&nbsp;<input class="form-control input-medium"  type="text" id="search">
								</td>
								</tr>
								
								
								<tr style="background-color:#FFFFFF; color:#1A0DB3">
									<td>
										 #
									</td>
									<td>
										Submitted By
									</td><td>
										Name
									</td>
									<td>
										 Email
									</td>
									
                                    <td>
                                        Study
									</td>
									  <td>
                                        Mobile No
									</td>
									<td>
                                        Date
									</td>
									  <td>
                                        Query
									</td>
								</tr>
								</thead>
								<tbody id="view_data">
							 <?php
			  $r1=mysql_query("select * from inquiry_form order by id Desc ");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$id=$row1['id'];
					$name=$row1['name'];
                    $email=$row1['email'];
					$study=$row1['study'];
					$address=$row1['address'];
					$mobile_no=$row1['mobile_no'];
					$query=$row1['query'];
					$curent_date=$row1['curent_date'];
					$user_id=$row1['user_id'];
					$ftc_data=mysql_query("select `name` from `login` where `id`='$user_id'");
					$data=mysql_fetch_array($ftc_data);
					$submittedBy=$data['name'];
					
					$news_date1=str_replace('-', '', $curent_date);
					$exact_trim=$news_date1;
					$datetime = DateTime::createFromFormat('Ymd', $exact_trim);
					$ems=$datetime->format('M');
					
                 
					$qry_date=date("d-m-Y", strtotime($curent_date)); 

					
					?>

								<tr>
									<td>
										<?php echo $i;?>
									</td>
									<td>
										<?php echo $submittedBy;?>
									</td>
									<td>
									<?php echo $name;?>
									</td>
                                    <td>
									<?php echo $email;?>
									</td>
									 <td>
									<?php echo $study;?>
									</td>
									 <td>
									<?php echo $mobile_no;?>
									</td>
									 <td>
									<?php echo $qry_date;?>
									</td>
									 <td>
									<?php echo $query;?>
									</td>
							</tr>
                    <?php } ?>
					</tbody>
								</table>
							</div>
									</div>
							</form>
						</div>
					</div>
			
			
			</div></div>
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
<?php scripts();?>

</html>
