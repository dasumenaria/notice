<?php
include("index_layout.php");
include("database.php");
$user=$_SESSION['category'];
$user_id=$_SESSION['id'];
 $get_id=$_GET['id'];
$message="";
$n_name='event/event';
 $exact_folderName=$n_name.$get_id;
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
else{
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
				}
				else{
				$item_image=$k_image;
				}
$r=mysql_query("update `event` SET `title`='$title',`description`='$description',`date_from`='$event_date',`date_to`='$event_date_to',`time`='$event_time',`location`='$location',`curent_date`='$curent_date',`lattitude`='$lat',`longitude`='$long',`shareable`='$shareable',`role_id`='$role_id',`category_id`='$category_id',`user_id`='$user_id',`image`='$item_image' where id='".$get_id."'" );
$message = "Event Update Successfully.";
//header("Location:event_multiple_upload.php?event_id=".$ids."&title=".$title."");        
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
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Update Event
							</div>
							<div class="tools">
							
							<a class="" href="view_event.php" style="color: white"><i class="fa fa-search">View List</i></a>
							&nbsp;
								<!--<a href="" class="collapse" data-original-title="" title="">
								</a>-->
								
							</div>
						</div>
						<div class="portlet-body form">
						
						
                        </br>
						<?php if($message!="") { ?>
                       <!-- <input id="alert_message" type="text" class="form-control" value="some alert text goes here..." placeholder="enter a text ...">-->
<div class="message" id="success" style="margin-left:290px;color:#89c4f4;font-size:11pt;font-weight:bold;"><?php echo $message; ?></div>
</br>
<?php } ?>

      
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
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
                              <option value="<?php echo $id;?>" <?php if($id==$role_id){ echo "selected";}?>><?php echo $role_name;?></option>                              
                              <?php }?> 
                              <select/>
										</div>
								<label class="col-md-2 control-label">Title</label>
										<div class="col-md-3">
											<input class="form-control input-medium" required placeholder="Title" value="<?php echo $title;?>" type="text" name="title">
										</div>
									</div>
									</div>
									</div>
									
									<div class="row">
									<div class="col-md-12">
									<div class="form-group">
										<label class="col-md-2 control-label">Event Date From</label>
										<div class="col-md-3">
											<input class="form-control form-control-inline input-medium date-picker" required  value="<?php echo $from;?>"  placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy" type="text" name="date_from">
										</div>
										<label class="col-md-2 control-label" align="center">To</label>
										<div class="col-md-3">
											<input class="form-control form-control-inline input-medium date-picker" required value="<?php echo $to;?>"  placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy" type="text" name="date_to">
										</div>
										</div>
										</div></div>
										
										<div class="row">
										<div class="col-md-12">
									<div class="form-group">
									<label class="col-md-2 control-label">Location</label>
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
										<label class="col-md-2 control-label">Description</label>
										<div class="col-md-3">
										<textarea class="form-control input-medium" rows="1" required placeholder="Discription" type="text" name="description"><?php echo $description;?></textarea>
										</div>
										 <label class="control-label col-md-2">Cover Image</label>
                                            <div class=" col-md-3 fileinput fileinput-new" style="padding-left: 15px;" data-provides="fileinput">
                                                <div class="col-md-10 fileinput-new thumbnail" style="width: 200px;  height: 50px;">
                                                    <img src="<?php echo $exact_folderName;?>/<?php echo $image;?>" style="width:100%;" alt=""/>
                                                </div>
                                                <div class="col-md-3 fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="btn default btn-file addbtnfile" style="background-color:#00CCFF; color:#FFF">
                                                    <span class="fileinput-new">
                                                    <i class="fa fa-plus"></i> </span>
                                                    <span class="fileinput-exists">
                                                    <i class="fa fa-plus"></i> </span>
											        <input type="hidden" class="default" name="k_image" value="<?php echo $image;?>" id="">
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
											<input type="checkbox" class="form-control" name="shareable" <?php if($shareable==1){ echo "checked";}?> >
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
									
		

											
								<div class=" right1" align="center" style="margin-top:50px">
									<button type="submit" class="btn blue" name="update_submit">Update</button>
								</div>
							</form>
						</div>
					</div>

			

</div></div>
</body>

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

