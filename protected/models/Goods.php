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
}
