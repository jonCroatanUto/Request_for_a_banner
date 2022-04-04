<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once $_SERVER['DOCUMENT_ROOT']."/test".'/Networks/TappxClass.php';
require_once $_SERVER['DOCUMENT_ROOT']."/test".'/Networks/BaseClass.php';
require_once $_SERVER['DOCUMENT_ROOT']."/test".'/Methods/ParseClass.php';
require_once $_SERVER['DOCUMENT_ROOT']."/test".'/Methods/OutputClass.php';
require_once $_SERVER['DOCUMENT_ROOT']."/test".'/constants.php';



try {
    $appKey                = API_KEY;
    $requestContentString  = INPUT_PARAMS;

    //From 22 to 26 line I explain how to use the output to render the encoded content;
    //You can uncomment and render the banner

    // $Output =file_get_contents("./Output/1649075834.json"); 
    // $decodedOutput= json_decode($Output);
    // if(isset($decodedOutput)){
    //   var_dump($decodedOutput->ad) ;
    // }

    $test = new Launcher($appKey, $requestContentString);
    $res  = $test->Run();
    
    echo PHP_EOL . PHP_EOL . "end" . PHP_EOL . PHP_EOL . PHP_EOL;
}
catch (Exception $p_ex) {
    
    echo PHP_EOL . $p_ex->getMessage() . PHP_EOL . PHP_EOL . PHP_EOL;
}

exit(0);


class Launcher {

    private $m_app_key;
    private $m_request_content;
    private $m_timeout;
  
    public function __construct($p_app_key, $p_request_content_object) {
        $this->m_app_key         = $p_app_key;
        $this->m_request_content = $this->ParseContent($p_request_content_object);
        $this->m_timeout=400;
    }
    private  function ParseContent($p_content) {
      //In this function I use parse clase to get the params that I want from a given Request.json
      //Also to aply urEncode method to each params as is required by the API
        $prepareParsingParams=new ParseClass($p_content);
        $parsedParams=$prepareParsingParams->parseParams;

        return $parsedParams;
   
    }

    public function Run() {
        $res = [];
       
        $start = microtime(true);
        //TappexClass recive ApiKey and params object to do the request to the api
        $res[]= new TappxClass($this->m_app_key, $this->m_request_content);

        //method calling it will say how the request had gone 
        //it will back a:
          //___False if is a bad request
          //___Empty String if the request have no results
          //___HTML code if all was good
        //this response it will be passed as a paramater to OutputClass
        //outPut class will read the response and generate a Encoded Json depending on it.
        $response=$res[0]->calling;
        $prepareOutput=new OutputClass( $response);
        $prepareOutput->sendOutput;
        
     
       //you can creat al the request you want just changing m_request_content and calling TappxClass
        //$res[] = new TappxClass($this->m_app_key, $this->m_request_content_network2);
        //$res[] = new TappxClass($this->m_app_key, $this->m_request_content_network3);
        //$res[] = new TappxClass($this->m_app_key, $this->m_request_content_network4);

        if (((microtime(true) - $start) * 1000) > $this->m_timeout || is_null($this->m_timeout))
        
            throw new Exception("TEST not valid");
        
        
        return $res;
    }
}