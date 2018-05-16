<?php

	$address = '127.0.0.1';
	$port = 10000;


	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

	if ($socket === false) {
	    echo "创建socket失败";exit;
	}


	//发起连接
	$result = socket_connect($socket, $address, $port);

	if ($result === false) {
	    echo "连接失败";exit;
	}

	echo "输入q 关闭会话 \n";

	//获取服务端的消息
	$out = socket_read($socket, 2048);

	echo $out . "\n";

	while($in = fgets(fopen("php://stdin",'r'))){ //打开php的标准输入

		if(trim($in) == 'q') break; //trim函数去除字符串首尾处的空白字符

		//发送数据到服务端
		socket_write($socket, $in, strlen($in));

		//获取服务端的消息
		$out = socket_read($socket, 2048);

		echo $out . "\n";

	}

	socket_close($socket);//关闭连接

	echo "socket已关闭";

	