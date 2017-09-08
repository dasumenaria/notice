<?php
date_default_timezone_set('asia/kolkata');  
include("index_layout.php");
include("database.php");
$user=$_SESSION['category'];
$user_id=$_SESSION['id'];
$message="";
$eventid=0;
	if(isset($_POST['submit']))
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
			else
			{
				$shareable='0';
			}
		$event_date1=mysql_real_escape_string($_REQUEST["date_from"]);
		$event_date_to1=mysql_real_escape_string($_REQUEST["date_to"]);
		$event_time=mysql_real_escape_string($_REQUEST["time"]);
		$curent_date=date("Y-m-d");
		$event_date=date('Y-m-d',strtotime($event_date1));
		$event_date_to=date('Y-m-d',strtotime($event_date_to1));
		@$file_name=$_FILES["image"]["name"];
		
		$sql="insert into event(title,description,date_from,date_to,time,location,curent_date,lattitude,longitude,shareable,role_id,category_id,user_id)values('$title','$description','$event_date','$event_date_to','$event_time','$location','$curent_date','$lat','$long','$shareable','$role_id','$category_id','$user_id')";
		$r=mysql_query($sql);
		$eventid=mysql_insert_id();
		
		$n_name='event';
		$folderName2=$n_name.$eventid;
		$directoryPath = "event/".$folderName2;
		mkdir($directoryPath, 0777);
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
		}
		else
		{
			$item_image='no_image.png';
		}
		
		$xsql=mysql_query("update `event` SET `image`='$item_image' where id='".$eventid."'" );
		$xsqlr=mysql_query($xsql);
		$x_time=$_REQUEST["x_time"];
		$x_date=$_REQUEST["date"];
		$x_name=$_REQUEST["name"];
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
				$xsql="insert into event_details(time,date,name,event_id)values('$x_t','$dt','$x_n','$eventid')";
				$xr=mysql_query($xsql);
				
				$d = date_parse_from_format("Y-m-d", $dt);
				$ex_d=$d["month"];
				$asql="insert into acedmic_calendar(category_id,description,date,tag,curent_date,user_id)values('$category_id','$x_n','$dt','$ex_d','$curent_date','$user_id')";
				$ar=mysql_query($asql);
			}	
		}
		else
		{
		
			$xsql="insert into event_details(time,date,name,event_id)values('$event_time','$event_date','$title','$eventid')";
			$xr=mysql_query($xsql);
			$d = date_parse_from_format("Y-m-d", $event_date);
			$ex_d=$d["month"];
			$asql="insert into acedmic_calendar(category_id,description,date,tag,curent_date,user_id)values('$category_id','$description','$event_date','$ex_d','$curent_date','$user_id')";
			$ar=mysql_query($asql);	
		}		
		$message = "Event Add Successfully.";
 	}
?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box blue" >
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Event
							</div>
							<div class="tools">
							<a class="" href="gallery.php" style="color: white"><i class="fa fa-plus">&nbsp;Add More Imges</i></a>
							&nbsp;
							<a class="" href="view_event.php" style="color: white"><i class="fa fa-search">View List</i></a>
							&nbsp;
								<!--<a href="" class="collapse" data-original-title="" title="">
								</a>-->
								
							</div>
						</div>
						<div class="portlet-body form">
						
