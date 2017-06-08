<?php
 include("index_layout.php");
 include("database.php");
$session_id=$_SESSION['id'];
 
if(isset($_POST['submit']))
{
  
$student_id=$_REQUEST["student_id"];
$achivement=$_REQUEST["achivement"];
$rank=$_REQUEST["rank"]; 
$curent_date=date('Y-m-d');
$i=0;
 
		foreach($subject_id as $value){
			$t_f=$time_from[$i];
			$subject_id=$value;	
			$t_t=$time_to[$i];
			
			
echo"insert into achivements(student_id,achivement,rank,curent_date)values('$student_id','$achivement','$rank','$curent_date')";
exit;	
 	  
$sql="insert into achivements(student_id,achivement,rank,curent_date)values('$student_id','$achivement','$rank','$curent_date')";
$r=mysql_query($sql);
	 $i++;
	 }
	 
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
<title>Class Test</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Class Test
							</div>
							<div class="tools">
							<!--<a class="" href="view_event.php" style="color: white"><i class="fa fa-search"></i></a>-->
							 
								<!--<a href="" class="collapse" data-original-title="" title="">
								</a>-->
								
							</div>
						</div>
<div class="portlet-body form">
	<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
						 
						<div class="form-body">
						
						</div>
						<div class=" right1" align="center" style="margin-top:50px">
							<button type="submit" class="btn green" name="submit">Submit</button>
						</div>
						 					
	 </form>
</div>
</div>
</body>

<?php  footer();?>			
  <?php scripts();?>

</html>

