<?php 
session_start();
include("database.php");
$view_u=$_GET['view_u'];
$user_id=$_SESSION['id'];
  ?>
	<div>	<table class="table table-bordered table-hover" id="sample_1">
 
								<thead>
								<tr>
									<th>
										 #
									</th>
								<th>
										 Description
									</th>
									<th>
                                      Calendar Date
									</th>
                                    <th>
                                        Edit
									</th>
									 <th>
                                        Remove
									</th>
								</tr>
								</thead>
							  <?php
			  $r1=mysql_query("select * from acedmic_calendar where flag=0 AND category_id=$view_u");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$id=$row1['id'];
                    $name=$row1['description'];
					 $category_id=$row1['category_id'];
					$date=$row1['date'];
					if($date=='0000-00-00')
					{	$date='';}
					else
					{ $date=date("d-m-Y", strtotime($date)); }
					?>
								<tr>
									<td>
							<?php echo $i;?>
									</td>
									
                                    <td class="search">
									<?php echo $name;?>
									</td>
                                    <td>
										 <?php echo $date;?>
									</td>
									<td>
                                                <a class="btn btn-circle btn-xs" style="color:#FFF; background-color:#FFB848" rel="tooltip" title="Edit" data-toggle="modal" href="#edit<?php echo $id;?>"><i class="fa fa-edit"></i></a>
							
				<div class="modal fade" id="edit<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                           <div class="portlet-body form">
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
								 <input type="hidden" name='edit_id' class="form-control" value="<?php echo $id;?>" >
									<div class="form-group">
											<label class="col-md-3 control-label">Select Category</label>
										<div class="col-md-3">
                                        <select name="category_id" class="form-control select select2 select2me input-medium" placeholder="Select..." id="category_id">
                                         <option value=""></option>
                                            <?php
                                            $cr1=mysql_query("select * from master_category");		
                                            while($crow1=mysql_fetch_array($cr1))
                                            {
                                            $cid=$crow1['id'];
                                            $category_name=$crow1['category_name'];
                                            ?>
                              <option value="<?php echo $cid;?>"  <?php if($cid==$category_id){ echo 'selected';}?> ><?php echo $category_name;?></option>                              
                              <?php }?> 
                              </select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Description</label>
										<div class="col-md-3">
										<textarea class="form-control input-medium" required placeholder="Name" type="text" name="name"><?php echo $name;?></textarea>
                                    </div>
									</div>
                                    <div class="form-group">
										<label class="col-md-3 control-label">Calendar Date</label>
										<div class="col-md-3">
										<input class="form-control form-control-inline input-medium date-picker" required id="field_5" value="<?php echo $date; ?>" placeholder="dd/mm/yyyy" data-date-format="dd-mm-yyyy" type="text" name="date">

										</div>
									</div>
                                <div class=" right1" align="right" style="margin-right:10px">
									<button type="submit" class="btn green" name="sub_edit">Update</button>
								</div>
								</div>
							</form>
                    	</div>
					</div>
                        </div>
                   
                    </div>
                <!-- /.modal-content -->
                </div>
        </td>
												
												
                  
                                     <td>
									      <a class="btn btn-circle btn-xs" style="color:#FFF; background-color:#C00"
  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
            <div class="modal fade" id="delete<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete this record?</span>
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
								
                    <?php } ?>
					</tbody>
								</table>
							</div>
									