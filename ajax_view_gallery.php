<?php 
session_start();
include("database.php");
  $en_id=$_GET['en_id'];
  $cat_id=$_GET['cat_id'];

        if($cat_id==4)
		{
		$n_name='event/event';
		$exact_folderName=$n_name.$en_id;
		}
		else if($cat_id==5)
		{
		$n_name='news/news';
		$exact_folderName=$n_name.$en_id;
		}

   
   
  ?>
	<div class="scroller" style="height:500px;"  data-always-visible="1" data-rail-visible="0">
			<div class="table-responsive">
			
							<table class="table table-bordered table-hover" id="sample_1">
 
								<thead>
								<tr>
									<th>
										 #
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
				$gallry_sql=mysql_query("select * from gallery where category_id='$cat_id' AND event_news_id='$en_id' order by id Desc ");
				$gallry_sql_row=mysql_fetch_array($gallry_sql);
				$gallery_id=$gallry_sql_row['id'];
			    $r1=mysql_query("select * from sub_gallery where gallery_id='$gallery_id' order by id Desc ");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$id=$row1['id'];
					$gallery_pic=$row1['gallery_pic'];
                    $gallery_id=$row1['gallery_id'];
					?>

								<tbody>
								<tr>
									<td>
							<?php echo $i;?>
									</td>
                                    <td>
									<image src="<?php echo $exact_folderName;?>/<?php echo $gallery_pic;?>" style="width:50px;height:50px;">
									</td>
									<td>   
									      <a class="btn btn-circle btn-xs" style="color:#FFF; background-color:#C30"
  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
            <div class="modal fade" id="delete<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete this Image?</span>
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
</div>
