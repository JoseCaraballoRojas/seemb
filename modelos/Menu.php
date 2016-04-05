<?php 
	include_once("conexion.php");
	/*
	 clase para gestionar los menus que se serviran en el 
	 servicio de comedor . 
	*/
	class Menu{
			private $_menu;
			private $_primer_plato;
			private $_segundo_plato;
			private $_tercer_plato;
			private $_bebida;
			private $_fruta;
			private $_fecha_hora;
			
			//Funcion para leer los Platos guardados en la base de datos y retornarlos.
			public function Menu_anterior($fecha_actual)
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar("SELECT * FROM menu ORDER BY id_menu ASC LIMIT 1");
				if($consulta->num_filas($resultado)>0)
				    {
				    	
				    	return $resultado;
				    }
				else{
						return false;
					}

			}

			
			//Funcion para buscar los platos registrados en la base de datos.
			public function Buscar($ci)
			{
				$buscar=new MySQL1();
				$buscar->MySQL();
				
				$resultado=$buscar->consultar("SELECT *FROM personas WHERE ci='$ci' ");
				if(($buscar->num_filas($resultado))>0){

					return $resultado;
					}

				else{
					$mensaje="La cedula no esta registrada en la base de datos";
					return $mensaje;
					}
			}

			
		}

 ?>
