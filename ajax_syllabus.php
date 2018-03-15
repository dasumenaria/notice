<?php
 
include("database.php");
$class_id=$_GET['pon'];
  
 
  	if((!empty($class_id))) { ?>
 
			<div class="form-group">
				<label class="control-label col-md-3">Section</label>
				<div class="col-md-4">
					<select class="form-control" placeholder="Select..." name="section_id">
						<option value=""> Select...</option>
						<?php
 
							$r1=mysql_query("select * from class_section where class_id='".$class_id."'");	
							$i=0;
							while($row1=mysql_fetch_array($r1))
							{ 
								$section_id=$row1['section_id'];
									$sec_name=mysql_query("select * from master_section where id='".$section_id."'");
									$fetch_name=mysql_fetch_array($sec_name);
									$id=$fetch_name['id'];
									$section_name=$fetch_name['section_name'];
						?>
						<option value="<?php echo $id;?>"><?php echo $section_name;?></option>
						<?php } ?>
					</select>
				</div>
			</div>	
 
 	<?php }  ?>
 

 
	
	
