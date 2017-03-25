

<?php
	$data = array
	(
	'message' 	=> 'Event',
	'button_text'	=> 'Awesome',
	'link'	=> 'www.facebook.com',
	'notification_id'	=> 1,
	);

	$target = 'dgsF0kuufHU:APA91bEGRoWnFwJyiGPMjtrhN1UBIL_VYmDQhvBgfVaJCX2I2obQPvYrotmzICPBqlW23_4xT2TQ3zw0OJLnu1oWwkEG3-B7X-3mF3kjDPuM9TjkKs0Ge_vQHbUscMpFUDczZGEpj_5L';
	
 function sendMessage($data,$target){
//FCM api URL
$url = 'https://fcm.googleapis.com/fcm/send';
//api_key available in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
$server_key = 'AIzaSyCta6Ocjsx_45xLRJ3bLkoSHnyaWdExYRM';
			
$fields = array();
$fields['data'] = $data;
if(is_array($target)){
	$fields['registration_ids'] = $target;
}else{
	$fields['to'] = $target;
}
//header with content_type api key
$headers = array(
	'Content-Type:application/json',
  'Authorization:key='.$server_key
);
			
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
return $result;
}

?>

