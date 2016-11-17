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
        $this->render('register');
    }
}
