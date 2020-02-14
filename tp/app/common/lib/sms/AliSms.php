<?php
/**
 * Created by PhpStorm.
 * User: kezihang
 * Date: 2020/2/14
 * Time: 12:05
 */
declare (strict_types = 1);
namespace app\common\lib\sms;
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

class AliSms{
    /***
     * @param string $phone
     * @param int $code
     * @return bool
     * @throws ClientException
     */
    public static function sendCode(string $phone,int $code):bool {
        AlibabaCloud::accessKeyClient(config('aliyun.access_key_id'), config('aliyun.access_secret'))
            ->regionId(config('aliyun.region_id'))
            ->asDefaultClient();
        $templateParam=[
            'code'=>$code
        ];
        try {
            $result = AlibabaCloud::rpc()
                ->product('Dysmsapi')
                // ->scheme('https') // https | http
                ->version('2017-05-25')
                ->action('SendSms')
                ->method('POST')
                ->host(config('aliyun.host'))
                ->options([
                    'query' => [
                        'RegionId' => config('aliyun.region_id'),
                        'PhoneNumbers' => $phone,
                        'SignName' => config('aliyun.sign_name'),
                        'TemplateCode' => config('aliyun.template_code'),
                        'TemplateParam' => json_encode($templateParam),
                    ],
                ])
                ->request();
        } catch (ClientException $e) {
            return false;
            //echo $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            return false;
            //echo $e->getErrorMessage() . PHP_EOL;
        }
        return true;

    }
}