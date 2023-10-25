<?php
require '../vendor/autoload.php';

use \Demo\HelloWorld as World;
use Demo\Hello\Lara;
use Demo\Hello;

$lara= new Lara();
$vincent= new Hello\Someone('Vincent');

$mary = new \Demo\Hello\Someone('Mary');
$john = new Demo\Hello\Someone('John');

$world = new World();

//monolog/monolog
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('WISD');
$log->pushHandler(new StreamHandler('../Log/my.log', Level::Warning));

// add records to the log
$log->warning('Foo');
$log->error('Bar');