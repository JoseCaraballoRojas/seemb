<?php 
	include_once("conexion.php");
	/*
	 clase para gestionar las categorias usadas para expresar los componetes
	 de los ingrediente en la base de datos del sistema 
	*/
	class Categoria
		{
			private $_categoria;
			private $_detalle;
			
			//Funcion para leer lass Categorias guardadas en la base de datos y retornarlas.
			public function Leer()
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar("SELECT *FROM categoria ORDER BY categoria");
				if($consulta->num_filas($resultado)>0)
				    {
				    	
				    	return $resultado;
				    }
				else{
						return false;
					}

			}

			//Funcion para crear categorias y almacenarlas en la base de datos ..
			public function Crear($categoria,$detalle)
			{
				$crear=new MySQL1();
				$crear->MySQL();
				$this->_categoria=$categoria;
				$this->_detalle=$detalle;
								
				//se consulta la base de datos para saber si ya esta resgistrada la categoria
				$query=$crear->consultar("SELECT *FROM categoria WHERE categoria='$this->_categoria'");
				//se comprueba el resultado de la consulta
				if(($crear->num_filas($query))>0)
				{	//si ya hay una categoriaad  igual registrada se emite un mensaje
					$mensaje="la categoria ya esta creado ";
					return $mensaje;
				}
				else{
					//si la categoria no esta registrada en la base de datos se registra..	
					if($crear->consultar("INSERT INTO categoria (categoria,detalle) VALUES('$this->_categoria','$this->_detalle')"))
						{	//si todo se realizo correctamente se emite un mensaje
							$mensaje="La categoria se Creo Exitosamente";
							return $mensaje;
						}
						else
						{	//mensaje si ha ocurrido un error
							$mensaje="Error al Crear la categoria";
							return  $mensaje;
						}
					//se cierra la conexion a la base de datos
					$crear->desconectar();
					}
			
			}

			//Funcion para buscar la categorias registradas en la base de datos.
			public function Buscar($id_categoria)
			{
				$buscar=new MySQL1();
				$buscar->MySQL();
				
				$resultado=$buscar->consultar("SELECT *FROM categoria WHERE id_categoria='$id_categoria' ");
				if(($buscar->num_filas($resultado))>0){

					return $resultado;
					}

				else{
					$mensaje="La categoria con ese id no esta registrada en la base de datos";
					return $mensaje;
					}
			}

			//funcion para actualizar las categorias registradas.
			public function Actualizar($id_categoria,$categoria,$detalle)
			{
				$actualizar= new MySQL1();
				$actualizar->MySQL();
				$this->_categoria=$categoria;
				$this->_detalle=$detalle;

				//se comprueba a ravez de una condicion si se ejecuta la actualizacion de la categoria.
				if($actualizar->consultar("UPDATE categoria set categoria='$this->_categoria', detalle='$this->_detalle' WHERE id_categoria='$id_categoria'")){	
					//si todo se realizo correctamente se emite un mensaje
					$mensaje="La categoria se actualizo exitosamente";
					return $mensaje;
				}
				else
				{	//si ha ocurrido un error se emite un mensaje
					$mensaje="Error al actualizar la categoria";
					return  $mensaje;
				}
				//se cierra la conexion a la base de datos
				$actualizar->desconectar();
			}

			// funcion para borrar categorias registradas en la base de datos.
			public function Borrar($id_categoria)
			{
				
				$borrar=new MySQL1();
				$borrar->MySQL();
				
				//se consulta la base de datos para saber si la categoria existe.
				$query=$borrar->consultar("SELECT *FROM categoria WHERE id_categoria='$id_categoria'");
				//se comprueba el resultado de la consulta.
				if(($borrar->num_filas($query))<1)
				{	//si no encuentra nada emite un mensaje
					$mensaje="La categoria no Existe en la Base de Datos";
					return $mensaje;
				}

				//se usa una condicion para determinar si la categoria se borro de la base de datos.
				if($borrar->consultar("DELETE FROM categoria WHERE id_categoria='$id_categoria'"))
				{
					//si todo se realizo correctamente se emite un mensaje
					$mensaje="La categoria se Borro exitosamente";
					return $mensaje;
				}
				else
				{	
					//mensaje si ha ocurrido un error
					$mensaje="Error al Borrar la categoria";
					return  $mensaje;
				}
				//se cierra la conexion a la base de datos
				$borrar->desconectar();
			}
		}

 ?>
