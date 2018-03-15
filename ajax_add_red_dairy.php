<?php
include("database.php");
 $class_id=$_GET['class'];
 $sect_id=$_GET['section']; 
if((!empty($class_id)) && (!empty($sect_id))){
?>
 
    <div class="col-md-12">
	<label class="c">Student <span class="required" aria-required="true"> * </span></label>
	<select name="student_id" required class="form-control select2me">
		<option value="">Select</option>
		<?php
		$r3=mysql_query("select * from login where class_id='$class_id' && section_id='$sect_id' && flag='0'");
		$i=0;
		while($row3=mysql_fetch_array($r3))
		{
			$i++;
			$id=$row3['id'];
			$name=$row3['name'];
		?> 
		<option value="<?php echo $id;?>"><?php echo $name;?></option>
	<?php } ?>
	</select>
</div>
 
 <?php }
 
?>
 
	
