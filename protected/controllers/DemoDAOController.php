<?php

class DemoDAOController extends Controller
{
    public function actionIndex()
    {
        /**
         * 1. 连接数据库
         */
        $connection = new CDbConnection('mysql:host=localhost;dbname=test', 'root', 'root');

        /**
         * 2. 执行sql
         */
        //执行iud操作
        //$sql = "insert into sw_goods (goods_name) values ('huawei4')";
        //$command = $connection->createCommand($sql); //CDbCommand对象
        //$rowConut = $command->execute();//受影响行数

        //执行query
        $sql = "select * from sw_goods";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        //$rows = $command->queryAll();

        /**
         * 3.读取方式
         */
        //read方式
        //while(($row = $dataReader->read()) !== false){
        //    echo $row['goods_id'] , $row['goods_name'] , '<br />';
        //}

        //foreach 方式
        //foreach ($dataReader as $row) {
        //    echo $row['goods_id'] , $row['goods_name'] , '<br />';
        //}

        //readAll方式
        $rows = $dataReader->readAll();
        foreach ($rows as $row) {
            echo $row['goods_id'] , $row['goods_name'] , '<br />';
        }
    }

    /**
     * 事务处理
     */
    public function actionShiWu()
    {
        $connection = new CDbConnection('mysql:host=localhost;dbname=test', 'root', 'root');
        $transaction = $connection->beginTransaction();
        try {
            $sql1 = "insert into sw_goods (goods_name) values ('xiaomi1')";
            $sql2 = "select * from sw_goods where goods_id < 10";

            $acton1 = $connection->createCommand($sql1)->execute();
            $acton2 = $connection->createCommand($sql2)->query();

            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollback();
            echo $e->getMessage();
        }
    }

    /**
     * 参数绑定
     */
    public function actionBind1()
    {
        $goods_price = 100;
        $goods_category_id = 10;

        $connection = new CDbConnection('mysql:host=localhost;dbname=test', 'root', 'root');
        $sql = "select goods_id, goods_name, goods_price  from sw_goods where goods_price < :goods_price and goods_category_id < :goods_category_id";
        $command = $connection->createCommand($sql);
        $command->bindParam(":goods_price", $goods_price, PDO::PARAM_INT);
        $command->bindParam(":goods_category_id", $goods_category_id, PDO::PARAM_INT);
        $rows = $command->queryAll();
        p($rows);
    }
    
    public function actionBind2()
    {
        $goods_price = 100;
        $goods_category_id = 10;

        $connection = new CDbConnection('mysql:host=localhost;dbname=test', 'root', 'root');
        $sql = "select goods_id, goods_name, goods_price  from sw_goods where goods_price < ? and goods_category_id < ?";
        $command = $connection->createCommand($sql);
        $command->bindValue(1, $goods_price, PDO::PARAM_INT);
        $command->bindValue(2, $goods_category_id, PDO::PARAM_INT);
        $rows = $command->queryAll();
        p($rows);
    }

    /**
     * 绑定列
     */
    public function actionBind3()
    {
        $sql = "select goods_id, goods_name, goods_price  from sw_goods";
        $connection = new CDbConnection('mysql:host=localhost;dbname=test', 'root', 'root');
        $dateReader = $connection->createCommand($sql)->query();
        $dateReader->bindColumn(1, $id);
        $dateReader->bindColumn(2, $name);
        var_dump($name); //null
        foreach ($dateReader as $item) {
            //echo $name;
            //p($item);
        }
        echo $name; //有值
    }
}
