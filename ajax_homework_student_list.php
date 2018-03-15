<?php 
include("database.php");
 $class_id=$_GET['class_id'];
 $section_id=$_GET['section_id'];

 ?>

<?php if(!empty($class_id) && !empty($section_id)  )
{	
?>
	<select name="student_id[]" class="form-control select2me input-medium student_data" multiple='multiple' placeholder="Select..." id="student_data" >
		<option value=""></option>
			<?php
				$r1=mysql_query("select `name`,`id` from login where `flag`=0 and class_id = '$class_id' and section_id = '$section_id' order by id ASC");		
				$i=0;
				while($row1=mysql_fetch_array($r1))
				{
					$id=$row1['id'];
					$name=$row1['name'];
				?>
					<option value="<?php echo $id;?>">
						<?php echo $name;?>
					</option>                              
		<?php }?> 
	</select>
<?php }  else if(!empty($class_id))
{	
?>
	<select name="student_id[]" class="form-control select2me input-medium student_data" multiple='multiple' placeholder="Select..." id="student_data" >
		<option value=""></option>
			<?php
				$r1=mysql_query("select `name`,`id` from login where `flag`=0 and class_id = '$class_id' order by id ASC");		
				$i=0;
				while($row1=mysql_fetch_array($r1))
				{
					$id=$row1['id'];
					$name=$row1['name'];
				?>
					<option value="<?php echo $id;?>">
						<?php echo $name;?>
					</option>                              
		<?php }?> 
	</select>
<?php } ?>	