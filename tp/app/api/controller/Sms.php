<?php
/**
 * Created by PhpStorm.
 * User: kezihang
 * Date: 2020/2/14
 * Time: 12:35
 */
declare (strict_types = 1);
namespace app\api\controller;
class Sms extends BaseApi{
    public function code():object {
        return show(config('status.error'),'失败');
    }
}