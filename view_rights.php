<?php
include('database.php');
$id1=$_GET['id'];
	$selecto7=mysql_query("select * from `user_management` where `role_id`='$id1'");
	while($reco7=mysql_fetch_array($selecto7))
	{
	$mng_mdul_id[]=$reco7['module_id'];
	}

?>
<div class="form-group">
   <div class="portlet box #d6e9c6 " style="width:70%;margin-left:15%;" >
						<div class="portlet-title" >
							<div class="caption">
							<!--	<i class="fa fa-gift"></i>--> Add Rights
							</div>
							
						</div>
						<div class="portlet-body" >
							
								 <div class="table-scrollable">
                                    <table class="table  table-advance table-hover" >
                                    <tr>
                                        <th>Main Menu</th>
                                        <th>Sub Menu</th>
                                        <th>
                                            <input type="checkbox" class="chk_boxes checker" label="check all"  />&nbsp; Check all 
                                        </th>
                                        
                                    </tr>
                                    <?php
                                    $r1=mysql_query("select * from modules order by id Asc  ");		
                                    $i=0;
                                    while($row1=mysql_fetch_array($r1))
                                    {
										$i++;
										$id=$row1['id'];
										$name=$row1['name'];
										$main_menu=$row1['main_menu'];
										?>
                                    <tr>
                                        <td>
                                        	<?php echo $main_menu;?>
                                        </td>
                                        <td>
                                        	<?php echo $name;?>
                                        </td>
                                        <td width="5%;">
                                            <div class="checkbox-list">
                                                <label>
                                                    <input type="checkbox" <?php if(in_array($id,$mng_mdul_id)){ echo 'checked="checked"';}?>  class="chk_boxes1" name="module_id[]"  value="<?php echo $id?>">
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <tr >
                                        <td colspan="3" align="center">
                                        <button type="submit" class="btn green" name="submit">Submit</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                    </table>
                   
							</div>
                            </div>
					</div></div>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
    $('.chk_boxes').click(function() {
        $('.chk_boxes1').prop('checked', this.checked);
    });
});