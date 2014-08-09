<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

	$mDatos =new Modelo(); 
	$mDatos->conectar();

	echo $mDatos->Seleccionar("Profesor", "Where (bActivo_Pro=1)");

?>