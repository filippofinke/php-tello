<?php

$address = "127.0.0.1";
$port = 80;

$resource = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
socket_bind($resource, $address, $port);
while (true) {
    socket_recvfrom($resource, $buf, 1024, 0, $from, $port);
    echo "Received $buf from remote address $from and remote port $port" . PHP_EOL;
    socket_sendto(
      $resource,
      $buf,
      strlen($buf),
      0,
      $from,
      $port
  );
}
