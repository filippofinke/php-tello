<?php
use Classes\Commands as Commands;
use Classes\Command as Command;
use Classes\UdpClient as UdpClient;

require __DIR__.'/vendor/autoload.php';

$udp = new UdpClient("192.168.10.1", 8889);

$commands = array(
  Commands::command(),
  Commands::streamon()
  /*Commands::takeoff(),
  Commands::go(50,50,100, 30),
  new Command("Delay", 10000),
  Commands::land()*/
);

foreach ($commands as $cmd) {
  echo "[Eseguo] ".$cmd->getCommand().PHP_EOL;
  $udp->sendCommand($cmd);
}

function readCmd() {
  global $udp;
  echo "[Info] Leggo".PHP_EOL;
  $read = $udp->readCommand();
  echo "[Info] Ho letto: $read".PHP_EOL;
  if($read == "error" || $read == null) {
    echo "[Info] Inizio atterraggio".PHP_EOL;
    $udp->sendCommand(Commands::takeoff());
    echo "[Info] Script terminato".PHP_EOL;
    exit;
  }
}

/*$udp->sendCommand(Commands::getBattery());
$read = $udp->readCommand();
var_dump($read);*/
/*$reflection = new ReflectionClass('Classes\Commands');
$methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);
for ($j = 0; $j < count($methods); $j++) {
    $method = $methods[$j]->name;
    echo "Method: $method ".PHP_EOL;
    $val = Commands::$method(rand(0, 500), rand(0, 500), rand(0, 500), rand(0, 500), rand(0, 500), rand(0, 500), rand(0, 500), rand(0, 500));
    if ($val == null) {
        continue;
    }
    var_dump($udp->sendCommand($val));
    $read = $udp->readCommand();
    var_dump($read);
    echo "Correct? ".(($read == $val->getCommand())?"YES":"NO").PHP_EOL;
}*/
