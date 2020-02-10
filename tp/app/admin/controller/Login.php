<?php
/**
 * Created by PhpStorm.
 * User: kezihang
 * Date: 2020/2/10
 * Time: 15:07
 */
namespace app\admin\controller;

use app\BaseController;
use think\facade\View;

class Login extends BaseController{
    public function index(){
        return View::fetch();
    }
}