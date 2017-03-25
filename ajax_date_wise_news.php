<?php
include('database.php');
$date_wise_news_id=$_GET['date_wise_news_id'];
?>
<div>	<table class="table-condensed table-bordered" width="100%">
								<thead>
								<tr style="background-color:#FFFFFF; color:#1A0DB3">
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
									
								</tr>
								</thead>
							  <?php
			  $r1=mysql_query("select * from news where flag='0' order by id Desc ");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$id=$row1['id'];
					$news_title=$row1['title'];
                    $news_details=$row1['description'];
					$news_date1=$row1['date'];
                    $news_pic=$row1['featured_image'];
					if($news_date1=='0000-00-00')
					{	$news_date='';}
					else
					{ $news_date=date("d-m-Y", strtotime($news_date1)); }
				
				
				$news_date2=str_replace('-', '', $news_date1);
					$exact_trim=$news_date2;
					$datetime = DateTime::createFromFormat('Ymd', $exact_trim);
					$ems=$datetime->format('m');
					if($ems==$date_wise_news_id){
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
                    <?php } }?>
								</table>
							</div>
									
	
					
		 
						