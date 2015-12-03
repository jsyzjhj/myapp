<?php
namespace Code\Lib;
class Controller{
    public   $smarty;
    public function __construct(){
        require_once SYSROOT.'/'.CODEROOT.'/extend/Smarty/libs/Smarty.class.php';
        $this->smarty = new \Smarty;
        $dir    =   APPROOT.'/Admin/View/';
        $this->smarty->template_dir = $dir;
        $this->smarty->compile_dir = SYSROOT.'/'.CODEROOT.'/extend/Smarty/demo/templates_c/';
        $this->smarty->config_dir = SYSROOT.'/'.CODEROOT.'/extend/Smarty/demo/configs/';
        $this->smarty->cache_dir = SYSROOT.'/'.CODEROOT.'/extend/Smarty/demo/cache/';
    }
    public function display($url){
        $this->smarty->display($url);
    }
    public function assign($name,$value){
        $this->smarty->assign($name,$value);
    }
    public  function show($file=false){
        $this->smarty->assign('name','Ned');
        $this->smarty->display('index.tpl');
    }
}

