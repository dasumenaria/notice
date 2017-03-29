<?php
include("database.php");
$update_id= $_GET['id'];
$function_name= $_GET['function_name'];
if($function_name=='edit_contact')
{
$query=mysql_query("select * from `contact_detail` where `id` = '$update_id'");
$ftc_detail=mysql_fetch_array($query);
?>
              <div class="row col-md-12">  
                <div class="col-sm-6">
                        <label class="control-label">Name of Faculty</label>
                        <input type="text" placeholder="Provide faculty name" name="name" required class="form-control" value="<?php echo $ftc_detail['name']; ?>"/>
                </div>
                <div class="col-sm-6">
                        <label class="control-label">Mobile No</label>
                        <input type="text" placeholder="Provide faculty mobile no" required maxlength="10" minlength="10" value="<?php echo $ftc_detail['mobile_no']; ?>" name="mobile_no" class="form-control"/>
                </div>
            </div>
            <div class="row col-md-12">   
                <div class="col-sm-6">
                    <label class="control-label">Email Id</label>
                    <input type="email" placeholder="Provide faculty Email Address" name="email" value="<?php echo $ftc_detail['email']; ?>" class="form-control"/>
                </div>
                <input type="hidden" name="update_id" value="<?php echo $ftc_detail['id']; ?>">
                <div class="col-sm-6">
                    <label class="control-label">Designation</label>
                    <input type="text" placeholder="Provide faculty designation" name="designation" value="<?php echo $ftc_detail['designation']; ?>" class="form-control"/> 
                </div>
            </div>   
 <?php 
}

if($function_name=='edit_appointment')
{
$query=mysql_query("select * from `appointment` where `id` = '$update_id'");
$ftc_detail=mysql_fetch_array($query);
$appoint_to=$ftc_detail['appoint_to'];

?>
              <div class="row col-md-12">  
                <div class="col-sm-6">
                <label>Appointment To</label>
                <div class="radio-list" style="margin-left: 31px;">
                    <label class="radio-inline">
                    <input type="radio" name="appoint_to" value="2" <?php if($appoint_to=='2' || $appoint_to==''){ ?> checked <?php } ?>> Director </label>
                    <label class="radio-inline">
                    <input type="radio" name="appoint_to" value="3" <?php if($appoint_to=='3'){ ?> checked <?php } ?>> Principle </label>
                </div>
            </div>

                 
                <div class="col-sm-6">
                        <label class="control-label">Appointment Date</label>
                    
                        <input class="form-control form-control-inline input-medium date-picker" required  value="<?php echo date('d-m-Y',strtotime($ftc_detail['appoint_date'])); ?>" placeholder="dd-mm-yyyy" type="text" data-date-format="dd-mm-yyyy" name="appoint_date">
                </div>
            </div>
            <div class="row col-md-12">   
                <div class="col-sm-6">
                    <label class="control-label">Appointment Time</label>
                    <input type="text" placeholder="Provide faculty Email Address" name="appoint_time" value="<?php echo $ftc_detail['appoint_time']; ?>" class="form-control timepicker"/>
                </div>
                <input type="hidden" name="update_id" value="<?php echo $ftc_detail['id']; ?>">
                <div class="col-sm-6">
                    <label class="control-label">Reason</label>
                    <input type="text" placeholder="Provide faculty designation" name="reason" value="<?php echo $ftc_detail['reason']; ?>" class="form-control"/> 
                </div>
            </div>   
 <?php 
}

if($function_name=='edit_leave_note')
{
$query=mysql_query("select * from `leave_note` where `id` = '$update_id'");
$ftc_detail=mysql_fetch_array($query);
 
?>
              <div class="row col-md-12">  
                <div class="col-sm-6">
                <label>Leave Date From</label>
                <input class="form-control form-control-inline input-medium date-picker" required  value="<?php echo date('d-m-Y',strtotime($ftc_detail['date_from'])); ?>" placeholder="dd-mm-yyyy" type="text" data-date-format="dd-mm-yyyy" name="date_from">
            </div>

                <div class="col-sm-6">
                        <label class="control-label">Leave Date to</label>
                        <input class="form-control form-control-inline input-medium date-picker" required  value="<?php echo date('d-m-Y',strtotime($ftc_detail['date_to'])); ?>" placeholder="dd-mm-yyyy" type="text" data-date-format="dd-mm-yyyy" name="date_to">
                </div>
            </div>
            <div class="row col-md-12">   
                <input type="hidden" name="update_id" value="<?php echo $ftc_detail['id']; ?>">
                <div class="col-sm-12">
                    <label class="control-label">Reason</label>
                    <input type="text" placeholder="Provide faculty designation" name="reason" value="<?php echo $ftc_detail['reason']; ?>" class="form-control"/> 
                </div>
            </div>   
 <?php 
} 
if($function_name=='create_user_section_list')
{
	$query=mysql_query("select `section_id` from `class_section` where `class_id` = '$update_id'");
		while($ftc_detail=mysql_fetch_array($query)){
			$section_id=$ftc_detail['section_id'];
			$queryq=mysql_query("select * from `master_section` where `id` = '$section_id'");
			$ftc_detailq=mysql_fetch_array($queryq);
			$section_name=$ftc_detailq['section_name'];
			$id=$ftc_detailq['id'];
			?>
				<option value="<?php echo $id;?>"><?php echo $section_name;?></option>                              
			<?php  
		}	
}
?>
 