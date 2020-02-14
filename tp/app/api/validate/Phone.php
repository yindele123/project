<?php
/**
 * Created by PhpStorm.
 * User: kezihang
 * Date: 2020/2/14
 * Time: 18:31
 */
namespace app\api\validate;
class Phone extends BaseValiDate{
    protected $rule=[
        'phone'=>'require|mobile'
    ];

    protected $message=[
        'phone.require'=>'请输入手机号码',
        'phone.mobile'=>'请输入正确的手机号'
    ];
}