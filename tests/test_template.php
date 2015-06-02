<?php
/**
 * Created by PhpStorm.
 * User: ender
 * Date: 15/6/3
 * Time: 上午2:32
 */

require('../vendor/autoload.php');

use Ender\YunPianSms\SMS\YunPianTemplate;

$yunpianSms=new YunPianTemplate('xxxx');

/*
$response=$yunpianSms->getDefaultAll();

var_export($response);

echo "\n\n";

$response=$yunpianSms->getDefaultById(1);

var_export($response);

echo "\n\n";


$response=$yunpianSms->addTemplate("欢迎加入我们的大家庭，您的验证码是3721。如非本人操作，请忽略本短信。","BigFeet");

var_export($response);

echo "\n\n";


$response=$yunpianSms->modifyTemplate(820949,"欢迎加入我们的大家庭，您的验证码是shi...t。如非本人操作，请忽略本短信。","BigFeet");

var_export($response);

echo "\n\n";
*/

$response=$yunpianSms->deleteTemplate(820949);
var_export($response);

echo "\n\n";

$response=$yunpianSms->getAll();

var_export($response);

echo "\n\n";


