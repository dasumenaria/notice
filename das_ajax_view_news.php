<?php 
session_start();
include("database.php");
$view_u=$_GET['view_u'];
  ?>
	<div>	<table class="table table-bordered table-hover" id="sample_1">
 
								<thead>
								<tr style="background-color:#FFFFFF; color:#1A0DB3;background:#f9f9f9;">
									<td>
										 #
									</td>
									<td>
										Title
									</td>
									<td>
										 Description
									</td>
									
                                    <td>
                                        Date
									</td>
									<td>
                                        Action
									</td>
								</tr>
								</thead>
							  <?php
			  $r1=mysql_query("select * from news where flag='0' AND role_id='".$view_u."' order by id Desc ");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$id=$row1['id'];
					$news_title=$row1['title'];
                    $news_details=$row1['description'];
					$news_date=$row1['date'];
                    $news_pic=$row1['featured_image'];
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
							</div>
									