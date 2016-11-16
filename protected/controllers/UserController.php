<?php

/**
 * 用户控制器
 */
class UserController extends Controller
{
    public function actionLogin()
    {
        echo IMG_URL;DIE;
        echo Yii::app()->baseUrl;die;
        echo Yii::app()->homeUrl;die;
        $this->renderPartial('login');
    }
}
