<?php
 include("index_layout.php");
 include("database.php");
  $message='';
	if(isset($_POST['update_details'])) 
	{
		$update_id=$_POST['update_id'];
		$appoint_to=$_POST['appoint_to'];
		$appoint_time=$_POST['appoint_time'];
		$reason=$_POST['reason'];
		$appoint_date=date('Y-m-d', strtotime($_POST['appoint_date']));;
 		mysql_query("update `appointment` set `appoint_to`='$appoint_to' , `appoint_date`='$appoint_date' , `appoint_time`='$appoint_time' , `reason`='$reason' where `id` = '$update_id' ");
		$message='Faculty update successfully';	
	}
	if(isset($_POST['approve_details'])) 
	{
		$update_id=$_POST['update_id'];
 		mysql_query("update `appointment` set `status`='1' where `id` = '$update_id' ");
		$message='Appointment approve successfully';	
	}
	if(isset($_POST['reject_details'])) 
	{
		$update_id=$_POST['update_id'];
 		mysql_query("update `appointment` set `status`='2' where `id` = '$update_id' ");
		$message='Appointment reject successfully';	
	}
	if(isset($_POST['complete_details'])) 
	{
		$update_id=$_POST['update_id'];
 		mysql_query("update `appointment` set `status`='3' where `id` = '$update_id' ");
		$message='Appointment complete successfully';	
	}
	
?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
                                            <select name="role_id" class="form-control select2me " placeholder="Select..." id="sid">
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
											<textarea class="form-control input-md" required type="text" name="news_details"></textarea>
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
	$('.edit_contact').click(function(){
		var	id= $(this).attr('id');
		$.ajax({
			url: "ajax_page.php?function_name=edit_appointment&id="+id,
			type: "POST",
			success: function(data)
			{   
			  $('.replace_data').html(data);
			  $('.date-picker').datepicker();
			  $('.timepicker').timepicker();
			}
		});
	});
	var myVar=setInterval(function(){myTimerr()},4000);
	function myTimerr() 
	{
		$("#success").hide();
	}
	
 </script>
</html>