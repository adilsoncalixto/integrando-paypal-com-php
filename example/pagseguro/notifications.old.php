<?php

require __DIR__.'/../../vendor/autoload.php';

$notificationCode = filter_input(INPUT_POST, 'notificationCode');
if (is_null($notificationCode)) {
    $notificationCode = 'E754313BD3C5D3C5973EE400CFAF2FD8E5A8';
}

$access = [
    'email'=>'erik.figueiredo@gmail.com',
    'token'=>'E7EF160DE74646CE80AB18EDDA257F1B',
    'notificationCode'=>$notificationCode
];

$pag_seguro = new BrPayments\Notifications\PagSeguro($access);
$pag_seguro_request = new BrPayments\Requests\PagSeguro\Notification;

$response = (new BrPayments\MakeRequest($pag_seguro_request))->make($pag_seguro, true);

$xml = new \SimpleXMLElement((string)$response);

//var_dump($xml);
header("Content-type: text/xml");
echo $response;
