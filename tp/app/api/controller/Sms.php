<?php
/**
 * Created by PhpStorm.
 * User: kezihang
 * Date: 2020/2/14
 * Time: 12:35
 */
declare (strict_types = 1);
namespace app\api\controller;
use app\api\validate\Phone;
use app\common\business\Sms as SmsBus;

class Sms extends BaseApi{
    public function code():object {
        $phone=input('param.phone','','trim');
        $phoneValiDate=new Phone();
        if (!$phoneValiDate->check(['phone'=>$phone])){
            return show(config('status.error'),$phoneValiDate->getError());
        }
        $res=SmsBus::sendCode($phone,4);
        if ($res===true){
            return show(config('status.success'),'发送验证码成功');
        }else{
            return show(config('status.error'),'发送验证码失败');
        }
    }
}