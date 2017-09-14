<?php
 include("index_layout.php");
 include("database.php");
 
if(isset($_POST['sub_delete']))
{
	$delete_id= $_POST['delete_id'];
	$r=mysql_query("delete from `videos` where id='$delete_id'" );
	$sql=mysql_query($r);
	header("location:view_videos.php");
}
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Videos</title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		<div class="page-content">
<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-book"></i>Videos List
							</div>
							<div class="tools">
								<a class="" href="videos.php" style="color: white"><i class="fa fa-book"> Add Videos</i></a>
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
							Title
						</th>
						<th>
							Description
						</th>
						<th>
							Date
						</th>
                        <th>
							Delete
						</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$query2=mysql_query("select * from `videos` order by id DESC "); 
						$i=0;
						while($fetch2=mysql_fetch_array($query2))
						{
							$i++;
							$id=$fetch2['id'];
							$title=$fetch2['title'];
							$description=$fetch2['description'];
							$curent_date=date('d-m-Y',strtotime($fetch2['curent_date']));
 						?>
						<tr class="odd gradeX">
						<td>
						<?php echo $i;?>
						</td>
						<td>
							<?php echo $title?>
						</td>
						<td>
							<?php echo $description?>
						</td>
						<td>
							<?php echo $curent_date?>
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
 

