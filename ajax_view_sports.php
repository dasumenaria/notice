<?php
 include("database.php");
$id=$_GET['pon'];
?><div class="row"><?php

				$count=0;
				$query2=mysql_query("select * from `subsports_gallery` where `sports_id`='$id' AND flag='0'"); 
				$counts=mysql_num_rows($query2);
				if($counts>0)
				{
					while($fetch2=mysql_fetch_array($query2))
					{
						$count++;	
						$id=$fetch2['id'];
						$gallery_pic=$fetch2['gallery_pic'];
					
						if($count==1 ){ echo '<div class="col-md-12" style="margin-top:10px">'; }
						?>
						  
						 <div class="col-sm-3" style="">
							<img src="<?php echo $gallery_pic;?>" style="width:180px;height:150px;" />
						 </div> 
				 
						<?php  
						if($count==4){ echo '</div>';  $count=0;}	
					}
				}
				else
				{?>
 					<div class="col-md-12" style="width:100%; text-align:center; color:#F00; font-weight:bold"> No data found</div>
				<?php
				}?>
           </div>
 
			
			
			
			
			
			
 
 