<?php

/**
 * 用户模型
 */
class User extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '{{user}}';
    }

    //设置标签名字与数据库字段对应
    public function attributeLabels() {
        return array(
            'username'=>'用户名',
            'password'=>'密  码',
            'password2'=>'确认密码',
            'user_sex'=>'性  别',
            'user_qq'=>'qq号码',
            'user_hobby'=>'爱  好',
            'user_xueli'=>'学  历',
            'user_introduce'=>'简  介',
            'user_email'=>'邮  箱',
            'user_tel'=>'手机号码',
        );
    }

}
