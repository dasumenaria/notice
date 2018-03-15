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
 <div align="right" style="margin-right:10px;"> 
  <a class="btn red btn-sm" style="color:#FFF; background-color:#C30;"
  rel="tooltip" title="Delete All"  data-toggle="modal" href="#deleteAll"><i class="fa fa-trash"></i> Delete All</a>
<div class="modal fade" id="deleteAll" tabindex="-1" aria-hidden="true" style="padding-top:35px">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete all Images?</span>
			</div>
			<div class="modal-footer">
			<form method="post">
				<input type="hidden" name="event_id" value="<?php echo $en_id; ?>" />
				<input type="hidden" name="category_id" value="<?php echo $cat_id; ?>" />
				<button type="submit" name="deleteall" class="btn btn-sm red-sunglo ">Yes</button> 
			</form>
			</div>
		</div>
	</div>
</div>
</div>
	<div class="scroller" style="height:500px; margin-top:10px"  data-always-visible="1" data-rail-visible="0">
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
$gcount=mysql_num_rows($gallry_sql);
if($gcount > 0){
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
<a class="btn red btn-sm" style="color:#FFF; background-color:#C30"
  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i> Delete</a>
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
                    <?php } 
}
else
{
?>
<tr><td align="center" colspan="10">No Data Found</td></tr>
<?php
}?>
								</table>
							
</div>
</div>
