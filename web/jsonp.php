<?php
	
	$ctn = urldecode($_GET['ctn']);

	file_put_contents('log',$ctn."\n",FILE_APPEND);
