<?php 
	include_once("conexion.php");
	/*
	 clase para gestionar el inventarios de productos disponible en los almacenes
	 de la institucion 
	*/
	class Inventario
		{
			private $_cantidad;
			private $_unidad;
			private $_fecha_entrada;
			private $_nivel_optimo;
			private $_producto;
			
			//Funcion para leer lass productos guardadas en la base de datos y retornarlas.
			public function Leer()
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar("SELECT i.id_inventario,i.cantidad,i.nivel_optimo,i.id_producto,i.id_unidad,u.id_unidad,u.unidad,p.id_producto,p.producto FROM inventario AS i JOIN productos As p on i.id_producto=p.id_producto JOIN unidades As u on i.id_unidad=u.id_unidad ORDER BY p.producto");
				if($consulta->num_filas($resultado)>0)
				    {
				    	
				    	return $resultado;
				    }
				else{
						return false;
					}

			}

			//Funcion para crear productos y almacenarlas en la base de datos ..
			public function Crear($cantidad,$nivel_optimo,$producto,$unidad)
			{
				$crear=new MySQL1();
				$crear->MySQL();
				$this->_cantidad=$cantidad;
				$this->_unidad=$unidad;
				$this->_nivel_optimo=$nivel_optimo;
				$this->_producto=$producto;
				
								
				//se consulta la base de datos para saber si ya esta resgistrado el producto en el inventario
				$query=$crear->consultar("SELECT *FROM inventario WHERE id_producto='$this->_producto'");
				//se comprueba el resultado de la consulta
				if(($crear->num_filas($query))>0){	
					//si ya hay un productoa igual registrado en el inventario se emite un mensaje
					$mensaje="el producto ya esta creado en el inventario";
					return $mensaje;
				}
				else{
					//si el producto no esta registrado en en el inventario se registra..	
					if($crear->consultar("INSERT INTO inventario(cantidad,nivel_optimo,id_producto,id_unidad) VALUES('$this->_cantidad','$this->_nivel_optimo','$this->_producto','$this->_unidad')")){	
							//si todo se realizo correctamente se emite un mensaje
							$mensaje="El producto se creo exitosamente en el inventario";
							return $mensaje;
						}
						else
						{	//mensaje si ha ocurrido un error
							$mensaje="Error al crear el producto en el inventario";
							return  $mensaje;
						}
					//se cierra la conexion a la base de datos
					$crear->desconectar();
					}
			
			}

			//Funcion para buscar el productos registrados en la base de datos.
			public function Buscar($id_inventario)
			{
				$buscar=new MySQL1();
				$buscar->MySQL();
				
				$resultado=$buscar->consultar("SELECT *FROM inventario WHERE id_inventario='$id_inventario' ");
				if(($buscar->num_filas($resultado))>0){

					return $resultado;
					}

				else{
					$mensaje="el inventario con ese id no esta registrado";
					return $mensaje;
					}
			}

			//funcion para actualizar el inventario almacenado en la base de datos.
			public function Actualizar($id_inventario,$cantidad,$nivel_optimo){
				$actualizar= new MySQL1();
				$actualizar->MySQL();
				$this->_cantidad=$cantidad;
				$this->_nivel_optimo=$nivel_optimo;
				//se comprueba a ravez de una condicion si se ejecuta la actualizacion de la producto.
				if($actualizar->consultar("UPDATE inventario set cantidad='$this->_cantidad', nivel_optimo='$this->_nivel_optimo'  WHERE id_inventario='$id_inventario'")){	
					//si todo se realizo correctamente se emite un mensaje
					$mensaje="El inventario se actualizo exitosamente";
					return $mensaje;
				}
				else
				{	//si ha ocurrido un error se emite un mensaje
					$mensaje="Error al actualizar el inventario";
					return  $mensaje;
				}
				//se cierra la conexion a la base de datos
				$actualizar->desconectar();
			}

			// funcion para borrar un inventario registrado en la base de datos.
			public function Borrar($id_inventario)
			{
				
				$borrar=new MySQL1();
				$borrar->MySQL();
				
				//se consulta la base de datos para saber si el inventario existe.
				$query=$borrar->consultar("SELECT *FROM inventario WHERE id_inventario='$id_inventario'");
				//se comprueba el resultado de la consulta.
				if(($borrar->num_filas($query))<1)
				{	//si no encuentra nada emite un mensaje
					$mensaje="El inventario no Existe en la Base de Datos";
					return $mensaje;
				}

				//se usa una condicion para determinar si elproducto se borro de la base de datos.
				elseif($borrar->consultar("DELETE FROM inventario WHERE id_inventario='$id_inventario'"))
				{
					//si todo se realizo correctamente se emite un mensaje
					$mensaje="EL inventario se borro exitosamente";
					return $mensaje;
				}
				else
				{	
					//mensaje si ha ocurrido un error
					$mensaje="Error al borrar el inventario";
					return  $mensaje;
				}
				//se cierra la conexion a la base de datos
				$borrar->desconectar();
			}

			//Funcion para comprobar que la cantidad de producto suficiente esta disponible para preparar un plato.
			public function Busca_cantidad($id_producto,$cantidad)
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar("SELECT *FROM inventario WHERE id_producto=".$id_producto." AND cantidad >= ".$cantidad."");
				$valor=$consulta->num_filas($resultado);
				return $valor;

			}

			//Funcion para listar los productos en alerta critica de inventario.
			public function Alerta()
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar("SELECT i.id_inventario,i.cantidad,i.nivel_optimo,i.id_producto,i.id_unidad,u.id_unidad,u.unidad,p.id_producto,p.producto FROM inventario AS i JOIN productos As p on i.id_producto=p.id_producto JOIN unidades As u on i.id_unidad=u.id_unidad ORDER BY p.producto");
				if($consulta->num_filas($resultado)>0)
				    {
				    	
				    	return $resultado;
				    }
				else{
						return false;
					}

			}

		}

 ?>
