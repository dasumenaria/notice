<?php
 include("index_layout.php");
 include("database.php");
 
 if(isset($_POST['sub'])){
	
$vehicle_type=$_POST['vehicle_type'];	
$vehicle_no=$_POST['vehicle_no'];	
 
mysql_query("insert into `master_bus` SET `vehicle_type`='$vehicle_type',`vehicle_no`='$vehicle_no'");	

}
?>
 <?php 
 
 if(isset($_POST['sub_del']))
{
  $delet_bus=$_POST['delet_bus'];
  mysql_query("update `master_bus` SET `flag`='1' where id='$delet_bus'" );
     
  }
if(isset($_POST['sub_edit']))
{
$edit=$_REQUEST['edit_id'];  
$vehicle_type=mysql_real_escape_string($_REQUEST["vehicle_type"]);
$vehicle_no=mysql_real_escape_string($_REQUEST["vehicle_no"]);

$r=mysql_query("update `master_bus` SET `vehicle_type`='$vehicle_type',`vehicle_no`='$vehicle_no' where id='$edit'" );
$r=mysql_query($r);
echo '<script text="javascript">alert(Class Added Successfully")</script>';	
 
}
else
{
  
	echo mysql_error();
}  
  



  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Master Bus</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
	<div class="page-content">
    <div class="row">
    <div class="col-md-6">
			<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Master Bus
				</div>
			</div>
			<div class="portlet-body form">
			<!-- BEGIN FORM-->
				<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
					<div class="form-body">
						 
						<div class="form-group">
							<label class="control-label col-md-3">Vehicle Type</label>
							<div class="col-md-6">
								<div class="input-icon right">
								<i class="fa"></i>
								<input class="form-control" placeholder="Please Enter Vehicle Type" required name="vehicle_type" autocomplete="off" type="text">
								</div>
								
							</div>
						</div>
                        <div class="form-group">
							<label class="control-label col-md-3">Vehicle No</label>
							<div class="col-md-6">
								<div class="input-icon right">
								<i class="fa"></i>
								<input class="form-control" placeholder="Please Enter vehicle No" required name="vehicle_no" autocomplete="off" type="text">
								</div>
								
							</div>
						</div>
						<div class="col-md-offset-5 col-md-6" style="">
								<button type="submit" name="sub" class="btn btn-primary">Submit</button>
								<button type="reset" class="btn default">Cancel</button>
						</div>
						 
						</br>
						</br>
					</div>
					

				</form>
			</div>
				 
				   
			</div>
            </div>
            <!-------------------------- View------------>
            <div class="col-md-6">
			<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>View Bus
				</div>
			</div>
			<div class="portlet-body form">
			 <div class="table-scrollable" >
								<table class="table   table-hover" width="100%" style="font-family:Open Sans;">
								<thead>
									
								<tr style="background:#F5F5F5">
									<th>
										 #
									</th>
									<th>
									
                                    vehicle Type
									</th>
									<th>
                                    vehicle No
									</th>
                                    <th>
                                        Action
									</th>
								</tr>
								</thead>
							 <?php
			  $r1=mysql_query("select * from master_bus where flag='0'");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$id=$row1['id'];
					$vehicle_type=$row1['vehicle_type'];
                    $vehicle_no=$row1['vehicle_no'];
					?>
                    <tbody>
								<tr>
									<td>
							<?php echo $i;?>
									</td>
									<td class="search">
									<?php echo $vehicle_type;?>
									</td>
                                    <td>
									<?php echo $vehicle_no;?>
									</td>
									<td>
                                        <a class="btn blue-madison blue-stripe btn-sm" rel="tooltip" title="Edit" data-toggle="modal" href="#edit<?php echo $id;?>"><i class="fa fa-edit"></i></a>
                                        &nbsp;
                                        <!--------editon-->
                                         <div class="modal fade" id="edit<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                           <div class="portlet-body form">
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
							
							
                                <input type="hidden" name='edit_id' class="form-control" value="<?php echo $id;?>" >	
							
								<div class="form-body">
						 
						<div class="form-group">
							<label class="control-label col-md-3">vehicle Type</label>
							<div class="col-md-6">
								<div class="input-icon right">
								<i class="fa"></i>
								<input class="form-control" placeholder="Please Enter Class Name" required name="vehicle_type" autocomplete="off" type="text" value="<?php echo $vehicle_type;?>">
								</div>
								
							</div>
						</div>
                        <div class="form-group">
							<label class="control-label col-md-3">Vehicle No</label>
							<div class="col-md-6">
								<div class="input-icon right">
								<i class="fa"></i>
								<input class="form-control" placeholder="Please Enter Vehicle No" required name="vehicle_no" autocomplete="off" type="text" value="<?php echo $vehicle_no;?>">
								</div>
								
							</div>
						</div>
						 <div class=" right1" align="right" style="margin-right:10px">
									<button type="submit" class="btn green" name="sub_edit">Update</button>
								</div>
							</form>
					</div>
					</div>
                        </div>
                   
                    </div>
                <!-- /.modal-content -->
                </div>
        <!-- /.modal-dialog -->
            </div>
                                        
                                        
                                        
                                        
                                        <!---- update----->
                                       
									      <a class="btn blue-madison red-stripe btn-sm"  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
            <div class="modal fade" id="delete<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete this  vehicle ?</span>
                        </div>
                        <div class="modal-footer">
                        <form method="post" name="delete<?php echo $id ;?>">
                            <input type="hidden" name="delet_bus" value="<?php echo $id; ?>" />
                            
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
				 
				   
			</div>
            </div>
            
            
            
            
            </div>
	</div>

	
	</div>
</body>
<?php footer(); ?>

<?php scripts();?>

</html>
 

