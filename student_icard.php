<?php
 include("index_layout.php");
 include("database.php");
@$session_id=@$_SESSION['id'];
 date_default_timezone_set('Asia/Calcutta');
ini_set('max_execution_time', 100000); 

if(isset($_POST['submit']))
{
	$class_id=$_REQUEST["class_id"];
	$section_id=$_REQUEST["section_id"];
	echo "<script>
		location='student_icard.php';
		window.open('view_icard.php?class=$class_id&section=$section_id','_newtab');
	</script>";	
}
	 
  ?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student I-Card</title>
</head>
<?php contant_start(); menu();  ?>
<body>
<div class="page-content-wrapper">
     <div class="page-content">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Student I-Card
                </div>
                <div class="tools">
                  
                    
                </div>
            </div>
            <div class="portlet-body form">
						 
                <form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
					<div class="row"  style="margin-top:20px">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Select Class</label>
                            <div class="col-md-3">
                            <select name="class_id" required="required" class="form-control select select2 select2me section_select" placeholder="Select...">
                                <option value=""></option>
                                <?php
                                $class=mysql_query("select * from master_class");		
                                $i=0;
                                while($class1=mysql_fetch_array($class))
                                {
									$id=$class1['id'];
									$class_name=$class1['class_name'];
									?>
								  	<option value="<?php echo $id;?>"><?php echo $class_name;?></option>                              
                              <?php }?> 
                            </select>
                            </div>
                        
                            <label class="col-md-2 control-label">Section</label>
                            <div class="col-md-3">
                               <select name="section_id" class="form-control select select2 select2me" required="required" placeholder="Select..." id="replace_data">
                                <option value=""></option>
                               </select>
                            </div>
                        </div>
                       
                    </div>
                  	<div align="center">
                    	<button type="submit" class="btn green" name="submit"> Generate </button>
                    </div>
  				</form>
            </div>
        </div>
    </div>
</div>
</body>
<?php footer(); ?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){    
	$(document).on('change','.section_select', function(){
		var class_id = $(this).val();
		$.ajax({
			url: "ajax_page.php?function_name=create_user_section_list&id="+class_id,
			type: "POST",
			success: function(data)
			{   
				 $('#replace_data').html(data);
			}
		});
	});
});
</script>

<?php scripts();?>

</html>
 

