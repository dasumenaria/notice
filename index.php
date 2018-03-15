<?php 
include("index_layout.php"); 
include("database.php");
error_reporting(0);
@ini_set('display_errors',0);
ini_set('max_execution_time', 200000);

$user=$_SESSION['category'];
$session_id=$_SESSION['id'];
 
$datet=date('Y-m-d');
$dt=str_replace('-', '', $datet);
$exact_trim=$dt;
$datetime = DateTime::createFromFormat('Ymd', $exact_trim);
$emm=$datetime->format('M');
$emj=$datetime->format('m');	
$em=strtoupper($emm);
 ?>
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard</title>
<style>
.col-md-3 {
margin-top:10px
}
</style>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
<style>

.circle-text:after {
    content: "";
    display: block;
   background-color:#000;
    border-radius: 50%;
}


.fs{
	font-size:13px important;
}
</style>
			 <!---------Box-------->
	<div style="background-color:;">
		<div id="ok" style="display:none" class="alert alert-success">
								 
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-6">
					<div class="portlet ">
						<div class="portlet-body">
							<div class="row">
							<div class="col-md-3">
								<div class="dashboard-stat blue">
									<div class="visual">
										<i class="fa fa-search"></i>
									</div>
									<div class="details">
										<div class="number">
										<?php $fet=mysql_query("select `id` from `event` where `flag`='0'");
										echo $count=mysql_num_rows($fet);?>
										</div>
										<div class="desc">
											Events
										</div>
									</div>
									<a class="more" href="view_inquiry.php">
									View more <i class="m-icon-swapright m-icon-white"></i>
									</a>
								</div>
							</div>
							<div class="col-md-3">
								<div class="dashboard-stat red">
									<div class="visual">
										<i class="fa fa-group"></i>
									</div>
									<div class="details">
										<div class="number">
										<?php $fet=mysql_query("select `id` from `notice` where `flag`='0'");
										echo $count=mysql_num_rows($fet);?>
										</div>
										<div class="desc">
										Notice
										</div>
									</div>
									<a class="more" href="view_notice.php">
									View more <i class="m-icon-swapright m-icon-white"></i>
									</a>
								</div>
							</div>
							<div class="col-md-3">
								<div class="dashboard-stat green">
									<div class="visual">
										<i class="fa fa-calendar"></i>
									</div>
									<div class="details">
										<div class="number">
										<?php $fet=mysql_query("select `id` from `inquiry_form` where `status`='0'");
										echo $count=mysql_num_rows($fet);?>
										</div>
										<div class="desc">
										Complaint
										</div>
									</div>
									<a class="more" href="view_inquiry.php">
									View more <i class="m-icon-swapright m-icon-white"></i>
									</a>
								</div>
							</div>	
						
							<div class="col-md-3">
								<div class="dashboard-stat purple-plum">
									<div class="visual">
										<i class="fa fa-shopping-cart"></i>
									</div>
									<div class="details">
										<div class="number">
										<?php $fet=mysql_query("select `id` from `news` where `flag`='0'");
										echo $count=mysql_num_rows($fet);?>
										</div>
										<div class="desc">
											News
										</div>
									</div>
									<a class="more" href="view_news.php">
									View more <i class="m-icon-swapright m-icon-white"></i>
									</a>
								</div>
							</div>
						</div> 
						<div class="row">
						<div class="col-md-3">
                            <div class="dashboard-stat blue">
                                <div class="visual">
                                    <i class="fa fa-bullhorn"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                       <?php $fet=mysql_query("select `id` from `appointment` ");
										echo $count=mysql_num_rows($fet);?>
                                    </div>
                                    <div class="desc">
										Appointment
                                    </div>
                                </div>
                                <a class="more" href="appointment.php?s=0">
                                View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="dashboard-stat red">
                                <div class="visual">
                                    <i class="fa fa-bell"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <?php $fet=mysql_query("select `id` from `leave_note` where `status`='0' ");
										echo $count=mysql_num_rows($fet);?>
                                    </div>
                                    <div class="desc">
									Leave Note
                                    </div>
                                </div>
                                <a class="more" href="leave_note.php?s=0">
                                View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
						</div>
						<div class="col-md-3">
                            <div class="dashboard-stat green">
                                <div class="visual">
                                    <i class="fa fa-bell"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <?php $fet=mysql_query("select `id` from `login` where `flag`='0' ");
										echo $count=mysql_num_rows($fet);?>
                                    </div>
                                    <div class="desc">
									Students
                                    </div>
                                </div>
                                <a class="more" href="view_profile.php?s=0">
                                View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
						<div class="col-md-3">
                            <div class="dashboard-stat purple-plum">
                                <div class="visual">
                                    <i class="fa fa-bell"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <?php $fet=mysql_query("select `id` from `faculty_login` where `flag`='0' ");
										echo $count=mysql_num_rows($fet);?>
                                    </div>
                                    <div class="desc">
									Faculty
                                    </div>
                                </div>
                                <a class="more" href="view_users.php?s=0">
                                View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                      </div>
					</div>
                </div>
				</div>
			</div>
		</div>
 
	<div class="row ">
		<div class="col-md-6 col-sm-6" >
		<div class="portlet box red-pink">
			<div class="portlet-title ">
				<div class="caption">
					<i class="fa fa-bell-o"></i>Event
				</div>
			</div>
			<div class="portlet-body">
			
				<div class="scroller" style="height: 150px;" data-always-visible="1" data-rail-visible="0">
					<ul class="feeds">
				<?php
			    $r1=mysql_query("select * from event where flag='0' order by id Desc ");		
					while($row1=mysql_fetch_array($r1))
					{
						$e_id=$row1['id'];
						$title=$row1['title'];
						$event_date1=$row1['date_from'];
						$event_time=$row1['time'];
						$event_pic=$row1['image'];
						$event_date=date('d-m-Y', strtotime($event_date1));
						$event_folder='event';
						$ev_id=$e_id;
						$exact_folder_name=$event_folder.$ev_id;
						?> 

						<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm">
											
											<input type="hidden" class="" name="event_x_id" value="<?php echo $e_id;?>">
												<image src="event/<?php echo $exact_folder_name;?>/<?php echo $event_pic;?>" height="20px" width="20px">
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 <span style="color:#44B6AE"><?php echo $title;?>&nbsp;&nbsp;/&nbsp;<?php echo $event_date;?>&nbsp;&nbsp;/&nbsp;<?php echo $event_time;?> </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 <button class="btn label label-sm blue-madison event_ajax_class" event_id="<?php echo $e_id;?>" name="" type="button" style="color:#fff">
												Notify <i class="fa fa-share"></i>
										</button>
									</div>
								</div>
							</li>
						</form>
									
                    <?php } ?>
                                </ul>
							</div>
						
							<div class="scroller-footer">
								<div class="pull-right">
									<a href="view_event.php" class="btn btn-xs blue">See All Events <i class="icon-arrow-right"></i></a>
									
								</div>
							</div>
						</div>
					</div>
				</div>    
                <!------------------------------------NEWS---------------------------------------------->
                <div class="col-md-6 col-sm-6">
					<div class="portlet box green-haze">
						<div class="portlet-title ">
							<div class="caption">
								<i class="fa fa-bell-o"></i>News
							</div>
						</div>
						<div class="portlet-body">
							<div class="scroller" style="height: 150px;" data-always-visible="1" data-rail-visible="0">
								<ul class="feeds">
								<?php
								$r1=mysql_query("select * from news where flag='0' order by id Desc ");		
									$i=0;
									while($row1=mysql_fetch_array($r1))
									{
										$i++;
										$n_id=$row1['id'];
										$news_title=$row1['title'];
										$news_pic=$row1['image'];
										$news_details=$row1['description'];
										$news_date1=$row1['date'];
										$news_date=date('d-m-Y', strtotime($news_date1));
										?>
										<form class="form-horizontal" role="form" id="noticeform1" method="post" enctype="multipart/form-data">
											<li>
											<input type="hidden" name="news_x_id" value="<?php echo $n_id;?>">
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm">
																	<img src="news/<?php echo $news_pic;?>" height="20px" width="20px">
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 <span style="color:#44B6AE"><?php echo $news_title;?>&nbsp;&nbsp;/&nbsp;<?php echo $news_date;?></span>
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															<button class="btn label label-sm blue-madison  news_ajax_class" news_id="<?php echo $n_id;?>" name="" type="button" style="color:#fff">
																	Notify <i class="fa fa-share"></i>
																	</button>
														</div>
													</div>
												</li>
												</form>
									<?php } ?>
												</ul>
											</div>
											
											<div class="scroller-footer">
												<div class="pull-right">
													<a href="view_news.php" class="btn btn-xs blue">See All News <i class="icon-arrow-right"></i></a>
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row ">
 								</div>
							</div> 
