<?php
/**
 * Created by PhpStorm.
 * User: yangxiushan
 * Date: 2019-07-30
 * Time: 16:28
 */
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\facade\Request;

class User extends Controller
{
    public function info()
    {
        $userId = Request::get('id');

        $user = Db::name('users')->where('id', $userId)->find();

        $rs = [
            'code' => 0,
            'msg' => 'ok',
            'data' => $user,
        ];

        return json($rs);
    }
}
