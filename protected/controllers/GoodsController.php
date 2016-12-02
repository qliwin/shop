<?php

/**
 * 商品控制器
 */
class GoodsController extends Controller
{
    //商品list
    public function actionCategory()
    {
        $goods_model = Goods::model();

        $goods_list = $goods_model->findAll();


        //$this->render('category', array('goods_list'=>$goods_list));
    }

    //商品详情
    public function actionDetail()
    {
        $this->render('detail');
    }
}
