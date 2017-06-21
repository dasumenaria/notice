<?php 
session_start();
include("database.php");
$view_u=$_GET['view_u'];
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
                                        Action
									</th>
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
									<td>
                                       <a class="btn btn-circle btn-xs" style="color:#FFF; background-color:#09F" href="news_edit.php?id=<?php echo $id;?>">
										<i class="fa fa-edit"></i></a>
                                        &nbsp;				
                                        &nbsp;
                                       
									     <a class="btn btn-circle btn-xs" style="color:#FFF; background-color:#F00"
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
                <!-- /.modal-content -->
                </div>
        <!-- /.modal-dialog -->
            </div>
									   
									   
									   
									</td>
								</tr>
								</tbody>
                    <?php } ?>
								</table>
							</div>
									