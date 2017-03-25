<?php 
//include("index_layout.php"); 
include("database.php");
error_reporting(0);
@ini_set('display_errors',0);
ini_set('max_execution_time', 200000);

$news_x_id=$_GET['news_val'];
   
 $event_x_id1=mysql_query("select * from news where id='$news_x_id'");		
					$event_x_id11=mysql_fetch_array($event_x_id1);	

$e_title=$event_x_id11['news_title'];


					$time1=date('Y-m-d G:i:s');
					$sql_token_qry=mysql_query("select * from login");		
					while($sql_token=mysql_fetch_assoc($sql_token_qry))
					{
					$API_ACCESS_KEY=$sql_token['notification_key'];
					$device_token=$sql_token['device_token'];
					if(!empty($device_token))
					{
	$msg = array
	(
	'message' 	=> $e_title,
	'button_text'	=> 'View News',
	'link'	=> 'notice://news?id='.$news_x_id,
	'notification_id'	=> $news_x_id,
	);
	
$url = 'https://fcm.googleapis.com/fcm/send';
$fields = array
(
	'registration_ids' 	=> array($device_token),
	'data'			=> $msg
);
$headers = array
(
	'Authorization: key=' .$API_ACCESS_KEY,
	'Content-Type: application/json'
);

  //echo json_encode($fields);
  $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
$result = curl_exec($ch);
if ($result === FALSE) {
	die('FCM Send Error: ' . curl_error($ch));
}
curl_close($ch);
$l[]=$result;
				}
}
return $l;

echo 'successfully';

?>



