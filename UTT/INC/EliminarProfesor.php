<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

 	extract($_POST);

	$mDatos =new Modelo(); 
	$mDatos->conectar();
	$R=$mDatos->Modificar("update profesor set bActivo_Pro=0 where iIDProfesor_Pro=".$IDProfesor);
	$Re=array('Resultado' =>$R);

	echo json_encode($Re);
?>