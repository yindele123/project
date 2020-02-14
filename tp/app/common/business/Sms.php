<?php
/**
 * Created by PhpStorm.
 * User: kezihang
 * Date: 2020/2/14
 * Time: 12:30
 */
declare (strict_types = 1);
namespace app\common\business;
use app\common\lib\sms\AliSms;
use app\common\lib\Num;

class Sms{
    public static function sendCode(string $phone,int $len=4):bool {
        $code=Num::getCode($len);
        $res=AliSms::sendCode($phone,$code);
        if ($res){
            cache(config('redis.code_pre').$phone, $code, config('redis.code_expire'));
        }
        return $res;
    }
}