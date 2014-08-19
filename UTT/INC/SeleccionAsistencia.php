<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

 	extract($_POST);

	$mDatos =new Modelo(); 
	$mDatos->conectar();

	echo $mDatos->Seleccionar("Asistencia" , "where (iIDGrupoAlumno_Asi =".$IDGrupoAlumno.") && (cAsistencia_Asi='1'||cAsistencia_Asi='2')  order by dFecha_Asi");

?>