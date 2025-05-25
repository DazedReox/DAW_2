<?php
	$fich = fopen("ejemplo1.txt", "r");
	if ($fich === False){
		echo "No se encuentra ejemplo1.txt<br>";
	}else{
		echo "ejemplo1.txt se abrio<br>";
	}
	$fich = fopen("ejemplo2.txt", "r");
	if ($fich === False){
		echo "No se encuentra ejemplo2.txt<br>";
	}else{
		echo " ejemplo2.txt se abrio<br>";
	} 