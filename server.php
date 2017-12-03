<?php
/**
 * Created by PhpStorm.
 * User: placeless
 * Date: 2017/12/2
 * Time: 下午7:27
 */

use Thrift\Server\TServerSocket;

require 'vendor/autoload.php';
require 'gen-php/Services/HelloWorld/HelloWorld.php';
class HelloWorldHandler implements \Services\HelloWorld\HelloWorldIf
{

    public function ping()
    {
        return 'pong';
    }

    public function hello($name)
    {
        return 'hello'.$name;
    }
}

$handler = new HelloWorldHandler();
$processor = new \Services\HelloWorld\HelloWorldProcessor($handler);


$transport = new TServerSocket('localhost',9090);

$out_factory = $in_factory = new \Thrift\Factory\TTransportFactory();
$out_protocol = $in_protocol = new Thrift\Factory\TBinaryProtocolFactory();

$server = new \Thrift\Server\TSimpleServer($processor, $transport,$in_factory,$out_factory,$in_protocol,$out_protocol);


$server->serve();



