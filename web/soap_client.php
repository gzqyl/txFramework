<?php
	
	class SoapUserInfo {
	  
	 
	    public function __construct($l, $p) {
	        $this->password = $p;
	        $this->username = $l;
	    }
	}

	$soap_header = new SoapHeader("http://localhost", 'Authorise'
               , new SoapUserInfo('admin', 'admin'), false, SOAP_ACTOR_NEXT);

	//建立一个SOAP客户端
	$soap = new SoapClient(null, array('location'=>'http://localhost/soap_server.php','uri'=>'http://soap/'));

	$soap->__setSoapHeaders(array($soap_header));


	var_dump($soap->request()); //SOAP 服务端获得数据: 测试
