<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];
   if(isset($_POST['sub_del']))
{
  $delet_model=$_POST['delet_model'];
   $r=mysql_query("delete from `sub_gallery` where id='$delet_model'" );
    $sql=mysql_query($r);
  }
?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<?php contant_start(); menu();  ?>
<body>
	<div class="page-content-wrapper">
		 <div class="page-content">
			
			
			<div class="portlet box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> View Gallery
							</div>
						<div class="tools">
						<a class="" href="gallery.php" style="color: white"><i class="fa fa-plus">Add Images into gallery </i></a>
						<!--		<a href="" class="collapse" data-original-title="" title="">
								</a>-->
								
							</div>
                            
						</div>
						<div class="portlet-body form">
							<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
								
								<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="col-md-2 control-label">Select Category</label>
										<div class="col-md-3">
                                        <select name="category_id" class="form-control select select2 select2me input-medium" placeholder="Select..." id="category_id">
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
										</div>
										
										<div id="exact_e_id" style="display:none">
										<label class="col-md-2 control-label">Event</label>
										<div class="col-md-3">
								<select name="event_id" id="event_id" class="form-control select select2 select2me" required placeholder="" required>
								<option value=""></option>
								<?php 
								$r1=mysql_query("select * from event where flag='0' order by id Desc ");		
								$i=0;
								while($row1=mysql_fetch_array($r1))
								{
								$id=$row1['id'];
								$title=$row1['title'];
								$event_date1=$row1['date_from'];
								$event_date=date('d-m-Y',strtotime($event_date1));
								?>
								<option value="<?php echo $id;?>"><?php echo $title; echo '-'; echo $event_date;?></option>                              
								<?php }?> 
								<select/>
										</div></div>
										
										<div style="display:none" id="exact_n_id">
										<label class="col-md-2 control-label">News</label>
										<div class="col-md-3">
								<select name="news_id" id="news_id" class="form-control select select2 select2me" required placeholder="" required>
								<option value=""></option>
								<?php 
								$r1=mysql_query("select * from news where flag='0' order by id Desc ");		
								$i=0;
								while($row1=mysql_fetch_array($r1))
								{
								$id=$row1['id'];
								$title=$row1['title'];
								$event_date1=$row1['date'];
								$event_date=date('d-m-Y',strtotime($event_date1));
								?>
								<option value="<?php echo $id;?>"><?php echo $title; echo '-'; echo $event_date;?></option>                              
								<?php }?> 
								<select/>
										</div></div>
										
										
										
										<div class="col-md-2">
				<button type="button" name="sub_reg" class="btn btn-icon-only yellow" onclick="ajax_galley()" id="ajax_galley1"><i class="fa fa-search"></i></button>
			</div>
			</div>
										</div>
										</div>
									</div>
						
						<div id="data"></div>
			</div>
			</form>
			</div></div></div></div>
</body>

<?php footer();?>

<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){    
        $("#category_id").on("change",function(){
			var p=$(this).val();
			if(p==4)
			{
          $("#exact_e_id").show();
		  $("#exact_n_id").hide();
			}
			else if(p==5){
				 $("#exact_e_id").hide();
		   $("#exact_n_id").show();
			}
        });
	});	
</script>
<script>
function ajax_galley(){
	    var category_id=$("#category_id").val();
		 var event_id=$("#event_id").val();
		  var news_id=$("#news_id").val();
		
		if(category_id==4)
			{
				var en_id= event_id;
			}
			else if(category_id==5)
			{
				var en_id= news_id;
			}
		
		
	  	$.ajax({
			url: "ajax_view_gallery.php?en_id="+en_id+"&cat_id="+category_id,
			}).done(function(response) {
		   $("#data").html(""+response+"");
			});
}
</script>
<?php scripts();?>
</html>