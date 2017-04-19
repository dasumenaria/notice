<?php
 include("index_layout.php");
 include("database.php");
 $role_id = $_SESSION['category']; 
 $login_id=$_SESSION['id']; 
  $message='';
	if(isset($_POST['submit'])) 
	{
		$message=$_POST['message'];
		$sms_to_role=$_POST['sms_to_role'];
  		mysql_query("insert into `director_principle_message` set `message`='$message' , `sms_receive_role`='$sms_to_role' , `sms_sender_role`='$role_id' , `login_id`='$login_id'");
		if($sms_to_role=='1')
		{
			
		}
		if($sms_to_role=='4')
		{
			
		}
		if($sms_to_role=='5')
		{
			
		}
		
		$message='SMS send successfully';	
	}
?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Director Principle Message</title>
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
								<i class="fa fa-gift"></i> Director Principle Message
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
										<label class="col-md-3 control-label">Message To</label>
										<div class="col-md-6">
                                            <select name="sms_to_role" class="form-control select2me " placeholder="Select..." id="sid">
                                                <option value=""></option>
                                                    <?php
                                                    $r1=mysql_query("select * from master_role where id=1 OR id=4 OR id=5");		
                                                    $i=0;
                                                    while($row1=mysql_fetch_array($r1))
                                                    {
                                                        $id=$row1['id'];
                                                        $role_name=$row1['role_name'];
                                                        ?>
                                                        <option value="<?php echo $id;?>"><?php echo $role_name;?></option>                              
                                                    <?php 
                                                    }?> 
                                            </select>
										</div>
                                    </div>
                                    <div class="form-group">
										<label class="col-md-3 control-label">Message</label>
										<div class="col-md-6">
											<textarea class="form-control input-md" required type="text" name="message"></textarea>
										</div>
									</div>
									<div class=" right1" align="center">
                                        <button type="submit" class="btn green" name="submit" >Submit</button>
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