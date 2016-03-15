<?php 
	include_once("conexion.php");
	/*
	 clase para gestionar los viveres en la base de conocimientos del sistema... 
	*/
	class Viveres
		{
			private $nombre;
			private $grupo;
			private $mensaje="nose ejecuto la funcion";
			//Funcion para leer los viveres guardados en la base de datos y retornarlos.
			public function leer()
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar("SELECT *FROM viveres");
				if($consulta->num_filas($resultado)>0)
				    {
				    	
				    	return $resultado;
				    }
				else{
						return false;
					}

			}

			//Funcion para agregar nuevos viveres a la base de datos ..
			public function crear($grupo,$prioridad)
			{
				$crear=new MySQL1();
				$crear->MySQL();

								
				//se consulta la base de datos para saber si ya esta resgistrado el grupo
				$query=$crear->consultar("SELECT *FROM grupos WHERE grupo='$grupo'");
				//se comprueba el resultado de la consulta
				if(($crear->num_filas($query))>0)
				{	//si ya hay un registro igual se emite un mensaje
					$mensaje="El Grupo ya esta creado ";
					return $mensaje;
				}
				else{
					//si el grupo no esta registrado en la base de datos se registra..	
					if($crear->consultar("INSERT INTO grupos (grupo,prioridad) VALUES('$grupo','$prioridad')"))
						{	//si todo se realizo correctamente se emite un mensaje
							$mensaje="El Grupo se Creo exitosamente";
							return $mensaje;
						}
						else
						{	//mensaje si ha ocurrido un error
							$mensaje="Error al crear el Grupo";
							return  $mensaje;
						}
					//se cierra la conexion a la base de datos
					$crear->desconectar();
					}
			
			}

			public function editar($id_grupo,$opc)
			{
				$editar=new MySQL1();
				$editar->MySQL();
				

				if ($opc=='buscar'){
					$resultado=$editar->consultar("SELECT *FROM grupos WHERE id_grupo='$id_grupo' ");
					if(($editar->num_filas($resultado))>0){

					return $resultado;
					}
				}
				else
				{
					return $mensaje;
				}
			}

			//funcion para actualizar los grupos registrados.
			public function actualizar($id_grupo,$grupo,$prioridad)
			{
				$actualizar= new MySQL1();
				$actualizar->MySQL();

				if($actualizar->consultar("UPDATE grupos set grupo='$grupo', prioridad='$prioridad' WHERE id_grupo='$id_grupo'"))
				{	//si todo se realizo correctamente se emite un mensaje
					$mensaje="El Grupo se actualizo exitosamente";
					return $mensaje;
				}
				else
				{	//mensaje si ha ocurrido un error se emite un mensaje
					$mensaje="Error al actualizar el Grupo";
					return  $mensaje;
				}
				//se cierra la conexion a la base de datos
				$actualizar->desconectar();
			}

			// funcion para borrar  grupos registrados en el sistema.
			public function borrar($id_grupo)
			{
				
				$borrar=new MySQL1();
				$borrar->MySQL();
				
				//se consulta la base de datos para saber si el grupo existe.
				$query=$borrar->consultar("SELECT *FROM grupos WHERE id_grupo='$id_grupo'");
				//se comprueba el resultado de la consulta
				if(($borrar->num_filas($query))<1)
				{	//si no encuentra nada emite un mensaje
					$mensaje="El Grupo no Existe en la Base de Datos";
					return $mensaje;
				}

				//se consulta la base de datos para saber si ya esta resgistrado el usuario
				if($borrar->consultar("DELETE FROM grupos WHERE id_grupo='$id_grupo'"))
				{
					//si todo se realizo correctamente se emite un mensaje
					$mensaje="El Grupo se Borro exitosamente";
					return $mensaje;
				}
				else
				{	
					//mensaje si ha ocurrido un error
					$mensaje="Error al Borrar el Grupo";
					return  $mensaje;
				}
				//se cierra la conexion a la base de datos
				$borrar->desconectar();
			}
		}

 ?>
