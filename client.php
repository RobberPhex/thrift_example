#!/usr/bin/env php
<?php

require_once __DIR__ . "/vendor/autoload.php";

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Transport\TSocket;
use tutorial\EchoServcieClient;

$socket = new TSocket('127.0.0.1', 9090);
$socket->open();

$protocol = new TBinaryProtocolAccelerated($socket);

$client = new EchoServcieClient($protocol);

$res = $client->echoF([[1 => 3, 5 => 7], [11 => 13]]);

var_dump($res);