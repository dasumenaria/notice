<?php
 include("index_layout.php");
 include("database.php");
 
if(isset($_POST['sub_delete']))
{
	$delete_id= $_POST['delete_id'];
	$r=mysql_query("delete from `achivements` where id='$delete_id'" );
	$sql=mysql_query($r);
	header("location:view_achivements.php");
}
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Achivement</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		<div class="page-content">
<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Achivements
							</div>
							<div class="tools">
								<a class="" href="achivements.php" style="color: white"><i class="fa fa-book"> Add Achivements</i></a>
							</div> 
						</div>
						<div class="portlet-body">
							
		
				<table class="table table-striped table-bordered table-hover" >
					<thead>
						<tr>
						<th>
							S.No.
						</th>
						<th>
							Student Name
						</th>
						<th>
							Achivement
						</th>
						<th>
							Rank
						</th>
                        <th>
							Delete
						</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$query2=mysql_query("select * from `achivements` order by id DESC limit 10"); 
						$i=0;
						while($fetch2=mysql_fetch_array($query2))
						{
							$i++;
							$id=$fetch2['id'];
							$student_id=$fetch2['student_id'];
							$query=mysql_query("select `name` from `login` where id='".$student_id."'"); 
							$fetch=mysql_fetch_array($query);
							$name=$fetch['name'];
							$achivement=$fetch2['achivement'];
							$rank=$fetch2['rank'];
						?>
						<tr class="odd gradeX">
						<td>
						<?php echo $i;?>
						</td>
						<td>
							<?php echo $name?>
						</td>
						<td>
							<?php echo $achivement?>
						</td>
						<td>
							<?php echo $rank?>
						</td>
                        <td>
                                                    
  			<a class="btn blue-madison red-stripe btn-sm"  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
            <div class="modal fade" id="delete<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete ?</span>
                        </div>
                        <div class="modal-footer">
                        <form method="post" name="delete<?php echo $id ;?>">
                            <input type="hidden" name="delete_id" value="<?php echo $id; ?>" />
                            <button type="submit" name="sub_delete" value="" class="btn btn-sm red-sunglo ">Yes</button> 
                        </form>
                        </div>
                    </div>
                </div>
            </div>
                        </td>
						</tr>
							<?php } ?>
					</tbody>
				</table>
				</div>
			</div>
	</div>
</div>
</body>
<?php footer(); ?>
 
<?php scripts();?>

</html>
 

