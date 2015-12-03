<?php
namespace Admin\Controller;
use Code\Lib\Controller;
class TestController extends Controller{
    public function test(){
        header("Content-type: text/html; charset=utf-8");
        $this->assign('name','test控制器test方法') ;
        $this->display('index.tpl');
    }

}