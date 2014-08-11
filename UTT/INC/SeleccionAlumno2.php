<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

 	extract($_POST);

	$mDatos =new Modelo(); 
	$mDatos->conectar();

	$sConsulta="and (";
	$bConsulta=false;
	if($IDAlumno!="")
	{
		$bConsulta=true;
		$sConsulta.="(iIDAlumno_Alu=".$IDAlumno.")";
		if($Nombre!="" || $Ape_Pat!="")
		{
			$sConsulta.=" || ";
		}
	}
	if($Nombre!="")
	{
		$bConsulta=true;
		$sConsulta.="(vNombre_Alu like '%".$Nombre."%')";
		if($Ape_Pat!="")
		{
			$sConsulta.=" || ";
		}
	}
	if($Ape_Pat!="")
	{
		$bConsulta=true;
		$sConsulta.="(vApellidoPaterno_Alu like '%".$Ape_Pat."%')";
	}

	if($bConsulta)
	{
		echo $mDatos->Seleccionar("Alumno", "Where (bActivo_Alu=1)".$sConsulta.")");
	}
	else
	{
		echo $mDatos->Seleccionar("Alumno", "Where (bActivo_Alu=1)");
	}

?>