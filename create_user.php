<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];
  $message="";
if(isset($_POST['submit']))
{
$username=mysql_real_escape_string($_REQUEST["user_name"]);
$password1=mysql_real_escape_string($_REQUEST["password"]);
$password=md5($password1);
$role_id=mysql_real_escape_string($_REQUEST["role_id"]);
$mobile_no=mysql_real_escape_string($_REQUEST["mobile_no"]);
$address=mysql_real_escape_string($_REQUEST["address"]);
$class_id=mysql_real_escape_string($_REQUEST["class_id"]);
$section_id=mysql_real_escape_string($_REQUEST["section_id"]);
@$file_name=$_FILES["image"]["name"];
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
	$item_image='no_image.png';
				}

	$sql="insert into faculty_login(user_name,role_id,password,mobile_no,address,image,curent_date,class_id,section_id)
	values('$username','$role_id','$password','$mobile_no','$address','$item_image','$date','$class_id','$section_id')";
	$r=mysql_query($sql);
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
<title>Faculty Registration</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Add User
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
								
								<div class="row">
								<div class="form-group">
										<label class="col-md-2 control-label">Select Role</label>
										<div class="col-md-3">
                                        <select name="role_id" class="form-control select select2 select2me" placeholder="Select..." id="sid">
                                         <option value=""></option>
                                            <?php
                                            $r1=mysql_query("select * from master_role where id=2 OR id=3 OR id=4");		
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
								
										<label class="col-md-2 control-label">User Name</label>
										<div class="col-md-3">
											<input class="form-control input-md" required placeholder="User Name" type="text" name="user_name">
										</div>
									</div>
									</div>
									
									
									
									
									<div class="row">
                                    <div class="form-group">
										<label class="col-md-2 control-label">Password</label>
										<div class="col-md-3">
											<input class="form-control input-md" required placeholder="Password" type="text" name="password">
										</div>
										
										<label class="col-md-2 control-label">Mobile No</label>
										<div class="col-md-3">
											<input class="form-control input-md" required placeholder="Mobile No" type="text" name="mobile_no">
										</div>
										
									</div>
									</div>
									
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Select Class</label>
                                            <div class="col-md-3">
                                            <select name="class_id" class="form-control select select2 select2me section_select" placeholder="Select...">
                                             	<option value=""></option>
                                                <?php
												$class=mysql_query("select * from master_class");		
												$i=0;
												while($class1=mysql_fetch_array($class))
												{
												$id=$class1['id'];
												$class_name=$class1['class_name'];
												?>
											  <option value="<?php echo $id;?>"><?php echo $class_name;?></option>                              
											  <?php }?> 
                                       		</select>
                                            </div>
                                        
                                            <label class="col-md-2 control-label">Section</label>
                                            <div class="col-md-3">
                                               <select name="section_id" class="form-control select select2 select2me " placeholder="Select..." id="replace_data">
                                             	<option value=""></option>
                                               </select>
                                            </div>
                                        </div>
									</div>
                                    
                                    
                                    
									<div class="row">
									 <div class="form-group">
									 <label class="col-md-2 control-label">Address</label>
										<div class="col-md-3">
											<textarea class="form-control input-md" rows="1"  placeholder="Address" type="text" name="address"></textarea>
										</div>
                                                    <label class="col-md-2 control-label ">User Image</label>
                                                    </br>
                                                    <div class=" col-md-5 fileinput fileinput-new" style="padding-left: 15px; padding-top:0px" data-provides="fileinput">
                                                    <div class="col-md-10 fileinput-new thumbnail" style="width: 200px;  height: 50px;">
                                                    <img src="img/noimage.png" style="width:100%;" alt=""/>
                                                    </div>
                                                    <div class="col-md-6 fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                    </div>
                                                    <div class="col-md-6">
                                                    <span class="btn default btn-file addbtnfile" style="background-color:#00CCFF; color:#FFF">
                                                    <span class="fileinput-new">
                                                    <i class="fa fa-plus"></i> </span>
                                                    <span class="fileinput-exists">
                                                    <i class="fa fa-plus"></i> </span>

                                                    <input type="file" class="default" name="image" id="file1 " onChange="loadFile(event)">
                                                    </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput" style=" color:#FFF">
                                                    <i class="fa fa-trash"></i> </a></div>
                                                    </div>
                                                    </div></div>
													</div>
													
													
													
													
						
						<!--<div class="row" style="margin-top:-20px">
						<div class="form-group">
						<label class="col-md-1 control-label">&nbsp;</label>
						<div class="col-md-5">
						<table style="width:50%; border:0px solid;"  align="center" class="" id="parant_table">
						<tbody>
						<tr>
						<tr><td align="center"><label class="col-md-2 control-label">Class</label></td><td><label class="col-md-2 control-label">&nbsp;&nbsp;&nbsp;&nbsp;Section</label></td></tr>
						
						<td>
										<div class="col-md-8">
                                        <select name="role_id" class="form-control select select2 select2me input-small" placeholder="Select..." id="sid">
                                         <option value=""></option>
                                            <?php
                                            $class=mysql_query("select * from master_class");		
                                            $i=0;
                                            while($class1=mysql_fetch_array($class))
                                            {
                                            $id=$class1['id'];
                                            $class_name=$class1['class_name'];
                                            ?>
                              <option value="<?php echo $id;?>"><label class="control-label"><?php echo $class_name;?></label></option>                              
                              <?php }?> 
                              <select/>
										</div>
                            </td>
							<td>
										<div class="col-md-3">
                                        <select name="role_id" class="form-control select select2 select2me input-small" placeholder="Select..." id="sid">
                                         <option value=""></option>
                                            <?php
                                            $section=mysql_query("select * from master_section");		
                                            $i=0;
                                            while($section1=mysql_fetch_array($section))
                                            {
                                            $id=$section1['id'];
                                            $section_name=$section1['section_name'];
                                            ?>
                              <option value="<?php echo $id;?>"><label class="control-label"><?php echo $section_name;?></label></option>                              
                              <?php }?> 
                              <select/>
										</div>
                            </td>
                            <td>
                            <button type="button" onclick="add_row()" class="btn default blue-stripe btn-xs"><i class="fa fa-plus"></i></button>
							</td>
							</tr>
							</tbody>
							</table>
							</div></div></div>-->
													

								<div class=" right1" align="right" style="margin-right:50px">
									<button type="submit" class="btn green" name="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
					
					
					<!--<label class="col-md-1 control-label">&nbsp;</label>
						<div class="col-md-5" style="display:none;">
			<table id="sample" style="display:none;">
        <tbody>    
               <tr>
                                <td>
										<div class="col-md-8">
                                        <select name="role_id" class="form-control select select2 select2me input-small" placeholder="Select..." id="sid">
                                         <option value=""></option>
                                            <?php
                                            $class=mysql_query("select * from master_class");		
                                            $i=0;
                                            while($class1=mysql_fetch_array($class))
                                            {
                                            $id=$class1['id'];
                                            $class_name=$class1['class_name'];
                                            ?>
                              <option value="<?php echo $id;?>"><label class="control-label"><?php echo $class_name;?></label></option>                              
                              <?php }?> 
                              <select/>
										</div>
                            </td>
							<td>
										<div class="col-md-3">
                                        <select name="role_id" class="form-control select select2 select2me input-small" placeholder="Select..." id="sid">
                                         <option value=""></option>
                                            <?php
                                            $section=mysql_query("select * from master_section");		
                                            $i=0;
                                            while($section1=mysql_fetch_array($section))
                                            {
                                            $id=$section1['id'];
                                            $section_name=$section1['section_name'];
                                            ?>
                              <option value="<?php echo $id;?>"><label class="control-label"><?php echo $section_name;?></label></option>                              
                              <?php }?> 
                              <select/>
										</div>
                            </td>
					<td>
					<button type="button" onclick="add_row()" class="btn default blue-stripe btn-xs"><i class="fa fa-plus"></i></button>
					<button type="button"  class="btn default red-stripe btn-xs remove_row"><i class="fa fa-trash"></i></button>
					</td>
					</tr>
					</tbody> 
					</table>
					</div>-->
					
	</div>
    </div>
    </div>
    </div>
    </div>
    </div>
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
$(document).ready(function(){    
        $(".remove_row").die().live("click",function(){
            $(this).closest("#parant_table tr").remove();
        });
		$(document).on('change','.section_select', function(){
			var class_id = $(this).val();
			 
			$.ajax({
				url: "ajax_page.php?function_name=create_user_section_list&id="+class_id,
				type: "POST",
				success: function(data)
				{   
 					 $('#replace_data').html(data);
 				}
			});
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

