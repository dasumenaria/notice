<?php
 include("index_layout.php");
 include("database.php");
 $poll_id=$_GET['id'];
 $polls_id=$_GET['id'];
 
if(isset($_POST['sub_delete']))
{
	$delete_id= $_POST['delete_id'];
	$r=mysql_query("update `poll` SET `flag`='1' where id='$delete_id'" );
	$sql=mysql_query($r);
	header("location:create_poll.php");
}

if(isset($_POST['submit']))
{
	$poll=$_POST['poll'];
	$poll_options=$_POST['poll_options'];
	$user_id=$_SESSION['id'];
	@$file_name=$_FILES["image"]["name"];
	$directoryPath = "poll/";
	mkdir($directoryPath, 0777);
		if(!empty($file_name))
		{
			@$file_name=$_FILES["image"]["name"];
			$file_tmp_name=$_FILES['image']['tmp_name'];
			$target ="poll/";
			$file_name=strtotime(date('d-m-Y h:i:s'));
			$filedata=explode('/', $_FILES["image"]["type"]);
			$filedata[1];
			$random=rand(100, 10000);
			$target=$target.basename($random.$file_name.'.'.$filedata[1]);
			move_uploaded_file($file_tmp_name,$target);
			$item_image=$random.$file_name.'.'.$filedata[1];
		}else{
			if(!empty($polls_id)){
				$sts=mysql_query("select * from `poll` where `id`='$polls_id'");
				$fts=mysql_fetch_array($sts);
				$image_nm=$fts['image'];
				$item_image=$image_nm;
			}else{
				$item_image='';
			}
		}
		
	if(empty($polls_id)){
	mysql_query("insert into `poll` SET `user_id`='$user_id',`question`='$poll',`image`='$item_image'");
	$poll_id=mysql_insert_id();
	
	foreach($poll_options as $poll_option){
		
		mysql_query("insert into `poll_option` SET `poll_id`='$poll_id',`user_id`='$user_id',`poll_option`='$poll_option'");
		
	}
	}else if(!empty($polls_id)){
		mysql_query("update `poll` SET `user_id`='$user_id',`question`='$poll',`image`='$item_image' where `id`='$polls_id'");
		
		mysql_query("delete from `poll_option` where `poll_id`='$polls_id'");
		foreach($poll_options as $poll_option)
		{
			mysql_query("insert into `poll_option` SET `poll_id`='$polls_id',`user_id`='$user_id',`poll_option`='$poll_option'");
		}
		
		
	}
	header("location:create_poll.php");
 	
}
?>
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Master Poll</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			<div class="portlet box">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i>Create Poll
					</div>
					<div class="tools">
						<a class="" href="create_poll.php" style="color:white"><i class="fa fa-plus">&nbsp; New Poll </i>
					</a>
				</div>
				</div>
				<div class="portlet-body form">
                <form  class="form-horizontal" id="form_sample_2" role="form" method="post" enctype="multipart/form-data" > 
					<br/>
					<?php
					$st=mysql_query("select * from `poll` where `id`='$poll_id'");
					$ft=mysql_fetch_array($st);
					
					@$poll_value=$ft['question'];
					@$image=$ft['image'];
					?>
					<div class="form-group">
							<label class="control-label col-md-2">Create Question for Poll</label>
							<div class="col-md-9" >
								<textarea class="form-control input-md" required placeholder="abc def?" type="text" name="poll"><?php if(!empty($poll_id)){echo $poll_value;} ?></textarea>
							</div>
						</div>
					<div class="form-group">
				  <label class="control-label col-md-2">Poll Image</label>
					<div class=" col-md-3 fileinput fileinput-new" style="padding-left: 15px;" data-provides="fileinput">
						<div class="col-md-10 fileinput-new thumbnail" style="width: 200px;  height: 150px;">
							<img <?php if(!empty($image)){ ?>
								src="poll/<?php echo $image; ?>"
							<?php }else{ ?>
							src="img/noimage.png" <?php }?> style="width:100%;" alt=""/>
						</div>
						<div class="col-md-3 fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
						</div>
						<div class="col-md-2">
							<span class="btn default btn-file addbtnfile" style="background-color:#00CCFF; color:#FFF">
							<span class="fileinput-new">
							<i class="fa fa-plus"></i> </span>
							<span class="fileinput-exists">
							<i class="fa fa-plus"></i> </span>
							<input type="file" class="default" name="image" id="file1">
							</span>
							<a href="#" class="btn red fileinput-exists" data-dismiss="fileinput" style=" color:#FFF">
							<i class="fa fa-trash"></i> </a></div>
						</div>
					</div>	
 				<div style="width:100%" align="center">	  
				<table class="table table-bordered table-striped table-hover" style="text-align:center">
					<tr style="text-align:center">
						<td>Option</td>
						<th>&nbsp;</th>
					</tr>
					 <?php 
					 if(!empty($poll_id)){
						 
						 $st1=mysql_query("select * from `poll_option` where `poll_id`='$poll_id'");
						 while($ft1=mysql_fetch_array($st1))
						 { 
							$g++;
							$poll_option_view=$ft1['poll_option'];
						 ?>
						 <tr>
					
					<td align="right">
						<div class="col-md-12">
							<input class="form-control input-md " required placeholder="option" value="<?php echo $poll_option_view; ?>" type="text" name="poll_options[]">
						</div>
					</td>
					<td>
						<button type='button' class='AddNew btn btn-icon-only green'><i class="fa fa-plus"></i></button>
						
						<button type='button' class='RemoveRow btn btn-icon-only red'><i class="fa fa-trash"></i></button>
					</td>
						 
					</tr>

						 
					 <?php } } ?>
					 
					 <?php if(empty($poll_id)){ ?>
					<tr>
					
					<td align="right">
						<div class="col-md-12">
							<input class="form-control input-md " required placeholder=" option " type="text" name="poll_options[]">
						</div>
					</td>
					<td>
						<button type='button' class='AddNew btn btn-icon-only green'><i class="fa fa-plus"></i></button>
						
						<button type='button' class='RemoveRow btn btn-icon-only red'><i class="fa fa-trash"></i></button>
					</td>
						 
					</tr>
					 <?php } ?>
				</table>
			</div>				
				<div class="form-actions top">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<input type="submit" name="submit" class="btn green" value="Submit">
								<button type="button" class="btn default">Cancel</button>
							</div>
						</div>
					</div>	

				</form>
            </div>
        </div>

		<div class="portlet box">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>View Poll
				</div>
				<div class="tools">
					<a class="" href="create_poll.php" style="color:white"><i class="fa fa-plus">&nbsp; New Poll </i>
					</a>
				</div>
			</div>
			<div class="portlet-body form">
			 <div class="table-scrollable" >
					<table class="table table-hover" width="100%" style="font-family:Open Sans;">
					<thead>
						<tr style="background:#F5F5F5">
							<th>S.No.</th>
							<th>Poll Question</th>
							<th>Image</th>
							<th>Created By</th>
							<th>Created On</th>
							<th style="text-align:center">Action</th>
						</tr>
					</thead>
				 <?php
							 
			  		$r1=mysql_query("select * from `poll` where `flag`='0'");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$id=$row1['id'];
					$question=$row1['question'];
					$img_name=$row1['image'];
					$user_id=$row1['user_id'];
					$created_on=date('d-M-Y', strtotime($row1['created_on']));
						$bus=mysql_query("select * from `faculty_login` where `id`='$user_id'");		
						$bus_ftc=mysql_fetch_array($bus);
						$user_name=$bus_ftc['name'];
					 ?>
                    <tbody>
								<tr>
									<td>
										<?php echo $i;?>.
									</td>
									<td class="search" width="60%">
									<?php echo $question; ?>
									</td>
                                    <td><?php 
									if(!empty($img_name)){
										$img_name;
										?>
										<img src="poll/<?php echo $img_name; ?>" height="40px" width="40px">
									<?php }else{
										echo "-";
									}
									?></td>
                                    <td><?php echo $user_name;?></td>
                                    <td><?php echo $created_on;?></td>
									<td>
           
             
                                        
  			<a class="btn blue-madison blue-stripe btn-sm"  rel="tooltip" title="View"  data-toggle="modal" href="#view<?php echo $id ;?>"><i class="fa fa-book"></i></a>
            <div class="modal fade" id="view<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <span class="modal-title" style="font-size:14px; text-align:left">
							Poll Question - <?php echo $question; ?></span>
                        </div>
                        <div class="modal-body" align="left">
                            <?php 
							$d=0;
							$set=mysql_query("select * from `poll_option` where `poll_id`='$id'");
							while($fet=mysql_fetch_array($set))
							{	$d++;
								$poll_option=$fet['poll_option'];
								?>
								<span><?php echo $d.'.  '.$poll_option; ?></span></br>
							<?php } if(!empty($img_name)){ ?>
								<img src="poll/<?php echo $img_name; ?>" height="40px" width="40px">
							<?php } ?>
							
                        </div>
						<div class="modal-footer">
                            <a class="btn blue-madison blue-stripe btn-sm" href="create_poll.php?id=<?php echo $id; ?>"><i class="fa fa-edit"> Edit</i></a>
							 <button type="button" name="sub_delete" value="" class="btn btn-sm red-sunglo" data-dismiss="modal" aria-hidden="true">Close</button> 
                        </div>
                    </div>
                </div>
            </div>
            
 	 
		<a class="btn blue-madison blue-stripe btn-sm"  rel="tooltip" title="View"  data-toggle="modal" href="create_poll.php?id=<?php echo $id; ?>"><i class="fa fa-edit"></i></a>
		<!--a href="create_poll.php?id=<?php //echo $id; ?>">EDIT</a--> 
		 
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
                            <input type="hidden" name="delete_id" value="<?php echo $id; ?>" />
                            <button type="submit" name="sub_delete" value="" class="btn btn-sm red-sunglo ">Yes</button> 
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </td>
        </tr>
        </tbody>
        <?php } ?>
        </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
 
</body>
<?php footer(); ?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
	$('table').on('click', '.AddNew', function(){ 
  	//$('.AddNew').click(function(){  
	   var row = $(this).closest('tr').clone();
	   row.find('input').val('');
	   $(this).closest('tr').after(row);
 	   $('.date-picker').datepicker();
	   $('.timepicker').timepicker();
 	   //$('input[type="button"]', row).find('.AddNew').val('-');.addClass('RemoveRow')
	});

	$('table').on('click', '.RemoveRow', function(){ 
	  $(this).closest('tr').remove();
	});
});	
</script>
<?php scripts();?>

</html>
 

