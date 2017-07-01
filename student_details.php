<?php
 include("index_layout.php");
 include("database.php");
$session_id=$_SESSION['id'];
 
if(isset($_POST['submit']))
{
  $student_id=$_POST["student_id"]; 
	header("Location: student_profile.php?stdnt_id=".$student_id);
  
 
}
 
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Record</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Student Record
							</div>
							<div class="tools">
							 
								
							</div>
						</div>
						<div class="portlet-body form">
							<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
								<br/>
								<div class="form-group">
									<label class="control-label col-md-3">Select Student</label>
										<div class="col-md-4">
												<i class="fa"></i>
												<select class="form-control user select2me" required name="student_id" >
													<option value="">---Select Student---</option>
														<?php 
														$query=mysql_query("select * from `login` order by `id` ASC ");
														while($fetch=mysql_fetch_array($query))
														{
															$i++;
															$id=$fetch['id'];
															$name=$fetch['name'];
														?>
													<option value="<?php echo $id;?>"><?php echo $name; ?></option>
													<?php } ?>
												</select> 
										</div>
								</div>
								<div class="form-actions top">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<input type="submit" name="submit" class="btn green" value="Submit">
										 </div>
									</div>
								</div>
					</div>
							</form>
						</div>
					  </div>
					</div>
			</div> 
</body>
<?php footer(); ?>

<?php scripts();?>

</html>
 

