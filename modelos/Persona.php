<?php 
	include_once("conexion.php");
	/*
	 clase para gestionar los datos de las personas que se veneficiaran del 
	 servicio de comedor y posibles usuarios del sistema . 
	*/
	class Persona{
			private $_ci;
			private $_primer_nombre;
			private $_segundo_nombre;
			private $_primer_apellido;
			private $_segundo_apellido;
			private $_fecha_nacimiento;
			//Funcion para leer los Platos guardados en la base de datos y retornarlos.
			public function Leer()
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar("SELECT *FROM personas");
				if($consulta->num_filas($resultado)>0)
				    {
				    	
				    	return $resultado;
				    }
				else{
						return false;
					}

			}

			//Funcion para crear platos y almacenarlos en la base de datos ..
			public function Crear($id_persona,$ci,$primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,$fecha_nacimiento)
			{
				$crear=new MySQL1();
				$crear->MySQL();
				$this->_ci=$ci;
				$this->_primer_nombre=$primer_nombre;
				$this->_segundo_nombre=$segundo_nombre;
				$this->_primer_apellido=$primer_apellido;
				$this->_segundo_apellido=$segundo_apellido;
				$this->_fecha_nacimiento=$fecha_nacimiento;
								
				//se consulta la base de datos para saber si ya esta resgistrada la persona
				$query=$crear->consultar("SELECT *FROM personas WHERE ci='$this->_ci'");
				//se comprueba el resultado de la consulta
				if(($crear->num_filas($query))>0)
				{	//si ya hay una persona  registrada se devuelve true para que el proceso continue
					$mensaje=TRUE;
					return $mensaje;
				}
				else{
					//si el plato no esta registrado en la base de datos se registra..	
					if($crear->consultar("INSERT INTO personas (id_persona,ci,primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,fecha_nacimiento) VALUES('$id_persona','$this->_ci','$this->_primer_nombre','$this->_segundo_nombre','$this->_primer_apellido','$this->_segundo_apellido','$this->_fecha_nacimiento')") == TRUE )
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
			public function Buscar($ci)
			{
				$buscar=new MySQL1();
				$buscar->MySQL();
				
				$resultado=$buscar->consultar("SELECT *FROM personas WHERE ci='$ci' ");
				if(($buscar->num_filas($resultado))>0){

					return $resultado;
					}

				else{
					$mensaje="La cedula no esta registrada en la base de datos";
					return $mensaje;
					}
			}

			//funcion para actualizar los nutrientes registrados.
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
