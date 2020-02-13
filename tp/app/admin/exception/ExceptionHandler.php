<?php
/**
 * Created by PhpStorm.
 * User: kezihang
 * Date: 2020/2/12
 * Time: 18:31
 */
namespace app\admin\exception;
use think\exception\Handle;
use think\Response;
use Throwable;

class ExceptionHandler extends Handle {
    public $httpCoede=500;
    /**
     * Render an exception into an HTTP response.
     *
     * @access public
     * @param \think\Request   $request
     * @param Throwable $e
     * @return Response
     */
    public function render($request, Throwable $e): Response
    {
        // 添加自定义异常处理机制
        if (method_exists($e,'getStatusCode')){
            $httpCoede=$e->getStatusCode();
        }else{
            $httpCoede=$this->httpCoede;
        }
        return show(config('status.success'),$e->getMessage(),[],$httpCoede);
        // 其他错误交给系统处理
        //return parent::render($request, $e);
    }
}