<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

	$mDatos =new Modelo();
 
	$mDatos->conectar();

	echo $dDatos->Seleccionar("select * from Profesor");

?>