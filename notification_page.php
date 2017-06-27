<?php
date_default_timezone_set('asia/kolkata');
include("database.php");
$function_name=$_GET['function_name'];
if($function_name=='principle_director_message') 
{
 	$update_id=$_GET['id'];
	$msgftc = mysql_query("SELECT * FROM `director_principle_message` where id='$update_id'");
	$ftc_nmg= mysql_fetch_array($msgftc);
	$up_id = $ftc_nmg['id'];
	$sms_sender_role = $ftc_nmg['sms_sender_role'];
	$message = $ftc_nmg['message'];
	$sms_receive_role = $ftc_nmg['sms_receive_role'];
	$login_id = $ftc_nmg['login_id'];
	$send='0';
	if($sms_sender_role=='2'){$title="Directors Message"; $link='directorMsg';}
	if($sms_sender_role=='3'){$title="Principles Message"; $link='principleMsg';}
			if($sms_receive_role=='1')
			{
				$send='1';
			}
			if($sms_receive_role=='4')
			{
				$std_nm = mysql_query("SELECT `device_token`,`notification_key`,`role_id`,`id` FROM `faculty_login` where role_id='4' && device_token != ''");
			}
			if($sms_receive_role=='5')
			{
				$std_nm = mysql_query("SELECT `device_token`,`notification_key`,`role_id`,`id` FROM `login` where role_id='5'&& device_token != '' ");
				
			}
			if($send=='1')
			{
				//--
				$std_nm = mysql_query("SELECT `device_token`,`notification_key`,`role_id`,`id` FROM `faculty_login` where role_id='4' && device_token != ''");
				while($ftc_nm= mysql_fetch_array($std_nm))
				{
					$device_token = $ftc_nm['device_token'];
					$notification_key = $ftc_nm['notification_key'];
					$role_id = $ftc_nm['role_id'];
					$id = $ftc_nm['id'];
						$submitted_by=$login_id;
						$user_id=$id;
						$date=date("M d Y");
						$time=date("h:i A");
						 
						$msg = array
						(
							'title' => $title,
							'message' 	=> $message,
							'button_text'	=> 'View',
							'link'	=> 'notice://'.$link.'?id='.$up_id,
							'notification_id'	=> $up_id,
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
					$NOTY_insert = mysql_query("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES('$title','$message','$user_id','$submitted_by','$date','$time','$role_id')");
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
					//---  Student
					$std_nm1 = mysql_query("SELECT `device_token`,`notification_key`,`role_id`,`id` FROM `login` where role_id='5' && device_token != '' "); 
					while($ftc_nm1= mysql_fetch_array($std_nm1))
					{
					$device_token = $ftc_nm1['device_token'];
					$notification_key = $ftc_nm1['notification_key'];
					$role_id = $ftc_nm1['role_id'];
					$id = $ftc_nm1['id'];
						$submitted_by=$login_id;
						$user_id=$id;
						$date=date("M d Y");
						$time=date("h:i A");
						 
						$msg = array
						(
							'title' => $title,
							'message' 	=> $message,
							'button_text'	=> 'View',
							'link'	=> 'notice://'.$link.'?id='.$up_id,
							'notification_id'	=> $up_id,
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
					$NOTY_insert = mysql_query("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES('$title','$message','$user_id','$submitted_by','$date','$time','$role_id')");
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
					
					
			}
			else
			{
				//--
				while($ftc_nm= mysql_fetch_array($std_nm))
				{
					$device_token = $ftc_nm['device_token'];
					$notification_key = $ftc_nm['notification_key'];
					$role_id = $ftc_nm['role_id'];
					  $id = $ftc_nm['id'];
						$submitted_by=$login_id;
						$user_id=$id;
						$date=date("M d Y");
						$time=date("h:i A");
						 
						$msg = array
						(
							'title' => $title,
							'message' 	=> $message,
							'button_text'	=> 'View',
							'link'	=> 'notice://'.$link.'?id='.$up_id,
							'notification_id'	=> $up_id,
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
					$NOTY_insert = mysql_query("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES('$title','$message','$user_id','$submitted_by','$date','$time','$role_id')");
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
			}
}
//--- EVENT
if($function_name=='create_event_notify') 
{
 	$update_id=$_GET['id'];
	$event_x_id1=mysql_query("select `user_id`,`title`,`description`,`role_id`,`id` from event where id='$update_id'");		
	$ftc_nmg=mysql_fetch_array($event_x_id1);
	$Eid=$ftc_nmg['id'];	
	$title=$ftc_nmg['title'];
	$login_id = $ftc_nmg['user_id'];
	$description = $ftc_nmg['description'];
	 $message=$description;
	$role_id = $ftc_nmg['role_id'];
 	$send='0';
	 
			if($role_id=='1')
			{
				$send='1';
			}
			if($role_id=='4')
			{
				$std_nm = mysql_query("SELECT `device_token`,`notification_key`,`role_id`,`id` FROM `faculty_login` where role_id='4' ");
			}
			if($role_id=='5')
			{
				$std_nm = mysql_query("SELECT `device_token`,`notification_key`,`role_id`,`id` FROM `login` where role_id='5' && device_token != ''");
				
			}
			if($send=='1')
			{
				//--
				$std_nm = mysql_query("SELECT `device_token`,`notification_key`,`role_id`,`id` FROM `faculty_login` where role_id='4' && device_token != ''");
				while($ftc_nm= mysql_fetch_array($std_nm))
				{
					$device_token = $ftc_nm['device_token'];
					$notification_key = $ftc_nm['notification_key'];
					$role_id = $ftc_nm['role_id'];
					$id = $ftc_nm['id'];
						$submitted_by=$login_id;
						$user_id=$id;
						$date=date("M d Y");
						$time=date("h:i A");
						 
						$msg = array
						(
 							'title' => $title,
							'message' 	=> $description,
							'button_text'	=> 'View Event',
							'link'	=> 'notice://event?id='.$Eid,
							'notification_id'	=> $Eid,
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
					$NOTY_insert = mysql_query("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES('$title','$message','$user_id','$submitted_by','$date','$time','$role_id')");
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
					//---  Student
					$std_nm1 = mysql_query("SELECT `device_token`,`notification_key`,`role_id`,`id` FROM `login` where role_id='5' && device_token != ''"); 
					while($ftc_nm1= mysql_fetch_array($std_nm1))
					{ 
					$device_token = $ftc_nm1['device_token'];
					$notification_key = $ftc_nm1['notification_key'];
					$role_id = $ftc_nm1['role_id'];
					$id = $ftc_nm1['id'];  
						$submitted_by=$login_id;
						$user_id=$id;
						$date=date("M d Y");
						$time=date("h:i A");
						 
						$msg = array
						(
 							'title' => $title,
							'message' 	=> $description,
							'button_text'	=> 'View Event',
							'link'	=> 'notice://event?id='.$Eid,
							'notification_id'	=> $Eid,
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
					$NOTY_insert = mysql_query("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES('$title','$message','$user_id','$submitted_by','$date','$time','$role_id')");
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
					
					
			}
			else
			{
				//--
				while($ftc_nm= mysql_fetch_array($std_nm))
				{
					$device_token = $ftc_nm['device_token'];
					$notification_key = $ftc_nm['notification_key'];
					$role_id = $ftc_nm['role_id'];
					 $id = $ftc_nm['id'];  
						$submitted_by=$login_id;
						$user_id=$id;
						$date=date("M d Y");
						$time=date("h:i A");
						 
						$msg = array
						(
 							'title' => $title,
							'message' 	=> $description,
							'button_text'	=> 'View Event',
							'link'	=> 'notice://event?id='.$Eid,
							'notification_id'	=> $Eid,
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
					$NOTY_insert = mysql_query("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES('$title','$message','$user_id','$submitted_by','$date','$time','$role_id')");
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
			}
}

//--- NEWS

if($function_name=='create_news_notifys') 
{
 	$update_id=$_GET['id'];
	$event_x_id1=mysql_query("select `role_id`,`user_id`,`title`,`description`,`id` from news where id='$update_id'");		
	$ftc_nmg=mysql_fetch_array($event_x_id1);
	$Eid=$ftc_nmg['id'];	
	$title=$ftc_nmg['title'];
	$login_id = $ftc_nmg['user_id'];
	$description = $ftc_nmg['description'];
 	$message=$description;
	$role_id = $ftc_nmg['role_id'];
 	$send='0';
	 
			if($role_id=='1')
			{
				$send='1';
			}
			if($role_id=='4')
			{
				$std_nm = mysql_query("SELECT `device_token`,`notification_key`,`role_id`,`id` FROM `faculty_login` where role_id='4' && device_token != ''");
			}
			if($role_id=='5')
			{
				$std_nm = mysql_query("SELECT `device_token`,`notification_key`,`role_id`,`id` FROM `login` where role_id='5' && device_token != ''");
				
			}
			if($send=='1')
			{
				//--
				$std_nm = mysql_query("SELECT `device_token`,`notification_key`,`role_id`,`id` FROM `faculty_login` where role_id='4' && device_token != ''");
				while($ftc_nm= mysql_fetch_array($std_nm))
				{
					$device_token = $ftc_nm['device_token'];
					$notification_key = $ftc_nm['notification_key'];
					$role_id = $ftc_nm['role_id'];
					$id = $ftc_nm['id'];
						$submitted_by=$login_id;
						$user_id=$id;
						$date=date("M d Y");
						$time=date("h:i A");
						 
						$msg = array
						(
 							'title' => $title,
							'message' 	=> $description,
							'button_text'	=> 'View Event',
							'link'	=> 'notice://news?id='.$Eid,
							'notification_id'	=> $Eid,
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
					$NOTY_insert = mysql_query("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES('$title','$message','$user_id','$submitted_by','$date','$time','$role_id')");
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
					//---  Student
					$std_nm1 = mysql_query("SELECT `device_token`,`notification_key`,`role_id`,`id` FROM `login` where role_id='5' && device_token != ''"); 
					while($ftc_nm1= mysql_fetch_array($std_nm1))
					{
					$device_token = $ftc_nm1['device_token'];
					$notification_key = $ftc_nm1['notification_key'];
					$role_id = $ftc_nm1['role_id'];
					$id = $ftc_nm1['id'];
						$submitted_by=$login_id;
						$user_id=$id;
						$date=date("M d Y");
						$time=date("h:i A");
						 
						$msg = array
						(
 							'title' => $title,
							'message' 	=> $description,
							'button_text'	=> 'View Event',
							'link'	=> 'notice://news?id='.$Eid,
							'notification_id'	=> $Eid,
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
					$NOTY_insert = mysql_query("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES('$title','$message','$user_id','$submitted_by','$date','$time','$role_id')");
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
					
					
			}
			else
			{
				//--
				while($ftc_nm= mysql_fetch_array($std_nm))
				{
					$device_token = $ftc_nm['device_token'];
					$notification_key = $ftc_nm['notification_key'];
					$role_id = $ftc_nm['role_id'];
					$id = $ftc_nm['id'];
						$submitted_by=$login_id;
						$user_id=$id;
						$date=date("M d Y");
						$time=date("h:i A");
						 
						$msg = array
						(
 							'title' => $title,
							'message' 	=> $description,
							'button_text'	=> 'View Event',
							'link'	=> 'notice://news?id='.$Eid,
							'notification_id'	=> $Eid,
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
					$NOTY_insert = mysql_query("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES('$title','$message','$user_id','$submitted_by','$date','$time','$role_id')");
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
//print_r($result);
						//--	
					}
			}
}

//--- GALLARY

if($function_name=='create_gallery_notifys') 
{
 	$update_id=$_GET['id'];
	$sub=mysql_query("select `gallery_id` from sub_gallery where id='$update_id'");		
	$ftc_sub=mysql_fetch_array($sub);
	$gallery_id=$ftc_sub['gallery_id'];	
 	
	$gall=mysql_query("select * from gallery where id='$gallery_id'");		
	$ftc_gall=mysql_fetch_array($gall);
	$event_news_id=$ftc_gall['event_news_id'];
	$category_id=$ftc_gall['category_id'];	
	if($category_id=='4'){$event_x_id1=mysql_query("select `user_id`,`title`,`description`,`role_id`,`id` from event where id='$event_news_id'");	}
	if($category_id=='5'){$event_x_id1=mysql_query("select `role_id`,`user_id`,`title`,`description`,`id` from news where id='$event_news_id'");}
 	 
 	$ftc_nmg=mysql_fetch_array($event_x_id1);
	$Eid=$ftc_nmg['id'];	
 	$title = $ftc_nmg['title'];
	$login_id = $ftc_nmg['user_id'];
	$description = "New album added";
 	$message=$description;
	$role_id = $ftc_nmg['role_id'];
 	$send='0';
	 
			if($role_id=='1')
			{
				$send='1';
			}
			if($role_id=='4')
			{
				$std_nm = mysql_query("SELECT `device_token`,`notification_key`,`role_id`,`id` FROM `faculty_login` where role_id='4' && device_token != ''");
			}
			if($role_id=='5')
			{
				$std_nm = mysql_query("SELECT `device_token`,`notification_key`,`role_id`,`id` FROM `login` where role_id='5' && device_token != ''");
				
			}
			if($send=='1')
			{
				//--
				$std_nm = mysql_query("SELECT `device_token`,`notification_key`,`role_id`,`id` FROM `faculty_login` where role_id='4' && device_token != ''");
				while($ftc_nm= mysql_fetch_array($std_nm))
				{
					$device_token = $ftc_nm['device_token'];
					$notification_key = $ftc_nm['notification_key'];
					$role_id = $ftc_nm['role_id'];
					$id = $ftc_nm['id'];
						$submitted_by=$login_id;
						$user_id=$id;
						$date=date("M d Y");
						$time=date("h:i A");
						 
						$msg = array
						(
 							'title' => $title,
							'message' 	=> $description,
							'button_text'	=> 'View Gallery',
							'link'	=> 'notice://gallery?id='.$Eid,
							'notification_id'	=> $Eid,
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
					$NOTY_insert = mysql_query("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES('$title','$message','$user_id','$submitted_by','$date','$time','$role_id')");
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
					//---  Student
					$std_nm1 = mysql_query("SELECT `device_token`,`notification_key`,`role_id`,`id` FROM `login` where role_id='5' && device_token != ''"); 
					while($ftc_nm1= mysql_fetch_array($std_nm1))
					{
					$device_token = $ftc_nm1['device_token'];
					$notification_key = $ftc_nm1['notification_key'];
					$role_id = $ftc_nm1['role_id'];
					$id = $ftc_nm1['id'];
						$submitted_by=$login_id;
						$user_id=$id;
						$date=date("M d Y");
						$time=date("h:i A");
						 
						$msg = array
						(
 							'title' => $title,
							'message' 	=> $description,
							'button_text'	=> 'View Gallery',
							'link'	=> 'notice://gallery?id='.$Eid,
							'notification_id'	=> $Eid,
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
					$NOTY_insert = mysql_query("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES('$title','$message','$user_id','$submitted_by','$date','$time','$role_id')");
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
					
					
			}
			else
			{
				//--
				while($ftc_nm= mysql_fetch_array($std_nm))
				{
					$device_token = $ftc_nm['device_token'];
					$notification_key = $ftc_nm['notification_key'];
					$role_id = $ftc_nm['role_id'];
					$id = $ftc_nm['id'];
						$submitted_by=$login_id;
						$user_id=$id;
						$date=date("M d Y");
						$time=date("h:i A");
						 
						$msg = array
						(
 							'title' => $title,
							'message' 	=> $description,
							'button_text'	=> 'View Gallery',
							'link'	=> 'notice://gallery?id='.$Eid,
							'notification_id'	=> $Eid,
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
					$NOTY_insert = mysql_query("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES('$title','$message','$user_id','$submitted_by','$date','$time','$role_id')");
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
								print_r($result);
						//--	
					}
			}
}

//--- SYLLABUS

if($function_name=='create_syllabus_notifys') 
{
 	$update_id=$_GET['id'];
	$event_x_id1=mysql_query("select * from syllabus where id='$update_id'");		
	$ftc_nmg=mysql_fetch_array($event_x_id1);
	$Eid=$ftc_nmg['id'];	
	
	$login_id = $ftc_nmg['user_id'];
	$class_id = $ftc_nmg['class_id'];
	$section_id = $ftc_nmg['section_id'];
	$subject_id = $ftc_nmg['subject_id'];
	$sbname=mysql_query("select `subject_name` from master_subject where id='$subject_id'");		
	$ftc_sbname=mysql_fetch_array($sbname);
	$subject_name=$ftc_sbname['subject_name'];
	$title='Syllabus';
	$description = "Your Class Syllabus Added";
	$message=$description;
 	$role_id = $ftc_nmg['role_id'];
 	$send='0';
	 
				$std_nm = mysql_query("SELECT `device_token`,`notification_key`,`role_id`,`id` FROM `login` where class_id='$class_id' && section_id = '$section_id'");
				while($ftc_nm= mysql_fetch_array($std_nm))
				{
					$device_token = $ftc_nm['device_token'];
					$notification_key = $ftc_nm['notification_key'];
					$role_id = $ftc_nm['role_id'];
					 $id = $ftc_nm['id'];  
						$submitted_by=$login_id;
						$user_id=$id;
						$date=date("M d Y");
						$time=date("h:i A");
						 
						$msg = array
						(
 							'title' => $title,
							'message' 	=> $description,
							'button_text'	=> 'View Syllabus',
							'link'	=> 'notice://syllabus?id='.$Eid,
							'notification_id'	=> $Eid,
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
					$NOTY_insert = mysql_query("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES('$title','$message','$user_id','$submitted_by','$date','$time','$role_id')");
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
								print_r($result);
								curl_close($ch);
						//--	
					}
		
}

//--- TIMETABLE

if($function_name=='create_timetable_notify') 
{
 	$update_id=$_GET['id'];
	$event_x_id1=mysql_query("select * from time_table where id='$update_id'");		
	$ftc_nmg=mysql_fetch_array($event_x_id1);
	$Eid=$ftc_nmg['id'];	
	
	$login_id = $ftc_nmg['user_id'];
	$class_id = $ftc_nmg['class_id'];
	$section_id = $ftc_nmg['section_id'];
 	$title='Timetable';
	$description = "Timetable added";
	$message=$description;
  	$send='0';
	 
				$std_nm = mysql_query("SELECT `device_token`,`notification_key`,`role_id`,`id` FROM `login` where class_id='$class_id' && section_id = '$section_id'");
				while($ftc_nm= mysql_fetch_array($std_nm))
				{
					$device_token = $ftc_nm['device_token'];
					$notification_key = $ftc_nm['notification_key'];
					$role_id = $ftc_nm['role_id'];
					 $id = $ftc_nm['id'];  
						$submitted_by=$login_id;
						$user_id=$id;
						$date=date("M d Y");
						$time=date("h:i A");
 						$msg = array
						(
 							'title' => $title,
							'message' 	=> $description,
							'button_text'	=> 'View Timetable_',
							'link'	=> 'notice://timetable?id='.$Eid,
							'notification_id'	=> $Eid,
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
					$NOTY_insert = mysql_query("INSERT into notification(title,message,user_id,submitted_by,date,time,role_id)VALUES('$title','$message','$user_id','$submitted_by','$date','$time','$role_id')");
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
 	}
	if($function_name=='CheckStockAvaiableOrNot')
	{
		$item_id=$_GET['id'];
		$quantity=$_GET['quantity'];
 		$cheskquery=mysql_query("select * from `stock_quantity` where item_id='$item_id'");		
		$ftc_nmg=mysql_fetch_array($cheskquery);
		$ftcQuantity=$ftc_nmg['quantity'];	
		if($ftcQuantity<$quantity){ echo 1;}
		else {}	
	}
	if($function_name=='ItemReturnAjaxView')
	{
		$item_id=$_GET['id'];
		$from=$_GET['from'];
		$report_type=$_GET['report_type'];
		if(!empty($from)){$from=date('Y-m-d', strtotime($from));}
		$to=$_GET['to'];
		if(!empty($to)){$to=date('Y-m-d', strtotime($to));}
		
		$where='';
		if(!empty($item_id) && empty($to)){$where="`item_id` = '$item_id'";}
		if(!empty($to) && empty($item_id)){$where="`issue_date` between '$from' AND '$to'";}
		if(!empty($to) && !empty($item_id)){$where="`item_id` = '$item_id' && `issue_date` between '$from' AND '$to'";}
		$fet_data=mysql_query("select * from `".$report_type."` where ".$where." order by `id` DESC");
		 
		if($report_type=='issue_item'){$report_view='Issue Report';}
		if($report_type=='return_item'){$report_view='Return Report';}
		?>
        <div align="center"> <h3> <?php echo $report_view; ?></h3></div>
        <table class="table-condensed table-bordered" style="width:100%;">
            <thead>
            <tr>
                <th>S. No.</th>
                <th>Name</th>
                <th>Mobile No</th>
                <th>Item</th>
                <th>Item Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <?php
                	if($report_type=='issue_item'){echo '<th>Issue Date</th>';}
					if($report_type=='return_item'){echo'<th>Return Date</th>';}
				?>
                
                <th>Remarks</th>
             </tr>
            </thead>
            <tbody>
        <?php
		$x=0;
		while($fet_data=mysql_fetch_array($fet_data))
		{	$x++;
			$name=$fet_data['name'];
			$mobile_no=$fet_data['mobile_no'];
			$item_id=$fet_data['item_id'];
			$r1=mysql_query("select `item_name` from master_item where `id` = $item_id");		
			$row1=mysql_fetch_array($r1);
			$item_name=$row1['item_name'];
			$item_price=$fet_data['item_price'];
			$total_price=$fet_data['total_price'];
			$quantity=$fet_data['quantity'];
 			$remarks=$fet_data['remarks'];
			?>
            <tr>
            	<td><?php echo $x?></td>
            	<td><?php echo $name?></td>
                <td><?php echo $mobile_no?></td>
                <td><?php echo $item_name?></td>
                 <td><?php echo $item_price?></td>
                <td><?php echo $quantity?></td>
                 <td><?php echo $total_price?></td>
                <?php
					if($report_type=='issue_item'){echo'<td>'.date('d-m-Y', strtotime($fet_data['issue_date'])).'</td>';}
					if($report_type=='return_item'){echo'<td>'.date('d-m-Y', strtotime($fet_data['return_date'])).'</td>';}
				?>
                <td><?php echo $remarks?></td>
             </tr>
            <?php
			
		}
		?>
        	</tbody>
        </table>
        <?php
	}
	if($function_name=='CheckStockReturnMoreThenIssueOrNot')
	{
		$issue_id=$_GET['issue_id'];
		$quantity=$_GET['quantity'];
		$item_id=$_GET['item_id'];
		$cheskquery=mysql_query("select * from `issue_item` where id='$issue_id' && `item_id` = '$item_id'");		
		$ftc_nmg=mysql_fetch_array($cheskquery);
		$ftcQuantity=$ftc_nmg['quantity'];	
		if($ftcQuantity<$quantity){ echo 1;}
		else {}	
		
	}
?>