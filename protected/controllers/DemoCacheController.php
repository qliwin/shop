<?php

/**
 * 数据缓存的demo
 * 设置： Yii::app()->cache->set(名字，值，过期时间);
 * 使用：Yii::app()->cache->get(名字);
 * 删除：Yii::app()->cache->delete(名字);
 * 清空：Yii::app()->cache->flush();

 */
class DemoCacheController extends Controller
{
    //设置缓存变量
    public function actionCache1()
    {
        Yii::app()->cache->set('username','zhangsan',3600);
        Yii::app()->cache->set('useraddr','shanghai',3600);
        Yii::app()->cache->set('userhobby','zuqiu',3600);
        echo 'set DataCache Success!';
    }

    //获取缓存变量
    public function actionCache2()
    {
        echo Yii::app()->cache->get('username') , '<br />';
        echo Yii::app()->cache->get('useraddr') , '<br />';
        echo Yii::app()->cache->get('userhobby') , '<br />';
        echo 'get DataCache Success!';
    }

    public function actionCache3()
    {
        //删除单个缓存变量
        //Yii::app()->cache->delete('username');

        //删除所有缓存变量
        //删除的同时会删除所有的缓存文件
        Yii::app()->cache->flush();
        echo 'delete DataCache Success!';
    }
}
