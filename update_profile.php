<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];
 $session_id=$_SESSION['id'];
 $session_username=$_SESSION['username'];
$message="";
if(isset($_POST['submit']))
{
$username=mysql_real_escape_string($_REQUEST["username"]);
$pwwd=mysql_real_escape_string($_REQUEST["password"]);
$password=md5($pwwd);
$r=mysql_query("update `faculty_login` SET `username`='$username',`password`='$password' where id='$session_id'" );
$sql=mysql_query($r);
$message = "Password Update Successfully.!";
}

?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Update Profile
							</div>
							
							<div class="tools">
							
								
							</div>
						</div>
						<div class="portlet-body form">
                        </br></br>
						<?php if($message!="") { ?>
                       <!-- <input id="alert_message" type="text" class="form-control" value="some alert text goes here..." placeholder="enter a text ...">-->
<div class="message" style="margin-left:290px;color:#89c4f4;font-size:11pt;font-weight:bold;" ><?php echo $message; ?></div>
</br>
<?php } ?>
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">User Name</label>
										<div class="col-md-3">
											<input class="form-control input-md" required placeholder="Username" type="text" name="username" value="<?php echo $session_username;?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">New Password</label>
										<div class="col-md-3">
										<input class="form-control input-md" required placeholder="Enter New Password" required type="password" name="password" value="">

										</div>
									</div>
                                   <!-- <div class="form-group">
										<label class="col-md-3 control-label">Conform Password</label>
										<div class="col-md-3">
										<input class="form-control input-md" required placeholder="Enter Current Password" type="password"  value="">

										</div>
									</div>-->
                                    
								<div class=" right1" align="right" style="margin-right:10px">
									<button type="submit" class="btn green" name="submit">Update</button>
								</div>
							</form>
                             
                            
						</div>
					</div>
			
			
			</div></div>
</body>

<?php footer();?>
<?php scripts();?>

</html>

