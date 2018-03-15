<?php 
include('database.php');
$to=$_GET['to'];
$from=$_GET['from'];
if(!empty($from) && !empty($to))
{
	$from=date('Y-m-d',strtotime($from));
	$to=date('Y-m-d',strtotime($to));
	
	$qry.="`dateofpublish` BETWEEN '".$from."' and '".$to."' && ";	
}
 
$qry.=" `flag`= 0  order by id Desc ";
 
if(isset($_POST['sub_del']))
{
	$delet_notice=$_POST['delet_notice'];
	mysql_query("update `notice` SET `flag`='1' where id='$delet_notice'" );
} 
 
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
								<th>
									Action
								</th>
							 </tr>
							</thead>
                             <?php
							 
			  $r1=mysql_query("select * from notice where ".$qry."");		
					$i=0;
					while($row1=mysql_fetch_array($r1))
					{
					$i++;
					$id=$row1['id'];
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
									 <?php echo date("d-m-Y",strtotime($dateofpublish));?>
								</td>
								<td>
									 <?php echo $title;?>
								</td>
								<td>
									<?php echo $description;?>
								</td>
								
								<td><?php if(!empty($notice_file)){ ?>
<a href="notice/<?php echo $notice_file; ?>" target="_balnk" class="btn blue btn-sm"><i class="fa fa-download"></i></a>
								<?php } ?>
								</td>
								<td> 
	<a class="btn red btn-sm"  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>">
		<i class="fa fa-trash"></i>
	</a>
	<div class="modal fade" id="delete<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete this Notice ?</span>
				</div>
				<div class="modal-footer">
					<form method="post" name="delete<?php echo $id ;?>">
						<input type="hidden" name="delet_notice" value="<?php echo $id; ?>" />

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