<?php 
session_start();
include("database.php");
$to=$_GET['to'];
$from=$_GET['from'];
$view_u=$_GET['view_u'];
$qry='';
if(!empty($from) && !empty($to))
{
	$from=date('Y-m-d',strtotime($from));
	$to=date('Y-m-d',strtotime($to));
	
	$qry.="`curent_date` BETWEEN '".$from."' and '".$to."' && ";	
}

if(!empty($view_u))
{  
	if($view_u == 1) 
	{
		$qry.="";
	}
	else 
	{
		$qry.=" (`role_id`='".$view_u."' || `role_id`='1' ) && ";
	}
}
 
$qry.=" `flag`= 0  order by id Desc ";

  ?>
	<div>	
	<table class="table table-bordered table-hover" id="sample_1">
 
								<thead>
								<tr>
									<th> #
									</th>
									<th>
										Title
									</th>
									<th>
										 Description
									</th>
									
                                    <th>
                                        Date
									</th>
									<th>
                                        Image
									</th>
									<th>
                                        Action
									</th>
								</tr>
								</thead>
							  <?php
							   
			  $r1=mysql_query("select * from news where ".$qry."");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$id=$row1['id'];
					$news_title=$row1['title'];
                    $news_details=$row1['description'];
					$news_date=$row1['date'];
                    $news_pic=$row1['featured_image'];
					$n_name='news/news';
					$exact_folderName=$n_name.$id.'/';
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
										 <?php echo $news_date;?>
									</td>
									<td>
									<image src="<?php echo $exact_folderName.$news_pic;?>" style="width:40px;height:40px;">
									</td>
									<td>
                                       <a class="btn blue btn-sm" target="_blank" style="color:#FFF; background-color:#09F" href="news_edit.php?id=<?php echo $id;?>">
										<i class="fa fa-edit"></i></a>
                                        &nbsp;				
                                        &nbsp;
<a class="btn red btn-sm" style="color:#FFF; background-color:#F00"
  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
	<div class="modal fade" id="delete<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete this news?</span>
				</div>
				<div class="modal-footer">
				<form method="post" name="delete<?php echo $id ;?>">
					<input type="hidden" name="delet_model" value="<?php echo $id; ?>" />
					<button type="submit" name="sub_del" value="" class="btn btn-sm red-sunglo ">Yes</button> 
				</form>
				</div>
			</div>
		</div>
	</div>
									   
									   
									   
									</td>
								</tr>
								</tbody>
                    <?php } ?>
								</table>
							</div>
									