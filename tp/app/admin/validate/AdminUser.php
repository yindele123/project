<?php
/**
 * Created by PhpStorm.
 * User: kezihang
 * Date: 2020/2/13
 * Time: 15:22
 */
namespace app\admin\validate;

class AdminUser extends BaseValidate{
    protected $rule=[
        'username'=>'require',
        'password'=>'require',
        'captcha'=>'require|checkCaptcha'
    ];
    protected $message=[
        'username.require'=>'用户名不能为空',
        'password.require'=>'密码不能为空',
        'captcha.require'=>'验证码不能为空',
    ];

    protected function checkCaptcha($value, $rule, $data=[]){
        if (!captcha_check($value)){
            return '验证码输入错误';
        }
        return true;
    }
}