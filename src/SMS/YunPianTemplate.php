<?php
/**
 * Created by PhpStorm.
 * User: ender
 * Date: 15/6/2
 * Time: 下午11:00
 */

namespace Ender\YunPianSms\SMS;


class YunPianTemplate extends YunPianBase{

    /**
     * @param $typId
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function getDefaultById($typId){
        $params=['tpl_id'=>$typId];
        $response=$this->send('/v1/tpl/get_default.json',$params);

        return $response;
    }

    /**
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function getDefaultAll(){
        $response=$this->send('/v1/tpl/get_default.json');

        return $response;
    }

    /**
     * @param $typId
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function getById($typId){
        $params=['tpl_id'=>$typId];
        $response=$this->send('/v1/tpl/get.json',$params);

        return $response;
    }

    /**
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function getAll(){
        $response=$this->send('/v1/tpl/get.json');

        return $response;
    }

    /**
     * @param $cnt
     * @param $signature
     * @param int $notificationType
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function addTemplate($cnt,$signature,$notificationType=0){

        $params=[
            'tpl_content'=>$cnt.'【'.$signature.'】',
            'notify_type'=>$notificationType
        ];

        $response=$this->send('/v1/tpl/add.json',$params);

        return $response;
    }

    /**
     * @param $cnt
     * @param int $notificationType
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function addTemplateRaw($cnt,$notificationType=0){

        $params=[
            'tpl_content'=>$cnt,
            'notify_type'=>$notificationType
        ];

        $response=$this->send('/v1/tpl/add.json',$params);

        return $response;
    }

    /**
     * @param $tplId
     * @param $cnt
     * @param $signature
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function modifyTemplate($tplId,$cnt,$signature){
        $params=[
            'tpl_id'=>$tplId,
            'tpl_content'=>$cnt.'【'.$signature.'】'
        ];

        $response=$this->send('/v1/tpl/update.json',$params);

        return $response;
    }

    /**
     * @param $tplId
     * @param $cnt
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function modifyTemplateRaw($tplId,$cnt){

        $params=[
            'tpl_id'=>$tplId,
            'tpl_content'=>$cnt
        ];

        $response=$this->send('/v1/tpl/update.json',$params);

        return $response;
    }

    /**
     * @param $tplId
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function deleteTemplate($tplId){
        $params=[
            'tpl_id'=>$tplId
        ];

        $response=$this->send('/v1/tpl/del.json',$params);

        return $response;
    }
}