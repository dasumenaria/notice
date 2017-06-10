<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];
$message="";
$insert_id=0;
if(isset($_POST['submit']))
{
$type=mysql_real_escape_string($_REQUEST["category_id"]);
$event_id=mysql_real_escape_string($_REQUEST["event_id"]);
$news_id=mysql_real_escape_string($_REQUEST["news_id"]);
if($type==4)
{
$r1=mysql_query("select * from gallery where event_news_id='$event_id' AND category_id='$type'");		
$row1=mysql_fetch_array($r1);
$message="Images Added Successfully";
$e_id=$row1['id'];
if(!empty($row1))
{
		$n_name='event';
		$folderName2=$n_name.$e_id;
			$gallery_pic=$_FILES["gallery_pic"]["tmp_name"];
			$o=sizeof($gallery_pic);
			$gp=0;
			for($j=0; $j<$o; $j++)
			{
				$rnd=rand(100, 10000);
				$random=$rnd.$e_id;
				  
				$gp=$gallery_pic[$j];
				$photo1="event".$random.".jpg";
				move_uploaded_file( $gp,"event/".$folderName2."/".$photo1);
				$sql1="insert into sub_gallery(gallery_id,gallery_pic)values('$e_id','$photo1')"; 
				$rl=mysql_query($sql1);
				$insert_id=mysql_insert_id();
			}	
}
else
{
	$sql="insert into gallery(event_news_id,category_id)values('$event_id','$type')";
	$r=mysql_query($sql);
	$ids=mysql_insert_id();
 	$n_name='event';
	$folderName2=$n_name.$event_id;
	
	   $gallery_pic=$_FILES["gallery_pic"]["tmp_name"];
	   $o=sizeof($gallery_pic);
	   $gp=0;
		  for($j=0; $j<$o; $j++){
		   $rnd=rand(100, 10000);
		  	$random=$rnd.$ids;
			$gp=$gallery_pic[$j];
			$photo1="event".$random.".jpg";
			 move_uploaded_file( $gp,"event/".$folderName2."/".$photo1);
			$sql1="insert into sub_gallery(gallery_id,gallery_pic)values('$ids','$photo1')"; 
			$rl=mysql_query($sql1);
			$insert_id=mysql_insert_id();
			}
	}
}
else if($type==5)
{
$r1=mysql_query("select * from gallery where event_news_id='$news_id' AND category_id='$type'");		
$row1=mysql_fetch_array($r1);
$e_id=$row1['id'];

if(!empty($row1))
{
	    $n_name='news';
        $folderName2=$n_name.$e_id;
		$gallery_pic=$_FILES["gallery_pic"]["tmp_name"];
		$o=sizeof($gallery_pic);
		$gp=0;
		for($j=0; $j<$o; $j++){
		$rnd=rand(100, 10000);
		$random=$rnd.$e_id;

	$gp=$gallery_pic[$j];
	$photo1="event".$random.".jpg";
	 move_uploaded_file( $gp,"news/".$folderName2."/".$photo1);
	$sql1="insert into sub_gallery(gallery_id,gallery_pic)values('$e_id','$photo1')"; 
	$rl=mysql_query($sql1);
	$insert_id=mysql_insert_id();
  }	
}
else{
$sql="insert into gallery(event_news_id,category_id)values('$news_id','$type')";
$r=mysql_query($sql);
$ids=mysql_insert_id();


$n_name='news';
$folderName2=$n_name.$news_id;

   $gallery_pic=$_FILES["gallery_pic"]["tmp_name"];
   $o=sizeof($gallery_pic);
   $gp=0;
      for($j=0; $j<$o; $j++){
       $rnd=rand(100, 10000);
      $random=$rnd.$ids;
$gp=$gallery_pic[$j];
$photo1="event".$random.".jpg";
 move_uploaded_file( $gp,"news/".$folderName2."/".$photo1);
$sql1="insert into sub_gallery(gallery_id,gallery_pic)values('$ids','$photo1')"; 
$rl=mysql_query($sql1);
$insert_id=mysql_insert_id();
}
}	
$message="Images Added Successfully";

}
}   
else
    {
        echo mysql_error();
    }
    
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery</title>

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
			
			
			<div class="portlet box">
			
			
			
			
			
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Gallery
							</div>
							<div class="tools">
							<a class="" href="view_gallery.php" style="color: white"><i class="fa fa-search">View Gallery List</i></a>
								<!--<a href="" class="collapse" data-original-title="" title="">
								</a>-->
								
							</div>
						</div>
						<div class="portlet-body form">
                      <?php if($message!="") { ?>
                       <!-- <input id="alert_message" type="text" class="form-control" value="some alert text goes here..." placeholder="enter a text ...">-->
<div class="message" id="success" style="color:#44B6AE; text-align:center"><label class="control-label"><?php echo $message; ?></label></div>
<?php } ?>
                        
                        
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
								<div class="form-group">
										<label class="col-md-3 control-label">Select Category</label>
										<div class="col-md-3">
                                        <select name="category_id" class="form-control select select2 select2me input-medium" placeholder="Select..." id="category_id" required>
                                         <option value=""></option>
                                            <?php
                                            $r1=mysql_query("select * from master_category where id=4 OR id=5");		
                                            $i=0;
                                            while($row1=mysql_fetch_array($r1))
                                            {
                                            $id=$row1['id'];
                                            $category_name=$row1['category_name'];
                                            ?>
                              <option value="<?php echo $id;?>"><?php echo $category_name;?></option>                              
                              <?php }?> 
                              <select/>
										</div></div>
								
								
									<div class="form-group" id="e_idtext" style="display:none">
										<label class="col-md-3 control-label">Event Name</label>
										<div class="col-md-3">
								<select name="event_id" class="form-control select select2 select2me" placeholder=""  >
								<option value=""></option>
								<?php
								$r1=mysql_query("select * from event where flag='0' order by id Desc ");		
								$i=0;
								while($row1=mysql_fetch_array($r1))
								{
								$id=$row1['id'];
								$title=$row1['title'];
								?>
								<option value="<?php echo $id;?>"><?php echo $title;?></option>                              
								<?php }?> 
								<select/>
										</div>
									</div>
									
										<div class="form-group" id="n_idtext" style="display:none">
										<label class="col-md-3 control-label">News Name</label>
										<div class="col-md-3">
								<select name="news_id" class="form-control select select2 select2me" placeholder=""  >
								<option value=""></option>
								<?php
								$r1=mysql_query("select * from news where flag='0' order by id Desc ");		
								$i=0;
								while($row1=mysql_fetch_array($r1))
								{
								$id=$row1['id'];
								$title=$row1['title'];
								?>
								<option value="<?php echo $id;?>"><?php echo $title;?></option>                              
								<?php }?> 
								<select/>
										</div>
									</div>
									
									
									
									
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

<?php if($insert_id>0){ ?>
	var update_id = <?php echo $insert_id; ?>;
 		$.ajax({
			url: "notification_page.php?function_name=create_gallery_notifys&id="+update_id,
			type: "POST",
			success: function(data)
			{    
 			}
	});
<?php } ?>
$(document).ready(function(){    
        $(".remove_row").die().live("click",function(){
            $(this).closest("#parant_table tr").remove();
        });

        $("#category_id").on("change",function(){
			var p=$(this).val();
			if(p==4)
			{
          $("#e_idtext").show();
		  $("#n_idtext").hide();
			}
			else if(p==5){
		   $("#e_idtext").hide();
		   $("#n_idtext").show();
			}
        });
	});	
</script>
		
		
		
		
	});	
</script>
 
<script>
    function add_row(){  
        var new_line=$("#sample tbody").html();
            $("#parant_table tbody").append(new_line);
    }
</script>
<script>
var myVar=setInterval(function(){myTimerr()},4000);
		function myTimerr() 
		{
		$("#success").hide();
		} 
</script>






<?php footer();?>
<?php scripts();?>

</html>


