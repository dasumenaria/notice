<?php
 include("index_layout.php");
 include("database.php");
$session_id=$_SESSION['id'];
 
if(isset($_POST['submit']))
{
 
echo $exam_type=$_POST["exam_type"]; 
 $sql="insert into master_exam(exam_type)values('$exam_type')";
$r=mysql_query($sql);
 
}
	else
	{
		echo mysql_error();
	}
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Exam type</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Exam type
							</div>
							<div class="tools">
							 
								
							</div>
						</div>
						<div class="portlet-body form">
						 
<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
					<br/>
					<div class="form-group">
			<label class="col-md-3 control-label">Exam Type</label>
			<div class="col-md-4">
				<input class="form-control"  type="text" name="exam_type">
				 
			</div>
		</div> 
					 
				<div class="form-actions top">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<input type="submit" name="submit" class="btn green" value="Submit">
								<button type="button" class="btn default">Cancel</button>
							</div>
						</div>
					</div>	

				</form>
						</div>
					</div>
			</div></div>
</body>
<?php footer(); ?>

<?php scripts();?>

</html>
 

