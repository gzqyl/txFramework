<?php

	class a{

		function __call($name,$param){

			echo  $name."<br />";
			var_dump($param);

		}

		function m(...$a){
			var_dump($a);
		}
	}

	(new a)->m('a',1);