<?php 
	include_once("conexion.php");
	/*
	 clase para gestionar los platos que formaran parte del menu 
	 registrado en la base de datos del sistema. 
	*/
	class Plato{
			private $_id_plato;
			private $_plato;
			private $_descripcion;
			private $_tipo;
			private $_porcion;
			private $_unidad;
			private $_calorias;
			private $_carbohidratos;
			private $_grasas;
			private $_proteinas;
			private $_azucares;
			private $_sal;
			//Funcion para leer los Platos guardados en la base de datos y retornarlos.
			public function Leer()
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar("SELECT p.id_plato,p.id_unidad,p.id_tipo,p.plato,p.descripcion,p.porcion,p.calorias,p.carbohidratos,p.grasas,p.proteinas,p.azucares,p.sal, u.id_unidad, u.unidad,t.id_tipo, t.tipo FROM platos AS p JOIN unidades As u on p.id_unidad=u.id_unidad JOIN tipos As t on p.id_tipo=t.id_tipo");
				if($consulta->num_filas($resultado)>0)
				    {
				    	
				    	return $resultado;
				    }
				else{
						return false;
					}

			}

			//Funcion para leer un plato especifico.
			public function Leer_plato($id_plato)
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar("SELECT p.id_plato,p.id_unidad,p.id_tipo,p.plato,p.descripcion,p.porcion,p.calorias,p.carbohidratos,p.grasas,p.proteinas,p.azucares,p.sal, u.id_unidad, u.unidad,t.id_tipo, t.tipo FROM platos AS p JOIN unidades As u on p.id_unidad=u.id_unidad JOIN tipos As t on p.id_tipo=t.id_tipo WHERE p.id_plato='$id_plato'");
				if($consulta->num_filas($resultado)>0)
				    {
				    	
				    	return $resultado;
				    }
				else{
						return false;
					}

			}

			//Funcion para mostrar detalles de los ingredientes de un Plato.
			public function Detalle_plato($id_plato)
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar("SELECT p.producto,i.cantidad,u.unidad FROM ingredientes AS i JOIN productos As p on i.id_producto=p.id_producto JOIN unidades AS u on u.id_unidad=i.id_unidad WHERE i.id_plato='$id_plato'");
				if($consulta->num_filas($resultado)>0)
				    {
				    	
				    	return $resultado;
				    }
				else{
						return false;
					}

			}

			//Funcion para crear platos y almacenarlos en la base de datos ..
			public function Crear($id_plato,$plato,$descripcion,$porcion,$unidad,$tipo,$calorias,$carbohidratos,$grasas,$proteinas,$azucares,$sal)
			{
				$crear=new MySQL1();
				$crear->MySQL();
				$this->_id_plato=$id_plato;
				$this->_plato=$plato;
				$this->_descripcion=$descripcion;
				$this->_porcion=$porcion;
				$this->_unidad=$unidad;
				$this->_tipo=$tipo;
				$this->_calorias=$calorias;
				$this->_carbohidratos=$carbohidratos;
				$this->_grasas=$grasas;
				$this->_proteinas=$proteinas;
				$this->_azucares=$azucares;
				$this->_sal=$sal;
								
				//se consulta la base de datos para saber si ya esta resgistrado un plato
				$query=$crear->consultar("SELECT *FROM platos WHERE plato='$this->_plato'");
				//se comprueba el resultado de la consulta
				if(($crear->num_filas($query))>0)
				{	//si ya hay un plato  igual registrado se emite un mensaje
					$mensaje="El plato ya esta creado ";
					return $mensaje;
				}
				else{
					//si el plato no esta registrado en la base de datos se registra..	
					if($crear->consultar("INSERT INTO platos (id_plato,plato,descripcion,porcion,id_unidad,id_tipo,calorias,carbohidratos,grasas,proteinas,azucares,sal) VALUES('$this->_id_plato','$this->_plato','$this->_descripcion','$this->_porcion','$this->_unidad','$this->_tipo','$this->_calorias','$this->_carbohidratos','$this->_grasas','$this->_proteinas','$this->_azucares','$this->_sal')") == TRUE )
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
			public function Buscar($id_plato)
			{
				$buscar=new MySQL1();
				$buscar->MySQL();
				
				$resultado=$buscar->consultar("SELECT *FROM platos WHERE id_plato='$id_plato' ");
				if(($buscar->num_filas($resultado))>0){

					return $resultado;
					}

				else{
					$mensaje="El plato con ese id no esta registrado en la base de datos";
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

			//Funcion para buscar los ide de todos los platos registrados y mostrarlos.
			public function Platos_registrados()
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar(" SELECT p.id_plato,p.plato,p.descripcion,p.porcion,u.unidad,p.calorias,p.carbohidratos,p.proteinas,p.grasas,p.azucares,p.sal,t.tipo FROM platos AS p JOIN unidades AS u ON p.id_unidad=u.id_unidad JOIN tipos AS t ON t.id_tipo=p.id_tipo  ");
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
