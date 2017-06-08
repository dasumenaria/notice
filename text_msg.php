<?php
date_default_timezone_set('asia/kolkata');
 include("index_layout.php");
 include("database.php");
  $faculty_login_id=$_SESSION['id'];
	$role=$_SESSION['category'];
	$message ='';
	if(isset($_POST['submit'])) 
	{
		$message=$_POST['message'];
		$date_from=date('Y-m-d');
  		mysql_query("insert into `text_message` set `text`='$message' , `date`='$date_from' ");
		$message='Text insert successfully';	
	}
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Text Message</title>
</head>
<style>
span {
	    padding: 3px !important;
}
</style>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Text Message
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
                               <form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
										<label class="col-md-3 control-label">Message</label>
										<div class="col-md-6">
											<textarea class="form-control input-md" rows="4" maxlength="30" required type="text" name="message"></textarea>
										</div>
									</div>
									<div class=" right1" align="center">
                                        <button type="submit" class="btn green formsubmit" name="submit" >Submit</button>
                                    </div>
                               </form>
                               </div> 
							</div>
						</div>
					</div>
				</div>
            </div>
</body>
<?php footer();?>
<?php scripts();?>
<script>
	 
	
	var myVar=setInterval(function(){myTimerr()},4000);
	function myTimerr() 
	{
		$("#success").hide();
	}
	
 </script>
</html>