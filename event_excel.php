<?php
session_start();
include("database.php");
$user=$_SESSION['category'];
$id=$_GET['id'];
$filename="Event_excel";
    header ("Expires: 0");
    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/vnd.ms-excel");
    header ("Content-Disposition: attachment; filename=".$filename.".xls");
    header ("Content-Description: Generated Report" );
?>		
<table class="table-condensed" border="1" id="mytbl" width="100%">
								<thead>
									
								<tr style="background-color:#CDCDCD">
									<th>
										 #
									</th>
									<th>
										Event Title
									</th>
									<th>
										 Event Discription
									</th>
									<th>
										 Location
									</th>
									
                                    <th>
                                        Event Date
									</th>
									 <th>
                                        Event Time
									</th>
                                    
								</tr>
								</thead>
							 <?php
			  $r1=mysql_query("select * from event where flag='0' order by id Desc ");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$id=$row1['id'];
					$title=$row1['title'];
                    $discription=$row1['discription'];
					$event_date1=$row1['event_date'];
					$event_time=$row1['event_time'];
					$location=$row1['location'];
                    $event_date=date('d-m-Y', strtotime($event_date1));
                    
                    $event_pic=$row1['event_pic'];

					?>

								<tbody>
								<tr>
									<td>
							<?php echo $i;?>
									</td>
									<td class="search">
									<?php echo $title;?>
									</td>
                                    <td>
									<?php echo $discription;?>
									</td>
									<td>
									<?php echo $location;?>
									</td>
                                   <!-- <td>
									<image src="event/<?php echo $event_pic;?>" style="width:50px;height:50px;">
									</td>--->
									<td>
										 <?php echo $event_date;?>
									</td>
									<td>
										 <?php echo $event_time;?>
									</td>	
									 
								</tr>
								</tbody>
                    <?php } ?>
								</table>