<?php if($message!="") { ?>
<div id="success" class="alert alert-success" style="margin-top:10px; width:50%">
<?php echo $message; ?>
</div>
<?php } ?>

      
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
								
								
								
								<div class="row">
								<div class="col-md-12">
								<div class="form-group">
										<label class="col-md-2 control-label">Select Role</label>
										<div class="col-md-3">
                                        <select name="role_id" class="form-control select select2 select2me input-medium" placeholder="Select..." id="sid">
                                         <option value=""></option>
                                            <?php
                                            $r1=mysql_query("select * from master_role where id=1 OR id=4 OR id=5");		
                                            $i=0;
                                            while($row1=mysql_fetch_array($r1))
                                            {
                                            $id=$row1['id'];
                                            $role_name=$row1['role_name'];
                                            ?>
                              <option value="<?php echo $id;?>"><?php echo $role_name;?></option>                              
                              <?php }?> 
                              </select>
										</div>
								<label class="col-md-2 control-label">Title</label>
										<div class="col-md-3">
											<input class="form-control input-medium" required placeholder="Title" type="text" name="title">
										</div>
									</div>
									</div>
									</div>
									
									
									<div class="row">
									<div class="col-md-12">
									<div class="form-group">
										<label class="col-md-2 control-label">Event Date From</label>
										<div class="col-md-3">
											<input class="form-control form-control-inline input-medium date-picker" required  value="<?php echo date("d-m-Y"); ?>" placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy" name="date_from">
										</div>
										<label class="col-md-2 control-label" align="center">To</label>
										<div class="col-md-3">
											<input class="form-control form-control-inline input-medium date-picker" required  value="<?php echo date("d-m-Y"); ?>" placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy"  name="date_to">
										</div>
										</div>
										</div></div>
										
										<div class="row">
										<div class="col-md-12">
									<div class="form-group">
									<label class="col-md-2 control-label">Location</label>
										<div class="col-md-3">
											<input class="form-control input-medium" required placeholder="Location" type="text" name="location">
										</div>
										<label class="col-md-2 control-label"> Time</label>
										<div class="col-md-3">
											<div class="input-group">
												<input class="form-control timepicker input-medium"  type="text" name="time">
												<!--<span class="input-group-btn">
												<button class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
												</span>-->
										</div>
										</div></div></div></div>
										
										
										
										<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="col-md-2 control-label">Description</label>
										<div class="col-md-3">
										<textarea class="form-control input-medium" rows="1" required placeholder="Discription" type="text" name="description"></textarea>
										</div>
										 <label class="control-label col-md-2">Cover Image</label>
                                            <div class=" col-md-3 fileinput fileinput-new" style="padding-left: 15px;" data-provides="fileinput">
                                                <div class="col-md-10 fileinput-new thumbnail" style="width: 200px;  height: 50px;">
                                                    <img src="img/noimage.png" style="width:100%;" alt=""/>
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
									</div></div></div>
										
										
										<div class="row">
										<div class="col-md-12">
									<div class="form-group">
												<label class="control-label col-md-1"></label>
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
									</div>
									</div>
									
									
		<br><center>						
<table style="width:50%;align:center" class=" " id="parant_table" >
<thead>
                        <tr style="background-color:#F3FEF4;">	
							 <td style="text-align:center">Event Title</td>
							 <td style="text-align:center">Date </td>
							 <td style="text-align:center">Time</td>
					    </tr>
                        </thead>
<tbody>
<tr>
<td>
<input class="form-control input-medium"  placeholder="Name" type="text" name="name[]">
</td>
<td>
<input class="form-control form-control-inline input-medium date-picker"   value="<?php echo date("d-m-Y"); ?>" placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy"  name="date[]">
</td>
<td>
<input class="form-control timepicker timepicker-no-seconds input-medium"  type="text" name="x_time[]">
</td>
<td>
<button type="button" onClick="add_row()" class="btn default blue-stripe btn-xs"><i class="fa fa-plus"></i></button>
</td>
</tr>
</tbody>
</table></center>


											
								<div class=" right1" align="center" style="margin-top:50px">
									<button type="submit" class="btn green" name="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
					
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
<button type="button" onClick="add_row()" class="btn default blue-stripe btn-xs"><i class="fa fa-plus"></i></button>
<button type="button"  class="btn default red-stripe btn-xs remove_row"><i class="fa fa-trash"></i></button>
</td>
</tr>
</tbody> 
</table>
 		

</div></div>
</body>

<?php  footer();?>			
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
<?php if($eventid>0){ ?>
var update_id = <?php echo $eventid; ?>;
		$.ajax({
			url: "notification_page.php?function_name=create_event_notify&id="+update_id,
			type: "POST",
			success: function(data)
			{   
 			}
		});
<?php } ?>
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
			$('.timepicker').timepicker();
			$('.date-picker').datepicker();
     }
</script>


	
<?php scripts();?>

</html>

