<?php

/**
 * 用户控制器
 */
class UserController extends Controller
{
    //用户登录
    public function actionLogin()
    {
        // 1. 获取登录模型 ，这个是系统自带的
        $login_model = new LoginForm();

        // 2. 收集表单数据
        if (isset($_POST['LoginForm'])) {
        // 3. 给模型属性赋值
            $login_model->attributes = $_POST['LoginForm'];

        // 4. 数据校验 & 信息session持久化
            //validate()将调用rules()
            //save()方法的执行顺序：save()->validate()->rules()
            if ($login_model->validate() && $login_model->login()) {
                //echo 'login success';
                $this->redirect('./index.php?r=index/index');
            }
        }
        $this->render('login', array('login_model' => $login_model));
    }

    //用户退出登录
    public function actionLogOut()
    {
        Yii::app()->session->clear();   //移去所有session变量
        Yii::app()->session->destroy(); //移去存储在服务器端的数据
        $this->redirect('./index.php?r=user/login');
    }

    //用户注册
    public function actionRegister()
    {
        //echo Yii::getVersion();//1.1.13

        // 1. 获得数据模型对象
        $user_model = new User();
        $user_sex_list = array(1 => '男', 2 => '女', 3 => '保密',);
        $user_xueli_list = array(1 => '请选择', 2 => '小学', 3 => '中学', 4 => '大学');
        $user_hobby_list = array(1 => '篮球', 2 => '足球', 3 => '排球', 4 => '棒球');

        if (isset($_POST['User'])) {
        // 2. 收集表单数据 & 数据处理
            //爱好需要处理
            $_POST['User']['user_hobby'] = is_array($_POST['User']['user_hobby'] ) ? implode(',', $_POST['User']['user_hobby']) : '';
            //加密处理
            $_POST['User']['password'] = md5($_POST['User']['password']);
            $_POST['User']['password2'] = md5($_POST['User']['password2']);

        // 3. 给模型属性赋值，其中有两种方式
            //普通赋值，不推荐
            //foreach ($_POST['User'] as $k => $v) {
            //    $user_model->$k = $v;
            //}

            //attributes赋值，推荐
            $user_model->attributes = $_POST['User'];

        // 4. 数据保存
            if ($user_model->save()) {
                //echo 'success';
            } else {
                echo 'fail';
            }
        }

        $this->render('register',array('user_model'=>$user_model, 'user_sex_list' => $user_sex_list, 'user_xueli_list' => $user_xueli_list, 'user_hobby_list' => $user_hobby_list));
    }
}
