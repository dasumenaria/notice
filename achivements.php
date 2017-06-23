<?php
 include("index_layout.php");
 include("database.php");
@$session_id=$_SESSION['id'];
date_default_timezone_set('Asia/Calcutta');
ini_set('max_execution_time', 100000); 

if(isset($_POST['submit']))
{
	$student_id=$_POST["student_id"];
	$achivement=$_REQUEST["achivement"];
	$rank=$_REQUEST["rank"];
	$date_current=date('Y-m-d');
	 
		$sql="insert into achivements(student_id,achivement,rank,curent_date)values('$student_id','$achivement','$rank','$date_current')";
		 
		$r=mysql_query($sql);
 	  
	ob_start();
	echo "<meta http-equiv='refresh' content='0;url=achivements.php'>";
	ob_flush();
}

	
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
			
			
			<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Achivement
							</div>
							<div class="tools">
								<a class="" href="view_achivements.php" style="color: white"><i class="fa fa-search">View Achivements</i></a>
							</div>
						</div>
						<div class="portlet-body form">
						 
                <form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Student Name</label>
							<div class="col-md-4">
							  
									<select class="form-control user select2me " required name="student_id" >
									<option value="">---Select Name---</option>
								    <?php 
									$query=mysql_query("select * from `login`where flag='0' order by id ASC");
									while($fetch=mysql_fetch_array($query))
									{$i++;
										$id=$fetch['id'];
										$name=$fetch['name'];
									?>
									<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
									<?php } ?>
									</select>
								 
								<span class="help-block">
								Please select student name</span>
							</div>
						</div>
                        <div class="form-group">
							<label class="control-label col-md-3">Achivements</label>
							<div class="col-md-4">
								<input type='text'class="form-control" name="achivement">
                                <span class="help-block">
								Provide student achivements</span>	 
 							</div>
                        </div>
                        <div class="form-group">
							<label class="control-label col-md-3">Rank</label>
							<div class="col-md-4">
								<input type='text'class="form-control" name="rank">
                                <span class="help-block"> Provide student achivement rank</span>	 
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
					</div>
				</form>
						</div>
					</div>
			</div></div>
</body>
<?php footer(); ?>
<?php scripts();?>

</html>
 

