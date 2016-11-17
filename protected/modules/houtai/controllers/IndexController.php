<?php

/**
 * 后台控制体=器
 */
class IndexController extends Controller
{
    //头部
    public function actionHead()
    {
        $this->renderPartial('head');
    }

    //左侧菜单
    public function actionLeft()
    {
        $this->renderPartial('left');
    }

    //左侧菜单
    public function actionRight()
    {
        $this->renderPartial('right');
    }

    //将头部，左侧，右侧集成
    public function actionIndex()
    {
        $this->renderPartial('index');
    }
}
