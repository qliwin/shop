<?php

/**
 * 用户模型
 */
class User extends CActiveRecord
{
    //password2 字段非数据库字段，所以要自定义属性
    public $password2;

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

    public function rules()
    {
        return array(
            array('username', 'required', 'message'=>'用户名不得为空'),
            //用户名不能重复(与数据库比较)
            array('username', 'unique', 'message'=>'用户名已经占用'),
            array('password', 'required', 'message'=>'密码必填'),
            //验证确认密码password2  要与密码的信息一致
            array('password2','compare','compareAttribute'=>'password','message'=>'两次密码必须一致'),

            //邮箱默认不能为空
            array('user_email','email','allowEmpty'=>false,  'message'=>'邮箱格式不正确'),

            //验证qq号码(都是数字组成，5到12位之间，开始为非0信息，使用正则表达式验证)
            array('user_qq','match','pattern'=>'/^[1-9]\d{4,11}$/','message'=>'qq格式不正确'),

            //验证手机号码(都是数字，13开始，一共有11位)
            array('user_tel','match','pattern'=>'/^13\d{9}$/','message'=>'手机号码格式不正确'),

            //验证学历(信息在2、3、4、5之间则表示有选择，否则没有)，1正则；2范围限制
            //范围限制
            array('user_xueli','in','range'=>array(2,3,4,5),'message'=>'学历必须选择'),

            //验证爱好：必选两项以上（自定义方法对爱好进行验证）
            array('user_hobby','myCheckHobby'),

            //为没有具体验证规则的属性，设置安全的验证规则，否则attributes不给接收信息
            array('user_sex,user_introduce','safe'),
        );
    }

    /**
     * 自定义方法对user_hobby做验证
     */
    public function myCheckHobby()
    {
        //$this 就是我们在控制器controller里实例化好的user_model模型对象
        $len = strlen($this->user_hobby);
        if($len < 3) {
            $this->addError('user_hobby','爱好必须选择两项或以上');
        }
    }

}
