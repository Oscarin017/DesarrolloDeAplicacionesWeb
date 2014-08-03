<?php
	include_once("Conexion.php");

	class Modelo
	{
		private $PDO;

		function conectar()
		{
			try
			{
				$StringConexion=new Conexion();
				$this->PDO=new PDO("mysql:host=".$Servidor.";dbname=".$BaseDatos.";charset=utf8", $Usuario, $Contrasena);
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}

	}
?>