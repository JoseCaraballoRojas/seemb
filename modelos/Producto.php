<?php 
	include_once("conexion.php");
	/*
	 clase para gestionar las productos usadas para expresar los componetes
	 de los ingrediente en la base de datos del sistema 
	*/
	class Producto
		{
			private $_producto;
			private $_presentacion;
			private $_categoria;
			
			//Funcion para leer lass productos guardadas en la base de datos y retornarlas.
			public function Leer()
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar("SELECT p.id_producto, p.producto, p.presentacion, p.id_categoria, p.id_categoria, c.id_categoria, c.categoria FROM categoria AS c JOIN productos As p on p.id_categoria=c.id_categoria");
				if($consulta->num_filas($resultado)>0)
				    {
				    	
				    	return $resultado;
				    }
				else{
						return false;
					}

			}

			//Funcion para crear productos y almacenarlas en la base de datos ..
			public function Crear($producto,$presentacion,$categoria)
			{
				$crear=new MySQL1();
				$crear->MySQL();
				$this->_producto=$producto;
				$this->_presentacion=$presentacion;
				$this->_categoria=$categoria;
								
				//se consulta la base de datos para saber si ya esta resgistrado el producto
				$query=$crear->consultar("SELECT *FROM productos WHERE producto='$this->_producto' AND presentacion='$this->_presentacion'");
				//se comprueba el resultado de la consulta
				if(($crear->num_filas($query))>0){	
					//si ya hay un productoa igual registrado se emite un mensaje
					$mensaje="el producto ya esta creado ";
					return $mensaje;
				}
				else{
					//si el producto no esta registrado en la base de datos se registra..	
					if($crear->consultar("INSERT INTO productos(producto,presentacion,id_categoria) VALUES('$this->_producto','$this->_presentacion','$this->_categoria')")){	
							//si todo se realizo correctamente se emite un mensaje
							$mensaje="El producto se creo exitosamente";
							return $mensaje;
						}
						else
						{	//mensaje si ha ocurrido un error
							$mensaje="Error al crear el producto";
							return  $mensaje;
						}
					//se cierra la conexion a la base de datos
					$crear->desconectar();
					}
			
			}

			//Funcion para buscar el productos registrados en la base de datos.
			public function Buscar($id_producto)
			{
				$buscar=new MySQL1();
				$buscar->MySQL();
				
				$resultado=$buscar->consultar("SELECT *FROM productos WHERE id_producto='$id_producto' ");
				if(($buscar->num_filas($resultado))>0){

					return $resultado;
					}

				else{
					$mensaje="el producto con ese id no esta registrado en la base de datos";
					return $mensaje;
					}
			}

			//funcion para actualizar las productos registrados.
			public function Actualizar($id_producto,$producto,$presentacion,$categoria){
				$actualizar= new MySQL1();
				$actualizar->MySQL();
				$this->_producto=$producto;
				$this->_presentacion=$presentacion;
				$this->_fecha_vencimiento=$fecha_vencimiento;
				$this->_categoria=$categoria;
				//se comprueba a ravez de una condicion si se ejecuta la actualizacion de la producto.
				if($actualizar->consultar("UPDATE productos set producto='$this->_producto', presentacion='$this->_presentacion', id_categoria='$this->_categoria'  WHERE id_producto='$id_producto'")){	
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
		}

 ?>
