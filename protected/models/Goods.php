<?php

/**
 * 商品模型
 * 模型中两个必要的方法：
 *      model(): 创建模型对象，是静态方法
 *      tableName()：返回当前数据表的名字
 */
class Goods extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '{{goods}}';
    }

    public function attributeLabels()
    {
        return array(
            'goods_name' => '商品名称',
            'goods_weight'=>'重量',
            'goods_price'=>'价格',
            'goods_number'=>'数量',
            'goods_category_id'=>'商品分类',
            'goods_brand_id'=>'品牌',
            'goods_introduce'=>'简介',
        );
    }

    /**
     * @param $goods_id
     * @return array|mixed|null
     * 将商品信息存入缓存，下次再来获得信息就去缓存中查找
     */
    public function getGoodsInfoByPk($goods_id)
    {
        //获取goods_info,没有返回false
        $goods_info = Yii::app()->cache->get("goods_info . {$goods_id}");

        //判断缓存信息,没有则设置缓存
        if (! $goods_info) {
            $goods_info = $this->findByPk($goods_id);
            //设置不同的缓存变量名
            Yii::app()->cache->set("goods_info . {$goods_id}", $goods_info, 3600);
        }
        return $goods_info;
    }


}
