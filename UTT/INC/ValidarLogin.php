<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

 	extract($_POST);

	$mDatos =new Modelo(); 
	$mDatos->conectar();

	echo $mDatos->Seleccionar("Profesor", "Where bActivo_Pro=1 && vUsuario_Pro='".$Usuario."'");
?>