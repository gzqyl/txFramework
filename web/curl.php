<?php

$code = mt_rand(111111,999999);

//session_start(); $_SESSION['code'] = $code;设置session，用户输入验证码时用来验证是否与session一致

$post = array(
	
'key'=>'duanxin',
'tel'=>'18900000000',
'name'=>'admin',
'password'=>'admin',

);

$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,"http://localhost/server.php");

//设置post为true
curl_setopt($ch,CURLOPT_POST,true);

//设置post数据
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($post));

//获取短信服务器返回
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$ctn = curl_exec($ch);

//释放curl资源
curl_close($ch);

print_r(json_decode($ctn,true));