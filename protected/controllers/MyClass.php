<?php

/**
 * Created by PhpStorm.
 * User: qli
 * Date: 2016/11/24
 * Time: 11:10
 */
class MyClass extends CAction
{
    public $sex;

    public function __construct($sex1)
    {
        echo '#####';
        $this->sex = $sex1;
    }

    public function run($name = '')
    {
        echo '哈哈哈，我是MyClass类，请记住我！' . $name . $this->sex;
    }
}
