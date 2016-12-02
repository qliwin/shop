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
                //在使用filter过滤时，未登录的用户会自动跳转到自定义的登录页面
                //属性在 framework/web/auth/CWebUser
                'loginUrl' => './index.php?r=houtai/manager/login',
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
