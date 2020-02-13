<?php
/**
 * Created by PhpStorm.
 * User: kezihang
 * Date: 2020/2/13
 * Time: 15:43
 */
namespace app\admin\business;
use app\common\model\AdminUser as AdminUserModel;
use think\Exception;

class AdminUser{
    public static function login($data){
        $adminUserObj=new AdminUserModel();
        $adminUser=self::getAdminUserByUsername($data['username']);
        if (empty($adminUser)){
            throw new Exception('该用户不存在');
        }
        if ($adminUser['password'] != md5($data['password'].config('admin.admin_password_key'))){
            throw new Exception('密码输入错误');
        }
        $updateData=[
            'update_time'=>time(),
            'last_login_time'=>time(),
            'last_login_ip'=>request()->ip()
        ];
        try{
            $res=$adminUserObj->updateById($adminUser['id'],$updateData);
        }catch (\Exception $e){
            throw new Exception('服务器出错,登陆失败');
        }
        if (empty($res)){
            throw new Exception('登陆失败');
        }
        session(config('admin.admin_session'),$adminUser);
        return true;
    }

    /***
     * 通过用户名获取用户信息
     * @param $username
     * @return array|bool
     */
    public static function getAdminUserByUsername($username){
        if (empty($username)){
            return false;
        }
        $adminUserObj=new AdminUserModel();
        try{
            $adminUser=$adminUserObj->getAdminUserByUsername($username);
        }catch (\Exception $e){
            return false;
        }
        if (empty($adminUser) || $adminUser->status!=config('status.mysql.table_normal')){
            return false;
        }
        return $adminUser->toArray();
    }
}