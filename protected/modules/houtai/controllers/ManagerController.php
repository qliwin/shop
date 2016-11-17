<?php

/**
 * 后台管理员登录控制器
 */
class ManagerController extends Controller
{
    public function actionLogin()
    {
        $this->renderPartial('login');
    }
}
