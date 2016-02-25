<?php 
	include_once("conexion.php");
	/*
	 clase para gestionar las sesio0nes de los usuarios en el sistema... 
	*/
	class Sesion
		{
			private $usuario;
			private $password;
			private $sesion;
		
			public function iniciar($user, $pass)
			{
				$this->usuario=$user;
				$this->password=$pass;
				$this->sesion=new MySQL1();
				$this->sesion->MySQL();
				$consulta=$this->sesion->consultar("SELECT *FROM usuarios WHERE usuario='$this->usuario' AND password='$this->password' ");
				if($this->sesion->num_filas($consulta)>0)
				    {
					    @session_start();
					    $array=$this->sesion->busca_array($consult);
					    $_SESSION['usuario']=$array['usuario'];
					    $_SESSION['nombre']=$array['nombre'];
					    $_SESSION['apellido']=$array['apellido'];
					    $_SESSION['id_usuario']=$array['id_usuarios'];
				        $_SESSION['tipo']=$array['tipo'];
				        $_SESSION['estatus']=$array['estatus'];
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
				header('Location: ../index.php' );
				exit(1);

			}

	}

 ?>