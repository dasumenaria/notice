<?php
 include("index_layout.php");
 include("database.php");
 require_once('ImageManipulator.php');
 $user=$_SESSION['category'];
 $get_id=$_GET['id'];
 
  $message="";
if(isset($_POST['update_submit']))
{
	$username=mysql_real_escape_string($_REQUEST["user_name"]);
	$password1=mysql_real_escape_string($_REQUEST["password"]);
	$password=md5($password1);
	$role_id=mysql_real_escape_string($_REQUEST["role_id"]);
	$mobile_no=mysql_real_escape_string($_REQUEST["mobile_no"]);
	$name=mysql_real_escape_string($_REQUEST["name"]);
	$address=mysql_real_escape_string($_REQUEST["address"]);
	$class_id=mysql_real_escape_string($_REQUEST["class_id"]);
	$section_id=mysql_real_escape_string($_REQUEST["section_id"]);
	@$file_name=$_FILES["image"]["name"];
	@$k_image=$_REQUEST["k_image"];
	$date=date('Y-m-d');
	if(!empty($file_name))
	{
		$filedata=explode('/', $_FILES["image"]["type"]);
		$filedata[1];
		$newNamePrefix = rand(100, 10000); 
		$manipulator = new ImageManipulator($_FILES['image']['tmp_name']);
		$newImage = $manipulator->resample(640, 360);
		$manipulator->save("faculty/".$folderName2."/" . $newNamePrefix .".". $filedata[1]);
		$item_image=$newNamePrefix.".".$filedata[1];
		$r=mysql_query("update `faculty_login` SET `image`='$item_image' where id='".$get_id."'" );
 	}
	 
	if(!empty($password1))
	{
		$r=mysql_query("update `faculty_login` SET `password`='$password',`name`='$name',`user_name`='$username',`role_id`='$role_id',`mobile_no`='$mobile_no',`address`='$address',`class_id`='$class_id',`section_id`='$section_id' where id='".$get_id."'" );
	}
	else
	{
		$r=mysql_query("update `faculty_login` SET `name`='$name',`user_name`='$username',`role_id`='$role_id',`mobile_no`='$mobile_no',`address`='$address',`class_id`='$class_id',`section_id`='$section_id' where id='".$get_id."'" );
	}
	$message="User update Successfully";
 }
	 
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update User Details</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Update User Details
							</div>
							<div class="tools">
							<a class="" href="view_users.php" style="color: white"><i class="fa fa-search">&nbsp;View</i></a>
							</div>
						</div>
						<div class="portlet-body form">
