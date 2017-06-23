<?php 
include('database.php');
 $from = $_GET['from'];
     $from_date=date('Y-m-d',strtotime($from));
     
 $to = $_GET['to'];
     $to_date=date('Y-m-d',strtotime($to));
?>
 <div id="viewdata" class="scroller" style="height: 400px;" data-always-visible="1" data-rail-visible="0">
							<table class="table table-bordered table-hover" id="sample_1">
 
								<thead>
								<tr>
                            <th>
                                    #

								</th>
								<th>
                                    Notice Number
								</th>
								<th>
									 Date
									 </th>
								<th>
									 Title	
								</th>
								<th>
									Description
								</th>
								<th>
									PDF
								</th>
							 </tr>
							</thead>
                             <?php
			  $r1=mysql_query("select * from notice where dateofpublish between '$from_date' and '$to_date' AND flag='0' order by id Desc ");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$noticenumber=$row1['id'];
					$notice_no=$row1['notice_no'];
					$title=$row1['title'];
                    $dateofpublish=$row1['dateofpublish'];
					$description=$row1['description'];
					$notice_file=$row1['file_name'];
                    ?>
							<tbody>
							<tr>
								<td>
                                <?php echo $i;?>
    
								</td>
								<td>
									<?php echo $notice_no;?>
								</td>
								
								<td>
									 <?php echo $dateofpublish;?>
								</td>
								<td>
									 <?php echo $title;?>
								</td>
								<td>
									<?php echo $description;?>
								</td>
								
								<td>
<a href="notice/<?php echo $notice_file; ?>"><i class="btn btn-circle btn-xs fa fa-cloud-download" style="background-color:#C30; color:#FFF"></i></a>
								</td>
							</tr>
							</tbody>
                    <?php } ?>
							</table>
                            </div>