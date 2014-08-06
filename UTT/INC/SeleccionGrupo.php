<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

	$mDatos =new Modelo(); 
	$mDatos->conectar();

	echo $mDatos->Seleccionar("Grupo", "Where bActivo_Gru=1");

?>