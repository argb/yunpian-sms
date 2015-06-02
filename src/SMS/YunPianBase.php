<?php namespace Ender\YunPianSms\SMS;
/**
 * Created by PhpStorm.
 * User: ender
 * Date: 15/6/2
 * Time: 下午4:04
 */

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

abstract class YunPianBase {

    protected $baseUri;
    protected $apiKey;
    protected $client;

    /**
     * @param $apiKey
     */
    public function __construct($apiKey){

        $this->baseUri='http://yunpian.com';
        $this->apiKey=$apiKey;

        $this->client=new Client([
                'base_uri'=>$this->baseUri
        ]);
    }

    /**
     * @param $apiKey
     */
    public function setApiKey($apiKey){
        $this->apiKey=$apiKey;
    }

    protected function send($path,$params=[],$method='post'){
        if(isset($this->apiKey)){
            $params['apikey']=$this->apiKey;
        }

        $url=$this->baseUri.'/'.$path;
        $method=strtolower($method);

        if($method=='get'){
            $response=$this->client->get($path,[
                'query'=>$params
            ]);
        }else{
            $response=$this->client->post($path,[
                'form_params'=>$params
            ]);
        }

        $response=$this->processResponse($response);

        return $response;
    }

    /**
     * @param ResponseInterface $response
     * @return array
     */
    protected function processResponse(ResponseInterface $response){
        $body=$response->getBody();
        //$size=$body->getSize();
        $cnt=$body->getContents();

        $cntArr=json_decode($cnt,true);
        $statusCode=$response->getStatusCode();

        return ['status'=>$statusCode,'data'=>$cntArr];
    }
}