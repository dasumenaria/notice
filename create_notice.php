<?php
 include("index_layout.php");
 include("database.php");
 require_once 'dompdf/autoload.inc.php';
	use Dompdf\Dompdf;
 $user=$_SESSION['category'];
 $session_id=$_SESSION['id'];
?>
<?php
$message="";
$category_id=6;

if(isset($_POST['submit'])){
$noticenum=$_POST['noticenum'];
$title=$_POST['title'];
$description=$_POST['description'];
$dateofpublish1=$_POST['dateofpublish'];
$dateofpublish=date('Y-m-d',strtotime($dateofpublish1));
$curent_time=date("h:i A");


$s=isset($_POST['shareable']);
if(!empty($s))
{
	$shareable=$s;
}
else{
$shareable='0';
}


@$class_id=$_POST['class_id'];
@$bw=$_POST['bw'];
    if( isset( $_POST['bw'] ) ) {
         $bw = 'YES';
    }
    else {
         $bw = 'NO';
    }
    $bwfoo = isset( $_POST['bw'] ) ? $_POST['bw'] : 'no';
	if($bwfoo=='no')
	{
		$class='';
	}
	else{ 
	$class=implode(',',$class_id);
	}
	
	
	
@$medium_id=$_POST['medium_id'];
@$mw=$_POST['mw'];
    if( isset( $_POST['mw'] ) ) {
         $mw = 'YES';
    }
    else {
         $mw = 'NO';
    }
    $bwfoo = isset( $_POST['mw'] ) ? $_POST['mw'] : 'no';
	if($bwfoo=='no')
	{
		$medium='';
	}
	else{ 
	$medium=implode(',',$medium_id);
	}
	

$noticedetail=$_POST['editor1']; 
$na='notice';
$noticename=$noticenum;
$nc='.pdf';
$x_notice_name=$na.$noticename.$nc;
$approval=0;
	// instantiate and use the dompdf class
	$dompdf = new dompdf();
	$dompdf->loadHtml($noticedetail);
	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4', 'potrait');
	// Render the HTML as PDF
	$dompdf->render();
	// Output the generated PDF to Browser
	//$dompdf->stream("sample");
	$output = $dompdf->output();
    file_put_contents('notice/notice'.$noticenum.'.pdf', $output); //dynamically change the file name
	
$sql="INSERT INTO `notice`(`role_id`,`notice_no`, `title`, `description`, `time`, `dateofpublish`, `class_id`, `medium_id`,`user_id`,`noticedetails`,`file_name`,`shareable`,`category_id`) VALUES ('".$user."','".$noticenum."','".$title."','".$description."','".$curent_time."','".$dateofpublish."','".$class."', '".$medium."', ".$session_id.",'".$noticedetail."','".$x_notice_name."','".$shareable."','".$category_id."')";
$res=mysql_query($sql) or die(mysql_error());
$e_id=mysql_insert_id();

	$file_upload='noimage.png';
	$photo1="notice".$e_id.".jpg";
	
	if(move_uploaded_file($_FILES["image"]["tmp_name"],"notice/notice_image/".$photo1))
	{
	$r=mysql_query("update notice set image='$photo1' where id='$e_id'");
	}
	else{
	$r=mysql_query("update notice set image='$file_upload' where id='$e_id'");
	}
	
	echo "<meta http-equiv='refresh' content='0;url=create_notice_re.php'/>";
}
else{
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
		 <?php if($message!="") { ?>
<div class="message"><?php echo $message; ?></div>
<?php } ?>
						<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Notice
							</div>
							<div class="tools">
							<a class="" href="view_notice.php" style="color: white"><i class="fa fa-search">View Notice List</i></a>
							
							</div>
						</div>
						<div class="portlet-body form">
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
									
									
									<div class="form-group">
						   <label class="control-label col-md-3">Notice Number</label>
						   
										 <?php if($_GET['categoryselect']==2 || $_GET['categoryselect']==3) {
               $last_id=mysql_query("select count(id) as id from `notice`") ;
						$r=mysql_fetch_array($last_id);
						$ticket_num=$r['id'];
                           ?>
						   <input type="hidden" value="<?php echo $ticket_num+1;?>" name="noticenum">
						   <div class="col-md-3"">
						   <input class="form-control input-md" type="text" value="<?php echo 'MDS/2016-2017/A/';?><?php echo $ticket_num+1;?>" readonly/></b>
						   </div>
                           <?php } ?>
						   </div>
									<div class="form-group">
										<label class="col-md-3 control-label">Title</label>
										<div class="col-md-3">
										<input class="form-control input-medium" required placeholder="Title" type="text" name="title">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Description</label>
										<div class="col-md-3">
										<input class="form-control input-medium" required placeholder="Description" type="text" name="description">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Date of Publish</label>
										
										<div class="col-md-3">
											<input class="form-control form-control-inline input-md date-picker" required  value="<?php echo date("d-m-Y"); ?>" placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy" type="text" name="dateofpublish">
											
										</div>
									</div>
									
									<div class="form-group">
												<label class="control-label col-md-2"></label>
											<div class="col-md-1">
											<div class="input-group">
											<input type="checkbox" class="form-control" name="shareable" value="yes">
											</div>
											</div>
											<div class="col-md-3">
											<div class="input-group">
											<span align="left">Click Here For Shareable.</span>
											</div>
											</div>
									</div>
									
									
									<div class="form-group">
										<label class="col-md-3 control-label">Notice Image</label>
										<div class="col-md-3">
											
											
											 <div class=" col-md-12 fileinput fileinput-new" style="padding-left: 0px;" data-provides="fileinput">
                                                <div class="col-md-10 fileinput-new thumbnail" style="width: 200px;  height: 100px;">
                                                    <img src="img/noimage.png" style="width:100%;" alt=""/>
                                                </div>
                                                <div class="col-md-10 fileinput-preview fileinput-exists thumbnail" style="max-width: 1000px; max-height: 100px;">
                                                </div>
                                                <div>
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
											
											
										</div>
									</div>
									
								<div class="form-group">
                              <label class="control-label col-md-3">Send To:</label>
                                            
											<div class="form-group">
											<div class="col-md-3">
									<label class="checkbox line">
			  <input type="checkbox" value="" id="bw" name="bw" value="NO" onChange="myfunction()"/> Class Wise
			  </label>
			<div class="control-group" id="branchselect" style="display:none;">
				<div class="controls">
				<?php 
				$sql="select distinct(class_name),id from master_class";
				$res=mysql_query($sql) or die(mysql_error());
				$count=0;
				while($result=mysql_fetch_array($res)) { $count++; 				
				
				 if($count==7){ $count=1;?><?php } 
                       	?>
				<td class="checkbox">
				<label><input type="checkbox" value="<?php echo $result['id']; ?>" id="<?php echo $result['class_name']; ?>" name="class_id[]" /><?php echo $result['class_name']; ?></label>
				</td>
				<?php
				}
				?>
				</div>
			</div></br>
						
									<label class="checkbox line">
			  <input type="checkbox" value="" id="mw" name="mw" value="NO" onChange="myfunction()"/> Medium Wise
			  </label>
			<div class="control-group" id="mediumselect" style="display:none;">
				<div class="controls">
				<?php 
				$sql="select distinct(medium_name),id from master_medium";
				$res=mysql_query($sql) or die(mysql_error());
				$count=0;
				while($result=mysql_fetch_array($res)) { $count++; 				
				if($count==7){ $count=1;?><?php } 
                       	?>
				<td class="checkbox">
				<label><input type="checkbox" value="<?php echo $result['id']; ?>" id="<?php echo $result['medium_name']; ?>" name="medium_id[]" /><?php echo $result['medium_name']; ?></label>
				</td>
				<?php
				}
				?>
				</div>
			</div></br>
			
			
			</div></div></div>
			
									
			
								
						<div class="control-group">
						<textarea rows="20" type="text" name="editor1" id="editor1">
						<center><img src="img/logo.png" width="250px" height="100px"></img></center>
						</textarea>
						</div>
						</br>

					
								<div class=" right1" align="right" style="margin-right:10px">
									<button type="submit" class="btn green" name="submit">Submit</button>
								</div>
								</div>
							</form>
						</div>
					</div>
			</div></div>
</body>
<?php footer();?>

<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
<script>
$(document).ready(function(){    
	 $("#bw").live("click",function(){
			if($(this).prop("checked") == true){
			$("#branchselect").show();
			}
			else if($(this).prop("checked") == false){
				$("#branchselect").hide();
			}
        });
		  $("#mw").live("click",function(){
		   if($(this).prop("checked") == true){
			 $("#mediumselect").show();
			}
			else if($(this).prop("checked") == false){
				$("#mediumselect").hide();
			}
		   });
	});	
</script>
<?php scripts();?>
</html>

