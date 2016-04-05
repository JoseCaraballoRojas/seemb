<?php 
	include_once("conexion.php");
	/*
	 clase para gestionar los perfiles de recuperacion
	 de los usuarios registrados en el sistema.
	*/
	class Perfil
		{
			private $_primera_pregunta;
			private $_primera_respuesta;
			private $_segunda_pregunta;
			private $_segunda_respuesta;
			private $_tercera_pregunta;
			private $_tercera_respuesta;
			private $_usuario;
			
			//Funcion para crear perfiles de los usuarios...
			public function Crear($id_usuario,$primera_pregunta,$primera_respuesta,$segunda_pregunta,$segunda_respuesta,$tercera_pregunta,$tercera_respuesta)
			{
				$crear=new MySQL1();
				$crear->MySQL();
				$this->_primera_pregunta=$primera_pregunta;
				$this->_primera_respuesta=$primera_respuesta;
				$this->_segunda_pregunta=$segunda_pregunta;
				$this->_segunda_respuesta=$segunda_respuesta;
				$this->_tercera_pregunta=$tercera_pregunta;
				$this->_tercera_respuesta=$tercera_respuesta;
				$this->_usuario=$id_usuario;
								
				//se consulta la base de datos para saber si ya el usuario creo su perfil..
				$query=$crear->consultar("SELECT *FROM perfiles WHERE id_usuario='$this->_usuario'");
				//se comprueba el resultado de la consulta
				if(($crear->num_filas($query))>0){	
					//si ya hay un perfil creado para ese usuario  se emite un mensaje
					$mensaje="El perfil de ese usuario ya fue creado ";
					return $mensaje;
				}
				else{
					//si el perfil no esta creado en la bases de datos se crea...	
					if( ($crear->consultar("INSERT INTO perfiles(primera_pregunta,primera_respuesta,segunda_pregunta,segunda_respuesta,tercera_pregunta,tercera_respuesta,id_usuario) VALUES('$this->_primera_pregunta','$this->_primera_respuesta','$this->_segunda_pregunta','$this->_segunda_respuesta','$this->_tercera_pregunta','$this->_tercera_respuesta','$this->_usuario')")==TRUE ) ){
								$activar_perfil= new Perfil();
								$activar=$activar_perfil->Activar($id_usuario);	
									if ($activar==TRUE) {							
									//si todo se realizo correctamente se emite un mensaje
									$mensaje="El perfil se creo exitosamente inicie sesion nuevamente por favor";

									return $mensaje;
								}
						}
						else
						{	//mensaje si ha ocurrido un error
							$mensaje="Error al crear el perfil ";
							return  $mensaje;
						}
					//se cierra la conexion a la base de datos
					$crear->desconectar();
					}
			
			}

			//Funcion para buscar un perfil en la base de datos.
			public function Buscar($id_usuario)
			{
				$buscar=new MySQL1();
				$buscar->MySQL();
				
				$resultado=$buscar->consultar("SELECT *FROM perfiles WHERE id_usuario='$id_' ");
				if(($buscar->num_filas($resultado))>0){

					return $resultado;
					}

				else{
					$mensaje="el producto con ese id no esta registrado en la base de datos";
					return $mensaje;
					}
			}

			//funcion para actualizar las productos registrados.
			public function Actualizar($id_producto,$producto,$presentacion,$fecha_vencimiento,$categoria){
				$actualizar= new MySQL1();
				$actualizar->MySQL();
				$this->_producto=$producto;
				$this->_presentacion=$presentacion;
				$this->_fecha_vencimiento=$fecha_vencimiento;
				$this->_categoria=$categoria;
				//se comprueba a ravez de una condicion si se ejecuta la actualizacion de la producto.
				if($actualizar->consultar("UPDATE productos set producto='$this->_producto', presentacion='$this->_presentacion', fecha_vencimiento='$this->_fecha_vencimiento', id_categoria='$this->_categoria'  WHERE id_producto='$id_producto'")){	
					//si todo se realizo correctamente se emite un mensaje
					$mensaje="El producto se actualizo exitosamente";
					return $mensaje;
				}
				else
				{	//si ha ocurrido un error se emite un mensaje
					$mensaje="Error al actualizar el producto";
					return  $mensaje;
				}
				//se cierra la conexion a la base de datos
				$actualizar->desconectar();
			}

			// funcion para borrar productos registrados en la base de datos.
			public function Borrar($id_producto)
			{
				
				$borrar=new MySQL1();
				$borrar->MySQL();
				
				//se consulta la base de datos para saber si la producto existe.
				$query=$borrar->consultar("SELECT *FROM productos WHERE id_producto='$id_producto'");
				//se comprueba el resultado de la consulta.
				if(($borrar->num_filas($query))<1)
				{	//si no encuentra nada emite un mensaje
					$mensaje="El producto no Existe en la Base de Datos";
					return $mensaje;
				}

				//se usa una condicion para determinar si elproducto se borro de la base de datos.
				if($borrar->consultar("DELETE FROM productos WHERE id_producto='$id_producto'"))
				{
					//si todo se realizo correctamente se emite un mensaje
					$mensaje="EL producto se Borro exitosamente";
					return $mensaje;
				}
				else
				{	
					//mensaje si ha ocurrido un error
					$mensaje="Error al Borrar la producto";
					return  $mensaje;
				}
				//se cierra la conexion a la base de datos
				$borrar->desconectar();
			}


			//funcion para activar los perfiles de los usuarios.
			public function Activar($id_usuario){
				$activar= new MySQL1();
				$activar->MySQL();
				$perfil='COMPLETO';
				if($activar->consultar("UPDATE usuarios set perfil='$perfil' WHERE id_usuario='$id_usuario'")){	
					//si todo se realizo correctamente se emite una respuesta
					$mensaje=TRUE;
					return $mensaje;
				}
				else
				{	//si ha ocurrido un error se emite una respuesta
					$mensaje=FALSE;
					return  $mensaje;
				}
				//se cierra la conexion a la base de datos
				$actualizar->desconectar();
			}

		}

 ?>
