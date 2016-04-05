<?php 
	include_once("conexion.php");
	/*
	 clase para gestionar las Unidades usadas para expresar los componetes
	 de los ingrediente en la base de datos del sistema 
	*/
	class Unidad
		{
			private $_unidad;
			private $_detalle;
			
			//Funcion para leer lass Unidades guardadas en la base de datos y retornarlas.
			public function Leer()
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar("SELECT *FROM unidades");
				if($consulta->num_filas($resultado)>0)
				    {
				    	
				    	return $resultado;
				    }
				else{
						return false;
					}

			}

			//Funcion para crear unidades y almacenarlas en la base de datos ..
			public function Crear($unidad,$detalle)
			{
				$crear=new MySQL1();
				$crear->MySQL();
				$this->_unidad=$unidad;
				$this->_detalle=$detalle;
								
				//se consulta la base de datos para saber si ya esta resgistrada la unidad
				$query=$crear->consultar("SELECT *FROM unidades WHERE unidad='$this->_unidad'");
				//se comprueba el resultado de la consulta
				if(($crear->num_filas($query))>0)
				{	//si ya hay una unidadad  igual registrada se emite un mensaje
					$mensaje="la Unidad ya esta creado ";
					return $mensaje;
				}
				else{
					//si la unidad no esta registrada en la base de datos se registra..	
					if($crear->consultar("INSERT INTO unidades (unidad,detalle) VALUES('$this->_unidad','$this->_detalle')"))
						{	//si todo se realizo correctamente se emite un mensaje
							$mensaje="La Unidad se Creo Exitosamente";
							return $mensaje;
						}
						else
						{	//mensaje si ha ocurrido un error
							$mensaje="Error al Crear la Unidad";
							return  $mensaje;
						}
					//se cierra la conexion a la base de datos
					$crear->desconectar();
					}
			
			}

			//Funcion para buscar la unidades registradas en la base de datos.
			public function Buscar($id_unidad)
			{
				$buscar=new MySQL1();
				$buscar->MySQL();
				
				$resultado=$buscar->consultar("SELECT *FROM unidades WHERE id_unidad='$id_unidad' ");
				if(($buscar->num_filas($resultado))>0){

					return $resultado;
					}

				else{
					$mensaje="La Unidad con ese id no esta registrada en la base de datos";
					return $mensaje;
					}
			}

			//funcion para actualizar las unidades registradas.
			public function Actualizar($id_unidad,$unidad,$detalle)
			{
				$actualizar= new MySQL1();
				$actualizar->MySQL();
				$this->_unidad=$unidad;
				$this->_detalle=$detalle;

				//se comprueba a ravez de una condicion si se ejecuta la actualizacion de la unidad.
				if($actualizar->consultar("UPDATE unidades set unidad='$this->_unidad', detalle='$this->_detalle' WHERE id_unidad='$id_unidad'")){	
					//si todo se realizo correctamente se emite un mensaje
					$mensaje="La Unidad se actualizo exitosamente";
					return $mensaje;
				}
				else
				{	//si ha ocurrido un error se emite un mensaje
					$mensaje="Error al actualizar la Unidad";
					return  $mensaje;
				}
				//se cierra la conexion a la base de datos
				$actualizar->desconectar();
			}

			// funcion para borrar unidades registradas en la base de datos.
			public function Borrar($id_unidad)
			{
				
				$borrar=new MySQL1();
				$borrar->MySQL();
				
				//se consulta la base de datos para saber si la Unidad existe.
				$query=$borrar->consultar("SELECT *FROM unidades WHERE id_unidad='$id_unidad'");
				//se comprueba el resultado de la consulta.
				if(($borrar->num_filas($query))<1)
				{	//si no encuentra nada emite un mensaje
					$mensaje="La Unidad no Existe en la Base de Datos";
					return $mensaje;
				}

				//se usa una condicion para determinar si la unidad se borro de la base de datos.
				if($borrar->consultar("DELETE FROM unidades WHERE id_unidad='$id_unidad'"))
				{
					//si todo se realizo correctamente se emite un mensaje
					$mensaje="La Unidad se Borro exitosamente";
					return $mensaje;
				}
				else
				{	
					//mensaje si ha ocurrido un error
					$mensaje="Error al Borrar la Unidad";
					return  $mensaje;
				}
				//se cierra la conexion a la base de datos
				$borrar->desconectar();
			}
		}

 ?>
