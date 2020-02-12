<?php
/**
 * Created by PhpStorm.
 * User: kezihang
 * Date: 2020/2/12
 * Time: 12:55
 */
namespace app\admin\controller;
use think\captcha\facade\Captcha;

class Verify{
    public function index(){
        return Captcha::create('verify');
    }
}