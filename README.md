# 云片网络短信发送PHP SDK

**Note:** 依赖guzzlehttp/guzzle 6，安装本此包时会默认安装此依赖，可能很多其他的第三方库依赖较低版本的guzzle,如guzzle 5

这个SDK主要是对 **[云片网络](http://www.yunpian.com/api/howto.html)** 的HTTP短信发送相关API的PHP封装。

云片网络是目前比较靠谱的短信发送提供商，速度和价格都不错，由于自己项目中用到，顺便打了个包共享给大家。

## Install

Via Composer

``` bash
$ composer require ender/yunpian-sms
```

## Usage

如果单独使用别忘了引入composer生成的autoload.php文件

如果是laravel用户可以不用手动include

使用此sdk之前别忘了先在[云片网络官网](http://www.yunpian.com/)注册并申请相应的**apikey**

示例代码如下
#### 发送短信

```php
use Ender\YunPianSms\SMS\YunPianSms;
$yunpianSms=new YunPianSms('xxxxxxxxxxxxxxxxxx');
$response=$yunpianSms->sendMsg('18xxxxxxx51','【云片网】您的验证码是1234');
```
#### 获取当前账户余额等信息

```php
use Ender\YunPianSms\SMS\YunPianUser;
$yunpianSms=new YunPianUser('xxxxxxxxxxxxxxxx');
$response=$yunpianSms->getAccountInfo();
```

构造函数参数即为你的个人的**apikey**

根据云片网络官方接口文档的分类，也对应的封装了三个Class:
- YunPianUser
- YunPianSms
- YunPianTemplate

分别对应 账户，模板，短信三部分功能，基本覆盖了所有接口。以下三个接口除外：

- 模板接口发短信（不推荐使用，新用户请用发短信）
这个接口官方不推荐，所以没有封装

- 推送状态报告
这是个推送接口，需要使用者提供url，故不作处理

- 推送回复短信
同样是个推送接口

**Note:** 注意部分接口是高级接口，需要申请才能使用，具体可查阅官方文档

各个接口与本SDK中方法的对应关系基本上可以从名字上猜出来，很直观，实在猜不出来进入到方法里面可以看到对应的官方http接口。

### 返回值说明
所有接口返回php数组格式，最外层包括http status code 和云片网络的完整返回值两部分，以短信发送接口sendMsg返回值为例，格式如下：
``` php
array (
  'status' => 200,
  'data' =>
  array (
    'code' => 0,
    'msg' => 'OK',
    'result' =>
    array (
      'count' => 1,
      'fee' => 1,
      'sid' => 1956790935,
    ),
  ),
)
```
data部分就是官方api的完整返回值，此处把json字符串转成了数组形式。


## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- [:author_name](https://github.com/:author_username)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
