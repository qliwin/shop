
<?php

/**
 * session和cookie演示
 */
class DemoSeCokController extends Controller
{
    //------------------Session Demo----------------
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
        Yii::app()->session->clear();//删除sesssion内容
        Yii::app()->session->destroy();//删除session文件

    }

    //------------------Cookie Demo----------------
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

    //------------------Alias Demo----------------
    //Yii中路径别名
    public function actionAlias()
    {
        echo Yii::getPathOfAlias('system') . '<br/>'; //D:\phpStudy\www\yii\framework
        echo Yii::getPathOfAlias('system.web') . '<br/>'; //D:\phpStudy\www\yii\framework\web
        echo Yii::getPathOfAlias('application') . '<br/>'; //D:\phpStudy\www\yii\shop\protected
        echo Yii::getPathOfAlias('zii') . '<br/>'; //D:\phpStudy\www\yii\framework\zii
        echo Yii::getPathOfAlias('webroot') . '<br/>'; //D:/phpStudy/www/yii/shop
    }
}
