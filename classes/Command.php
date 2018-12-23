<?php
namespace Classes;

class Command
{
    private $command;

    private $timeout;

    public function getCommand()
    {
        return $this->command;
    }

    public function getTimeout()
    {
        return $this->timeout;
    }

    public function __construct($command, $timeout)
    {
        $this->command = $command;
        if ($timeout < 0) {
            $timeout = 0;
        }
        $this->timeout = $timeout;
    }
}
