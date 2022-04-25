<?php
require_once $_SERVER['DOCUMENT_ROOT']."/test"."/Networks/BaseClass.php";


class TappxClass extends BaseClass{
    public function __construct($p_app_key, $p_request_cont){
        
        parent:: __construct();
     $this->calling=$this->call( $p_app_key,$p_request_cont);
    }
    public function call($appKey,$variables){
      
    $opts = array('http' =>
                array(
                    'method'  => 'GET',
              
                    'content' => $variables
                )
    );
    $context = stream_context_create($opts);
        $params= 
        //"&sz=".$variables['sz'].
        "&os=".$variables['os'].
        "&ip=".$variables['ip'].
        "&source=".$this->source.
        "&ab=".$variables['ab'].
        "&aid=".$variables['aid'].
        "&mraid=".$this->mraid.
        "&ua=".$variables['ua'].
        "&cb=".$this->cb.
        "&timeout=".$this->timeout.
        "&lat=".$variables['lat'].
        "&lon=".$variables['lon'].
        "&an=".$variables['an'];
    
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, URL.$appKey.$params);
       $response = 
       curl_exec($curlSession);
       $info = curl_getinfo($curlSession);
    //    file_get_contents(
    //        URL.$appKey.$params,false, $context
    //     );
        var_dump($info["http_code"]);
        return $response ;
       
   
    }
}