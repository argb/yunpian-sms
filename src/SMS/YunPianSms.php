<?php
/**
 * Created by PhpStorm.
 * User: ender
 * Date: 15/6/2
 * Time: 下午11:01
 */

namespace Ender\YunPianSms\SMS;

class YunPianSms extends YunPianBase{

    /**
     * @param string|array $phone can be multiple phones,and limit is 100.
     * @param $cnt
     * @param array $options
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function sendMsg($phone,$cnt,$options=[]){
        if(is_array($phone)){
            $phone=implode(',',$phone);
        }
        $params=[
            'mobile' => $phone,
            'text' => $cnt,
        ];
        if(!empty($options)){
            $params=array_merge($params,$options);
        }
        $response=$this->send('/v1/sms/send.json',$params);

        return $response;
    }

    /**
     * @param int $page_size
     * @return array|\Psr\Http\Message\ResponseInterface
     *
     * 此接口为高级接口，需要申请
     */
    public function pullStatusReport($page_size=20){

        $params['page_size']=$page_size;

        $response=$this->send('/v1/sms/pull_status.json',$params);

        return $response;
    }

    public function getReplies($startTime,$endTime,$startPage=1,$page_size=20,$mobile='',$options=[]){

        if($mobile){
            $params['mobile']=$mobile;
        }
        $params['start_time'] = $startTime;
        $params['end_time'] = $endTime;
        $params['page_num'] = $startPage;
        $params['page_size'] = $page_size;

        if(!empty($options)){
            $params=array_merge($params,$options);
        }

        $response=$this->send('/v1/sms/get_reply.json',$params);

        return $response;
    }

    /**
     * @param int $page_size
     * @return array|\Psr\Http\Message\ResponseInterface
     *
     * 此接口为高级接口，需要申请
     */
    public function pullReplies($page_size=20){

        $params['page_size']=$page_size;

        $response=$this->send('/v1/sms/pull_reply.json',$params);

        return $response;
    }

    public function getBlackWords($text){
        $params['text']=$text;

        $response=$this->send('/v1/sms/get_black_word.json',$params);

        return $response;
    }
}