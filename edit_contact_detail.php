<?php
 include("index_layout.php");
 include("database.php");
 $message='';
	if(isset($_POST['update_details'])) 
	{
		$update_id=$_POST['update_id'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$mobile_no=$_POST['mobile_no'];
		$designation=$_POST['designation'];
 		mysql_query("update `contact_detail` set `name`='$name' , `email`='$email' , `mobile_no`='$mobile_no' , `designation`='$designation' where `id` = '$update_id' ");
		$message='Faculty update successfully';	
	}
	if(isset($_POST['delete_details'])) 
	{
		$update_id=$_POST['update_id'];
 		mysql_query("update `contact_detail` set `flag`='1' where `id` = '$update_id' ");
		$message='Faculty successfully deleted';	
	}
	
?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Contact Details</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> View Contact Details
							</div>
							<div class="tools">
							 <a class="" href="contact_detail.php" style="color: white"><i class="fa fa-plus"> Add Contact</i></a> 
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
                                 
								<table class="table-condensed table-bordered" style="width:100%;">
								<thead>
								<tr style="background-color:#FFFFFF; color:rgba(94, 94, 94, 0.82);">
									<th>S. No.</th>
									<th>Name</th>
									<th>Email</th>
									<th>Mobile No.</th>
									<th>Date</th>
									<th>Designation</th>
                                    <th>Action</th>
								</tr>
								</thead>
                                    <tbody>
									 <?php
										  $i=0;
										   $r1=mysql_query("select * from `contact_detail` where flag = '0' order by id Desc ");		
                                            while($row1=mysql_fetch_array($r1))
                                            {
                                            $i++;
                                            $id=$row1['id'];
                                            $name=$row1['name'];
                                            $email=$row1['email'];        
                                            $mobile_no=$row1['mobile_no'];
                                            $timestamp=$row1['timestamp'];
                                            $date=date('d-m-Y',strtotime($timestamp));
											$designation=$row1['designation'];
											 
                                        ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $name;?></td>
                                            <td><?php echo $email;?></td>
                                            <td><?php echo $mobile_no;?></td>	
                                            <td><?php echo $date;?></td>
                                            <td><?php echo $designation;?></td>
                                            <td>
                                            <a class="btn blue btn-xs edit_contact" data-toggle="modal" id="<?php echo $id; ?>" href="#basic"><i class="fa fa-edit"></i> Edit </a>
                                            <a class="btn red btn-xs" data-toggle="modal" href="#delete<?php echo $id; ?>"><i class="fa fa-trash-o"></i> Delete </a>
                                            <div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" role="basic" aria-hidden="true" >
                                                <div class="modal-dialog">
                                                    <form method="post">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title"><strong>Do you want to delete faculty</strong></h4>
                                                        </div>
                                                        <input type="hidden" name="update_id" value="<?php echo $id; ?>">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="delete_details" class="btn red">Delete</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>

                                            </td>
                                        </tr>
                         <?php } ?>
                                    </tbody>
                                </table>
                                
                                <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true" >
                                    <div class="modal-dialog">
                                        <form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title"><strong>Edit Contact Details</strong></h4>
                                            </div>
                                            <div class="modal-body replace_data" style="min-height: 180px;">
                                            
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                                <button type="submit" name="update_details" class="btn blue">Update</button>
                                            </div>
                                        </div>
                                        </form>
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
	$('.edit_contact').click(function(){
		var	id= $(this).attr('id');
		$.ajax({
			url: "ajax_page.php?function_name=edit_contact&id="+id,
			type: "POST",
			success: function(data)
			{   
				  $('.replace_data').html(data);
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