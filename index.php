<?php
session_start();
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
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo" style="margin-top:5px;">
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content" style="margin-top:50px;">
	<!-- BEGIN LOGIN FORM -->
	<form method="post" class="login-form">
	<?php 

include("functions.php");
$message="";
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
		
		$result=mysql_query("select * from `faculty_login` where `user_name`='".$_POST['username']."' and `password`='".md5($_POST['password'])."'");
	if(mysql_num_rows($result)>0)
	{
		$row= mysql_fetch_array($result);
		 
		$_SESSION['id']=$row['id'];
		$_SESSION['username']=$row['user_name'];
		$_SESSION['category']=$row['role_id'];
		$_SESSION['loggedin_time'] = time();
		
		ob_start();
		echo "<meta http-equiv='refresh' content='0;url=index1.php'/>";
		ob_flush();
	} else {
		$message = "Invalid Username or Password!";
	}
}
 
if(isset($_GET["session_expired"])) {
	$message = "Login Session is Expired. Please Login Again";
}

?>
	
	
        <div class=" " align="center">
            <img src="img/CBALogo.png" width="152px" height="145px"/>
        </div>
        <br>
        <div class=" " align="center">
			<h4 class="form-title"> Sign into your account </h4>
        </div>
		<br>
		<?php if($message!="") { ?>
    		<div style="color:#F00; margin-bottom:10px;"><?php echo $message; ?></div>
    	<?php } ?>	
        <div class=" ">
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Username</label>
                <div class="input-icon">
                    <i class="fa fa-user"></i>
                <input style="background-color:#fff; color:#000;" class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
                </div>
            </div>
        </div>
         <div class="">
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
				<i class="fa fa-lock"></i>
			<input style="background-color:#fff; color:#000;" class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
            </div>
		</div>
        </div>
		<div class="">
			<button type="submit" name="sub_log" class="btn pull-right" style="background-color:#3C8DBC;color:#fff; align:right" >Login <i class="fa fa-sign-in"></i></button>
		</div>
		
	
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	 <!-- END FORGOT PASSWORD FORM -->
	<!-- BEGIN REGISTRATION FORM -->
	 
	<!-- END REGISTRATION FORM -->
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