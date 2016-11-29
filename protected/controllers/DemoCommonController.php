<?php

class DemoCommonController extends Controller
{
    //
    public function actionT1()
    {
        //查询是哪个类的实例，CWebApplication
        echo get_class(Yii::app()) . '<br />';

        //调用CWebApplication 、CApplication对象中的属性
        echo Yii::app()->defaultController . '<br />';
        echo Yii::app()->charset . '<br />';

        //调用组件中的方法或属性
    }
}
