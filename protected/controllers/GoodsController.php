<?php

/**
 * 商品控制器
 */
class GoodsController extends Controller
{
    //商品list
    public function actionCategory()
    {
        $this->render('category');
    }

    //商品详情
    public function actionDetail()
    {
        $this->render('detail');
    }
}
