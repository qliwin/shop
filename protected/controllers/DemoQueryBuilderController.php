<?php

class DemoQueryBuilderController extends Controller 
{
    public function actionIndex()
    {
        //$sql = "SELECT `user_id`, `username` FROM `sw_user` WHERE user_id = 17";
        $user = Yii::app()->db->createCommand()
                ->select('user_id, username')
                ->from('sw_user')
                ->where('user_id > :id', array(':id' => 16))
                ->order('user_id desc')
                ->queryAll();
        //p($user);

        $sql = Yii::app()->db->createCommand()
            ->select(array('username'))
            ->from('sw_user')
            ->where('id = 17')
            ->text;
        echo $sql; //SELECT `username` FROM `sw_user` WHERE id = 17

    }
}
