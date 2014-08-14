<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

 	extract($_POST);

	$mDatos =new Modelo(); 
	$mDatos->conectar();

	echo $mDatos->Seleccionar2("iIDGrupoAlumno_Asi, iIDAlumno_Alu, vNombre_Alu, vApellidoPaterno_Alu, vApellidoMaterno_Alu, sum(cAsistencia_Asi = 0) asistencia, sum(cAsistencia_Asi = 1) falta, sum(cAsistencia_Asi = 2) retardo", "Asistencia join Grupo_Alumno on Asistencia.iIDGrupoAlumno_Asi = Grupo_Alumno.iIDGrupoAlumno_GA join Alumno on Grupo_Alumno.iIDAlumno_GA = Alumno.iIDAlumno_Alu" , "where iIDGrupo_GA =".$IDGrupo." group by iIDAlumno_Alu");

?>