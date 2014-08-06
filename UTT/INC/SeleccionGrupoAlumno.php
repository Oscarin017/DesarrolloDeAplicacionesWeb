<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

	$mDatos =new Modelo(); 
	$mDatos->conectar();

	echo $mDatos->Seleccionar("Grupo_Alumno join Alumno ON (Grupo_Alumno.iIDAlumno_GA = Alumno.iIDAlumno_Alu)", "Where iIDGrupo_GA=1");

?>