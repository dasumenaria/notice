<?php
 include("database.php");
$id=$_GET['pon'];
?>

						
 
<div class="portlet-body">
	<?php
				$count=0;
				$query2=mysql_query("select * from `subsports_gallery` where `sports_id`='$id' AND flag='0'"); 
				while($fetch2=mysql_fetch_array($query2))
				{
					$count++;	
					$id=$fetch2['id'];
					$gallery_pic=$fetch2['gallery_pic'];
				
				if($count==1 ){ echo '<div class="row">'; }
				?>
				 
					<div class="col-sm-3" style="">
                    <image src="sports/<?php echo $gallery_pic;?>" style="width:200px;height:200px;">
                 </div> 
         
         <?php  
		 if($count==4){ echo '</div></br></br>';  $count=0;}	
		 } ?>
</div>
			
			
			
			
			
			
 
 