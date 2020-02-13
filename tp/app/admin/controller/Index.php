<?php
namespace app\admin\controller;

use think\facade\View;

class Index extends BaseAdmin
{
    public function index()
    {
        return View::fetch();
    }

    public function welcome(){
        return View::fetch();
    }

    public function logout(){
        session(config('admin.admin_session'),null);
        return redirect(url('login/index'));
    }

}
