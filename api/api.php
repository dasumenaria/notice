<?php
require_once("Rest.inc.php");
date_default_timezone_set('asia/kolkata');
ini_set("expose_php",0);
class API extends REST {

    public $data = "";
    
    /*const DB_SERVER = "localhost";
    const DB_USER = "phppoets_notice";
    const DB_PASSWORD = ",Jr@qc5#,5&C";
    const DB = "phppoets_notice";*/
	
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
public function login() {
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
		$sql = $this->db->prepare("SELECT * FROM login WHERE eno=:enrollment_no AND password=:password");
		$sql->bindParam(":eno", $enrollment_no, PDO::PARAM_STR);
			$sql->bindParam(":password", $newpassword, PDO::PARAM_STR);
			 $sql->execute();

			 if($sql->rowCount()>0)
			  {
				$about_sql = $this->db->prepare("SELECT * FROM about_us");
				$about_sql->execute();
				$about_sql1 = $about_sql->fetch(PDO::FETCH_ASSOC);
				$x_about_us=$about_sql1['about_us'];

				$sql = $this->db->prepare("SELECT * FROM login WHERE eno=:enrollment_no AND password=:password");
				$sql->bindParam(":eno", $enrollment_no, PDO::PARAM_STR);
				$sql->bindParam(":password", $newpassword, PDO::PARAM_STR);
				$sql->execute();			
				$row_login = $sql->fetch(PDO::FETCH_ASSOC);

				if(!empty($row_login ['image'])){
				$row_login ['image'] = $site_url."user/".$row_login ['image'];
				}else{
				$row_login ['image'] = "";
				}

				$result = array('id' => $row_login['id'],
				'enrollment_no' => $row_login['eno'],
				'username' => $row_login['name'],
				'userimage' => $row_login['image'],
				'uniq_id' => $row_login['school_id'],
				'role_id' => $row_login['role_id'],
				'about_us' => $x_about_us,
				'login_user' => $login_identity
				);
			//$result1 = array("login" => $result );
			$success = array('status'=> true, "Error" => "login successful",'login' => $result  );
			$this->response($this->json($success), 200);
		}    
		else{
			$error = array('status' => false, "Error" => "Try again",'Responce' => '');
			$this->response($this->json($error), 200);
		}
		}
		else if($login_identity=='faculty')
		{
		$sql = $this->db->prepare("SELECT * FROM faculty_login WHERE user_name=:enrollment_no AND password=:password");
		$sql->bindParam(":user_name", $enrollment_no, PDO::PARAM_STR);
			$sql->bindParam(":password", $newpassword, PDO::PARAM_STR);
			 $sql->execute();
			 
				if($sql->rowCount()>0)
			{
				$about_sql = $this->db->prepare("SELECT * FROM about_us");
				$about_sql->execute();
				$about_sql1 = $about_sql->fetch(PDO::FETCH_ASSOC);
				$x_about_us=$about_sql1['about_us'];

				$sql = $this->db->prepare("SELECT * FROM faculty_login WHERE user_name=:enrollment_no AND password=:password");
				$sql->bindParam(":user_name", $enrollment_no, PDO::PARAM_STR);
				$sql->bindParam(":password", $newpassword, PDO::PARAM_STR);
				$sql->execute();			
				$row_login = $sql->fetch(PDO::FETCH_ASSOC);
				
				if(!empty($row_login ['image'])){
				$row_login ['image'] = $site_url."faculty/".$row_login ['image'];
				}else{
				$row_login ['image'] = "";
				}

				$result = array('id' => $row_login['id'],
				'enrollment_no' => '',
				'username' => $row_login['user_name'],
				'userimage' => $row_login['image'],
				'uniq_id' => $row_login['school_id'],
				'role_id' => $row_login['role_id'],
				'about_us' => $x_about_us,
				'login_user' => $login_identity
				);
			//$result1 = array("login" => $result );
			$success = array('status'=> true, "Error" => "login successful",'login' => $result  );
			$this->response($this->json($success), 200);
		}    
		else{
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
		
		$sql = $this->db->prepare("SELECT * FROM login WHERE id=:id");
		$sql->bindParam(":id", $id, PDO::PARAM_STR);
			$sql->execute();
			if($sql->rowCount()>0)
			{
			$sql_update_token = $this->db->prepare("UPDATE `login` SET device_token='".$device_token."' WHERE id='".$id."' LIMIT 1;");
			$sql_update_token->execute();

                $success = array('status' => true, "msg" => 'Yes', 'Responce' => '');
                $this->response($this->json($success), 200);
            } else {
                $error = array('status' => false, "Error" => "No", 'Responce' => '');
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
    
		$sql = $this->db->prepare("SELECT * FROM notice order by id DESC");
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
					
					
				
			$result[] = array('id' => $row_notification['id'],
					'title' => $row_notification['title'],
                    'dateofpublish' => $row_notification['dateofpublish'],
                    'time'=> $row_notification['time'],
					'date_time'=> $date_time,
'notice_no'=> $row_notification['notice_no'],
'pdf_file'=> $row_notification['file_name'],

'image'=> $row_notification['image'],
'shareable'=> $row_notification['shareable'],
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

		$sql = $this->db->prepare("SELECT * FROM notice where id='".$notice_id."' ");
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
					
					
				$result[] = array('id' => $row_notification['id'],
				'title' => $row_notification['title'],
				'dateofpublish' => $row_notification['dateofpublish'],
				'time'=> $row_notification['time'],
				'date_time'=> $date_time,
				'notice_no'=> $row_notification['notice_no'],
				'pdf_file'=> $row_notification['file_name'],
				'image'=> $row_notification['image'],
				'shareable'=> $row_notification['shareable'],
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
//////////////////////////
 ////////////////this api is used for forget password//////////
public function user_forgot_password() 
	{
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		$mobile_no=$this->_request['mobile_no'];
			$check_mobile = $this->db->prepare("SELECT * FROM login WHERE mobile_no='".$mobile_no."'");
			$check_mobile->execute();
			if ($check_mobile->rowCount() > 0) {
		      $fetch_s_logins = $check_mobile->fetch(PDO::FETCH_ASSOC);
			  $s_id=$fetch_s_logins['id'];
             $otp=(string)mt_rand(1000,9999);
			 $sql_s=$this->db->prepare("UPDATE `login` SET otp='".$otp."' WHERE id='".$s_id."'");				                
			 $sql_s->execute();
			 
			
			    $sms=str_replace(' ', '+', 'Your one time OTP is: '.$otp.'');
			    $working_key='A7a76ea72525fc05bbe9963267b48dd96';
				$sms_sender='JAINTE';	
				$sms=str_replace(' ', '+', $sms);
				file_get_contents('http://alerts.sinfini.com/api/web2sms.php?workingkey='.$working_key.'&sender='.$sms_sender.'&to='.$mobile_no.'&message='.$sms.'');
			 
			   $result1 = array("otp" => $otp);
			   $success = array('Type' => "Successfully", "Error" => "Please enter your otp as a password.", 'Responce' => $result1);
				$this->response($this->json($success), 200);
			}
			else{
				$error = array('Type' => "Error", "Error" => "Mobile no did not find.", 'Responce' => '1');
				$this->response($this->json($error), 200);				
				} 	
		}
		////
		public function change_forgot_password() 
	{
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		$otp=$this->_request['otp'];
		$password=$this->_request['password'];
		$mobile_no=$this->_request['mobile_no'];
			$check_mobile = $this->db->prepare("SELECT * FROM login WHERE mobile_no='".$mobile_no."' AND otp='".$otp."'");
			$check_mobile->execute();
			if ($check_mobile->rowCount() > 0) {
			$fetch_s_logins = $check_mobile->fetch(PDO::FETCH_ASSOC);
			  $s_id=$fetch_s_logins['id'];
			$s_newpassword=md5($password);
			 $sql_s=$this->db->prepare("UPDATE `login` SET password='".$s_newpassword."', otp=0 WHERE id='".$s_id."'");
             
			 $sql_s->execute();
			$success = array('Type' => "Successfully", "Error" => "Password change successfully.", 'Responce' => '1');
				$this->response($this->json($success), 200);
			}
			else{
				$error = array('Type' => "Error", "Error" => "Please Check Your Otp.", 'Responce' => '1');
				$this->response($this->json($error), 200);				
				} 			
		}
//////////////////////////
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
					'shareable'=> $row_event['shareable'],
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
				

				//$user_id = $this->_request['user_id'];
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
				$result3[] = array();
			}
			
		
				
				
				
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
				else{
				$event_sql_id2='';
				$isgallery=false;
				}
				
/*$exist_sql = $this->db->prepare("SELECT * FROM add_to_calendar where user_id='".$user_id."' AND event_id='".$event_id."'");
				$exist_sql->execute();
				$exist_sql1 = $exist_sql->fetch(PDO::FETCH_ASSOC);
				
				if($exist_sql->rowCount()>0)
				{
					$event_exist=true;
				}
				else{
					$event_exist=false;
				}*/


			if(!empty($row_event['image'])){
				
						  $row_event['image']= $site_url."event/".$event_folder_name2."/".$row_event['image'];
					}else{
						 $row_event['image'] = "";
					}	
						$timestamp=$row_event['event_date'];
$dt=str_replace('-', '', $timestamp);
$event_time=$row_event['event_time'];
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

$emm=$datetime->format('m');
$x_emm=$emm-1;
$date_time=array('date' => $ed,
'day' => $edd,
'month' => $em,
'month_id' => $x_emm,
'year' => $ey,
'H' => $eh,
'I' => $ei,
'A' => $npm);
			   
			$result[]= array('id' => $row_event['id'],
					'title' => $row_event['title'],
                    'discription' => $row_event['discription'],
					'details' => $row_event['details'],
                    'event_date'=> $row_event['event_date'],
                    'current_date'=> $row_event['curent_date'],
                    'event_pic'=>$row_event['event_pic'],
					'event_time' => $row_event['event_time'],
					'gallery_id' => $event_sql_id2,
					'isgallery' => $isgallery,
					'location' => $row_event['location'],
					'date_time' => $date_time,
//'event_tag' =>$event_exist
					
					);	
}
			}
			else{
				$result[] = array();
			}
		

        $news_sql = $this->db->prepare("SELECT * FROM news where flag=0 order by id DESC LIMIT 0 , 5 ");
		$news_sql->execute();
			if($news_sql->rowCount()>0)
			{
			$news_fsql = $news_sql->fetchALL(PDO::FETCH_ASSOC);
			foreach($news_fsql as $row_news)
            {
				$news_id=$row_news['news_id'];
				$news_folder_name1='news';
				$news_folder_name2=$news_folder_name1.$news_id;
				
				
				$nws_sql_id = $this->db->prepare("SELECT * FROM gallery where event_news_id='".$news_id."' AND category_id='5'");
				$nws_sql_id->execute();
				$nws_sql_id1 = $nws_sql_id->fetch(PDO::FETCH_ASSOC);
				if(!empty($nws_sql_id1))
				{
				$nws_sql_id2=$nws_sql_id1['id'];	
				}
				else{
				$nws_sql_id2='';
				}
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
			}else{
				$result1[] = array();
			}


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
                if(!empty($row_gallery['gallery_pic'])){
						 $row_gallery['gallery_pic']= $site_url."event/".$gallry_folder_name2."/".$row_gallery['gallery_pic'];
						 $row_gallery['gallery_pic'] = "";
					}
                    $result6[] = array(
					'gallery' => $row_gallery['gallery_pic']
					);
                }
				}else{
				$result6[] = array();
			}
   
   
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
				VALUES(:user_id,:name,:email,:study,:address,:mobile_no,:query,:curent_date)");
				
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
				
				$news_folder_name1='event';
                $news_folder_name2=$news_folder_name1.$event_id;

                                     if(!empty($efc_sql['featured_image'])){
						 	$efc_sql['featured_image']= $site_url."news/".$news_folder_name2."/".$efc_sql['featured_image'];
					}else{
						 $efc_sql['featured_image'] = "";
					}
		        $f_sql = $this->db->prepare("SELECT * FROM sub_gallery where gallery_id='".$id."' order by id DESC");
				$f_sql->execute();
				$fc_sql = $f_sql->fetchALL(PDO::FETCH_ASSOC);
                                $src= $f_sql->rowCount();
				
				foreach($fc_sql as $row_gallery)
				{
                if(!empty($row_gallery['gallery_pic'])){
						 $row_gallery['gallery_pic']= $site_url."news/".$news_folder_name2."/".$row_gallery['image'];
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
					$id = $efc_sql['id'];
					$edate = $efc_sql['date'];
					$title = $efc_sql['title'];
					$pic = $efc_sql['image'];
				}
				else if($type==5)
				{
				 $ef_sql = $this->db->prepare("SELECT * FROM news where id='".$event_id."'");
				$ef_sql->execute();
				$efc_sql = $ef_sql->fetch(PDO::FETCH_ASSOC);
				
					$news_folder_name1='news';
                $news_folder_name2=$news_folder_name1.$event_id;

                                     if(!empty($efc_sql['news_pic'])){
						$efc_sql['featured_image']= $site_url."news/".$news_folder_name2."/".$efc_sql['featured_image'];
					}else{
						 $efc_sql['featured_image'] = "";
					}
					
					$id = $efc_sql['id'];
					$edate = $efc_sql['date'];
					$title = $efc_sql['title'];
					$pic = $efc_sql['featured_image'];
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
        $cal_sql = $this->db->prepare("SELECT * FROM acedmic_calendar group by tag");
		$cal_sql->execute();
		    if($cal_sql->rowCount()>0)
			{
			$cal_sql1= $cal_sql->fetchALL(PDO::FETCH_ASSOC);
            foreach($cal_sql1 as $cal_sql11)
            {
				$tag_id = $cal_sql11['tag'];
				$exact_tag_id=$tag_id-1;
				$cal_ex = $this->db->prepare("SELECT * FROM acedmic_calendar where tag='".$tag_id."'");
				$cal_ex->execute();
				$cal_ex1= $cal_ex->fetchALL(PDO::FETCH_ASSOC);

            foreach($cal_ex1 as $cal_ex11)
            {
				$timestamp[]=$cal_ex11['date'];
			}
			
$fff=array_unique($timestamp);
unset($timestamp);
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
			$result[] =array('date' => $ed,
			'day' => $edd,

			'month' => $em,
			'year' => $ey,
			'event'=>$result_c);
			unset($result_c);
}
			$result1[] = array('month_id' => $exact_tag_id,
			'data' => $result);
			unset($result);
			}
			
			$success = array('status'=> true, "Error" => "All records",'acedmic_calendar' => $result1);
			$this->response($this->json($success), 200);
            }
		else{
			$error = array('status' => false, "Error" => "No records",'Responce' => '');
			$this->response($this->json($error), 200);
		}
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
				VALUES(:event_id,:user_id,:curent_date,:event_date,:parent_event_id)");
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
				else{
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
		$class_sql = $this->db->prepare("SELECT * FROM master_class");
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
		
		
		$student_sql = $this->db->prepare("SELECT * FROM login where class_id='".$cid."' AND section_id='".$sid."'");
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
	
	$section[] = array(
			'section_id' => $sid,
			'section_name' => $section_name,
			'student' => $sd);
			unset($student);
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
		@$file = $this->_request['file'];
		$submission_date = $this->_request['submission_date'];
		$curent_date = date("Y-m-d");
		
/*@$file = $this->_request['file'];
$data = str_replace('data:image/png;base64,', '', $file);
$data1 = str_replace(' ', '+', $data);
$decodedFile = base64_decode($data1); 
$random=(string)mt_rand(1000,9999);
$name=$random;
$p_type='.JPG';
$name1=$name.$p_type;*/
		
		
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
				$sql_insert->bindParam("submission_date", $submission_date, PDO::PARAM_STR);
				$sql_insert->bindParam("curent_date", $curent_date, PDO::PARAM_STR);
				$sql_insert->bindParam("file", $name1, PDO::PARAM_STR);
                $sql_insert->execute();
		}
		
			/*if(file_put_contents(dirname(__FILE__)."/../webroot/catfile/".$name.".JPG", $decodedFile))
			{
			$success = array('status' => true, "msg" => 'Your Bulk Booking has been successfully submit.');
			$this->response($this->json($success), 200);
			} */
			
                $success = array('status'=> true, "Error" => "Thank you your assignment updated successfully");
                $this->response($this->json($success), 200);
		}
		else if($assignment_type=='student_wise')
		{
			 $student_ids=sizeof($student_id);
		$st_id=0;
		for($i=0; $i<$student_ids; $i++)
		{
			$st_id=$student_id[$i];
			$sql_insert = $this->db->prepare("INSERT into assignment(user_id,class_id,section_id,subject_id,topic,student_id,description,submission_date,curent_date)
				VALUES(:user_id,:class_id,:section_id,:subject_id,:topic,:student_id,:description,:submission_date,:curent_date)");

				$sql_insert->bindParam(":user_id", $user_id, PDO::PARAM_STR);
                $sql_insert->bindParam(":class_id", $class_id, PDO::PARAM_STR);				
                $sql_insert->bindParam(":section_id", $sid, PDO::PARAM_STR);
				$sql_insert->bindParam(":subject_id", $subject_id, PDO::PARAM_STR);
				 $sql_insert->bindParam(":topic", $topic, PDO::PARAM_STR);
				$sql_insert->bindParam(":student_id", $st_id, PDO::PARAM_STR);
                $sql_insert->bindParam(":description", $description, PDO::PARAM_STR);
				$sql_insert->bindParam("submission_date", $submission_date, PDO::PARAM_STR);
				$sql_insert->bindParam("curent_date", $curent_date, PDO::PARAM_STR);
                $sql_insert->execute();
		}
                $success = array('status'=> true, "Error" => "Thank you your assignment updated successfully");
                $this->response($this->json($success), 200);
			
		}
		else{
			$error = array('status' => false, "Error" => "Try again");
			$this->response($this->json($error), 200);
		    }
}
////

public function attendance()
{
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		$user_id = $this->_request['user_id'];
		@$student_id = $this->_request['student_id'];
		$attendance_date = $this->_request['attendance_date'];
		$curent_date = date("Y-m-d");
		
		$student_ids=sizeof($student_id);
		
		if($student_ids>0)
		{
		$st_id=0;
		for($i=0; $i<$student_ids; $i++)
		{
			$st_id=$student_id[$i];
			$sql_insert = $this->db->prepare("INSERT into attendance(user_id,student_id,attendance_date,curent_date)
				VALUES(:user_id,:student_id,:attendance_date,:curent_date)");

				$sql_insert->bindParam(":user_id", $user_id, PDO::PARAM_STR);
                $sql_insert->bindParam(":student_id", $st_id, PDO::PARAM_STR);				
                $sql_insert->bindParam(":attendance_date", $attendance_date, PDO::PARAM_STR);
				$sql_insert->bindParam("curent_date", $curent_date, PDO::PARAM_STR);
                $sql_insert->execute();
		}
                $success = array('status'=> true, "Error" => "Thank you attendance updated successfully");
                $this->response($this->json($success), 200);
			
		}
		else{
			$error = array('status' => false, "Error" => "Try again");
			$this->response($this->json($error), 200);
		    }
}
/////
public function fetch_assignment_list() {
              include_once("common/global.inc.php");
        global $link;
                     
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		@$student_id = $this->_request['student_id'];
		$login_sql = $this->db->prepare("SELECT * FROM login where id='".$student_id."'");
		$login_sql->execute();
		$login_sqls= $login_sql->fetch(PDO::FETCH_ASSOC);
		$st_id = $login_sqls['id'];
		$class_id = $login_sqls['class_id'];
		$section_id = $login_sqls['section_id'];
		
		
		
		$ass_sql = $this->db->prepare("SELECT * FROM assignment where (student_id='".$st_id."') OR (class_id='".$class_id."' AND section_id='".$section_id."') order by id DESC");
		$ass_sql->execute();
		if($ass_sql->rowCount()>0){
		$ass_sqls= $ass_sql->fetchALL(PDO::FETCH_ASSOC);
		
		foreach($ass_sqls as $ass_sqls_data)
		{
				$subject_id = $ass_sqls_data['subject_id'];
				$sub_sql = $this->db->prepare("SELECT * FROM master_subject where id='".$subject_id."'");
				$sub_sql->execute();
				$sub_sqls= $sub_sql->fetch(PDO::FETCH_ASSOC);
				$subject_name = $sub_sqls['subject_name'];

				$result[] = array('assignment_id' => $ass_sqls_data['id'],
				'topic' => $ass_sqls_data['topic'],
				'description' => $ass_sqls_data['description'],
				'subject_name' => $subject_name,
				'file' => $ass_sqls_data['file']
				);
		}
		
			$success = array('status'=> true, "Error" => "",'fetch_assignment_list' => $result);
			$this->response($this->json($success), 200);
            }
		else{
			$error = array('status' => false, "Error" => "No Assignment",'Responce' => '');
			$this->response($this->json($error), 200);
		}
		}

	//////////////////////////
		public function fetch_assignment_data() {
              include_once("common/global.inc.php");
        global $link;
                     
		if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }
		@$assignment_id = $this->_request['assignment_id'];
		
		$ass_sql = $this->db->prepare("SELECT * FROM assignment where id='".$assignment_id."'");
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