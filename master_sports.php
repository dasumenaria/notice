<?php
 include("index_layout.php");
 include("database.php");
$session_id=$_SESSION['id'];
 
if(isset($_POST['submit']))
{
 
echo $sports_name=$_POST["sports_name"]; 
 $sql="insert into master_sports(sports_name)values('$sports_name')";
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
<title>Sports </title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Sports
							</div>
							<div class="tools">
							 
								
							</div>
						</div>
						<div class="portlet-body form">
						 
<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
					<br/>
					<div class="form-group">
			<label class="col-md-3 control-label">Sports Name </label>
			<div class="col-md-4">
				<input class="form-control" type="text" name="sports_name">
				 
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
 

