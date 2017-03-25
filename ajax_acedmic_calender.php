<?php
include('database.php');
$result_val=$_GET['result_val'];
$emm=$_GET['result_val1'];
?>



								<ul class="feeds">
								<div class="col-md-12" align="center"><span >Academic Calendar of &nbsp;<?php  echo $emm;?><span></div>
								<br>
            <?php
			  $r1=mysql_query("select * from acedmic_calendar where flag='0'");		
					while($row1=mysql_fetch_array($r1))
					{
					$e_id=$row1['id'];	
					$category_id=$row1['category_id'];
					$cat=mysql_query("select * from master_category where id='$category_id'");		
					$cat1=mysql_fetch_array($cat);
					$title=$cat1['category_name'];
					
                    $c_date=$row1['date'];
					$c_date1=date('d-m-Y', strtotime($c_date));
					
					 $name=$row1['description'];
					$dtt=str_replace('-', '', $c_date);
					$exact_trimm=$dtt;
					$datetimee = DateTime::createFromFormat('Ymd', $exact_trimm);
					$ems=$datetimee->format('m');
					
					if($result_val==$ems){
				    ?> 
									<li>
										<div class="col1">
											<div class="cont">
											
												<div class="cont-col2">
													<div class="desc">
														 <span style="color:#44B6AE"><?php echo $title;?>&nbsp;-&nbsp;<?php echo $name;?>&nbsp;&nbsp;/&nbsp;<?php echo $c_date1;?></span>
													</div>
												</div>
											</div>
										</div>
									</li>
									
                    <?php }} ?>
                                </ul>
							