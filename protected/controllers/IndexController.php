<?php

/**
 * Created by PhpStorm.
 * User: qli
 * Date: 2016/11/17
 * Time: 9:31
 */
class IndexController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
//        $this->renderPartial('index');
    }
}
