<?php
	include_once("Conexion.php");

	class Modelo
	{
		private $PDO;
		private $NumRenglones;

		public function conectar()
		{
			try
			{
				$StringConexion=new Conexion();
				$this->PDO=new PDO("mysql:host=".$StringConexion->Servidor.";dbname=".$StringConexion->BaseDatos.";charset=utf8", $StringConexion->Usuario, $StringConexion->Contrasena);
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}

		function Select($SQL)
		{
			try
			{
				$Resultado = $this->PDO->query($SQL);
				while($Renglon =$Resultado->fetch(PDO::FETCH_ASSOC)) 
				{
           			$Datos[]=$Renglon;
					$this->NombreColumnas= array_keys($Renglon); 
				}	
				$this->NumRenglones = count($Datos);
				return  $Datos;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}	
		}

		public  function Cerrar_Conexion()
		{
			$this->PDO=NULL;
		}

		public function Seleccionar($Tabla, $Condicion)
		{	
			return json_encode($this->Select("select * from ".$Tabla." ".$Condicion));
		}

		public function Seleccionar2($Campo, $Tabla, $Condicion)
		{	
			return json_encode($this->Select("select ".$Campo." from ".$Tabla." ".$Condicion));
		}
		
		public function Insertar($SQL)
		{
			try
			{
				$Resultado = $this->PDO->exec($SQL);
				return $Resultado;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}	

		public function Modificar($SQL)
		{
			try
			{
				$Resultado = $this->PDO->exec($SQL);
				return $Resultado;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}

		public function Eliminar($SQL)
		{
			try
			{
				$Resultado = $this->PDO->exec($SQL);
				return $Resultado;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}

	}
?>