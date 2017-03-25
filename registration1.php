<?php
require_once("database.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Login</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<!--link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/-->
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo" style="margin-top:5px;">

	<span><img src="img/spsulogo.png" width="50px" height="50px"/></span>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content" style="margin-top:1px;">
	<!-- BEGIN LOGIN FORM -->
	<form method="post">
	<?php 
	$message=false;
	$message2=false;
	
	
	
if(isset($_POST['submit']))
{
$eno=mysql_real_escape_string($_REQUEST["eno"]);
$name=mysql_real_escape_string($_REQUEST["name"]);
$mobile_no=mysql_real_escape_string($_REQUEST["mobile_no"]);
$password1=mysql_real_escape_string($_REQUEST["password"]);
$password=md5($password1);
$current_date=date("Y-m-d"); 

	$result=mysql_query("select * from `student` where `eno`='".$eno."'");
	if(mysql_num_rows($result)>0)
	{
		$message =true;	
	}
	else 
	{
		$sql="insert into student(name,eno,curent_date,mobile_no)values('$name','$eno','$current_date','$mobile_no')";
        $r=mysql_query($sql);
		$ids=mysql_insert_id();
		
		$sql1="insert into login(name,registration_id,password,enrollment_no,mobile_no)values('$name','$ids','$password','$eno','$mobile_no')";
        $rc=mysql_query($sql1);
		ob_start();
		echo "<meta http-equiv='refresh' content='0;url='/>";
		ob_flush();
		$message2 =true;
	}
}?>
	
   <?php if($message)
       { 
      ?>
    <h5 style="color:red; text-align:center;"><b>User already exist!</b></h5>
     <?php 
	} 
	?>
	
	<?php if($message2)
       { 
      ?>
    <h5 style="color:red; text-align:center;"><b>Thank You, registration has been successfully.</b></h5>
     <?php 
	} 
	?>
		<h3>Sign Up</h3>
		
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Full Name</label>
			<input class="form-control placeholder-no-fix" placeholder="Full Name" name="name" type="text">
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Enrollement No.</label>
			<input class="form-control placeholder-no-fix" placeholder="Enrollement No." name="eno" type="text">
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Mobile No.</label>
			<input class="form-control placeholder-no-fix" placeholder="Mobile No." name="mobile_no" type="text">
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control placeholder-no-fix" autocomplete="off" id="register_password" placeholder="Password" name="password" type="password">
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
			<input class="form-control placeholder-no-fix" autocomplete="off" placeholder="Re-type Your Password" name="rpassword" type="password">
		</div>
		
		<div class="form-actions">
			<a href="login.php" class="btn btn-default">Back</a>
			<button type="submit" name="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
		</div>
	</form>
</div>

<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Login.init();
	Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>