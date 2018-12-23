<?php
use Classes\StatusParser as StatusParser;
require __DIR__.'/vendor/autoload.php';

$address = '0.0.0.0';
$port = 8890;

echo "[Info] Avviato server per lo stato.".PHP_EOL;
$resource = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
socket_bind($resource, $address, $port);

echo "[Info] Server avviato.".PHP_EOL;
$x = 0;
while (true) {
    socket_recvfrom($resource, $buf, 2048, 0, $from, $port);
    if($x % 3 == 0)
    {
      var_dump(StatusParser::parse($buf));
    }
    $x++;
}
