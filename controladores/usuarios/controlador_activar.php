<?php
//se incluye la clase 
include("../../modelos/Usuario.php");

$id_usuario=$_GET['id_usuario'];

if((empty($id_usuario)) || (strlen($id_usuario)<1) ){
	$msgError="el id  del usuario es incorrecto";
	echo "<script  type='text/javascript' charset='utf-8' >alert('$msgError');
		window.location.assign('../../vistas/vista_listar_usuarios.php');
		</script>";	
}
else{

		$activar_usuario= new Usuario();

		$mensaje=$activar_usuario->Activar($id_usuario);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_usuarios.php');
		</script>";		 
	} 



?>