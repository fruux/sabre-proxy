<?php

use Sabre\Proxy\Cli\Application;

require __DIR__ . '/../vendor/autoload.php';

$proxy = new Sabre\Proxy\Proxy();
$proxy->start();
