<?php

$data = json_decode(file_get_contents('php://input'), true); 

$number   = $data["from"];
$message  = $data["message"];

switch($message) {
case 'ID':
    $msg = 'Your number = '.$number.'';
sendMessage($number, $msg, $file);
break;

case 'MACBOOK':
    $msg = 'MACBOOK PRO M1 Harga Rp. 20.999.000';
    $file = "https://cdn.eraspace.com/pub/media/catalog/product/m/a/macbook_pro_m1_space_gray_1_2.jpg";
sendMessage($number, $msg, $file);
break;
}

function sendMessage($number, $message, $file) {

$url = 'https://app.whacenter.com/api/send';

$ch = curl_init($url);

$data = array(
    'device_id' => 'd186616983f2e3ff815373c20091e885', //sesuaikan dg device id anda
    'number' => $number,
    'message' => $message,
     'file' => $file,
);
$payload = $data;
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
echo $result;
}

 
?>
