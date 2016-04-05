<?php 
	include_once("conexion.php");
	/*
	 clase para gestionar los ingredientes que formaran parte 
	 de los platos que integra un menu registrado en la base de datos del sistema. 
	*/
	class Ingrediente
		{
			private $_plato;
			private $_producto;
			private $_cantidad;
			private $_unidad;
			private $_grupo;
			
			
			//Funcion para crear platos y almacenarlos en la base de datos ..
			public function Crear($producto,$cantidad,$unidad_i,$grupo,$id_plato)
			{
				$crear=new MySQL1();
				$crear->MySQL();
				$this->_plato=$id_plato;
				
					foreach($producto AS $p => $c){
						$this->_producto=$producto[$p];
						$this->_cantidad=$cantidad[$p];
						$this->_unidad=$unidad_i[$p];
						$this->_grupo=$grupo[$p];

					

   						if( ($crear->consultar("INSERT INTO ingredientes (cantidad,id_producto,id_plato,id_grupo,id_unidad) VALUES('$this->_cantidad','$this->_producto','$this->_plato','$this->_grupo','$this->_unidad')"))==TRUE ){
   							//si todo se realizo correctamente se emite un mensaje
							$mensaje=TRUE;
						}
						else
						{	//mensaje si ha ocurrido un error
							$mensaje=FALSE;
							
						} 
						
					    
					}
				return $mensaje;
			}

			//Funcion para buscar los ingredientes de un plato en especifico.
			public function Busca_ingredientes($id_plato,$c)
			{
				$consulta=new MySQL1();
				$consulta->MySQL();
				$resultado=$consulta->consultar("SELECT  p.id_plato,p.plato,i.id_ingrediente,i.cantidad,pro.id_producto,pro.producto,((i.cantidad*'$c')/1000) as cantidad_requerida FROM platos as p join ingredientes as i on p.id_plato= i.id_plato join productos as pro on i.id_producto=pro.id_producto where i.id_plato='$id_plato'");
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
