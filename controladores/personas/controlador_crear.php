<?php
//se incluyen las clases necesarias.
include_once("../../modelos/Persona.php");
include_once("../../modelos/Usuario.php");

//se reciben los datos del formulario y se almacenan en variables
$ci=$_POST['cedula'];
$primer_nombre=$_POST['primer_nombre'];
$segundo_nombre=$_POST['segundo_nombre'];
$primer_apellido=$_POST['primer_apellido'];
$segundo_apellido=$_POST['segundo_apellido'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$id_persona=time();

//datos para el usuario
$usuario=$_POST['usuario'];
$password=$ci;
$password.=$primer_nombre;
$estatus=$_POST['estatus'];
$tipo=$_POST['tipo'];

// se comprueba mediante condiciones que no variables vacias o falten datos;
if((empty($ci)) || (empty($primer_nombre))  || (empty($segundo_nombre)) || (empty($primer_apellido)) || (empty($segundo_apellido)) || (empty($fecha_nacimiento)) || (empty($usuario)) || (empty($estatus)) || (empty($tipo)) ){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
//si todo los datos pasan la validacion se procede a guardarlos
else{
		// se crea un objeto de la clase persona.
		$crear_persona= new Persona();
		//se procede a crear la persona mediante una condicion si la persona se crea se procede a crear su usuario
		if( ($crear_persona->Crear($id_persona,$ci,$primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,$fecha_nacimiento))==TRUE ){
			$mensaje="La persona";
			//se crear un objeto de la clase usuario
			$crear_usuario= new Usuario();
			// se utiliza el objeto para crear el usuario y verificar si el proceso fue exitoso
			if ( ($crear_usuario->Crear($usuario,$password,$estatus,$tipo,$id_persona))==TRUE )  {
				$mensaje.=" y su usuario se creo exitosamente";
				
			}
			else{
				//si ocurrio un error se registra en la variable mensaje
				$mensaje.="error  al crear usuario";
			}
		}
		else{
			//si ocurrio un error se registra en la variable mensaje
			$mensaje="error al crear persona";
		}
		// si todo el proceso se dio exitosamente se emite un mensaje y nos manda a la lista de usuarios
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_usuarios.php');
		</script>";		 
	}


?>