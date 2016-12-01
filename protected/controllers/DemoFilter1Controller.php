<?php

/**
 * 基于方法的过滤器
 */
class DemoFilter1Controller extends Controller
{
    //第一步：创建动作
    public function actionAdd()
    {
        echo 'I am actionAdd' . '<br />';
    }

    //第二步：创建基于方法的过滤器
    public function filterAddFun($filterChain)
    {
        echo '基于方法的过滤器' . '<br />';
        $filterChain->run();

    }

    //第三步：重写父类Controller的filters()方法，定义过滤器与动作的关系
    //参考：CController::filters()
    public function filters()
    {
        return array(
            //定义过滤器与动作的关系
            'addFun + add',
            array('application.filters.MyFilter + say'),
        );
    }

    public function actionSay()
    {
        echo 'say hello';
    }
}
