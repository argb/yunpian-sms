<?php
/**
 * Created by PhpStorm.
 * User: ender
 * Date: 15/6/2
 * Time: 下午5:30
 */
require('../vendor/autoload.php');

use GuzzleHttp\Client;

//$client=new Client();


//$r=$client->get('http://homestead.app/guzzle-test');

//var_export($r->getBody());
$client = new Client();
/*
$response = $client->get('http://homestead.app/guzzle-test');
$body=$response->getBody();
echo $body;
echo "\n\n";
*/

$r=$client->post('http://homestead.app/guzzle-test',[
    'form_params' => [
        'field_name' => 'abc',
        'other_field' => '123',
        'nested_field' => [
            'nested' => 'hello'
        ]
    ]
]);

$body=$r->getBody();
echo $body;
echo "\n\n";

/*
$r=$client->post('http://homestead.app/guzzle-test?x=3',[
    'query' => ['foo' => 'bar']
]);
*/
//$r = $client->post('http://httpbin.org/post', ['body' => 'raw data']);

echo PHP_EOL;

$body=$r->getBody();

echo $body;