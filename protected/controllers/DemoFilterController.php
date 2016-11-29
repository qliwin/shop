
<?php

/**
 * 控制器实现用户访问的控制
 */
class DemoFilterController extends Controller
{
    //------------------filter Demo----------------

    // 1. 定义过滤器 filters
    public function filters()
    {
        return array(
            //'accessControl',
            // + 表示过滤规则只针对fun1和fun2方法起作用
            //'accessControl + fun1,fun2',

            // - 表示过滤规则除了fun5，其他方法都起作用
            'accessControl - fun5',
        );
    }

    // 2. 设置访问条件 accessRules
    // allow:允许 ，deny:不允许，两个必须成对出现。没有deny收口的话上面的规则将失效.allow的数组必须出现在deny前面
    // actions：表示对那些方法使用过滤
    // 1）@：表示登录的用户 2）*：表示所有用户（不论登录与否） 3）?：表示匿名用户 4）用户名：表示具体用户
    public function accessRules()
    {
        return array(
            // rule1 start
            // 登录用户。表示允许访问fun1方法，用户为登录用户
            array(
                'allow',
                'actions' => array('fun1'),
                'users' => array('@'),
            ),
            //所有用户。所有用户都能访问fun2
            array(
                'allow',
                'actions' => array('fun2'),
                'users' => array('*'),
            ),
            //具体用户。只有小红能访问fun3
            array(
                'allow',
                'actions' => array('fun3'),
                'users' => array('xiaohong'),
            ),
            //匿名用户。只有匿名用户才能访问,登录用户不得访问
            array(
                'allow',
                'actions' => array('fun4'),
                'users' => array('?'),
            ),
            //理论上是有lisi用户可以访问fun5，但是可以在filters方法中设定accessControl - fun5，将fun5不做访问限制，所以所有人都能访问
            array(
                'allow',
                'actions' => array('fun5'),
                'users' => array('lisi'),
            ),
            // 其余的所有用户都不允许访问（除上面actions以外的方法）
            // 以上所有过滤都为对fun6设置过滤规则，所有就不能访问fun6
            array(
                'deny',
                'users' => array('*'),
            ),
            // rule1 end

        );

    }
    public function actionFun1()
    {
        echo 'Fun1';
    }

    public function actionFun2()
    {
        echo 'Fun2';
    }

    public function actionFun3()
    {
        echo 'Fun3';
    }

    public function actionFun4()
    {
        echo 'Fun4';
    }

    public function actionFun5()
    {
        echo 'Fun5';
    }
    public function actionFun6()
    {
        echo 'Fun6';
    }
}
