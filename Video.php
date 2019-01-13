<?php
use Classes\StatusParser as StatusParser;
require __DIR__.'/vendor/autoload.php';

$address = '0.0.0.0';
$port = 11111;

echo "[Info] Avviato server per il video.".PHP_EOL;
$resource = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
socket_bind($resource, $address, $port);

echo "[Info] Server avviato.".PHP_EOL;
while (true) {
    socket_recvfrom($resource, $buf, 2048, 0, $from, $port);
    $hex = strToHex($buf);
    echo $hex;
    file_put_contents("video.h264",$buf, FILE_APPEND);
}

function strToHex($string){
    $hex = '';
    for ($i=0; $i<strlen($string); $i++){
        $ord = ord($string[$i]);
        $hexCode = dechex($ord);
        $hex .= substr('0'.$hexCode, -2);
    }
    return strToUpper($hex);
}
