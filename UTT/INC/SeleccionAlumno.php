<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

	$mDatos =new Modelo(); 
	$mDatos->conectar();

	echo $mDatos->Seleccionar("Alumno", "Where bActivo_Alu=1");

?>