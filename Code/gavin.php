<?php
defined('APPROOT') or define('APPROOT','Appliction');

spl_autoload_register('gavinAutoLoad');

//加载异常处理类
$exception    =   new Code\Exception();
$exception->E(13,'初始化');

//加载公共方法
$pubfun='common/functions.php';
loadFile($pubfun);
//调用App类初始化
$app    =   new Code\App();
$app->run();

//$t  =   new Code\Lib\Controller();
//$t->show();


function loadFile($file,$dir=SYSROOT){
    static $loadList=array();
    if($dir)
        $file=rtrim($dir,'/').'/'.$file;
    if(file_exists($file)){
        if(!in_array($file,$loadList)) {
            $loadList[] = $file;
            require_once $file;
        }
    }else{
        $exception    =   new Code\Exception();
        $exception->E(15,$file.'加载失败');
    }
}

function gavinAutoLoad($class,$ext='.class.php'){
    static $classList   =   array();
    $file=false;
    //使用命名空间
    if(false!==strpos($class,'\\')){
        $arr =   explode('\\',$class);
        //系统的类加载
        if($arr[0]=='Code'){
            $file    =   rtrim(SYSROOT,'/').'/'.str_replace('\\','/',$class);
        }
        //控制器的类加载
        else if(in_array('Controller',$arr)){
            $file    =   trim(SYSROOT,'/').'/'.rtrim(APPROOT,'/').'/'.str_replace('\\','/',$class);
        }
        //项目的类加载
        $file =$file.$ext;
    }
    if($file&&file_exists($file)){
        if(!in_array($file,$classList)){
            require_once $file;
        }

    }
}



