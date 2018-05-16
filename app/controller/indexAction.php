<?php
namespace app\controller;
use biny\lib\TXLogger;
use biny\lib\TXLanguage;
use TXApp;

/**
 * 演示Action
 * @property \app\dao\userDAO $userDAO
 */
class indexAction extends baseAction
{
//    // 权限配置
//    protected function privilege()
//    {
//        return array(
//            'login_required' => array(
//                'actions' => '*', //绑定action
//            ),
//        );
//    }

    public function action_index()
    {	
    	$a = [1,2];
        $view = $this->display('index', ['a'=>$a]);
        $view->title = "Biny Framework Wiki";
        return $view;
    }
}