
<?php
include("index_layout.php");
include("database.php");
 $role_id = $_SESSION['category']; 
 $login_id=$_SESSION['id']; 
  $message='';
	if(isset($_POST['submit'])) 
	{
		$subject_id=$_POST['subject_id'];
		$class_id=$_POST['class_id'];
		$section_id=$_POST['section_id'];
	 
		$explode_subject=implode(',', $subject_id) ;
		$date=date('Y-m-d');
		$data=mysql_query("select `id` from `subject_mapping` where `class_id`='$class_id' && `section_id`='$section_id' ");
  		$count=mysql_num_rows($data); 
		if($count > 0)
		{
			$ftc_date=mysql_fetch_array($data);
			$update_id=$ftc_date['id'];
			mysql_query("update `subject_mapping` set `class_id`='$class_id' , `section_id`='$section_id' , `subject_id`='$explode_subject', `date`='$date' where `id`='$update_id' ");
		}
		else
		{
   			mysql_query("insert into `subject_mapping` set `class_id`='$class_id' , `section_id`='$section_id' , `subject_id`='$explode_subject', `date`='$date' ");
		}
		
		$message='Successfully Submitted';	
	}
	if(isset($_POST['sub_del'])) 
	{
		$delet_sub=$_POST['delet_sub'];
		mysql_query("delete from `subject_mapping` where `id` = '$delet_sub' ");
	}

?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subject Mapping</title>
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
								<i class="fa fa-group"></i> Subject Mapping
							</div>
							 
						</div>
						<div class="portlet-body form">
							<div class="form-body">
								<div class="scroller" style="min-height:500px;"  data-always-visible="1" data-rail-visible="0">
								   <?php if($message){ ?>
                                   <div id="success">
                                        <div class="alert alert-success">
                                            <strong><?php echo $message; ?></strong> 
                                        </div>
                                   </div>
                                    <?php } ?> 
                                    <form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
                                         <div class="row col-md-12">  
                                            <div class="col-sm-4">
                                                <label class="control-label">Select Class</label>
                                                <select name="class_id" class="form-control select2me section_select" required="required" placeholder="Select..." id="sid">
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
                                            <div class="col-sm-4">
                                                <label class="control-label">Select Section</label>
                                             	<select name="section_id" class="form-control select2me " required="required" placeholder="Select..." id="replace_data">
                                             		<option value=""></option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="control-label">Select Subject</label>
                                                <select name="subject_id[]" class="form-control select2me" required="required" multiple placeholder="Select...">
                                                    <option value=""></option>
                                                        <?php
                                                        $r1=mysql_query("select `subject_name`,`id` from master_subject order by subject_name ASC");		
                                                        $i=0;
                                                        while($row1=mysql_fetch_array($r1))
                                                        {
                                                            $id=$row1['id'];
                                                            $subject_name=$row1['subject_name'];
                                                            ?>
                                                            <option value="<?php echo $id;?>"><?php echo $subject_name;?></option>                              
                                                        <?php 
                                                        }?> 
                                                  </select>
                                            </div>
                                        </div>   
                                          
                                        <div class="row col-md-12" style="margin-top: 35px;">
                                            <div align="center">
                                                <button type="submit" class="btn green" name="submit">Submit</button>
                                            </div>
                                        </div>
                                     
                                    </form>
                                    
                                   <div class="col-md-12" style="margin-top:10px">
                                       <div class="portlet blue box">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-group"></i>View Subject Mapping
                                                </div>
                                                 
                                            </div>
                                            <div class="portlet-body form">
                                                <div class="form-body">
                                                	<table class="table table-bordered table-hover">
                                                    	<thead>
                                                        	<th>S.No</th>
                                                            <th>Class </th>
                                                            <th>Section </th>
                                                            <th>Subject</th>
                                                            <th>Action</th>
                                                        </thead>
                                                        <tbody>
                                                        <?php
														$i=0;
														$ftcquey=mysql_query("select * from `subject_mapping` ");
														while($ftc_data=mysql_fetch_array($ftcquey))
														{
															$i++;
															$id=$ftc_data['id'];
															$class_id=$ftc_data['class_id'];
																$ftcquwey=mysql_query("select `class_name` from `master_class` where `id` = ' $class_id'");
																$fetch=mysql_fetch_array($ftcquwey);
																$class_name=$fetch['class_name'];
															$section_id=$ftc_data['section_id'];
																$ftcquwey1=mysql_query("select `section_name` from `master_section` where `id` = ' $section_id'");
																$fetch1=mysql_fetch_array($ftcquwey1);
																$section_name=$fetch1['section_name'];
															$subject_id=$ftc_data['subject_id'];
															$sub_array=explode(',', $subject_id);
															
															$subject_array=array();
															foreach($sub_array as $sub_id)
																{  
																	$ftcquwey12=mysql_query("select `subject_name` from `master_subject` where `id` = ' $sub_id'");
																	$fetch12=mysql_fetch_array($ftcquwey12);
																	$subject_name=$fetch12['subject_name'];	
																	$subject_array[]=$subject_name;														
																}
 															$subject_show=implode(', ', $subject_array) ; 
														?>
                                                        	<tr>
                                                        	<td><?php echo $i; ?></td>
                                                        	<td><?php echo $class_name; ?></td>
                                                            <td><?php echo $section_name;?></td>
                                                            <td><?php echo $subject_show;  ?></td>
                                                            <td>
<a class="btn blue-madison red-stripe btn-sm"  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
        <div class="modal fade" id="delete<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete ?</span>
                    </div>
                    <div class="modal-footer">
                    <form method="post" name="delete<?php echo $id ;?>">
                        <input type="hidden" name="delet_sub" value="<?php echo $id; ?>" />
                        
                        <button type="submit" name="sub_del" value="" class="btn btn-sm red-sunglo ">Yes</button> 
                    </form>
                    </div>
                </div>
            </div>
        </div>

                                                            
                                                            </td>
                                                            </tr>
                                                        <?php
														}?>
                                                        </tbody>
                                                    </table>
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
				  $('#replace_data').val('');
 			}
		});
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
	
 </script>
</html>