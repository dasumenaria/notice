<?php
 include("index_layout.php");
 include("database.php");
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Achivement</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		<div class="page-content">
<div class="portlet box ">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Achivements
							</div>
							<div class="tools">
								<a class="" href="achivements.php" style="color: white"><i class="fa fa-book"> Add Achivements</i></a>
							</div> 
						</div>
						<div class="portlet-body">
							
		
				<table class="table table-striped table-bordered table-hover" >
					<thead>
						<tr>
						<th class="table-checkbox">
							S.No.
						</th>
						<th>
							Student Name
						</th>
						<th>
							Achivement
						</th>
						<th>
							Rank
						</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$query2=mysql_query("select * from `achivements` order by id DESC limit 5"); 
							$i=0;
							while($fetch2=mysql_fetch_array($query2))
							{
								$i++;
							$student_id=$fetch2['student_id'];
							$query=mysql_query("select `name` from `login` where id='".$student_id."'"); 
							$fetch=mysql_fetch_array($query);
							$name=$fetch['name'];
							$achivement=$fetch2['achivement'];
							$rank=$fetch2['rank'];
						?>
						<tr class="odd gradeX">
						<td>
						<?php echo $i;?>
						</td>
						<td>
							<?php echo $name?>
						</td>
						<td>
							<?php echo $achivement?>
						</td>
						<td>
							<?php echo $rank?>
						</td>
						</tr>
							<?php } ?>
					</tbody>
				</table>
				</div>
			</div>
	</div>
</div>
</body>
<?php footer(); ?>
 
<?php scripts();?>

</html>
 

