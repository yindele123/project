<?php
/**
 * Created by PhpStorm.
 * User: kezihang
 * Date: 2020/2/13
 * Time: 13:17
 */
namespace app\admin\controller;
use app\BaseController;

class BaseAdmin extends BaseController{
    public $adminUser=null;

    /**
     * 判断是否登录
     * @return bool
     */
    public function isLogin(){
        $this->adminUser=session(config('admin.admin_session'));
        if (empty($this->adminUser)){
            return false;
        }
        return true;
    }
}