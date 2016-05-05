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
			public function Menu_anterior($limite)
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar("SELECT * FROM menu ORDER BY id_menu ASC LIMIT ".$limite."");
				if($consulta->num_filas($resultado)>0)
				    {
				    	
				    	return $resultado;
				    }
				else{
						$resultado=0;
						return $resultado;
					}

			}

			
			//Funcion para leer los Platos guardados en la base de datos y retornarlos.
			public function Buscar_plato($id_plato,$tipo)
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar(" SELECT p.plato,p.porcion,u.unidad,t.tipo,p.calorias,p.carbohidratos,p.proteinas,p.grasas,p.azucares,p.sal FROM platos as p join unidades as u on p.id_unidad=u.id_unidad join tipos as t on p.id_tipo=t.id_tipo WHERE p.id_plato='$id_plato' AND t.tipo='$tipo' ");
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
