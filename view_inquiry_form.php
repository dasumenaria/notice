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
								<i class="fa fa-gift"></i> View Query
							</div>
							<div class="tools">
							 <a class="" href="contact_us.php" style="color: white"><i class="fa fa-plus">Add Query</i></a> 
 							</div>
						</div>
						<div class="portlet-body form">
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
								 <div class="scroller" style="height:500px;"  data-always-visible="1" data-rail-visible="0">
								<table class="table-condensed table-bordered" style="width:100%;">
								<thead>
								<tr style="background-color:#FFFFFF; color:#1A0DB3">
									<td>
										 #
									</td>
									<td>
										Name
									</td>
									<td>
									Study
									</td>
									<td>
                                       Email
									</td>
									<td>
									Mobile No.
									</td>
									<td>
                                        Date
									</td>
									<td>
									Query
									</td>
								</tr>
								</thead>
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
					$date=date('d-m-Y',strtotime($curent_date));
				?>

								<tbody>
								<tr>
									<td>
							<?php echo $i;?>
									</td>
                                    <td>
									<?php echo $name;?>
									</td>
                                    <td>
									<?php echo $study;?>
									</td>
									<td>
										 <?php echo $email;?>
									</td>
									<td>
										 <?php echo $mobile_no;?>
									</td>	
									<td>
										 <?php echo $date;?>
									</td>
									<td>
										 <?php echo $query;?>
									</td>
								</tr>
								</tbody>
                    <?php } ?>
								</table>
							</div>
									</div>
							</form>
						</div>
					</div>
			
			
			</div></div>
</body>
<?php footer();?>
<?php scripts();?>
</html>