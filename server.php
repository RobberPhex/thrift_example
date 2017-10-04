<?php

use Thrift\Factory\TBinaryProtocolFactory;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TCurlClient;

require __DIR__ . "/vendor/autoload.php";


use Thrift\Factory\TTransportFactory;
use Thrift\Server\TServerSocket;
use Thrift\Server\TSimpleServer;
use Thrift\Transport\TPhpStream;
use Thrift\Transport\TBufferedTransport;
use Thrift\Transport\TSocket;
use tutorial\PingIf;
use tutorial\PingProcessor;

class ExampleService implements PingIf
{
    public function ping()
    {
        return 'ping method called ';
    }
}

$handler = new ExampleService();
$processor = new PingProcessor($handler);
$transport = new TServerSocket();
$server = new TSimpleServer(
    $processor,
    $transport,
    new TTransportFactory(),
    new TTransportFactory(),
    new TBinaryProtocolFactory(true, true),
    new TBinaryProtocolFactory(true, true)
);

$server->serve();
