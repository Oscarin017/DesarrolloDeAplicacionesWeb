<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

 	extract($_POST);

	$mDatos =new Modelo(); 
	$mDatos->conectar();
	$R=$mDatos->Insertar("insert into Grupo_Alumno values ('', '".$IDAlumno."', '".$IDGrupo."')");
	$Re=array('Resultado' =>$R);

	echo json_encode($Re);
?>