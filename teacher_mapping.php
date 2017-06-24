<?php
include("index_layout.php");
include("database.php");

if(isset($_POST['sub']))
{
	$teacher_id=$_POST['teacher_id'];+
	$class_id=$_POST['class_id'];
	$section_id=$_POST['section_id'];
	
	mysql_query("update `faculty_login` set `class_id`='$class_id' , `section_id`='$section_id' where `id`='$teacher_id'"); 
	
	$data=mysql_query("select `id` from `class_section` where `class_id`='$class_id' && `section_id`='$section_id' ");
	$count=mysql_num_rows($data); 
	if($count > 0)
	{
		$ftc_date=mysql_fetch_array($data);
		$update_id=$ftc_date['id'];
		mysql_query("update `class_section` set `class_id`='$class_id' , `section_id`='$section_id' , `teacher_id`='$teacher_id' where `id`='$update_id' ");
	}
	else
	{
		mysql_query("insert into `class_section` set `class_id`='$class_id' , `section_id`='$section_id' , `teacher_id`='$teacher_id' ");
	}
	header("Location:teacher_mapping.php");  	
}
if(isset($_POST['sub_del']))
{
	$delet_class=$_POST['delet_class'];
	mysql_query("delete from `class_section` where id='$delet_class'" );
	header("Location:teacher_mapping.php"); 
}?> 
<html>
<head>
<?php css();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Master Class</title>
</head>
<?php contant_start(); menu();  ?>
<body>
<div class="page-content-wrapper">
<div class="page-content">
<div class="row">
    <div class="col-md-6">
        <div class="portlet box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Subject & teacher Mapping
                </div>
            </div>
        <div class="portlet-body form">
           <form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
                <div class="form-body">
                   <div class="form-group">
                        <label class="control-label col-md-3">Select Class</label>
                        <div class="col-md-6">
                          <select name="class_id" class="form-control select2me" required="required" placeholder="Select..." id="sid">
                            <option value=""></option>
                                <?php
                                $r1=mysql_query("select `class_name`,`id` from master_class where   flag = 0  order by id ASC");		
                                $i=0;
                                while($row1=mysql_fetch_array($r1))
                                {
                                    $id=$row1['id'];
                                    $class_name=$row1['class_name'];
                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $class_name;?></option>                              
                                <?php 
                                }?> 
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Select Section</label>
                        <div class="col-md-6">
                            <select name="section_id" class="form-control select2me" required="required" placeholder="Select..." >
                                <option value=""></option>
                                <?php 
                                    $queryq=mysql_query("select * from `master_section` ");
                                    while($ftc_detailq=mysql_fetch_array($queryq))
                                    {
                                        $section_name=$ftc_detailq['section_name'];
                                        $id=$ftc_detailq['id'];
                                        ?>
                                           <option value="<?php echo $id;?>"><?php echo $section_name;?></option>                              
                                        <?php  
                                    }	
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Select Teacher</label>
                        <div class="col-md-6">
                            <select name="teacher_id" class="form-control select2me" required="required" placeholder="Select..." id="sid">
                            <option value=""></option>
                                <?php
                                $r1=mysql_query("select `user_name`,`id` from faculty_login where   flag = 0 && role_id = 4  order by user_name ASC");		
                                $i=0;
                                while($row1=mysql_fetch_array($r1))
                                {
                                    $id=$row1['id'];
                                    $user_name=$row1['user_name'];
                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $user_name;?></option>                              
                                <?php 
                                }?> 
                          </select>
                        </div>
                    </div>
                    <div align="center">
                        <button type="submit" name="sub" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn default">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
<!-------------------------- View------------>
<div class="col-md-6">
<div class="portlet box">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-gift"></i>View Mapping
</div>
</div>
<div class="portlet-body form">
<div class="table-scrollable" >
<table class="table   table-hover" width="100%" style="font-family:Open Sans;">
<thead>
    <tr style="background:#F5F5F5">
        <th>
        #
        </th>
        <th>
            Class Name
        </th>
        <th>
            Section Name
        </th> 
        <th>
            Class teacher
        </th> 
        <th>
            Action
        </th>
    </tr>
</thead>
<?php
$r1=mysql_query("select * from class_section order by `class_id` ASC ");		
$i=0;
while($row1=mysql_fetch_array($r1))
{
	$i++;
	$id=$row1['id'];
	$class_id=$row1['class_id'];
	$felname1=mysql_query("select `class_name` from master_class where   id = $class_id");		
	$ftcname1=mysql_fetch_array($felname1);
 	$class_name=$ftcname1['class_name'];
	$section_id=$row1['section_id'];
	$felname3=mysql_query("select `section_name` from master_section where   id = $section_id");		
	$ftcname3=mysql_fetch_array($felname3);
 	$section_name=$ftcname3['section_name'];
	$teacher_id=$row1['teacher_id'];
	$felname=mysql_query("select `user_name` from faculty_login where   id = $teacher_id");		
	$ftcname=mysql_fetch_array($felname);
 	$user_name=$ftcname['user_name'];
	
	?>
	<tbody>
        <tr>
            <td>
           		<?php echo $i;?>
            </td>
            <td class="search">
            	<?php echo $class_name;?>
            </td>
            <td>
            	<?php echo $section_name;?>
            </td>
            <td>
            	<?php echo $user_name;?>
            </td>
            <td>
            <a class="btn blue-madison red-stripe btn-sm"  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
            <div class="modal fade" id="delete<?php echo $id ;?>" tabindex="-1" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <span class="modal-title" style="font-size:14px; text-align:left">Are you sure, you want to delete this  class?</span>
                        </div>
                        <div class="modal-footer">
                            <form method="post" name="delete<?php echo $id ;?>">
                                <input type="hidden" name="delet_class" value="<?php echo $id; ?>" />
                                <button type="button" data-dismiss="modal" class="btn btn-sm ">cancel</button> 
                                <button type="submit" name="sub_del"  class="btn btn-sm red-sunglo ">Yes</button> 
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            </td>
        </tr>
	</tbody>
<?php } ?>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
<?php footer(); ?>

<?php scripts();?>

</html>


