<?php

/**
 * 演示Flash数据
 */
class DemoFlashController extends Controller
{
    //session中设置提示信息
    public function actionF1()
    {
        Yii::app()->user->setFlash('success','okkkkkkkkkkkkkkkkkkkkkkkk');
        echo 'set flash ok!!';
    }

    //session中获取提示信息
    //在获得的同时删除信息，但session文件还是存在的
    public function actionF2()
    {
        //判断有无flash信息
        if (Yii::app()->user->hasFlash('success')) {
            echo Yii::app()->user->getFlash('success');
        } else {
            echo 'Not have flash data';
        }
    }

}
