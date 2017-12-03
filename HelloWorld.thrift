namespace php Services.HelloWorld
service HelloWorld
{
    string ping();
    string hello(1:string name);
}