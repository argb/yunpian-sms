<?php
/**
 * Created by PhpStorm.
 * User: ender
 * Date: 15/6/3
 * Time: 上午1:33
 */
require('../vendor/autoload.php');

use Ender\YunPianSms\SMS\YunPianUser;

$yunpianSms=new YunPianUser('xxxx');

$response=$yunpianSms->getAccountInfo();

var_export($response);

echo "\n\n";

$response=$yunpianSms->setAccountInfo([
    'emergency_contact'=>'ender wang',
    'emergency_mobile' => '18611007551',
    'alarm_balance' => 100
]);

var_export($response);