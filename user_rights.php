<?php
 include("index_layout.php");
 include("database.php");
 @session_start();
 $user=$_SESSION['category'];
 $session_id=$_SESSION['id'];
 
 if(isset($_POST['submit']))
 {
   $module_id=$_REQUEST["module_id"];
   $role_id=$_REQUEST["role_id"];
   $modulesize=sizeof($module_id);
   $module=0;
 for($j=0; $j<$modulesize; $j++)
 {
$module=$module_id[$j];
 $ru=mysql_query("select * from user_management where role_id='$role_id' AND module_id='$module' ");		
 $ru1=mysql_fetch_array($ru);
 if($ru1>0)
 {
$ru=mysql_query("update `user_management` SET `role_id`='$role_id',`module_id`='$module' where role_id='$role_id' AND module_id='$module'" );
$sql=mysql_query($ru);
}
else{
$sql="insert into user_management(role_id,module_id)values('$role_id','$module')";
    $r=mysql_query($sql);	
}
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
<title></title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Users Rights
							</div>
						
						</div>
						<div class="portlet-body form">
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Select Category</label>
										<div class="col-md-3">
                                        <select name="role_id" class="form-control select select2 select2me" placeholder="Select..." id="sid">
                                         <option value=""></option>
                                            <?php
                                            $r1=mysql_query("select * from master_role");		
                                            $i=0;
                                            while($row1=mysql_fetch_array($r1))
                                            {
                                            $id=$row1['id'];
                                            $role_name=$row1['role_name'];
                                            ?>
                              <option value="<?php echo $id;?>"><?php echo $role_name;?></option>                              
                              <?php }?> 
                              <select/>
										</div>
									</div>
                                    
                                  
                                            <div id="data">
                                          
                                            </div>
										
									
									 
									 
								</div>
								 
							</form>
						</div>
					</div>
			
			
			</div></div>
</body>

<?php footer();?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
  $("#sid").change(function(){
        var ids=1;
	  	$.ajax({
			url: "view_rights.php?id="+ids,
			}).done(function(response) {
		   $("#data").html(""+response+"");
			});
});
});
</script>
<?php scripts();?>


</html>

