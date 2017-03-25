<?php
 include("index_layout.php");
 include("database.php");
 $user=$_SESSION['category'];

		if(isset($_POST['sub_del']))
		{
		$delet_model=$_POST['delet_model'];
		$r=mysql_query("update `faculty_login` SET `flag`='1' where id='$delet_model'" );
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
								<i class="fa fa-gift"></i> View User List
							</div>
						<div class="tools">
							<a class="" href="create_user.php" style="color:white"><i class="fa fa-plus">&nbsp;<i class="fa fa-user"></i></i></a>
							</div>
						</div>
						<div class="portlet-body form">
						<form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
								<div class="form-body">
                                 <div class="row">
								<div class="form-group">
										<label class="col-md-5 control-label" style="text-align:right">Select Role</label>
										<div class="col-md-7">
                                        <select name="role_id" class="form-control select select2 select2me input-medium" placeholder="Select..." id="view_u">
                                         <option value=""></option>
                                            <?php
                                            $r1=mysql_query("select * from master_role where id=2 OR id=3 OR id=4");		
                                            $i=0;
                                            while($row1=mysql_fetch_array($r1))
                                            {
                                            $id=$row1['id'];
                                            $role_name=$row1['role_name'];
                                            ?>
                              <option value="<?php echo $id;?>"><?php echo $role_name;?></option>                              
                              <?php }?> 
                              <select/>
</div>
</div>
</div>
<div id="data" class="scroller" style="height:400px; padding-top:5px"  data-always-visible="1" data-rail-visible="0"></div>
</div>
</form>
</div></div>
</div></div></div>
</body>

<?php footer();?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){    
        $("#view_u").die().live("change",function(){
	    var view_u=$("#view_u").val();
	  	$.ajax({
			url: "ajax_view_users.php?view_u="+view_u,
			}).done(function(response) {
		   $("#data").html(""+response+"");
			});
});
});
</script>
<?php scripts();?>

</html>

