<?php

	var_dump($_COOKIE['cookiename']);

	setcookie('cookiename',null,time()-1);