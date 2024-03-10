<?php 

function sendSMS($mobileNumber,$message)
{

//Your API key
$authKey = "c5aa1f8d-30cb-4998-87dd-f12a3ab94f4d";

//Multiple mobiles numbers separated by comma
$mobileNumber = $mobileNumber;

//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "cbmSMS";

//Your message to send, Add URL encoding here.
$message = urlencode($message);

$username="LKInstitution";

$type="TRANS";

//API URL
 $url = "http://sms.hspsms.com/sendSMS?" .
         "username=". $username ."&" .
		  "message=". $message ."&" .
		 "sendername=". urlencode($senderId) ."&" .
		  "smstype=". $type ."&".
		  "numbers=". $mobileNumber ."&".
         "apikey=". $authKey;
        
		echo $url;
// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    //,CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);

return $output;


}


?>