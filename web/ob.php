<?php
	
	$user = "joe@example.com";
	$hash = ezmlm_hash($user);
	echo $hash;