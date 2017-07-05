 <?php
session_start();
 include("index_layout.php");
require_once("database.php");
$class_id=$_GET['class'];
$section_id=$_GET['section'];
date_default_timezone_set('Asia/Calcutta'); 
ini_set('max_execution_time', 100000); 
$cur=date('Y');
$back=$cur+1;
$FeeSession=$cur."-".$back;		 
?>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<html>
<head> 
 <title></title>
 <style>
  .header {
	font-size:25px;
	font-weight:600;
	border-bottom:1px solid #FFF;  
  }
  .header_sexcond {
	font-size:15px;
	font-weight:600; 
  }
 </style> 
</head>
    <body style="background-color:#FFF">
   
        <?php
			$ftc_school=mysql_query("select * from `school`");
			$data_ftc=mysql_fetch_array($ftc_school);
			$i=0;
		$ftc_data=mysql_query("select * from `login` where `class_id` = '$class_id' && `section_id` = '$section_id'");
		while($ftcData=mysql_fetch_array($ftc_data))
		{
			$i++;
			$name=$ftcData['name'];
			$father_name=$ftcData['father_name'];
			$address=$ftcData['address'];
			$mobile_no=$ftcData['mobile_no'];
			$dob=$ftcData['dob'];
			if(empty($dob) || $dob=='0000-00-00'){}
			else
			{$date_birth=date('d-m-Y',strtotime($dob));}
			$class_id=$ftcData['class_id'];
			$section_id=$ftcData['section_id'];
			$cls=mysql_query("select * from `master_class` where `id`='$class_id'");
			$fet_cls=mysql_fetch_array($cls);
			$class_name=$fet_cls['class_name'];
			$sec=mysql_query("select * from `master_section` where `id`='$section_id'");
			$fet_sec=mysql_fetch_array($sec);
			$section_name=$fet_sec['section_name'];
			
        ?>
        
			<div class='col-md-6 form-group' style="width:50%;height:270px;float:left">
			<table border="1" align="center" style="text-align:center;border-collapse:collapse;">
            	<tr>
                	<td colspan="2" class="header"><?php  echo $data_ftc['school_name'];?></td>
                </tr>
                <tr>
                	<td colspan="2" class="header_sexcond"><?php  echo $data_ftc['address'].' Ph. '.$data_ftc['phone'];?></td>
                </tr>
                <tr style="font-size:14px;font-weight:600">
                	<td align="center">IDENTITY-CARD</td>
                    <td align="center">SESSION-<?php echo $FeeSession;?></td>
                </tr>
                <tr>
                	<td colspan="2">
                    	 <table border="1" width="100%" style="border-collapse:collapse;height:140px; font-size:14px">
                            <tr>
                                <td align="center" width="25%" height="139px"rowspan="7"><img width="115px" height="134px" src="user/student0.jpg"></td>
                                <td align="left">&nbsp;Student </td>
                                <td>&nbsp; <?php echo $name; ?></td>
                                
                            </tr>
                            <tr>
                            	<td align="left">&nbsp;Father's </td>
                                <td>&nbsp; <?php echo $father_name; ?></td>
                            </tr>
                             <tr>
                            	<td align="left">&nbsp;Mobile No.</td>
                                <td>&nbsp; <?php echo $mobile_no; ?></td>
                            </tr>
                             <tr>
                            	<td align="left">&nbsp;Class </td>
                                <td>&nbsp; <?php echo $class_name.' - '.$section_name; ?></td>
                             </tr>
                             <tr>
                            	<td align="left">&nbsp;Date of Birth</td>
                                <td>&nbsp; <?php echo $date_birth; ?></td>
                            </tr>
                         </table>
                    </td>
                </tr>
            </table>
			</div>
		   <?php
		}
		   ?>     
    </body>
</html>
                        