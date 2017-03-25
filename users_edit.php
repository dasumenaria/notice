<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];
 $get_id=$_GET['id'];
 
  $message="";
if(isset($_POST['update_submit']))
{
$username=mysql_real_escape_string($_REQUEST["user_name"]);
//$password1=mysql_real_escape_string($_REQUEST["password"]);
//$password=md5($password1);
$role_id=mysql_real_escape_string($_REQUEST["role_id"]);
$mobile_no=mysql_real_escape_string($_REQUEST["mobile_no"]);
$address=mysql_real_escape_string($_REQUEST["address"]);
 @$file_name=$_FILES["image"]["name"];
 @$k_image=$_REQUEST["k_image"];
$date=date('Y-m-d');
				if(!empty($file_name))
				{
				@$file_name=$_FILES["image"]["name"];
				$file_tmp_name=$_FILES['image']['tmp_name'];
			    $target ="faculty/";
				$file_name=strtotime(date('d-m-Y h:i:s'));
				$filedata=explode('/', $_FILES["image"]["type"]);
				$filedata[1];
				$random=rand(100, 10000);
				$target=$target.basename($random.$file_name.'.'.$filedata[1]);
				move_uploaded_file($file_tmp_name,$target);
				$item_image=$random.$file_name.'.'.$filedata[1];
				}
				else{
				$item_image=$k_image;
				}
				$r=mysql_query("update `faculty_login` SET `user_name`='$username',`role_id`='$role_id',`mobile_no`='$mobile_no',`address`='$address',`image`='$item_image' where id='".$get_id."'" );
				$message="User Added Successfully";
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
								<i class="fa fa-gift"></i> Update User Details
							</div>
							<div class="tools">
							<a class="" href="view_users.php" style="color: white"><i class="fa fa-search">&nbsp;View</i></a>
							</div>
						</div>
						<div class="portlet-body form">
                        <?php if($message!="") { ?>
<div class="message" id="success" style="color:#44B6AE; text-align:center"><label class="control-label"><?php echo $message; ?></label></div>
                        </br><?php } ?>
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								
								
								
								<div class="form-body">
								
								<?php
									$r1=mysql_query("select * from  faculty_login where id='".$get_id."'");
									$row1=mysql_fetch_array($r1);
									$id=$row1['id'];
									$user_name=$row1['user_name'];
									$role_id=$row1['role_id'];
									$mobile_no=$row1['mobile_no'];
									$address=$row1['address'];
									$image=$row1['image'];
									?>
								<div class="row">
								<div class="form-group">
								<div class="col-md-6">
									<div class="row">
									 <div class="form-group">
									                <label class="col-md-3 control-label ">&nbsp;</label>
                                                    <div class=" col-md-5 fileinput fileinput-new" style="padding-left: 15px; padding-top:0px" data-provides="fileinput">
                                                    <div class="col-md-10 fileinput-new thumbnail" style="width: 200px;  height: 150px;">
                                                    <img src="faculty/<?php echo $image;?>" style="width:100%;" alt=""/>
                                                    </div>
                                                    <div class="col-md-6 fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                    </div>
                                                    <div class="col-md-6">
                                                    <span class="btn default btn-file addbtnfile" style="background-color:#00CCFF; color:#FFF">
                                                    <span class="fileinput-new">
                                                    <i class="fa fa-plus"></i> </span>
                                                    <span class="fileinput-exists">
                                                    <i class="fa fa-plus"></i> </span>
                                                    <input type="idden" class="default" name="k_image" value="<?php echo $image;?>" id="">
                                                    <input type="file" class="default" name="image" id="file1 " onchange="loadFile(event)">
                                                    </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput" style=" color:#FFF">
                                                    <i class="fa fa-trash"></i> </a></div>
                                                    </div>
                                                    </div></div>
								</div>
								         
										<div class="col-md-6">
										<div class="row">
								        <div class="form-group">
										<label class="col-md-3 control-label">Select Role</label>
										<div class="col-md-4">
                                        <select name="role_id" class="form-control select select2 select2me input-medium" placeholder="Select..." id="sid">
                                         <option value=""></option>
                                            <?php
                                            $r1=mysql_query("select * from master_role where id!=4");		
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
										<label class="col-md-3 control-label">User Name</label>
										<div class="col-md-4">
											<input class="form-control input-medium" required placeholder="User Name" value="<?php echo $user_name;?>" type="text" name="user_name">
										</div>
									</div>
									</div>
									
									<div class="row">
                                    <div class="form-group">
										<label class="col-md-3 control-label">Mobile No</label>
										<div class="col-md-4">
											<input class="form-control input-medium" required placeholder="Mobile No" value="<?php echo $mobile_no;?>" type="text" name="mobile_no">
										</div>									
									</div>
									</div>
									<div class="row">
                                    <div class="form-group">
										<label class="col-md-3 control-label">Address</label>
										<div class="col-md-4">
											<textarea class="form-control input-medium" rows="1"  placeholder="Address" type="text" name="address"><?php echo $address;?></textarea>
										</div>
										
									</div>
									</div></div></div></div>
								
													
								<div class=" right1" align="right" style="margin-right:50px">
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



