<?php
 include("index_layout.php");
 include("database.php");
 $id=$_GET['id'];
  
if(isset($_POST['update_details'])) 
	{
		$user_id=$_POST['user_id'];
		$password=$_POST['password'];
		$confirm_password=$_POST['confirm_password'];
		if($confirm_password==$password)
		{
			$pass=md5($password);
			mysql_query("update `login` set`password`='$pass'  where `id` = '$user_id' ");
			$message='password update successfully';
		}
		else
		{ $message='password not match';
		}
	}
 ?> 
<html>
	<head>
	<?php css();?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Update Student Password</title>
	</head>
	<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box blue">
				<div class="portlet-title ">
					<div class="caption">
						<i class="fa fa-gift"></i> Update Student Password
					</div>
				</div>
				<div class="portlet-body form">
					<div class="form-body">
                        <div class="scroller" style="height:500px;"  data-always-visible="1" data-rail-visible="0">
                        <?php if($message){ ?>
                            <div id="success">
								<div class="alert alert-success">
									<strong><?php echo $message; ?></strong> 
                                </div>
                            </div>
                        <?php } ?> 
						<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"  > 
                        <table class="table-condensed table-bordered" style="width:100%;">
							<tbody>
								
								<div class="form-body">
								
								
									<div class="form-group">
										<label class="control-label col-md-3">Student Name <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-6">
											<i class="fa"></i>
											<select name="user_id" class="form-control class_id select2me" required="required" placeholder="Select..." id="sname">
												<option value="item_name"></option>
														<?php
															$r1=mysql_query("select * from `login` order by `name` ASC");		
															$i=0;
															while($row1=mysql_fetch_array($r1))
															{
																
															$ids=$row1['id'];
															$name=$row1['name'];
														?>
												<option value="<?php echo $ids; ?>"  ><?php echo $name;?></option>
												
													<?php  } ?> 
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Password <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-6">
											<div class="input-icon right">
												<input type="password" class="form-control" required="required" placeholder="Password" id='password' value="" name="password">	
											</div>
										</div>
										 
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Confirm Password <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-6">
											<div class="input-icon right">
												<input type="password" class="form-control" required="required" placeholder="Confirm password" id='confirm_password' value="" name="confirm_password">	
											</div>
											<span id="message"></span>
										</div>
										 	
									</div>
									<div class="form-group"><center>
										 <button type="submit" name="update_details" class="btn blue" >Update</button></center>
									</div>
								</div>
								</div>
							</tbody>
                        </table>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php footer();?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Password Match').css('color', 'green');
  } else 
    $('#message').html('Password Not Match').css('color', 'red');
});
});
</script>

<?php scripts();?>
</html>