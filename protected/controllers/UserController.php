<?php

/**
 * 用户控制器
 */
class UserController extends Controller
{
    //登录
    public function actionLogin()
    {
        $this->render('login');
    }

    public function actionRegister()
    {
        $user_model = new User();
        $user_sex_list = array(1 => '男', 2 => '女', 3 => '保密',);
        $user_xueli_list = array(1 => '请选择', 2 => '小学', 3 => '中学', 4 => '大学');
        $user_hobby_list = array(1 => '篮球', 2 => '足球', 3 => '排球', 4 => '棒球');

        //表单提交
        if (isset($_POST['User'])) {
            //爱好需要处理
            $_POST['User']['user_hobby'] = implode(',', $_POST['User']['user_hobby']);
            //$_POST['User']['password2'] = $_POST['User']['password2'];

            foreach ($_POST['User'] as $k => $v) {
                $user_model->$k = $v;
            }

            //$user_model->attributes = $_POST['User'];

            if ($user_model->save()) {
                echo 'success';
            } else {
                echo 'fail';
            }
        }

        $this->render('register',array('user_model'=>$user_model, 'user_sex_list' => $user_sex_list, 'user_xueli_list' => $user_xueli_list, 'user_hobby_list' => $user_hobby_list));
    }
}
