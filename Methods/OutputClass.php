<?php
class OutputClass{
    public function __construct($p_response){

        $this->sendOutput=$this->sendOutputDependingOnResponse($p_response);
    }
    public function sendOutputDependingOnResponse($response){

        if($response===false){
            //this is the status 400 Bad Request
            $badRequestFile= fopen("./Output/".time().".json","w");
            $responseOutput=array('test'=>0,'error'=>1,'error-reason'=>"Error:400 bad request.Make sure that you pass all the required params", 'ad'=> "no content");
            $responseOutputEncoded=json_encode($responseOutput);
            fwrite($badRequestFile,$responseOutputEncoded);
 
        }else if($response===""){
            //this is the status 204 the request didn't found AD
            $notFoundFile= fopen("./Output/".time().".json","w");
            $responseOutput=array('test'=>0,'error'=>1,'error-reason'=>"Error: 204 Not found", 'ad'=>"no content");
            $responseOutputEncoded=json_encode($responseOutput);
            fwrite($notFoundFile,$responseOutputEncoded);
 
        }else{
            //this is the status 200 all was good here we generate a enconded JSON with the HTML code in ad property
            $foundFile= fopen("./Output/".time().".json","w");
            $responseOutput=array('test'=>1,'error'=>0,'error-reason'=>'Status:200,no error', 'ad'=>$response);
            $responseOutputEncoded=json_encode($responseOutput);
 
            fwrite($foundFile,$responseOutputEncoded);
            //this is the single case where the response will be printed the secreen, it Will back the banner;
            var_dump($response);
        }

}
}