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

?>
 