<div class="row" >
			<div class="col-md-12 col-sm-12" >
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
						<i class="fa fa-calendar"></i>Academic calendar
						</div> 

					</div>
				<div class="portlet-body">
				<div class="row">

					<?php if($emj==01)
					{?>
					<div class="col-md-2"><a href="javascript:;" cal_m="JAN" style="width:65px; background-color:red; color:#FFFFFF" class="btn btn-sm easy-pie-chart-reload cal_ajax_class" result_id="01">JAN</a></div>
					<?php }else { ?>
					<div class="col-md-2"><a href="javascript:;" cal_m="JAN" style="width:65px" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="01">JAN</a></div>
					<?php }?>

					<?php if($emj==02)
					{?>
					<div class="col-md-2"><a href="javascript:;" cal_m="FEB" style="width:65px; background-color:red; color:#FFFFFF" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="02">FEB</a></div>
					<?php }else { ?>
					<div class="col-md-2"><a href="javascript:;" cal_m="FEB" style="width:65px" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="02">FEB</a></div>
					<?php }?>

					<?php if($emj==03)
					{?>
					<div class="col-md-2"><a href="javascript:;" cal_m="MAR" style="width:65px; background-color:red; color:#FFFFFF" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="03">MAR</a></div>
					<?php }else { ?>
					<div class="col-md-2"><a href="javascript:;" style="width:65px" cal_m="MAR" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="03">MAR</a></div>
					<?php }?>

					<?php if($emj==04)
					{?>
					<div class="col-md-2"><a href="javascript:;" cal_m="APR" style="width:65px; background-color:red; color:#FFFFFF" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="04">APR</a></div> 
					<?php }else { ?>
					<div class="col-md-2"><a href="javascript:;" cal_m="APR" style="width:65px" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="04">APR</a></div>
					<?php }?>

					<?php if($emj==05)
					{?>
					<div class="col-md-2"><a href="javascript:;" cal_m="MAY" style="width:65px; background-color:red; color:#FFFFFF" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="05">MAY</a></div>
					<?php }else { ?>
					<div class="col-md-2"><a href="javascript:;" cal_m="MAY" style="width:65px" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="05">MAY</a></div>
					<?php }?>

					<?php if($emj==06)
					{?>
					<div class="col-md-2"><a href="javascript:;" cal_m="JUNE" style="width:65px; background-color:red; color:#FFFFFF" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="06">JUNE</a></div>
					<?php }else { ?>
					<div class="col-md-2"><a href="javascript:;" cal_m="JUNE" style="width:65px" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="06">JUNE</a></div>
					<?php }?>
					</div>
					<br>
					<div class="row" style="">

					<?php if($emj==07)
					{?>
					<div class="col-md-2"><a href="javascript:;" cal_m="JULY" style="width:65px; background-color:red; color:#FFFFFF" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="07">JULY</a></div>
					<?php }else { ?>
					<div class="col-md-2"><a href="javascript:;" cal_m="JULY" style="width:65px" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="07">JULY</a></div>
					<?php }?>

					<?php if($emj==08)
					{?>
					<div class="col-md-2"><a href="javascript:;" cal_m="AU" style="width:65px; background-color:red; color:#FFFFFF" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="08">AU</a></div>
					<?php }else { ?>
					<div class="col-md-2"><a href="javascript:;" cal_m="AU" style="width:65px" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="08">AU</a></div>
					<?php }?>

					<?php if($emj==9)
					{?>
					<div class="col-md-2"><a href="javascript:;" cal_m="SEP" style="width:65px; background-color:red; color:#FFFFFF" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="09">SEP</a></div>
					<?php }else { ?>
					<div class="col-md-2"><a href="javascript:;" cal_m="SEP" style="width:65px" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="09">SEP</a></div>
					<?php }?>

					<?php if($emj==10)
					{?>
					<div class="col-md-2"><a href="javascript:;" cal_m="OCT" style="width:65px; background-color:red; color:#FFFFFF" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="10">OCT</a></div>
					<?php }else { ?>
					<div class="col-md-2"><a href="javascript:;" cal_m="OCT" style="width:65px" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="10">OCT</a></div>
					<?php }?>

					<?php if($emj==11)
					{?>
					<div class="col-md-2"><a href="javascript:;" cal_m="NOV" style="width:65px; background-color:red; color:#FFFFFF" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="11">NOV</a></div>
					<?php }else { ?>
					<div class="col-md-2"><a href="javascript:;" cal_m="NOV" style="width:65px" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="11">NOV</a></div>
					<?php }?>

					<?php if($emj==12)
					{?>
					<div class="col-md-2"><a href="javascript:;" cal_m="DEC" style="width:65px; background-color:red; color:#FFFFFF" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="12">DEC</a></div>
					<?php }
					else { ?>
					<div class="col-md-2"><a href="javascript:;" cal_m="DEC" style="width:65px" class="btn btn-sm btn-default easy-pie-chart-reload cal_ajax_class" result_id="12">DEC</a></div>
					<?php }?>
					</div>
					<br>
					<div class="scroller" style="height: 150px;" data-always-visible="1" data-rail-visible="0">
						<ul class="feeds" id="view_data1">
							<div class="col-md-12" align="center">
								<span >Academic Calendar of &nbsp;<?php  echo $emm;?><span>
							</div>
							<br>
									
                <?php 
			    $r1=mysql_query("select * from acedmic_calendar where flag='0'");		
					while($row1=mysql_fetch_array($r1))
					{
						$e_id=$row1['id'];	
						$category_id=$row1['category_id'];
						$dataftc=mysql_query("select * from `master_category` where `id` = '$category_id'");
						$ftc_category=mysql_fetch_array($dataftc);
						$name=$ftc_category['category_name'];
						$c_date=$row1['date'];
						$c_date1=date('d-m-Y', strtotime($c_date));
						$ems=date('m',strtotime($c_date));
						
						if($emj==$ems)
						{
								?> 
									<li>
										<div class="col1">
											<div class="cont">
											
												<div class="cont-col2">
													<div class="desc">
														 <span style="color:#44B6AE"><?php echo $name;?>&nbsp;&nbsp;/&nbsp;<?php echo $c_date1;?></span>
													</div>
												</div>
											</div>
										</div>
									</li>
												
				<?php   }
					} ?>
						</ul>
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
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>-->
<script>
$(document).ready(function() {
	    $(".event_ajax_class").on('click',function(){
				var update_id=$(this).attr('event_id');
				$.ajax({
			url: "notification_page.php?function_name=create_event_notify&id="+update_id,
			}).done(function(response){
				$('#ok').show();
				alert("Notification Sent Successfully.");
				$("#ok").html("Notification Sent Successfully.");
 			});
});

	$(".news_ajax_class").on('click',function(){
		var update_id=$(this).attr('news_id');
		$.ajax({
			url: "notification_page.php?function_name=create_news_notifys&id="+update_id,
			}).done(function(response){
			$('#ok').show();
			alert("Notification Sent Successfully.");
 			$("#ok").html("Notification Sent Successfully.");				
		});
	});

	$(".result_ajax_class").on('click',function(){
		var result_val=$(this).attr('result1_id');
		$.ajax({
			url: "ajax_result_notification.php?result_val="+result_val,
			}).done(function(response){
				$('#ok').show();
				alert("Notification Sent Successfully.");
				$("#ok").html("Notification Sent Successfully.");			
		});
	});


		$(".cal_ajax_class").click(function(){
		var result_val=$(this).attr('result_id');
		var result_val1=$(this).attr('cal_m');
		$.ajax({
			url: "ajax_acedmic_calender.php?&result_val="+result_val+"&result_val1="+result_val1,
			}).done(function(response) {
				$("#view_data1").html(""+response+"");
			});
		});
 
});
var myVar=setInterval(function(){myTimerr()},4000);
function myTimerr() 
{
	$("#ok").hide();
} 
</script>
<?php scripts();?>


</html>




