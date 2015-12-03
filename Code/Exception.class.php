<?php
namespace Code;
class Exception{
    private static $err_log  =  array();
    public function getErrLog(){
        return self::$err_log;
    }
    public function setError($code,$msg,$level='E'){
        self::$err_log[$level]=array($code=>$msg);
    }
    public function E($code,$msg=false){
        if($code>0){
            if($msg){
                $this->setError($code,$msg,'E');
            }else{
                $errlog =   $this->getErrLog();
                return $errlog['E'][$code];
            }
        }

    }
}