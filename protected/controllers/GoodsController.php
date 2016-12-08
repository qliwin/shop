<?php

/**
 * 商品控制器
 */
class GoodsController extends Controller
{
    //通过过滤器实现整页面缓存（布局+视图）
    public function filters()
    {
        return array(
            array(
                'system.web.widgets.COutputCache + detail',
                'duration'=>3600,  //缓存有效期
                'varyByParam'=>array('goods_id'),//缓存变化，
            )
        );
    }

    //商品list
    public function actionCategory()
    {

        $goods_model = Goods::model();

        //1 获得商品总的条数
        $cnt = $goods_model->count();
        $per = 3; //每页显示条数

        //2 实例化分页类，在main配置中已import
        $page = new Pagination($cnt, $per);

        //3 拼凑sql
        $sql = "select * from {{goods}} $page->limit";
        $goods_list = $goods_model->findAllBySql($sql);
        //p($goods_list);die;
        //分页列表
        $fpage = $page->fpage();
        //echo $fpage;die;
        $this->render('category', array('goods_list'=>$goods_list, 'fpage'=>$fpage));

        //$this->render('category', array('goods_list'=>$goods_list));
    }

    //商品详情
    public function actionDetail($goods_id)
    {
        $goods_model = Goods::model();
        $goods = $goods_model->findByPk($goods_id);
        //设置缓存获取
        //$goods = $goods_model->getGoodsInfoByPk($goods_id);
        $this->render('detail',array('goods' =>$goods));
    }
}
