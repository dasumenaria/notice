<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];

if(isset($_POST['submit']))
{

			  $r1=mysql_query("select * from event where flag='0' order by id Desc LIMIT 1");		
					$row1=mysql_fetch_array($r1);
					$id=$row1['id'];
					$title=$row1['title'];
                    $discription=$row1['discription'];
					$event_date1=$row1['event_date'];
					$event_time=$row1['event_time'];
                    $event_date=date('d-m-Y', strtotime($event_date1));
                    //$event_pic=$row1['event_pic'];
                   $time1=date('Y-m-d G:i:s');
			
			$sql_token_qry = "SELECT * FROM logins";			
			$sql = $this->db->prepare($sql_token_qry);
			$sql->execute();
			$sql_token1=$sql->fetchALL(PDO::FETCH_ASSOC);
			
			foreach($sql_token1 as $sql_token)
			{
			$API_ACCESS_KEY=$sql_token['notification_key'];
			$device_token=$sql_token['device_token'];

	$msg = array
	(
	'message' 	=> 'Event',
	'button_text'	=> 'Awesome',
	'link'	=> 'www.facebook.com',
	'notification_id'	=> $id,
	);

$fields = array
(
	'registration_ids' 	=> array($device_token1),
	'data'			=> array("msg" =>$msg)
);
$headers = array
(
	'Authorization: key=' .$API_ACCESS_KEY,
	'Content-Type: application/json'
);

$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode($fields) );
$result121 = curl_exec($ch );
    curl_close($ch);
}
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
								<i class="fa fa-gift"></i> Event
							</div>
							<!--<div class="tools">
							<a class="" href="view_event.php" style="color: white"><i class="fa fa-search">Event View List</i></a>
							&nbsp;
								<a href="" class="collapse" data-original-title="" title="">
								</a>
								
							</div>-->
						</div>
						<div class="portlet-body form">
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Title</label>
										<div class="col-md-3">
											<input class="form-control input-md" required placeholder="Title" type="text" name="title">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Description</label>
										<div class="col-md-3">
										<textarea class="form-control input-md" required placeholder="Discription" type="text" name="discription"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Event Date</label>
										
										<div class="col-md-3">
											<input class="form-control form-control-inline input-md date-picker" required  value="<?php echo date("d-m-Y"); ?>" placeholder="dd/mm/yyyy" type="text" data-date-format="dd-mm-yyyy" type="text" name="event_date">
											
										</div>
										
										
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Event Time</label>
										<div class="col-md-3">
											<div class="input-group">
												<input class="form-control timepicker timepicker-no-seconds"  type="text" name="event_time">
												<span class="input-group-btn">
												<button class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
												</span>
										</div>
										</div>
									</div>
									
								<div class="form-group">
                              <label class="control-label col-md-3">Event Image</label>
                                            <div class=" col-md-3 fileinput fileinput-new" style="padding-left: 0px;" data-provides="fileinput">
                                                <div class="col-md-10 fileinput-new thumbnail" style="width: 200px;  height: 150px;">
                                                    <img src="img/default.png" style="width:100%;" alt=""/>
                                                </div>
                                                <div class="col-md-3 fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="btn default btn-file addbtnfile" style="background-color:#00CCFF; color:#FFF">
                                                    <span class="fileinput-new">
                                                    <i class="fa fa-plus"></i> </span>
                                                    <span class="fileinput-exists">
                                                    <i class="fa fa-plus"></i> </span>
                                                    <input type="file" class="default" name="event_pic" id="file1">
                                                    </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput" style=" color:#FFF">
                                                    <i class="fa fa-trash"></i> </a></div>
                                                </div>
												</div>
									
									
									
									
									
									
								</div>
								<div class=" right1" align="right" style="margin-right:10px">
									<button type="submit" class="btn green" name="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
			
			
			</div></div>
</body>

<?php footer();?>
<?php scripts();?>

</html>


		
