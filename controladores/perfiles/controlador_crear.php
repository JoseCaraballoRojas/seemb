<?php
//se incluye la clase producto
include_once("../../modelos/Perfil.php");
@session_start();
$id_usuario=$_SESSION['id_usuario'];
$primera_pregunta=$_POST['primera_pregunta'];
$primera_respuesta=$_POST['primera_respuesta'];
$segunda_pregunta=$_POST['segunda_pregunta'];
$segunda_respuesta=$_POST['segunda_respuesta'];
$tercera_pregunta=$_POST['tercera_pregunta'];
$tercera_respuesta=$_POST['tercera_respuesta'];

if((empty($id_usuario)) || (empty($primera_pregunta))  || (empty($primera_respuesta)) || (empty($segunda_pregunta))  || (empty($segunda_respuesta)) || (empty($tercera_pregunta))  || (empty($tercera_respuesta)) ){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
else{

		$crear_perfil= new Perfil();

		$mensaje=$crear_perfil->Crear($id_usuario,$primera_pregunta,$primera_respuesta,$segunda_pregunta,$segunda_respuesta,$tercera_pregunta,$tercera_respuesta);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/inicio.php');
		</script>";		 
	} 



?>