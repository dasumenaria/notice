 <?php
 include("index_layout.php");
 include("database.php");
 $role_id = $_SESSION['category']; 
 $login_id=$_SESSION['id']; 
  $message='';
	if(isset($_POST['submit'])) 
	{
		$teacher_id=$_POST['teacher_id'];+
		$class_id=$_POST['class_id'];
		$section_id=$_POST['section_id'];
 		
		mysql_query("update `faculty_login` set `class_id`='$class_id' , `section_id`='$section_id' where `id`='$teacher_id'"); 
		
		$data=mysql_query("select `id` from `class_section` where `class_id`='$class_id' && `section_id`='$section_id' ");
  		$count=mysql_num_rows($data); 
		if($count > 0)
		{
			$ftc_date=mysql_fetch_array($data);
			$update_id=$ftc_date['id'];
			mysql_query("update `class_section` set `class_id`='$class_id' , `section_id`='$section_id' , `teacher_id`='$teacher_id' where `id`='$update_id' ");
		}
		else
		{
  			mysql_query("insert into `class_section` set `class_id`='$class_id' , `section_id`='$section_id' , `teacher_id`='$teacher_id' ");
		}
		
		$message='Successfully Submitted';	
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
								<i class="fa fa-group"></i> Class Teacher & Section Mapping
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
                                          <div class="row col-md-12">  
                                            <div class="col-sm-6">
                                                <label class="control-label">Select Teacher</label>
                                                 <select name="teacher_id" class="form-control select2me" required="required" placeholder="Select..." id="sid">
                                                    <option value=""></option>
                                                        <?php
                                                        $r1=mysql_query("select `user_name`,`id` from faculty_login where   flag = 0 && role_id = 4  order by user_name ASC");		
                                                        $i=0;
                                                        while($row1=mysql_fetch_array($r1))
                                                        {
                                                            $id=$row1['id'];
                                                            $user_name=$row1['user_name'];
                                                            ?>
                                                            <option value="<?php echo $id;?>"><?php echo $user_name;?></option>                              
                                                        <?php 
                                                        }?> 
                                                  </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="control-label">Select Class</label>
                                                <select name="class_id" class="form-control select2me" required="required" placeholder="Select..." id="sid">
                                                    <option value=""></option>
                                                        <?php
                                                        $r1=mysql_query("select `class_name`,`id` from master_class where   flag = 0  order by id ASC");		
                                                        $i=0;
                                                        while($row1=mysql_fetch_array($r1))
                                                        {
                                                            $id=$row1['id'];
                                                            $class_name=$row1['class_name'];
                                                            ?>
                                                            <option value="<?php echo $id;?>"><?php echo $class_name;?></option>                              
                                                        <?php 
                                                        }?> 
                                                  </select>
                                            </div>
                                          </div>
                                          
                                          <div class="row col-md-12">   
                                            <div class="col-sm-6">
                                                <label class="control-label">Select Section</label>
                                                <select name="section_id" class="form-control select2me" required="required" placeholder="Select..." >
                                                	<option value=""></option>
                                                    <?php 
														$queryq=mysql_query("select * from `master_section` ");
														while($ftc_detailq=mysql_fetch_array($queryq))
														{
															$section_name=$ftc_detailq['section_name'];
															$id=$ftc_detailq['id'];
															?>
																<option value="<?php echo $id;?>"><?php echo $section_name;?></option>                              
															<?php  
														}	
													?>
                                                </select>
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
	$('.edit_contact').click(function(){
		var	id= $(this).val();
 		$.ajax({
			url: "ajax_page.php?function_name=create_user_section_list&id="+id,
			type: "POST",
			success: function(data)
			{   
				  $('#replace_data').html(data);
 			}
		});
	});
	
 </script>
</html>