<?php
/**
 * Created by PhpStorm.
 * User: ender
 * Date: 15/6/2
 * Time: 下午10:59
 */

namespace Ender\YunPianSms\SMS;


class YunPianUser extends YunPianBase{

    /**
     * @param array $params
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function getAccountInfo($params=[]){
        $response=$this->send('/v1/user/get.json',$params);

        return $response;
    }

    /**
     * @param array $params
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function setAccountInfo($params=[]){
        $response=$this->send('/v1/user/set.json',$params);

        return $response;
    }
}