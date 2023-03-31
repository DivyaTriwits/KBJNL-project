<?php
class Response extends CI_Model{
    
        public function send_sms($mobileNumberArray,$messageToSend){
             print_r($messageToSend);exit;
            $username = '';
            $hash = 'G6bdgLBhH';
            $sender = urlencode('KBJNL');
            $message = rawurlencode($messageToSend);

            $numbers = $mobileNumberArray;
            
            // Prepare data for POST request
            $data = array('username' => $username, 'password' => $hash, 'to' => $numbers, "from" => $sender, "msg" => $message,"type" => "1");
            
            // Send the POST request with cURL
            $ch = curl_init('https://sms.office24by7.com/API/sms.php');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            //print_r($response);exit;
            // Process your response here
            return $response;
        }
}
?>