<?php
 include("index_layout.php");
 include("database.php");
 @session_start();
 $user=$_SESSION['category'];
 $session_id=$_SESSION['id'];
 $message="";
 
if(isset($_POST['submit']))
{
$admin_id=mysql_real_escape_string($_REQUEST["admin_id"]);
$subject=mysql_real_escape_string($_REQUEST["subject"]);
$message=mysql_real_escape_string($_REQUEST["message"]);
$current_date=date("Y-m-d"); 
 $sql="insert into contact_us(admin_id,subject,message,date,login_id)values('$admin_id','$subject','$message','$current_date','$session_id')";
 $r=mysql_query($sql);
 $message="Send Message Successfully";
     
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
<title></title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Contact Us
							</div>
							<div class="tools">
							<a class="" href="view_contact_us.php" style="color: white"><i class="fa fa-search">View Query</i></a>
								<!--<a href="" class="collapse" data-original-title="" title="">
								</a>-->
								
							</div>
						</div>
						<div class="portlet-body form">
                                          <br/><br/>
                        <?php if($message!="") { ?>
                       <!-- <input id="alert_message" type="text" class="form-control" value="some alert text goes here..." placeholder="enter a text ...">-->
<div class="message" style="margin-left:290px;color:#89c4f4;font-size:11pt;font-weight:bold;" ><?php echo $message; ?></div>
                        </br><?php } ?>
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Select Receiver</label>
										<div class="col-md-3">
                                        <select name="admin_id" required class="form-control select select2 select2me">
                                         <option value=""></option>
                                            <?php
                                            $r1=mysql_query("select * from facultylogin order by id Desc ");		
                                            $i=0;
                                            while($row1=mysql_fetch_array($r1))
                                            {
                                            $id=$row1['id'];
                                            $username=$row1['username'];
                                            ?>
                              <option value="<?php echo $id;?>"><?php echo $username;?></option>                              
                              <?php }?> 
                              <select/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Subject</label>
										<div class="col-md-3">
										<input class="form-control input-md" required placeholder="Subject" type="text" name="subject" value="">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Message</label>
										
										<div class="col-md-3">
											<textarea class="form-control input-md" required placeholder="Messgae" type="text" name="message"></textarea>
											
										</div>
										
										
									</div>
								</div>
								<div class=" right1" align="right" style="margin-right:10px">
									<button type="submit" class="btn green" name="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
			
			
			</div></div>
</body>

<?php footer();?>
<?php scripts();?>

</html>

