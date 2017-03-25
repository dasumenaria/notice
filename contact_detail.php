<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];
 $user_id=$_SESSION['id'];
 $message=false;
	$message2=false;
$mmessage="";	
if(isset($_POST['submit']))
{
	$role_id=5;
$name=mysql_real_escape_string($_REQUEST["name"]);
$eno=mysql_real_escape_string($_REQUEST["eno"]);
$mobile_no=mysql_real_escape_string($_REQUEST["mobile_no"]);
$parent_mobile_no=mysql_real_escape_string($_REQUEST["parent_mobile_no"]);
$password=md5($eno);
$father_name=mysql_real_escape_string($_REQUEST["father_name"]);
$mother_name=mysql_real_escape_string($_REQUEST["mother_name"]);
$class_id=mysql_real_escape_string($_REQUEST["class_id"]);
$section_id=mysql_real_escape_string($_REQUEST["section_id"]);
$medium_id=mysql_real_escape_string($_REQUEST["medium_id"]);
$dob1=mysql_real_escape_string($_REQUEST["dob"]);
$dob=date('Y-m-d',strtotime($dob1));
$curent_date=date('Y-m-d');
$notification_key='AAAArt9gILg:APA91bFwFhemkzYV7Sq83t7zvpLC8QY27DC__xWUFIbI1GefXTDD0_4S8hOuOJ88q0oZ3gmWjshoRSwU08xqcWTb1a1PofkKp52nUdN9tB-voht0KhDW4O4Ch39ycj0VNogAuYRj29dN';
			  $fetch_st=mysql_query("select * from student where flag='0' AND eno='$eno'");		
					$fetch_st1=mysql_fetch_array($fetch_st);
					
					if(empty($fetch_st1))
					{
					
$sql="insert into login(name,eno,mobile_no,father_name,mother_name,class_id,section_id,medium,dob,parent_mobile_no,curent_date,user_id,role_id,notification_key,password)values('$name','$eno','$mobile_no','$father_name','$mother_name','$class_id','$section_id','$medium_id','$dob','$parent_mobile_no','$curent_date','$user_id','$role_id','$notification_key','$password')";
$r=mysql_query($sql);
$mmessage="Student Registration Successfully";
$ids=mysql_insert_id();
$photo1="student".$ids.".jpg";
$file_upload='noimage.png';

    // moe photo in  floder//
		if(move_uploaded_file($_FILES["image"]["tmp_name"],"user/".$photo1))
	{
		$r=mysql_query("update login set image='$photo1' where id='$ids'");
    }
	else{
		$r=mysql_query("update login set image='$file_upload' where id='$ids'");
	}
	
	
	$message =true;	
}
else{
	$message2 =true;	
	
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
		 
		 
			<div class="row">
							<div class="col-md-12">
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
									
	<?php if($message2)
    { 
		?>
			<h5 id="success" style="color:red; text-align:center;"><b>User already exist!</b></h5>
		<?php 
	} 
	?>
	<?php if($message)
    { 
		?>
			<h5 id="success" style="color:red; text-align:center;"><b>Thank You, registration has been successfully.</b></h5>
		<?php 
    } 
	?>
									<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Contact Detials</span>
										</div>
										
										
									</div>
									<div class="portlet-body">
                                      
										<div class="tab-content">
											<!-- PERSONAL INFO TAB -->
											<div class="tab-pane active" id="tab_1_1">
                                            <input type="hidden" name='edit_id' class="form-control" value="<?php echo $get_id;?>" >	
												<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
                                                  <div class="row">  
                                                    <div class="col-sm-4">
                                                    	<div class="form-group">
                                                            <label class="control-label">Name of Faculty</label>
                                                            <input type="text" placeholder="Provide faculty name" name="name" required class="form-control" value=""/>
                                                        </div>
                                                    </div>
													<div class="col-sm-2"><div class="form-group"> <label class="control-label"></label> &nbsp;</div></div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Mobile No</label>
                                                            <input type="text" placeholder="Provide faculty mobile no" name="mobile_no" value="" class="form-control"/>
                                                        </div>
                                                    </div>
                                                  </div>
                                                  <div class="row">   
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Email Id</label>
                                                            <input type="text" placeholder="Provide faculty Email Address" name="email" value="" class="form-control"/>
                                                        </div>
                                                    </div>
													<div class="col-sm-2"><div class="form-group"> <label class="control-label"></label> &nbsp;</div></div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Role</label>
                                                            <select class="form-control select select2 select2me" placeholder="Select section.." name="section_id">
                                                                <option value=""></option>
                                                                <?php
                                                                    $r1=mysql_query("select `id`,`role_name` from master_role");		
                                                                    $i=0;
                                                                    while($row1=mysql_fetch_array($r1))
                                                                    {
                                                                        $id=$row1['id'];
                                                                        $role_name=$row1['role_name'];
                                                                        ?>
                                                                        <option value="<?php echo $id;?>"><?php echo $role_name;?></option>
                                                                        <?php 
                                                                    } ?>
                                                        	 </select>
                                                        </div>
                                                    </div>
                                                 </div>   
                                                  
                                                   
                                                <div class="col-sm-12">
                                                    <div class=" right1" align="right" style="margin-right:10px">
                                                        <button type="submit" class="btn green" name="submit">Submit</button>
                                                    </div>
                                                </div>
                                                     
												</form>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						
					</div>
			
			
			</div></div>
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

