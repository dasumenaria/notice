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
								<i class="fa fa-gift"></i> View Contact US
							</div>
							<div class="tools">
							<a class="" href="contact_us.php" style="color: white"><i class="fa fa-plus">Add Query</i></a>
							<!--	<a href="" class="collapse" data-original-title="" title="">
								</a>-->
								
							</div>
						</div>
						<div class="portlet-body form">
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body" style="height:450px; overflow-y:scroll;">
								 <div class="table-scrollable">
								<table class="table-condensed table-bordered" style="width:100%;">
								<thead>
								<tr style="background-color:#EEEEEE; color:#000">
									<td>
										 #
									</td>
									<td>
										To
									</td>
									<td>
										Subject
									</td>
									<td>
                                       Message
									</td>
                                    <td>
                                        Date
									</td>
								</tr>
								</thead>
							 <?php
			  $r1=mysql_query("select * from contact_us order by id Desc ");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$id=$row1['id'];
					$login_id=$row1['login_id'];
					 $subject=$row1['subject'];        
                    $message=$row1['message'];
                    $date=$row1['date'];
					$admin_id=$row1['admin_id'];
                        /*    $r2=mysql_query("select * from login  where id='$login_id' ");		
                            $fet=mysql_fetch_array($r2);
                            $id=$fet['id'];
                            $s_id=$fet['username'];
                            */
                                                    
                       $r2=mysql_query("select * from facultylogin  where id='$admin_id' ");		
                            $fet=mysql_fetch_array($r2);
                            $username=$fet['username'];
				?>

								<tbody>
								<tr>
									<td>
							<?php echo $i;?>
									</td>
                                    <td>
									<?php echo $username;?>
									</td>
                                    <td>
									<?php echo $subject;?>
									</td>
									<td>
										 <?php echo $message;?>
									</td>
									<td>
										 <?php echo $date;?>
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