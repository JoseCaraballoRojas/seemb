<?php 
include_once("conexion.php");
	/*
	 clase para gestionar las sesiones de los usuarios en el sistema... 
	*/
	class Sesion
		{
			private $usuario;
			private $password;
			private $sesion;
		
			public function iniciar($usuario,$password)
			{
				$this->usuario=$usuario;
				$this->password=$password;
				$this->sesion=new MySQL1();
				$this->sesion->MySQL();
				$consulta=$this->sesion->consultar("SELECT *FROM usuarios WHERE usuario='$this->usuario' AND password='$this->password' ");
				if($this->sesion->num_filas($consulta)>0)
				    {
					    @session_start();
					    $array=$this->sesion->busca_array($consulta);
					    $_SESSION['usuario']=$array['usuario'];
					    $_SESSION['id_usuario']=$array['id_usuario'];
				        $_SESSION['tipo']=$array['tipo'];
				        $_SESSION['estatus']=$array['estatus'];
				        $_SESSION['perfil']=$array['perfil'];
				        $this->sesion->desconectar();
				        return true;
					    
				    }
				else{
						return false;
					}

			}

			public function cerrar()
			{
				@session_start();
				session_unset();
				session_destroy();
				header('Location: ../../index.php' );
				exit(1);

			}

	}

 ?>