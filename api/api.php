<?php
require_once("Rest.inc.php");
date_default_timezone_set('asia/kolkata');
ini_set("expose_php",0);
class API extends REST {

    public $data = "";
    
    const DB_SERVER = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "";
    const DB = "new_notice";
	
	
   private $db = NULL;
    public function __construct() {
    parent::__construct();  // Init parent constructor
    $this->dbConnect();    // Initiate Database connection     
    }

    public function __destruct() {
    $this->db = NULL;
    }
    
    private function dbConnect() {
        // Set up the database
        try {            
            $this->db = new PDO('mysql:host=' . self::DB_SERVER . ';dbname=' . self::DB, self::DB_USER, self::DB_PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
           /* $error = array('Type' => 'Error', "Error" => 'Some Error From Server', 'Responce' => "");
            $this->response($this->json($error), 251);*/
        }
    }
     /*
     * Public method for access api.
     * This method dynmically call the method based on the query string
     *
     */
    public function processApi(){
    $func = strtolower(trim(str_replace("/", "", $_REQUEST['rquest'])));
	if ((int) method_exists($this, $func) > 0){
    $this->$func();
		   }
    else{
    $this->response('', 404);  
	//If the method not exist with in this class, response would be "Page not found".
		}	
        //,Jr@qc5#,5&C
                                }
////////////My API FUN///////////////////////////////
public function login() 
	{
		global $link;
		include_once("common/global.inc.php");
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
        $enrollment_no=$this->_request['enrollment_no'];
		$password=$this->_request['password'];
		$newpassword=md5($password);
		$login_identity=$this->_request['login_identity'];
		
		if($login_identity=='student')
		{ 
			$sql = $this->db->prepare("SELECT * FROM login WHERE username='".$enrollment_no."' AND password='".$newpassword."' AND   `flag` = '0' ");
			$sql->execute();
			 if($sql->rowCount()>0)
			  {
				$about_sql = $this->db->prepare("SELECT * FROM about_us");
				$about_sql->execute();
				$about_sql1 = $about_sql->fetch(PDO::FETCH_ASSOC);
				$x_about_us=$about_sql1['about_us'];

				$row_login = $sql->fetch(PDO::FETCH_ASSOC);

				if(!empty($row_login ['image'])){
				$row_login ['image'] = $site_url."user/".$row_login ['image'];
				}else{
				$row_login ['image'] = "";
				}

				$class_id = $row_login['class_id'];
					$sql_stds = $this->db->prepare("SELECT `class_name` FROM master_class WHERE id='".$class_id."'");
					$sql_stds->execute();
					$stds = $sql_stds->fetch(PDO::FETCH_ASSOC);
					$class_name=$stds['class_name'];
				$section_id = $row_login['section_id'];
					$sql_std1 = $this->db->prepare("SELECT `section_name` FROM master_section WHERE id='".$section_id."'");
					$sql_std1->execute();
					$std1 = $sql_std1->fetch(PDO::FETCH_ASSOC);
					$section_name=$std1['section_name'];
				$role_id = $row_login['role_id'];	
					$sql_std12 = $this->db->prepare("SELECT `role_name` FROM master_role WHERE id='".$role_id."'");
					$sql_std12->execute();
					$std12 = $sql_std12->fetch(PDO::FETCH_ASSOC);
					$role_name=$std12['role_name'];
 $class_terche = $this->db->prepare("SELECT `user_name`,`mobile_no` FROM faculty_login WHERE class_id='".$class_id."' AND section_id='".$section_id."'");
 
				 $class_terche->execute();
				 $ftcc = $class_terche->fetch(PDO::FETCH_ASSOC);
				 $Tuser_name=$ftcc['user_name'];
				 $Tmobile_no=$ftcc['mobile_no'];
if(empty($Tmobile_no)){$Tmobile_no='N/A';}
				 	
				$result = array('id' => $row_login['id'],
					'enrollment_no' => $row_login['eno'],
					'designation' => '',
					'name' => $row_login['name'],
 					'username' => $row_login['name'],
					'userimage' => $row_login['image'],
					'uniq_id' => $row_login['school_id'],
					'role_id' => $row_login['role_id'],
					'role_name' => $role_name,
					'about_us' => $x_about_us,
					'login_user' => $login_identity,
					'class_id' => $row_login['class_id'],
					'section_id' => $row_login['section_id'],
					'class_name' => $class_name,
					'section_name' => $section_name,
'teacher_name' => $Tuser_name,
					'teacher_contact' => $Tmobile_no,
					'roll_no' => $row_login['roll_no'],
					'address' => $row_login['address'],
					'mobile_no' => $row_login['mobile_no'],
				);
			//$result1 = array("login" => $result );
			$success = array('status'=> true, "Error" => "login successful",'login' => $result  );
			$this->response($this->json($success), 200);
			}    
			else
			{
				$error = array('status' => false, "Error" => "Try again",'Responce' => '');
				$this->response($this->json($error), 200);
			}
		}
		else if($login_identity=='faculty')
		{

			 $sql = $this->db->prepare("SELECT * FROM faculty_login WHERE user_name='".$enrollment_no."' AND password='".$newpassword."'  AND  `flag` = '0' ");
			 $sql->execute();
				if($sql->rowCount()>0)
				{
 				$about_sql = $this->db->prepare("SELECT * FROM about_us");
				$about_sql->execute();
				$about_sql1 = $about_sql->fetch(PDO::FETCH_ASSOC);
				$x_about_us=$about_sql1['about_us'];
				
 				$row_login = $sql->fetch(PDO::FETCH_ASSOC);
				$class_id = $row_login['class_id'];
					$sql_stds = $this->db->prepare("SELECT `class_name` FROM master_class WHERE id='".$class_id."'");
					$sql_stds->execute();
					$stds = $sql_stds->fetch(PDO::FETCH_ASSOC);
					$class_name=$stds['class_name'];
				$section_id = $row_login['section_id'];
					$sql_std1 = $this->db->prepare("SELECT `section_name` FROM master_section WHERE id='".$section_id."'");
					$sql_std1->execute();
					$std1 = $sql_std1->fetch(PDO::FETCH_ASSOC);
					$section_name=$std1['section_name'];
				$role_id = $row_login['role_id'];	
					$sql_std12 = $this->db->prepare("SELECT `role_name` FROM master_role WHERE id='".$role_id."'");
					$sql_std12->execute();
					$std12 = $sql_std12->fetch(PDO::FETCH_ASSOC);
					$role_name=$std12['role_name'];
				
				if(!empty($row_login ['image'])){
				$row_login ['image'] = $site_url."faculty/".$row_login ['image'];
				}else{
				$row_login ['image'] = "";
				}

				$result = array('id' => $row_login['id'],
					'enrollment_no' => '',
					'designation' => '',
					'name' => $row_login['name'],
					'username' => $row_login['user_name'],
					'mobile_no' => $row_login['mobile_no'],
					'userimage' => $row_login['image'],
					'uniq_id' => '',
					'role_id' => $row_login['role_id'],
					'role_name' => $role_name,
					'about_us' => $x_about_us,
					'login_user' => $login_identity,
					'class_id' => $row_login['class_id'],
					'section_id' => $row_login['section_id'],
					'class_name' => $class_name,
					'section_name' => $section_name,
  				);
 			$success = array('status'=> true, "Error" => "login successful",'login' => $result  );
			$this->response($this->json($success), 200);
			}    
			else
			{
				$error = array('status' => false, "Error" => "Try again",'Responce' => '');
				$this->response($this->json($error), 200);
			}
		}
 	}
////////////////////////
public function push_token_update() {
		global $link;
		include_once("common/global.inc.php");
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		$device_token=$this->_request['device_token'];
		$id=$this->_request['id'];
		$login_identity=$this->_request['login_identity'];
		
		if($login_identity=='student')
		{
		
		$sql = $this->db->prepare("SELECT * FROM login WHERE id=:id");
		$sql->bindParam(":id", $id, PDO::PARAM_STR);
			$sql->execute();
			if($sql->rowCount()>0)
			{
				$sql_update_token = $this->db->prepare("UPDATE `login` SET device_token='".$device_token."' WHERE id='".$id."' LIMIT 1");
				$sql_update_token->execute();
                $success = array('status' => true, "msg" => 'Yes', 'Responce' => '');
                $this->response($this->json($success), 200);
            } 
			else 
			{
                $error = array('status' => false, "Error" => "No", 'Responce' => '');
                $this->response($this->json($error), 200);
            }
		}
		else if($login_identity=='faculty')
		{
			$sql = $this->db->prepare("SELECT * FROM faculty_login WHERE id=:id");
			$sql->bindParam(":id", $id, PDO::PARAM_STR);
			$sql->execute();
			if($sql->rowCount()>0)
			{
				$sql_update_token = $this->db->prepare("UPDATE `faculty_login` SET device_token='".$device_token."' WHERE id='".$id."' ");
				$sql_update_token->execute();
                $success = array('status' => true, "msg" => 'Yes', 'Responce' => '');
                $this->response($this->json($success), 200);
            } 
			else 
			{
                $error = array('status' => false, "Error" => "No", 'Responce' => '');
                $this->response($this->json($error), 200);
            }
			
		}
		else
		{
			$error = array('status' => false, "Error" => "Provide Login Identity", 'Responce' => '');
            $this->response($this->json($error), 200);
		}
	}
	
//home page api


public function notification() {
	global $link;
		include_once("common/global.inc.php");

		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
    
		$sql = $this->db->prepare("SELECT * FROM notice where `flag` = 0 order by id DESC");
		$sql->execute();
				if($sql->rowCount()>0)
			{
			$row_notification1 = $sql->fetchALL(PDO::FETCH_ASSOC);
            
            foreach($row_notification1 as $row_notification)
            {
				
					$timestamp=$row_notification['dateofpublish'];
					$dt=str_replace('-', '', $timestamp);
					$event_time=$row_notification['time'];
					$newDateTime = date('h:i', strtotime($event_time));
					$npm = date('A', strtotime($event_time));
					$tm=str_replace(':', '', $newDateTime);
					$exact_trim=$dt.$tm;
					$datetime = DateTime::createFromFormat('YmdHi', $exact_trim);
					$ed=$datetime->format('d');
					$edd=$datetime->format('D');
					$em=$datetime->format('M');
					$ey=$datetime->format('Y');
					$eh=$datetime->format('H');
					$ei=$datetime->format('i');
					$date_time=array('date' => $ed,
					'day' => $edd,
					'month' => $em,
					'year' => $ey,
					'H' => $eh,
					'I' => $ei,
					'A' => $npm);
				 if(!empty($row_notification['file_name'])){
						 $row_notification['file_name'] = $site_url."notice/".$row_notification['file_name'];
					}else{
						 $row_notification['file_name'] = "";
					}
					
					
				 if(!empty($row_notification['image'])){
						 $row_notification['image'] = $site_url."notice/notice_image/".$row_notification['image'];
					}else{
						 $row_notification['image'] = "";
					}
					if($row_notification['shareable']==1)
                 {$shareable=true;}else{$shareable=false;}
					
				
			$result[] = array('id' => $row_notification['id'],
					'title' => $row_notification['title'],
                    'dateofpublish' => $row_notification['dateofpublish'],
                    'time'=> $row_notification['time'],
					'date_time'=> $date_time,
					'notice_no'=> $row_notification['notice_no'],
					'pdf_file'=> $row_notification['file_name'],

					'image'=> $row_notification['image'],
					'shareable'=> $shareable,
					'description'=> $row_notification['description']
						);
            }
			//$result1 = array("login" => $result );
			$success = array('status'=> true, "Error" => "your notification",'notification' => $result);
			$this->response($this->json($success), 200);
            }
		else{
			$error = array('status' => false, "Error" => "Try again",'Responce' => '');
			$this->response($this->json($error), 200);
		}
		}

///

public function notification_details() {
	global $link;
		include_once("common/global.inc.php");

		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
    		$notice_id=$this->_request['notice_id'];

		$sql = $this->db->prepare("SELECT * FROM notice where id='".$notice_id."'  && `flag` = 0");
		$sql->execute();
			 
				if($sql->rowCount()>0)
			{
			$row_notification = $sql->fetch(PDO::FETCH_ASSOC);
            
					$timestamp=$row_notification['dateofpublish'];
					$dt=str_replace('-', '', $timestamp);
					$event_time=$row_notification['time'];
					$newDateTime = date('h:i', strtotime($event_time));
					$npm = date('A', strtotime($event_time));
					$tm=str_replace(':', '', $newDateTime);
					$exact_trim=$dt.$tm;
					$datetime = DateTime::createFromFormat('YmdHi', $exact_trim);
					$ed=$datetime->format('d');
					$edd=$datetime->format('D');
					$em=$datetime->format('M');
					$ey=$datetime->format('Y');
					$eh=$datetime->format('H');
					$ei=$datetime->format('i');
					$date_time=array('date' => $ed,
					'day' => $edd,
					'month' => $em,
					'year' => $ey,
					'H' => $eh,
					'I' => $ei,
					'A' => $npm);
				 if($row_notification['shareable']==1)
                 {$shareable=true;}else{$shareable=false;}
			 
				 if(!empty($row_notification['file_name'])){
						 $row_notification['file_name'] = $site_url."notice/".$row_notification['file_name'];
					}else{
						 $row_notification['file_name'] = "";
					}
					
					
				 if(!empty($row_notification['image'])){
						 $row_notification['image'] = $site_url."notice/notice_image/".$row_notification['image'];
					}else{
						 $row_notification['image'] = "";
					}
					
					
				$result = array('id' => $row_notification['id'],
				'title' => $row_notification['title'],
				'dateofpublish' => $row_notification['dateofpublish'],
				'time'=> $row_notification['time'],
				'date_time'=> $date_time,
				'notice_no'=> $row_notification['notice_no'],
				'pdf_file'=> $row_notification['file_name'],
				'image'=> $row_notification['image'],
				'shareable'=> $shareable,
				'description'=> $row_notification['description']
				);

			$success = array('status'=> true, "Error" => "notification details",'notification_details' => $result);
			$this->response($this->json($success), 200);
            }
		else{
			$error = array('status' => false, "Error" => "No data found.",'Responce' => '');
			$this->response($this->json($error), 200);
		}
	}
 
public function notification_home() {
    include_once("common/global.inc.php");
        global $link;
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
$sql = $this->db->prepare("SELECT * FROM noticedetail order by noticenumber DESC");
		$sql->execute();        

							$fetch_qry1 = $sql->fetchALL(PDO::FETCH_ASSOC);
							
							if($sql->rowCount()>0)
							{
							
							foreach($fetch_qry1 as $fetch_qry){
							
                            $noticenumber=$fetch_qry['noticenumber'];
                            $x_notice='notice';
                            $y_notice='.pdf';
                            
                            $pdf_notice=$x_notice.$noticenumber.$y_notice;
                            
                            
							$branch=$fetch_qry['branch'];
                            $branch_data =explode(',', $branch);
                            $semester=$fetch_qry['semester'];
                            $semester_data =explode(',', $semester);
                            
                             $hostel=$fetch_qry['hostel'];
                            $hostel_data =explode(',', $hostel);
                            
                             $year=$fetch_qry['year'];
                            $year_data =explode(',', $year);
                            
                            if(!empty($fetch_qry['uploadfile'])){
						 $fetch_qry['uploadfile'] = $site_url."uploads/".$fetch_qry['uploadfile'];
					}else{
						 $fetch_qry['uploadfile'] = "";
					}
                    if(!empty($pdf_notice)){
						 $pdf_notice = $site_url."uploads/".$pdf_notice;
					}else{
						 $pdf_notice = "";
					}
                            
                           
                    foreach($branch_data as $branch_data1)
                    {
                      
                        $sql1 = $this->db->prepare("SELECT * FROM student where dept='".$branch_data1."'");
                        $sql1->execute();        
                            $fet_qrys = $sql1->fetchALL(PDO::FETCH_ASSOC);
                            foreach($fet_qrys as $d)
                            {
                                $id=$d['id'];
                                $a[]=$id;
                           
                            }
                    }
                     if(!empty($a))
                    {
                       $aa=$a; 
                    }
                    else{
                        $aa=[];
                    }
                     foreach($semester_data as $semester_data1)
                    {
                      
                        $sql2 = $this->db->prepare("SELECT * FROM student where semester='".$semester_data1."'");
                        $sql2->execute();        
                            $fet_qry1 = $sql2->fetchALL(PDO::FETCH_ASSOC);
                            foreach($fet_qry1 as $d)
                            {
                                $id=$d['id'];
                                $b[]=$id;
                           
                            }
                    }
                     if(!empty($b))
                    {
                       $bb=$b; 
                    }
                    else{
                        $bb=[];
                    }
                    foreach($hostel_data as $hostel_data1)
                    {
                        $sql3 = $this->db->prepare("SELECT * FROM student where hostel='".$hostel_data1."'");
                        $sql3->execute();        
                            $fet_qry2 = $sql3->fetchALL(PDO::FETCH_ASSOC);
                          
                            foreach($fet_qry2 as $cd)
                            {
                               $id=$cd['id'];
                                $c[]=$id;
                                
                            }
                    }
                    if(!empty($c))
                    {
                       $cc=$c; 
                    }
                    else{
                        $cc=[];
                    }
                    
                    foreach($year_data as $year_data1)
                    {
                        $sql4 = $this->db->prepare("SELECT * FROM student where year='".$year_data1."'");
                        $sql4->execute();        
                            $fet_qry3 = $sql4->fetchALL(PDO::FETCH_ASSOC);
                          
                            foreach($fet_qry3 as $y)
                            {
                               $id=$y['id'];
                                $cy[]=$id;
                                
                            }
                    }
                    if(!empty($cy))
                    {
                       $ccy=$cy; 
                    }
                    else{
                        $ccy=[];
                    }
                 
                 if(!empty($aa) && !empty($bb) && !empty($cc) && empty($ccy))
                 {
                     $k=array_intersect($aa,$bb,$cc);
                 }
                 else if(!empty($aa) && !empty($bb) && empty($cc) && !empty($ccy))
                 {
                     $k=array_intersect($aa,$bb,$ccy);
                 }
                  else if(!empty($aa) && empty($bb) && !empty($cc) && !empty($ccy))
                 {
                     $k=array_intersect($aa,$cc,$ccy);
                 }
                 else if(empty($aa) && !empty($bb) && !empty($cc) && !empty($ccy))
                 {
                     $k=array_intersect($bb,$cc,$ccy);
                 }
                 else if(!empty($aa) && !empty($bb) && !empty($cc) && !empty($ccy))
                 {
                     $k=array_intersect($bb,$cc,$ccy);
                 }
                 else if(!empty($aa) && !empty($bb) && empty($cc) && empty($ccy))
                 {
                     $k=array_intersect($aa,$bb);
                 }
                 else if(!empty($aa) && empty($bb) && empty($cc) && empty($ccy))
                 {
                     $k=array_intersect($aa);
                 }
                  else if(empty($aa) && !empty($bb) && empty($cc) && empty($ccy))
                 {
                     $k=array_intersect($bb);
                 }
                  else if(empty($aa) && empty($bb) && !empty($cc) && !empty($ccy))
                 {
                     $k=array_intersect($cc,$ccy);
                 }
                  else if(empty($aa) && empty($bb) && empty($cc) && !empty($ccy))
                 {
                     $k=array_intersect($ccy);
                 }
                  else if(empty($aa) && empty($bb) && !empty($cc) && empty($ccy))
                 {
                     $k=array_intersect($cc);
                 }
                  else if(!empty($aa) && empty($bb) && !empty($cc) && empty($ccy))
                 {
                     $k=array_intersect($aa,$cc);
                 }
                  else if(!empty($aa) && empty($bb) && empty($cc) && !empty($ccy))
                 {
                     $k=array_intersect($aa,$ccy);
                 }
                  else if(empty($aa) && !empty($bb) && !empty($cc) && empty($ccy))
                 {
                     $k=array_intersect($bb,$cc);
                 }
                  else if(empty($aa) && !empty($bb) && empty($cc) && !empty($ccy))
                 {
                     $k=array_intersect($bb,$ccy);
                 }
                
                 
            if(!empty($k))
			{
            
            foreach($k as $row_notification)
            {
				$sql9 = $this->db->prepare("SELECT * FROM student where id='".$row_notification."'");
				$sql9->execute();        
				$fet_qryn = $sql9->fetch(PDO::FETCH_ASSOC);

					$result[] = array('id' => $fetch_qry['noticenumber'],
					'eno' => $fet_qryn['eno'],
					'title' => $fetch_qry['title'],
					'dateofpublish' => $fetch_qry['dateofpublish'],
					'time'=> $fetch_qry['Time'],
					'image'=>$fetch_qry['uploadfile'],
					'pdf'=>$pdf_notice
					);
			}
			$success = array('status'=> true, "Error" => "your notification",'notification' => $result);
			$this->response($this->json($success), 200);
            }
			}
							}
			
			
		else{
			$error = array('status' => false, "Error" => "Try again",'Responce' => '');
			$this->response($this->json($error), 200);
        }
            			
        }
////////event//////////
public function event() {
              include_once("common/global.inc.php");
        global $link;
                     
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		        $limit=1;
$limit_start=$this->_request['start'];
$user_id=$this->_request['user_id'];

        $event_sql = $this->db->prepare("SELECT * FROM event where flag=0 order by id DESC LIMIT $limit_start , $limit ");
		$event_sql->execute();
				if($event_sql->rowCount()>0)
			{
			$event_fet = $event_sql->fetchALL(PDO::FETCH_ASSOC);
			foreach($event_fet as $row_event)
            {
/*$exist_sql = $this->db->prepare("SELECT * FROM add_to_calendar where user_id='".$user_id."' AND event_id='".$row_event['id']."'");
				$exist_sql->execute();
				$exist_sql1 = $exist_sql->fetch(PDO::FETCH_ASSOC);

				if($exist_sql->rowCount()>0)
				{
					$event_exist=true;
				}
				else{
					$event_exist=false;
				}..............*/

$event_sql_id = $this->db->prepare("SELECT * FROM gallery where event_news_id='".$row_event['id']."' AND category_id='4'");
$event_sql_id->execute();
$event_sql_id1 = $event_sql_id->fetch(PDO::FETCH_ASSOC);

if(!empty($event_sql_id1))
{
$event_sql_id2=$event_sql_id1['id'];
$isgallery=true;		
}
else{
$event_sql_id2='';
$isgallery=false;
}


				
$timestamp=$row_event['date_from'];
$dt=str_replace('-', '', $timestamp);
$event_time=$row_event['time'];
$newDateTime = date('h:i', strtotime($event_time));
$npm = date('A', strtotime($event_time));
$tm=str_replace(':', '', $newDateTime);
$exact_trim=$dt.$tm;
$datetime = DateTime::createFromFormat('YmdHi', $exact_trim);
$ed=$datetime->format('d');
$edd=$datetime->format('D');
$em=$datetime->format('M');
$emm=$datetime->format('m');

$x_emm=$emm-1;

$ey=$datetime->format('Y');
$eh=$datetime->format('H');
$ei=$datetime->format('i');

$coma=', ';
$space=' ';
$tabb=' - ';

$date_text_from=$ed.$space.$em.$coma.$ey;

/*$date_time=array('date' => $ed,
'day' => $edd,
'month' => $em,
'month_id' => $x_emm,
'year' => $ey,
'H' => $eh,
'I' => $ei,
'A' => $npm);*/

$timestamp1=$row_event['date_to'];
$dt1=str_replace('-', '', $timestamp1);

$datetime1 = DateTime::createFromFormat('Ymd', $dt1);
$ed1=$datetime1->format('d');
$edd1=$datetime1->format('D');
$em1=$datetime1->format('M');
$emm1=$datetime1->format('m');
$x_emm1=$emm1-1;
$ey1=$datetime1->format('Y');


$date_text_to=$ed1.$space.$em1.$coma.$ey1;
$date_text=$date_text_from.$tabb.$date_text_to;


$event_folder_name1='event';
$event_folder_name2=$event_folder_name1.$row_event['id'];

				
                if(!empty($row_event['image'])){
					$row_event['image']= $site_url."event/".$event_folder_name2."/".$row_event['image'];
					}else{
						 $row_event['image'] = "";
					}
                            if($row_event['shareable']==1)
                             {$shareable=true;}else{$shareable=false;}
                
			$result[] = array('id' => $row_event['id'],
					'title' => $row_event['title'],
                    'discription' => $row_event['description'],
					'details' => $row_event['description'],
                    'date_from'=> $row_event['date_from'],       /*c*/
                    'date_to'=> $row_event['date_to'],
					'current_date'=> $row_event['curent_date'],
                    'event_pic'=>$row_event['image'],
                    'gallery_id' => $event_sql_id2,
					'isgallery' => $isgallery,
					'event_time' => $row_event['time'],
					'location' => $row_event['location'],
					'shareable'=> $shareable,
                    'date_time' => '',
					'date_text' => $date_text
                    //'event_tag' =>$event_exist
					
					);
            }
                             if(!empty($result))
				{
					 $kkr=$result;
				}
				else
				{
					$kkr=array();
				}

			$success = array('status'=> true, "Error" => "your Event",'event' => $kkr);
			$this->response($this->json($success), 200);
            }
		else{
			$error = array('status' => false, "Error" => "Try again",'Responce' => '');
			$this->response($this->json($error), 200);
		}
		}
		///




public function home_screen_api() {
	include_once("common/global.inc.php");
	global $link;
	if ($this->get_request_method() != "POST") {
	$this->response('', 406);
	}
// Slider Images
	$home_sql = $this->db->prepare("SELECT * FROM home_gallery where flag=0 order by id ASC LIMIT 0 , 5");
	$home_sql->execute();
	if($home_sql->rowCount()>0)
	{
		$home_sql1 = $home_sql->fetchALL(PDO::FETCH_ASSOC);
		
		foreach($home_sql1 as $home_sql)
		{
			if(!empty($home_sql['pic'])){
				$home_sql['pic'] = $site_url."home/".$home_sql['pic'];
			}else{
				$home_sql['pic'] = "";
			}	
			
			$result3[]= array('id' => $home_sql['id'],
				'title' => $home_sql['title'],
				'discription' => $home_sql['pic'],
			);	
		}
	}
	else{
		$result3 = array();
	}
//	Events Last 5 Events
	$event_sql = $this->db->prepare("SELECT * FROM event where flag=0 order by id DESC LIMIT 0 , 5");
	$event_sql->execute();
	if($event_sql->rowCount()>0)
	{
		$row_event1 = $event_sql->fetchALL(PDO::FETCH_ASSOC);
		
		foreach($row_event1 as $row_event)
		{
			$event_id=$row_event['id'];
			$event_folder_name1='event';
			$event_folder_name2=$event_folder_name1.$event_id;
			
			$event_sql_id = $this->db->prepare("SELECT * FROM gallery where event_news_id='".$event_id."' AND category_id='4'");
			$event_sql_id->execute();
			$event_sql_id1 = $event_sql_id->fetch(PDO::FETCH_ASSOC);
			
			if(!empty($event_sql_id1))
			{
				$event_sql_id2=$event_sql_id1['id'];
				$isgallery=true;		
			}
			else
			{
				$event_sql_id2='';
				$isgallery=false;
			}
			
			
			
			if(!empty($row_event['image'])){
			
				$row_event['image']= $site_url."event/".$event_folder_name2."/".$row_event['image'];
			}else{
				$row_event['image'] = "";
			}	
			$date_from=$row_event['date_from'];
			$time=$row_event['time'];
			  
			$ed=date('d',strtotime($date_from));
			$edd=date('D',strtotime($date_from));
			$em=date('M',strtotime($date_from));
			$ey=date('Y',strtotime($date_from));
			$eh=date('H',strtotime($time));
			$ei=date('i',strtotime($time));
			$emm=date('m',strtotime($time));
			$npm=date('A',strtotime($time));
			$x_emm=$emm-1;
			$date_time=array('date' => $ed,
				'day' => $edd,
				'month' => $em,
				'month_id' => $x_emm,
				'year' => $ey,
				'H' => $eh,
				'I' => $ei,
				'A' => $npm
			);
			
			$result[]= array('id' => $row_event['id'],
				'title' => $row_event['title'],
				'discription' => $row_event['description'],
				'event_date'=> $row_event['date_from'],
				'current_date'=> $row_event['curent_date'],
				'event_pic'=>$row_event['image'],
				'event_time' => $row_event['time'],
				'gallery_id' => $event_sql_id2,
				'isgallery' => $isgallery,
				'location' => $row_event['location'],
				'date_time' => $date_time,
			);	
		}
	}
	else
	{
		$result[] = array();
	}
	
	// News Image
	$news_sql = $this->db->prepare("SELECT * FROM news where flag=0 order by id DESC LIMIT 0 , 5 ");
	$news_sql->execute();
	if($news_sql->rowCount()>0)
	{
		$news_fsql = $news_sql->fetchALL(PDO::FETCH_ASSOC);
		foreach($news_fsql as $row_news)
		{
			$news_id=$row_news['id'];
			$news_folder_name1='news';
			$news_folder_name2=$news_folder_name1.$news_id;
			$nws_sql_id = $this->db->prepare("SELECT * FROM gallery where event_news_id='".$news_id."' AND category_id='5'");
			$nws_sql_id->execute();
			$nws_sql_id1 = $nws_sql_id->fetch(PDO::FETCH_ASSOC);
			if(!empty($nws_sql_id1))
			{
				$nws_sql_id2=$nws_sql_id1['id'];	
			}
			else
			{
				$nws_sql_id2='';
			}
			if(!empty($row_news['featured_image']))
			{
				$row_news['featured_image']= $site_url."news/".$news_folder_name2."/".$row_news['featured_image'];
			}
			else
			{
				$row_news['featured_image'] = "";
			}
			
			$date=$row_news['date'];
			 
			$ed=date('d', strtotime($date));
			$edd=date('D', strtotime($date));
			$em=date('M', strtotime($date));
			$ey=date('Y', strtotime($date));
			
			$date_time=array('date' => $ed,
				'day' => $edd,
				'month' => $em,
				'year' => $ey,
			);
			$result1[] = array('id' => $row_news['id'],
				'news_title' => $row_news['title'],
				'news_sub_description'=>$row_news['description'],
				'news_details' => $row_news['description'],
				'news_date'=> $row_news['date'],
				'gallery_id'=>$nws_sql_id2,
				'news_pic'=>$row_news['featured_image'],
				'news_location'=>'',
				'date_time'=>$date_time
			);
		}
	}
	else
	{
		$result1[] = array();
	}
	// Gallery Image
	$sfg_sql = $this->db->prepare("SELECT * FROM gallery where category_id='4' order by id DESC");
	$sfg_sql->execute();
	$sfg_sql1 = $sfg_sql->fetch(PDO::FETCH_ASSOC);
	$exid=$sfg_sql1['id'];
	$exevent_news_id=$sfg_sql1['event_news_id'];
	
	$fg_sql = $this->db->prepare("SELECT * FROM sub_gallery where  gallery_id='".$exid."' order by id DESC LIMIT 0 , 4");
	$fg_sql->execute();
	$fcg_sql = $fg_sql->fetchALL(PDO::FETCH_ASSOC);
	$src= $fg_sql->rowCount();
	if($src>0)
	{
		$gallry_folder_name1='event';
		$gallry_folder_name2=$gallry_folder_name1.$exevent_news_id;
		
		foreach($fcg_sql as $row_gallery)
		{
			if(!empty($row_gallery['gallery_pic']))
			{
				$row_gallery['gallery_pic']= $site_url."event/".$gallry_folder_name2."/".$row_gallery['gallery_pic'];
				 
			 
			$result6[] = array(
				'gallery' => $row_gallery['gallery_pic']
			);
}
		}
 
	}
	else
	{
		$result6[] = array();
	}
	//-- Response
	$result2=array('slider' => $result3, 'events' => $result, 'news' => $result1, 'gallery' => $result6);
	$success = array('status'=> true, "Error" => "home screens",'responce' => $result2);
	$this->response($this->json($success), 200);   
	
}	
///
		
public function fetch_event() {
              include_once("common/global.inc.php");
        global $link;
                     
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		$event_id=$this->_request['event_id'];
		$user_id=$this->_request['user_id'];
		$role_id=$this->_request['role_id'];

		$event_sql_id = $this->db->prepare("SELECT * FROM gallery where event_news_id='".$event_id."' AND category_id='4'");
		$event_sql_id->execute();
		$event_sql_id1 = $event_sql_id->fetch(PDO::FETCH_ASSOC);

		if(!empty($event_sql_id1))
		{
		$event_sql_id2=$event_sql_id1['id'];	
     $isgallery=true;
		}
		else{
			$event_sql_id2='';
     $isgallery=false;
		}

        $event_sql = $this->db->prepare("SELECT * FROM event where id='".$event_id."' ");
		$event_sql->execute();
			if($event_sql->rowCount()>0)
			{
			$row_event = $event_sql->fetch(PDO::FETCH_ASSOC);

			$event_folder_name1='event';
			$event_folder_name2=$event_folder_name1.$row_event['id'];

			
                if(!empty($row_event['image'])){
					$row_event['image']= $site_url."event/".$event_folder_name2."/".$row_event['image'];
					}else{
						 $row_event['image'] = "";
					}
					
									
$timestamp=$row_event['date_from'];
$dt=str_replace('-', '', $timestamp);
$event_time=$row_event['time'];
$newDateTime = date('h:i', strtotime($event_time));
$npm = date('A', strtotime($event_time));
$tm=str_replace(':', '', $newDateTime);
$exact_trim=$dt.$tm;
$datetime = DateTime::createFromFormat('YmdHi', $exact_trim);
$ed=$datetime->format('d');
$edd=$datetime->format('D');
$em=$datetime->format('M');
$emm=$datetime->format('m');

$x_emm=$emm-1;

$ey=$datetime->format('Y');
$eh=$datetime->format('H');
$ei=$datetime->format('i');

$coma=', ';
$space=' ';
$tabb='-';

$date_text_from=$edd.$space.$em.$coma.$ey;
$timestamp1=$row_event['date_to'];
$dt1=str_replace('-', '', $timestamp1);

$datetime1 = DateTime::createFromFormat('Ymd', $dt1);
$ed1=$datetime1->format('d');
$edd1=$datetime1->format('D');
$em1=$datetime1->format('M');
$emm1=$datetime1->format('m');
$x_emm1=$emm1-1;
$ey1=$datetime1->format('Y');


$date_text_to=$edd1.$space.$em1.$coma.$ey1;
$date_text=$date_text_from.$tabb.$date_text_to;

			            
			$result1 = array('id' => $row_event['id'],
					'title' => $row_event['title'],
                    'discription' => $row_event['description'],
                    'date_from'=> $row_event['date_from'],       /*c*/
                    'date_to'=> $row_event['date_to'],
                    'event_pic'=>$row_event['image'],
                    'gallery_id' => $event_sql_id2,
					'isgallery' => $isgallery,
					'event_time' => $row_event['time'],
					'location' => $row_event['location'],
					'shareable'=> $row_event['shareable'],
                    'date_time' => '',
					'date_text' => $date_text
					);
					
					
					
				$event_details_sql = $this->db->prepare("SELECT * FROM event_details where event_id='".$event_id."' ");
				$event_details_sql->execute();
				if($event_details_sql->rowCount()>0)
				{
				$event_details = $event_details_sql->fetchALL(PDO::FETCH_ASSOC);
				
				foreach($event_details as $event_details_data)
				{
					 $event_details_id=$event_details_data['id'];
				
$exist_sql = $this->db->prepare("SELECT * FROM add_to_calendar where user_id='".$user_id."' AND event_id='".$event_details_id."' AND role_id='".$role_id."'");
				$exist_sql->execute();
				$exist_sql1 = $exist_sql->fetch(PDO::FETCH_ASSOC);
				
				if($exist_sql->rowCount()>0)
				{
					$event_exist=true;
				}
				else{
					$event_exist=false;
				}

					
						$timestamp=$event_details_data['date'];
$dt=str_replace('-', '', $timestamp);
$event_time=$event_details_data['time'];
$newDateTime = date('h:i', strtotime($event_time));
$npm = date('A', strtotime($event_time));
$tm=str_replace(':', '', $newDateTime);
$exact_trim=$dt.$tm;
$datetime = DateTime::createFromFormat('YmdHi', $exact_trim);
$ed=$datetime->format('d');
$edd=$datetime->format('D');
$em=$datetime->format('M');
$emm=$datetime->format('m');
$x_emm=$emm-1;
$ey=$datetime->format('Y');
$eh=$datetime->format('H');
$ei=$datetime->format('i');
$date_time=array('date' => $ed,
'day' => $edd,
'month' => $em,
'month_id' => $x_emm,
'year' => $ey,
'H' => $eh,
'I' => $ei,
'A' => $npm);
					
                    $result[]= array('event_id' => $event_details_data['id'],
					'name' => $event_details_data['name'],
                    'time' => $event_details_data['time'],
                    'date'=> $event_details_data['date'],
					'date_time' => $date_time,
                    'event_tag' =>$event_exist
					);
				}
				
			$success = array('status'=> true, "Error" => "your Event",'fetch_event' => $result1, 'fetch_event_details' => $result);
			$this->response($this->json($success), 200);
            }
}
		else{
			$error = array('status' => false, "Error" => "Try again",'Responce' => '');
			$this->response($this->json($error), 200);
		}
		}		

///////////////event_calender////////////////
public function event_calender() {
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
        $event_date=$this->_request['event_date'];
       
		$evn_cal = $this->db->prepare("SELECT * FROM event WHERE event_date='".$event_date."'");
			 $evn_cal->execute();
             $row_evn1 = $evn_cal->fetchALL(PDO::FETCH_ASSOC);
            
				if($evn_cal->rowCount()>0)
			{
                foreach( $row_evn1 as  $row_evn)
                {
			$result[] = array('id' => $row_evn['id'],
					'title' => $row_evn['title'],
                    'discription' => $row_evn['discription'],
                    'event_date' => $row_evn['event_date'],
					'event_time' => $row_evn['event_time']
            		);
                }
		    $success = array('status'=> true, "Error" => "Event Date",'event_calender' => $result  );
			$this->response($this->json($success), 200);
		}    
		else{
			$error = array('status' => false, "Error" => "Try again",'Responce' => '');
			$this->response($this->json($error), 200);
		}
}
//////////////////////
////////news//////////
public function news() {
              include_once("common/global.inc.php");
        global $link;
                     
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		        $limit=1;
$limit_start=$this->_request['start'];
				
        $news_sql = $this->db->prepare("SELECT * FROM news where flag=0 order by id DESC LIMIT $limit_start , $limit ");

		$news_sql->execute();
				if($news_sql->rowCount()>0)
			{
			$news_fsql = $news_sql->fetchALL(PDO::FETCH_ASSOC);
			foreach($news_fsql as $row_news)
            {
				$news_id=$row_news['id'];
                $news_folder_name1='news';
				$news_folder_name2=$news_folder_name1.$news_id;
				
                if(!empty($row_news['featured_image'])){
					$row_news['featured_image']= $site_url."news/".$news_folder_name2."/".$row_news['featured_image'];

					}else{
						 $row_news['featured_image'] = "";
					}
					
					
$timestamp=$row_news['date'];
$dt=str_replace('-', '', $timestamp);
$exact_trim=$dt;
$datetime = DateTime::createFromFormat('Ymd', $exact_trim);
$ed=$datetime->format('d');
$edd=$datetime->format('D');
$em=$datetime->format('M');
$ey=$datetime->format('Y');

$date_time=array('date' => $ed,
'day' => $edd,
'month' => $em,
'year' => $ey,
);
					
                
			$result[] = array('id' => $row_news['id'],
					'news_title' => $row_news['title'],
					'news_sub_description'=>$row_news['description'],
                    'news_details' => $row_news['description'],
                    'news_date'=> $row_news['date'],
                    'news_pic'=>$row_news['featured_image'],
					'news_location'=>'',
					'date_time'=>$date_time
					);
            }
                               if(!empty($result))
				{
					 $kkr=$result;
				}
				else
				{
					$kkr=array();
				}
			$success = array('status'=> true, "Error" => "news",'news' => $kkr);
			$this->response($this->json($success), 200);
            }
		else{
			$error = array('status' => false, "Error" => "Try again",'Responce' => '');
			$this->response($this->json($error), 200);
		}
		}
		///
	
public function fetch_news() {
              include_once("common/global.inc.php");
        global $link;
                     
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		        $news_id=$this->_request['news_id'];
			$nws_sql_id = $this->db->prepare("SELECT * FROM gallery where event_news_id='".$news_id."' AND category_id='2'");
		$nws_sql_id->execute();
		$nws_sql_id1 = $nws_sql_id->fetch(PDO::FETCH_ASSOC);
	if(!empty($nws_sql_id1))
		{
		$nws_sql_id2=$nws_sql_id1['id'];	
		}
		else{
			$nws_sql_id2='';
		}
				
        $news_sql = $this->db->prepare("SELECT * FROM news where id='".$news_id."'");
		$news_sql->execute();
				if($news_sql->rowCount()>0)
			{
			$row_news = $news_sql->fetch(PDO::FETCH_ASSOC);
			
			$news_folder_name1='news';
			$news_folder_name2=$news_folder_name1.$news_id;
			 
                if(!empty($row_news['featured_image'])){
						$row_news['featured_image']= $site_url."news/".$news_folder_name2."/".$row_news['featured_image'];
					}else{
						 $row_news['featured_image'] = "";
					}
					
									
$timestamp=$row_news['date'];
$dt=str_replace('-', '', $timestamp);
$exact_trim=$dt;
$datetime = DateTime::createFromFormat('Ymd', $exact_trim);
$ed=$datetime->format('d');
$edd=$datetime->format('D');
$em=$datetime->format('M');
$ey=$datetime->format('Y');

$date_time=array('date' => $ed,
'day' => $edd,
'month' => $em,
'year' => $ey,
);
                
			$result = array('id' => $row_news['id'],
					'news_title' => $row_news['title'],
					'news_sub_description'=>$row_news['description'],
                    'news_details' => $row_news['description'],
                    'news_date'=> $row_news['date'],
                    'news_pic'=>$row_news['featured_image'],
					'gallery_id'=>$nws_sql_id2,
					'news_location'=>'',
					'date_time'=>$date_time
					);
			$success = array('status'=> true, "Error" => "news",'fetch_news' => $result);
			$this->response($this->json($success), 200);
            }
		else{
			$error = array('status' => false, "Error" => "Try again",'Responce' => '');
			$this->response($this->json($error), 200);
		}
		}
	
	//////////////


public function inquiry_form(){
		
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		
		$user_id = $this->_request['user_id'];
		$name = $this->_request['name'];
		$email = $this->_request['email'];
		$role_id = $this->_request['role_id'];
		$study= $this->_request['study'];
		$address = $this->_request['address'];
		$mobile_no = $this->_request['mobile_no'];
		$query = $this->_request['query'];
        $curent_date = date("Y-m-d");
		
		if(!empty($user_id))
		{
		$sql_insert = $this->db->prepare("INSERT into inquiry_form(user_id,role_id,name,email,study,address,mobile_no,query,curent_date)
				VALUES(:user_id,:role_id,:name,:email,:study,:address,:mobile_no,:query,:curent_date)");
				
				$sql_insert->bindParam(":user_id", $user_id, PDO::PARAM_STR);
                $sql_insert->bindParam(":role_id", $role_id, PDO::PARAM_STR);				
                $sql_insert->bindParam(":name", $name, PDO::PARAM_STR);
				$sql_insert->bindParam(":email", $email, PDO::PARAM_STR);
                $sql_insert->bindParam(":study", $study, PDO::PARAM_STR);
				$sql_insert->bindParam("address", $address, PDO::PARAM_STR);
				$sql_insert->bindParam("mobile_no", $mobile_no, PDO::PARAM_STR);
				$sql_insert->bindParam("query", $query, PDO::PARAM_STR);
				$sql_insert->bindParam("curent_date", $curent_date, PDO::PARAM_STR);
                $sql_insert->execute();
             
                $success = array('status'=> true, "Error" => "Thank you your message updated successfully");
                   $this->response($this->json($success), 200);
				   
		}
		else{
			$error = array('status' => false, "Error" => "Try again");
			$this->response($this->json($error), 200);
		}
				 
}
/////
public function contact_us(){
		
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		 $select_id = $this->_request['select_id'];
		$subject = $this->_request['subject'];
		$message= $this->_request['message'];
		$login_id = $this->_request['login_id'];
        $date = date("Y-m-d");

		$sql_insert = $this->db->prepare("INSERT into contact_us(admin_id,subject,message,login_id,date)
				VALUES(:admin_id,:subject,:message,:login_id,:date)");
																			
																			
                $sql_insert->bindParam(":admin_id", $select_id, PDO::PARAM_STR);
				$sql_insert->bindParam(":subject", $subject, PDO::PARAM_STR);
                $sql_insert->bindParam(":message", $message, PDO::PARAM_STR);
				$sql_insert->bindParam("login_id", $login_id, PDO::PARAM_STR);
				$sql_insert->bindParam("date", $date, PDO::PARAM_STR);
                $sql_insert->execute();
             
                $success = array('status'=> true, "Error" => "Thank you your message updated successfully");
                   $this->response($this->json($success), 200);
				 
}
///category//////
public function category() {
              include_once("common/global.inc.php");
        global $link;
                     
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
        $cate_sql = $this->db->prepare("SELECT * FROM category");
		$cate_sql->execute();
			 
				if($cate_sql->rowCount()>0)
			{
			$cate_fet= $cate_sql->fetchALL(PDO::FETCH_ASSOC);
            foreach($cate_fet as $row_category)
            {
			$result[] = array('category_id' => $row_category['category_id'],
			'category' => $row_category['category']
					);
            }
			$success = array('status'=> true, "Error" => "",'category' => $result);
			$this->response($this->json($success), 200);
            }
		else{
			$error = array('status' => false, "Error" => "Try again",'Responce' => '');
			$this->response($this->json($error), 200);
		}
		}

///////////////////////gallery//////

public function gallery() {
              include_once("common/global.inc.php");
        global $link;
                     
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		$limit=1;
				$limit_start=$this->_request['start'];

        $gallery_sql = $this->db->prepare("SELECT * FROM gallery order by id DESC LIMIT $limit_start , $limit");
		$gallery_sql->execute();
			 
				if($gallery_sql->rowCount()>0)
			{
			$gallery_fet = $gallery_sql->fetchALL(PDO::FETCH_ASSOC);
			   
            foreach($gallery_fet as $row_gallery1)
            {
				$id=$row_gallery1['id'];
				$event_id=$row_gallery1['event_news_id'];
                $type=$row_gallery1['category_id'];
				
				
				if($type==4)
				{
				 $ef_sql = $this->db->prepare("SELECT * FROM event where id='".$event_id."'");
				$ef_sql->execute();
				$efc_sql = $ef_sql->fetch(PDO::FETCH_ASSOC);
				
				$event_folder_name1='event';
                $event_folder_name2=$event_folder_name1.$event_id;

                                     if(!empty($efc_sql['image'])){
						 	$efc_sql['image']= $site_url."event/".$event_folder_name2."/".$efc_sql['image'];

					}else{
						 $efc_sql['image'] = "";
					}
					$nnnid = $efc_sql['id'];
					$edate = $efc_sql['date'];
					$title = $efc_sql['title'];
					$pic = $efc_sql['image'];
					

		        $f_sql = $this->db->prepare("SELECT * FROM sub_gallery where gallery_id='".$id."' order by id DESC");
				$f_sql->execute();
				$fc_sql = $f_sql->fetchALL(PDO::FETCH_ASSOC);
                                $src= $f_sql->rowCount();
				
				foreach($fc_sql as $row_gallery)
				{
                if(!empty($row_gallery['gallery_pic'])){
						$row_gallery['gallery_pic']= $site_url."event/".$event_folder_name2."/".$row_gallery['gallery_pic'];
					}else{
						 $row_gallery['gallery_pic'] = "";
					}
                    $result[] = array(
					'gallery' => $row_gallery['gallery_pic']
					
					);
                }

                           if(!empty($result))
				{
					 $kkr=$result;
				}
				else
				{
					$kkr=array();
				}
				
				
			}
			else if($type==5){	 
			$ef_sql = $this->db->prepare("SELECT * FROM news where id='".$event_id."'");
				$ef_sql->execute();
				$efc_sql = $ef_sql->fetch(PDO::FETCH_ASSOC);
				
				$news_folder_name1='news';
                $news_folder_name2=$news_folder_name1.$event_id;

                                     if(!empty($efc_sql['featured_image'])){
						 	$efc_sql['featured_image']= $site_url."news/".$news_folder_name2."/".$efc_sql['featured_image'];
					}else{
						 $efc_sql['featured_image'] = "";
						 
					}
					
					$nnid = $efc_sql['id'];
					$edate = $efc_sql['date'];
					$title = $efc_sql['title'];
					$pic = $efc_sql['featured_image'];
					
					
					
		        $f_sql = $this->db->prepare("SELECT * FROM sub_gallery where gallery_id='".$id."' order by id DESC");
				$f_sql->execute();
				$fc_sql = $f_sql->fetchALL(PDO::FETCH_ASSOC);
                                $src= $f_sql->rowCount();
				
				foreach($fc_sql as $row_gallery)
				{
                if(!empty($row_gallery['gallery_pic'])){
						 $row_gallery['gallery_pic']= $site_url."news/".$news_folder_name2."/".$row_gallery['gallery_pic'];
					}else{
						 $row_gallery['gallery_pic'] = "";
					}
                    $result[] = array(
					'gallery' => $row_gallery['gallery_pic']
					);
                }

                           if(!empty($result))
				{
					 $kkr=$result;
				}
				else
				{
					$kkr=array();
				}
			}


				
				$result1[]= array('id' => $id,
				'event_date' =>$edate,
				'title' =>$title,
				'event_pic' =>$pic,
                'total_row' =>$src,
				'gallery_pic' =>$kkr,
					);

					unset($result);
 		}
 			$success = array('status'=> true, "Error" => "your gallery",'gallery' => $result1);
			$this->response($this->json($success), 200);
           }
		else{
			$error = array('status' => false, "Error" => "Try again",'Responce' => '');
			$this->response($this->json($error), 200);
		}
		}


/////

public function fetch_add_to_calendar(){
		
 include_once("common/global.inc.php");
        global $link;
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
			$user_id = $this->_request['user_id'];
			$role_id = $this->_request['role_id'];
			$date = date("Y-m-d");
			$cate_sql = $this->db->prepare("SELECT * FROM add_to_calendar where user_id='".$user_id."' AND role_id='".$role_id."' group by event_date");
			$cate_sql->execute();
				if($cate_sql->rowCount()>0)
				{
			$f_calander = $cate_sql->fetchALL(PDO::FETCH_ASSOC);
			foreach($f_calander as $f_calander1)
			{
				$c_event_date[]=$f_calander1['event_date'];
				
			}
			$my_date=array_unique($c_event_date);	
//unset($c_event_date);
foreach($my_date as $my_x_date)
{
			$timestamp1=$my_x_date;
			$dt1=str_replace('-', '', $timestamp1);
			$exact_trim1=$dt1;
			$datetime1 = DateTime::createFromFormat('Ymd', $exact_trim1);
			$ed=$datetime1->format('d');
			$edd=$datetime1->format('D');
			$em=$datetime1->format('M');
			$ey=$datetime1->format('Y');
			$date_time1=array('date' => $ed,
			'day' => $edd,
			'month' => $em,
			'year' => $ey,
			);

	
	$my_cate_sql = $this->db->prepare("SELECT * FROM add_to_calendar where role_id='".$role_id."' AND user_id='".$user_id."' AND event_date='".$my_x_date."' order by id DESC");
			$my_cate_sql->execute();
			$my_cate_sql1 = $my_cate_sql->fetchALL(PDO::FETCH_ASSOC);
			
			
			foreach($my_cate_sql1 as $row_event)
			{
				$c_event_id=$row_event['event_id'];
				$actual_event_id=$row_event['parent_event_id'];
								
     			$event_sql_id = $this->db->prepare("SELECT * FROM gallery where event_news_id='".$actual_event_id."' AND category_id='4'");
				$event_sql_id->execute();
				$event_sql_id1 = $event_sql_id->fetch(PDO::FETCH_ASSOC);
				if(!empty($event_sql_id1))
				{
				$event_sql_id2=$event_sql_id1['id'];	
				}
				else{
				$event_sql_id2='';
				}			
				
				$event_sql = $this->db->prepare("SELECT * FROM event where id='".$actual_event_id."' ");
		        $event_sql->execute();
			    $row_events = $event_sql->fetch(PDO::FETCH_ASSOC);
				$event_folder_name1='event';
                $event_folder_name2=$event_folder_name1.$row_events['id'];
                if(!empty($row_events['image'])){
						 $row_events['image']= $site_url."event/".$event_folder_name2."/".$row_events['image'];
					}else{
						 $row_events['image'] = "";
					}
					
					$eventd_sql = $this->db->prepare("SELECT * FROM event_details where id='".$c_event_id."' ");
		        $eventd_sql->execute();
			    $eventd_sqls = $eventd_sql->fetch(PDO::FETCH_ASSOC);
					
	                $timestamp=$eventd_sqls['date'];
					$dt=str_replace('-', '', $timestamp);
					$event_time=$row_event['time'];
					$newDateTime = date('h:i', strtotime($event_time));
					$npm = date('A', strtotime($event_time));
					$tm=str_replace(':', '', $newDateTime);
					$exact_trim=$dt.$tm;
					$datetime = DateTime::createFromFormat('YmdHi', $exact_trim);
					$ed=$datetime->format('d');
					$edd=$datetime->format('D');
					$em=$datetime->format('M');
					$ey=$datetime->format('Y');
					$eh=$datetime->format('H');
					$ei=$datetime->format('i');
					$date_time=array('date' => $ed,
					'day' => $edd,
					'month' => $em,
					'year' => $ey,
					'H' => $eh,
					'I' => $ei,
					'A' => $npm);

			$result1[]= array('event_id' => $eventd_sqls['id'],
			'user_id' => $user_id,
					'title' => $eventd_sqls['name'],
                    'discription' => '',
					'details' => '',
                    'event_date'=> $eventd_sqls['date'],
                    'current_date'=> '',
                    'event_pic'=>$row_events['image'],
					'event_time' => $eventd_sqls['time'],
					'gallery_id' => $event_sql_id2,
					'location' => ''
					//'date_time' => $date_time
				);		
			}
			
			$result[]= array('date_time' => $date_time1,
					'add_event' => $result1
				);		
				unset($result1);	
}


			
				$success = array('status'=> true, "Error" => "Your selected events.",'Responce' => $result);
                $this->response($this->json($success), 200);
                }
				else{
					$error = array('status' => false, "Error" => "No, You have not added any event.",'Responce' => $result[]=array());
			     $this->response($this->json($error), 200);
				}
}
////

public function fetch_gallery() {
              include_once("common/global.inc.php");
        global $link;
            if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		$limit=1;
				$gallery_id=$this->_request['gallery_id'];
				
				$e_sql = $this->db->prepare("SELECT * FROM gallery where id='".$gallery_id."'");
				$e_sql->execute();
				$event_sql = $e_sql->fetch(PDO::FETCH_ASSOC);
				$g_event_news_id=$event_sql['event_news_id'];
				$category_id=$event_sql['category_id'];
				
				if($category_id==4)
				{
					$e_folder_name1='event';
					$e_folder_name2=$e_folder_name1.$g_event_news_id;
				}
				else if($category_id==5)
				{
					$e_folder_name1='news';
					$e_folder_name2=$e_folder_name1.$g_event_news_id;
				}
				$sls='/';
				
		        $f_sql = $this->db->prepare("SELECT * FROM sub_gallery where gallery_id='".$gallery_id."' order by id DESC");
				$f_sql->execute();
				$fc_sql = $f_sql->fetchALL(PDO::FETCH_ASSOC);
                //$src= $f_sql->rowCount();
				if($f_sql->rowCount()>0)
				{
				foreach($fc_sql as $row_gallery)
				{
					
					
                if(!empty($row_gallery['gallery_pic'])){
						 $row_gallery['gallery_pic']= $site_url.$e_folder_name1.$sls.$e_folder_name2.$sls.$row_gallery['gallery_pic'];///////////////////nilc
					}else{
						 $row_gallery['gallery_pic'] = "";
					}
                    $result[] = array(
					'gallery' => $row_gallery['gallery_pic']
					);
                }

					if(!empty($result))
					{
					$kkr=$result;
					}
					else
					{
					$kkr=array();
					}


 			$success = array('status'=> true, "Error" => "gallery data",'gallery' => $kkr);
			$this->response($this->json($success), 200);
           }
		else{
			$error = array('status' => false, "Error" => "no data found",'Responce' => '');
			$this->response($this->json($error), 200);
		}
		}
//////

	public function acedmic_calendar() {
		include_once("common/global.inc.php");
		global $link;
		
		if ($this->get_request_method() != "POST") {
			$this->response('', 406);
		}
		$currnt=date('Y');
		$nextyear=$currnt+1;
		$yearArray=array();
		$y=0;
		for($x=$currnt;$x<=$nextyear; $x++)
		{	$y++;
			for($c=1;$c<=12; $c++)
			{
				$first_date=date('Y-m-d', strtotime($x.'-'.$c.'-01'));
			    $last_date=date('Y-m-t', strtotime($x.'-'.$c.'-01'));  
						
				$currentTime=strtotime($first_date);
				$endTime=strtotime($last_date);
				//---
				$k=0;
				$results = array();
				while ($currentTime <= $endTime) {
					if (date('N', $currentTime) < 8) {
						$results[] = date('Y-m-d', $currentTime);
					}
					$currentTime = strtotime('+1 day', $currentTime);
				}
				unset($timestamp);
				foreach($results as $value)
				{
					$timestamp[]=$value;
				}
				
				$fff=array_unique($timestamp);
				unset($timestamp);
				$result=array();
				foreach($fff as $cal_ex11)
				{
					$dt=str_replace('-', '', $cal_ex11);
					$exact_trim=$dt;
					$datetime = DateTime::createFromFormat('Ymd', $exact_trim);
					$ed=$datetime->format('d');
					$edd=$datetime->format('D');
					$em=$datetime->format('M');
					$ey=$datetime->format('Y');

					$cal_c = $this->db->prepare("SELECT * FROM acedmic_calendar where date='".$cal_ex11."'");
					$cal_c->execute();
					if($cal_c->rowCount()>0)
					{
						$cal_c1= $cal_c->fetchALL(PDO::FETCH_ASSOC);
						foreach($cal_c1 as $cal_c11)
						{
							$category_id= $cal_c11['category_id'];
							$cat_type = $this->db->prepare("SELECT * FROM master_category where id='".$category_id."'");
							$cat_type->execute();
							$cat_type1= $cat_type->fetch(PDO::FETCH_ASSOC);
							
							$result_c[] = array(
								'id' => $cal_c11['id'],
								'name' => $cal_c11['description'],
								'type' => $cat_type1['category_name'],
								'date' => $cal_c11['date'],
								'time' =>' '
							);
						}
					}
					else
					{
						$fullday='';
						if($edd=='Sun'){$fullday='Sunday';} 
							$result_c[] = array(
								'id' => 0,
								'name' => '',
								'type' => $fullday,
								'date' => $cal_ex11,
								'time' =>''
							);
					}
					$result[] =array('date' => $ed,
						'day' => $edd,
						'month' => $em,
						'year' => $ey,
						'event'=>$result_c);
					unset($result_c);
				}
				unset($timestamp);
				$result1[] = array('month_id' => $c, 'year'=>$ey,
				'data' => $result);
				unset($result);
			}
 		
 			$yearArray[]=array('year'=> $x,'monthdata'=> $result1);
			unset($result1);
			}
 		$success = array('status'=> true, "Error" => "All records",'acedmic_calendar' => $yearArray);
		$this->response($this->json($success), 200);
 }

////

public function add_to_calendar(){
		
			if ($this->get_request_method() != "POST") {
				$this->response('', 406);
			}
			$user_id = $this->_request['user_id'];
			$role_id = $this->_request['role_id'];
			$event_id = $this->_request['event_id'];
			$option = $this->_request['option'];
			$date = date("Y-m-d");
			$cate_sql = $this->db->prepare("SELECT * FROM add_to_calendar where user_id='".$user_id."' AND event_id='".$event_id."' AND role_id='".$role_id."'");
					$cate_sql->execute();
					if($cate_sql->rowCount()==0 && $option=='add')
					{
                        $s_e_sql = $this->db->prepare("SELECT * FROM event_details where id='".$event_id."'");
					    $s_e_sql->execute();
						$s_e_sql1 = $s_e_sql->fetch(PDO::FETCH_ASSOC);
						$e_date=$s_e_sql1['date'];
						$actual_e_id=$s_e_sql1['event_id'];

		        $sql_insert = $this->db->prepare("INSERT into add_to_calendar(event_id,user_id,curent_date,event_date,role_id,parent_event_id)
				VALUES(:event_id,:user_id,:curent_date,:event_date,:role_id,:parent_event_id)");
                $sql_insert->bindParam(":event_id", $event_id, PDO::PARAM_STR);
				$sql_insert->bindParam(":user_id", $user_id, PDO::PARAM_STR);
				$sql_insert->bindParam("curent_date", $date, PDO::PARAM_STR);
                $sql_insert->bindParam("event_date", $e_date, PDO::PARAM_STR);
				$sql_insert->bindParam("role_id", $role_id, PDO::PARAM_STR);
				$sql_insert->bindParam("parent_event_id", $actual_e_id, PDO::PARAM_STR);
                $sql_insert->execute();
				$success = array('status'=> true, "Error" => "Event added successfully", "isadded" => true);
                $this->response($this->json($success), 200);
				}
				else if($cate_sql->rowCount()==1 && $option=='remove')
				{
					$sql_d = $this->db->prepare("DELETE from add_to_calendar where user_id='".$user_id."' AND event_id='".$event_id."' AND role_id='".$role_id."' ");
					$sql_d->execute();
					$success = array('status'=> true, "Error" => "Event remove successfully", "isadded" => false);
					$this->response($this->json($success), 200);
				}
				else
				{
					$error = array('status' => false, "Error" => "Try again",'Responce' => '');
					$this->response($this->json($error), 200);
				}

}
/////
public function fetch_class_section()
{
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		$class_sql = $this->db->prepare("SELECT * FROM master_class where `flag`=0 ");
		$class_sql->execute();
		$class_sqls = $class_sql->fetchALL(PDO::FETCH_ASSOC);
		
	foreach($class_sqls as $class_sql_data)
	{
		$cid=$class_sql_data['id'];
		$class_name=$class_sql_data['class_name'];
		
		$devide_sql = $this->db->prepare("SELECT * FROM class_section where class_id='".$cid."'  ");
		$devide_sql->execute();
		$devide_sqls = $devide_sql->fetchALL(PDO::FETCH_ASSOC);
		
		foreach($devide_sqls as $devide_sqls_data)
	        {
		$did=$devide_sqls_data['id'];
		$sid=$devide_sqls_data['section_id'];
		$section_name_sql = $this->db->prepare("SELECT * FROM master_section where id='".$sid."'");
		$section_name_sql->execute();
		$section_name_sql = $section_name_sql->fetch(PDO::FETCH_ASSOC);
		$section_name=$section_name_sql['section_name'];
		
		
		$student_sql = $this->db->prepare("SELECT * FROM login where class_id='".$cid."' AND section_id='".$sid."' && `flag`=0 ");
		$student_sql->execute();
		$student_sqls = $student_sql->fetchALL(PDO::FETCH_ASSOC);
		
		
	
		foreach($student_sqls as $student_sqls_data)
	{
		$stid=$student_sqls_data['id'];
		$st_name=$student_sqls_data['name'];
		
		$student[] = array(
			'student_id' => $student_sqls_data['id'],
			'student_name' => $student_sqls_data['name']);
	}		
	if(!empty($student))
	{
		$sd=$student;
	}
	else{
		$sd=[];
	}
	
		//---- SUBJECT MAPPING
				$subMap = $this->db->prepare("SELECT * FROM subject_mapping where class_id='".$cid."' AND section_id='".$sid."'");
				$subMap->execute();
				$DataSubMap = $subMap->fetchALL(PDO::FETCH_ASSOC);
				$subject_map=array();
				 foreach($DataSubMap as $data)
				 {
					$subject_ids=$data['subject_id'];
					$exploadeSub=explode(',',$subject_ids);
					$x=0;
					foreach($exploadeSub as $onebyone)
					{
						$onebyone;
						$subMap1 = $this->db->prepare("SELECT * FROM master_subject where id='".$onebyone."'");
						$subMap1->execute();
						$DataSubMap1 = $subMap1->fetchALL(PDO::FETCH_ASSOC);
						$sub_name=$DataSubMap1[0]['subject_name'];
						$subject_map[$x]['subject_id']=$onebyone;
						$subject_map[$x]['subject_name']=$sub_name;
						$x++;
					}
				 }
				//-----END	
							
				//($subject_ids); exit;
				
					$section[] = array(
					'section_id' => $sid,
					'section_name' => $section_name,
					'student' => $sd,
					'assign_subject' => $subject_map);
					unset($student);
					unset($subject_map);
	}
	if(!empty($section))
	{
		$d=$section;
	}
	else{
		$d=[];
	}
					$result[] = array('class_id' => $cid,
					'class_name' => $class_name,
					'section' => $d);
					unset($section);
	}
			$success = array('status'=> true, "Error" => "All records",'class_section_roles' => $result);
			$this->response($this->json($success), 200);
}
////
public function assignment()
	{
		if ($this->get_request_method() != "POST") {
             $this->response('', 406);
           }
		   
		$assignment_type = $this->_request['assignment_type'];
		$user_id = $this->_request['user_id'];
		$class_id = $this->_request['class_id'];
		$section_id = $this->_request['section_id'];
 		
		@$student_id = $this->_request['student_id'];
		$subject_id= $this->_request['subject_id'];
		$topic = $this->_request['topic'];
		$description = $this->_request['description'];		
		@$tmpname = $_FILES['file']['tmp_name'];
		@$filename =$_FILES["file"]["name"];
		$time=time();
		@$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$targetPath=@$topic.$time.'.'.$ext;
 		move_uploaded_file($tmpname, dirname(__FILE__)."/../assignment/".$topic.$time.'.'.$ext);
		$submission_date = $this->_request['submission_date'];
		$curent_date = date("Y-m-d");

		if($assignment_type=='class_wise')
		{
			$section_ids=sizeof($section_id);
			$s_id=0;
			for($i=0; $i<$section_ids; $i++)
			{
				$sid=$section_id[$i];
				$sql_insert = $this->db->prepare("INSERT into assignment(user_id,class_id,section_id,subject_id,topic,description,submission_date,curent_date,file)
					VALUES(:user_id,:class_id,:section_id,:subject_id,:topic,:description,:submission_date,:curent_date,:file)");
					
					$sql_insert->bindParam(":user_id", $user_id, PDO::PARAM_STR);
					$sql_insert->bindParam(":class_id", $class_id, PDO::PARAM_STR);				
					$sql_insert->bindParam(":section_id", $sid, PDO::PARAM_STR);
					$sql_insert->bindParam(":subject_id", $subject_id, PDO::PARAM_STR);
					$sql_insert->bindParam(":topic", $topic, PDO::PARAM_STR);
					$sql_insert->bindParam(":description", $description, PDO::PARAM_STR);
					$sql_insert->bindParam(":submission_date", $submission_date, PDO::PARAM_STR);
					$sql_insert->bindParam(":curent_date", $curent_date, PDO::PARAM_STR);
					$sql_insert->bindParam(":file", $targetPath, PDO::PARAM_STR);
					$sql_insert->execute();
					$insert_id = $this->db->lastInsertId();
					//--
					$std_nm = $this->db->prepare("SELECT `device_token`,`notification_key`,`id`,`role_id` FROM `login` where section_id='".$sid."' AND  class_id='".$class_id."' AND device_token != '' ");
					$std_nm->execute();
					while($ftc_nm= $std_nm->fetch(PDO::FETCH_ASSOC))
					{
						$device_token = $ftc_nm['device_token'];
						$notification_key = $ftc_nm['notification_key'];
						$user_ids=$ftc_nm['id'];
						$role_id=$ftc_nm['role_id'];
						
						$message='New Assignment Submitted';
						$title='Assignment';
						$submitted_by=$user_id;
						$user_idss=$user_ids;
						$date=date("M d Y");
						$time=date("h:i A");
						 
						$msg = array
						(
							'title'=> $title ,
							'message' 	=> $message,
							'button_text'	=> 'View',
							'link'	=> 'notice://Assignment?id='.$insert_id.'&student_id='.$user_idss,
							'notification_id'	=> $insert_id,
						);
						$url = 'https://fcm.googleapis.com/fcm/send';
						$fields = array
						(
							'registration_ids' 	=> array($device_token),
							'data'			=> $msg
						);
						$headers = array
						(
							'Authorization: key=' .$notification_key,
							'Content-Type: application/json'
						);
						$link='notice://Assignment?id='.$insert_id.'&student_id='.$user_idss;
						//--- NOTIFICATIO INSERT
							$NOTY_insert = $this->db->prepare("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id,link)VALUES(:title,:message,:user_id,:submitted_by,:date,:time,:role_id,:link)");
							$NOTY_insert->bindParam(":link", $link, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":title", $title, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":message", $message, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":user_id", $user_idss, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":submitted_by", $submitted_by, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":time", $time, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":date", $date, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":role_id", $role_id, PDO::PARAM_STR);
							$NOTY_insert->execute();	
						//-- END
						
							json_encode($fields);
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, $url);
							curl_setopt($ch, CURLOPT_POST, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
							curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
							$result = curl_exec($ch);
							curl_close($ch);
					}
			}
                $success = array('status'=> true, "Error" => "Thank you your assignment updated successfully");
                $this->response($this->json($success), 200);
		}
		else if($assignment_type=='student_wise')
		{
			$student_ids=sizeof($student_id);
			$student_implode=implode(',', $student_id);
			$sql_insert = $this->db->prepare("INSERT into assignment(user_id,class_id,section_id,subject_id,topic,student_id,description,submission_date,curent_date,file)
				VALUES(:user_id,:class_id,:section_id,:subject_id,:topic,:student_id,:description,:submission_date,:curent_date,:file)");

				$sql_insert->bindParam(":user_id", $user_id, PDO::PARAM_STR);
                $sql_insert->bindParam(":class_id", $class_id, PDO::PARAM_STR);				
                $sql_insert->bindParam(":section_id", $section_id, PDO::PARAM_STR);
				$sql_insert->bindParam(":subject_id", $subject_id, PDO::PARAM_STR);
				$sql_insert->bindParam(":topic", $topic, PDO::PARAM_STR);
				$sql_insert->bindParam(":student_id", $student_implode, PDO::PARAM_STR);
                $sql_insert->bindParam(":description", $description, PDO::PARAM_STR);
				$sql_insert->bindParam(":submission_date", $submission_date, PDO::PARAM_STR);
				$sql_insert->bindParam(":curent_date", $curent_date, PDO::PARAM_STR);
				$sql_insert->bindParam(":file", $targetPath, PDO::PARAM_STR);
                $sql_insert->execute();
				$insert_id = $this->db->lastInsertId();
				//--
				$st_id=0;
				for($i=0; $i<$student_ids; $i++)
				{ 
					$st_id=$student_id[$i];
					$std_nm = $this->db->prepare("SELECT `device_token`,`notification_key`,`id`,`role_id` FROM `login` where id='".$st_id."'");
					$std_nm->execute();
					$ftc_nm= $std_nm->fetch(PDO::FETCH_ASSOC);
					$device_token = $ftc_nm['device_token'];
					$notification_key = $ftc_nm['notification_key'];
					$user_ids=$ftc_nm['id'];
					$role_id=$ftc_nm['role_id'];
 					
					$message='New Assignment Submitted';
					$title='Assignment';
					$submitted_by=$user_id;
					$user_idss=$user_ids;
					$date=date("M d Y");
					$time=date("h:i A");
					 
					$msg = array
					(
						'title'=> $title ,
						'message' 	=> $message,
						'button_text'	=> 'View',
						'link'	=> 'notice://Assignment?id='.$insert_id.'&student_id='.$user_ids,
						'notification_id'	=> $insert_id,
 
					);
 					$url = 'https://fcm.googleapis.com/fcm/send';
 					$fields = array
					(
						'registration_ids' 	=> array($device_token),
						'data'			=> $msg
					);
					$headers = array
					(
						'Authorization: key=' .$notification_key,
						'Content-Type: application/json'
					);
					$link='notice://Assignment?id='.$insert_id.'&student_id='.$user_ids;
					//--- NOTIFICATIO INSERT
						$NOTY_insert = $this->db->prepare("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id,link)VALUES(:title,:message,:user_id,:submitted_by,:date,:time,:role_id,:link)");
						$NOTY_insert->bindParam(":title", $title, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":link", $link, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":message", $message, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":user_id", $user_idss, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":submitted_by", $submitted_by, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":time", $time, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":date", $date, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":role_id", $role_id, PDO::PARAM_STR);
						$NOTY_insert->execute();	
					//-- END
					
						json_encode($fields);
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
						$result = curl_exec($ch);
 						curl_close($ch);
 					//-- 
				}
 
                $success = array('status'=> true, "Error" => "Thank you your assignment updated successfully");
                $this->response($this->json($success), 200);
		}
		else
		{
			$error = array('status' => false, "Error" => "Try Again");
			$this->response($this->json($error), 200);
		}
}
public function AttendanceFetch()
{
	if ($this->get_request_method() != "POST") {
		$this->response('', 406);
	}
	$class_id = $this->_request['class_id'];
	$section_id = $this->_request['section_id'];
	$attendance_date = $this->_request['attendance_date'];
	$attendance_date=date('Y-m-d',strtotime($attendance_date));
	$editable=false;
	if($attendance_date==date('Y-m-d'))
	{
		$editable=true;
	}
	$std_ftc = $this->db->prepare("SELECT `id`,`name` FROM `login` where class_id='".$class_id."' AND section_id='".$section_id."'");
	$std_ftc->execute();
	if($std_ftc->rowCount()>0)
	{
		$ftc_data= $std_ftc->fetchALL(PDO::FETCH_ASSOC);
		$x=0;
		foreach($ftc_data as $key => $value)
		{
			$student_id=$value['id'];
			$string_insert[$key]=$ftc_data[$key];
			//- Attance
			$std_nm = $this->db->prepare("SELECT * FROM `attendance` where student_id='".$student_id."' AND attendance_date='".$attendance_date."'");
			$std_nm->execute();
			$attendance_array=array();
			if($std_nm->rowCount()>0)
			{
				$ftc_datas= $std_nm->fetchALL(PDO::FETCH_ASSOC);
				$attendance_mark=$ftc_datas[0]['attendance_mark'];
			}
			else
			{
				$attendance_mark=0;	
			}
			$string_insert[$x]['attendance_mark']=$attendance_mark;
			$string_insert[$x]['editable']=$editable;
			$x++;
		}
		$error = array('status' => true, "Error" => "",'studentlist' => $string_insert);
		$this->response($this->json($error), 200);
	}
	else
	{
		$error = array('status' => false, "Error" => "No data found",'Responce' => '');
		$this->response($this->json($error), 200);
	}
}
public function attendance()
{
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		$user_id = $this->_request['user_id'];
		@$student_id = $this->_request['student_id'];
		$attendance_date = date('Y-m-d');
		$attendance_mark = $this->_request['attendance_mark'];
		$curent_date = date("Y-m-d");
		
		$student_ids=sizeof($student_id);
		
		if($student_ids>1)
		{
		$st_id=0;
		$mark_id=0;
		for($i=0; $i<$student_ids; $i++)
		{ 
			$st_id=$student_id[$i];
			$mark_id=$attendance_mark[$i];
			
			$std_nm = $this->db->prepare("SELECT `id` FROM `attendance` where student_id='".$st_id."' AND attendance_date='".$attendance_date."'");

			$std_nm->execute();
			if($std_nm->rowCount()>0)
			{
				$ftc_data= $std_nm->fetchALL(PDO::FETCH_ASSOC);
 				$update_id=$ftc_data[0]['id']; 
				if(!empty($mark_id)){ 
					$sql_update = $this->db->prepare("update `attendance` set user_id=:user_id,student_id=:student_id,attendance_mark=:attendance_mark,attendance_date=:attendance_date,curent_date=:curent_date where id=:id");
					$sql_update->bindParam(":user_id", $user_id, PDO::PARAM_STR);
					$sql_update->bindParam(":student_id", $st_id, PDO::PARAM_STR);
					$sql_update->bindParam(":attendance_mark", $mark_id, PDO::PARAM_STR);				
					$sql_update->bindParam(":attendance_date", $attendance_date, PDO::PARAM_STR);
					$sql_update->bindParam("curent_date", $curent_date, PDO::PARAM_STR);
					$sql_update->bindParam("id", $update_id, PDO::PARAM_STR);
					$sql_update->execute();
}
 			}
			else
			{
 				if(!empty($mark_id)){	
					$sql_insert = $this->db->prepare("INSERT into attendance(user_id,student_id,attendance_mark,attendance_date,curent_date)
					VALUES(:user_id,:student_id,:attendance_mark,:attendance_date,:curent_date)");
					$sql_insert->bindParam(":user_id", $user_id, PDO::PARAM_STR);
					$sql_insert->bindParam(":student_id", $st_id, PDO::PARAM_STR);
					$sql_insert->bindParam(":attendance_mark", $mark_id, PDO::PARAM_STR);				
					$sql_insert->bindParam(":attendance_date", $attendance_date, PDO::PARAM_STR);
					$sql_insert->bindParam("curent_date", $curent_date, PDO::PARAM_STR);
					$sql_insert->execute();
				}
			}
				
		}
		$success = array('status'=> true, "Error" => "Thank you attendance updated successfully");
		$this->response($this->json($success), 200);
			
		}
		else
{
			$std_nm = $this->db->prepare("SELECT `id` FROM `attendance` where student_id='".$student_id."' AND attendance_date='".$attendance_date."'");
			$std_nm->execute();
			if($std_nm->rowCount()>0)
			{
				$ftc_data= $std_nm->fetchALL(PDO::FETCH_ASSOC);
 				$update_id=$ftc_data[0]['id']; 
				if(!empty($mark_id)){ 
					$sql_update = $this->db->prepare("update `attendance` set user_id=:user_id,student_id=:student_id,attendance_mark=:attendance_mark,attendance_date=:attendance_date,curent_date=:curent_date where id=:id");
					$sql_update->bindParam(":user_id", $user_id, PDO::PARAM_STR);
					$sql_update->bindParam(":student_id", $student_id, PDO::PARAM_STR);
					$sql_update->bindParam(":attendance_mark", $attendance_mark, PDO::PARAM_STR);				
					$sql_update->bindParam(":attendance_date", $attendance_date, PDO::PARAM_STR);
					$sql_update->bindParam("curent_date", $curent_date, PDO::PARAM_STR);
					$sql_update->bindParam("id", $update_id, PDO::PARAM_STR);
					$sql_update->execute();
}
 			}
			else
			{
 				if(!empty($mark_id)){	
					$sql_insert = $this->db->prepare("INSERT into attendance(user_id,student_id,attendance_mark,attendance_date,curent_date)
					VALUES(:user_id,:student_id,:attendance_mark,:attendance_date,:curent_date)");
					$sql_insert->bindParam(":user_id", $user_id, PDO::PARAM_STR);
					$sql_insert->bindParam(":student_id", $student_id, PDO::PARAM_STR);
					$sql_insert->bindParam(":attendance_mark", $attendance_mark, PDO::PARAM_STR);				
					$sql_insert->bindParam(":attendance_date", $attendance_date, PDO::PARAM_STR);
					$sql_insert->bindParam("curent_date", $curent_date, PDO::PARAM_STR);
					$sql_insert->execute();
				}
			}
		    }
}

/////
	public function fetch_assignment_list() 
	{
		include_once("common/global.inc.php");
        global $link;
                     
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		$assignment_type = $this->_request['assignment_type'];
		if($assignment_type=='faculty_wise')	
		{
			$user_id = $this->_request['user_id'];
 			$ass_sql = $this->db->prepare("SELECT * FROM assignment where user_id='".$user_id."' && `flag` = 0  order by id DESC");
			$ass_sql->execute();
			if($ass_sql->rowCount()>0)
			{
				$ass_sqls= $ass_sql->fetchALL(PDO::FETCH_ASSOC);
				foreach($ass_sqls as $ass_sqls_data)
				{
						$subject_id = $ass_sqls_data['subject_id'];
						$sub_sql = $this->db->prepare("SELECT * FROM master_subject where id='".$subject_id."'");
						$sub_sql->execute();
						$sub_sqls= $sub_sql->fetch(PDO::FETCH_ASSOC);
						$subject_name = $sub_sqls['subject_name'];
						
						$user_id=$ass_sqls_data['user_id'];
						$sub_sql1 = $this->db->prepare("SELECT `user_name` FROM faculty_login where id='".$user_id."'");
						$sub_sql1->execute();
						$sub_sqls1= $sub_sql1->fetch(PDO::FETCH_ASSOC);
						$user_name = $sub_sqls1['user_name'];
						
					$result[] = array('assignment_id' => $ass_sqls_data['id'],
						'topic' => $ass_sqls_data['topic'],
						'description' => $ass_sqls_data['description'],
						'subject_name' => $subject_name,
						'file' => $site_url."assignment/".$ass_sqls_data['file'],
						'student_id' => $ass_sqls_data['student_id'],
						'user_id' => $ass_sqls_data['user_id'],
						'teacher_name'=> $user_name,
						'submission_date'=> $ass_sqls_data['submission_date']
					);
				}
				$success = array('status'=> true, "Error" => "",'fetch_assignment_list' => $result);
				$this->response($this->json($success), 200);
			}
			else
			{
				$error = array('status' => false, "Error" => "No Assignment",'Responce' => '');
				$this->response($this->json($error), 200);
			}			
		}
		else if($assignment_type=='student_wise')
		{
			$student_id = $this->_request['student_id'];
 			
			$ass_sql = $this->db->prepare("SELECT * FROM assignment where student_id LIKE '%".$student_id."%' && `flag` = 0 order by id DESC");
			$ass_sql->execute();
			if($ass_sql->rowCount()>0)
			{
				$ass_sqls= $ass_sql->fetchALL(PDO::FETCH_ASSOC);
				foreach($ass_sqls as $ass_sqls_data)
				{
						$subject_id = $ass_sqls_data['subject_id'];
						$sub_sql = $this->db->prepare("SELECT * FROM master_subject where id='".$subject_id."'");
						$sub_sql->execute();
						$sub_sqls= $sub_sql->fetch(PDO::FETCH_ASSOC);
						$subject_name = $sub_sqls['subject_name'];
						
						$user_id=$ass_sqls_data['user_id'];
						$sub_sql1 = $this->db->prepare("SELECT `user_name` FROM faculty_login where id='".$user_id."'");
						$sub_sql1->execute();
						$sub_sqls1= $sub_sql1->fetch(PDO::FETCH_ASSOC);
						$user_name = $sub_sqls1['user_name'];
						
					$result[] = array('assignment_id' => $ass_sqls_data['id'],
						'topic' => $ass_sqls_data['topic'],
						'description' => $ass_sqls_data['description'],
						'subject_name' => $subject_name,
						'file' => $site_url."assignment/".$ass_sqls_data['file'],
						'student_id' => $ass_sqls_data['student_id'],
						'user_id' => $ass_sqls_data['user_id'],
						'teacher_name'=> $user_name,
						'submission_date'=> $ass_sqls_data['submission_date']
					);
				}
				$success = array('status'=> true, "Error" => "",'fetch_assignment_list' => $result);
				$this->response($this->json($success), 200);
			}
			else
			{
				$error = array('status' => false, "Error" => "No Assignment",'Responce' => '');
				$this->response($this->json($error), 200);
			}	
		}
		else
		{
			$error = array('status' => false, "Error" => "Invalid assignment type",'Responce' => '');
			$this->response($this->json($error), 200);
		}
	}

//-- ASSIGNMENT LIST	
	public function fetch_assignment_data() 
	{
		include_once("common/global.inc.php");
		global $link;
					 
		if ($this->get_request_method() != "POST") {
			$this->response('', 406);
		}
		@$assignment_id = $this->_request['assignment_id'];
  @$student_id = $this->_request['student_id'];
		
		$ass_sql = $this->db->prepare("SELECT * FROM assignment where id='".$assignment_id."' && `flag` = 0 ");
		$ass_sql->execute();
		if($ass_sql->rowCount()>0){
		$ass_sqls_data= $ass_sql->fetch(PDO::FETCH_ASSOC);
				$subject_id = $ass_sqls_data['subject_id'];
				$sub_sql = $this->db->prepare("SELECT * FROM master_subject where id='".$subject_id."'");
				$sub_sql->execute();
				$sub_sqls= $sub_sql->fetch(PDO::FETCH_ASSOC);
				$subject_name = $sub_sqls['subject_name'];
	
$user_id=$ass_sqls_data['user_id'];
				$sub_sql1 = $this->db->prepare("SELECT `user_name` FROM faculty_login where id='".$user_id."'");
				$sub_sql1->execute();
				$sub_sqls1= $sub_sql1->fetch(PDO::FETCH_ASSOC);
				$user_name = $sub_sqls1['user_name'];
				$result = array('assignment_id' => $ass_sqls_data['id'],
					'topic' => $ass_sqls_data['topic'],
					'description' => $ass_sqls_data['description'],
					'subject_name' => $subject_name,
					'file' => $site_url."assignment/".$ass_sqls_data['file'],
					'user_id'=>$ass_sqls_data['user_id'],
'teacher_name'=>$user_name,
					'submission_date'=>$ass_sqls_data['submission_date']
				);
			$success = array('status'=> true, "Error" => "",'fetch_assignment_data' => $result);
			$this->response($this->json($success), 200);
			}
		else{
			$error = array('status' => false, "Error" => "No Assignment",'Responce' => '');
			$this->response($this->json($error), 200);
		}
	}
/////
public function fetch_syllabus() {
              include_once("common/global.inc.php");
        global $link;
                     
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		@$user_id = $this->_request['user_id'];
		
		$ass_sql = $this->db->prepare("SELECT * FROM syllabus where id='".$assignment_id."'");
		$ass_sql->execute();
		if($ass_sql->rowCount()>0){
		$ass_sqls_data= $ass_sql->fetch(PDO::FETCH_ASSOC);
				$subject_id = $ass_sqls_data['subject_id'];
				$sub_sql = $this->db->prepare("SELECT * FROM master_subject where id='".$subject_id."'");
				$sub_sql->execute();
				$sub_sqls= $sub_sql->fetch(PDO::FETCH_ASSOC);
				$subject_name = $sub_sqls['subject_name'];

				$result = array('assignment_id' => $ass_sqls_data['id'],
				'topic' => $ass_sqls_data['topic'],
				'description' => $ass_sqls_data['description'],
				'subject_name' => $subject_name,
				'file' => $ass_sqls_data['file']
				);
			$success = array('status'=> true, "Error" => "",'fetch_assignment_data' => $result);
			$this->response($this->json($success), 200);
            }
		else{
			$error = array('status' => false, "Error" => "No Assignment",'Responce' => '');
			$this->response($this->json($error), 200);
		}
		}
//--  AppointMent API/* Push // notification
	public function appointment_data() 
	{
		global $link;
		include_once("common/global.inc.php");
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		if(isset($this->_request['response_type']))
		{
			$response_type=$this->_request['response_type'];
			//-- Response Type = 1 Insert  2 = update  3 ogin()Fetch
			if($response_type==1)
			{//Insert
				$appoint_to=$this->_request['appoint_to'];
				$appoint_date=$this->_request['appoint_date'];/// YMD
				$mobile_no=$this->_request['mobile_no'];/// YMD
				$appoint_date_cnv=date('Y-m-d', strtotime($appoint_date));
				$appoint_time=$this->_request['appoint_time'];
				$reason=$this->_request['reason'];
				$student_id=$this->_request['student_id'];
				$name=$this->_request['name'];
				 
				$sql_insert = $this->db->prepare("INSERT into appointment(appoint_to,appoint_date,appoint_time,reason,student_id,name,mobile_no)VALUES(:appoint_to,:appoint_date,:appoint_time,:reason,:student_id,:name,:mobile_no)");
				$sql_insert->bindParam(":appoint_to", $appoint_to, PDO::PARAM_STR);
				$sql_insert->bindParam(":mobile_no", $mobile_no, PDO::PARAM_STR);
				$sql_insert->bindParam(":appoint_date", $appoint_date_cnv, PDO::PARAM_STR);
				$sql_insert->bindParam(":appoint_time", $appoint_time, PDO::PARAM_STR);
				$sql_insert->bindParam(":reason", $reason, PDO::PARAM_STR);
				$sql_insert->bindParam(":student_id", $student_id, PDO::PARAM_STR);
				$sql_insert->bindParam(":name", $name, PDO::PARAM_STR);
				$sql_insert->execute();	
				$insert_id = $this->db->lastInsertId();
/*
				//--
 					$std_nm = $this->db->prepare("SELECT `device_token`,`notification_key`,`role_id` FROM `faculty_login` where id='".$appoint_to."'");
					$std_nm->execute();
					$ftc_nm= $std_nm->fetch(PDO::FETCH_ASSOC);
					$device_token = $ftc_nm['device_token'];
					$notification_key = $ftc_nm['notification_key'];
					$role_id = $ftc_nm['role_id'];
					
					$message='New Appointment Request Submitted';
					$title='New Appointment';
					$submitted_by=$student_id;
					$user_id=$appoint_to;
					$date=date("M d Y");
					$time=date("h:i A");
					
 					$msg = array
					(
						'title' => $title,
						'message' 	=> $message,
						'button_text'	=> 'View',
						'link'	=> 'appointment://appointment?id='.$insert_id,
						'notification_id'	=> $insert_id,
					);
					$url = 'https://fcm.googleapis.com/fcm/send';
					$fields = array
					(
						'registration_ids' 	=> array($device_token),
						'data'			=> $msg
					);
					$headers = array
					(
						'Authorization: key=' .$notification_key,
						'Content-Type: application/json'
					);
					//--- NOTIFICATIO INSERT
						$NOTY_insert = $this->db->prepare("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES(:title,:message,:user_id,:submitted_by,:date,:time,:role_id)");
						$NOTY_insert->bindParam(":title", $title, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":message", $message, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":user_id", $user_id, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":submitted_by", $submitted_by, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":time", $time, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":date", $date, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":role_id", $role_id, PDO::PARAM_STR);
						$NOTY_insert->execute();	
					//-- END
					
						json_encode($fields);
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
						$result = curl_exec($ch);
						curl_close($ch);
				//--
*/
				$success = array('status'=> true, "Error" => "Thank you appointment successfully submitted");
                $this->response($this->json($success), 200);
						
				
			}
			else if($response_type==2)
			{//update
				$update_id=$this->_request['update_id'];
				$appoint_to=$this->_request['appoint_to'];
				$appoint_date=$this->_request['appoint_date'];/// YMD
				$appoint_date_cnv=date('Y-m-d', strtotime($appoint_date));
				$appoint_time=$this->_request['appoint_time'];
				$student_id=$this->_request['student_id'];
				$name=$this->_request['name'];
				$reason=$this->_request['reason'];
				
					$sql_update = $this->db->prepare("update `appointment` set appoint_to=:appoint_to,appoint_date=:appoint_date,appoint_time=:appoint_time,reason=:reason,student_id=:student_id,name=:name where id=:id");	
					$sql_update->bindParam(":appoint_to", $appoint_to, PDO::PARAM_STR);
					$sql_update->bindParam(":appoint_date", $appoint_date_cnv, PDO::PARAM_STR);
					$sql_update->bindParam(":appoint_time", $appoint_time, PDO::PARAM_STR);
					$sql_update->bindParam(":reason", $reason, PDO::PARAM_STR);
					$sql_update->bindParam(":id", $update_id, PDO::PARAM_STR);
					$sql_update->bindParam(":student_id", $student_id, PDO::PARAM_STR);
					$sql_update->bindParam(":name", $name, PDO::PARAM_STR);
					
 					$sql_update->execute();
					$success = array('status'=> true, "Error" => "Thank you appointment updated successfully");
                    $this->response($this->json($success), 200);
					
				
			}
			else if($response_type==3)
			{//Fetch
				$sql_fetch = $this->db->prepare("SELECT * FROM appointment");
 				$sql_fetch->execute();
				 if ($sql_fetch->rowCount() != 0) {  
				 	$x=0;   
					while($row_gp = $sql_fetch->fetch(PDO::FETCH_ASSOC)){
						foreach($row_gp as $key=>$valye)	
						{
							$string_insert[$x][$key]=$row_gp[$key];
						}
						$x++;
					}
					 
					$result1 = array("appointment" => $string_insert);
					$success = array('Type' => 'OK', "Error" => '', 'Responce' => $result1);
					$this->response($this->json($success), 200);
				} 
				else {
					
					$error = array('Type' => "Error", "Error" => "No data found", 'Responce' => '');
					$this->response($this->json($error), 200);
				}				
				
			}
			else
			{// INvalid
				$error = array('status' => false , "Error" => "Invalid Response Type", 'Responce' => '');
				$this->response($this->json($error), 200);	
			}
			
			
		}
		else
		{
			$error = array('status' => false , "Error" => "Please Provide Response Type to Get Data", 'Responce' => '');
			$this->response($this->json($error), 200);	
		}
	}
//--  Leave Note API/* Push // NOtification
	public function leaveNote_data() 
	{
		global $link;
		include_once("common/global.inc.php");
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		if(isset($this->_request['response_type']))
		{
			$response_type=$this->_request['response_type'];
			//-- Response Type = 1 Insert  2 = update  3 Fetch
			if($response_type==1)
			{//Insert
				$date_from=$this->_request['date_from'];
				$date_to=$this->_request['date_to'];/// YMD
				$date_from_cnv=date('Y-m-d', strtotime($date_from));
				$date_to_cnv=date('Y-m-d', strtotime($date_to));
				$student_id=$this->_request['student_id'];
				$reason=$this->_request['reason'];
				$class_id=$this->_request['class_id'];
				$section_id=$this->_request['section_id'];
				 
				$sql_insert = $this->db->prepare("INSERT into leave_note(date_from,date_to,student_id,reason,class_id,section_id)VALUES(:date_from,:date_to,:student_id,:reason,:class_id,:section_id)");
				$sql_insert->bindParam(":date_from", $date_from_cnv, PDO::PARAM_STR);
				$sql_insert->bindParam(":date_to", $date_to_cnv, PDO::PARAM_STR);
				$sql_insert->bindParam(":student_id", $student_id, PDO::PARAM_STR);
				$sql_insert->bindParam(":reason", $reason, PDO::PARAM_STR);
				$sql_insert->bindParam(":class_id", $class_id, PDO::PARAM_STR);
				$sql_insert->bindParam(":section_id", $section_id, PDO::PARAM_STR);
				$sql_insert->execute();	
				$update_id = $this->db->lastInsertId();
				//--
					$std_nm = $this->db->prepare("SELECT `device_token`,`notification_key` FROM `faculty_login` where class_id='".$class_id."' AND section_id='".$section_id."'");
					$std_nm->execute();
if ($std_nm->rowCount() != 0) { 
					$ftc_nm= $std_nm->fetch(PDO::FETCH_ASSOC);
					$device_token = $ftc_nm['device_token'];
					$notification_key = $ftc_nm['notification_key'];
					
					$sql_std = $this->db->prepare("SELECT `id`,`role_id` FROM faculty_login WHERE class_id='".$class_id."' AND section_id='".$section_id."'");
					$sql_std->execute();
					$std = $sql_std->fetch(PDO::FETCH_ASSOC);
					$user_id=$std['id'];
					$role_id=$std['role_id'];
					
					$message='New Leave Application Submitted';
					$title='Leave Application';
					$submitted_by=$student_id;
					$user_id=$user_id;
					$date=date("M d Y");
					$time=date("h:i A");
					 
					$msg = array
					(
						'message' 	=> 'New Leave Application Submitted',
						'button_text'	=> 'View',
						'link'	=> 'notice://leave_note?id='.$update_id,
						'notification_id'	=> $update_id,
					);
 					$url = 'https://fcm.googleapis.com/fcm/send';
 					$fields = array
					(
						'registration_ids' 	=> array($device_token),
						'data'			=> $msg
					);
					$headers = array
					(
						'Authorization: key=' .$notification_key,
						'Content-Type: application/json'
					);
					$link='notice://leave_note?id='.$update_id;
					//--- NOTIFICATIO INSERT
						$NOTY_insert = $this->db->prepare("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id,link)VALUES(:title,:message,:user_id,:submitted_by,:date,:time,:role_id,:link)");
						$NOTY_insert->bindParam(":title", $title, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":link", $link, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":message", $message, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":user_id", $user_id, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":submitted_by", $submitted_by, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":time", $time, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":date", $date, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":role_id", $role_id, PDO::PARAM_STR);
						$NOTY_insert->execute();	
					//-- END
					
						json_encode($fields);
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
						$result = curl_exec($ch);
 						curl_close($ch);
 					//--
} 
				
				$success = array('status'=> true, "Error" => "Thank you your leave application successfully submitted");
                $this->response($this->json($success), 200);
						
				
			}
			else if($response_type==2)
			{//update
				$update_id=$this->_request['update_id'];
				$date_from=$this->_request['date_from'];
				$date_to=$this->_request['date_to'];/// YMD
				$date_from_cnv=date('Y-m-d', strtotime($date_from));
				$date_to_cnv=date('Y-m-d', strtotime($date_to));
				$student_id=$this->_request['student_id'];
				$reason=$this->_request['reason'];
				$class_id=$this->_request['class_id'];
				$section_id=$this->_request['section_id'];
				
					$sql_update = $this->db->prepare("update `leave_note` set date_from=:date_from,date_to=:date_to,student_id=:student_id,reason=:reason,class_id=:class_id,section_id=:section_id where id=:id");	
					$sql_update->bindParam(":date_from", $date_from_cnv, PDO::PARAM_STR);
					$sql_update->bindParam(":date_to", $date_to_cnv, PDO::PARAM_STR);
					$sql_update->bindParam(":student_id", $student_id, PDO::PARAM_STR);
					$sql_update->bindParam(":reason", $reason, PDO::PARAM_STR);
					$sql_update->bindParam(":class_id", $class_id, PDO::PARAM_STR);
					$sql_update->bindParam(":section_id", $section_id, PDO::PARAM_STR);
					$sql_update->bindParam(":id", $update_id, PDO::PARAM_STR);
 					$sql_update->execute();
					$success = array('status'=> true, "Error" => "Thank you your leave application updated successfully");
                    $this->response($this->json($success), 200);
					
				
			}
			else if($response_type==3)
			{//Fetch
				$class_id=$this->_request['class_id'];
				$section_id=$this->_request['section_id'];
				$sql_fetch = $this->db->prepare("SELECT * FROM leave_note WHERE class_id='".$class_id."' AND section_id='".$section_id."'  order by `id` DESC");
 				$sql_fetch->execute();
				 if ($sql_fetch->rowCount() != 0) {  
				 	$x=0;   
					while($row_gp = $sql_fetch->fetch(PDO::FETCH_ASSOC)){

						$student_id = $row_gp['student_id'];
						$sql_std = $this->db->prepare("SELECT `name` FROM login WHERE id='".$student_id."'");
						$sql_std->execute();
						$std = $sql_std->fetch(PDO::FETCH_ASSOC);
						$std_name=$std['name'];

						foreach($row_gp as $key=>$valye)	
						{
							$string_insert[$x][$key]=$row_gp[$key];
						}
						$string_insert[$x]['student_name']=$std_name;
						$x++;
					} 
					 
					$result1 = array("leave_note" => $string_insert);
					$success = array('Type' => 'OK', "Error" => '', 'Responce' => $result1);
					$this->response($this->json($success), 200);
				} 
				else {
					
					$error = array('status' => false , "Error" => "No data found", 'Responce' => '');
					$this->response($this->json($error), 200);
				}				
				
			}
			else
			{// INvalid
				$error = array('status' => false , "Error" => "Invalid Response Type", 'Responce' => '');
				$this->response($this->json($error), 200);	
			}
			
			
		}
		else
		{
			$error = array('status' => false , "Error" => "Please Provide Response Type to Get Data", 'Responce' => '');
			$this->response($this->json($error), 200);	
		}
	
	}
//-- Leave Action  // Push  // Notification
	public function leaveAction() 
	{
		global $link;
		include_once("common/global.inc.php");
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		if(isset($this->_request['response_type']))
		{
			$response_type=$this->_request['response_type'];
			$user_id=$this->_request['user_id'];
			if(isset($this->_request['update_id']))
			{
 				//-- Response Type = 1 approve  2 = Reject 
				if($response_type==1)
				{//Approve
					$update_id=$this->_request['update_id'];
 					$response_type=$this->_request['response_type'];
					$sql_update = $this->db->prepare("update `leave_note` set status=:status where id=:id");	
					$sql_update->bindParam(":status", $response_type, PDO::PARAM_STR);
					$sql_update->bindParam(":id", $update_id, PDO::PARAM_STR);
					$sql_update->execute();
					//--
						$sub_sqls = $this->db->prepare("SELECT `student_id` FROM `leave_note` where id='".$update_id."'");
						$sub_sqls->execute();
						$sub_sqlsa= $sub_sqls->fetch(PDO::FETCH_ASSOC);
						$student_id = $sub_sqlsa['student_id'];
						$std_nm = $this->db->prepare("SELECT `device_token`,`notification_key`,`role_id` FROM `login` where id='".$student_id."'");
						$std_nm->execute();
						$ftc_nm= $std_nm->fetch(PDO::FETCH_ASSOC);
						$device_token = $ftc_nm['device_token'];
						$notification_key = $ftc_nm['notification_key'];
						$role_id = $ftc_nm['role_id'];
						$message='Your Leave Application Approved';
						$title='Leave Application';
						$submitted_by=$user_id;
						$user_id=$student_id;
						$date=date("M d Y");
						$time=date("h:i A");
						 
						$msg = array
						(
							'message' 	=> 'Your Leave Application Approved',
							'button_text'	=> 'View',
							'link'	=> 'notice://leave_approve?id='.$update_id,
							'notification_id'	=> $update_id,
						);
						$url = 'https://fcm.googleapis.com/fcm/send';
						$fields = array
						(
							'registration_ids' 	=> array($device_token),
							'data'			=> $msg
						);
						$headers = array
						(
							'Authorization: key=' .$notification_key,
							'Content-Type: application/json'
						);
						$link='notice://leave_approve?id='.$update_id;
						//--- NOTIFICATIO INSERT
							$NOTY_insert = $this->db->prepare("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id,link)VALUES(:title,:message,:user_id,:submitted_by,:date,:time,:role_id,:link)");
							$NOTY_insert->bindParam(":title", $title, PDO::PARAM_STR);
							$NOTY_insert->bindParam(link);
							$NOTY_insert->bindParam(":message", $message, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":user_id", $user_id, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":submitted_by", $submitted_by, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":time", $time, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":date", $date, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":role_id", $role_id, PDO::PARAM_STR);
							$NOTY_insert->execute();	
						//-- END
							json_encode($fields);
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, $url);
							curl_setopt($ch, CURLOPT_POST, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
							curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
							$result = curl_exec($ch);
							curl_close($ch);
 					//--
					$success = array('status'=> true, "Error" => "Thank you your leave application is approve");
					$this->response($this->json($success), 200);
				}
				else if($response_type==2)
				{//update
					$update_id=$this->_request['update_id'];
					$response_type=$this->_request['response_type'];
					$sql_update = $this->db->prepare("update `leave_note` set status=:status where id=:id");	
					$sql_update->bindParam(":status", $response_type, PDO::PARAM_STR);
					$sql_update->bindParam(":id", $update_id, PDO::PARAM_STR);
					$sql_update->execute();
					//--
					$sub_sqls = $this->db->prepare("SELECT `student_id` FROM `leave_note` where id='".$update_id."'");
					$sub_sqls->execute();
					$sub_sqlsa= $sub_sqls->fetch(PDO::FETCH_ASSOC);
					$student_id = $sub_sqlsa['student_id'];
					$std_nm = $this->db->prepare("SELECT `device_token`,`notification_key`,`role_id` FROM `login` where id='".$student_id."'");
					$std_nm->execute();
					$ftc_nm= $std_nm->fetch(PDO::FETCH_ASSOC);
					$device_token = $ftc_nm['device_token'];
					$notification_key = $ftc_nm['notification_key'];
					$role_id = $ftc_nm['role_id'];
					
					$message='Your Leave Application Rejected';
					$title='Leave Application';
					$submitted_by=$user_id;
					$user_id=$student_id;
					$date=date("M d Y");
					$time=date("h:i A");
 
 					$msg = array
					(
						'message' 	=> 'Your Leave Application Rejected',
						'button_text'	=> 'View',
						'link'	=> 'notice://leave_approve?id='.$update_id,
						'notification_id'	=> $update_id,
					);
 					$url = 'https://fcm.googleapis.com/fcm/send';
 					$fields = array
					(
						'registration_ids' 	=> array($device_token),
						'data'			=> $msg
					);
					$headers = array
					(
						'Authorization: key=' .$notification_key,
						'Content-Type: application/json'
					);
					$link='notice://leave_approve?id='.$update_id;
					//--- NOTIFICATIO INSERT
						$NOTY_insert = $this->db->prepare("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id,link)VALUES(:title,:message,:user_id,:submitted_by,:date,:time,:role_id,:link)");
						$NOTY_insert->bindParam(":link", $link, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":title", $title, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":message", $message, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":user_id", $user_id, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":submitted_by", $submitted_by, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":time", $time, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":date", $date, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":role_id", $role_id, PDO::PARAM_STR);
						$NOTY_insert->execute();	
					//-- END
						json_encode($fields);
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
						$result = curl_exec($ch);
 						curl_close($ch);
 					//-- 
					$success = array('status'=> true, "Error" => "Thank you your leave application is reject");
					$this->response($this->json($success), 200);
						
					
				}
				else
				{// INvalid
					$error = array('status' => false , "Error" => "Invalid Response Type", 'Responce' => '');
					$this->response($this->json($error), 200);	
				}
			}
			else
			{
				$error = array('status' => false , "Error" => "Please Provide Update ID", 'Responce' => '');
				$this->response($this->json($error), 200);	
			}
 		}
		else
		{
			$error = array('status' => false , "Error" => "Please Provide Response Type to Get Data", 'Responce' => '');
			$this->response($this->json($error), 200);	
		}
	}	
//- APPOINTMENT ACTION	Push// Noticication
	public function appointmentAction() 
	{
		global $link;
		include_once("common/global.inc.php");
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		if(isset($this->_request['response_type']))
		{
			$user_id=$this->_request['user_id'];
			$response_type=$this->_request['response_type'];
			if(isset($this->_request['update_id']))
			{
 				//-- Response Type = 1 approve  2 = Reject 
				if($response_type==1)
				{//Approve
					$update_id=$this->_request['update_id'];
					$response_type=$this->_request['response_type'];
					$sql_update = $this->db->prepare("update `appointment` set status=:status where id=:id");	
					$sql_update->bindParam(":status", $response_type, PDO::PARAM_STR);
					$sql_update->bindParam(":id", $update_id, PDO::PARAM_STR);
					$sql_update->execute();
					/*//--
						$sub_sqls = $this->db->prepare("SELECT `student_id` FROM `appointment` where id='".$update_id."'");
						$sub_sqls->execute();
						$sub_sqlsa= $sub_sqls->fetch(PDO::FETCH_ASSOC);
						$student_id = $sub_sqlsa['student_id'];
						$std_nm = $this->db->prepare("SELECT `device_token`,`notification_key`,`role_id` FROM `login` where id='".$student_id."'");
						$std_nm->execute();
						$ftc_nm= $std_nm->fetch(PDO::FETCH_ASSOC);
						$device_token = $ftc_nm['device_token'];
						$notification_key = $ftc_nm['notification_key'];
						$role_id = $ftc_nm['role_id'];
						
						$message='Your Appointment is Approve';
						$title='Appointment';
						$submitted_by=$user_id;
						$user_id=$student_id;
						$date=date("M d Y");
						$time=date("h:i A");

						
						$msg = array
						(
							'message' 	=> 'Your Appointment is Approve',
							'button_text'	=> 'View',
							'link'	=> 'notice://appointment?id='.$update_id,
							'notification_id'	=> $update_id,
						);
						$url = 'https://fcm.googleapis.com/fcm/send';
						$fields = array
						(
							'registration_ids' 	=> array($device_token),
							'data'			=> $msg
						);
						$headers = array
						(
							'Authorization: key=' .$notification_key,
							'Content-Type: application/json'
						);
						 
						//--- NOTIFICATIO INSERT
							$NOTY_insert = $this->db->prepare("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id,link)VALUES(:title,:message,:user_id,:submitted_by,:date,:time,:role_id,:link)");
							$NOTY_insert->bindParam(":link", $link, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":title", $title, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":message", $message, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":user_id", $user_id, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":submitted_by", $submitted_by, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":time", $time, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":date", $date, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":role_id", $role_id, PDO::PARAM_STR);
							$NOTY_insert->execute();	
						//-- END
							json_encode($fields);
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, $url);
							curl_setopt($ch, CURLOPT_POST, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
							curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
							$result = curl_exec($ch);
							curl_close($ch);
 					//-- 
					 */
					$success = array('status'=> true, "Error" => "Thank you your appointment is approve");
					$this->response($this->json($success), 200);
							
					
				}
				else if($response_type==2)
				{//update
					$update_id=$this->_request['update_id'];
					$response_type=$this->_request['response_type'];
					$sql_update = $this->db->prepare("update `appointment` set status=:status where id=:id");	
					$sql_update->bindParam(":status", $response_type, PDO::PARAM_STR);
					$sql_update->bindParam(":id", $update_id, PDO::PARAM_STR);
					$sql_update->execute();
					/*//--
						$sub_sqls = $this->db->prepare("SELECT `student_id` FROM `appointment` where id='".$update_id."'");
						$sub_sqls->execute();
						$sub_sqlsa= $sub_sqls->fetch(PDO::FETCH_ASSOC);
						$student_id = $sub_sqlsa['student_id'];
						$std_nm = $this->db->prepare("SELECT `device_token`,`notification_key`,`role_id` FROM `login` where id='".$student_id."'");
						$std_nm->execute();
						$ftc_nm= $std_nm->fetch(PDO::FETCH_ASSOC);
						$device_token = $ftc_nm['device_token'];
						$notification_key = $ftc_nm['notification_key'];
						$role_id = $ftc_nm['role_id'];
						
						$message='Your Appointment is Reject';
						$title='Appointment';
						$submitted_by=$user_id;
						$user_id=$student_id;
						$date=date("M d Y");
						$time=date("h:i A");
						$msg = array
						(
							'message' 	=> 'Your Appointment is Reject',
							'button_text'	=> 'View',
							'link'	=> 'notice://appointment?id='.$update_id,
							'notification_id'	=> $update_id,
						);
						$url = 'https://fcm.googleapis.com/fcm/send';
						$fields = array
						(
							'registration_ids' 	=> array($device_token),
							'data'			=> $msg
						);
						$headers = array
						(
							'Authorization: key=' .$notification_key,
							'Content-Type: application/json'
						);
						//--- NOTIFICATIO INSERT
							$NOTY_insert = $this->db->prepare("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES(:title,:message,:user_id,:submitted_by,:date,:time,:role_id)");
							$NOTY_insert->bindParam(":title", $title, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":message", $message, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":user_id", $user_id, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":submitted_by", $submitted_by, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":time", $time, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":date", $date, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":role_id", $role_id, PDO::PARAM_STR);
							$NOTY_insert->execute();	
						//-- END
							json_encode($fields);
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, $url);
							curl_setopt($ch, CURLOPT_POST, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
							curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
							$result = curl_exec($ch);
							curl_close($ch);*/
 					//-- 
					$success = array('status'=> true, "Error" => "Thank you your appointment is reject");
					$this->response($this->json($success), 200);
				}
				else if($response_type==3)
				{//update
					$update_id=$this->_request['update_id'];
					$response_type=$this->_request['response_type'];
					$sql_update = $this->db->prepare("update `appointment` set status=:status where id=:id");	
					$sql_update->bindParam(":status", $response_type, PDO::PARAM_STR);
					$sql_update->bindParam(":id", $update_id, PDO::PARAM_STR);
					$sql_update->execute();
					/*//--
						$sub_sqls = $this->db->prepare("SELECT `student_id` FROM `appointment` where id='".$update_id."'");
						$sub_sqls->execute();
						$sub_sqlsa= $sub_sqls->fetch(PDO::FETCH_ASSOC);
						$student_id = $sub_sqlsa['student_id'];
						$std_nm = $this->db->prepare("SELECT `device_token`,`notification_key`,`role_id` FROM `login` where id='".$student_id."'");
						$std_nm->execute();
						$ftc_nm= $std_nm->fetch(PDO::FETCH_ASSOC);
						$device_token = $ftc_nm['device_token'];
						$notification_key = $ftc_nm['notification_key'];
						$role_id = $ftc_nm['role_id'];
						
						$message='Your Appointment is Completed';
						$title='Appointment';
						$submitted_by=$user_id;
						$user_id=$student_id;
						$date=date("M d Y");
						$time=date("h:i A");
						
						$msg = array
						(
							'message' 	=> 'Your Appointment is Completed',
							'button_text'	=> 'View',
							'link'	=> 'notice://appointment?id='.$update_id,
							'notification_id'	=> $update_id,
						);
						$url = 'https://fcm.googleapis.com/fcm/send';
						$fields = array
						(
							'registration_ids' 	=> array($device_token),
							'data'			=> $msg
						);
						$headers = array
						(
							'Authorization: key=' .$notification_key,
							'Content-Type: application/json'
						);
						//--- NOTIFICATIO INSERT
							$NOTY_insert = $this->db->prepare("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES(:title,:message,:user_id,:submitted_by,:date,:time,:role_id)");
							$NOTY_insert->bindParam(":title", $title, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":message", $message, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":user_id", $user_id, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":submitted_by", $submitted_by, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":time", $time, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":date", $date, PDO::PARAM_STR);
							$NOTY_insert->bindParam(":role_id", $role_id, PDO::PARAM_STR);
							$NOTY_insert->execute();	
						//-- END
							json_encode($fields);
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, $url);
							curl_setopt($ch, CURLOPT_POST, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
							curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
							$result = curl_exec($ch);
							curl_close($ch);
							*/
 					//-- 
					$success = array('status'=> true, "Error" => "Thank you your appointment is completed");
					$this->response($this->json($success), 200);
				}
				else
				{// INvalid
					$error = array('status' => false , "Error" => "Invalid Response Type", 'Responce' => '');
					$this->response($this->json($error), 200);	
				}
			}
			else
			{
				$error = array('status' => false , "Error" => "Please Provide Update ID", 'Responce' => '');
				$this->response($this->json($error), 200);	
			}
 		}
		else
		{
			$error = array('status' => false , "Error" => "Please Provide Response Type to Get Data", 'Responce' => '');
			$this->response($this->json($error), 200);	
		}
	}

//- SUBJECT DATA
	public function subjectList() 
	{
		global $link;
		include_once("common/global.inc.php");
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		
		$sql_fetch = $this->db->prepare("SELECT * FROM master_subject");
		$sql_fetch->execute();
		 if ($sql_fetch->rowCount() != 0) {  
			$x=0;   
			while($row_gp = $sql_fetch->fetch(PDO::FETCH_ASSOC)){
				foreach($row_gp as $key=>$valye)	
				{
					$string_insert[$x][$key]=$row_gp[$key];
				}
				$x++;
			}
			 
			$result1 = array("master_subject" => $string_insert);
			$success = array('Type' => 'OK', "Error" => '', 'Responce' => $result1);
			$this->response($this->json($success), 200);
		} 
		else {
			
			$error = array('Type' => "Error", "Error" => "No data found", 'Responce' => '');
			$this->response($this->json($error), 200);
		}
 	}

//- Contact Details
	public function contactDetails() 
	{
		global $link;
		include_once("common/global.inc.php");
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		
		$sql_fetch = $this->db->prepare("SELECT * FROM contact_detail where `flag` = 0 ");
		$sql_fetch->execute();
		 if ($sql_fetch->rowCount() != 0) {  
			$x=0;   
			while($row_gp = $sql_fetch->fetch(PDO::FETCH_ASSOC)){
				foreach($row_gp as $key=>$valye)	
				{
					$string_insert[$x][$key]=$row_gp[$key];
				}
				$x++;
			}
			 
			$result1 = array("contact_detail" => $string_insert);
			$success = array('Type' => 'OK', "Error" => '', 'Responce' => $result1);
			$this->response($this->json($success), 200);
		} 
		else {
			
			$error = array('Type' => "Error", "Error" => "No data found", 'Responce' => '');
			$this->response($this->json($error), 200);
		}
 	}
//-- TIME  LIST	
	public function TimeTableList() 
	{
		 include_once("common/global.inc.php");
        global $link;
        if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
            $class_id = $this->_request['class_id'];
            $tt_sql = $this->db->prepare("SELECT * FROM time_table where class_id='".$class_id."' AND flag='0'");
            $tt_sql->execute();
$ResultMainArray=array();
                if($tt_sql->rowCount()>0)
                {
                 $f_timtbl = $tt_sql->fetchALL(PDO::FETCH_ASSOC);
                
                
               		$DaysAray=array();
					$days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
					$y=0;
					foreach($days as $day) 
					{
						$ResultMainArray[$y]['day']=$day;
						$x=0;
						foreach($f_timtbl as $f_timtbl1)
						{
							$from_id=date('h:i', strtotime($f_timtbl1['time_from']));
							$to_id=date('h:i', strtotime($f_timtbl1['time_to']));
							$teacher_name=$f_timtbl1['teacher_name'];
							$period=$f_timtbl1['period'];
							$subject_id=$f_timtbl1['subject_id'];
								$sql = $this->db->prepare("SELECT `subject_name` FROM master_subject WHERE id='".$subject_id."'");
								$sql->execute();
								$stds = $sql->fetch(PDO::FETCH_ASSOC);
								$subject_name=$stds['subject_name'];
							$resultArray[$x]['Day']=$day;
							$resultArray[$x]['subject']=$subject_name;                        
							$resultArray[$x]['from']=$from_id;                        
							$resultArray[$x]['to']=$to_id;
							$resultArray[$x]['teacher_name']=$teacher_name;
							$resultArray[$x]['period']=$period;
							
						$x++;    
						}
						$ResultMainArray[$y]['data']=$resultArray;
					 
					unset($resultArray);
					$y++; 
					}

            }   
             if(!empty($ResultMainArray) ){      
		$success = array('status'=> true, "Error" => "",'responce' => $ResultMainArray);
}
else
{
$success = array('status'=> false, "Error" => "",'responce' => '');
}
		$this->response($this->json($success), 200);   
	}
//-- SyllabusList  LIST	
	public function SyllabusList() 
	{
		include_once("common/global.inc.php");
		global $link;
					 
		if ($this->get_request_method() != "POST") {
			$this->response('', 406);
		}
 		
		if(isset($this->_request['class_id']))
		{
			$class_id=$this->_request['class_id'];
$section_id=$this->_request['section_id'];
 			$ass_sql = $this->db->prepare("SELECT * FROM syllabus  where class_id='".$class_id."' && section_id='".$section_id."' order by `id` DESC limit 1");
			$ass_sql->execute();
			if($ass_sql->rowCount()>0){
				$ass_sqls_data= $ass_sql->fetch(PDO::FETCH_ASSOC);
					$class_id = $ass_sqls_data['class_id'];
						
						$sub_sql = $this->db->prepare("SELECT `class_name` FROM master_class where id='".$class_id."'");
						$sub_sql->execute();
						$sub_sqls= $sub_sql->fetch(PDO::FETCH_ASSOC);
						$class_name = $sub_sqls['class_name'];
						
					$section_id = $ass_sqls_data['section_id'];
					
						$sub_sql1 = $this->db->prepare("SELECT `section_name` FROM master_section where id='".$section_id."'");
						$sub_sql1->execute();
						$sub_sqls1= $sub_sql1->fetch(PDO::FETCH_ASSOC);
						$section_name = $sub_sqls1['section_name'];
						
					$subject_id = $ass_sqls_data['subject_id'];
					
						$sub_sql12 = $this->db->prepare("SELECT `subject_name` FROM master_subject where id='".$subject_id."'");
						$sub_sql12->execute();
						$sub_sqls12= $sub_sql12->fetch(PDO::FETCH_ASSOC);
						$subject_name = $sub_sqls12['subject_name'];
		if($ass_sqls_data['file']){
							$FileName=$site_url."syllabus/".$ass_sqls_data['file'];
						}
						else
						{	$FileName='';
						}

					$result = array('id' => $ass_sqls_data['id'],
						'user_id' => $ass_sqls_data['user_id'],
						'class_id' => $ass_sqls_data['class_id'],
						'class_name' => $class_name,
						'section_id' => $ass_sqls_data['section_id'],
						'section_name'=>$section_name,
						'subject_id' => $ass_sqls_data['subject_id'],
						'subject_name'=>$subject_name,
						'date'=>$ass_sqls_data['date'],
						'file'=>$FileName,
					);
				
				$success = array('status'=> true, "Error" => "", 'syllabus' => $result);
				$this->response($this->json($success), 200);
			}
		else
			{
				$error = array('status' => false, "Error" => "No data found",'Responce' => '');
				$this->response($this->json($error), 200);
			}
		}
		else
		{
			$error = array('Type' => "Error", "Error" => "Please Provide Class Id", 'Responce' => '');
			$this->response($this->json($error), 200);
		}
	}
	

//- DirectorPrincipleMessage
	public function DirectorPrincipleMessage() 
	{
		global $link;
		include_once("common/global.inc.php");
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
 		if(isset($this->_request['role_type']))
		{
			$role_type=$this->_request['role_type'];
			$sub_sqls = $this->db->prepare("SELECT `role_name`,`id` FROM master_role where role_name LIKE '%".$role_type."%'");
				$sub_sqls->execute();
				$sub_sqlss= $sub_sqls->fetch(PDO::FETCH_ASSOC);
				$sender_role_name = $sub_sqlss['id'];    
				 
				$sql_fetch = $this->db->prepare("SELECT * FROM director_principle_message WHERE  sms_sender_role = '".$sender_role_name."' && `flag` = 0 order by id DESC");
				$sql_fetch->execute();
				 if ($sql_fetch->rowCount() != 0) {  
					$x=0;   
					$row_gp = $sql_fetch->fetch(PDO::FETCH_ASSOC);
 						$sms_sender=$row_gp['sms_sender_role'];
							$sub_sql12 = $this->db->prepare("SELECT `role_name` FROM master_role where id='".$sms_sender."'");
							$sub_sql12->execute();
							$sub_sqls12= $sub_sql12->fetch(PDO::FETCH_ASSOC);
							$sender_role_name = $sub_sqls12['role_name'];
							
						$sms_to_role=$row_gp['sms_receive_role'];
						$sub_sql1 = $this->db->prepare("SELECT `role_name` FROM master_role where id='".$sms_to_role."'");
							$sub_sql1->execute();
							$sub_sqls1= $sub_sql1->fetch(PDO::FETCH_ASSOC);
							$sms_to_role_name = $sub_sqls1['role_name'];
						
						$login_id=$row_gp['login_id'];
							$sub_sql123 = $this->db->prepare("SELECT `user_name` FROM faculty_login where id='".$login_id."'");
							$sub_sql123->execute();
							$sub_sqls123= $sub_sql123->fetch(PDO::FETCH_ASSOC);
							$user_name = $sub_sqls123['user_name'];
						$date=date('Y-m-d',strtotime($row_gp['timestamp']));
						
						foreach($row_gp as $key=>$valye)	
						{

							$string_insert[$x][$key]=$row_gp[$key];
							$string_insert[$x]['sms_sender_role_name']=$sender_role_name;
							$string_insert[$x]['sms_receive_role_name']=$sms_to_role_name;
							$string_insert[$x]['sender_username']=$user_name;
							$string_insert[$x]['date']=$date;
if(!empty($row_gp ['pic'])){
				$string_insert[$x]['pic'] = $site_url."message/".$row_gp ['pic'];
				}else{
				$string_insert[$x]['pic'] = "";
				}

 						}
 					$result1 = array("director_principle_message" => $string_insert);
					$success = array('Type' => 'OK', "Error" => '', 'Responce' => $result1);
					$this->response($this->json($success), 200); 
				 }
				 else
				 {
					 $error = array('Type' => "Error", "Error" => "No data found", 'Response' => '');
					 $this->response($this->json($error), 200);
				 }
  		}
		else
		{
			$error = array('Type' => "Error", "Error" => "Please Provide Role Type to Get Data", 'Response' => '');
			$this->response($this->json($error), 200);
		}
  	}
//---- Remarks
	public function RemarksAction() 
	{
		global $link;
		include_once("common/global.inc.php");
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		if(isset($this->_request['response_type']))
		{
			$response_type=$this->_request['response_type'];
			//-- Response Type = 1 Insert  2 =  Fetch
			if($response_type==1)
			{//Insert
				$class_id=$this->_request['class_id'];
				$section_id=$this->_request['section_id'];/// YMD
 				$gread=$this->_request['gread'];
				$remark=$this->_request['remark'];
				$student_id=$this->_request['student_id'];
				$login_id=$this->_request['user_id'];
 				$student_ids=sizeof($student_id);
 				for($i=0; $i<$student_ids; $i++)
				{
					$sid=$student_id[$i];
 					$sql_insert = $this->db->prepare("INSERT into  remarks(class_id,section_id,student_id,gread,remark,login_id)VALUES(:class_id,:section_id,:student_id,:gread,:remark,:login_id)");
					$sql_insert->bindParam(":class_id", $class_id, PDO::PARAM_STR);
					$sql_insert->bindParam(":section_id", $section_id, PDO::PARAM_STR);
					$sql_insert->bindParam(":student_id", $sid, PDO::PARAM_STR);
					$sql_insert->bindParam(":gread", $gread, PDO::PARAM_STR);
					$sql_insert->bindParam(":remark", $remark, PDO::PARAM_STR);
					$sql_insert->bindParam(":login_id", $login_id, PDO::PARAM_STR);
					$sql_insert->execute();	
				}
				$success = array('status'=> true, "Error" => "Thank you remarks successfully submitted");
                $this->response($this->json($success), 200);
 			}
 			else if($response_type==2)
			{//Fetch 
				$student_id=$this->_request['student_id'];
				@$role_id=$this->_request['role_id'];
				if(!empty($role_id) && $role_id !=5)
				{			
					$sql_fetch = $this->db->prepare("SELECT * FROM remarks where login_id = '".$student_id."'  order by `id` DESC");
				}
				else
				{
					$sql_fetch = $this->db->prepare("SELECT * FROM remarks where student_id = '".$student_id."'  order by `id` DESC");
				}
 				$sql_fetch->execute();
				 if ($sql_fetch->rowCount() != 0) {  
				 	$x=0;   
					while($row_gp = $sql_fetch->fetch(PDO::FETCH_ASSOC)){

						     $student_id = $row_gp['student_id'];
							$sql_std = $this->db->prepare("SELECT `name` FROM login WHERE id='".$student_id."'");
							$sql_std->execute();
							$std = $sql_std->fetch(PDO::FETCH_ASSOC);
							$std_name=$std['name'];
						$class_id = $row_gp['class_id'];
							$sql_stds = $this->db->prepare("SELECT `class_name` FROM master_class WHERE id='".$class_id."'");
							$sql_stds->execute();
							$stds = $sql_stds->fetch(PDO::FETCH_ASSOC);
							$class_name=$stds['class_name'];
						$section_id = $row_gp['section_id'];
							$sql_std1 = $this->db->prepare("SELECT `section_name` FROM master_section WHERE id='".$section_id."'");
							$sql_std1->execute();
							$std1 = $sql_std1->fetch(PDO::FETCH_ASSOC);
							$section_name=$std1['section_name'];
$user_id=$row_gp['login_id'];
							$sub_sql1 = $this->db->prepare("SELECT `user_name` FROM faculty_login where id='".$user_id."'");
							$sub_sql1->execute();
							$sub_sqls1= $sub_sql1->fetch(PDO::FETCH_ASSOC);
							$user_name = $sub_sqls1['user_name'];


						foreach($row_gp as $key=>$valye)	
						{
							$string_insert[$x][$key]=$row_gp[$key];
						}
						$string_insert[$x]['class_name']=$class_name;
						$string_insert[$x]['section_name']=$section_name;
						$string_insert[$x]['student_name']=$std_name;$string_insert[$x]['teacher_name']=$user_name;
						$x++;
					} 
					 
					$result1 = array("remarks" => $string_insert);
					$success = array('Type' => 'OK', "Error" => '', 'Responce' => $result1);
					$this->response($this->json($success), 200);
				} 
				else {
					
					$error = array('Type' => "Error", "Error" => "No data found", 'Responce' => '');
					$this->response($this->json($error), 200);
				}				
 			}
			else
			{// INvalid
				$error = array('status' => false , "Error" => "Invalid Response Type", 'Responce' => '');
				$this->response($this->json($error), 200);	
			}
			
			
		}
		else
		{
			$error = array('status' => false , "Error" => "Please Provide Response Type to Get Data", 'Responce' => '');
			$this->response($this->json($error), 200);	
		}
		
	}

//--- Attendance data 
public function AttendanceData() 
	{
		include_once("common/global.inc.php");
		global $link;
 		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		 
		if(isset($this->_request['student_id']))
		{
			$student_id=$this->_request['student_id'];
			$cal_sql = $this->db->prepare("SELECT * FROM attendance where `student_id`='".$student_id."' ");
			$cal_sql->execute();
		    if($cal_sql->rowCount()>0)
			{
 			
				$total_month=12;
				$currnt_year=date('Y');
				for($x=1;$x<=$total_month;$x++)
				{
					$total_month_leave=0;
					$total_month_absent=0;
					$total_month_prsent=0;
					$total_month_working=0;
					$total_month_holiday=0;
					
					$first_date='01-'.$x.'-'.$currnt_year;
					$first_date=date('Y-m-d',strtotime($first_date));
					$last_date=date('Y-m-t',strtotime($first_date));
					$currentTime = strtotime($first_date);
					$endTime = strtotime($last_date);
					$k=0; 
					$result = array();
					while ($currentTime <= $endTime) 
					{
					  if (date('N', $currentTime) < 8) 
					  {
						$result[] = date('Y-m-d', $currentTime);
					  }
					  $currentTime = strtotime('+1 day', $currentTime);
					}
					$all_result=array();
					foreach($result as $date)
					{
						$date;
						$cal_sqld = $this->db->prepare("SELECT * FROM attendance where `student_id`='".$student_id."' AND `curent_date`='".$date."' ");
						$cal_sqld->execute();
						$cal_sql1= $cal_sqld->fetchALL(PDO::FETCH_ASSOC);
						$results=array();
 						$holoday = $this->db->prepare("SELECT `id` FROM acedmic_calendar where `date`='".$date."' AND `category_id`='2' ");
						$holoday->execute();
						 $total_holedayofdate=$holoday->rowCount();
						foreach($cal_sql1 as $cal_sql11)
						{
							$y=0;
 							$student_id = $cal_sql11['student_id'];
							$sql_std = $this->db->prepare("SELECT `name` FROM login WHERE id='".$student_id."'");
							$sql_std->execute();
							$std = $sql_std->fetch(PDO::FETCH_ASSOC);
							$std_name=$std['name'];
							
							$login_id=$cal_sql11['user_id'];
							$sub_sql123 = $this->db->prepare("SELECT `user_name` FROM faculty_login where id='".$login_id."'");
							$sub_sql123->execute();
							$sub_sqls123= $sub_sql123->fetch(PDO::FETCH_ASSOC);
							$user_name = $sub_sqls123['user_name'];
							$attendance_mark=$cal_sql11['attendance_mark'];
							$attendance_date=$cal_sql11['attendance_date'];
							$dat=date('d',strtotime($attendance_date));
							$day=date('D',strtotime($attendance_date));
							$month=date('M',strtotime($attendance_date));
							$Year=date('Y',strtotime($attendance_date));
							$attendance_mark=$cal_sql11['attendance_mark'];
							if($attendance_mark==1){$attend='Present';}
							else if($attendance_mark==2){$attend='Absent';}
							else if($attendance_mark==3){$attend='Leave';}
else { }
							
							$results = array(
								'date' => $dat,
								'day' => $day,
								'month' => $month,
								'year' => $Year,
'attendance_date' => $attendance_date,
								'attendance_mark' => $attend
 							);
							//-- Present absend and leave
								if($attendance_mark==1){
									$total_month_prsent++;
								}
								if($attendance_mark==2){
									$total_month_absent++;
								}
								if($attendance_mark==3){
									$total_month_leave++;
								}
 							$y++;
							$all_result[]=$results;
						}
						//-- Holiday of same date
						$total_month_holiday+=$total_holedayofdate;
					}
					 
					$response[]=array(
						'month'=> $x,
						'total_present'=> $total_month_prsent,
						'total_absent'=> $total_month_absent,
						'total_leave'=> $total_month_leave,
						'total_working'=> '',
						'total_holiday'=> $total_month_holiday,
						'result'=>$all_result,
 					);
 				}
				$error = array('status' => true, "Error" => "",'Response' => $response);
				$this->response($this->json($error), 200);
 			}
			else
			{
				$error = array('status' => false, "Error" => "Student not found",'Responce' => '');
				$this->response($this->json($error), 200);
			}
		}
		else
		{
			$error = array('status' => false, "Error" => "Provide Student Id",'Responce' => '');
			$this->response($this->json($error), 200);
		}
	}
//- Notification DATA
	public function NotificationData() 
	{
		global $link;
		include_once("common/global.inc.php");
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		@$user_id = $this->_request['user_id'];
		@$role_id = $this->_request['role_id'];
		$sql_fetch = $this->db->prepare("SELECT * FROM notification where `user_id` = '".$user_id."' AND `role_id` = '".$role_id."' order by `id` DESC ");
		$sql_fetch->execute();
		 if ($sql_fetch->rowCount() != 0) {  
			$x=0;   
			while($row_gp = $sql_fetch->fetch(PDO::FETCH_ASSOC)){
				foreach($row_gp as $key=>$valye)	
				{
					$string_insert[$x][$key]=$row_gp[$key];
				}
				$x++;
			}
			 
			$result1 = array("notification" => $string_insert);
			$success = array('Type' => 'OK', "Error" => '', 'Response' => $result1);
			$this->response($this->json($success), 200);
		} 
		else {
			
			$error = array('Type' => "Error", "Error" => "No data found", 'Response' => '');
			$this->response($this->json($error), 200);
		}
 	}
	
//- Notification DATA
	public function TextData() 
	{
		global $link;
		include_once("common/global.inc.php");
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
  		$sql_fetch = $this->db->prepare("SELECT * FROM `text_message` order by `id` DESC limit 1 ");
		$sql_fetch->execute();
		 if ($sql_fetch->rowCount() != 0) {  
			$x=0;   
			while($row_gp = $sql_fetch->fetch(PDO::FETCH_ASSOC)){
				foreach($row_gp as $key=>$valye)	
				{
					$file_name=$row_gp['text_image'];  
					$FilePath='';
					if(!empty($file_name))
					{
						$FilePath = $site_url."text_message/".$file_name;
						$string_insert[$x]['image_fullpath']=$FilePath;
					}
					$string_insert[$x][$key]=$row_gp[$key];
				}
				$x++;
			}
 			//$result1 = array("text" => $string_insert);
			$success = array('status' => true, "Error" => '', 'Response' => $string_insert);
			$this->response($this->json($success), 200);
		} 
		else {
			
			$error = array('status' => false, "Error" => "No data found", 'Response' => '');
			$this->response($this->json($error), 200);
		}
 	}
	///---- Remarks
    public function ExtraClassData() 
    {
		global $link;
		include_once("common/global.inc.php");
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		 			 
 			 
			$class_id=$this->_request['class_id'];
			$section_id=$this->_request['section_id'];
				$sql_fetch = $this->db->prepare("SELECT * FROM extra_classes where class_id = '".$class_id."' && section_id = '".$section_id."'  order by `id` DESC");
 				$sql_fetch->execute();
				 if ($sql_fetch->rowCount() != 0) {  
				 	$x=0;   
					while($row_gp = $sql_fetch->fetch(PDO::FETCH_ASSOC)){

						 
						$class_id = $row_gp['class_id'];
							$sql_stds = $this->db->prepare("SELECT `class_name` FROM master_class WHERE id='".$class_id."'");
							$sql_stds->execute();
							$stds = $sql_stds->fetch(PDO::FETCH_ASSOC);
							$class_name=$stds['class_name'];
						$subject_id = $row_gp['subject_id'];
							$sql_stds = $this->db->prepare("SELECT `subject_name` FROM master_subject WHERE id='".$subject_id."'");
							$sql_stds->execute();
							$stds = $sql_stds->fetch(PDO::FETCH_ASSOC);
							$subject_name=$stds['subject_name'];
						$section_id = $row_gp['section_id'];
							$sql_std1 = $this->db->prepare("SELECT `section_name` FROM master_section WHERE id='".$section_id."'");
							$sql_std1->execute();
							$std1 = $sql_std1->fetch(PDO::FETCH_ASSOC);
							$section_name=$std1['section_name'];
 $time= date('h:i', strtotime($row_gp['time']));

						foreach($row_gp as $key=>$valye)	
						{
							$string_insert[$x][$key]=$row_gp[$key];
						}
$string_insert[$x]['time']=$time;
						$string_insert[$x]['class_name']=$class_name;
						$string_insert[$x]['section_name']=$section_name;$string_insert[$x]['subject_name']=$subject_name;
 						$x++;
					} 
					 
					$result1 = array("extra_class" => $string_insert);
					$success = array('Type' => 'OK', "Error" => '', 'Responce' => $result1);
					$this->response($this->json($success), 200);
				} 
				else {
					
					$error = array('Type' => "Error", "Error" => "No data found", 'Responce' => '');
					$this->response($this->json($error), 200);
				}				
  		
	}

        public function ExamTimeTable() 
	{
		include_once("common/global.inc.php");
        global $link;
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
			$class_id = $this->_request['class_id'];
			$tt_sql = $this->db->prepare("SELECT * FROM exam_time_table where class_id='".$class_id."' AND flag='0' order by exam_date Asc ");
			$tt_sql->execute();
			if($tt_sql->rowCount()>0)
			{
				$resultArray=array();
				$f_timtbl = $tt_sql->fetchALL(PDO::FETCH_ASSOC);
				foreach($f_timtbl as $f_timtbl1)
					{
						$from_time=$f_timtbl1['from_time'];
						$to_time=$f_timtbl1['to_time'];
						$room_no=$f_timtbl1['room_no'];
						$exam_date=$f_timtbl1['exam_date'];
						$exam_day=date('D',strtotime($exam_date)); 
 						 
						$subject_id=$f_timtbl1['subject_id'];
							$sql = $this->db->prepare("SELECT `subject_name` FROM master_subject WHERE id='".$subject_id."'");
							$sql->execute();
							$stds = $sql->fetch(PDO::FETCH_ASSOC);
							$subject_name=$stds['subject_name'];
							$resultArray['subject']=$subject_name;

						$resultArray['from']=$from_time;
						$resultArray['to']=$to_time;
						$resultArray['exam_day']=$exam_day;
						$resultArray['room_no']=$room_no;
						$result[$exam_date]=($resultArray);
					}
					$success = array('status'=> true, "Error" => "",'responce' => $result);
					$this->response($this->json($success), 200);   	
		} 
	}

	 
	public function NoteData() 
	{
		include_once("common/global.inc.php");
        global $link;
		if ($this->get_request_method() != "POST") 
			{
					
				$this->response('', 406);
			}
			 
				$note_sql = $this->db->prepare("SELECT * FROM note order by id DESC");
				$note_sql->execute();
				if($note_sql->rowCount()>0)
				{
				  $resultArray=array();
					$row_gp = $note_sql->fetchALL(PDO::FETCH_ASSOC);
					 $x=0;
					 foreach($row_gp as $key=>$valye)	
							{
								$curent_date=$valye['curent_date'];
								$c_date=date('d-m-Y',strtotime($curent_date));
								$string_insert[$key]=$row_gp[$key];
								$string_insert[$x]['date']=$c_date;
								  
							$x++;
							}
							
							$result = array("note"=> $string_insert);
							$success = array('status'=> true, "Error" => "",'responce' => $result);
							$this->response($this->json($success), 200);   	
				}
				else
				{
							$success = array('status'=> false, "Error" => "No data found",'responce' =>'');
							$this->response($this->json($success), 200); 
				}
	}
public function AchiveMentData() 
	{
		include_once("common/global.inc.php");
        global $link;
		if ($this->get_request_method() != "POST") 
		{
			$this->response('', 406);
		}
			 
		$note_sql = $this->db->prepare("SELECT * FROM achivements order by id DESC Limit 5");
		$note_sql->execute();
		if($note_sql->rowCount()>0)
		{
		    $resultArray=array();
			$row_gp = $note_sql->fetchALL(PDO::FETCH_ASSOC);
			 $x=0;
			 foreach($row_gp as $key=>$valye)	
			 {
					$student_id=$valye['student_id'];
					$sql_stds = $this->db->prepare("SELECT `name`,`image` FROM login WHERE id='".$student_id."'");
					$sql_stds->execute();
					$stds = $sql_stds->fetch(PDO::FETCH_ASSOC);
					$name=$stds['name'];
					$image=$stds['image'];
				if(!empty($image)){
				$FilePath = $site_url."user/".$image;
				}else{
				$FilePath = "";
				}
				
				$curent_date=$valye['curent_date'];
				$c_date=date('d-m-Y',strtotime($curent_date));
				$string_insert[$key]=$row_gp[$key];
				$string_insert[$x]['date']=$c_date;
				$string_insert[$x]['student_name']=$name;
				$string_insert[$x]['student_image']=$FilePath;
 				  
			 $x++;
			 }
			$result = array("achivements"=> $string_insert);
			$success = array('status'=> true, "Error" => "",'responce' => $result);
			$this->response($this->json($success), 200);   	
		}
		else
		{
			$success = array('status'=> false, "Error" => "No data found",'responce' =>'');
			$this->response($this->json($success), 200); 
		}
	}
	public function SportMaster()
	{
		include_once("common/global.inc.php");
        global $link;
		if ($this->get_request_method() != "POST") 
		{
			$this->response('', 406);
		}
		$sql = $this->db->prepare("SELECT * FROM master_sports where `flag`=0 ");
		$sql->execute();
		if($sql->rowCount()>0)
		{
			$row_gps = $sql->fetchALL(PDO::FETCH_ASSOC);
			$x=0;
			foreach($row_gps as $key=>$valye)	
			{
				$image=$valye['image'];
					
				if(!empty($image)){
					$FilePath = $site_url.$image;
				}else{
					$FilePath = "";
				}
				$string_insert[$key]=$row_gps[$key];
				$string_insert['image']=$FilePath;
				$x++;
			}
			$result = array("master_sports"=> $string_insert);
			$success = array('status'=> true, "Error" => "",'responce' => $result);
			$this->response($this->json($success), 200); 
		}
		else
		{
			$success = array('status'=> false, "Error" => "No data found",'responce' =>'');
			$this->response($this->json($success), 200); 
		}
	}
	public function AboutUs()
	{
		include_once("common/global.inc.php");
        global $link;
		if ($this->get_request_method() != "POST") 
		{
			$this->response('', 406);
		}
		$sql = $this->db->prepare("SELECT * FROM about_us where `flag`= 0 limit 1");
		$sql->execute();
		if($sql->rowCount()>0)
		{
			$row_gps = $sql->fetchALL(PDO::FETCH_ASSOC);
			$x=0;
			foreach($row_gps as $key=>$valye)	
			{
				$image=$valye['image'];
				$SchoolAddress=$valye['SchoolAddress'];
$Schoolpolicy=$valye['Schoolpolicy'];
$SchoolContact=$valye['SchoolContact'];
 
 
				if(!empty($image)){
					$FilePath = $site_url.$image;
				}else{
					$FilePath = "";
				}
				 
			}
			$result=array('SchoolAddress'=>$SchoolAddress,'Schoolpolicy'=>$Schoolpolicy,'SchoolContact'=>$SchoolContact,'image'=>$FilePath) ;
			$success = array('status'=> true, "Error" => "","about_us"=> $result);
			$this->response($this->json($success), 200); 
		}
		else
		{
			$success = array('status'=> false, "Error" => "No data found",'responce' =>'');
			$this->response($this->json($success), 200); 
		}
	}
	public function SportGallery() 
	{
		include_once("common/global.inc.php");
        global $link;
		if ($this->get_request_method() != "POST") 
		{
			$this->response('', 406);
		}
		$sport_type = $this->_request['sport_type'];
		$sql = $this->db->prepare("SELECT * FROM master_sports where `sports_name` like '%$sport_type%' ");
		$sql->execute();
		$row_gps = $sql->fetchALL(PDO::FETCH_ASSOC);
		$sport_id=$row_gps[0]['id']; 
		$sport_name=$row_gps[0]['sports_name']; 
		
		 	 
		$note_sql = $this->db->prepare("SELECT * FROM subsports_gallery where `sports_id` = '$sport_id'");
		$note_sql->execute();
		if($note_sql->rowCount()>0)
		{
		    $resultArray=array();
			$row_gp = $note_sql->fetchALL(PDO::FETCH_ASSOC);
			 $x=0;
			 foreach($row_gp as $key=>$valye)	
			 {
				$image=$valye['gallery_pic'];
					
				if(!empty($image)){
					$FilePath = $site_url.$image;
				}else{
					$FilePath = "";
				}
				
				$curent_date=$valye['curent_date'];
				$c_date=date('d-m-Y',strtotime($curent_date));
				$string_insert[$key]=$row_gp[$key];
				$string_insert[$x]['date']=$c_date;
				$string_insert[$x]['sport_name']=$sport_name;
				$string_insert[$x]['gallery_pic']=$FilePath;
 				  
			 $x++;
			 }
			$result = array("sportgallery"=> $string_insert);
			$success = array('status'=> true, "Error" => "",'responce' => $result);
			$this->response($this->json($success), 200);   	
		}
		else
		{
			$success = array('status'=> false, "Error" => "No data found",'responce' =>'');
			$this->response($this->json($success), 200); 
		}
	}
	public function ClassTest() 
	{
		include_once("common/global.inc.php");
        global $link;
		if ($this->get_request_method() != "POST") 
		{
			$this->response('', 406);
		}
		$student_id = $this->_request['student_id'];
		
		$sql = $this->db->prepare("SELECT `class_id`,`section_id`,`name` FROM login where `id` = '$student_id' ");
		$sql->execute();
		$row_gps = $sql->fetchALL(PDO::FETCH_ASSOC);
		$section_id=$row_gps[0]['section_id']; 
		$class_id=$row_gps[0]['class_id'];
		$name=$row_gps[0]['name'];  
		
		 	 
		$note_sql = $this->db->prepare("SELECT * FROM student_marks where `student_id` = '$student_id' && `class_id` = '$class_id' && `section_id` = '$section_id' order by `subject_id` ASC");
		$note_sql->execute();
		if($note_sql->rowCount()>0)
		{
		    $resultArray=array();
			$row_gp = $note_sql->fetchALL(PDO::FETCH_ASSOC);
			 $x=0;
			 foreach($row_gp as $key=>$valye)	
			 {
				 
				
				$subject_id=$valye['subject_id'];
					$sql_stds = $this->db->prepare("SELECT `subject_name` FROM master_subject WHERE id='".$subject_id."'");
					$sql_stds->execute();
					$stds = $sql_stds->fetch(PDO::FETCH_ASSOC);
					$subject_name=$stds['subject_name'];
				$exam_type_id=$valye['exam_type_id'];
					$sql_stdsa = $this->db->prepare("SELECT `exam_type` FROM master_exam WHERE id='".$exam_type_id."'");
					$sql_stdsa->execute();
					$stdsa = $sql_stdsa->fetch(PDO::FETCH_ASSOC);
					$exam_type=$stdsa['exam_type'];
				$teacher_id=$valye['teacher_id'];
					$sql_stds = $this->db->prepare("SELECT `user_name` from faculty_login WHERE id='".$teacher_id."'");
					$sql_stds->execute();
					$stds = $sql_stds->fetch(PDO::FETCH_ASSOC);
					$Tname=$stds['user_name'];
				$max_marks=$valye['max_marks'];
				$obtained_marks=$valye['obtained_marks'];
					
 				 
				$string_insert[$x]['student_name']=$name;
				$string_insert[$x]['marks']=$obtained_marks.'/'.$max_marks;
				$string_insert[$x]['max_marks']=$max_marks;
				$string_insert[$x]['obtained_marks']=$obtained_marks;
				$string_insert[$x]['subject_name']=$subject_name;
				$string_insert[$x]['student_id']=$student_id;
				$string_insert[$x]['exam_type']=$exam_type;
				$string_insert[$x]['teacher_name']=$Tname;
$string_insert[$x]['test_date']=$valye['test_date'];
 				  
			 $x++;
			 }
			$result = array("classtest"=> $string_insert);
			$success = array('status'=> true, "Error" => "",'responce' => $result);
			$this->response($this->json($success), 200);   	
		}
		else
		{
			$success = array('status'=> false, "Error" => "No data found",'responce' =>'');
			$this->response($this->json($success), 200); 
		}
	}
	public function ClassTestData() 
	{
		include_once("common/global.inc.php");
        global $link;
		if ($this->get_request_method() != "POST") 
		{
			$this->response('', 406);
		}
		if(!empty($this->_request['class_id']))
		{
			$class_id = $this->_request['class_id'];
			if(!empty($this->_request['section_id']))
			{
				$section_id = $this->_request['section_id'];
				if(!empty($this->_request['subject_id']))
				{
					$subject_id = $this->_request['subject_id'];
					if(!empty($this->_request['term_name']))
					{
						$term_name = $this->_request['term_name'];
						if(!empty($this->_request['student_id']))
						{
							$student_id = $this->_request['student_id'];
							if(!empty($this->_request['marks']))
							{
								$marks = $this->_request['marks'];
								if(!empty($this->_request['max_marks']))
								{
									$max_marks = $this->_request['max_marks'];
									if(!empty($this->_request['teacher_id']))
									{	
										$teacher_id = $this->_request['teacher_id'];
										if(!empty($this->_request['test_taken']))
										{	
											$test_date= date('Y-m-d', strtotime($this->_request['test_taken']));
	
											//--- Exam Term Entry
												$sql_stdsa = $this->db->prepare("SELECT `exam_type`,`id` FROM master_exam WHERE exam_type='".$term_name."' && class_id='".$class_id."' && section_id='".$section_id."' && subject_id='".$subject_id."'");
												$sql_stdsa->execute();
												if($sql_stdsa->rowCount()>0)
												{
													$stdsa = $sql_stdsa->fetch(PDO::FETCH_ASSOC);
													$exam_term_id=$stdsa['id'];
												}
												else
												{
													$exsubmit = $this->db->prepare("insert into `master_exam` set `exam_type` = '$term_name' ,`class_id` = '$class_id',`section_id` = '$section_id',`subject_id` = '$subject_id' ");
													$exsubmit->execute();
													$exam_term_id = $this->db->lastInsertId();
												}
											//--
											$CountStudent=sizeof($student_id); 
											if($CountStudent>0)
											{
												$StudentID=0;
												$mark_id=0;
												for($i=0; $i<$CountStudent; $i++)
												{ 
													$StudentID=$student_id[$i];
													$Marks=$marks[$i];
												
													$note_sql = $this->db->prepare("insert into `student_marks` set `student_id` = '$StudentID' , `class_id` = '$class_id' , `section_id` = '$section_id' , `subject_id` = '$subject_id' , `max_marks` = '$max_marks' , `obtained_marks` = '$Marks' , `teacher_id` = '$teacher_id' , `exam_type_id` = '$exam_term_id' , `test_date` = '$test_date'");
													$note_sql->execute();			
												}
												//$Rarray=array('class_id' => $class_id , 'section_id' => $section_id , 'subject_id' => $subject_id , 'max_marks' => $max_marks , 'teacher_id' =>$teacher_id , 'term_name' => $term_name , 'test_date' => $test_date, 'student_id' => $student_id , 'marks' => $marks);
												//$success = array('status'=> true, "Error" => "Data Successfully Submitted",'responce' => $Rarray);
												$success = array('status'=> true, "Error" => "Data Successfully Submitted",'responce' => '');
												$this->response($this->json($success), 200);   	
											}
											else
											{
												$success = array('status'=> false, "Error" => "No data found",'responce' =>'');
												$this->response($this->json($success), 200); 
											}
										}
										else
										{
											$success = array('status'=> false, "Error" => "Test date not found",'responce' =>'');
											$this->response($this->json($success), 200); 
										}
			
									}
									else
									{
										$success = array('status'=> false, "Error" => "Teacher Id not found",'responce' =>'');
										$this->response($this->json($success), 200); 
									}
								}
								else
								{
									$success = array('status'=> false, "Error" => "Max marks not found",'responce' =>'');
									$this->response($this->json($success), 200); 
								}
							}
							else
							{
								$success = array('status'=> false, "Error" => "Marks not found",'responce' =>'');
								$this->response($this->json($success), 200); 
							}
						}
						else
						{
							$success = array('status'=> false, "Error" => "Student Id not found",'responce' =>'');
							$this->response($this->json($success), 200); 
						}
					}
					else
					{
						$success = array('status'=> false, "Error" => "Term Name not found",'responce' =>'');
						$this->response($this->json($success), 200); 
					}
				}
				else
				{
					$success = array('status'=> false, "Error" => "Subject Id not found",'responce' =>'');
					$this->response($this->json($success), 200); 
				}
			}
			else
			{
				$success = array('status'=> false, "Error" => "Section Id not found",'responce' =>'');
				$this->response($this->json($success), 200); 
			}
		}
		else
		{
			$success = array('status'=> false, "Error" => "Class ID not found",'responce' =>'');
			$this->response($this->json($success), 200); 
		}
		
		
	}

	public function ClassTestDataUpdate() 
	{
		include_once("common/global.inc.php");
        global $link;
		if ($this->get_request_method() != "POST") 
		{
			$this->response('', 406);
		}
		if(!empty($this->_request['class_id']))
		{
			$class_id = $this->_request['class_id'];
			if(!empty($this->_request['section_id']))
			{
				$section_id = $this->_request['section_id'];
				if(!empty($this->_request['subject_id']))
				{
					$subject_id = $this->_request['subject_id'];
					if(!empty($this->_request['exam_type_id']))
					{
						$exam_type_id = $this->_request['exam_type_id'];
						if(!empty($this->_request['student_id']))
						{
							$student_id = $this->_request['student_id'];
							if(!empty($this->_request['marks']))
							{
								$marks = $this->_request['marks'];
								if(!empty($this->_request['teacher_id']))
								{	
									$teacher_id = $this->_request['teacher_id'];
									if(!empty($this->_request['test_taken']))
									{	
										$test_date= date('Y-m-d', strtotime($this->_request['test_taken']));
																					 
										$CountStudent=sizeof($student_id); 
										if($CountStudent>0)
										{
											$StudentID=0;
											$mark_id=0;
											for($i=0; $i<$CountStudent; $i++)
											{ 
												$StudentID=$student_id[$i];
												$Marks=$marks[$i];
							 					if($Marks == '-'){}
												else
												{
							 					$note_sql = $this->db->prepare("update `student_marks` set  `test_date` = '$test_date' , `obtained_marks` = '$Marks'    WHERE  `student_id` = '$StudentID' && `class_id` = '$class_id' && `section_id` = '$section_id' && `subject_id` = '$subject_id' && `teacher_id` = '$teacher_id' && `exam_type_id` = '$exam_type_id'");
												$note_sql->execute();	
												}
											}
											
											$success = array('status'=> true, "Error" => "Data Successfully Update",'responce' => '');
											$this->response($this->json($success), 200);   	
										}
										else
										{
											$success = array('status'=> false, "Error" => "No data found",'responce' =>'');
											$this->response($this->json($success), 200); 
										}
									}
									else
									{
										$success = array('status'=> false, "Error" => "Test date not found",'responce' =>'');
										$this->response($this->json($success), 200); 
									}
								}
								else
								{
									$success = array('status'=> false, "Error" => "Teacher Id not found",'responce' =>'');
									$this->response($this->json($success), 200); 
								}
							}
							else
							{
								$success = array('status'=> false, "Error" => "Marks not found",'responce' =>'');
								$this->response($this->json($success), 200); 
							}
						}
						else
						{
							$success = array('status'=> false, "Error" => "Student Id not found",'responce' =>'');
							$this->response($this->json($success), 200); 
						}
					}
					else
					{
						$success = array('status'=> false, "Error" => "Term Name not found",'responce' =>'');
						$this->response($this->json($success), 200); 
					}
				}
				else
				{
					$success = array('status'=> false, "Error" => "Subject Id not found",'responce' =>'');
					$this->response($this->json($success), 200); 
				}
			}
			else
			{
				$success = array('status'=> false, "Error" => "Section Id not found",'responce' =>'');
				$this->response($this->json($success), 200); 
			}
		}
		else
		{
			$success = array('status'=> false, "Error" => "Class ID not found",'responce' =>'');
			$this->response($this->json($success), 200); 
		}
	}
public function ClassTestTeacher() 
	{
		include_once("common/global.inc.php");
        global $link;
		if ($this->get_request_method() != "POST") 
		{
			$this->response('', 406);
		}
		$teacher_id = $this->_request['teacher_id'];
		   	 
		$note_sql = $this->db->prepare("SELECT DISTINCT(exam_type_id) FROM student_marks where `teacher_id` = '$teacher_id' order by `test_date` DESC");
		$note_sql->execute();
		if($note_sql->rowCount()>0)
		{
		    $resultArray=array();
			$row_gp = $note_sql->fetchALL(PDO::FETCH_ASSOC);
 			 $x=0;
			 foreach($row_gp as $key=>$valye)	
			 { 
				$exam_type_id=$valye['exam_type_id'];
				$note_sql1 = $this->db->prepare("SELECT * FROM student_marks where `teacher_id` = '$teacher_id' && `exam_type_id` = '$exam_type_id' order by `test_date` DESC");
				$note_sql1->execute();
				$row_gp1 = $note_sql1->fetchALL(PDO::FETCH_ASSOC);
				$exam_type_ids=$row_gp1[0]['exam_type_id'];
					$sql_stdsa = $this->db->prepare("SELECT `exam_type` FROM master_exam WHERE id='".$exam_type_ids."'");
					$sql_stdsa->execute();
					$stdsa = $sql_stdsa->fetch(PDO::FETCH_ASSOC);
					$exam_type=$stdsa['exam_type'];
				$teacher_id=$row_gp1[0]['teacher_id'];
					$sql_stds = $this->db->prepare("SELECT `user_name` from faculty_login WHERE id='".$teacher_id."'");
					$sql_stds->execute();
					$stds = $sql_stds->fetch(PDO::FETCH_ASSOC);
					$Tname=$stds['user_name'];
				$subject_id=$row_gp1[0]['subject_id'];
					$sql_stds = $this->db->prepare("SELECT `subject_name` FROM master_subject WHERE id='".$subject_id."'");
					$sql_stds->execute();
					$stds = $sql_stds->fetch(PDO::FETCH_ASSOC);
					$subject_name=$stds['subject_name'];
			 $class_id=$row_gp1[0]['class_id'];
$sql_stds = $this->db->prepare("SELECT `class_name` FROM master_class WHERE id='".$class_id."'");
					$sql_stds->execute();
					$stds = $sql_stds->fetch(PDO::FETCH_ASSOC);
					$class_name=$stds['class_name'];
 
				$test_date=$row_gp1[0]['test_date'];
				if($test_date=='0000-00-00' || $test_date=='1970-01-01'){$test_date='';}
				else {$test_date=date('d-m-Y',strtotime($test_date));}

			 	$string_insert[$key]=$row_gp[$key];
			 	$string_insert[$x]['exam_type']=$exam_type;
			 	$string_insert[$x]['subject_name']=$subject_name;
				$string_insert[$x]['test_date']=$test_date;
$string_insert[$x]['class_id']=$class_name;
 
				$string_insert[$x]['teacher_id']=$teacher_id;
				
 			 $x++;
			 }
			$result = array("classtest"=> $string_insert);
			$success = array('status'=> true, "Error" => "",'responce' => $result);
			$this->response($this->json($success), 200);   	
		}
		else
		{
			$success = array('status'=> false, "Error" => "No data found",'responce' =>'');
			$this->response($this->json($success), 200); 
		}
	}

public function ClassTestTeacherFetch() 
	{
		include_once("common/global.inc.php");
        global $link;
		if ($this->get_request_method() != "POST") 
		{
			$this->response('', 406);
		}
		$teacher_id = $this->_request['teacher_id'];
		$exam_type_id = $this->_request['exam_type_id'];
 		 	 
		$note_sql = $this->db->prepare("SELECT * FROM student_marks where `teacher_id` = '$teacher_id' && `exam_type_id` = '$exam_type_id' order by `test_date` DESC");
		$note_sql->execute();
		if($note_sql->rowCount()>0)
		{
		    $resultArray=array();
			$row_gp = $note_sql->fetchALL(PDO::FETCH_ASSOC);
			 $x=0;
			 foreach($row_gp as $key=>$valye)	
			 {
				$subject_id=$valye['subject_id'];
					$sql_stds = $this->db->prepare("SELECT `subject_name` FROM master_subject WHERE id='".$subject_id."'");
					$sql_stds->execute();
					$stds = $sql_stds->fetch(PDO::FETCH_ASSOC);
					$subject_name=$stds['subject_name'];
				$student_id=$valye['student_id'];
					$sql = $this->db->prepare("SELECT `class_id`,`section_id`,`name` FROM login where `id` = '$student_id' ");
					$sql->execute();
					$row_gps = $sql->fetchALL(PDO::FETCH_ASSOC);
					$section_id=$row_gps[0]['section_id']; 
					$class_id=$row_gps[0]['class_id'];
					$name=$row_gps[0]['name']; 
		
				$exam_type_id=$valye['exam_type_id'];
					$sql_stdsa = $this->db->prepare("SELECT `exam_type` FROM master_exam WHERE id='".$exam_type_id."'");
					$sql_stdsa->execute();
					$stdsa = $sql_stdsa->fetch(PDO::FETCH_ASSOC);
					$exam_type=$stdsa['exam_type'];
				$teacher_id=$valye['teacher_id'];
					$sql_stds = $this->db->prepare("SELECT `user_name` from faculty_login WHERE id='".$teacher_id."'");
					$sql_stds->execute();
					$stds = $sql_stds->fetch(PDO::FETCH_ASSOC);
					$Tname=$stds['user_name'];
					
				$max_marks=$valye['max_marks'];
				$obtained_marks=$valye['obtained_marks'];
				$test_date=$valye['test_date'];
				if($test_date=='0000-00-00' || $test_date=='1970-01-01'){$test_date='';}
				else {$test_date=date('d-m-Y',strtotime($test_date));}

 				//$string_insert[$key]=$row_gp[$key]; 
				$string_insert[$x]['student_name']=$name;
				$string_insert[$x]['marks']=$obtained_marks.'/'.$max_marks;
				$string_insert[$x]['max_marks']=$max_marks;
				$string_insert[$x]['obtained_marks']=$obtained_marks;
				$string_insert[$x]['student_id']=$student_id;
				
$class_id=$valye['class_id'];
				$section_id=$valye['section_id'];
				$FirstArray['class_id']=$class_id;

				$FirstArray['section_id']=$section_id;

				$FirstArray['subject_id']=$subject_id;
				$FirstArray['subject_name']=$subject_name;
				
				$FirstArray['exam_type_id']=$exam_type_id;
				$FirstArray['exam_type']=$exam_type;
				
				$FirstArray['teacher_id']=$teacher_id;
				$FirstArray['Tname']=$Tname;
				
 				$FirstArray['test_date']=$test_date; 
				
			 $x++;
			 }
			 $FirstArray['data']=$string_insert; 
 			 
			$result = array("classtest"=> $FirstArray);
			$success = array('status'=> true, "Error" => "",'responce' => $result);
			$this->response($this->json($success), 200);   	
		}
		else
		{
			$success = array('status'=> false, "Error" => "No data found",'responce' =>'');
			$this->response($this->json($success), 200); 
		}
	}
	public function ClassWiseSubjectList()
	{
		if ($this->get_request_method() != "POST") {
			$this->response('', 406);
		}
		$class_id = $this->_request['class_id'];
		$section_id = $this->_request['section_id'];
if(!empty($class_id) && !empty($section_id ))
{	
		$class_sql = $this->db->prepare("SELECT * FROM master_class where `id` = $class_id  && `flag` = 0");
		$class_sql->execute();
		if($class_sql->rowCount()>0)
		{
			$class_sqls = $class_sql->fetchALL(PDO::FETCH_ASSOC);
			$class_name=$class_sqls[0]['class_name'];
			
			$sql_std1 = $this->db->prepare("SELECT `section_name` FROM master_section WHERE id='".$section_id."'");
			$sql_std1->execute();
			$std1 = $sql_std1->fetch(PDO::FETCH_ASSOC);
			$section_name=$std1['section_name'];
		 
		//---- SUBJECT MAPPING
				$subMap = $this->db->prepare("SELECT * FROM subject_mapping where class_id='".$class_id."' AND section_id='".$section_id."'");
				$subMap->execute();
				$DataSubMap = $subMap->fetchALL(PDO::FETCH_ASSOC);
				$subject_map=array();
				 foreach($DataSubMap as $data)
				 {
					$subject_ids=$data['subject_id'];
					$exploadeSub=explode(',',$subject_ids);
					$x=0;
					foreach($exploadeSub as $onebyone)
					{
						$onebyone;
						$subMap1 = $this->db->prepare("SELECT * FROM master_subject where id='".$onebyone."'");
						$subMap1->execute();
						$DataSubMap1 = $subMap1->fetchALL(PDO::FETCH_ASSOC);
						$sub_name=$DataSubMap1[0]['subject_name'];
						$subject_map[$x]['subject_id']=$onebyone;
						$subject_map[$x]['subject_name']=$sub_name;
						$x++;
					}
				 }
				//-----END	
				$result[] = array('class_id' => $class_id,
					'class_name' => $class_name,
					'section_id' => $section_id,
					'section_name' => $section_name,
					'assign_subject' => $subject_map);
					unset($section);
	 
			$success = array('status'=> true, "Error" => "",'class_section_roles' => $result);
			$this->response($this->json($success), 200);
		}
		else
		{
			$success = array('status'=> false, "Error" => "No data found",'class_section_roles' => '');
			$this->response($this->json($success), 200);
		}
}
else
{
$class_sql = $this->db->prepare("SELECT * FROM master_class where `flag` = 0");
		$class_sql->execute();
		if($class_sql->rowCount()>0)
		{
			$class_sqls = $class_sql->fetchALL(PDO::FETCH_ASSOC);
$class_Array=array();
foreach($class_sqls as $class_sql)
	        {
			$class_name=$class_sql['class_name'];
$cid=$class_sql['id'];
			
$devide_sql = $this->db->prepare("SELECT * FROM class_section where class_id='".$cid."'  ");
		$devide_sql->execute();
		$devide_sqls = $devide_sql->fetchALL(PDO::FETCH_ASSOC);
		$section_array=array();
		foreach($devide_sqls as $devide_sqls_data)
	        {
		$did=$devide_sqls_data['id'];
		$sid=$devide_sqls_data['section_id'];
		 $sql_std1 = $this->db->prepare("SELECT `section_name` FROM master_section WHERE id='".$sid."'");
			$sql_std1->execute();
			$std1 = $sql_std1->fetch(PDO::FETCH_ASSOC);
			$section_name=$std1['section_name'];
		 
		//---- SUBJECT MAPPING
				$subMap = $this->db->prepare("SELECT * FROM subject_mapping where class_id='".$cid."' AND section_id='".$sid."'");
				$subMap->execute();
				$DataSubMap = $subMap->fetchALL(PDO::FETCH_ASSOC);
				$subject_map=array();
				 foreach($DataSubMap as $data)
				 {
					$subject_ids=$data['subject_id'];
					$exploadeSub=explode(',',$subject_ids);
					$x=0;
					foreach($exploadeSub as $onebyone)
					{
						$onebyone;
						$subMap1 = $this->db->prepare("SELECT * FROM master_subject where id='".$onebyone."'");
						$subMap1->execute();
						$DataSubMap1 = $subMap1->fetchALL(PDO::FETCH_ASSOC);
						$sub_name=$DataSubMap1[0]['subject_name'];
						$subject_map[$x]['subject_id']=$onebyone;
						$subject_map[$x]['subject_name']=$sub_name;
						$x++;
					}
				 }
$section_array[]=array('section_id'=> $sid,'section_name'=> $section_name, 'assign_subject' => $subject_map);
unset($subject_map);
}

 $class_Array[]=array('class_id' => $cid, 'class_name' => $class_name, 'section'=> $section_array);
unset( $section_array);
}
 
			$success = array('status'=> true, "Error" => "",'class_section_roles' => $class_Array);
			$this->response($this->json($success), 200);
		}
		else
		{
			$success = array('status'=> false, "Error" => "No data found",'class_section_roles' => '');
			$this->response($this->json($success), 200);
		}
}
	}
public function ForgotPassword() 
	{
			global $link;
			include_once("common/global.inc.php");
			if ($this->get_request_method() != "POST") {
				$this->response('', 406);
			}
			 
				@$mobile_no = $this->_request['mobile_no'];
				@$login_identity = $this->_request['login_identity'];
				if($login_identity=='student')
				{
					
					$sql = $this->db->prepare("SELECT `name`,`id` FROM login WHERE mobile_no LIKE '%".$mobile_no."%' ");
					$sql->execute();
					if ($sql->rowCount()>0) 
					{ 
						$row_gp1 = $sql->fetch(PDO::FETCH_ASSOC);
						$name=$row_gp1['name'];$id=$row_gp1['id'];
	
						$random=(string)mt_rand(1000,9999);
						$time=date('h:i:s a', time());
						$date=date("d-m-Y");
						$sms1=str_replace(' ', '+', 'Dear '.$name.', Your one time password is '.$random.'.');
		
						$working_key='A7a76ea72525fc05bbe9963267b48dd96';
						$sms_sender='FLEXIL';
						file_get_contents('http://alerts.sinfini.com/api/web2sms.php?workingkey='.$working_key.'&sender='.$sms_sender.'&to='.$mobile_no.'&message='.$sms1.'');
					 
						$result=array('OTP' => $random,'mobile_no' => $mobile_no, 'id'=>$id);
						$error = array('status' => true, "Error" => "Instructions for accessing your account have been sent to ".$mobile_no."", 'Responce' => $result);
						$this->response($this->json($error), 200);
					
					}
					else
					{
						$error = array('status' => false, "Error" => "Sorry, the mobile no you provide is not registered.", 'Responce' => '');
						$this->response($this->json($error), 200);
					}
				}
				else if($login_identity=='faculty')
				{
					$sql = $this->db->prepare("SELECT `user_name`,`id` FROM faculty_login WHERE mobile_no LIKE '%".$mobile_no."%' ");
					$sql->execute();
					if ($sql->rowCount()>0) 
					{ 
						$row_gp1 = $sql->fetch(PDO::FETCH_ASSOC);
						$name=$row_gp1['user_name'];$id=$row_gp1['id'];
	
						$random=(string)mt_rand(1000,9999);
						$time=date('h:i:s a', time());
						$date=date("d-m-Y");
						$sms1=str_replace(' ', '+', 'Dear '.$name.', Your one time password is '.$random.'.');
		
						$working_key='A7a76ea72525fc05bbe9963267b48dd96';
						$sms_sender='FLEXIL';
						file_get_contents('http://alerts.sinfini.com/api/web2sms.php?workingkey='.$working_key.'&sender='.$sms_sender.'&to='.$mobile_no.'&message='.$sms1.'');
					 
						$result=array('OTP' => $random,'mobile_no' => $mobile_no,'id'=>$id);
						$error = array('status' => true, "Error" => "Instructions for accessing your account have been sent to ".$mobile_no."", 'Responce' => $result);
						$this->response($this->json($error), 200);
					
					}
					else
					{
						$error = array('status' => false, "Error" => "Sorry, the mobile no you provide is not registered.", 'Responce' => '');
						$this->response($this->json($error), 200);
					}
				}
			 
		}
public function ChangePassword() 
	{
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		$password=$this->_request['password'];
		$id=$this->_request['id'];
		$check_mobile = $this->db->prepare("SELECT * FROM login WHERE id='".$id."'");
		$check_mobile->execute();
		if($check_mobile->rowCount() > 0) 
		{
			$fetch_s_logins = $check_mobile->fetch(PDO::FETCH_ASSOC);
			$s_id=$fetch_s_logins['id'];
			$s_newpassword=md5($password);
			$sql_s=$this->db->prepare("UPDATE `login` SET password='".$s_newpassword."' WHERE id='".$s_id."'");
			
			$sql_s->execute();
			$success = array('status' => true, "Error" => "Password change successfully.", 'Responce' => '');
			$this->response($this->json($success), 200);
		}
		else
		{
			$error = array(status => false , "Error" => "You are not registered.", 'Responce' => '1');
			$this->response($this->json($error), 200);				
		} 			
	}

	public function CurrentApiVersion() 
	{
		include_once("common/global.inc.php");
		global $link;
		@$current_version = $this->_request['current_version'];
		$sql1 = $this->db->prepare("SELECT * FROM api_versions WHERE id=1");
		$sql1->execute();
		$version = $sql1->fetch(PDO::FETCH_ASSOC);
			$curent_version1=$version['version'];   
			if($curent_version1==$current_version) 
			{     
				$success = array('status' => true, "Error" => 'yes');
				$this->response($this->json($success), 200);
			} 
			else 
			{
				$error = array('status' => false, "Error" => "Sorry, Please update new version of App.");
				$this->response($this->json($error), 200);
			}
	}
	//-- Banned Student
	public function BannedStudents() 
	{
		global $link;
		include_once("common/global.inc.php");
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		if(isset($this->_request['response_type']))
		{
			$response_type=$this->_request['response_type'];
			//-- Response Type = 1 Insert  2 Fetch
			if($response_type==1)
			{//Insert
				$user_id=$this->_request['user_id'];
				$class_id=$this->_request['class_id'];/// YMD
				$section_id=$this->_request['section_id'];/// YMD
 				$student_id=$this->_request['student_id'];
				$reason=$this->_request['reason'];
				$banned_facility=$this->_request['banned_facility'];
 				 
				$sql_insert = $this->db->prepare("INSERT into banned_students(user_id,class_id,section_id,reason,student_id,banned_facility)VALUES(:user_id,:class_id,:section_id,:reason,:student_id,:banned_facility)");
				$sql_insert->bindParam(":user_id", $user_id, PDO::PARAM_STR);
				$sql_insert->bindParam(":class_id", $class_id, PDO::PARAM_STR);
				$sql_insert->bindParam(":section_id", $section_id, PDO::PARAM_STR);
				$sql_insert->bindParam(":reason", $reason, PDO::PARAM_STR);
				$sql_insert->bindParam(":student_id", $student_id, PDO::PARAM_STR);
				$sql_insert->bindParam(":banned_facility", $banned_facility, PDO::PARAM_STR);
				$sql_insert->execute();	
				$insert_id = $this->db->lastInsertId();
 				//--
 					$std_nm = $this->db->prepare("SELECT `device_token`,`notification_key`,`role_id` FROM `login` where id='".$student_id."'");
					$std_nm->execute();
					$ftc_nm= $std_nm->fetch(PDO::FETCH_ASSOC);
					$device_token = $ftc_nm['device_token'];
					$notification_key = $ftc_nm['notification_key'];
					$role_id = $ftc_nm['role_id'];
					
					$message='Your are banned.';
					$title='Banned';
					$submitted_by=$user_id;
					$user_id=$student_id;
					$date=date("M d Y");
					$time=date("h:i A");
					
 					$msg = array
					(
						'title' => $title,
						'message' 	=> $message,
						'button_text'	=> 'View',
						'link'	=> 'notice://banned?id='.$insert_id,
						'notification_id'	=> $insert_id,
					);
					$url = 'https://fcm.googleapis.com/fcm/send';
					$fields = array
					(
						'registration_ids' 	=> array($device_token),
						'data'			=> $msg
					);
					$headers = array
					(
						'Authorization: key=' .$notification_key,
						'Content-Type: application/json'
					);
					//--- NOTIFICATIO INSERT
						$NOTY_insert = $this->db->prepare("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES(:title,:message,:user_id,:submitted_by,:date,:time,:role_id)");
						$NOTY_insert->bindParam(":title", $title, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":message", $message, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":user_id", $user_id, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":submitted_by", $submitted_by, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":time", $time, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":date", $date, PDO::PARAM_STR);
						$NOTY_insert->bindParam(":role_id", $role_id, PDO::PARAM_STR);
						$NOTY_insert->execute();	
					//-- END
						json_encode($fields);
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
						$result = curl_exec($ch);
						curl_close($ch);
				//--
 
				$success = array('status'=> true, "Error" =>"" , 'Responce' => "Student successfully Banned");
                $this->response($this->json($success), 200);
			}
			
			else if($response_type==2)
			{//Fetch
				$sql_fetch = $this->db->prepare("SELECT * FROM banned_students order by `id` DESC");
 				$sql_fetch->execute();
				 if ($sql_fetch->rowCount() != 0) {  
				 	$x=0;   
					while($row_gp = $sql_fetch->fetch(PDO::FETCH_ASSOC)){
						foreach($row_gp as $key=>$valye)	
						{
							$string_insert[$x][$key]=$row_gp[$key];
						}
						$x++;
					}
  					$success = array('status' => true , "Error" => '', 'Responce' => $string_insert);
					$this->response($this->json($success), 200);
				} 
				else {
					
					$error = array('status' => false , "Error" => "No data found", 'Responce' => '');
					$this->response($this->json($error), 200);
				}				
				
			}
			else
			{// INvalid
				$error = array('status' => false , "Error" => "Invalid Response Type", 'Responce' => '');
				$this->response($this->json($error), 200);	
			}
			
		}
		else
		{
			$error = array('status' => false , "Error" => "Please Provide Response Type to Get Data", 'Responce' => '');
			$this->response($this->json($error), 200);	
		}
	}
///////////////////////////////////////		
    /*
     *  Encode array into JSON
     */
    private function json($data) {

        if (is_array($data)) {
         
            return json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP );
        }
    }
}
// Initiiate Library    
$api = new API;
$api->processApi();
?>