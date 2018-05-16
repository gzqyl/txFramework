<?php

	class soapWsdl
	{ 
	     //用于提供服务的方法
	    public  function Add($a,$b) {    
	       return $a + $b;
	    }
	}
	//实例化SoapServer，加载testService.wsdl文件
	$server=new SoapServer('testService.wsdl',array('soap_version' => SOAP_1_2));
	//装载上面的服务类service
	$server->setClass("soapWsdl");
	$server->handle();