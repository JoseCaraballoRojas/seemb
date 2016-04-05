<?php 
	include_once("conexion.php");
	/*
	 clase para gestionar los usuarios del sistema . 
	*/
	class Usuario{
			private $_usuario;
			private $_password;
			private $_estatus;
			private $_tipo;
			private $_persona;
			
			//Funcion para leer los usuarios guardados en la base de datos y retornarlos.
			public function Leer()
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar("SELECT id_usuario,usuario,estatus,tipo FROM usuarios");
				if($consulta->num_filas($resultado)>0)
				    {
				    	
				    	return $resultado;
				    }
				else{
						return false;
					}

			}

			//Funcion para crear usuarios y almacenarlos en la base de datos ..
			public function Crear($usuario,$password,$estatus,$tipo,$id_persona)
			{
				$crear=new MySQL1();
				$crear->MySQL();
				$this->_usuario=$usuario;
				$this->_password=$password;
				$this->_estatus=$estatus;
				$this->_tipo=$tipo;
				$this->_persona=$id_persona;
				$perfil="INCOMPLETO";
								
				//se consulta la base de datos para saber si ya esta resgistrado el usuario
				$query=$crear->consultar("SELECT *FROM usuarios WHERE usuario='$this->_usuario'");
				//se comprueba el resultado de la consulta
				if(($crear->num_filas($query))>0)
				{	//si ya hay un usuario registrado se retorna un mensaje
					$mensaje="El usuario ya esta registrado";
					return $mensaje;
				}
				else{
					//si el usuario no esta registrado en la base de datos se registra..	
					if($crear->consultar("INSERT INTO usuarios (usuario,password,estatus,tipo,id_persona,perfil) VALUES('$this->_usuario','$this->_password','$this->_estatus','$this->_tipo','$this->_persona','$perfil')") == TRUE )
						{	//si todo se realizo correctamente se emite un mensaje
							$mensaje=TRUE;
							return $mensaje;
						}
						else
						{	//mensaje si ha ocurrido un error
							$mensaje=FALSE;
							return  $mensaje;
						}
					//se cierra la conexion a la base de datos
					$crear->desconectar();
					}
			
			}

			//Funcion para buscar los platos registrados en la base de datos.
			public function Buscar($usuario)
			{
				$buscar=new MySQL1();
				$buscar->MySQL();
				
				$resultado=$buscar->consultar("SELECT *FROM usuario WHERE usuario='$usuario' ");
				if(($buscar->num_filas($resultado))>0){

					return TRUE;
					}

				else{
					
					return FALSE;
					}
			}

			//funcion para actualizar los usuarios registrados.
			public function Actualizar($id_persona,$ci,$primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,$fecha_nacimiento)
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

			//funcion para activar los usuarios registrados.
			public function Activar($id_usuario)
			{
				$activar= new MySQL1();
				$activar->MySQL();

				//se comprueba a travez de una condicion si la consulta se da exitosamente.
				if($activar->consultar("UPDATE usuarios set estatus='ACTIVO' WHERE id_usuario='$id_usuario'")==TRUE){	
					//si todo se realizo correctamente se emite un mensaje
					$mensaje="El usuario se activo exitosamente";
					return $mensaje;
				}
				else
				{	//si ha ocurrido un error se emite un mensaje
					$mensaje="Error al activar el usuario";
					return  $mensaje;
				}
				//se cierra la conexion a la base de datos
				$activar->desconectar();
			}

			//funcion para desactivar los usuarios registrados.
			public function Desactivar($id_usuario)
			{
				$activar= new MySQL1();
				$activar->MySQL();

				//se comprueba a travez de una condicion si la consulta se da exitosamente.
				if($activar->consultar("UPDATE usuarios set estatus='INACTIVO' WHERE id_usuario='$id_usuario'")==TRUE){	
					//si todo se realizo correctamente se emite un mensaje
					$mensaje="El usuario se desactivo exitosamente";
					return $mensaje;
				}
				else
				{	//si ha ocurrido un error se emite un mensaje
					$mensaje="Error al desactivar el usuario";
					return  $mensaje;
				}
				//se cierra la conexion a la base de datos
				$activar->desconectar();
			}
			
		}

 ?>
