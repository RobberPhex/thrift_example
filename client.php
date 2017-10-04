<?php

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Transport\TSocket;
use tutorial\PingClient;

require __DIR__ . "/vendor/autoload.php";


$serverHost = '127.0.0.1';
$serverPort = 9090;
$phpServerPath = '/';

$transport = new TSocket($serverHost, $serverPort);
$transport->setSendTimeout(10000);
$transport->setRecvTimeout(10000);
$transport->open();
#$protocol = new TBinaryProtocol($transport);
$protocol = new TBinaryProtocolAccelerated($transport);

$client = new PingClient($protocol);

$res = $client->ping();

var_dump($res);
