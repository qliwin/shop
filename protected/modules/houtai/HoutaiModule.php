<?php

class HoutaiModule extends CWebModule
{


	public function init()
	{
        //定义后台默认控制器
        $this->defaultController='index';

		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'houtai.models.*',
			'houtai.components.*',
		));

        //为后台登录管理员设置session名字前缀
        Yii::app()->setComponents(array(
            'user' => array(
                'stateKeyPrefix' => 'houtai',
            )
        ));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
