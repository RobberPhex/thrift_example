#!/usr/bin/env php
<?php

require_once __DIR__ . "/vendor/autoload.php";

use Thrift\Factory\TBinaryProtocolFactory;
use Thrift\Server\TServerSocket;
use Thrift\Server\TSimpleServer;
use tutorial\EchoServcieIf;
use tutorial\EchoServcieProcessor;

class EchoService implements EchoServcieIf{

    /**
     * @param (array)[] $arg
     * @return bool
     */
    public function echoF(array $arg)
    {
        var_dump($arg);
        return true;
    }
}

$serverSocket = new TServerSocket('0.0.0.0');

$server = new TSimpleServer(
        new EchoServcieProcessor(new EchoService),
        $serverSocket,
        new \Thrift\Factory\TTransportFactory(),
        new \Thrift\Factory\TTransportFactory(),
        new TBinaryProtocolFactory(),
        new TBinaryProtocolFactory()
    );

$server->serve();