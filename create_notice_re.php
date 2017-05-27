<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];
  ?> 
  
  <?php
if(isset($_POST['submit'])){
$noticenum=$_POST['noticenum'];
 $file_name = $_FILES['file']['name']; 
$target = "uploads/";
$target = $target . basename( $_FILES['file']['name']) ;
move_uploaded_file($_FILES['file']['tmp_name'],$target);
$noticedetail=$_POST['editor1'];
if($user==1 || $user==2 || $user==3)
{
	$approval=0;
	
	// instantiate and use the dompdf class
	$dompdf = new dompdf();
	$dompdf->loadHtml($noticedetail);
	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4', 'potrait');
	// Render the HTML as PDF
	$dompdf->render();
	// Output the generated PDF to Browser
	//$dompdf->stream("sample");
	$output = $dompdf->output();
    file_put_contents('uploads/notice'.$noticenum.'.pdf', $output); //dynamically change the file name
	}
else
	$approval=1;

$category=$_POST['categoryselect'];
$title=$_POST['title'];
$originalDate = $_POST['publishdate'];
$dateofpublish = date("Y-m-d", strtotime($originalDate));
$count3=0;
if(!isset($_POST['hostel']))
{
	
	$sql="select id from hostel_setup";
	$query=mysql_query($sql);
	while($result=mysql_fetch_array($query))
	{
		$d[$count3]=$result['id'];
		$count3++;
	}
}
else
{
	foreach($_POST['hostel'] as $selected)
	{
		$d[$count3]=$selected;
		$count3++;
	}
}
$hostel=implode(",",$d);
$count4=0;
if(!isset($_POST['hostel']))
{
	$sql="select id from branch where branch_name != ''";
	$res=mysql_query($sql) or die(mysql_error());;
	while($result=mysql_fetch_array($res))
	{
		$a[$count4]=$result['id'];
		$count4++;
	}
}
else
{
	foreach($_POST['branch'] as $selected)
	{
		$a[$count4]=$selected;
		$count4++;
	}
}
$branch=implode(",",$a);
$count5=0;
if(!isset($_POST['semester']))
{
	$sql="select distinct(semester) from student where semester IS NOT NULL AND semester != 'semester' AND semester != ''";
	$res=mysql_query($sql) or die(mysql_error());
	while($result=mysql_fetch_array($res))
	{
		$b[$count5]=$result['semester'];
		$count5++;
	}
}
else
{
	foreach($_POST['semester'] as $selected)
	{
		$b[$count5]=$selected;
		$count5++;
	}
}
$semester= implode(",",$b);
$count2=0;
if(!isset($_POST['year']))
{
	$sql="select id from year";
	$res=mysql_query($sql) or die(mysql_error());
	while($result=mysql_fetch_array($res))
	{
		$c[$count2]=$result['id'];
		$count2++;
	}
}
else
{
	foreach($_POST['year'] as $selected)
	{
		$c[$count2]=$selected;
		$count2++;
	}
}
$year= implode(",",$c);
$sql="INSERT INTO `noticedetail`(`category_id`,`noticenumber`,`uploadfile`, `title`, `dateofpublish`, `year`, `branch`, `semester`, `hostel`,`User`,`Noticedetails`,`approval`) VALUES ('".$category."','','".$file_name."','".$title."','".$dateofpublish."','".$year."','".$branch."','".$semester."','".$hostel."',".$user.",'".$noticedetail."',".$approval.")";
$res=mysql_query($sql) or die(mysql_error());
}
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
								<i class="fa fa-gift"></i> Create Notice 
							</div>
								<div class="tools">
							<a class="" href="view_notice.php" style="color: white"><i class="fa fa-search">View Notice List</i></a>
							
							</div>
						</div>
						<div class="portlet-body form">
                <form class="form-horizontal" id="noticeform" method="get" action="create_notice.php" enctype="multipart/form-data">
								<div class="form-body">
							<?php if($_SESSION['category']==2 || $_SESSION['category']==3)
							{
							?>
						<div class="form-group">
						   <label class="control-label col-md-3">Role</label>
						   <div class="col-md-3">
							  <select class="input-medium form-control select select2 select2me" name="categoryselect" tabindex="1">
							  <option value=""></option>
							  <?php 
							  $cat=$_SESSION['category'];
							  
							  if($cat==2 || $cat==3)
							  {
							  $sql="select * from `master_role` where `id`='$cat'"; 
							  }
							  $res=mysql_query($sql) or die(mysql_error());
								while($result=mysql_fetch_array($res)) { ?>
								  <option value="<?php echo $result['id']; ?>"><?php  echo $result['role_name']; ?></option>
								  <?php } ?>
								</select>
						   </div>
						</div>
								<div class=" right1" align="right" style="margin-right:10px">
									<button type="submit" class="btn green" name="submit">Create</button>
								</div>
								</div>
								<?php
				}
				else
				{
					header('location:index.php');
				}
					?>
							</form>
						</div>
					</div>
			
			
			</div></div>
</body>

<?php footer();?>
<?php scripts();?>

</html>

