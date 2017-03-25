<?php
session_start();
include("database.php");
$user=$_SESSION['category'];
$session_id=$_SESSION['id'];

 $id=$_GET['id'];
 
$filename="News_excel";
    header ("Expires: 0");
    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/vnd.ms-excel");
    header ("Content-Disposition: attachment; filename=".$filename.".xls");
    header ("Content-Description: Generated Report" );
?>				
<table class="table-condensed " border="1" id="mytbl" width="100%">
								<thead>
								
								<tr style="background-color:#CDCDCD">
									<th>
										 #
									</th>
									<th>
										News Title
									</th>
									<th>
										 News Details
									</th>
									<th>
										 Location
									</th>
									
                                    <th>
                                        News Date
									</th>
									
								</tr>
								</thead>
							 <?php
			  $r1=mysql_query("select * from news where flag='0' order by id Desc ");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$id=$row1['id'];
					$news_title=$row1['news_title'];
                    $news_details=$row1['news_details'];
					$news_date=$row1['news_date'];
                    $news_pic=$row1['news_pic'];
					$news_location=$row1['news_location'];
                    if($news_date=='0000-00-00')
									{	$news_date='';}
									else
									{ $news_date=date("d-m-Y", strtotime($news_date)); }

					?>

								<tbody>
								<tr>
									<td>
							<?php echo $i;?>
									</td>
									<td class="search">
									<?php echo $news_title;?>
									</td>
                                    <td>
									<?php echo $news_details;?>
									</td>
									 <td>
									<?php echo $news_location;?>
									</td>
                                    <!--<td>
									<image src="news/<?php echo $news_pic;?>" style="width:50px;height:50px;">
									</td>-->
									<td>	
										 <?php echo $news_date;?>
									</td>
									
								</tr>
								</tbody>
                    <?php } ?>
								</table>