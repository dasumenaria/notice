<?php
include('database.php');
$id1=$_GET['id'];
?>
<div class="form-group">
   <div class="portlet box #d6e9c6 " style="width:70%;margin-left:15%;" >
						<div class="portlet-title" >
							<div class="caption">
							<!--	<i class="fa fa-gift"></i>--> Users Rights
							</div>
							
						</div>
						<div class="portlet-body" >
							
								 <div class="table-scrollable">
								 
								  <tr><td colspan="3">
								    <label><input type="checkbox" class="chk_boxes" label="check all"  />&nbsp; &nbsp; Check all</label>
								</td></tr>
								 
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

								<table class="table  table-advance table-hover" >
								
                                <tbody>
                                    <tr>
									<td width="5%;">
                                    <div class="input-group">
                                    <span class="input-group-addon" style=""><input type="checkbox" class="chk_boxes1" name="module_id[]" value="<?php echo $id?>"> </span>
                                    </div>
									</td>
                                    
									<td  width="20%;" style="background-color:;">
										<span><?php echo $name;?></span>
									</td>
                                    <td width="30%;"align="left" style="background-color:;">
										<?php echo $main_menu;?>
									</td>
								</tr>
                                <?php } ?>
                                <tr >
                                <td colspan="3" align="right">
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