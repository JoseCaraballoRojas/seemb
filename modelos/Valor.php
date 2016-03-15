<?php 
	include_once("conexion.php");
	/*
	 clase para gestionar los valores  nutricionales de los platos 
	 que integra un menu registrado en la base de datos del sistema. 
	*/
	class Valor
		{
			private $_nutriente;
			private $_valor;
			private $_plato;
			

			//Funcion para crear los valores nutricionales de los platos y almacenarlos en la base de datos ..
			public function Crear($id_nutriente,$valor,$id_plato)
			{
				$crear=new MySQL1();
				$crear->MySQL();
				$this->_nutriente=$id_nutriente;
				$this->_valor=$valor;
				$this->_plato=$id_plato;
				//se consulta la base de datos para saber si ya esta resgistrado el valor nutricional del plato al que pertenece.
				$query=$crear->consultar("SELECT *FROM valores WHERE id_plato='$this->_plato' AND id_nutriente='$this->_nutriente' ");
				//se comprueba el resultado de la consulta
				if(($crear->num_filas($query))>0)
				{	//si ya hay un valor nutricional con con el mismo nombre y plato registrada se emite un mensaje
					$mensaje="Existe";
					return $mensaje;
				}
				else{
					//si el valor  no esta registrado en la base de datos se registra..	
					if($crear->consultar("INSERT INTO valores (id_nutriente,valor,id_plato) VALUES('$this->_nutriente','$this->_valor','$this->_plato')"))
						{	//si todo se realizo correctamente se emite un mensaje
							$mensaje="Exito";
							return $mensaje;
						}
						else
						{	//mensaje si ha ocurrido un error
							$mensaje="Error";
							return  $mensaje;
						}
					//se cierra la conexion a la base de datos
					$crear->desconectar();
					}
			
			}

			//Funcion para buscar los valores nutricionales de un plato registrado en la base de datos.
			public function Buscar($id_plato)
			{
				$buscar=new MySQL1();
				$buscar->MySQL();
				
				$resultado=$buscar->consultar("SELECT *FROM valores WHERE id_plato='$id_plato' ");
				if(($buscar->num_filas($resultado))>0){

					return $resultado;
					}

				else{
					$mensaje="Error";
					return $mensaje;
					}
			}

			//funcion para actualizar los nutrientes registrados.
			public function Actualizar($id_valor,$id_nutriente,$valor,$id_plato)
			{
				$actualizar= new MySQL1();
				$actualizar->MySQL();
				$this->_nutriente=$id_nutriente;
				$this->_valor=$valor;
				$this->_plato=$id_plato;

				//se comprueba a travez de una condicion si se ejecuta la actualizacion del nutriente.
				if($actualizar->consultar("UPDATE valores set id_nutriente='$this->_nutriente', valor='$this->_valor', id_plato='$this->_plato' WHERE id_valor='$id_valor'")){	
					//si todo se realizo correctamente se emite un mensaje
					$mensaje="Exito";
					return $mensaje;
				}
				else
				{	//si ha ocurrido un error se emite un mensaje
					$mensaje="Error";
					return  $mensaje;
				}
				//se cierra la conexion a la base de datos
				$actualizar->desconectar();
			}

			
		}

 ?>
