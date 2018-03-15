<?php
include("index_layout.php");
include("database.php");
$user=$_SESSION['category'];
$user_id=$_SESSION['id'];
 $get_id=$_GET['id'];
$message="";
$n_name='event/event';
 $exact_folderName=$n_name.$get_id.'/';
if(isset($_POST['update_submit']))
{
	$category_id=4;	
	$title=mysql_real_escape_string($_REQUEST["title"]);
	$description=mysql_real_escape_string($_REQUEST["description"]);
	$location=mysql_real_escape_string($_REQUEST["location"]);
	$role_id=mysql_real_escape_string($_REQUEST["role_id"]);
	$address=$location;
	$formattedAddr = str_replace(' ','+',$address);
	$geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false'); 
	$output = json_decode($geocodeFromAddr);
	$address_lat=$data['latitude']  = $output->results[0]->geometry->location->lat;
	$address_long=$data['longitude'] = $output->results[0]->geometry->location->lng;
	if(!empty($address_lat) && !empty($address_lat) )
	{
		 $lat=$address_lat;
		 $long=$address_long;
	}
	else
	{
		$lat='';
			$long='';
		}
	$s=isset($_POST['shareable']);
	if(!empty($s))
	{
		$shareable=$s;
	}
	else{
		$shareable='0';
	}
	$event_date1=mysql_real_escape_string($_REQUEST["date_from"]);
	$event_date_to1=mysql_real_escape_string($_REQUEST["date_to"]);
	$event_time=mysql_real_escape_string($_REQUEST["time"]);
	$curent_date=date("Y-m-d");
	$event_date=date('Y-m-d',strtotime($event_date1));
	$event_date_to=date('Y-m-d',strtotime($event_date_to1));
	@$file_name=$_FILES["image"]["name"];
	@$k_image=$_REQUEST["k_image"];
	$r=mysql_query("update `event` SET `title`='$title',`description`='$description',`date_from`='$event_date',`date_to`='$event_date_to',`time`='$event_time',`location`='$location',`curent_date`='$curent_date',`lattitude`='$lat',`longitude`='$long',`shareable`='$shareable',`role_id`='$role_id',`category_id`='$category_id',`user_id`='$user_id' where id='".$get_id."'" );
	$n_name='event';
	$folderName2=$n_name.$get_id;
	if(!empty($file_name))
	{
		@$file_name=$_FILES["image"]["name"];
		$file_tmp_name=$_FILES['image']['tmp_name'];
		$target ="event/".$folderName2."/";
		$file_name=strtotime(date('d-m-Y h:i:s'));
		$filedata=explode('/', $_FILES["image"]["type"]);
		$filedata[1];
		$random=rand(100, 10000);
		 $target=$target.basename($random.$file_name.'.'.$filedata[1]);
		 move_uploaded_file($file_tmp_name,$target);
		 $item_image=$random.$file_name.'.'.$filedata[1];
		$r=mysql_query("update `event` SET `image`='$item_image' where id='".$get_id."'" );
	}

$satas=mysql_query("select * from `event_details` where `event_id` =$get_id");
while($ftcs=mysql_fetch_array($satas))
{
	$date=$ftcs['date'];
	$time=$ftcs['time'];
	$name=$ftcs['name']; 
	$id_delete=$ftcs['id']; 
	$d = date_parse_from_format("Y-m-d", $date);
	$tag=$d["month"];
	mysql_query("delete from `acedmic_calendar` where `category_id`='$category_id' && `date`='$date' && `description`='$name' && `tag`='$tag'");
	mysql_query("delete from `event_details` where `id`='$id_delete'");
	
}
		$x_time=$_REQUEST["x_time"];
		$x_date=$_REQUEST["date"];
		$x_name=array_filter($_REQUEST["name"]);
		$k=sizeof($x_name);
		$ff=$x_name[0];
		 
		if($k>0 && !empty($ff))
		{
			$x_t=0;
			$x_d=0;
			$x_n=0;
			for($j=0; $j<$k; $j++)
			{
				$x_t=$x_time[$j];
				$x_d=$x_date[$j];
				$dt=date('Y-m-d',strtotime($x_d));
				$x_n=$x_name[$j];
				$xsql="insert into event_details(time,date,name,event_id)values('$x_t','$dt','$x_n','$get_id')";
				$xr=mysql_query($xsql);
				
				$d = date_parse_from_format("Y-m-d", $dt);
				$ex_d=$d["month"];
				$asql="insert into acedmic_calendar(category_id,description,date,tag,curent_date,user_id)values('$category_id','$x_n','$dt','$ex_d','$curent_date','$user_id')";
				$ar=mysql_query($asql);
			}	
		}
		else
		{
		
			$xsql="insert into event_details(time,date,name,event_id)values('$event_time','$event_date','$title','$get_id')";
			$xr=mysql_query($xsql);
			$d = date_parse_from_format("Y-m-d", $event_date);
			$ex_d=$d["month"];
			$asql="insert into acedmic_calendar(category_id,description,date,tag,curent_date,user_id)values('$category_id','$description','$event_date','$ex_d','$curent_date','$user_id')";
			$ar=mysql_query($asql);	
		}	
	$message = "Event Update Successfully.";
	header("Location:event_edit.php?id=".$get_id."");        
}
?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Event</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Update Event
							</div>
							<div class="tools">
							
							<a class="" href="view_event.php" style="color: white"><i class="fa fa-search">View List</i></a>
							&nbsp;
							</div>
						</div>
						<div class="portlet-body form">
						
						
                        </br>
						<?php if($message!="") { ?>
                        
<div class="message" id="success" style="margin-left:290px;color:#89c4f4;font-size:11pt;font-weight:bold;"><?php echo $message; ?></div>
</br>
<?php } ?>

      
							<form class="form-horizontal" role="form" id="form_sample_2" method="post" enctype="multipart/form-data">
								<div class="form-body">
								
					<?php
					$r1=mysql_query("select * from event where flag='0' and id='".$get_id."'");		
					$row1=mysql_fetch_array($r1);
					$id=$row1['id'];
					$title=$row1['title'];
                    $description=$row1['description'];
					$shareable=$row1['shareable'];
					$date_from=$row1['date_from'];
					$from=date('d-m-Y', strtotime($date_from));
					$date_to=$row1['date_to'];
					$to=date('d-m-Y', strtotime($date_to));
					$location=$row1['location'];
                    $image=$row1['image'];
					$role_id=$row1['role_id'];
					$r2=mysql_query("select * from master_role where id='".$role_id."'");		
					$fet=mysql_fetch_array($r2);
					$role_name=$fet['role_name'];
					
					?>
								<div class="row">
								<div class="col-md-12">
								<div class="form-group">
										<label class="col-md-2 control-label">Select Role <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-3">
                                        <select name="role_id" class="form-control select select2 select2me input-medium" required placeholder="Select..." id="sid">
                                         <option value=""></option>
                                            <?php
                                            $r1=mysql_query("select * from master_role where id=1 OR id=4 OR id=5");		
                                            $i=0;
                                            while($row1=mysql_fetch_array($r1))
                                            {
                                            $id=$row1['id'];
                                            $role_name=$row1['role_name'];
                                            ?>
                              <option value="<?php echo $id;?>" <?php if($id==$role_id){ echo "selected";}?>><?php echo $role_name;?></option>                              
                              <?php }?> 
                              <select/>
										</div>
								<label class="col-md-2 control-label">Title <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-3">
											<input class="form-control input-medium" required placeholder="Title" value="<?php echo $title;?>" type="text" name="title">
										</div>
									</div>
									</div>
									</div>
									
									<div class="row">
									<div class="col-md-12">
									<div class="form-group">
										<label class="col-md-2 control-label"> Date From <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-3">
											<input class="form-control form-control-inline input-medium date-picker" required  value="<?php echo $from;?>"  placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy" type="text" name="date_from">
										</div>
										<label class="col-md-2 control-label" align="center">To <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-3">
											<input class="form-control form-control-inline input-medium date-picker" required value="<?php echo $to;?>"  placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy" type="text" name="date_to">
										</div>
										</div>
										</div></div>
										
										<div class="row">
										<div class="col-md-12">
									<div class="form-group">
									<label class="col-md-2 control-label">Location <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-3">
											<input class="form-control input-medium" required placeholder="Location" type="text" value="<?php echo $location;?>" name="location">
										</div>
										<label class="col-md-2 control-label"> Time</label>
										<div class="col-md-3">
											<div class="input-group">
												<input class="form-control timepicker timepicker-no-seconds input-medium"  type="text" name="time" value="<?php echo $time;?>">
												<!--<span class="input-group-btn">
												<button class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
												</span>-->
										</div>
										</div></div></div></div>
									
										<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="col-md-2 control-label">Description <span class="required" aria-required="true"> * </span></label>
										<div class="col-md-3">
										<textarea class="form-control input-medium" rows="1" required placeholder="Discription" type="text" name="description"><?php echo $description;?></textarea>
										</div>
										<label class="control-label col-md-2">Change Image</label>
                                        <div class="col-md-3"> 
										<input type="file" class="default form-control"  name="image" id="file1">
                                        </div>             
                                                  
									</div>
									</div> 
										
										
								<div class="row">
								<div class="col-md-12">
									<div class="form-group">
												<label class="control-label col-md-1"></label>
											<div class="col-md-1">
											<div class="input-group">
											<input type="checkbox" class="form-control" name="shareable" <?php if($shareable==1){ echo "checked";}?> >
											</div>
											</div>
											<div class="col-md-2">
												<div class="input-group">
												<span align="left">Click Here For Shareable.</span>
												</div>
											</div>
								 
										<label class="control-label col-md-3">Cover Image</label>
											<div class="col-md-3">
												<img src="<?php echo $exact_folderName.$image;?>" height="70px" width="70px"/>
											</div>
									</div>
								</div>
							</div>
			<br><center>						
			<table style="width:50%;align:center" class="table table-bordered table-hover" id="parant_table" >
			<thead>
				<tr style="background-color:#8a8a8a2e;">	
					<td style="text-align:center">Event Schedule</td>
					<td style="text-align:center">Date </td>
					<td style="text-align:center">Time</td>
					<td colspan="2" style="text-align:center">Action</td>
				</tr>
			</thead>
			<tbody>
			<?php
			$sata=mysql_query("select * from `event_details` where `event_id` =$get_id");
			while($ftc=mysql_fetch_array($sata))
			{
				$dates=date('d-m-Y',strtotime($ftc['date']));
				?>
				<tr>
					<td>
					<input class="form-control input-medium"  placeholder="Name" value="<?php echo $ftc['name'];?>" type="text" name="name[]">
					</td>
					<td>
					<input class="form-control form-control-inline input-medium date-picker"    placeholder="" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $dates; ?>"  name="date[]">
					</td>
					<td>
					<input class="form-control timepicker timepicker-no-seconds input-medium" value="<?php echo $ftc['time'];?>"  type="text" name="x_time[]">
					</td>
					<td>
					<button type="button" onClick="add_row()" class="btn blue btn-sm"><i class="fa fa-plus"></i></button>
					</td>
					<td><button type="button"  class="btn red btn-sm remove_row"><i class="fa fa-trash"></i></button></td>
				</tr>
				<?php 
			}
				?>
			</tbody>
			</table>
			</center>
		

											
								<div class=" right1" align="center" style="margin-top:50px">
									<button type="submit" class="btn blue" name="update_submit">Update</button>
								</div>
							</form>
						</div>
					</div>

			

