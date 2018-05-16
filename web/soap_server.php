<?php

	class AuthApi{
	
	    public function Authorise($auth) {

	    	  if($auth->username == 'admin' && $auth->password == 'admin'){
	    	  	$this->authorized = true;
	    	  }else{
	    	  	$this->authorized = false;
	    	  }

	          
	    }

	    public function request(){
	          if ($this->authorized) {
	               return 'auth ok';
	          } else {
	          	   return 'auth fail';
	          }
	    }

	}
	

	//创建一个SOAP服务端，非WSDL模式下，第一个参数是null
	$server = new SoapServer(null, array('uri'=>'http://soap/','location'=>'http://localhost/soap_server.php'));
	$server->setClass('AuthApi');
	$server->handle();
