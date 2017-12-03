# Thrift PHP Server and Client

## Getting start
### install thrift
```
brew install thrift (mac)
```

### write .thrift file
```$xslt
namespace php Services.HelloWorld
service HelloWorld
{
    string ping();
    string hello(1:string name);
}
```
`如果是php namespace就写php，也可以写多个`

### generate thrift php server code

```$xslt
thrift --gen php:server HelloWorld.thrift
thrift --gen php HelloWorld.thrift

```
`如果没有带server参数，仅仅生成client代码`

## 参考链接
https://www.ibm.com/developerworks/cn/java/j-lo-apachethrift/
https://github.com/swoole/thrift-rpc-server