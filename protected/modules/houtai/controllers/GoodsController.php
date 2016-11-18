<?php

/**
 * Created by PhpStorm.
 * User: qli
 * Date: 2016/11/18
 * Time: 10:28
 */
class GoodsController extends Controller
{
    //商品展示
    public function actionShow()
    {
        //1. 获得model对象
        $goods_model = Goods::model();

        //2. 获得所有商品信息
        //$goods_list = $goods_model->find();
        //echo $goods_list->goods_id;
        //echo $goods_list->goods_name;
        $goods_list = $goods_model->findAll();

        //findAllBySql
        //$sql = "select * from {{goods}} limit 10";
        //$goods_list = $goods_model->findAllBySql($sql);

        //findByPk && findAllByPk
        //$goods_list = $goods_model->findByPk(1);
        //$goods_list = $goods_model->findAllByPk(1);

        //findByAttributes 根据条件查找一条记录
        //$goods_list = $goods_model->findByAttributes(array('goods_id'=>1));
        //$goods_list = $goods_model->findAllByAttributes(array('goods_id'=>1));
        //var_dump($goods_list);die;
        $this->renderPartial('show', array('goods_list' => $goods_list));
    }

    //商品新增页面
    public function actionAdd()
    {
        // 1 实例化model
        $goods_model = new Goods();

        // 2 判断有无提交表单
        if (isset($_POST['Goods'])) {
            //将post值赋值给数据对象模型
            //$goods_model->goods_name = $_POST['Goods']['goods_name'];
            //$goods_model->goods_category_id = $_POST['Goods']['goods_category_id'];
            //$goods_model->goods_brand_id = $_POST['Goods']['goods_brand_id'];
            //$goods_model->goods_price = $_POST['Goods']['goods_price'];
            //$goods_model->goods_weight = $_POST['Goods']['goods_weight'];
            //$goods_model->goods_number = $_POST['Goods']['goods_number'];
            //$goods_model->goods_introduce = $_POST['Goods']['goods_introduce'];

            // 2 优化$_POST
            foreach ($_POST['Goods'] as $key => $good) {
                $goods_model->$key = $good;
            }

            // 3 调用save 添加
            if ($goods_model->save()) {
                //重定向
                $this->redirect('./index.php?r=houtai/goods/show');
            } else {
                echo 'fail';die;
            }
        }

        $this->renderPartial('add', array('goods_model' => $goods_model));
    }

    //商品信息添加到数据库
    public function actionWrite()
    {
        // 1. 创建model对象, 添加的model对象与查询model对象创建方式不一样
        $goods_model = new Goods();

        // 2.为对象属性赋值
        $goods_model->goods_name = 'Apple 9X';
        $goods_model->goods_price = '5888';
        $goods_model->goods_weight = '58';

        // 3. 调用save（）方法实现添加
        if ($goods_model->save()) {
            echo 'success';
        } else {
            echo 'fail';
        }
    }

    //商品更新
    //这里的id要和get过来的url上的参数名一致index.php?r=houtai/goods/update&id=2
    public function actionUpdate($id)
    {
        //这个地方需要注意，直接$goods_model = Goods::model()；$goods_model->save()无效
        $goods_model = Goods::model()->findByPk($id);

        if (isset($_POST['Goods'])) {
            foreach ($_POST['Goods'] as $key => $good) {
                $goods_model->$key = $good;
            }

            if ($goods_model->save()) {
                //p($goods_model);
                //重定向
                $this->redirect('./index.php?r=houtai/goods/show');
            } else {
                echo 'fail';die;
            }
        }

        $this->renderPartial('update' ,array('goods_model' => $goods_model));
    }


}
