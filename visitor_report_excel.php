<?php
	include("database.php");
$filename="inward_report_excel";
    header ("Expires: 0");
    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/vnd.ms-excel");
    header ("Content-Disposition: attachment; filename=".$filename.".xls");
    header ("Content-Description: Generated Report" );
?>

							<!-- BEGIN FORM-->
							
                                <div class="caption" style="text-align:center" colspan="11">
									<i class="fa fa-gift"></i>View Report Today
								</div>
									<table aria-describedby="sample_1_info" border="1" class="table table-striped table-bordered dataTable" id="sample_1">
									<thead>
										<tr>
											<th>S.No</th>
                                            <th>Visitor Name</th>
                                            <th>Contact No</th>
                                             <th>Host Name</th>
											<th>Vehicle No</th>
											<th>In Time</th>
											<th>Out Time</th>
											<th>In Date</th>
											<th>Out Date</th>
											<th>City</th>
                                             <th>Remark</th>
										</tr>
									</thead>
									<tbody>
										<tr>
                                        <?php
										$i=0;
										$reg_all=mysql_query("select * from `visitor_reg`");
										$num_rows =mysql_num_rows($reg_all);
										if($num_rows > 0)
											{
											while($ftc_data=mysql_fetch_array($reg_all))
												{
													$i++;
													$id = $ftc_data['id'];
													$visitor_name = $ftc_data['visitor_name'];
													$contact_no = $ftc_data['contact_no'];	
													$host_name=$ftc_data['host_name'];
													$Vehicle_no=$ftc_data['Vehicle_no'];
													$in_time = $ftc_data['in_time'];
													$out_time = $ftc_data['out_time'];
													$in_date = $ftc_data['in_date'];
														$in_date_frmt=date("d-m-Y",strtotime($in_date));
													$out_date = $ftc_data['out_date'];
														if(empty($out_date)|| $out_date=="0000-00-00")
														{
															$out_date_frmt="";
														}
														else
														{
															$out_date_frmt=date("d-m-Y",strtotime($out_date));
														}
														
													$city = $ftc_data['city'];
													$remark=$ftc_data['remark'];
											?>
									
											<td><?php echo $i ?></td>
											<td><?php echo $visitor_name ?></td>
                                            <td><?php echo $contact_no ?></td>
                                            <td><?php echo $host_name ?></td>
                                            <td><?php echo $Vehicle_no ?></td>
                                            <td><?php echo $in_time ?></td>
                                            <td><?php echo $out_time ?></td>
                                            <td><?php echo $in_date_frmt ?></td>
                                            <td><?php echo $out_date_frmt ?></td>
											<td><?php echo $city ?></td>
											<td><?php echo $remark ?></td></tr>
                                        <?php
                                        }
											}
											else
											{	echo "<p style='color:red'><strong>No Data Found</strong></p>";
											}
											
										?>
									</tbody>
								</table>