<?php
/**
 * Created by PhpStorm.
 * User: kezihang
 * Date: 2020/2/12
 * Time: 14:08
 */
namespace app\admin\controller;

class Error{
    public function __call($name, $arguments)
    {
        return show(config('status.error'),'请不要非法操作',[],config('code.not_presence'));
    }
}