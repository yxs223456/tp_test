<?php
/**
 * Created by PhpStorm.
 * User: yangxiushan
 * Date: 2019-07-30
 * Time: 17:50
 */
namespace app\socket;

use think\swoole\Server;

class Index extends Server
{
    protected $host = '0.0.0.0';
    protected $port = 9508;
    protected $serverType = 'socket';
    protected $option = [
        'worker_num'=> 4,
        'daemonize'	=> false,
        'backlog'	=> 128,
        'pid_file'     => '/data/log/tp-demo/swoole_server.pid',
        'log_file'     => '/data/log/tp-demo/swoole_server.log',
    ];

    public function onOpen($server, $request)
    {
        echo "server: handshake success with fd{$request->fd}\n";
    }

    public function onMessage($server, $frame)
    {
        echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
        $server->push($frame->fd, "this is server " . $frame->fd);
    }

    public function onClose($server, $fd)
    {
        echo "client {$fd} closed\n";
    }
}