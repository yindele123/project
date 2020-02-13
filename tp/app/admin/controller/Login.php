<?php
/**
 * Created by PhpStorm.
 * User: kezihang
 * Date: 2020/2/10
 * Time: 15:07
 */
namespace app\admin\controller;

use app\admin\business\AdminUser;
use think\facade\View;
use app\admin\validate\AdminUser as AdminUserValidate;
use think\captcha\facade\Captcha;

class Login extends BaseAdmin{
    public function index(){
        return View::fetch();
    }
    public function verify(){
        return Captcha::create('verify');
    }

    public function check(){
        if (!$this->request->isPost()){
            return show(config('status.error'),'请求方式错误');
        }
        $username=$this->request->param('username',"",'trim');
        $password=$this->request->param('password',"",'trim');
        $captcha=$this->request->param('captcha',"",'trim');
        $adminValidate=new AdminUserValidate();
        $data=[
            'username'=>$username,
            'password'=>$password,
            'captcha'=>$captcha,
        ];
        if (!$adminValidate->check($data)){
            return show(config('status.error'),$adminValidate->getError());
        }
        try{
            $res=AdminUser::login($data);
        }catch (\Exception $e){
            return show(config('status.error'),$e->getMessage());
        }
        if ($res===true){
            return show(config('status.success'),'登录成功');
        }else{
            return show(config('status.error'),'登录失败');
        }
    }
}