<?php
date_default_timezone_set('asia/kolkata');  
include("index_layout.php");
include("database.php");

if(isset($_POST['sub_delete']))
{
	$update_id=$_POST['deleted_id'];
	mysql_query("update `assignment` set `flag` = 1 where `id` = '$update_id'");	
	header("location:view_homework_assign.php");
}

if(isset($_POST['delateall']))
{ 
	$miltiple_delete=$_POST['miltiple_delete'];
	foreach($miltiple_delete as $single)
	{
		mysql_query("update `assignment` set `flag` = 1 where `id` = '$single'");
	}
		
	header("location:view_homework_assign.php");
}
?> 

<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Work Assignment</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
				<div class="portlet box blue" >
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Home Work Assignment
							</div>
							 
						</div>
						<div class="portlet-body form">
						 	
								<div class="form-body">
                                <form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								</br>
								<div class="row">
									 
									
										<div class="col-md-4">
											<div class="form-group"	>
												<label class="col-md-3">Class</label>
												<div class="col-md-3">
													<select name="class_id" id="cls_id" class=" user form-control select2me input-medium search_hw" placeholder="Select Class">
													<option value=""></option>
													<?php
													$cls_ftc=mysql_query("select * from master_class");		
													 while($ftc_cls=mysql_fetch_array($cls_ftc))
													{
													$id=$ftc_cls['id'];
													$class_name=$ftc_cls['class_name'];
													?>
													<option value="<?php echo $id;?>"><?php echo $class_name;?></option>                              
													<?php }?> 
													</select>
												</div>												 
											</div>
										</div>
										<div class="col-md-4">
											 	
											<div class="form-group">
												<label class="col-md-3">Section</label>
												<div class="col-md-3">
													<select name="section_id" id="sec_id" class="form-control select2me input-medium search_hw" placeholder="Select Section" >
													<option value=""></option>
													<?php
													$r3=mysql_query("select * from master_section where flag='0'");
													$i=0;
													while($row3=mysql_fetch_array($r3))
													{
														$i++;
														$id=$row3['id'];
														$section_name=$row3['section_name'];
													?> 
													<option value="<?php echo $id;?>"><?php echo $section_name;?></option>
												<?php } ?>
													 </select>
												</div> 												 
											</div>
										</div>
                                        <div class="col-sm-4"> 
											<div class="form-group">
													<label class=" col-md-3">Student </label>
												<div class="col-md-3">
													<select name="student_id" id='vh' class="form-control select2me input-medium search_hw" placeholder="Select...">
													<option value=""></option>
														<?php
														$r1=mysql_query("select `name`,`id` from login order by id ASC");		
														$i=0;
														while($row1=mysql_fetch_array($r1))
														{
															$id=$row1['id'];
															$name=$row1['name'];
														?>
													<option value="<?php echo $id;?>"><?php echo $name;?></option>                              
													<?php }?> 
													</select>
												</div>
											</div>
										</div>
										</div>
										<br>
							<!----------------->
	<div class="row">
	<div class="col-md-4">
		<div class="form-group"	>
			<label class="col-md-3">Teacher</label>
			<div class="col-md-3">
				<select name="fac_id" id="fac_id" class="form-control select2me input-medium search_hw" placeholder="Select Class">
				<option value=""></option>
				<?php
				$cls_ftcs=mysql_query("select * from `faculty_login`");		
				 while($ftc_clss=mysql_fetch_array($cls_ftcs))
				{
				$fac_id=$ftc_clss['id'];
				$fac_name=$ftc_clss['name'];
				?>
				<option value="<?php echo $fac_id;?>"><?php echo $fac_name;?></option>                              
				<?php }?> 
				</select>
			</div>												 
		</div>
	</div>
	<div class="col-md-4">
		<div id="dt">	
			<div class="form-group">
				<label class="col-md-3">From</label>
				<div class="col-md-3">
					<input class="form-control form-control-inline input-medium date-picker search_hw" required placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy" id="date_from" name="date_from">
				</div>												 
			</div>												 
		</div>
	</div>
	<div class="col-md-4">
		<div id="dt">
			<div class="form-group">
				<label class="col-md-3">To</label>
				<div class="col-md-3">
					<input class="form-control form-control-inline input-medium date-picker search_hw" required placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy" id="date_to" name="date_to">
				</div>												 
			</div>												 
		</div>
	</div>
	</div>
										
                                        </form>
										<center>
										<div  id="vhw">
										</div>
										</center>
									 </div>
							
						</div>
					</div>
					
 
 		

</div></div>
</body>

<?php  footer();?>
 <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
  
<script> 
	$(document).ready(function()
		{
			  
				$(".search_hw").live("change",function()
				{		
					$("#vhw").html("<img height='50px' src='img/loading.gif'/>");
					var vh=$("#vh").val();
					var t=$("#cls_id").val();
					var s=$("#sec_id").val();
					var u=$("#fac_id").val();
					var v=$("#date_from").val();
					var w=$("#date_to").val();
					$.ajax({
						url: "ajax_view_homework.php?pon="+t+"&pon1="+s+"&pon2="+vh+"&pon3="+u+"&pon4="+v+"&pon5="+w,
						}).done(function(response) {
						$("#vhw").html(""+response+"");
						});
				});			

		});

</script> 
 		
 <?php scripts();?>

</html>

