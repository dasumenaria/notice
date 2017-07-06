<?php
 include("index_layout.php");
 include("database.php");
$session_id=$_SESSION['id'];
 
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Work Assignment</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Home Work Assignment
							</div>
							 
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											 
										</div>
									</div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
											<button class="btn btn green">Excel &nbsp; &nbsp;<i class="fa fa-download"></i></button>
										</div>
									</div>
								</div>
							</div>
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th>
									 Username
								</th>
								<th>
									 Full Name
								</th>
								<th>
									 Points
								</th>
								<th>
									 Notes
								</th>
								<th>
									 Edit
								</th>
								<th>
									 Delete
								</th>
							</tr>
							</thead>
							<tbody>
							 <tr>
								<td>
									 gist124
								</td>
								<td>
									 Nick Roberts
								</td>
								<td>
									 62
								</td>
								<td class="center">
									 new user
								</td>
								<td>
									<a class="edit" href="javascript:;">
									Edit </a>
								</td>
								<td>
									<a class="delete" href="javascript:;">
									Delete </a>
								</td>
							</tr>
							</tbody>
							</table>
						</div>
					</div>
			</div></div>
</body>
<?php footer(); ?>

<?php scripts();?>

</html>
 

