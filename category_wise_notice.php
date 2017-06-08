<?php
include('database.php');
$category_id=$_GET['category_id'];



?>
							<table class="table table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr style="background-color:#EEEEEE; color:#000">
                            <td>
                                    #

								</td>
								<td>
                                    Notice Number
									  
								</td>
								<td>
									 Title	
								</td>
								<td>
									 Date of Publish
								</td>
								<td>
									Category
								</td>
									<td>
									User Name
								</td>
								<td>
									PDF
								</td>
							 </tr>
							</thead>
                             <?php
			  $r1=mysql_query("select * from noticedetail where flag='0' AND category_id='$category_id' order by id Desc ");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
				$noticenumber=$row1['id'];
					$notice_no=$row1['notice_no'];
					$title=$row1['title'];
                    $dateofpublish=$row1['dateofpublish'];
					$category_id=$row1['category_id'];
					$user_id=$row1['user_id'];
					$notice_file=$row1['notice_file'];
                    $r2=mysql_query("select * from category  where category_id='$category_id' ");		
                            $fet=mysql_fetch_array($r2);
                            $category_id=$fet['category_id'];
                            $category=$fet['category'];
							
							 $r3=mysql_query("select * from facultylogin  where id='$user_id' ");		
                            $fet3=mysql_fetch_array($r3);
                            $username=$fet3['username'];
							
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
									 <?php echo $title;?>
								</td>
								<td>
									 <?php echo $dateofpublish;?>
								</td>
								<td>
									<?php echo $category;?>
								</td>
								<td>
									<?php echo $username;?>
								</td>
								<td>
									
<a href="uploads/<?php echo $notice_file; ?>">Download</a>


								</td>
							</tr>
							</tbody>
                    <?php } ?>
							</table>