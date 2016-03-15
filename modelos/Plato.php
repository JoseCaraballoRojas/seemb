<?php 
	include_once("conexion.php");
	/*
	 clase para gestionar los platos que formaran parte del menu 
	 de los platos que integra un menu registrado en la base de datos del sistema. 
	*/
	class Nutriente
		{
			private $_plato;
			private $_descripcion;
			private $_tipo;
			private $_cantidad;
			
			//Funcion para leer los Nutrientes guardados en la base de datos y retornarlas.
			public function Leer()
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar("SELECT n.id_unidad,n.nutriente, n.id_nutriente, u.id_unidad, u.unidad FROM unidades AS u JOIN nutrientes As n on n.id_unidad=u.id_unidad ");
				if($consulta->num_filas($resultado)>0)
				    {
				    	
				    	return $resultado;
				    }
				else{
						return false;
					}

			}

			//Funcion para crear nutrientes  y almacenarlos en la base de datos ..
			public function Crear($nutriente,$unidad)
			{
				$crear=new MySQL1();
				$crear->MySQL();
				$this->_nutriente=$nutriente;
				$this->_unidad=$unidad;
								
				//se consulta la base de datos para saber si ya esta resgistrado el nutriente
				$query=$crear->consultar("SELECT *FROM nutrientes WHERE nutriente='$this->_nutriente'");
				//se comprueba el resultado de la consulta
				if(($crear->num_filas($query))>0)
				{	//si ya hay una unidadad  igual registrada se emite un mensaje
					$mensaje="El Nutriente ya esta creado ";
					return $mensaje;
				}
				else{
					//si el nutriente no esta registrado en la base de datos se registra..	
					if($crear->consultar("INSERT INTO nutrientes (nutriente,id_unidad) VALUES('$this->_nutriente','$this->_unidad')"))
						{	//si todo se realizo correctamente se emite un mensaje
							$mensaje="El nutriente se Creo Exitosamente";
							return $mensaje;
						}
						else
						{	//mensaje si ha ocurrido un error
							$mensaje="Error al Crear El Nutriente";
							return  $mensaje;
						}
					//se cierra la conexion a la base de datos
					$crear->desconectar();
					}
			
			}

			//Funcion para buscar los nutrientes registrados en la base de datos.
			public function Buscar($id_nutriente)
			{
				$buscar=new MySQL1();
				$buscar->MySQL();
				
				$resultado=$buscar->consultar("SELECT *FROM nutrientes WHERE id_nutriente='$id_nutriente' ");
				if(($buscar->num_filas($resultado))>0){

					return $resultado;
					}

				else{
					$mensaje="El Nutriente con ese id no esta registrada en la base de datos";
					return $mensaje;
					}
			}

			//funcion para actualizar los nutrientes registrados.
			public function Actualizar($id_nutriente,$nutriente,$unidad)
			{
				$actualizar= new MySQL1();
				$actualizar->MySQL();
				$this->_nutriente=$nutriente;
				$this->_unidad=$unidad;

				//se comprueba a travez de una condicion si se ejecuta la actualizacion del nutriente.
				if($actualizar->consultar("UPDATE nutrientes set nutriente='$this->_nutriente', id_unidad='$this->_unidad' WHERE id_nutriente='$id_nutriente'")){	
					//si todo se realizo correctamente se emite un mensaje
					$mensaje="El Nutriente se actualizo exitosamente";
					return $mensaje;
				}
				else
				{	//si ha ocurrido un error se emite un mensaje
					$mensaje="Error al actualizar El Nutriente";
					return  $mensaje;
				}
				//se cierra la conexion a la base de datos
				$actualizar->desconectar();
			}

			// funcion para borrar Nutrientes registrados en la base de datos.
			public function Borrar($id_nutriente)
			{
				
				$borrar=new MySQL1();
				$borrar->MySQL();
				
				//se consulta la base de datos para saber si el nutriente existe.
				$query=$borrar->consultar("SELECT *FROM nutrientes WHERE id_nutriente='$id_nutriente'");
				//se comprueba el resultado de la consulta.
				if(($borrar->num_filas($query))<1)
				{	//si no encuentra nada emite un mensaje
					$mensaje="El Nutriente no Existe en la Base de Datos";
					return $mensaje;
				}

				//se usa una condicion para determinar si el nutriente se borro de la base de datos.
				if($borrar->consultar("DELETE FROM nutrientes WHERE id_nutriente='$id_nutriente'"))
				{
					//si todo se realizo correctamente se emite un mensaje
					$mensaje="El Nutriente Se Borro Exitosamente";
					return $mensaje;
				}
				else
				{	
					//mensaje si ha ocurrido un error
					$mensaje="Error al  borrar el nutriente";
					return  $mensaje;
				}
				//se cierra la conexion a la base de datos
				$borrar->desconectar();
			}
		}

 ?>