</div></div>
</body>
<table id="sample" style="display:none;">
<tbody>
<tr>
<td>
<input class="form-control input-medium"  placeholder="Name" type="text" name="name[]">
</td>
<td>
<input class="form-control form-control-inline input-medium date-picker"   value="<?php echo date("d-m-Y"); ?>" placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy"   name="date[]">
</td>
<td>
<input class="form-control timepicker timepicker-no-seconds input-medium"  type="text" name="x_time[]">
</td>
<td>
<button type="button" onClick="add_row()" class="btn blue btn-sm"><i class="fa fa-plus"></i></button>
</td>
<td>
<button type="button"  class="btn red btn-sm remove_row"><i class="fa fa-trash"></i></button>
</td>
</tr>
</tbody> 
</table>
<?php footer();?>			
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){    
        $(".remove_row").die().live("click",function(){
            $(this).closest("#parant_table tr").remove();
        });

    
	
        $("#ee_id").live("click",function(){
           $("#e_idtext").show();
		   $("#n_idtext").hide();
        });
	
	   $("#n_id").live("click",function(){
           $("#e_idtext").hide();
		   $("#n_idtext").show();
        });
		
		var myVar=setInterval(function(){myTimerr()},4000);
		function myTimerr() 
		{
		$("#success").hide();
		} 
		
		
		
	});	
</script>
<script>
    function add_row(){  
        var new_line=$("#sample tbody").html();
            $("#parant_table tbody").append(new_line);
			$('#parant_table select').select2();
			$('#parant_table checked').checked();
			$('#parant_table timepicker-no-seconds').timepicker();
			$('#parant_table date-picker').datepicker();
    }
</script>

	
<?php scripts();?>

</html>

