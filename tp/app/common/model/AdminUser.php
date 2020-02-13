<?php
/**
 * Created by PhpStorm.
 * User: kezihang
 * Date: 2020/2/12
 * Time: 19:35
 */
namespace app\common\model;
class AdminUser extends BaseModel{
    public $fields='id,username,password,status';

    /***
     * 通过用户名查找用户
     * @param $username
     * @param null $fields
     * @return array|bool|null|\think\Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getAdminUserByUsername($username,$fields=null){
        if (empty($username)){
            return false;
        }
        $fields=$fields ?? $this->fields;
        $where=[
            'username'=>trim($username)
        ];
        $result=$this->field($fields)->where($where)->find();
        return $result;
    }

    /***
     * 通过用户ID更新
     * @param $id
     * @param $data
     * @return bool
     */
    public function updateById($id,$data){
        $id=intval($id);
        if (empty($id) || empty($data) || !is_array($data)){
            return false;
        }
        return $this->where(['id'=>$id])->save($data);
    }
}