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

    //设置session
    //通过session组件来设置
    public function actionSetSession()
    {
        Yii::app()->session['username'] = 'zhangsan';
        Yii::app()->session['useraddr'] = 'shanghai';

        echo 'set Session success';
    }

    //获取session
    public function actionGetSession()
    {
        echo Yii::app()->session['username'] . '<br />';
        echo Yii::app()->session['useraddr'];
    }

    //删除session
    public function actionDelSession()
    {
        //删除一个session
        //unset(Yii::app()->session['useraddr']);

        //删除全部
        Yii::app()->session->clear();
        Yii::app()->session->destroy();

    }

    //设置cookie
    public function actionSetCookie()
    {
        $ck = new CHttpCookie('hobby', '篮球，足球');
        $ck->expire = time() + 3600;    //过期时间
        //把$ck对象放入cookie组件里
        Yii::app()->request->cookies['hobby'] = $ck;

        echo 'set Cookie success';
    }

    //获取cookie
    public function actionGetCookie()
    {
        echo Yii::app()->request->cookies['hobby'];
    }

    //删除cookie
    public function actionDelCookie()
    {
        unset(Yii::app()->request->cookies['hobby']);
    }

}
