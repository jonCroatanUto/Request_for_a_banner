<?php
class ParseClass{
    public function __construct($params){

        $this->parseParams=$this->prepareParamsObject($params);
    }
    public function prepareParamsObject($paramsToParse){

         $paramsPetiton=json_decode($paramsToParse,true);
      
        $sendParams="";
        if(isset($paramsPetiton)){
            $sz=$paramsPetiton['imp'][0]['banner']['w'].'x'.$paramsPetiton['imp'][0]['banner']['h'];
            $os=$paramsPetiton['device']['os'];
            $ip=$paramsPetiton['device']['ip'];
            
            $ab=$paramsPetiton['app']['bundle'];
            $aid=$paramsPetiton['device']['ifa'];
            
            $ua=$paramsPetiton['device']['ua'];
            
            
            $lat=$paramsPetiton['device']['geo']['lat'];
            $lon=$paramsPetiton['device']['geo']['lon'];
            $an=$paramsPetiton['app']['name'];
  
          $sendParams = array(
          'sz'=>urlencode($sz),
          'os'=>urlencode($os),
          'ip'=>urlencode($ip),
          'ab'=>urlencode($ab),
          'aid'=>urlencode($aid),
          'ua'=>urlencode($ua),
          'lat'=>urlencode($lat),
          'lon'=>urlencode($lon),
          'an'=>urlencode($an)
          
      );
      }
          return $sendParams;
     
      }
}