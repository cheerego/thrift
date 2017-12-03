<?php
/**
 * Created by PhpStorm.
 * User: placeless
 * Date: 2017/12/2
 * Time: 下午7:27
 */

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TBufferedTransport;
use Thrift\Transport\TSocket;

require 'vendor/autoload.php';
require 'gen-php/Services/HelloWorld/HelloWorld.php';

$socket = new TSocket('localhost', 9090);
//创建Transport
$transport = new TBufferedTransport($socket, 1024, 1024);
//创建TProtocol
$protocol = new TBinaryProtocol($transport);
$client = new \Services\HelloWorld\HelloWorldClient($protocol);

$transport->open();

$name = 'jason';
//调用Client的相应方法
$ret = $client->hello($name);
var_dump($ret);

$transport->close();