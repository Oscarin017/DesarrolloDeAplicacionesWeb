<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

	$mDatos =new Modelo();
 
	$mDatos->conectar();

	echo $mDatos->Seleccionar("select * from Profesor");

?>