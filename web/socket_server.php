<?php

	$address = '127.0.0.1';
	$port = 10000;

	//scoket_create 创建一个套接字
	//AF_INET连接协议 IPV4
	//SOCK_STREAM 套接字类型的一种，这里用面向连接的字节流
	//SOL_TCP AF_INET协议下连接的类型TCP、UDP等

	//买了个电话机
	if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
	    echo "创建socket失败";exit;
	}

	//绑定服务器地址与端口，申请了个手机号
	if (socket_bind($sock, $address, $port) === false) {
	    echo "绑定服务器端口失败";exit;
	}

	//等待电话或信息传入
    //socket_listen($sock, 5) 5代表最大的等待连接数，超过此连接数，客户端会报连接被拒绝的错误
	if (socket_listen($sock, 5) === false) {
	    echo "监听失败";exit;
	}

	//在接收到信息传入时，如何处理信息并回复对方
	do {

	    if (($msgsock = socket_accept($sock)) === false) { //创建一个新的socket用来处理当前连接的消息发送
	        echo "创建socket失败";
	        break;
	    }

	    //连接成功时发送消息给客户端
	    $msg = "已成功接入会话,可以开始发送消息了";
	    socket_write($msgsock, $msg, strlen($msg));

	    do {

	    	//读取客户端发送的数据，PHP_NORMAL_READ读取方式会在\r或\n处终止读取
	        if (false === ($buf = socket_read($msgsock, 2048, PHP_NORMAL_READ))) { 
	            echo "读取数据失败";
	            break;
	        }
	        if (!$buf = trim($buf)) {
	            continue;
	        }
	        
	        $buf = "发送的消息是: ".$buf;

	        //发送消息出去
	        socket_write($msgsock, $buf, strlen($buf));
	    } while (true);

	    socket_close($msgsock); //关闭当前连接

	} while (true);

	socket_close($sock); //关闭服务器连接


