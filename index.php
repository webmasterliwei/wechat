<?php
use EasyWeChat\Foundation\Application;
use EasyWeChat\Message\Text;
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
        'file'  => 'G:\wechat\easywechat.log', // XXX: 绝对路径！！！！
    ],
];
$app = new Application($options);
// 从项目实例中得到服务端应用实例。
$server = $app->server;
$server->setMessageHandler(function ($message) {
    // $message->FromUserName // 用户的 openid
    // $message->MsgType // 消息类型：event, text....
    switch ($message->MsgType) {
        case 'event':
            return '收到事件消息';
            break;
        case 'text':
            return new Text(['content' => '您好！overtrue。']);
            break;
        case 'image':
            return '收到图片消息';
            break;
        case 'voice':
            return '收到语音消息';
            break;
        case 'video':
            return '收到视频消息';
            break;
        case 'location':
            return '收到坐标消息';
            break;
        case 'link':
            return '收到链接消息';
            break;
        // ... 其它消息
        default:
            return '收到其它消息';
            break;
    }
});
$response = $server->serve();
// 将响应输出
$response->send(); // Laravel 里请使用：return $response;