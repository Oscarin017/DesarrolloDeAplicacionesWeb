<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

 	extract($_POST);

	$mDatos =new Modelo(); 
	$mDatos->conectar();
	$R=$mDatos->Insertar("insert into Grupo values ('', '".$Nombre."', '1', '".$Profesor."')");
	$Re=array('Resultado' =>$R);

	echo json_encode($Re);
?>