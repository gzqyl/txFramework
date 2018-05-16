<?php

	$key = 'duanxin'; //验证用户的key

	if(!isset($_POST['key']) || $_POST['key'] !=$key){
		echo json_encode(array('code'=>101,'msg'=>'key 不正确'));exit;
	}

	if(!isset($_POST['tel'])){ //验证是否设置手机号

		echo json_encode(array('code'=>102,'msg'=>'没有设置手机号'));exit;

	}

	//假设用户admin，密码admin是合法用户

	if($_POST['name'] != 'admin' || $_POST['password'] != 'admin'){
		echo json_encode(array('code'=>103,'msg'=>'不存在的用户'));exit;
	}

	//获取用户想发送的内容

	$msg = isset($_POST['msg']) ? $_POST['msg'] : exit(json_encode(array('code'=>104,'msg'=>'发送内容不能为空')));

	//系统发送短信出去

	//返回发送状态给用户 code 200 则为发送成功

	echo json_encode(array('code'=>200,'msg'=>"成功发送 ".$msg));exit;

	


