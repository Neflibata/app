<?php

namespace app\index\controller;

use think\Config;
use think\Container;
class Index
{
    public function index()
    {
        // echo THINK_VERSION;
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
        echo Config::get("SS");
    }
    // 依赖注入
    public function personbuy()
    {
        /*
        //依赖注入
        $signwa =  new \di\Person();
        $bmw= new \di\Car();
        $m= new \di\M();

        echo $signwa->buy($m);*/
        // 容器
        \di\Container::getInstance()->set('Person','\di\Person');
        // \di\Container::getInstance()->set('Car','\di\Car');

        $obj= \di\Container::getInstance()->get('Person');
         dump($obj->buy());
//        dump($obj->buy(\di\Container::getInstance()->get()));
       
    }

    public function obj()
    {
        $obj = new \ObjArray();
//       var_dump($obj['title']);
        $obj['num']=10;
        var_dump($obj);

    }
    // 反射
    public function rel(){
        $obj=new \A();
        // dump($obj);
        // 反射类
        $obj2=new \ReflectionClass($obj);
        // dump($obj2);
        $instance=$obj2->newInstance();//相当于实例化这个类
        // dump($instance);
        $methods=$obj2->getMethods();//调用类里的方法
        // dump($methods);
        $properties=$obj2->getProperties();//调用类里的属性
        // dump($properties);

        // 使用方法
        // 方法一
        // echo $instance->abc(1,2);
        // 方法二
        // $method=$obj2->getMethod("abc");
        // echo $method->invokeArgs($instance,["mm","22"]);
        // 方法三
        // $method=$obj2->getMethod("ddd");
        // echo $method->invoke($instance);

        // 反射方法
        $method = new \ReflectionMethod($obj,'abc');
        if($method->isPublic()){//判断是否是公共的
            echo "ddd方法是公共的";
        }
        dump($method->getParameters());//打印出参数
        dump($method->getNumberOfParameters());//打印出参数数量
    }
//    php自带的SingwaConunt类的用法
    public function acount()
    {
        $obj=new \SingwaConunt();
//        echo $obj->count();
        echo count($obj);
    }

    public function container()
    {
//        $config=new \Config();
//        dump($config::get('app.'));

//        dump(Container::get('config')->get('app.'));
        dump(app("config")->get('app.'));
    }
    // 测试
    public function test()
    {
       $a=2;
       $b=1;
       $a xor $b;
       echo $c;
    }
}
