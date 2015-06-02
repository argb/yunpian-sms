<?php
/**
 * Created by PhpStorm.
 * User: ender
 * Date: 15/6/3
 * Time: 上午3:42
 */

require('../vendor/autoload.php');

use Ender\YunPianSms\SMS\YunPianSms;

$yunpianSms=new YunPianSms('xxxx');

/*

$response=$yunpianSms->sendMsg('18611007551','【云片网】您的验证码是1234');

var_export($response);

echo "\n\n";


$response=$yunpianSms->getStatusReport();

var_export($response);

echo "\n\n";


$response=$yunpianSms->getBlackWords('shit ahhaha');

var_export($response);

echo "\n\n";

$response=$yunpianSms->getReplies('2015-03-11 00:00:00','2015-08-11 00:00:00');

var_export($response);

echo "\n\n";
*/
$response=$yunpianSms->pullReplies();

var_export($response);

echo "\n\n";

