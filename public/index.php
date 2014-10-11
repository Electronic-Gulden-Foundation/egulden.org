<?php

define('ROOTPATH', __DIR__.'/..');
define('APPPATH',  ROOTPATH.'/app');

require APPPATH.'/Autoloader.php';

$autoloader = new Autoloader(APPPATH.'/classes');

spl_autoload_register(array($autoloader, 'load'));

$application = new Application();
echo $application->handle();
