<?php
require_once $_SERVER['DOCUMENT_ROOT']."/test"."/Networks/BaseClass.php";


class TappxClass extends BaseClass{
    public function __construct($p_app_key, $p_request_cont){
        
        parent:: __construct();
     $this->calling=$this->call( $p_app_key,$p_request_cont);
    }
    public function call($appKey,$url){

        $params= 
        "&sz=".$url['sz'].
        "&os=".$url['os'].
        "&ip=".$url['ip'].
        "&source=".$this->source.
        "&ab=".$url['ab'].
        "&aid=".$url['aid'].
        "&mraid=".$this->mraid.
        "&ua=".$url['ua'].
        "&cb=".$this->cb.
        "&timeout=".$this->timeout.
        "&lat=".$url['lat'].
        "&lon=".$url['lon'].
        "&an=".$url['an'];
    

       $response = file_get_contents(
           URL.$appKey.$params
        );
        
        return $response ;
       
   
    }
}