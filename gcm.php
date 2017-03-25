
<?php

    $db_host = "localhost";
    $db_user = "root"; //change to your database username, it is root by default
    $db_pass = '';     //change to your database password, for XAMPP it is nothing for WAMPP it is root
    $db_db = 'notice'; //change to your database name

    if(!@mysql_connect($db_host, $db_user, $db_pass) || !@mysql_select_db($db_db)) {
        die('couldnt connect to database ' .mysql_error());
    }

?>


<?php
$message = array
	(
	'message' 	=> 'Event',
	'button_text'	=> 'Awesome',
	'link'	=> 'www.facebook.com',
	'notification_id'	=> 1,
	);


function sendPushNotification($registration_ids, $message) {

    $url = 'https://fcm.googleapis.com/fcm/send';
    $fields = array(
        'registration_ids' => $registration_ids,
        'data' => $message,
    );

    define('GOOGLE_API_KEY', 'AIzaSyCta6Ocjsx_45xLRJ3bLkoSHnyaWdExYRM');

    $headers = array(
        'Authorization:key=' . GOOGLE_API_KEY,
        'Content-Type: application/json'
    );
	
    echo json_encode($fields);
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

$pushStatus = '';

if(!empty($_GET['push'])) {

    $query = "SELECT device_token FROM login";
    if($query_run = mysql_query($query)) {

        $gcmRegIds = array();
        while($query_row = mysql_fetch_assoc($query_run)) {

            array_push($gcmRegIds, $query_row['device_token']);
        }
}
    $pushMessage = $_POST['message'];
    if(isset($gcmRegIds) && isset($pushMessage)) {

        $message = array('message' => $pushMessage);
        $pushStatus = sendPushNotification($gcmRegIds, $message);

    }   
}

?>

<html>
    <head>
        <title>Google Cloud Messaging (GCM) Server in PHP</title>
    </head>
    <body>
    <h1>Google Cloud Messaging (GCM) Server in PHP</h1>
    <form method = 'POST' action = 'gcm.php/?push=1'>
        <div>
            <textarea rows = 2 name = "message" cols = 23 placeholder = 'Messages to Transmit via GCM'></textarea>
        </div>
        <div>
            <input type = 'submit' value = 'Send Push Notification via GCM'>
        </div>
        <p><h3><?php echo $pushStatus ?></h3></p>
    </form>
    </body>
</html>