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
            
        	<table border="1" width="400px" align="center" style="text-align:center;border-collapse:collapse;">
            	<tr>
                	<td colspan="2" class="header"><?php  echo $data_ftc['school_name'];?></td>
                </tr>
                <tr>
                	<td colspan="2" class="header_sexcond"><?php  echo $data_ftc['address'].' PH. '.$data_ftc['phone'];?></td>
                </tr>
                <tr style="font-size:16px;font-weight:600">
                	<td align="left"><em>IDENTITY-CARD</em></td>
                    <td align="right"><em>SESSION-<?php echo $FeeSession;?></em></td>
                </tr>
                <tr>
                	<td colspan="2">
                    	 <table border="1" width="100%" style="border-collapse:collapse; font-size:15px">
                            <tr>
                                <td align="left" width="30%" rowspan="7"><img width="115px" height="104px" src="user/student0.jpg"></td>
                                <td align="left">Student Name</td>
                                <td>: <?php echo $name; ?></td>
                                
                            </tr>
                            <tr>
                            	<td align="left">Father's Name</td>
                                <td>: <?php echo $father_name; ?></td>
                            </tr>
                             <tr>
                            	<td align="left">Mobile No.</td>
                                <td>: <?php echo $mobile_no; ?></td>
                            </tr>
                             <tr>
                            	<td align="left">Class - Section</td>
                                <td>: <?php echo $class_name.' - '.$section_name; ?></td>
                             </tr>
                             <tr>
                            	<td align="left">Date of Birth</td>
                                <td>: <?php echo $date_birth; ?></td>
                            </tr>
                             
                            
                            
                        </table>
                    </td>
                </tr>
            </table>
            
           <?php
		}
		   ?>
            
            
         
    </body>
</html>
                        