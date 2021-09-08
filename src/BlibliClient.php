<?php
namespace Rusmanab\Blibli;

use InvalidArgumentException;
use Rusmanab\Blibli\Module\Product;


class BlibliClient{

    protected $module = [];
    protected $mtaApi = ""; 
    protected $mtaPwd = ""; 
    protected $channelId = "";

    protected $partnerCode = "";
    protected $partnerUname= "";
    protected $partnerKey= "";
    

    public function __construct()
    {        
        $this->module['product']  = new Product($this);
    }

    public function setMtaApi($mtaApi){
        $this->mtaApi = $mtaApi;

    }
    public function setMtaPwd($mtaPwd){
        $this->mtaPwd = $mtaPwd;
    }
    public function setChannelId($channelId){
        $this->channelId = $channelId;
    }
    
    public function setPartnerCode($partnerCode){
        $this->partnerCode = $partnerCode;
    }
    public function setPartnerUname($username){
        $this->partnerUname = $username;
    }
    public function setPartnerKey($partnerKey){
        $this->partnerKey = $partnerKey;
    }
    

    public function __get(string $name)
    {
        if (!array_key_exists($name, $this->module)) {
            throw new InvalidArgumentException(sprintf('Property "%s" not exists', $name));
        }

        return $this->module[$name];
    }
    

    
    
    public function send($uri, $data = [], $methode = "POST"){

        $uri = $this->baseUrl . $uri;

        $header = array(
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Basic '. base64_encode($this->mtaApi.":". $this->mtaPwd),  
            'Api-Seller-Key: '. $this->partnerKey,
        );
        
        $params = array('foo' => 'bar');
        $uri = $uri . '?' . http_build_query($params);

        $jsonBody = json_encode($data);

        $connection = curl_init();
        curl_setopt($connection, CURLOPT_URL, $uri);
        curl_setopt($connection, CURLOPT_HTTPHEADER, $header);
        curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($connection, CURLOPT_SSL_VERIFYHOST, 0);

        if ( $methode == "POST" ){
            curl_setopt($connection, CURLOPT_POST, true);
            if (count($data) > 0){
                curl_setopt($connection, CURLOPT_POSTFIELDS, $jsonBody);
            }

        }
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($connection);

        curl_close($connection);

        if ( $response ){
            $json_decode = json_decode($response);
        }else{
            return false;
        }

        return $json_decode;
    }

    public function printLabel($uri){

        $uri = $this->baseUrl . $uri;

        $header = array(
            'Content-Type: application/json',
            //'Authorization: '.$this->authorization(),
            'User-Agent: '. $this->userAgent,
        );

        $connection = curl_init();
        curl_setopt($connection, CURLOPT_URL, $uri);
        curl_setopt($connection, CURLOPT_HTTPHEADER, $header);
        curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($connection, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($connection);

        curl_close($connection);

        return $response;
    }
}
