<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

 	extract($_POST);

	$mDatos =new Modelo(); 
	$mDatos->conectar();
	$R=$mDatos->Eliminar("delete from Grupo_Alumno where iIDGrupoAlumno_GA=".$IDGrupoAlumno);
	$Re=array('Resultado' =>$R);

	echo json_encode($Re);
?>