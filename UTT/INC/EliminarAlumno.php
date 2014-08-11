<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

 	extract($_POST);

	$mDatos =new Modelo(); 
	$mDatos->conectar();
	$R=$mDatos->Modificar("update alumno set bActivo_Alu=0 where iIDAlumno_Alu=".$IDAlumno);
	$Re=array('Resultado' =>$R);

	echo json_encode($Re);
?>