<?php if($message!="") { ?>
<div id="success" class="alert alert-success" style="margin-top:10px; width:50%">
<?php echo $message; ?>
</div>
<?php } ?>
							<form class="form-horizontal" role="form" id="form_sample_2"  method="post" enctype="multipart/form-data">
								
								
								
								<div class="form-body">
								
								<?php
									$r1=mysql_query("select * from  faculty_login where id='".$get_id."'");
									$row1=mysql_fetch_array($r1);
									$id=$row1['id'];
									$user_name=$row1['user_name'];
									$name=$row1['name'];
									$role_id=$row1['role_id'];
									$mobile_no=$row1['mobile_no'];
									$address=$row1['address'];
									$image=$row1['image'];
									$class_id=$row1['class_id'];
									$section_id=$row1['section_id'];
									?>
								<div class="row">
								<div class="form-group">
									<div class="col-md-6">
										<div class="row">
											<div class="form-group">
												<label class="col-md-3 control-label ">&nbsp;</label>
												<div class=" col-md-5 ">
													<img src="faculty/<?php echo $image;?>" style="width:200px; height:200px" alt=""/>
												</div>
											</div>
										</div>
									</div>
								        
									<div class="col-md-6">
										<div class="row">
								        <div class="form-group">
										<label class="col-md-3 control-label">Select Role <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-4">
                                        <select name="role_id" class="form-control select select2 select2me input-medium" required placeholder="Select..." id="sid">
                                         <option value=""></option>
                                            <?php
                                            $r1=mysql_query("select * from master_role where id!=1");		
                                            $i=0;
                                            while($row1=mysql_fetch_array($r1))
                                            {
                                            $id=$row1['id'];
                                            $role_name=$row1['role_name'];
                                            ?>
									  <option value="<?php echo $id;?>" <?php if($id==$role_id){ echo "selected";}?> ><?php echo $role_name;?></option>                              
									  <?php }?> 
									  <select/>
										</div>
										</div>
										</div>
								 <div class="row">
								        <div class="form-group">
										<label class="col-md-3 control-label"> Name <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-4">
											<input class="form-control input-medium" required placeholder="Name" value="<?php echo $name;?>" type="text" name="name">
										</div>
									</div>
									</div>
								        <div class="row">
								        <div class="form-group">
										<label class="col-md-3 control-label">User Name <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-4">
											<input class="form-control input-medium" required placeholder="User Name" value="<?php echo $user_name;?>" type="text" name="user_name">
										</div>
									</div>
									</div>
								        <div class="row">
								        <div class="form-group">
										<label class="col-md-3 control-label">Password </label>
										<div class="col-md-4">
											<input class="form-control input-medium" placeholder="New Password" value="" type="text" name="password">
										</div>
									</div>
									</div>
									
									<div class="row">
										<div class="form-group">
											<label class="col-md-3 control-label">Mobile No <span class="required" aria-required="true"> * </span></label>
											<div class="col-md-4">
												<input class="form-control input-medium" required placeholder="Mobile No" value="<?php echo $mobile_no;?>" type="text" name="mobile_no">
											</div>									
										</div>
									</div>
									<div class="row">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Address</label>
                                            <div class="col-md-4">
                                                <textarea class="form-control input-medium" rows="2"  placeholder="Address" type="text" name="address"><?php echo $address;?></textarea>
                                            </div>
                                        </div>
									</div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Class <span class="required" aria-required="true"> * </span></label>
                                            <div class="col-md-6">
                                               <select name="class_id" class="form-control select2me section_select" required placeholder="Select...">
                                                    <option value=""></option>
                                                    <?php
                                                    $class=mysql_query("select * from master_class");		
                                                    $i=0;
                                                    while($class1=mysql_fetch_array($class))
                                                    {
                                                    $id=$class1['id'];
                                                    $class_name=$class1['class_name'];
                                                    ?>
                                                  <option value="<?php echo $id;?>" <?php if($class_id==$id){?> selected <?php }?> ><?php echo $class_name;?></option>                              
                                                  <?php }?> 
                                                </select>
                                            </div>
                                        </div>
									</div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Section <span class="required" aria-required="true"> * </span></label>
                                            <div class="col-md-6">
                                               <select name="section_id" class="form-control" required placeholder="Select..." id="replace_data">
                                                    <option value=""></option>
                                                    <?php
                                                        $queryq=mysql_query("select * from `master_section`");
                                                        while($ftc_detailq=mysql_fetch_array($queryq)){
                                                        $section_name=$ftc_detailq['section_name'];
                                                        $id=$ftc_detailq['id'];
														if($section_id==$id){
															?>
																<option value="<?php echo $id;?>" selected><?php echo $section_name;?></option>                              
															<?php
														}
                                                    }	 ?>
                                                 </select>
                                            </div>
                                        </div>
									</div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Change Image</label>
                                            <div class="col-md-6">
                                                <input type="file" class="default form-control" name="image" id="file1 " onChange="loadFile(event)"> 
                                            </div>
                                        </div>
									</div>
                                    </div>
                                    </div>
                                   </div>
								
													
								<div class=" right1" align="center" style="margin-right:50px">
									<button type="submit" class="btn blue" name="update_submit">Update</button>
								</div>
							</form>
						</div>
					</div>
</div></div></div>
</body>

<?php footer();?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){    
        $(".remove_row").die().live("click",function(){
            $(this).closest("#parant_table tr").remove();
        });
		/*$(document).on('change','.section_select', function(){
			var class_id = $(this).val();
			 
			$.ajax({
				url: "ajax_page.php?function_name=create_user_section_list&id="+class_id,
				type: "POST",
				success: function(data)
				{   
 					  $('#replace_data').html(data);
 				}
			});
		});*/
	});

		var myVar=setInterval(function(){myTimerr()},4000);
		function myTimerr() 
		{
		$("#success").hide();
		} 
		</script>

<script>
    function add_row(){  
        var new_line=$("#sample tbody").html();
            $("#parant_table tbody").append(new_line);
    }
</script>
<?php scripts();?>
</html>



