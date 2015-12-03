<?php
namespace Code\Lib;
class Rout{

    public function __construct(){
        $this->init();
    }
    protected function init(){
    }

    public function urlParse(){
        $_url   =   '';
        $controller =   '';
        $action =   '';
        if($_SERVER['PATH_INFO']){
            $_url   =   $_SERVER['PATH_INFO'];
        }else {
            $_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
            //去掉index.php 之类的
            $_phpself = $_SERVER['SCRIPT_NAME'];
            if ($_phpself) {
                $_url = str_replace($_phpself, '', $_url);
            }
        }
        if($_url){
            $_urlToArr=explode('/',ltrim($_url,'/'));
            $app    =   isset($_urlToArr[0])?$_urlToArr[0]:false;
            $controller    =   isset($_urlToArr[1])?$_urlToArr[1]:false;
            $action    =   isset($_urlToArr[2])?$_urlToArr[2]:false;
            if(empty($controller)){
                $controller =   $app;
                $action =   'index';
                $app    =   'admin';//默认的app，到时候如果加上自动加载配置的时候加上
            }else if(empty($action)){
                $action =   $controller;
                $controller =   $app;
                $app    =   'admin';//默认的app，到时候如果加上自动加载配置的时候加上
            }

        }//说明是初始状态直接域名访问的，则控制器是Index index方法
        else{
            $app    =   'admin';//默认的app，到时候如果加上自动加载配置的时候加上
            $action =   'index';
            $controller =   'Index';
        }
        $arr =  array($app,$controller.'Controller',$action);

        array_walk($arr,function (&$value,$key){$value=ucfirst($value);});
        return $arr;
    }
}