<?php
/**
give a credit to https://medium.com/makers-byte/using-curl-api-calls-with-php-746d0f8b5edd
 */
class CallAPI{
    private static $result ;
    function __construct($method, $url,$data){
        if(function_exists('curl_version')){
            $curl = curl_init();
            switch($method){
                case "POST":
                    curl_setopt($curl, CURLOPT_POST,1);
                    if($data){
                        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
                    }
                    break;
                case "PUT":
                    curl_setopt($curl,CURLOPT_CUSTOMREQUEST,"PUT");
                    if($data) {
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    }
                    break;
                default:
                    if($data){
                        $url = sprintf("%s?%s",$url,http_build_query($data) );
                    }
            }
            curl_setopt($curl,CURLOPT_URL,$url);
            curl_setopt($curl,CURLOPT_HTTPHEADER,array(
                'APIKEY: 111111111111111111111',
                'Content-Type: application/json',
            ));
            curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($curl,CURLOPT_HTTPAUTH,CURLAUTH_BASIC);
            //Execute
            CallAPI::$result = curl_exec($curl);
            if(!CallAPI::$result){
                die("Connection Failure");
            }
            curl_close($curl);
        }else{
            die("Curl Is not installed: Please Enable it on php.ini file");
        }
    }
    public static function getData(){
        return CallAPI::$result;
    }
    //Array will return
    public static function getJsonDecode(){
        return json_decode(CallAPI::getData(),true);
    }
}