<?php

/**
 * 后台管理员登录控制器
 */
class ManagerController extends Controller
{
    public function actionLogin()
    {
        $login_model = new LoginForm();

        if (isset($_POST['LoginForm'])) {

            $login_model->attributes = $_POST['LoginForm'];
            if ($login_model->validate() && $login_model->login()) {
                $this->redirect('./index.php?r=houtai/index/index');
            }
        }

        $this->renderPartial('login',array('login_model' =>$login_model));
    }

    public function actionLogOut()
    {
        Yii::app()->session->clear();   //删除储在服务器端session文件里面的内容
        Yii::app()->session->destroy(); //删除储在服务器端session文件
        $this->redirect('./index.php?r=houtai/manager/login');
    }



}
