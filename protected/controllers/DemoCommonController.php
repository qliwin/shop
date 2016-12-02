<?php

class DemoCommonController extends Controller
{
    //
    public function actionAll()
    {
        echo Yii::app()->getVersion();
        //查询是哪个类的实例，CWebApplication
        echo get_class(Yii::app()) . '<br />';

        //调用CWebApplication 、CApplication对象中的属性
        echo Yii::app()->defaultController . '<br />';
        echo Yii::app()->charset . '<br />';

        //调用组件中的方法或属性
        echo Yii::app()->user->name . '<br />';

        //当前控制器名称和方法名称
        echo $this->id . '<br />';
        echo $this->action->id . '<br />';
    }

    //计算脚本运行时间
    public function actionTime()
    {
        //myTime只是标识，可以随便写，但必须要配对
        Yii::beginProfile('myTime');
        for ($i=0; $i < 1000; $i++) {
            echo $i;
        }
        Yii::endProfile('myTime');

    }
}
