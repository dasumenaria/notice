<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];
 $user_id=$_SESSION['id'];
 $message=false;
 $mmessage="";	
	if(isset($_POST['submit']))
	{
		$role_id=5;
		$name=mysql_real_escape_string($_REQUEST["name"]);
		$mobile_no=mysql_real_escape_string($_REQUEST["mobile_no"]);
		$email=mysql_real_escape_string($_REQUEST["email"]);
		$designation=mysql_real_escape_string($_REQUEST["designation"]);
 		
		$fetch_st=mysql_query("select `id` from contact_detail where mobile_no='$mobile_no'");		
		$fetch_st1=mysql_fetch_array($fetch_st);
		if(empty($fetch_st1))
		{
								
			$sql="insert into contact_detail(name,mobile_no,email,designation)values('$name','$mobile_no','$email','$designation')";
			$r=mysql_query($sql); 
			$mmessage="Thank You, registration has been successfully.";
			$message =true;	
		}
		else{
			$mmessage="User already exist!";
			$message =true;	
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
<title>Contact Details</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Contact Details
							</div>
							<div class="tools">
							 <a class="" href="edit_contact_detail.php" style="color: white"><i class="fa fa-book"> View Contact</i></a> 
 							</div>
						</div>
						<div class="portlet-body form" style="min-height:480px">
							<?php if($message){ ?>
                                    <h5 id="success" style="color:red; text-align:center;"><b><?php echo $mmessage; ?></b></h5>
                                <?php } ?>	
												<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
                                                  <div class="row col-md-12">  
                                                    <div class="col-sm-6">
                                                            <label class="control-label">Name of Faculty</label>
                                                            <input type="text" placeholder="Provide faculty name" name="name" required class="form-control" value=""/>
                                                    </div>
                                                    <div class="col-sm-6">
                                                            <label class="control-label">Mobile No</label>
                                                            <input type="text" placeholder="Provide faculty mobile no" required maxlength="10" minlength="10" name="mobile_no" class="form-control"/>
                                                    </div>
                                                  </div>
                                                  
                                                  <div class="row col-md-12">   
                                                    <div class="col-sm-6">
                                                        <label class="control-label">Email Id</label>
                                                        <input type="email" placeholder="Provide faculty Email Address" name="email" value="" class="form-control"/>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="control-label">Designation</label>
                                                        <input type="text" placeholder="Provide faculty designation" name="designation" value="" class="form-control"/> 
                                                    </div>
                                                 </div>   
                                                  
                                                <div class="row col-md-12" style="margin-top: 35px;">
                                                    <div align="center">
                                                        <button type="submit" class="btn green" name="submit">Submit</button>
                                                    </div>
                                                </div>
												</form>
											</div>
                                         </div>
                                      </div>
                                  </div>
 </body>

<?php footer();?>
<script>
		var myVar=setInterval(function(){myTimerr()},4000);
		function myTimerr() 
		{
			$("#success").hide();
		}
</script>
<?php scripts();?>

</html>

