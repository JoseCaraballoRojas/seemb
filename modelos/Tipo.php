<?php 
	include_once("conexion.php");
	/*
	 clase para gestionar los tipos de platos que integran el menu
	  en la base de datos del sistema. 
	*/
	class Tipo{
		
			private $_tipo;
			private $_turno;
			
			//Funcion para leer los tipos de platos en la base de datos y retornarlos.
			public function Leer()
			{
				$leer=new MySQL1();
				$leer->MySQL();
				$resultado=$leer->consultar("SELECT *FROM tipos");
				if($leer->num_filas($resultado)>0)
				    {
				    	
				    	return $resultado;
				    }
				else{
						return false;
					}

			}

			//Funcion para crear tipos de platos y almacenarlos en la base de datos ..
			public function Crear($tipo,$turno)
			{
				$crear=new MySQL1();
				$crear->MySQL();
				$this->_tipo=$tipo;
				$this->_turno=$turno;
								
				//se consulta la base de datos para saber si ya esta resgistrado el tipo de plato.
				$query=$crear->consultar("SELECT *FROM tipos WHERE tipo='$this->_tipo'");
				//se comprueba el resultado de la consulta
				if(($crear->num_filas($query))>0)
				{	//si ya hay un tipo de plato  igual registrado se emite un mensaje
					$mensaje="el tipo de plato ya esta creado ";
					return $mensaje;
				}
				else{
					//si el tipo de plato no esta registrado en la base de datos se registra..	
					if($crear->consultar("INSERT INTO tipos (tipo,turno) VALUES('$this->_tipo','$this->_turno')"))
						{	//si todo se realizo correctamente se emite un mensaje
							$mensaje="El tipo de plato se Creo exitosamente";
							return $mensaje;
						}
						else
						{	//mensaje si ha ocurrido un error
							$mensaje="Error al crear el tipo de plato";
							return  $mensaje;
						}
					//se cierra la conexion a la base de datos
					$crear->desconectar();
					}
			
			}

			//Funcion para buscar los tipos registrados en la base de datos.
			public function Buscar($id_tipo)
			{
				$buscar= new MySQL1();
				$buscar->MySQL();
				
				$resultado=$buscar->consultar("SELECT *FROM tipos WHERE id_tipo='$id_tipo' ");
				if(($buscar->num_filas($resultado))>0){

					return $resultado;
					}

				else{
					$mensaje="El tipo con ese id no esta registrado en la base de datos";
					return $mensaje;
					}
			}

			//funcion para actualizar los tipos de platos registrados.
			public function Actualizar($id_tipo,$tipo,$turno)
			{
				$actualizar= new MySQL1();
				$actualizar->MySQL();
				$this->_tipo=$tipo;
				$this->_turno=$turno;
				

				//se comprueba a travez de una condicion si se ejecuta la actualizacion de la unidad.
				if($actualizar->consultar("UPDATE tipos set tipo='$this->_tipo', turno='$this->_turno' WHERE id_tipo='$id_tipo'")){	
					//si todo se realizo correctamente se emite un mensaje
					$mensaje="el tipo  de plato se actualizo exitosamente";
					return $mensaje;
				}
				else
				{	//si ha ocurrido un error se emite un mensaje
					$mensaje="Error al actualizar el tipo de plato";
					return  $mensaje;
				}
				//se cierra la conexion a la base de datos
				$actualizar->desconectar();
			}

			// funcion para borrar unidades registradas en la base de datos.
			public function Borrar($id_tipo)
			{
				
				$borrar=new MySQL1();
				$borrar->MySQL();
				
				//se consulta la base de datos para saber si el tipo existe.
				$query=$borrar->consultar("SELECT *FROM tipos WHERE id_tipo='$id_tipo'");
				//se comprueba el resultado de la consulta.
				if(($borrar->num_filas($query))<1)
				{	//si no encuentra nada emite un mensaje
					$mensaje="el tipo no Existe en la Base de Datos";
					return $mensaje;
				}

				//se usa una condicion para determinar si el tipo de plato se borro de la base de datos.
				if($borrar->consultar("DELETE FROM tipos WHERE id_tipo='$id_tipo'"))
				{
					//si todo se realizo correctamente se emite un mensaje
					$mensaje="el tipo se borro exitosamente";
					return $mensaje;
				}
				else
				{	
					//mensaje si ha ocurrido un error
					$mensaje="Error al borrar el tipo";
					return  $mensaje;
				}
				//se cierra la conexion a la base de datos
				$borrar->desconectar();
			}
		}

 ?>
