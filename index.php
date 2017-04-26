<?php
use EasyWeChat\Foundation\Application;
/**
 * Created by PhpStorm.
 * User: lwei
 * Date: 2017/4/26
 * Time: 14:12
 */
require_once 'vendor/autoload.php';
$options = [
    'debug'  => true,
    'app_id' => 'wx36835977e879db05',
    'secret' => 'b723ecac2fc8254d13e6ff36426375b4',
    'token'  => 'liweiwechat',
    // 'aes_key' => null, // 可选
    'log' => [
        'level' => 'debug',
        'file'  => '/wechat/easywechat.log', // XXX: 绝对路径！！！！
    ],
];
$app = new Application($options);
$response = $app->server->serve();
// 将响应输出
$response->send(); // Laravel 里请使用：return $response;