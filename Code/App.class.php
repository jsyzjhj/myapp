<?php
namespace Code;

class APP{

    public function init(){
            //加载配置文件

    }

    /**
     *
     */
    public function exec(){
        $rout   =   new \Code\Lib\Rout();
        list($app,$controller,$action)=$urlinfo=$rout->urlParse();
        define('app',$app);
        define('controller',$controller);
        define('action',$action);
        $class    =   '\\'.join('\\',array($app,'Controller',$controller));
        //调用控制器
        $controller=new $class;
        //调用方法
        call_user_func_array(array($controller,$action),array());
    }

    public function run(){
        $this->init();
        $this->exec();
    }



}