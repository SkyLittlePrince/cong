#! /usr/bin/php
<?php

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->flushAll();
var_dump($redis->info());


$server = new swoole_websocket_server('0.0.0.0', 9501);

$server->on('open', function (swoole_websocket_server $server, $request) {
    echo "server: handshake success with fd: {$request->fd}\n";
});

$server->on('message', function (swoole_websocket_server $server, $frame) {
    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
    $msg = $frame->data;
    // 接收的消息数据对象
    $msg = json_decode($msg);

    global $redis;

    // 判断是否登录操作
    if ($msg->dowhat == 'login') {
        $redis->set($msg->who, $frame->fd);
        var_dump($redis->keys('*'));
        $server->push($frame->fd, json_encode(array('who' => $msg->who, 'dowhat' => 'login', 'fd' => $frame->fd)));
    } elseif ($msg->dowhat == 'chat') {  // 判断是否私聊
        $to = $redis->get($msg->to);
        if ($to == null) {
            // 离线消息
        } else {
            $server->push($to, json_encode(array('who' => $msg->who, 'dowhat' => 'chat', 'to' => $to, 'msg' => $msg->msg)));
        }
    } elseif ($msg->dowhat == 'logout') {  // 用户下线
        $redis->delete($msg->who);
        var_dump($redis->keys('*'));
    }
});

$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
    // 全部用户下线
    global $redis;
    $keys = $redis->keys('*');
    if ($keys != []) {
        foreach ($keys as $key) {
            $value = $redis->get($key);
            if ($value == $fd) {
                $redis->delete($key);
            }
        }
    }
    var_dump($redis->keys('*'));
});

$server->start();
