 <?php
 include("index_layout.php");
 include("database.php");
  
if(isset($_POST['submit']))
{
	$sports_id=mysql_real_escape_string($_REQUEST["sports_id"]);
	$query=mysql_query("select `sports_name` from `master_sports` where id='".$sports_id."'"); 
	$fetch=mysql_fetch_array($query);
	$sports_name=$fetch['sports_name'];
	
	$target='sports/'.$sports_name;
	$exist = is_dir($target);
	if(!$exist)
	{
		mkdir($target, 777);
 	}
	
	
	$gallery_pic=$_FILES["gallery_pic"]["tmp_name"];
	$o=sizeof($gallery_pic);
	$gp=0;
	
	for($j=0; $j<$o; $j++)
	{
		
 		$tmp_name=$gallery_pic[$j];
		$file_name=$_FILES["gallery_pic"]["name"][$j];
		$ext = pathinfo($file_name, PATHINFO_EXTENSION);
		$Filename=rand();
 		$photo1=$Filename.".".$ext;
		$curent_date=date('Y-m-d');	   
		$insert_name=$target.'/'.$photo1;
		@move_uploaded_file($tmp_name, $target.'/'.$photo1);
		$sql1="insert into subsports_gallery(sports_id,gallery_pic,curent_date)values('$sports_id','$insert_name','$curent_date')"; 
		$rl=mysql_query($sql1);
		 
 	}
	 
	ob_start();
	echo "<meta http-equiv='refresh' content='0;url=sports.php'>";
	ob_flush();
}
   
 ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sports</title>

<style>
.form-horizontal .radio > span{
	margin-top:-3px !important;
}
</style>

</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box blue">
			
			
			
			
			
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> sports
							</div>
							<div class="tools">
							<a class="" href="view_sports.php" style="color: white"><i class="fa fa-search">View sports Gallery</i></a>
								<!--<a href="" class="collapse" data-original-title="" title="">
								</a>-->
								
							</div>
						</div>
						<div class="portlet-body form">
                     
                        
                        
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
								<div class="form-group">
										<label class="col-md-3 control-label">Select sports</label>
										<div class="col-md-3">
                                        <select name="sports_id" class="form-control select select2 select2me input-medium" placeholder="Select..." id="category_id" required>
                                         <option value=""></option>
                                            <?php
                                            $r1=mysql_query("select * from master_sports where flag='0'");		
                                            $i=0;
                                            while($row1=mysql_fetch_array($r1))
                                            {
                                            $id=$row1['id'];
                                            $sports_name=$row1['sports_name'];
                                            ?>
                              <option value="<?php echo $id;?>"><?php echo $sports_name;?></option>                              
                              <?php }?> 
                              <select/>
										</div></div>
								 
						<div class="form-group">
						<label class="col-md-3 control-label">Add Images</label>
						<div class="col-md-7">
                           <table style="width:50%;" class=" " id="parant_table">
                        <tbody>
                        <tr>
                            <td>
                                            <div class=" col-md-12 fileinput fileinput-new" style="padding-left: 0px;" data-provides="fileinput">
                                                <div class="col-md-10 fileinput-new thumbnail" style="width: 200px;  height: 100px;">
                                                    <img src="img/noimage.png" style="width:100%;" alt=""/>
                                                </div>
                                                <div class="col-md-10 fileinput-preview fileinput-exists thumbnail" style="max-width: 1000px; max-height: 100px;">
                                                </div>
                                                <div>
                                                <div class="col-md-2">
                                                    <span class="btn default btn-file addbtnfile" style="background-color:#00CCFF; color:#FFF">
                                                    <span class="fileinput-new">
                                                    <i class="fa fa-plus"></i> </span>
                                                    <span class="fileinput-exists">
                                                    <i class="fa fa-plus"></i> </span>
                                                    <input type="file" class="default" name="gallery_pic[]" id="file1" required>
                                                    </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput" style=" color:#FFF">
                                                    <i class="fa fa-trash"></i> </a></div>
                                                </div>
                                            </div>
                            </td>
                            <td>
                            <button type="button" onclick="add_row()" class="btn default blue-stripe btn-xs"><i class="fa fa-plus"></i></button>
                            </td>
                        </tr>
                        </tbody>
          </table>
           
												</div></div>
									
								</div>
								<div class=" right1" align="right" style="margin-right:10px">
									<button type="submit" class="btn green" name="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
			
			
			</div>
			
			
			<label class="col-md-3 control-label"></label>
										<div class="col-md-7">
			<table id="sample" style="display:none;">
        <tbody>    
               <tr>
                                <td>
                                            <div class=" col-md-12 fileinput fileinput-new" style="padding-left: 0px;" data-provides="fileinput">
                                                <div class="col-md-10 fileinput-new thumbnail" style="width: 200px;  height: 100px;">
                                                    <img src="img/noimage.png" style="width:100%;" alt=""/>
                                                </div>
                                                <div class="col-md-10 fileinput-preview fileinput-exists thumbnail" style="max-width: 1000px; max-height: 100px;">
                                                </div>
                                                <div>
                                                <div class="col-md-2">
                                                    <span class="btn default btn-file addbtnfile" style="background-color:#00CCFF; color:#FFF">
                                                    <span class="fileinput-new">
                                                    <i class="fa fa-plus"></i> </span>
                                                    <span class="fileinput-exists">
                                                    <i class="fa fa-plus"></i> </span>
                                                    <input type="file" class="default" name="gallery_pic[]" id="file1">
                                                    </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput" style=" color:#FFF">
                                                    <i class="fa fa-trash"></i> </a></div>
                                                </div>
                                            </div>
                            </td>
                            
                             <td>
                             <button type="button" onClick="add_row()" class="btn default blue-stripe btn-xs"><i class="fa fa-plus"></i></button>
                            <button type="button"  class="btn default red-stripe btn-xs remove_row"><i class="fa fa-trash"></i></button>
                             </td>
       </tr>
       </tbody> 
    </table>
	</div>
                                             
			
			</div>
</body>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
 
$(document).ready(function(){    
        $(".remove_row").live("click",function(){ 
            $(this).closest("#parant_table tr").remove();
        });
});	
</script>
<script>
	function add_row()
	{  
		var new_line=$("#sample tbody").html();
		$("#parant_table tbody").append(new_line);
	}
 
	var myVar=setInterval(function(){myTimerr()},4000);
	function myTimerr() 
	{
		$("#success").hide();
	} 
</script>

<?php footer();?>
<?php scripts();?>

