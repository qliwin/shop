<?php

//创建数据模型model对象
//new  Goods()  ;   调用save方法的时候给我们执行insert语句
//Goods::model();    调用save方法的时候执行update语句

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

            // 2 再次优化
            //必须要在Goods model中创建rules()

            //$goods_model->attributes = $_POST['Goods'];
            //p($goods_model);die;

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

    /**
     * 删除数据
     * 通过get方式传递被删除商品的id
     * @param $id
     */
    public function actionDel($id)
    {
        //1 获得数据模型对象
        $goods_model = Goods::model();
        //2 获得被删除商品的模型对象
        $goods_info = $goods_model->findByPk($id);

        //3 是goods_model调用delete()还是goods_info,答案是goods_info
        //  也可以写在一起 $goods_model = Goods::model()->findByPk($id);
        if ($goods_info->delete()) {
            $this->redirect('./index.php?r=houtai/goods/show');
        }
    }

    public function actionTestAR()
    {
        $model = Goods::model();
        //findall($condition, $param)
        //$goods_list = $model->findAllByPk(array(1,2,5));
        //$goods_list = $model->findAll("goods_name like '诺%' and goods_price > 500");
        //$goods_list = $model->findAll("goods_name like :goods_name and goods_price > :goods_price", array(':goods_name'=>'诺%', ':goods_price'=>800));
        //$goods_list = $model->findAll(array(
        //                                        'select' => 'goods_name, goods_price, goods_id',
        //                                        'condition' => 'goods_name like :goods_name',
        //                                        'order' => 'goods_price desc',
        //                                        'limit' => '5',
        //                                        'params' => array(':goods_name' => '诺%'),
        //                                    ));

        $this->renderPartial('show', array('goods_list'=>$goods_list));
    }

    /**
     * 分页展示商品
     * Pagination 是第三方类库，已组建component形式存在
     */
    public function actionShowPage()
    {
        $goods_model = Goods::model();

        //1 获得商品总的条数
        $cnt = $goods_model->count();
        $per = 10; //每页显示条数

        //2 实例化分页类，在main配置中已import
        $page = new Pagination($cnt, $per);

        //3 拼凑sql
        $sql = "select * from {{goods}} $page->limit";
        $goods_list = $goods_model->findAllBySql($sql);

        //分页列表
        $fpage = $page->fpage();
        //echo $fpage;die;
        $this->renderPartial('show', array('goods_list'=>$goods_list, 'fpage'=>$fpage));
    }
}
