<?php

	$start = microtime(true);

	for($i=0;$i<100000;$i++){

		echo $i;

	}

	echo "<br />执行时间是：".(microtime(true)-$start)." s";