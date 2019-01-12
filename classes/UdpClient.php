<?php
namespace Classes;

class UdpClient
{
    private $address;

    private $port;

    private $socket;

    public function __construct($address, $port)
    {
        $this->address = $address;
        $this->port = $port;
        $this->socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        socket_set_option($this->socket,SOL_SOCKET,SO_RCVTIMEO,array("sec"=>15,"usec"=>0));
    }

    public function sendCommand($command)
    {
        $commandstring = $command->getCommand();
        $timeout = $command->getTimeout();
        if (!socket_sendto(
        $this->socket,
        $commandstring,
        strlen($commandstring),
        0,
        $this->address,
        $this->port
    )
      ) {
            $errorcode = socket_last_error();
            $errormsg = socket_strerror($errorcode);
            echo "Couldn't send the command: [$errorcode] $errormsg";
            socket_clear_error();
            return false;
        } else {
            sleep($timeout / 1000);
            return true;
        }
    }

    public function readCommand()
    {
        socket_recvfrom($this->socket, $buf, 1024, 0, $from, $port);
        return $buf;
    }
}
