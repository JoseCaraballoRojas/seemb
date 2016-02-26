<?php 
	include_once("conexion.php");
	/*
	 clase para gestionar los grupos de alimentos en la base de conocimientos del sistema... 
	*/
	class Grupos
		{
			private $grupo;
			private $prioridad;
			
			//Funcion para leer los grupos guardados en la base de datos y retornarlos.
			public function leer()
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar("SELECT *FROM grupos");
				if($consulta->num_filas($resultado)>0)
				    {
				    	//$datos=$consulta->busca_array($resultado);
				    	return $resultado;
				    }
				else{
						return false;
					}

			}

			

	}

 ?>
