<?php
/**
 * Created by PhpStorm.
 * User: kezihang
 * Date: 2020/2/14
 * Time: 18:41
 */
declare (strict_types = 1);
namespace app\common\lib;
use think\Exception;

class Num{
    /***
     * 获取随机几位数字
     * @param int $len
     * @return int
     * @throws Exception
     */
    public static function getCode(int $len=4):int {
        if (empty($len)){
            throw new Exception('请不要非法操作');
        }
        $code = '';
        for ($i = 0; $i < intval($len); $i++) {
            $code .= rand(0, 9);
        }

        return (int) $code;
    }
}